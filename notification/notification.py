import json
import os

import amqp_setup
from twilio.rest import Client 

monitorBindingKey='notify'

def receiveNotification():
    amqp_setup.check_setup()
    
    queue_name = "Notify"   

    # set up a consumer and start to wait for coming messages
    amqp_setup.channel.basic_consume(queue=queue_name, on_message_callback=callback, auto_ack=True)
    amqp_setup.channel.start_consuming() # an implicit loop waiting to receive messages; 
    #it doesn't exit by default. Use Ctrl+C in the command window to terminate it.

def callback(channel, method, properties, body): # required signature for the callback; no return
    print("\nNotification message received by " + __file__)
    processNotification(body)
    print() # print a new line feed

def processNotification(metadata):
    print("Processing notification")

    try:
        data = json.loads(metadata)

        noti_message = data['noti_message']
        user_phone = '+65' + data['user_phone']
        
        account_sid = 'AC7cce203be4c65c042fc28c8e8f24789a' 
        auth_token = '1b0f7dc2f2894a580f021591a3f927ec' 
        client = Client(account_sid, auth_token) 
        
        message = client.messages.create(  
                                    messaging_service_sid='MG15942c91822c4b0d2827f1c41e7c9215', 
                                    body=noti_message,      
                                    to=user_phone
                                ) 

    except Exception as e:
        print("--NOT JSON:", e)
        print("--DATA:", metadata)
    print()

if __name__ == "__main__":  # execute this program only if it is run as a script (not by 'import')    
    print("\nThis is " + os.path.basename(__file__), end='')
    print(": monitoring routing key '{}' in exchange '{}' ...".format(monitorBindingKey, amqp_setup.exchangename))
    receiveNotification()
