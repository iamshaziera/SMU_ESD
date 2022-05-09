from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy
from os import environ
from flask_cors import CORS

app = Flask(__name__)
app.config['SQLALCHEMY_DATABASE_URI'] = environ.get('dbURL')
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False

db = SQLAlchemy(app)
CORS(app)

# ---------------------------------------------------------------------------------------------- #
# ESD Clinic Database - Clinic Info & Service Info Tables

class Clinic_Info(db.Model):
    __tablename__ = 'clinic_info'

    clinic_username = db.Column(db.String, primary_key=True)
    clinic_name = db.Column(db.String, nullable=False)
    clinic_address = db.Column(db.String, nullable=False)
    clinic_postal = db.Column(db.String, nullable=False)
    clinic_password = db.Column(db.String, nullable=False)
    clinic_operating_hours = db.Column(db.String, nullable=False)
    clinic_contact = db.Column(db.String, nullable=False)

    def json(self):
        dto = {
                'clinic_username': self.clinic_username,
                'clinic_name': self.clinic_name,
                'clinic_address': self.clinic_address,
                'clinic_postal': self.clinic_postal,
                'clinic_password': self.clinic_password,
                'clinic_operating_hours': self.clinic_operating_hours,
                'clinic_contact': self.clinic_contact,
        }
        return dto
# ---------------------------------------------------------------------------------------------- #
# Function - get all registered clinics [GET]

@app.route("/clinic")
def get_all_clinics():
    try:
        clinic_list = Clinic_Info.query.all()

        if len(clinic_list) != 0:
            result = [clinic.json() for clinic in clinic_list]
            for clinic in result:
                del clinic['clinic_password']

            return jsonify(
                {
                    "code": 200,
                    "data": {
                        "clinic": result
                    }
                }
            ), 200

        return jsonify(
            {
                "code": 404,
                "message": "There are no registered clinics."
            }
        ), 404

    except Exception as e:
        return jsonify(
            {
                "code": 500,
                "message": "There was an error while retrieving clinics: " + str(e)
            }
        ), 500
# ---------------------------------------------------------------------------------------------- #
# Function - get specific registered clinic information by clinic username [GET]

@app.route("/clinic/<string:clinic_username>")
def find_by_clinic_id(clinic_username):
    try:
        clinic = Clinic_Info.query.filter_by(clinic_username=clinic_username).first()

        if clinic:
            result = clinic.json()
            del result['clinic_password']
            
            return jsonify(
                {
                    "code": 200,
                    "data": result
                }
            ), 200

        return jsonify(
            {
                "code": 404,
                "message": "Clinic not found."
            }
        ), 404

    except Exception as e:
        return jsonify(
            {
                "code": 500,
                "message": "There was an error while retrieving the clinic: " + str(e)
            }
        ), 500

# ---------------------------------------------------------------------------------------------- #
# Function - register clinic [POST]

@app.route("/register_clinic", methods=['POST'])
def register_clinic():
    try:
        data = request.get_json()

        if (Clinic_Info.query.filter_by(clinic_username = data["clinic_username"])).first():
            return jsonify(
                {
                    "code": 404,
                    "message": "A clinic with username '{}' already exists.".format(data["clinic_username"])
                }
            ), 404

        elif (data["clinic_password"] != data["clinic_confirm_password"]):
            return jsonify(
                {
                    "code": 404,
                    "message": "Passwords do not match."
                }
            ), 404

        else:
            clinic = Clinic_Info(clinic_username=data["clinic_username"], clinic_name=data["clinic_name"], clinic_address=data["clinic_address"], clinic_postal=data["clinic_postal"], clinic_password=data["clinic_password"], clinic_operating_hours=data["clinic_operating_hours"], clinic_contact=data["clinic_contact"])

            db.session.add(clinic)
            db.session.commit()

            return jsonify(
                {
                    "code": 201,
                    "data": clinic.json(),
                }
            ), 201

    except Exception as e:
        return jsonify(
            {
                "code": 500,
                "message": "There was an error while registering the clinic: " + str(e)
            }
        ), 500
        
# ---------------------------------------------------------------------------------------------- #
# Function - clinic login [POST]

@app.route("/clinic_login", methods=['POST'])
def clinic_login():
    try:
        data = request.get_json()
        clinic = Clinic_Info.query.filter_by(clinic_username = data["clinic_username"]).filter_by(clinic_password = data["clinic_password"]).first()

        if clinic:
                return jsonify(
                    {
                        "code": 200,
                        "data": clinic.json()
                    }
                ), 200

        return {
            "code": 404,
            "message": "Wrong username/password!"
        }, 404
    
    except Exception as e:
        return jsonify(
            {
                "code": 500,
                "message": "There was an error while logging in: " + str(e)
            }
        ), 500        

# ---------------------------------------------------------------------------------------------- #
# Function - clinic sorted alphabetically [GET]

@app.route("/clinic_sorted")
def get_all_sorted_clinics():
    try:
        clinic_list = Clinic_Info.query.order_by(Clinic_Info.clinic_name).all()

        if len(clinic_list) != 0:
            result = [clinic.json() for clinic in clinic_list]
            for clinic in result:
                del clinic['clinic_password']

            return jsonify(
                {
                    "code": 200,
                    "data": {
                        "clinic": result
                    }
                }
            ), 200

        return jsonify(
            {
                "code": 404,
                "message": "There are no registered clinics."
            }
        ), 404

    except Exception as e:
        return jsonify(
            {
                "code": 500,
                "message": "There was an error while retrieving clinics: " + str(e)
            }
        ), 500     

# ---------------------------------------------------------------------------------------------- #
# To run flask app
if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000, debug=True)

