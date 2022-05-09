FROM python:3-slim
WORKDIR /usr/src/app
COPY http.reqs.txt ./
RUN pip install --no-cache-dir -r http.reqs.txt
COPY ./appt_recorded.py ./invokes.py ./
CMD [ "python", "./appt_recorded.py" ]