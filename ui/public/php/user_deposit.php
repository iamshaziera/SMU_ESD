<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <!--Install jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
    
    <title>Deposit Details</title>
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

        <div class="container py-7 py-lg-9" style="height: 100vh !important;">
            <div class="col-lg mb-3 mb-lg-0 mx-auto">
                <div class="card round">
                    <div class="d-flex align-items-center disabled-element-color" style="padding: 30px 30px">
                        <div class="icn-circle circle-sm light-background-color">
                            <i class="bi bi-credit-card icn-sm primary-text-color"></i>
                        </div>
                        <div style="margin-left: 15px; width: 70%">
                            <h5 class="h5 light-text-color">Deposit Payment for Appointment Booking</h5>
                        </div>
                    </div>
                    <div class="card-content round" style="padding: 30px 30px">
                        <div class="row" style="margin-bottom: 30px;">
                            <h4 style="color: #2A9AFF; font-weight: bold;">Please pay a total of: $20</h4>
                        </div>

                        <div class="row" style="margin-top: 10px;">
                            <label for="card-element">Credit or debit card</label>
                            <div id="card-element">
                                <!-- A Stripe Element will be inserted here. -->
                            </div> 

                            <!-- Used to display form errors. -->
                            <div id="card-errors" role="alert">
                            </div>

                            <div class="text-center" style="margin-bottom: 20px;"> 
                                <button class="btn btn-primary btn-round mb-3 mb-sm-0" id='pay_button'>Submit Payment</button>
                            <div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <script type="text/javascript">

    // Get from session (now hardcoded)
    let booking_id = sessionStorage.getItem("booking_id");

    // Create an instance of the Stripe object with your publishable API key
    var stripe = Stripe("pk_test_51IcMyPFMysEzEoLdpLl0VhnjnFo5Nxf4EZQZx50XteM60MuNGrKXaBC3jrl6EcA1k8kneEtrLdTeE5nVwbpf88mH00o72MAdzn");

    // Create an instance of Elements.
    var elements = stripe.elements();

    // Style for card-element; form for card details
    var style = {
        base: {
            color: '#32325d',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                    color: '#aab7c4'
                }
        },

        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };

    // Create an instance of the card Element.
    var card = elements.create('card', { style: style });

    // // Add an instance of the card Element into the `card-element` <div>.
    card.mount('#card-element');

    // Handle real-time validation errors from the card Element.
    card.addEventListener('change', function (event) {  
        var displayError = document.getElementById('card-errors');

        if (event.error) {
            console.log(event.error)
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    // Handle form submission.
    var form = document.getElementById('pay_button');

    form.addEventListener("click", function (event) {
        event.preventDefault();
        stripe.createToken(card).then(function (result) {
        if (result.error) {
            // Inform the user if there was an error.
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = result.error.message;
            console.log('result.error:', result.error);
        } else {
            // Send the token to your server.
            stripeTokenHandler(result.token);
        }
        });
    });

    // Submit the form with the token ID.
    async function stripeTokenHandler(token) {
        var response_data;
        var errorElement = document.getElementById('card-errors');

        // Submit the form
        var amount= 2000;
        var serviceURL = 'http://localhost:5900/payment_management';
        
        try {
            errorElement.textContent = "";

            const response =
                await fetch(
                    serviceURL, { 
                        method: "POST" , 
                        headers: {
                            'Content-Type': "application/json"
                        },

                        // Need to add in booking_id and user_id 
                        body: JSON.stringify({
                            stripeToken: token.id,
                            amount: amount,
                            booking_id: booking_id
                        })  
                    }   
                ).then(response => {return response.json()}).then(body => {response_data = body});

            // If there is error, display error on the same page 
            // Considering to redirect it to the booking_details page 

            try {
                if (typeof response_data.data.payment_result.error.message !== 'undefined') {
                    errorElement.textContent = response_data.data.payment_result.error.message
                }
            }

            catch(e) {}

            try {
                if (response_data.data.payment_result.result.status === "succeeded") {
                    location.href = "./booking_confirmed.php";
                }
            }

            catch(e){}

        } catch (error) {
            // Errors when calling the service; such as network error, 
            // service offline, etc
            showError('There is a problem retrieving data, please try again later.<br />' + error);
        }
    
    }
    </script>

    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/aos.js"></script>
    <script src="../js/tools.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>