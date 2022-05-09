<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <title>Viewing Clinic Appointment</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/animate.min.css">
    <link rel="stylesheet" href="../css/aos.css">
    <link rel="stylesheet" href="../css/bootstrap-icons.css">
</head>
<body>
    <header class="position-relative" data-aos="fade-down">
        <div class="background position-absolute z-index_-1 w-100 h-100"><img class="cover"
                src="../img/dogappt.jpg"></img>
            <div class="filter basic"></div>
        </div>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark py-4"><a class="navbar-brand" href="#">
                    <h1 class="h3 mt-0">Pet Society</h1>
                </a><button class="navbar-toggler" type="button" data-bs-target="#navbarSupportedContent"
                    data-bs-toggle="collapse" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse ms-lg-5  mt-4 mt-lg-0" id="navbarSupportedContent">
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item"><a class="nav-link" href="./clinic_appointments.php"><span>Home</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="./clinic_appointments.php"><span>Appointments</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="./signout.php"><span>Sign Out</span></a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="container py-5" style="height: 100vh !important;">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6 col-xl-5 my-5 my-lg-0 text-center text-md-start">
                <h1 class="h1 light-text-color mt-0" id='header'></h1>
                </div>
            </div>
        </div>
    </header>
    <section class="light-gray-1">
        <div class="py-7">
            <div class="container py-5  py-md-7">
                <div class="row justify-content-center">
                    <div class="text-center col-lg-6">
                        <h2 class="h2 text-color">Viewing Appointment</h2>
                    </div>
                </div>
            </div>
            <div class="container mt-5" id="process_appt">
            </div>
            <div class="row align-items-stretch" id="medical_list">
            </div>
        </div>
    </section>
    <section class="dark-background-color" id="contact">
        <div class="container py-5 py-md-7">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-5 mb-4 mb-lg-0">
                    <h2 class="h2 light-text-color">Get In Touch</h2>
                    <p class="paragraph light-text-color" style="margin-top: 15px">Looking to partner with Pet Society? Submit your clinic’s contact information for further review!</p>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div class="form-group">
                        <div class="input-group input-style-2 mb-2 mr-sm-2"><input class="form-control" type="text"
                                placeholder="Your Email"></input>
                            <div class="input-group-append mt-2 mt-sm-0"><button
                                    class="btn primary-color h-100"><span>Submit</span></button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="position-relative">
        <div>
            <div class="container py-5 py-md-7">
                <div class="row justify-content-center align-items-stretch">
                    <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                        <h3 class="h3 text-color">Social Media</h3>
                        <p class="paragraph second-text-color mt-4">Check out our socials!</p>
                        <div class="card-content py-2 mt-4"><a class="facebook" href="#"><i
                                    class="bi bi-facebook icn-sm primary-text-color"></i></a><a class="instagram"
                                href="#"><i class="bi bi-instagram icn-sm primary-text-color"
                                    style="margin-left: 20px"></i></a><a class="twitter" href="#"><i
                                    class="bi bi-twitter icn-sm primary-text-color" style="margin-left: 20px"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                        <h3 class="h3 text-color">Company Info</h3>
                        <div class="links" style="margin-top: 20px"><a class="link second-text-color d-block"
                                href="#">About Us</a><a class="link second-text-color d-block" href="#"
                                style="margin-top: 10px">Contact</a><a class="link second-text-color d-block" href="#"
                                style="margin-top: 10px">We are hiring</a><a class="link second-text-color d-block"
                                href="#" style="margin-top: 10px">Blog</a></div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                        <h3 class="h3 text-color">Features</h3>
                        <div class="links" style="margin-top: 20px"><a class="link second-text-color d-block"
                                href="#">Appointment Booking</a><a class="link second-text-color d-block" href="#"
                                style="margin-top: 10px">User Analytics</a><a class="link second-text-color d-block"
                                href="#" style="margin-top: 10px">Live Chat</a><a class="link second-text-color d-block"
                                href="#" style="margin-top: 10px">Unlimited Support</a></div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h3 class="h3 text-color">Resources</h3>
                        <div class="links" style="margin-top: 20px"><a class="link second-text-color d-block"
                                href="#">IOS & Android</a><a class="link second-text-color d-block" href="#"
                                style="margin-top: 10px">Why Pet Society?</a><a class="link second-text-color d-block"
                                href="#" style="margin-top: 10px">Customers</a><a class="link second-text-color d-block"
                                href="#" style="margin-top: 10px">Clinics</a></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script>
        var current_clinic_username = sessionStorage.getItem('clinic_username');
        var current_clinic_name = sessionStorage.getItem('clinic_name');
        
        document.getElementById('header').innerHTML = `Welcome, ${current_clinic_name}`;

        var params = getSearchParameters();
        var booking_id = params.booking_id;

        var month = {
            "1": "January",
            "2": 'February',
            "3": "March",
            "4": "April",
            "5": "May",
            "6": "June",
            "7": "July",
            "8": "August",
            "9": "September",
            "10": "October",
            "11": "November",
            "12": "December"
        };

        const process_appt = document.getElementById('process_appt');
        const medical_list = document.getElementById('medical_list');

        url = 'http://localhost:5700/get_appt_info';

        var json = {
            'booking_id': booking_id
        }

        json = JSON.stringify(json)

        const response = fetch(url,{method: 'POST',
            headers: {
                "Content-Type": "application/json" 
            },
            body: json
        })
        .then((response) => response.json())
        .then((data) => {
            if(data["message"]){
                alert(data["message"]);
            }

            else {
                let user_name = data["data"]["user_result"]["data"].user_name
                let user_phone = data["data"]["user_result"]["data"].user_phone
                let pet_name = data["data"]["user_result"]["data"].pet_name
                let pet_type = data["data"]["user_result"]["data"].pet_type

                let booking_date = data["data"]["booking_result"]["data"].booking_date
                let booking_slot = data["data"]["booking_result"]["data"].booking_slot
                let clinic_service = data["data"]["booking_result"]["data"].clinic_service

                let display_date = booking_date.split("-")
                    
                display_date[1] = month[display_date[1]]
                let display_time = booking_slot + ":00hrs"
                
                process_appt.innerHTML = `
                    <div class="row align-items-stretch">
                        <div class="col-lg-12 mb-4 mb-lg-12">
                            <div class="d-flex card-item light-background-color" style="padding: 25px 25px">
                                <div class="d-flex"><i class="bi bi-chevron-right icn-xs primary-text-color"></i>
                                    <div style="margin-left: 20px">
                                            <h5 class="h5 text-color">Date: ${display_date[0]} ${display_date[1]} ${display_date[2]}</h5>
                                            <h6 class="h6 second-text-color" style="margin-top: 5px">Time: ${display_time}</h6>
                                            <h6 class="h6 second-text-color" style="margin-top: 5px">Service Type: ${clinic_service}</h6>
                                            <h6 class="h6 second-text-color" style="margin-top: 5px">Customer name: ${user_name}</h6>
                                            <h6 class="h6 second-text-color" style="margin-top: 5px">Contact Number: ${user_phone}</h6>
                                            <h6 class="h6 second-text-color" style="margin-top: 5px">Pet Name: ${pet_name}</h6>
                                            <h6 class="h6 second-text-color" style="margin-top: 5px">Pet Type: ${pet_type}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-content" style="margin-top: 40px">
                            <div class="form-group"><label class="h6">Remarks</label>
                                <div class="form-group" style="margin-top: 10px"><input class="form-control" type="text"
                                        placeholder="Remarks for completion of appointment" id='clinic_remarks'></input>
                                </div>
                        </div>
                        <div class="cta text-center" style="margin-top: 35px">
                            <button class="btn btn-danger btn-round mb-3 mb-sm-0"><span class="btn-text" onclick="cancel_booking_appt('${booking_id}')">Cancel Appointment</span></button>
                            <button class="btn primary-color btn-round mb-3 mb-sm-0"><span class="btn-text" onclick="process_booking_appt('${booking_id}')">Appointment Completed</span></button>
                        </div>
                    </div>`

                medical_list.innerHTML = `
                <div class="container py-5  py-md-7">
                    <div class="row justify-content-center">
                        <div class="text-center col-lg-6">
                        <h2 class="h2 text-color">List of past medical records for ${pet_name}</h2>
                        </div>
                    </div>
                </div>`
                
                if (data["data"]["medical_record_result"]["code"] == 200) {
                    for (var i = 0; i < data["data"]["medical_record_result"]["data"]["medical_record"].length; i++){
                        let medical_record_date = data["data"]["medical_record_result"]["data"]["medical_record"][i].booking_date
                        let medical_record_service = data["data"]["medical_record_result"]["data"]["medical_record"][i].clinic_service
                        let medical_record_slot = data["data"]["medical_record_result"]["data"]["medical_record"][i].medical_record_slot
                        let remarks = data["data"]["medical_record_result"]["data"]["medical_record"][i].remarks

                        let display_date1 = medical_record_date.split("-")
                        display_date1[1] = month[display_date1[1]]
                        let display_time1 = medical_record_slot + ":00hrs"

                        medical_list.innerHTML +=  `
                        <div class="col-lg-12 mb-4 mb-lg-12">
                            <div class="d-flex card-item light-background-color" style="padding: 25px 25px">
                                <div class="d-flex"><i class="bi bi-chevron-right icn-xs primary-text-color"></i>
                                    <div style="margin-left: 20px">
                                        <h5 class="h5 text-color">Date: ${display_date1[0]} ${display_date1[1]} ${display_date1[2]}</h5>
                                        <h6 class="h6 second-text-color" style="margin-top: 5px">Service Type: ${medical_record_service}</h6>
                                        <h6 class="h6 second-text-color" style="margin-top: 5px">Remarks: ${remarks}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>`
                    }
                } else {
                    medical_list.innerHTML = `
                    <div class="container py-5  py-md-7">
                        <div class="row justify-content-center">
                            <div class="text-center col-lg-6">
                            <h2 class="h2 text-color">No medical records found for ${pet_name}</h2>
                            </div>
                        </div>
                    </div>`;
                }
            }
        })

        function getSearchParameters() {
            var prmstr = window.location.search.substr(1);
            return prmstr != null && prmstr != "" ? transformToAssocArray(prmstr) : {};
        }

        function transformToAssocArray( prmstr ) {
            var params = {};
            var prmarr = prmstr.split("&");
            for ( var i = 0; i < prmarr.length; i++) {
                var tmparr = prmarr[i].split("=");
                params[tmparr[0]] = tmparr[1];
            }
            return params;
        }

        function cancel_booking_appt(booking_id) {
            url = 'http://localhost:5600/cancel_late_appt'

            json = {
                'booking_id': booking_id
            };

            json = JSON.stringify(json);

            const response = fetch(url,{method: 'POST',
                headers: {
                    "Content-Type": "application/json" 
                },
                body: json
            })
            .then((response) => response.json())
            .then((data) => {
                if(data["code"] == 200){
                    alert(data["message"]);
                    location.href = `./clinic_appointments.php`;
                }

                else{
                    alert('An error occured while cancelling appointment. ' + data['message']);
                }
            })
        }

        function process_booking_appt(booking_id) {
            url = 'http://localhost:5500/appt_recorded'
            
            let clinic_remarks = document.getElementById('clinic_remarks').value

            json = {
                'booking_id': booking_id,
                'remarks': clinic_remarks
            };

            json = JSON.stringify(json);

            const response = fetch(url,{method: 'POST',
                headers: {
                    "Content-Type": "application/json" 
                },
                body: json
            })
            .then((response) => response.json())
            .then((data) => {
                if(data["code"] == 201){
                    alert("Appointment has been processed. Redirecting to list of appointments page.");
                    location.href = `./clinic_appointments.php`;
                }

                else{
                    alert('An error occured while processing appointment. ' + data['message']);
                }
            })
        }

    </script>
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/aos.js"></script>
    <script src="../js/tools.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>