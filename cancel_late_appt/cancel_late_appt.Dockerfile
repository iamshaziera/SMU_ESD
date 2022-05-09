FROM python:3-slim
WORKDIR /usr/src/app
COPY cancel_late_appt.txt ./
RUN pip install --no-cache-dir -r cancel_late_appt.txt
COPY ./cancel_late_appt.py ./invokes.py ./notification_message.txt ./amqp_setup.py ./
CMD [ "python", "./cancel_late_appt.py" ]