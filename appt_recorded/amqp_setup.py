import pika
from os import environ

hostname = environ.get('rabbit_host') or 'localhost'
port = environ.get('rabbit_port') or 5672
# connect to the broker and set up a communication channel in the connection
connection = pika.BlockingConnection(
    pika.ConnectionParameters(
        host=hostname, port=port,
        heartbeat=3600, blocked_connection_timeout=3600, # these parameters to prolong the expiration time (in seconds) of the connection
))

channel = connection.channel()

exchangename="process_topic"
exchangetype="topic"
channel.exchange_declare(exchange=exchangename, exchange_type=exchangetype, durable=True)

############   Cancel queue   #############
# declare Cancel queue
queue_name = 'Cancel'
channel.queue_declare(queue=queue_name, durable=True) 

#bind Cancel queue
channel.queue_bind(exchange=exchangename, queue=queue_name, routing_key='*.cancel')
    # bind the queue to the exchange via the key
    # any routing_key with two words and ending with '.cancel' will be matched

############   Create queue   #############
# declare Create queue
queue_name = 'Create'
channel.queue_declare(queue=queue_name, durable=True) 

#bind Create queue
channel.queue_bind(exchange=exchangename, queue=queue_name, routing_key='*.create')
    # bind the queue to the exchange via the key
    # any routing_key with two words and ending with '.create' will be matched
    
"""
This function in this module sets up a connection and a channel to a local AMQP broker,
and declares a 'topic' exchange to be used by the microservices in the solution.
"""
def check_setup():
    # The shared connection and channel created when the module is imported may be expired, 
    # timed out, disconnected by the broker or a client;
    # - re-establish the connection/channel is they have been closed
    global connection, channel, hostname, port, exchangename, exchangetype

    if not is_connection_open(connection):
        connection = pika.BlockingConnection(pika.ConnectionParameters(host=hostname, port=port))
    if channel.is_closed:
        channel = connection.channel()
        channel.exchange_declare(exchange=exchangename, exchange_type=exchangetype, durable=True)


def is_connection_open(connection):
    # For a BlockingConnection in AMQP clients,
    # when an exception happens when an action is performed,
    # it likely indicates a broken connection.
    # So, the code below actively calls a method in the 'connection' to check if an exception happens
    try:
        connection.process_data_events()
        return True
    except pika.exceptions.AMQPError as e:
        print("AMQP Error:", e)
        print("...creating a new connection.")
        return False
