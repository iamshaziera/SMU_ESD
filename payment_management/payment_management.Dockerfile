FROM python:3-slim
WORKDIR /usr/src/app
COPY payment_management.txt ./
RUN pip install --no-cache-dir -r payment_management.txt
COPY ./payment_management.py ./notification_creation_message.txt ./invokes.py ./amqp_setup.py ./
CMD [ "python", "./payment_management.py" ]