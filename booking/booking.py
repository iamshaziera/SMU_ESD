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
# ESD Booking Database - Booking Info Tables

class booking_info(db.Model):
    __tablename__ = 'booking_info'

    booking_id = db.Column(db.String, nullable=False)
    clinic_username = db.Column(db.String, primary_key=True)
    user_username = db.Column(db.String, nullable=False)
    booking_date = db.Column(db.String, primary_key=True)
    booking_slot = db.Column(db.Integer, primary_key=True)
    clinic_service = db.Column(db.String, nullable=False)

    def json(self):
        dto = {
            "booking_id": self.booking_id, 
            "clinic_username": self.clinic_username, 
            "user_username": self.user_username, 
            "booking_date": self.booking_date, 
            "booking_slot": self.booking_slot,
            "clinic_service": self.clinic_service
        }

        return dto

# ---------------------------------------------------------------------------------------------- #
# Function - get all bookings [GET]

@app.route("/booking")
def get_all():
    try:
        booking_list = booking_info.query.all()

        if len(booking_list) != 0:
            return jsonify(
                {
                    "code": 200,
                    "data": {
                        "clinic": [booking.json() for booking in booking_list]
                    }
                }
            ), 200

        return jsonify(
            {
                "code": 404,
                "message": "There are no bookings available."
            }
        ), 404

    except Exception as e:
        return jsonify(
            {
                "code": 500,
                "message": "There was an error while retrieving bookings: " + str(e)
            }
        ), 500

# ---------------------------------------------------------------------------------------------- #
# Function - get all relevant bookings by user_username [GET]

@app.route("/user_booking/<string:user_username>")
def find_by_user_username(user_username):
    try:
        booking_list = booking_info.query.filter_by(user_username=user_username).all()

        if len(booking_list) != 0:
            return jsonify(
                {
                    "code": 200,
                    "data": {
                        "booking": [booking.json() for booking in booking_list]
                    }
                }
            ), 200
        
        return jsonify(
            {
                "code": 404,
                "message": "No booking for user."
            }
        ), 404

    except Exception as e:
        return jsonify(
            {
                "code": 500,
                "message": "There was an error while retrieving the bookings: " + str(e)
            }
        ), 500

# ---------------------------------------------------------------------------------------------- #
# Function - get booking details by booking id [GET]

@app.route("/booking/<string:booking_id>")
def find_by_booking_id(booking_id):
    try:
        booking = booking_info.query.filter_by(booking_id=booking_id).first()

        if booking:
            return jsonify(
                {
                    "code": 200,
                    "data": booking.json()
                }
            ), 200
        
        return jsonify(
            {
                "code": 404,
                "message": "Booking ID does not exist."
            }
        ), 404

    except Exception as e:
        return jsonify(
            {
                "code": 500,
                "message": "There was an error while retrieving the booking: " + str(e)
            }
        ), 500

# ---------------------------------------------------------------------------------------------- #
# Function - get all bookings by clinic_username [GET]

@app.route("/clinic_booking/<string:clinic_username>")
def find_by_clinic_username(clinic_username):
    try:
        booking_list = booking_info.query.filter_by(clinic_username=clinic_username).all()

        if len(booking_list) != 0:
            return jsonify(
                {
                    "code": 200,
                    "data": {
                        "booking": [booking.json() for booking in booking_list]
                    }
                }
            ), 200

        return jsonify(
            {
                "code": 404,
                "message": "No booking for clinic."
            }
        ), 404

    except Exception as e:
        return jsonify(
            {
                "code": 500,
                "message": "There was an error while retrieving the bookings: " + str(e)
            }
        ), 500

# ---------------------------------------------------------------------------------------------- #
# Function - create booking [POST]

@app.route("/create_booking", methods=['POST'])
def create_booking():
    try:
        data = request.get_json()
        data['booking_id'] = str(data['clinic_username']) + '|' + str(data['booking_date']) + '|' + str(data['booking_slot'])
        booking = booking_info(**data)

        db.session.add(booking)
        db.session.commit()

        return jsonify(
            {
                "code": 201,
                "data": booking.json()
            }
        ), 201

    except Exception as e:
        return jsonify(
            {
                "code": 500,
                "message": "There was an error while creating the booking." + str(e)
            }
        ), 500

# ---------------------------------------------------------------------------------------------- #
# Function - delete booking by booking id [DELETE]

@app.route("/delete_booking/<string:booking_id>", methods=['DELETE'])
def delete_booking(booking_id):
    try:
        booking = booking_info.query.filter_by(booking_id=booking_id).first()

        if booking:
            db.session.delete(booking)
            db.session.commit()
            return jsonify(
                {
                    "code": 200,
                    "message": "Booking deleted."
                }
            ), 200
        
        else:
            return jsonify(
                {
                    "code": 404,
                    "message": "Booking not found."
                }
            ), 404

    except Exception as e:
        return jsonify(
            {
                "code": 500,
                "message": "There was an error while deleting the booking: " + str(e)
            }
        ), 500

# ---------------------------------------------------------------------------------------------- #
# To run flask app
if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5100, debug=True)