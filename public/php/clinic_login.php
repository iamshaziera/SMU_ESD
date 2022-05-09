<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <title>Clinic Login</title>
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
                src="../img/clinicdog.jpg"></img>
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
                        <li class="nav-item"><a class="nav-link" href="./user_signup.php"><span>Sign Up</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="./index.php"><span>Login</span></a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="container py-5" style="height: 100%;">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6 col-xl-5 my-5 my-lg-0 text-center text-md-start">
                    <h1 class="h1 light-text-color mt-0">Welcome back to Pet Society</h1>
                    <h4 class="h4 light-text-color" style="margin-top: 35px">To view all appointments, please login with your existing account.</h4>
                    <h4 class="h4 light-text-color" style="margin-top: 35px">New to Pet Society? Sign up for free!</h4>
                    <div class="cta" style="margin-top: 35px"><a href="./clinic_signup.php"><button
                            class="btn primary-color btn-round mb-3 mb-sm-0"><span class="btn-text">Clinic Sign Up</span></button></a><a href="./index.php"><button
                            class="btn light-text-color btn-round btn-outline mb-3 mb-sm-0 mx-2"><span
                                class="btn-text">Not a clinic? Click me!</span></button></a></div>
                </div>
                <div class="col-lg-6 col-xl-4">
                    <div class="card-item round light-background-color" style="padding: 40px 40px">
                        <h3 class="h3 text-color text-center">Clinic Login</h3>
                        <div class="card-content" style="margin-top: 40px">
                            <div class="form-group"><label class="h6">Clinic username</label>
                                <div class="form-group" style="margin-top: 10px"><input class="form-control" type="text"
                                        placeholder="Username" id='clinic_username'></input></div>
                            </div>
                            <div class="form-group"><label class="h6">Password</label>
                                <div class="form-group" style="margin-top: 10px"><input class="form-control" type="password"
                                        placeholder="********" id='clinic_password'></input></div>
                            </div>
                        </div>
                        <button class="btn primary-color w-100" style="margin-top: 40px" onclick="login()"><span>Log In</span></button>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="dark-background-color" id="contact">
        <div class="container py-5 py-md-7">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-5 mb-4 mb-lg-0">
                    <h2 class="h2 light-text-color">Get In Touch</h2>
                    <p class="paragraph light-text-color" style="margin-top: 15px">Looking to partner with Pet Society? Contact us now!</p>
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

        function login(){
            let clinic_username = document.getElementById('clinic_username').value;
            let clinic_password = document.getElementById('clinic_password').value;

            if (clinic_username == "" || clinic_password == ""){
                window.alert("Please fill in all the fields!");
                return false;
            }

            url = 'http://localhost:5000/clinic_login';

            json = {
                'clinic_username': clinic_username,
                'clinic_password': clinic_password,
            };

            json = JSON.stringify(json);

            const response = fetch(url, {method: 'POST',
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

                else{
                    alert("Successfully logged in!");
                    sessionStorage.clear();
                    sessionStorage.setItem("clinic_name", data.data['clinic_name'])
                    sessionStorage.setItem("clinic_username", clinic_username)
                    location.href = "./clinic_appointments.php"
                }
            });
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