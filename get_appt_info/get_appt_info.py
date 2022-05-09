from flask import Flask, request, jsonify
from flask_cors import CORS

import os, sys
from os import environ

import requests
from invokes import invoke_http
import json

app = Flask(__name__)
CORS(app)

medical_record_by_user_url = "http://host.docker.internal:5300/medical_record_by_user_username/" 
user_url = "http://host.docker.internal:5200/user/" 
booking_url = "http://host.docker.internal:5100/booking/" 

# request.get_json()
# {
#     "booking_id": "x"
# }

# ---------------------------------------------------------------------------------------------- #
# Function - Retrieve appointment information from booking, user and medical_record [POST]

@app.route("/get_appt_info", methods=['POST'])
def get_appt_info():
    if request.is_json:
        try:
            appt = request.get_json()
            print("\nReceived get appointment information request in JSON:", appt)

            result = process_get_appt_info(appt)
            return result

        except Exception as e:
            # Unexpected error in code
            exc_type, exc_obj, exc_tb = sys.exc_info()
            fname = os.path.split(exc_tb.tb_frame.f_code.co_filename)[1]
            ex_str = str(e) + " at " + str(exc_type) + ": " + fname + ": line " + str(exc_tb.tb_lineno)
            print(ex_str)

            return jsonify({
                "code": 500,
                "message": "get_appt_info.py internal error: " + ex_str
            }), 500

    # if reached here, not a JSON request.
    return jsonify({
        "code": 400,
        "message": "Invalid JSON input: " + str(request.get_data())
    }), 400

def process_get_appt_info(appt):
    booking_id = appt['booking_id']
    
    # Invoke the booking microservice to get booking details
    print('\n-----Invoking booking microservice to get booking details-----')
    
    booking_result = invoke_http(booking_url + str(booking_id))
    code = booking_result["code"]

    if code not in range(200, 300):
        return jsonify(
            {
                "code": 500,
                "data": {
                    "booking_result": booking_result
                },
                "message": "Failed to retrieve booking information"
            }
        ), 500

    print('\n-----Booking details retrieved-----')

    user_username = booking_result['data']['user_username']

    # Invoke the user microservice to get user and pet details
    print('\n-----Invoking user microservice to get user details-----')

    user_result = invoke_http(user_url + str(user_username))
    code = user_result["code"]
    if code not in range(200, 300):
        return jsonify(
            {
                "code": 500,
                "data": {
                    "booking_result": booking_result,
                    "user_result": user_result
                },
                "message": "Failed to retrieve user's information."
            }
        ), 500

    print('\n-----User details retreived-----')

    # Invoke the medical_record microservice to get pet's past medical record
    print('\n-----Invoking medical_record microservice to get pet\'s past medical record-----')
    medical_record_result = invoke_http(medical_record_by_user_url + str(user_username))
    code = medical_record_result["code"]

    if code not in range(200, 405):
        return jsonify(
            {
                "code": 500,
                "data": {
                    "booking_result": booking_result,
                    "user_result": user_result,
                    "medical_record_result": medical_record_result
                    },
                "message": "Failed to retrieve user's medical record."
            }
        ), 500

    print('\n-----Pet\'s past medical record retrieved-----')

    return jsonify(
        {
            "code": 200,
            "data": {
                "booking_result": booking_result,
                "user_result": user_result,
                "medical_record_result": medical_record_result
            }
        }
    ), 200

if __name__ == "__main__":
    app.run(host="0.0.0.0", port=5700, debug=True)