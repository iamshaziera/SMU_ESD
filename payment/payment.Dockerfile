FROM python:3-slim
WORKDIR /usr/src/app
COPY payment.txt ./
RUN pip install --no-cache-dir -r payment.txt
COPY ./payment.py .
CMD [ "python", "./payment.py" ]