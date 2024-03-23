<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="assets/css/login.css">

    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>


    <title>ATOM 2K24 - LOGIN</title>

    <script type="text/javascript">
    $(document).ready(function() {

        $("#loginbtn").click(function() {

            email = $("#uemail").val();
            password = $("#upassword").val();
            $.ajax({
                type: "POST",
                url: "pcheck.php",
                data: "email=" + email + "&password=" + password,
                success: function(html) {
                    if (html == 'true') {

                        $("#add_err1").html('<div class="alert alert-success"> \
                                                        <strong>Authenticated</strong> \ \
                                                    </div>');

                        window.location.href = "events.php";

                    } else if (html == 'false') {
                        $("#add_err1").html('<div class="alert alert-danger"> \
                                                        <strong>Email not found!</strong> \ \
                                                    </div>');


                    } else if (html == 'pass') {
                        $("#add_err1").html('<div class="alert alert-danger"> \
                                                        <strong>Wrong Password!</strong> \ \
                                                    </div>');


                    } else {
                        // $("#add_err1").html('<div class="alert alert-danger"> \
                        //                         <strong>Error</strong> processing request. Please try again. \ \
                        //                     </div>');
                        $('#add_err1').html('<div class="alert alert-success"> \
                                                        <strong>' + html + '</strong> \ \
                                                    </div>');

                    }
                },
                beforeSend: function() {
                    $("#add_err1").html("loading...");
                }
            });
            return false;
        });
    });
    </script>

    <script type="text/javascript">
    $(document).ready(function() {
        // Submit form data via Ajax
        $("#supForm").on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'adduser.php',
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('.submitBtn').attr("disabled", "disabled");
                    // $('#add_err2').html('<p>Loading...</p>');
                },
                success: function(response) {
                    console.log(response);
                    if (response[status] == 1) {
                        $('#supForm')[0].reset();
                        $('#add_err2').html('<div class="alert alert-success"> \
                                                        <strong>' + response.message + '</strong> \ \
                                                    </div>');
                        window.location.href = "index.php";
                    } else {
                        $('#add_err2').html('<div class="alert alert-danger"> \
                                                        <strong>' + response.message + '</strong> \ \
                                                    </div>');
                        alert(response[message]);
                    }
                    $('#supForm').css("opacity", "");
                    $(".submitBtn").removeAttr(
                        "disabled");
                }
            });
        });
    });
    </script>
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form class="sign-in-form" method="post" style="margin-top: 60px;">
                    <h2 class="title">Login</h2>
                    <div style="color: #85bfff" id="add_err1"></div>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Email" id="uemail" name="uemail" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" id="upassword" name="upassword" required />
                    </div>
                    <!-- <input type="submit" name="Login" class="btn solid" /> -->
                    <button class="btn solid" name="submit" id="loginbtn">Login</button>
                </form>



                <form id="supForm" class="sign-up-form" method="post">
                    <h2 class="title">Sign up</h2>
                    <div style="color: #c7c7c7" id="add_err2"></div>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Username" for="name" name="name" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" placeholder="Email" for="email" name="email" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-phone"></i>
                        <input type="number" placeholder="Phone" for="mobile" name="mobile" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" for="password" name="password" required />
                    </div>
                    <button class="btn signupbtn" name="submit" id="signup">Sign Up</button>
                </form>
            </div>
        </div>
        <div class="panels-container">

            <div class="panel left-panel">
                <div class="content">
                    <h3>New here ?</h3>
                    <p>
                        Let us rock in this ATOM 2K24
                    </p>
                    <button class="btn transparent" id="sign-up-btn">
                        Sign up
                    </button>
                </div>
                <img src="assets/img/undraw_geniuses_9h9g.svg" class="image" alt="" />
            </div>
            <div class="panel right-panel" >
                <div class="content">
                    <h3>One of us ?</h3>
                    <p>

                    </p>
                    <button class="btn transparent" id="sign-in-btn">
                        Login
                    </button>
                </div>
                <img src="assets/img/undraw_welcome_cats_thqn.svg" class="image" alt="" />
            </div>
        </div>
    </div>

    <script src="assets/js/app.js"></script>
    <script>
    jQuery(document).ready(function($) {
        "use strict"
        $("#loader").delay(1000).fadeOut("slow");
    });
    </script>
</body>

</html>