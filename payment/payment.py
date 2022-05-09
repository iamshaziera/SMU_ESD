import os
from flask import Flask, render_template, request, jsonify, json
from flask_cors import CORS

import requests 
from datetime import datetime

app = Flask(__name__)
CORS(app)

# {
#     "stripeToken": XXX,
#     "amount": YYY
# }

@app.route('/payment', methods=['POST'])
def charge():
    api_key = 'sk_test_51IcMyPFMysEzEoLdStu0tGQ6e8mLsHFrLwI62svo2R2PrFsDInUsR4wdkUdBZ2okaqDB18CFWFuCYch4E0ZzJ0NK00uG6Z5I5J'
    
    print('-----------Payment microservice invoked-------------------')

    x = request.get_json()
    token = x['stripeToken']
    amount =x['amount']
   
    headers = {'Authorization' : f'Bearer {api_key}'}
    data = {
            'amount' : amount, 
            'currency' : 'SGD', 
            'description' : '$20 Deposit', 
            'source' : token
        }

    r = requests.post('https://api.stripe.com/v1/charges', headers=headers, data=data)
   
    results = json.dumps(r.json())

    try:
        r.json()['status']

        return  jsonify ({
                "code": 200,
                "token":token,
                "amount":amount,
                "timestamp":datetime.now(),
                "Message": "payment made successfully",
                'result':r.json()})

    except:
        return jsonify(
                {
                    "code": 404,
                    'error':r.json()['error']}
            ), 404

if __name__ == "__main__":
    print("This is flask " + os.path.basename(__file__) + ": stripe...")
    app.run( host='0.0.0.0', port=5800, debug=True)
