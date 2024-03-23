<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/css/index.css" />
    <link rel="stylesheet" href="assets/css/footer.css" />
    <link rel="stylesheet" href="assets/css/loader.css" />
    <link rel="stylesheet" href="assets/css/nav.css" />
    <link href="assets/atom2k23.png" rel="icon" style="width: 100px; height: 100px" />

    <title>ATOM 2K24</title>

    <!--FONT AWESOME-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <!--GOOGLE FONTS-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Noto+Serif+Display:wght@300&family=Rubik:wght@400;500;700&display=swap" />
    <link rel="icon" href="/new1/assets/atom2k23.png" type="png" style="width: 100px; height: 100px" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <style>
    @import url("https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Caveat&family=Protest+Revolution&family=Raleway:ital,wght@0,100..900;1,100..900&family=Teko:wght@300;400&display=swap");
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap");

    @font-face {
        font-family: font1;
        src: url("assets/fonts/OldSport01CollegeNcv-aeGm.ttf");
    }

    @font-face {
        font-family: font2;
        src: url("assets/fonts/Race1BranntPlusChiseledNcv-6Op1.ttf");
    }

    @font-face {
        font-family: font3;
        src: url("assets/fonts/SpacePatrol.ttf");
    }

    @font-face {
        font-family: font4;
        src: url("assets/fonts/SeasideResortNF.ttf");
    }

    @font-face {
        font-family: font5;
        src: url(assets/fonts/Vineyard.ttf);
    }

    @font-face {
        font-family: font6;
        src: url(assets/fonts/VineyardFilled.ttf);
    }

    @font-face {
        font-family: font7;
        src: url(assets/fonts/ExtraOrnamentalNo2.ttf);
    }

    @font-face {
        font-family: AquireBold;
        src: url("assets/fonts/AquireBold.otf");
    }

    @font-face {
        font-family: WhiteLetters;
        src: url("assets/fonts/WhiteLettersDemoRegular.ttf");
    }

    @font-face {
        font-family: production;
        src: url("assets/fonts/production.ttf");
    }

    @font-face {
        font-family: MonumentReg;
        src: url("assets/fonts/MonumentExtended-Regular.otf");
    }

    @font-face {
        font-family: Aquatico;
        src: url("assets/fonts/Aquatico-Regular.otf");
    }

    @font-face {
        font-family: Agency FB;
        src: url("assets/fonts/AgencyFB-Bold.ttf");
    }

    #particles-js {
        position: fixed;
        width: 100%;
        height: 100%;
        background-color: #25252525;
        /* background-image: url(""); */
        background-repeat: no-repeat;
        background-size: cover;
        background-position: 50% 50%;
        z-index: -10;
        letter-spacing: none;
    }
    </style>
    <style>
    .regbtn {
        background-color: #1b1a55 !important;
        color: white;
        font-family: AquireBold;
        border-radius: 10rem;
        font-size: 17px;
        font-weight: 600;
        padding: 1em 2em;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
        border: 1px solid black;
        box-shadow: 0 0 0 0 black;
    }

    button:hover {
        transform: translateY(-4px) translateX(-2px);
        box-shadow: 2px 5px 0 0 black;
    }

    button:active {
        transform: translateY(2px) translateX(1px);
        box-shadow: 0 0 0 0 black;
    }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body style="background-color: #85bfff">
    <div id="loader">
        <div class="center">
            <div class="nulled-loader">
                <div class="nulled-inner nulled-one"></div>
                <div class="nulled-inner nulled-two"></div>
                <div class="nulled-inner nulled-three"></div>
            </div>
        </div>
    </div>



    <div id="particles-js">
        <canvas class="particles-js-canvas-el" style="width: 100%; height: 100%"></canvas>
    </div>

    <div class="count-particles"><span class="js-count-particles"></span></div>

    <header>
        <nav class="navi">
            <ul class="we1">
                <li class="w1"><a href="#">Home</a></li>
                <li class="w1"><a href="events.php">Events</a></li>
                <li class="w1"><a href="#about">About</a></li>
                <li class="w1"><a href="#footerr">Contact</a></li>
                <li class="w1"><a><?php require_once 'user.php'; ?></a></li>
            </ul>
        </nav>
        <br /><br />
        <div style="display: flex; justify-content: center; flex-wrap: wrap">
            <div style="display: flex; justify-content: center">
                <img src="assets/psg_logo.png" alt="" style="height: 40px; width: 50px" />
                <img src="assets/ieee_sc12951.png" alt="" style="height: 40px; width: 40px" />
                <img src="assets/atom2k23.png" alt="" style="height: 40px; width: 40px" />
            </div>
            <div class="nav_header" style="padding: 0.5rem 1rem">
                <h4 style="text-align: center">
                    <span style="font-family: 'production'">IEEE STUDENTS CHAPTER</span>
                    <span style="font-family: Agency FB !important; font-size: 24px">12951</span>
                </h4>
            </div>
        </div>
        <div class="hamburger" onclick="toggleMenu()">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
    </header>
    <!-- HOME -->
    <main class="l-main bd-grid">
        <section class="home">
            <div class="home__data">
                <!-- <br><br><br><br><br><br> -->
                <h1 class="home__title" style="font-family: font6; color: #000">
                    AT<span style="font-family: font3">O</span>M 2K24
                </h1>
                <h6 class="home__description" style="font-size: 1rem; color: #000">
                    Welcome to the biggest PSG CAMPUS-wide technical symposium
                </h6>
                <br />
                <a href="login.php"><button class="regbtn">Register Now</button></a>
            </div>

            <div class="home__img">
                <!-- IMG -->
                <img src="assets/img/depositphotos_127483244-stock-illustration-wireframe-polygonal-geometric-element-sphere.jpg"
                    alt="" class="airpod1" style="mix-blend-mode: multiply; margin-bottom: 30%" />
            </div>
        </section>
        <section class="container-fluid justify-content-center align-items-center my-4" style="margin-top: 50px" ;>
            <h2 class="text-center mx-auto" style="font-family: aquatico; color: #000" id="about">
                About Us
            </h2>
            <br />
            <div class="cards mx-auto mb-3 rounded-4" style="max-width: 80%">
                <div class="col-md-12">
                    <div class="card-body">
                        <h5 class="card-title text-center"
                            style="font-family: production; color: #000; text-align: center">
                            IEEE STUDENTS CHAPTER
                            <span style="
                    font-family: 'Agency FB' !important;
                    font-size: 24px;
                    font-weight: 700;
                  ">12951</span>
                        </h5>
                        <p class="card-text" style="
                  font-size: 13px;
                  font-family: 'Raleway', sans-serif;
                  color: #000;
                  text-align: justify;
                ">
                            <br /><br />
                            Students’ Chapter of IEEE at PSG College of Technology was
                            initiated in 1977. It was started to involve the students in
                            research and encourage new ideas in the respective fields. PSG
                            has always been known to set benchmarks in terms of quality of
                            engineering and is one of the first and foremost institutions to
                            have a Students branch of IEEE. The IEEE Students Chapter of PSG
                            Tech has been actively involved in organizing top notch
                            technical fests every year that has evoked the interest and
                            involvement of students from various parts of the country. It is
                            the biggest technical association at PSG College of Technology.
                        </p>
                        <!-- <div class="justify-content-center align-items-center mx-auto"><button href="https://psgtech.edu/dept/ece/ieee/about.html" type="button" id="visit-ieee" class="text-center">Visit Us</button>
                            </div> -->
                        <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
                    </div>
                </div>
            </div>
        </section>
    </main>
    <br /><br />
    <footer id="footerr" style="
        font-family: 'Raleway', sans-serif;
        font-size: 15px;
        background-color: #1b1a55;
        color: #85bfff;
      ">
        <div class="container">
            <div class="footer_content">
                <div class="first_section">
                    <h3 class="footer_headings" style="text-align: center; font-weight: bold; color: #85bfff">
                        SOCIAL
                    </h3>
                    <!-- <img src="/new1/assets/PSG LOGO in PNG.png" alt="" /> -->
                    <p style="text-align: center">
                        <span style="font-family: 'production'">IEEE STUDENTS CHAPTER</span>
                        <span style="font-family: Agency FB !important; font-size: larger">12951</span>
                    </p>
                    <div class="social_icons justify-content-center">
                        <a style="padding-left:1rem;" href="https://instagram.com/ieee_sc_12951?igshid=YmMyMTA2M2Y="><i
                                class="fa-brands fa-instagram" style="background-color: #85bfff;color: #1b1a55"></i></a>
                        <a style="padding-left:1rem;" href="mailto:ieee.studentschapter.12951@gmail.com"><i
                                class="fa-brands fa-google" style="background-color: #85bfff;color: #1b1a55"></i></a>
                        <a style="padding-left:1rem;"
                            href="https://www.linkedin.com/company/ieee-students-chapter-12951/"><i
                                class="fa-brands fa-linkedin" style="background-color: #85bfff;color: #1b1a55"></i></a>
                    </div>
                </div>
                <div class="second_section">
                    <h3 class="footer_headings" style="text-align: center; font-weight: bold; color: #85bfff">
                        MENU
                    </h3>
                    <ul>
                        <span
                            style="text-align: center; color: #85bfff; padding: none;">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a
                                href="#" style="color: #85bfff">Home</a>&nbsp&nbsp
                            <a href="events.php" style="color: #85bfff">Events</a>&nbsp&nbsp
                            <a href="#about" style="color: #85bfff">About</a>&nbsp&nbsp
                            <a href="login.php" style="color: #85bfff">Register</a></span>
                    </ul>
                </div>
                <div class="third_section+fourth_section">
                    <h3 class="footer_headings" style="text-align: center; font-weight: bold; color: #85bfff">
                        CONTACT US
                    </h3>
                    <ul
                        style="justify-content:center; align-items:center; align-content:center; text-align:left; color: #85bfff">
                        <li>
                            <i class="fa-solid fa-phone"></i>
                            <a href=" tel:+917200052823"><span style="color: #85bfff">ASWIN C (22D433) - 7200052823</span></a>
                        </li>
                        <li>
                            <i class="fa-solid fa-phone"></i>
                            <a href=" tel:+918778691081"><span style="color: #85bfff">MITHLESH J R (21E619) - 8778691081</span></a>
                        </li>

                        <li>
                            <i class="fa-solid fa-phone"></i>
                            <a href=" tel:+917530009096"><span style="color: #85bfff">SWETHA A (21L151) - 7530009096</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>


    <script src="assets/js/particles.min.js"></script>
    <script src="assets/js/background.js"></script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- GSAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.2.4/gsap.min.js"></script>

    <!-- TIMELINE MAX -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/TimelineMax.min.js"></script>

    <!-- SCROLLMAGIC -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.6/plugins/animation.gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>

    <!-- Navbar -->
    <script>
    function toggleMenu() {
        const nav = document.querySelector("nav");
        nav.classList.toggle("active");
        const hamburger = document.querySelector(".hamburger");
        hamburger.classList.toggle("active");
    }
    </script>
    <!-- MAIN -->
    <script src="assets/js/main.js"></script>

    <script src="/app.js"></script>
    <script>
    jQuery(document).ready(function($) {
        "use strict";
        $("#loader").delay(1000).fadeOut("slow");
    });
    </script>
</body>

</html>