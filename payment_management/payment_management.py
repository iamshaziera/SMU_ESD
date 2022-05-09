from flask import Flask, request, jsonify,render_template
from flask_cors import CORS

import os, sys
from os import environ
from datetime import datetime
import requests
from invokes import invoke_http

from string import Template

import amqp_setup
import pika
import json

app = Flask(__name__)
CORS(app)

get_booking_info_url = "http://host.docker.internal:5100/booking/"
payment_URL = "http://host.docker.internal:5800/payment"
get_user_info_url = "http://host.docker.internal:5200/user/"
get_clinic_info_url = "http://host.docker.internal:5000/clinic/"

# {
#     "stripeToken": XXX,
#     "amount": YYY
# }

@app.route("/payment_management", methods=['POST'])
def payment_management():
    if request.is_json:
        try:
            token = request.get_json()
            print("\nReceived a token for payment request", token)

            result = processReq(token)
            return jsonify(result), result["code"]

        except Exception as e:
            # Unexpected error in code
            exc_type, exc_obj, exc_tb = sys.exc_info()
            fname = os.path.split(exc_tb.tb_frame.f_code.co_filename)[1]
            ex_str = str(e) + " at " + str(exc_type) + ": " + fname + ": line " + str(exc_tb.tb_lineno)
            print(ex_str)

            return jsonify({
                "code": 500,
                "message": "payment_management.py internal error: " + ex_str
            }), 500

    # if reached here, not a JSON request.
    return jsonify({
        "code": 400,
        "message": "Invalid JSON input: " + str(request.get_data())
    }), 400

def processReq(token):
    # Retrive booking_id and clinic_name
    booking_id = token['booking_id']

    del token['booking_id']

    # Invoke the payment microservice to make payment
    print('\n-----Invoking payment microservice to make payment-----')
    
    payment_result = invoke_http(payment_URL, method='POST', json=token)
    code = payment_result["code"]
   
    if code not in range(200, 300):
        # 7. Return error
        return {
            "code": 404,
            "data": {
                "payment_result": payment_result
            },
            "message": "Failed to make payment"
        }

    # Invoke the booking microservice to get booking information
    print('\n-----Invoking booking microservice to get booking information-----')
    
    booking_result = invoke_http(get_booking_info_url + str(booking_id))
    code = booking_result["code"]

    if code not in range(200, 300):
        return {
                "code": 500,
                "data": {
                    "booking_result": booking_result
                },
                "message": "Failed to retrieve booking information"
            }

    user_username = booking_result['data']['user_username']
    clinic_username = booking_result['data']['clinic_username']

    print('\n-----Retrieved booking information-----')

    # Invoke the user microservice to get user information
    print('\n-----Invoking user microservice to get user information-----')

    user_result = invoke_http(get_user_info_url + str(user_username))
    code = user_result["code"]

    if code not in range(200, 300):
        return {
            "code": 500,
            "data": {
                "booking_result": booking_result,
                "user_result": user_result
            },
            "message": "Failed to retrieve user's information."
        }

    print('\n-----Retrieved user information-----')

    # Invoke the clinic microservice to get clinic information
    print('\n-----Invoking clinic microservice to get clinic information-----')
    clinic_result = invoke_http(get_clinic_info_url + str(clinic_username))

    code = clinic_result["code"]

    if code not in range(200, 300):
        return {
            "code": 500,
            "data": {
                "booking_result": booking_result,
                "user_result": user_result,
                "clinic_result": clinic_result
            },
            "message": "Failed to retrieve clinic's information."
        }
    
    print('\n-----Retrieved clinic information-----')

    user_name = user_result["data"]["user_name"]
    clinic_name = clinic_result['data']["clinic_name"]
    user_phone = user_result["data"]["user_phone"]

    template_content = read_template('notification_creation_message.txt')
    noti_message = template_content.substitute(user_name=user_name.title(), clinic_name=clinic_name) 

    notification_json = {
        'noti_message': noti_message,
        'user_phone': user_phone
    }

    notification_json = json.dumps(notification_json, default=str)

    amqp_setup.check_setup()

    # Invoke the notification microservice to send user notification on successful booking and payment
    print('\n-----Invoking notification microservice to send user notification on successful booking and payment-----')
    print('\n-----Publishing the message with routing_key=notify-----')

    amqp_setup.channel.basic_publish(exchange=amqp_setup.exchangename, routing_key="notify", 
        body=notification_json, properties=pika.BasicProperties(delivery_mode = 2)) 

    return {
        "code": 201,
        "data": {
            "payment_result": payment_result,
        },
        "message": "Payment made, booking created. Notification SMS sent to user."
    }

def read_template(filename):
    with open(filename) as f:
        template_content = f.read()

    return Template(template_content)

if __name__ == "__main__":
    print("This is flask " + os.path.basename(__file__) + " for managing payment...")
    app.run(host="0.0.0.0", port=5900, debug=True)
