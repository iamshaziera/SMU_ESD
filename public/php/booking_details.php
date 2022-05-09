<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <title>Booking Details</title>
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
        <div class="background position-absolute z-index_-1 w-100 h-100">
            <img class="cover" src="../img/white_cat.jpg"></img>
            <div class="filter basic"></div>
        </div>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark py-4">
                <a class="navbar-brand" href="#">
                    <h1 class="h3 mt-0">Pet Society</h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-target="#navbarSupportedContent"
                    data-bs-toggle="collapse" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse ms-lg-5  mt-4 mt-lg-0" id="navbarSupportedContent">
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item"><a class="nav-link" href="./user_appointments.php"><span>Home</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="./user_profile.php"><span>My Profile</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="./signout.php"><span>Sign Out</span></a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="container py-7 py-lg-9" style="height: 100%;">
            <div class="col-lg mb-3 mb-lg-0 mx-auto">
                <div class="card round">
                    <div class="d-flex align-items-center disabled-element-color" style="padding: 30px 30px">
                        <div class="icn-circle circle-sm light-background-color">
                            <i class="bi bi-calendar-week icn-sm primary-text-color"></i>
                        </div>
                        <div style="margin-left: 15px; width: 70%">
                            <h5 class="h5 light-text-color">Booking Details</h5>
                        </div>
                    </div>
                    <div class="card-content round" style="padding: 30px 30px">
                        <div>
                            <div class="row">
                                <label style="color: #2A9AFF; font-weight: bold;">You Selected</label>
                            </div>
                            <div class="row">
                                <label class="col-sm-2" style="color: #23A6F0;" >Date</label>
                                <div class="col-sm-10">
                                    <label style="font-weight: bold;" id="date"></label>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2" style="color: #23A6F0;">Time</label>
                                <div class="col-sm-10">
                                    <label style="font-weight: bold;" id="time"></label>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2" style="color: #23A6F0;">Type</label>
                                <div class="col-sm-10">
                                    <label style="font-weight: bold;" id="service_type"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center" style="margin-bottom: 20px;">
                        <button class="btn btn-primary btn-round mb-3 mb-sm-0" onclick="proceed()">Proceed to Payment</button>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <script>
        let clinic_username = sessionStorage.getItem("clinic_username");
        let user_username = sessionStorage.getItem("user_username");
        let clinic_service = sessionStorage.getItem("clinic_service");
        let booking_date = sessionStorage.getItem("booking_date");
        let booking_slot = sessionStorage.getItem("booking_slot");

        document.getElementById("service_type").innerText = clinic_service;
        document.getElementById("date").innerText = booking_date;
        document.getElementById("time").innerText = booking_slot + '00 hrs';

        function proceed() {
            url = 'http://localhost:5100/create_booking';

            json = {
                'clinic_username': clinic_username,
                'user_username': user_username,
                "booking_date": booking_date,
                "booking_slot": booking_slot, 
                "clinic_service": clinic_service
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
                if (data["code"] != 201) {
                    alert(data["message"]);
                }

                else {
                    sessionStorage.setItem("booking_id", data["data"].booking_id);
                    location.href = './user_deposit.php'
                }
            })
        };
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