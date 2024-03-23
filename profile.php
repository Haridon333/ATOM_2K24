<?php
@ob_start();
session_start();

// $email = $_SESSION['email'];

if (isset($_SESSION['email'])) {

  $email = $_SESSION['email'];

  include_once 'includes/dbh.inc.php';


  $query = "SELECT * FROM members WHERE email = '$email'";
  $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
  $num_row = mysqli_num_rows($result);
  $row = mysqli_fetch_array($result);

  if ($num_row >= 1) {

    $_SESSION['login'] = $row['id'];
    $id = $row['id'];
    $_SESSION['fname'] = $row['fname'];
    $_SESSION['mobile'] = $row['mobile'];
    $_SESSION['events'] = $row['events'];
    $_SESSION['flagship'] = $row['flagship'];
  } else {
    echo 'false';
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link href="assets/atom2k23.ico" rel="icon">
    <title>ATOM 2K24</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.ico" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Play:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a74d0f3882.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

    <!-- Font Awesome Icons-->
    <script src="https://kit.fontawesome.com/a74d0f3882.js" crossorigin="anonymous"></script>

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Imprima&family=Nova+Round&family=Poppins&family=Raleway&family=Roboto&family=Shippori+Antique&family=Stoke&display=swap"
        rel="stylesheet">


    <link rel="stylesheet" href="assets/css/profile.css">

    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- <script type="text/javascript">
      $(document).ready(function() {

        $("#paybtn").click(function() {
          type = "GEN";
          $.ajax({
            type: "POST",
            url: "modules/pay_process.php",
            data: "type=" + type,
            success: function(html) {
              if (html == 'false') {
                $("#add_err1").html('<div class="alert alert-danger"> \
													<strong>Please Try Again Later.</strong> \ \
												</div>');

                window.location.href = "profile.php";

              } else {
                window.location.href = html;
              }
            },
            beforeSend: function() {
              $("#add_err1").html("Loading...");
            }
          });
          return false;
        });
      });
    </script> -->
    <script type="text/javascript">
    $(document).ready(function() {

        $("#save").click(function() {
            name = $("#name").val();
            email = $("#email").val();
            number = $("#number").val();
            passwd = $("#passwd").val();

            $.ajax({
                type: "POST",
                url: "edit_profile.php",
                data: "name=" + name + "&email=" + email + "&number=" + number + "&passwd=" +
                    passwd,
                success: function(html) {
                    alert(html);
                    window.location.href = "profile.php";
                },

                beforeSend: function() {
                    $("#add_err2").html("Loading...");
                }
            });
            return false;
        });
    });
    </script>

    <style>
    @font-face {
        font-family: FlareReg;
        src: url('assets/fonts/Flare-Regular.otf');
    }

    @font-face {
        font-family: lemonmilk;
        src: url('assets/fonts/LemonMilkRegular.ttf');
    }
    </style>
    <style>
    @font-face {
        font-family: AquireBold;
        src: url('assets/fonts/AquireBold.otf');
    }

    @font-face {
        font-family: MonumentReg;
        src: url('assets/fonts/MonumentExtended-Regular.otf');
    }


    @font-face {
        font-family: FlareReg;
        src: url('assets/fonts/Flare-Regular.otf');
    }

    @font-face {
        font-family: Aquatico;
        src: url('assets/fonts/Aquatico-Regular.otf');
    }

    @font-face {
        font-family: production;
        src: url('assets/fonts/production.ttf');
    }
    </style>

</head>



<body>

    <div id="loader">
        <div class="center">
            <div class="nulled-loader">
                <div class="nulled-inner nulled-one"></div>
                <div class="nulled-inner nulled-two"></div>
                <div class="nulled-inner nulled-three"></div>
            </div>
        </div>
    </div>


    <section>
        <header class="m-0">
            <div id="header2" class="d-flex align-items-center header2 ">
                <div class="container d-flex align-items-center justify-content-center mt-4">


                    <h1 style="font-family:'lemonmilk'; color:#ffd6d6;">PROFILE</h1>
                    <!-- Uncomment below if you prefer to use an image logo -->
                    <!-- <a href="index.php"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
                    <!--onclick="history.back()" -->

                </div>
                <button class="homebtn" title="Home" onclick="history.back()"><i class="fas fa-reply"
                        aria-hidden="true"></i></button>
            </div>
        </header>
        <div class="container">
            <div class="main-body">
                <!-- /Breadcrumb -->

                <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                        <div class="card minheight">
                            <div class="card-body d-flex align-items-center justify-content-center text-center">
                                <div class="d-flex flex-column align-items-center text-center pad-15">
                                    <!-- <img src="assets/img/gender-neutral-user.png" class="img-radius" alt="User-Profile-Image" style="min-width: 75px"> -->
                                    <!-- <i class="fa-solid fa-user" style="font-size:50px;"></i> -->
                                    <div style="width:100px;height:100px;margin-bottom:50px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="#ffd6d6">
                                            <!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                            <path
                                                d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                                        </svg>
                                    </div>
                                    <div class="mt-3">
                                        <h4 style="text-align:center;">
                                            <?php echo $_SESSION['fname']; ?>
                                        </h4>


                                        <p class="text-muted font-size-sm">
                                            PSG COLLEGE OF TECHNOLOGY
                                        </p>
                                        <div class="btns d-flex flex-row justify-content-center">
                                            <button type="button" class="editBtn" data-toggle="modal"
                                                data-target="#Edit">Edit</button>
                                            <a href="logout.php" class="logoutbutton" type="button"
                                                style="text-decoration:none;"><button type="button"
                                                    class="logoutBtn">Logout</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-sm-4">
                                        <h6 class="mb-0">ATOM ID</h6>
                                    </div>
                                    <div class="col-sm-8 text-secondary">
                                        <?php echo "ATOM23" . $_SESSION['login']; ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-8 text-secondary">
                                        <?php echo $_SESSION['email']; ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <h6 class="mb-0">Phone</h6>
                                    </div>
                                    <div class="col-sm-8 text-secondary">
                                        <?php echo $_SESSION['mobile']; ?>
                                    </div>
                                </div>
                                <hr>
                                </br>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
            <div class="card h-100" >
                <div class="card-body">
                    <h5 class="d-flex align-items-center col-sm"><i class="material-icons text-danger mr-2">EVENTS</i>
                    </h5>
                    <hr>
                    <ul>
                    <?php
                        $query3 = "SELECT * FROM events WHERE email = '$email'";
                        $result3 = mysqli_query($conn, $query3) or die(mysqli_error($conn));
                        $row3 = mysqli_fetch_array($result3);
                        $fs_arr = explode(", ", $_SESSION['events']);
                        $num3 = count($fs_arr);
                        for ($i = 0; $i < $num3 - 1; $i++) {
                          $fs_name = $fs_arr[$i];
                          if ($row3[$fs_name] == "yes") {
                            echo '<li>' . $fs_name . '</li>';
                          }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
                    
                    </ul> 
                </div>
            </div>
        </div>
        <div class="col-sm-6 mb-3">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="d-flex align-items-center mb-3"><i class="material-icons text-danger mr-2">Flagship</i>
                    </h5>
                    <hr>
                    <ul>
                        <?php
                        $query3 = "SELECT * FROM flagship WHERE email = '$email'";
                        $result3 = mysqli_query($conn, $query3) or die(mysqli_error($conn));
                        $row3 = mysqli_fetch_array($result3);
                        $fs_arr = explode(", ", $_SESSION['flagship']);
                        $num3 = count($fs_arr);
                        for ($i = 0; $i < $num3 - 1; $i++) {
                          $fs_name = $fs_arr[$i];
                          if ($row3[$fs_name] == "yes") {
                            echo '<li>' . $fs_name . '</li>';
                          }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>

        <!--  MODAL  -->
        <div class="modal fade" id="Edit" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="background:#ffd6d6">
                    <div class="modal-header">
                        <h4>PROFILE EDIT</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                        <div id="add_err2" style="color:#650404;margin-top:5%;text-align:center;"></div>
                        <form action="">
                            <div id="add_err2" style="color: white"></div>
                            <div class="mb-3" style="align-items:center">
                                <input type="text" class="form-control-lg" id="name" placeholder="Name" name="text"
                                    value="<?php echo $_SESSION['fname'] ?>">
                            </div>
                            <div class="mb-3 mt-3">
                                <input type="email" class="form-control-lg" id="email" placeholder="Enter email"
                                    name="email" value="<?php echo $_SESSION['email'] ?>">
                            </div>
                            <div class="mb-3">
                                <input type="number" class="form-control-lg" id="number" placeholder="Mobile No."
                                    name="mobile" value="<?php echo $_SESSION['mobile'] ?>">
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control-lg" id="passwd" placeholder="Enter Password"
                                    name="password">
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button type="button" class="save-btn" id="save">Save changes</button>
                                <button type="button" class="cancel-btn" data-dismiss="modal">Cancel</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Content ends-->

    <script>
    function menuOnClick() {
        document.getElementById("menu-bar").classList.toggle("change");
        document.getElementById("nav1").classList.toggle("change");
        document.getElementById("menu-bg").classList.toggle("change-bg");
    }
    </script>

    <script>
    function register() {
        window.open('login.php');
    }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <script>
    jQuery(document).ready(function($) {
        "use strict"
        $("#loader").delay(1000).fadeOut("slow");
    });
    </script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
    AOS.init({
        duration: 4000,
        once: true,
    });
    </script>
    <script src="https://unpkg.com/ionicons@latest/dist/ionicons.js"></script>

</body>

</html>

<?php

} else {
  header("location:login.php ");
}
?>