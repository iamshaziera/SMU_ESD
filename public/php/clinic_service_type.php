<!-- add in php session_start if needed -->

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <title>Service Type</title>
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
                src="../img/white_cat.jpg"></img>
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
                        <li class="nav-item"><a class="nav-link" href="./user_appointments.php"><span>Home</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="./user_profile.php"><span>My Profile</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="./signout.php"><span>Log Out</span></a></li>
                    </ul>
                </div>
            </nav>
        </div>
       
        <div class="container py-7 py-lg-9" style="height: 100%;">
            <div class="row">
                    <h5 style="color: #FFFFFF; margin-top: 10px">Please select service type:</h5>
            </div>
            <div class="row align-items-stretch mt-5 mt-lg-9">
                <div class="col-lg-3 mb-3 mb-lg-0">
                    <div class="card round">
                        <div class="d-flex align-items-center disabled-element-color" style="padding: 30px 30px">
                            <div class="icn-circle circle-sm light-background-color"><i
                                    class="bi bi-heart-half icn-sm primary-text-color"></i></div>
                            <div style="margin-left: 15px; width: 70%">
                                <h5 class="h5 light-text-color">Health Check-Up
                                </h5>
                            </div>
                        </div>
                        <div class="card-content round" style="padding: 30px 30px">
                            <h6 class="h6 second-text-color">- Routine wellness examination</h6>
                            <h6 class="h6 second-text-color" style="margin-top: 5px">- Physical examination</h6>
                            <h6 class="h6 second-text-color" style="margin-top: 5px">- Chest X-ray</h6>
                            <h6 class="h6 second-text-color" style="margin-top: 5px">- Blood Test</h6>
                        </div>
                        <div class="text-center" style="margin-bottom: 20px;">
                        <button class="btn btn-outline-primary btn-round mb-3 mb-sm-0" onclick="clinic_service_type('Health Check-Up')">Book</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-3 mb-lg-0">
                    <div class="card round">
                        <div class="d-flex align-items-center disabled-element-color" style="padding: 30px 30px">
                            <div class="icn-circle circle-sm light-background-color"><i
                                    class="bi bi-bug icn-sm primary-text-color"></i></div>
                            <div style="margin-left: 15px; width: 70%">
                                <h5 class="h5 light-text-color">Skin & Ears
                                </h5>
                            </div>
                        </div>
                        <div class="card-content round" style="padding: 30px 30px">
                            <h6 class="h6 second-text-color" style="margin-top: 5px">- Skin & Fur examination</h6>
                            <h6 class="h6 second-text-color" style="margin-top: 5px">- Ear examination</h6>
                            <h6 class="h6 second-text-color" style="margin-top: 5px">- Infection treatment</h6>
                            <h6 class="h6 second-text-color" style="margin-top: 5px">- Cleaning services</h6>
                        </div>
                        <div class="text-center" style="margin-bottom: 20px;">
                            <button class="btn btn-outline-primary btn-round mb-3 mb-sm-0" onclick="clinic_service_type('Skin and Ears')">Book</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-3 mb-lg-0">
                    <div class="card round">
                        <div class="d-flex align-items-center disabled-element-color" style="padding: 30px 30px">
                            <div class="icn-circle circle-sm light-background-color"><i
                                    class="bi bi-file-medical icn-sm primary-text-color"></i></div>
                            <div style="margin-left: 15px; width: 70%">
                                <h5 class="h5 light-text-color">Unwell</h5>
                            </div>
                        </div>
                        <div class="card-content round" style="padding: 30px 30px">
                            <h6 class="h6 second-text-color" style="margin-top: 5px">- General consultation</h6>
                            <h6 class="h6 second-text-color" style="margin-top: 5px">- Flu examination</h6>
                            <h6 class="h6 second-text-color" style="margin-top: 5px">- Medication</h6>
                            <h6 class="h6 second-text-color" style="margin-top: 5px">- Treatment</h6>
                        </div>
                        <div class="text-center" style="margin-bottom: 20px;">
                            <button class="btn btn-outline-primary btn-round mb-3 mb-sm-0" onclick="clinic_service_type('Unwell')">Book</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-3 mb-lg-0">
                    <div class="card round">
                        <div class="d-flex align-items-center disabled-element-color" style="padding: 30px 30px">
                            <div class="icn-circle circle-sm light-background-color"><i
                                    class="bi bi-droplet icn-sm primary-text-color"></i></div>
                            <div style="margin-left: 15px; width: 70%">
                                <h5 class="h5 light-text-color">Vaccinations
                                </h5>
                            </div>
                        </div>
                        <div class="card-content round" style="padding: 30px 30px">
                            <h6 class="h6 second-text-color" style="margin-top: 5px">- Titre test</h6>
                            <h6 class="h6 second-text-color" style="margin-top: 5px">- Canine Parvovirus Vaccine</h6>
                            <h6 class="h6 second-text-color" style="margin-top: 5px">- Canine Distemper Vaccine</h6>
                            <h6 class="h6 second-text-color" style="margin-top: 5px">- Annual Booster Vaccination</h6>
                        </div>
                        <div class="text-center" style="margin-bottom: 20px;">
                            <button class="btn btn-outline-primary btn-round mb-3 mb-sm-0 mx-auto" onclick="clinic_service_type('Vaccinations')">Book</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </header>

    <script>
        function clinic_service_type(clinic_service_type) {
            sessionStorage.setItem('clinic_service', clinic_service_type);
            location.href = `./user_select_datetime.php`;
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