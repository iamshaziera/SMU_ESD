<!DOCTYPE html>
<php class="no-js" lang="en">

<head>
    <title>User Information</title>
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
                src="../img/catappt.jpg"></img>
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
                        <li class="nav-item"><a class="nav-link" href="./signout.php"><span>Sign Out</span></a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="container py-5" style="height: 100vh !important;">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6 col-xl-5 my-5 my-lg-0 text-center text-md-start">
                    <h1 class="h1 light-text-color mt-0" id="user_name"></h1>

                    <h4 class="h4 light-text-color" style="margin-top: 35px">View you & your fur friend(s) details here!</h4>
                </div>
            </div>
        </div>
    </header>
    <section class="light-gray-1">
        <div class="py-7">
            <div class="container py-5  py-md-7">
                <div class="row justify-content-center">
                    <div class="text-center col-lg-6">
                        <h2 class="h2 text-color">User Account Information</h2>
                    </div>
                </div>
            </div>
            <div class="container mt-5">
                <div class="row align-items-stretch">
                    <div class="col-lg-12 mb-4 mb-lg-12">
                        <div class="d-flex card-item light-background-color" style="padding: 25px 25px">
                            <div class="d-flex"><i class="bi bi-chevron-right icn-xs primary-text-color"></i>
                                <div style="margin-left: 20px">
                                    <h5 class="h5 text-color" id="user_name1"></h5>
                                    <h6 class="h6 second-text-color" style="margin-top: 5px" id="user_phone"></h6>
                                    <h6 class="h6 second-text-color" style="margin-top: 5px" id="pet_name"></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 mb-4 mb-lg-12">
                        <div class="d-flex card-item light-background-color" style="padding: 25px 25px">
                            <div class="d-flex"><i class="bi bi-chevron-right icn-xs primary-text-color"></i>
                                <div style="margin-left: 20px">
                                    <h5 class="h5 text-color" id="pet_name1"></h5>
                                    <h6 class="h6 second-text-color" style="margin-top: 5px" id="pet_type"></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cta text-center" style="margin-top: 35px">
                        <a href="./user_appointments.php">
                        <button class="btn primary-color btn-round mb-3 mb-sm-0"><span class="btn-text">View my appointment(s)</span></button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
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

    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/aos.js"></script>
    <script src="../js/tools.js"></script>
    <script>
        AOS.init();
    </script>

    <script>
        function return_clinics() {
            location.href = './user_nearestclinics.php';
        }
    </script>

    <script>
    let user_username = sessionStorage.getItem("user_username")
        url = 'http://localhost:5200/user/' + user_username;

        const response = fetch(url)
        .then((response) => response.json())
        .then((data) => {
            if (data["code"] != 200){
                alert(data["message"]);
            }

            else {
                console.log(data.data)
                user = data.data;

                let user_name = user.user_name;
                let user_phone = user.user_phone;
                let pet_name = user.pet_name;
                let pet_type = user.pet_type;

                document.getElementById("user_name").innerText = "Hello " + user_name + "!"
                document.getElementById("user_name1").innerText = "Name: " + user_name
                document.getElementById("user_phone").innerText = "Contact: " + user_phone
                document.getElementById("pet_name").innerText = "Pet Name: " + pet_name
                document.getElementById("pet_name1").innerText = "Pet Name: " + pet_name
                document.getElementById("pet_type").innerText = "Pet Type: " + pet_type
            }
        });


    </script>

</body>
</html>