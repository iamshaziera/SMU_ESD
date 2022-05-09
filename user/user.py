from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy
from os import environ
from flask_cors import CORS
from sqlalchemy.sql.elements import Null

app = Flask(__name__)
app.config['SQLALCHEMY_DATABASE_URI'] = environ.get('dbURL')
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False

db = SQLAlchemy(app)
CORS(app)

# ---------------------------------------------------------------------------------------------- #
# ESD User Database - User Table

class User(db.Model):
    __tablename__ = 'user'

    user_username = db.Column(db.String, primary_key=True)
    user_name = db.Column(db.String, nullable=False)
    user_password = db.Column(db.String, nullable=False)
    user_phone = db.Column(db.String, nullable=False)
    pet_name = db.Column(db.String, nullable=False)
    pet_type = db.Column(db.String, nullable=False)

    def json(self):
        dto = {
            'user_username': self.user_username,
            'user_name': self.user_name,
            'user_password': self.user_password,
            'user_phone': self.user_phone,
            'pet_name': self.pet_name,
            'pet_type': self.pet_type
        }

        return dto

# ---------------------------------------------------------------------------------------------- #
# Function - get all registered users [GET]

@app.route("/user")
def get_all_users():
    try:
        user_list = User.query.all()

        if len(user_list) != 0:
            result = [user.json() for user in user_list]
            for user in result:
                del user["user_password"]

            return jsonify(
                {
                    "code": 200,
                    "data": {
                        "users": result
                    }
                }
            ), 200

        else:
            return jsonify(
                {
                    "code": 404,
                    "message": "There are no registered users."
                }
            ), 404

    except Exception as e:
        return jsonify(
            {
                "code": 500,
                "message": "There was an error while retrieving users: " + str(e)
            }
        ), 500

# ---------------------------------------------------------------------------------------------- #
# Function - get specific registered user information by user_username [GET]

@app.route("/user/<string:user_username>")
def find_by_user_username(user_username):
    print(user_username)
    try:
        user = User.query.filter_by(user_username=user_username).first()

        if user:
            user_result = user.json()
            del user_result["user_password"]

            return jsonify(
                {
                    "code": 200,
                    "data": user_result
                }
            ), 200
        
        else:
            return jsonify(
                {
                    "code": 404,
                    "message": "User not found."
                }
            ), 404

    except Exception as e:
        return jsonify(
            {
                "code": 500,
                "message": "There was an error while retrieving the user information: " + str(e)
            }
        ), 500

# ---------------------------------------------------------------------------------------------- #
# Function - register user [POST]

@app.route("/register_user", methods=['POST'])
def register_user():
    try:
        data = request.get_json()
        
        if (User.query.filter_by(user_username = data["user_username"]).first()):
            return jsonify(
                {
                    "code": 404,
                    "message": "A user with username '{}' already exists.".format(data["user_username"])
                }
            ), 404

        elif (data["user_password"] != data["user_confirm_password"]):
            return jsonify(
                {
                    "code": 404,
                    "message": "Passwords do not match."
                }
            ), 404

        else:
            user = User(user_username=data["user_username"], user_name=data["user_name"], user_password=data["user_password"], user_phone=data["user_phone"], pet_name=data["pet_name"], pet_type=data["pet_type"])

            db.session.add(user)
            db.session.commit()

            return jsonify(
                {
                    "code": 201,
                    "data": user.json()
                }
            ), 201

    except Exception as e:
        return jsonify(
            {
                "code": 500,
                "message": "There was an error while registering the user: " + str(e)
            }
        ), 500

# ---------------------------------------------------------------------------------------------- #
# Function - user login [POST]

@app.route("/user_login", methods=['POST'])
def user_login():
    try:
        data = request.get_json()
        user = User.query.filter_by(user_username = data["user_username"]).filter_by(user_password = data["user_password"]).first()

        if user:
            return jsonify(
                {
                    "code": 200,
                    "data": user.json()
                }
            ), 200

        return jsonify(
            {
                "code": 404,
                "message": "Wrong username/password!"
            }
        ), 404
    
    except Exception as e:
        return jsonify(
            {
                "code": 500,
                "message": "There was an error while logging in: " + str(e)
            }
        ), 500    

# ---------------------------------------------------------------------------------------------- #
# To run flask app 

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5200, debug=True) 
