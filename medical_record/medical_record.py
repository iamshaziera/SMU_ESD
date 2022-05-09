from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy
from os import environ
from flask_cors import CORS
import datetime

app = Flask(__name__)
app.config['SQLALCHEMY_DATABASE_URI'] = environ.get('dbURL')
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False

db = SQLAlchemy(app)
CORS(app)

# ---------------------------------------------------------------------------------------------- #
# ESD MedicalRecord Database - Medical Record Table

class MedicalRecord(db.Model):
    __tablename__ = 'medical_record'

    medical_record_id = db.Column(db.Integer, primary_key=True)
    clinic_username = db.Column(db.String, nullable=False)
    user_username = db.Column(db.String, nullable=False)
    booking_date = db.Column(db.String, nullable=False)
    booking_slot = db.Column(db.Integer, nullable=False)
    clinic_service = db.Column(db.String, nullable=False)
    remarks = db.Column(db.String, nullable=False)
    created = db.Column(db.DateTime, nullable=False, default=datetime.datetime.now())
 
    def json(self):
        dto = {
            "medical_record_id": self.medical_record_id, 
            "clinic_username": self.clinic_username, 
            "user_username": self.user_username, 
            "booking_date": self.booking_date, 
            "booking_slot": self.booking_slot, 
            "clinic_service": self.clinic_service, 
            "remarks": self.remarks,
            "created": self.created 
        }

        return dto       

# ---------------------------------------------------------------------------------------------- #
# Function - get all medical records [GET]

@app.route("/medical_record")
def get_all():
    try:
        recordlist = MedicalRecord.query.all()

        if len(recordlist):
            return jsonify(
                {
                    "code": 200,
                    "data": {
                        "medical_record": [medical_record.json() for medical_record in recordlist]
                    }
                }
            ), 200

        return jsonify(
            {
                "code": 404,
                "message": "There are no medical records."
            }
        ), 404

    except Exception as e:
        return jsonify(
            {
                "code": 500,
                "message": "There was an error while retrieving medical records: " + str(e)
            }
        ), 500

# ---------------------------------------------------------------------------------------------- #
# Function - get medical record by medical_record_id [GET]

@app.route("/medical_record/<string:medical_record_id>")
def find_by_medical_record_id(medical_record_id):
    try:
        medical_record = MedicalRecord.query.filter_by(medical_record_id=medical_record_id).first()

        if medical_record:
            return jsonify(
                {
                    "code": 200,
                    "data": medical_record.json()
                }
            ), 200

        return jsonify(
            {
                "code": 404,
                "message": "medical_record_id does not exist."
            }
        ), 404

    except Exception as e:
        return jsonify(
            {
                "code": 500,
                "message": "There was an error while retrieving the medical record: " + str(e)
            }
        ), 500

# ---------------------------------------------------------------------------------------------- #
# Function - get medical record by user_username [GET]

@app.route("/medical_record_by_user_username/<string:user_username>")
def find_by_user_username(user_username):
    try:
        medical_records = MedicalRecord.query.filter_by(user_username=user_username).all()

        if medical_records:
            return jsonify(
                {
                    "code": 200,
                    "data": {
                        "medical_record": [medical_record.json() for medical_record in medical_records]
                    }
                }
            ), 200

        return jsonify(
            {
                "code": 404,
                "message": "No medical records found for user_username"
            }
        ), 404

    except Exception as e:
        return jsonify(
            {
                "code": 500,
                "message": "An error occurred while retrieving medical record. " + str(e)
            }
        ), 500

# ---------------------------------------------------------------------------------------------- #
# Function - create medical record [POST]

@app.route("/create_medical_record", methods=['POST'])
def create_medical_record():
    try:
        data = request.get_json()
        medical_record = MedicalRecord(**data)

        db.session.add(medical_record)
        db.session.commit()

        return jsonify(
            {
                "code": 201,
                "data": medical_record.json()
            }
        ), 201

    except Exception as e:
        return jsonify(
            {
                "code": 500,
                "message": "An error occurred while creating the medical record. " + str(e)
            }
        ), 500

# ---------------------------------------------------------------------------------------------- #
# To run flask app

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5300, debug=True)
