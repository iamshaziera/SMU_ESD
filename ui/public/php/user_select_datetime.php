<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <title>Select appointment details</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/animate.min.css">
    <link rel="stylesheet" href="../css/aos.css">
    <link rel="stylesheet" href="../css/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="../css/jquery.datetimepicker.css"/>
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
                        <li class="nav-item"><a class="nav-link" href="./signout.php"><span>Sign Out</span></a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="container py-5">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6 col-xl-5 my-5 my-lg-0 text-center text-md-start">
                    <h1 class="h1 light-text-color mt-0">Book Your Appointment</h1>         
                </div>

              </div>
          </div>
      </header>

    <section>
        <div class="container py-7 py-lg-9">

            <div class="row justify-content-center">
                <div class="text-center col-lg-6">
                    <h2 class="h2 text-color">Choose a date and time</h2>  
                </div>
            </div>
            
            
          <!--Added DatePicker jQuery-->
          <form method="POST">
            <div class="form-group" style="margin-left: 35%; margin-top: 5%;">
              <input class="form-control" type="text" id="demo"/>
            </div>
          </form>

          <!--Proceed Button Leads to booking details page; Removed form -->
          <div class="text-center">
              <div class="form-group cta" style="margin-top: 35px">
                <button class="btn primary-color btn-round mb-3 mb-sm-0" onclick="proceed()"><span class="btn-text">Proceed</span></button>
              </div>
            </div>

        </div>
    </section>
 
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/aos.js"></script>
    <script src="../js/tools.js"></script>

    <!--Added DatePicker jQuery-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    <script src="../js/jquery.datetimepicker.js"></script>
    <script src="../js/moment.js"></script>

    <script>
        let clinic_username = sessionStorage.getItem("clinic_username");
        url = 'http://localhost:5100/clinic_booking/' + clinic_username;

        const response = fetch(url)
        .then((response) => response.json())
        .then((data) => {
            if (data["code"] != 200){
                var avail_slots = [9, 10, 11, 13, 14, 15, 16];

                $.datetimepicker.setDateFormatter('moment');

                $('#demo').datetimepicker({
                    inline:true,
                    allowTimes: avail_slots
                });

                $(function() {
                    $( "#demo" ).datetimepicker({
                        dateFormat: "yy-mm-dd", timeFormat: "hh:mm:ss",
                        numberOfMonths: 3,
                        showButtonPanel: true,
                        minDate: dateToday
                    });

                    $("#demo").on("change",function(){
                        var selected = $(this).val();
                        var datetime = selected;
                        var date = datetime.split(' ')[0].split('/');

                        var year = date[0];
                        var month = parseInt(date[1]);
                        var day = date[2];

                        var format_date = day + '-' + month + '-' + year;

                        var time = datetime.split(' ')[1].split(':')[0];

                        sessionStorage.setItem("booking_date", format_date);
                        sessionStorage.setItem("booking_slot", time);
                    });
                });
            }

            else {
                var dateToday = new Date($.now());

                var month = dateToday.getMonth() + 1;
                var year = dateToday.getFullYear();
                var day = dateToday.getDate();
                var hour = dateToday.getHours() + 1;

                var current_date = day + '-' + month + '-' + year;
                
                var taken_slot = [];
                var avail_slots = [];
                var all_slots = [9, 10, 11, 13, 14, 15, 16];

                for (var i = 0; i < data["data"]["booking"].length; i++){
                    let booking_slot = data["data"]["booking"][i].booking_slot;

                    if (data["data"]["booking"]['booking_date'] == current_date && booking_slot > hour) {
                        taken_slot.push(booking_slot)
                    };
                };

                for (slot of all_slots) {
                    if (! taken_slot.includes(slot)) {
                        avail_slots.push(slot);
                    }
                };

                $.datetimepicker.setDateFormatter('moment');

                $('#demo').datetimepicker({
                    inline:true,
                    allowTimes: avail_slots
                });

                $(function() {
                    $( "#demo" ).datetimepicker({
                        dateFormat: "yy-mm-dd", timeFormat: "hh:mm:ss",
                        numberOfMonths: 3,
                        showButtonPanel: true,
                        minDate: dateToday
                    });

                    $("#demo").on("change",function(){
                        var selected = $(this).val();
                        var datetime = selected;
                        var date = datetime.split(' ')[0].split('/');

                        var year = date[0];
                        var month = parseInt(date[1]);
                        var day = date[2];

                        var format_date = day + '-' + month + '-' + year;

                        var time = datetime.split(' ')[1].split(':')[0];

                        var taken_slot = [];
                        var avail_slots = [];
                        var all_slots = [9, 10, 11, 13, 14, 15, 16];   

                        for (var i = 0; i < data["data"]["booking"].length; i++){
                            let booking_slot = data["data"]["booking"][i].booking_slot

                            if (data["data"]["booking"]['booking_date'] == format_date) {
                                taken_slot.push(booking_slot)
                            };
                        };

                        for (slot of all_slots) {
                            if (! taken_slot.includes(slot)) {
                                avail_slots.push(slot)
                            }
                        };

                        $('#demo').datetimepicker({
                            inline:true,
                            allowTimes: avail_slots
                        });

                        sessionStorage.setItem("booking_date", format_date);
                        sessionStorage.setItem("booking_slot", time);
                    });
                });
            }
        });

        function proceed(){
            location.href = `./booking_details.php`;
        };

    </script>
    <script>
        AOS.init();
    </script>    
</body>

</html>