from flask import Flask, request, jsonify
from flask_cors import CORS

import os, sys
from os import environ

import requests
from invokes import invoke_http
import json
import datetime

app = Flask(__name__)
CORS(app)

booking_info_delete_url = "http://host.docker.internal:5100/delete_booking/"
get_bookingID_info = "http://host.docker.internal:5100/booking/"
medical_record_URL = "http://host.docker.internal:5300/create_medical_record"

# request.get_json()
# {
#     "booking_id": "x",
#     "remarks": "x"
# }

# ---------------------------------------------------------------------------------------------- #
# Function - Process booking appointment into medical record [POST]

@app.route("/appt_recorded", methods=['POST'])
def appt_recorded():
    if request.is_json:
        try:
            booking = request.get_json()
            print("\nReceived a request to process booking appointment into medical record JSON:", booking)

            result = process_appt_recorded(booking)
            return jsonify(result), result["code"]

        except Exception as e:
            # Unexpected error in code
            exc_type, exc_obj, exc_tb = sys.exc_info()
            fname = os.path.split(exc_tb.tb_frame.f_code.co_filename)[1]
            ex_str = str(e) + " at " + str(exc_type) + ": " + fname + ": line " + str(exc_tb.tb_lineno)
            print(ex_str)

            return jsonify({
                "code": 500,
                "message": "appt_recorded.py internal error: " + ex_str
            }), 500

    # if reached here, not a JSON request.
    return jsonify({
        "code": 400,
        "message": "Invalid JSON input: " + str(request.get_data())
    }), 400

def process_appt_recorded(booking):
    booking_id = booking['booking_id']
    remarks = booking['remarks']

    # Invoke the booking microservice to get booking details
    print('\n-----Invoking booking microservice-----')

    booking_result = invoke_http(get_bookingID_info + str(booking_id))
    code = booking_result["code"]

    if code not in range(200, 300):
        return {
            "code": 500,
            "data": {
                "booking_result": booking_result
            },
            "message": "Failed to retrieve booking information."
        }

    print('\n-----Retrieved booking information-----')

    # Invoke the medical_record microservice to create new medical_record
    print('\n-----Invoking medical_record microservice to create new medical record-----')

    medical_record_information = booking_result['data']
    del medical_record_information['booking_id']

    medical_record_information['medical_record_id'] = None
    medical_record_information['created'] = str(datetime.datetime.now())
    medical_record_information['remarks'] = remarks

    medical_record_result = invoke_http(medical_record_URL, method='POST', json=medical_record_information)
    code = medical_record_result["code"]

    if code not in range(200, 300):
        return {
            "code": 500,
            "data": {
                "booking_result": booking_result,
                "medical_record_result": medical_record_result,
            },
            "message": "Failed to create medical record"
        }

    print('\n-----Created new medical record-----')

    # Invoke the booking microservice to delete booking
    print('\n-----Invoking booking microservice to delete booking-----')
    booking_result = invoke_http(booking_info_delete_url + str(booking_id), method="DELETE")
    code = booking_result["code"]
    
    if code not in range(200, 300):
        return {
                "code": 500,
                "data": {
                    "medical_record_result": medical_record_result,
                    "booking_result": booking_result
                },
                "message": "Created medical_record but failed to delete corresponding booking"
            }

    return {
        "code": 201,
        "data": {
            "medical_record_result": medical_record_result,
            "booking_result": booking_result
        }
    }

if __name__ == "__main__":
    app.run(host="0.0.0.0", port=5500, debug=True)