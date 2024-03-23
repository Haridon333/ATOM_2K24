<?php
@ob_start();
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="assets/atom2k23.png" rel="icon" style="width:100px;height:100px;">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--=============== REMIXICONS ===============-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" crossorigin="">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--=============== SWIPER CSS ===============-->
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="assets/css/events.css">
    <style>
    .navi {
        font-family: MonumentReg;
        position: relative;
        z-index: 999;
        top: 15px;
        left: 50%;
        transform: translateX(-50%);
        display: inline-block;
        border: 2px solid #85bfff;
        border-radius: 30px;
        /* animation: slide-in 1s ease-out; */
    }

    .we1 {
        position: relative;
        display: flex;
        flex: 1 1 auto;
        margin: 0;
        padding: 0 30px;
        list-style-type: none;
    }

    .we1 .w1:not(:last-child) {
        margin-right: 40px;
    }

    .we1 .w1 {
        border: 2px solid transparent;
        border-radius: 5px;
        padding: 10px;
        transition: background 0.2s;
    }

    .we1 .w1 a {
        color: #85bfff;
        text-decoration: none;
        text-transform: uppercase;
        transition: color 0.2s;
    }

    .we1 .w1 .we1 {
        visibility: hidden;
        opacity: 0;
        position: absolute;
        display: block;
        margin: 12px -12px;
        padding: 0;
        background: #85bfff;
        border: 2px solid #85bfff;
        border-right: 2px solid #85bfff;
        border-bottom: 2px solid #85bfff;
        border-radius: 5px;
        transition: opacity 0.2s, visibility 0.2s;
    }

    .we1 .w1 .we1 .w1 {
        margin: -2px 0 0 -2px;
        width: calc(100% - 20px);
        line-height: 1.7;
    }

    .we1 .w1:hover {
        transform: translate(0px, -3px);
        font-weight: bold;
    }


    .hamburger {
        display: none;
    }

    @media only screen and (max-width: 768px) {
        .hamburger {
            display: block;
            position: absolute;
            top: 20px;
            right: 20px;
            cursor: pointer;
        }

        .hamburger .bar {
            display: block;
            width: 25px;
            height: 3px;

            background-color: white;
            margin: 5px auto;
            transition: all 0.3s ease-in-out;
        }

        .hamburger.active .bar:nth-child(2) {
            opacity: 0;
        }

        .hamburger.active .bar:nth-child(1) {
            transform: translateY(8px) rotate(45deg);
        }

        .hamburger.active .bar:nth-child(3) {
            transform: translateY(-8px) rotate(-45deg);
        }

        .navi {
            display: none;
        }

        .navi.active {
            display: block;
            position: absolute;
            top: 60px;
            left: 50%;
            background-color: #000 !important;
            transform: translateX(-50%);
            border: 2px solid #000;
            border-radius: 30px;
            padding: 20px;
        }

        .navi.active .we1 {
            flex-direction: column;
            align-items: center;
        }

        .navi.active .we1 .w1 {
            margin: 10px 0;
        }
    }

    @keyframes slide-in {
        0% {
            top: -50px;
        }

        40% {
            top: 20px;
        }

        70% {
            top: 10px;
        }

        100% {
            top: 15px;
        }
    }
    </style>



    <style>
    @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Caveat&family=Protest+Revolution&family=Raleway:ital,wght@0,100..900;1,100..900&family=Teko:wght@300;400&display=swap');
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap");

    @font-face {
        font-family: font1;
        src: url('assets/fonts/OldSport01CollegeNcv-aeGm.ttf');
    }

    @font-face {
        font-family: font2;
        src: url('assets/fonts/Race1BranntPlusChiseledNcv-6Op1.ttf');
    }

    @font-face {
        font-family: AquireBold;
        src: url('assets/fonts/AquireBold.otf');
    }

    @font-face {
        font-family: WhiteLetters;
        src: url('assets/fonts/WhiteLettersDemoRegular.ttf');
    }

    @font-face {
        font-family: production;
        src: url('assets/fonts/production.ttf');
    }

    @font-face {
        font-family: MonumentReg;
        src: url('assets/fonts/MonumentExtended-Regular.otf');
    }


    @font-face {
        font-family: Aquatico;
        src: url('assets/fonts/Aquatico-Regular.otf');
    }

    @font-face {
        font-family: Agency FB;
        src: url('assets/fonts/AgencyFB-Bold.ttf');
    }

    @font-face {
        font-family: Agency FB;
        src: url('assets/fonts/Fortunate.otf');
    }
    </style>
    <title>EVENTS</title>
</head>

<body style="background-color:#1b1a55;">
    <header>
        <nav class="navi">
            <ul class="we1">
                <li class="w1"><a href="index.php">Home</a></li>
                <li class="w1"><a href="events.php">Events</a></li>
                <li class="w1"><a href="index.php#about">About</a></li>
                <li class="w1"><a href="index.php#footerr">Contact</a></li>
                <!-- <br> -->
                <li class="w1"><a><?php require_once 'user.php'; ?></a></li>

            </ul>
        </nav>
        <br /><br />

        <div class="hamburger" onclick="toggleMenu()">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
    </header>

    <!-- <div class="backbtn" style="padding-top:5rem; padding-left: 5rem;">
        <a href="index.php"><i class="fa fa-arrow-left" style="text-decoration: none;color:#85bfff;">&nbspBACK</i></a>

    </div> -->
    <center>
        <h1 style="margin-top: 100PX;font-family:AquireBold;color:#85bfff;">TECHNICAL EVENTS (7)</h1>
        <br>
        <h3 style="font-family:AquireBold;color:#85bfff;">Swipe left for more events</h3>
    </center>
    <section class="container">
        <div class="card__container swiper">
            <div class="card__content">
                <div class="swiper-wrapper">
                    <article class="card__article swiper-slide">
                        <div class="card__image" style="padding-top:0px;" style="padding-top:0px;">
                            <img src="assets/event_img/WORDS WITS WAR.jpg" alt="image" class="card__img"
                                style="width: 500px;height:250px;">
                            <div class="card__shadow"></div>
                        </div>

                        <div class="card__data" style='background-color:black;border-radius:0rem;font-family:Raleway;'>
                            <h3 class="card__name" style="color: white;">WORDS WITS WAR</h3>
                            <p class="card__description" style="color: white;">
                                Solve the mystery to unlock another mystery!!
                            </p>

                            <a href="wordswits.php" class="card__button"
                                style='color:black;background-color:#E5E5CB;'>View More</a>
                        </div>
                    </article>

                    <article class="card__article swiper-slide">
                        <div class="card__image" style="padding-top:0px;">
                            <img src="assets/event_img/Quest Odyssey.jpg" alt="image" class="card__img"
                                style="width: 500px;height:250px;">
                            <div class="card__shadow"></div>
                        </div>

                        <div class="card__data" style='background-color:black;border-radius:0rem;font-family:Raleway;'>
                            <h3 class="card__name" style="color: white;">QUEST ODYSSEY</h3>
                            <p class="card__description" style="color: white;">
                                Embark on a adventure where challenges awaits.
                            </p>

                            <a href="questodessey.php" class="card__button"
                                style='color:black;background-color:#E5E5CB;'>View More</a>
                        </div>
                    </article>

                    <article class="card__article swiper-slide">
                        <div class="card__image" style="padding-top:0px;">
                            <img src="assets/event_img/Techno-Calypse.jpg" alt="image" class="card__img"
                                style="width: 500px;height:250px;">
                            <div class="card__shadow"></div>
                        </div>

                        <div class="card__data" style='background-color:black;border-radius:0rem;font-family:Raleway;'>
                            <h3 class="card__name" style="color: white;">TECHNO-CALYPSE</h3>
                            <p class="card__description" style="color: white;">
                                Let's ignite the fire! Fast-paced fun, no time to tire!
                            </p>

                            <a href="technocal.php" class="card__button"
                                style='color:black;background-color:#E5E5CB;'>View More</a>
                        </div>
                    </article>

                    <article class="card__article swiper-slide">
                        <div class="card__image" style="padding-top:0px;">
                            <img src="assets/event_img/TECHFORGE.jpg" alt="image" class="card__img"
                                style="width: 500px;height:250px;">
                            <div class="card__shadow"></div>
                        </div>

                        <div class="card__data" style='background-color:black;border-radius:0rem;font-family:Raleway;'>
                            <h3 class="card__name" style="color: white;">TECHFORGE</h3>
                            <p class="card__description" style="color: white;">
                                Logic, Speed, & Secrets: Unlock the mysteries to rule the day
                            </p>

                            <a href="techforge.php" class="card__button"
                                style='color:black;background-color:#E5E5CB;'>View More</a>
                        </div>
                    </article>

                    <article class="card__article swiper-slide">
                        <div class="card__image" style="padding-top:0px;">
                            <img src="assets/event_img/Volt Venture.jpg" alt="image" class="card__img"
                                style="width: 500px;height:250px;">
                            <div class="card__shadow"></div>
                        </div>

                        <div class="card__data" style='background-color:black;border-radius:0rem;font-family:Raleway;'>
                            <h3 class="card__name" style="color: white;">VOLT VENTURE</h3>
                            <p class="card__description" style="color: white;">
                                Quiz sparks circuit minds; Relay race builds electronic mastery
                            </p>

                            <a href="voltventure.php" class="card__button"
                                style='color:black;background-color:#E5E5CB;'>View More</a>
                        </div>
                    </article>

                    <article class="card__article swiper-slide">
                        <div class="card__image" style="padding-top:0px;">
                            <img src="assets/event_img/Nexus.jpg" alt="image" class="card__img"
                                style="width: 500px;height:250px;">
                            <div class="card__shadow"></div>
                        </div>

                        <div class="card__data" style='background-color:black;border-radius:0rem;font-family:Raleway;'>
                            <h3 class="card__name" style="color: white;">NEXUS</h3>
                            <p class="card__description" style="color: white;">
                                Spark your Curiosity,Conquer the Circuit Challenge!!
                            </p>

                            <a href="nexus.php" class="card__button" style='color:black;background-color:#E5E5CB;'>View
                                More</a>
                        </div>
                    </article>

                    <article class="card__article swiper-slide">
                        <div class="card__image" style="padding-top:0px;">
                            <img src="assets/event_img/TECH TREK.jpg" alt="image" class="card__img"
                                style="width: 500px;height:250px;">
                            <div class="card__shadow"></div>
                        </div>

                        <div class="card__data" style='background-color:black;border-radius:0rem;font-family:Raleway;'>
                            <h3 class="card__name" style="color: white;">TECH TREK</h3>
                            <p class="card__description" style="color: white;">
                                Embark on the Adventure: Solve the Riddle, Claim the Treasure!
                            </p>

                            <a href="techtrek.php" class="card__button"
                                style='color:black;background-color:#E5E5CB;'>View More</a>
                        </div>
                    </article>
                </div>
            </div>

            <!-- Navigation buttons -->
            <div class="swiper-button-next">
                <i class="ri-arrow-right-s-line" style='color:#85bfff;'></i>
            </div>

            <div class="swiper-button-prev">
                <i class="ri-arrow-left-s-line" style='color:#85bfff;'></i>
            </div>

            <!-- Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <CEnter>
        <h1 style="color:black;font-family:AquireBold;color:#85bfff;">NON TECHNICAL EVENTS (6)</h1>
        <br>
        <h3 style="font-family:AquireBold;color:#85bfff;">Swipe left for more events</h3>
    </CEnter>
    <section class="container">
        <div class="card__container swiper">
            <div class="card__content">
                <div class="swiper-wrapper">
                    <article class="card__article swiper-slide">
                        <div class="card__image" style="padding-top:0px;">
                            <img src="assets/event_img/Bliss-Bash.jpg" alt="image" class="card__img"
                                style="width: 500px;height:250px;">
                            <div class="card__shadow"></div>
                        </div>

                        <div class="card__data" style='background-color:black;border-radius:0rem;font-family:Raleway;'>
                            <h3 class="card__name" style="color: white;">BLISS BASH </h3>
                            <p class="card__description" style="color: white;">
                                A bliss blast adventure with a perfect blend of amusement
                            </p>

                            <a href="blissbash.php" class="card__button"
                                style='color:black;background-color:#E5E5CB;'>View More</a>
                        </div>
                    </article>

                    <article class="card__article swiper-slide">
                        <div class="card__image" style="padding-top:0px;">
                            <img src="assets/event_img/Synergy.jpg" alt="image" class="card__img"
                                style="width: 500px;height:250px;">
                            <div class="card__shadow"></div>
                        </div>

                        <div class="card__data" style='background-color:black;border-radius:0rem;font-family:Raleway;'>
                            <h3 class="card__name" style="color: white;">SYNERGY</h3>
                            <p class="card__description" style="color: white;">
                                Where Curiosity meets challenge, Solve the Puzzle!!
                            </p>

                            <a href="synergy.php" class="card__button"
                                style='color:black;background-color:#E5E5CB;'>View More</a>
                        </div>
                    </article>

                    <article class="card__article swiper-slide">
                        <div class="card__image" style="padding-top:0px;">
                            <img src="assets/event_img/Dice Dominion.jpg" alt="image" class="card__img"
                                style="width: 500px;height:250px;">
                            <div class="card__shadow"></div>
                        </div>

                        <div class="card__data" style='background-color:black;border-radius:0rem;font-family:Raleway;'>
                            <h3 class="card__name" style="color: white;">DICE DOMINION</h3>
                            <p class="card__description" style="color: white;">
                                Pushing the limits of your mind, emerge victorious.
                            </p>

                            <a href="dicedominion.php" class="card__button"
                                style='color:black;background-color:#E5E5CB;'>View More</a>
                        </div>
                    </article>

                    <article class="card__article swiper-slide">
                        <div class="card__image" style="padding-top:0px;">
                            <img src="assets/event_img/Sight on site.jpg" alt="image" class="card__img"
                                style="width: 500px;height:250px;">
                            <div class="card__shadow"></div>
                        </div>

                        <div class="card__data" style='background-color:black;border-radius:0rem;font-family:Raleway;'>
                            <h3 class="card__name" style="color: white;">SIGHT ON SITE</h3>
                            <p class="card__description" style="color: white;">
                                Unleash your wit and connection skills
                            </p>

                            <a href="sightonsite.php" class="card__button"
                                style='color:black;background-color:#E5E5CB;'>View More</a>
                        </div>
                    </article>

                    <article class="card__article swiper-slide">
                        <div class="card__image" style="padding-top:0px;">
                            <img src="assets/event_img/The Lost Archives.jpg" alt="image" class="card__img"
                                style="width: 500px;height:250px;">
                            <div class="card__shadow"></div>
                        </div>

                        <div class="card__data" style='background-color:black;border-radius:0rem;font-family:Raleway;'>
                            <h3 class="card__name" style="color: white;">THE LOST ARCHIVES</h3>
                            <p class="card__description" style="color: white;">
                                Crack codes, solve stories, escape mystery!!
                            </p>

                            <a href="lostarchives.php" class="card__button"
                                style='color:black;background-color:#E5E5CB;'>View More</a>
                        </div>
                    </article>
                    <article class="card__article swiper-slide">
                        <div class="card__image" style="padding-top:0px;">
                            <img src="assets/event_img/Deadly Pursuit.jpg" alt="image" class="card__img"
                                style="width: 500px;height:250px;">
                            <div class="card__shadow"></div>
                        </div>

                        <div class="card__data" style='background-color:black;border-radius:0rem;font-family:Raleway;'>
                            <h3 class="card__name" style="color: white;">DEADLY PURSUIT</h3>
                            <p class="card__description" style="color: white;">
                                Echoes of sirens pierce the night, chasing echoes of guilt.
                            </p>

                            <a href="deadlypursuit.php" class="card__button"
                                style='color:black;background-color:#E5E5CB;'>View More</a>
                        </div>
                    </article>
                </div>
            </div>

            <!-- Navigation buttons -->
            <div class="swiper-button-next">
                <i class="ri-arrow-right-s-line" style='color:#85bfff;'></i>
            </div>

            <div class="swiper-button-prev">
                <i class="ri-arrow-left-s-line" style='color:#85bfff;'></i>
            </div>

            <!-- Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <CEnter>
        <h1 style="font-family:AquireBold;color:#85bfff;">FLAGSHIP & PAPER PRESENTATION (4)</h1>
        <br>
        <h3 style="font-family:AquireBold;color:#85bfff;">Swipe left for more events</h3>
    </CEnter>
    <section class="container">
        <div class="card__container swiper">
            <div class="card__content">
                <div class="swiper-wrapper">
                    <article class="card__article swiper-slide">
                        <div class="card__image" style="padding-top:0px;">
                            <img src="assets/event_img/CODE-A-THON.jpg" alt="image" class="card__img"
                                style="width: 500px;height:250px;">
                            <div class="card__shadow"></div>
                        </div>

                        <div class="card__data" style='background-color:black;border-radius:0rem;font-family:Raleway;'>
                            <h3 class="card__name" style="color: white;">CODE-A-THON</h3>
                            <p class="card__description" style="color: white;">
                                Igniting Innovation in every line of code!
                            </p>

                            <a href="codeathon.php" class="card__button"
                                style='color:black;background-color:#E5E5CB;'>View More</a>
                        </div>
                    </article>

                    <article class="card__article swiper-slide">
                        <div class="card__image" style="padding-top:0px;">
                            <img src="assets/event_img/Auction Arena.jpg" alt="image" class="card__img"
                                style="width: 500px;height:250px;">
                            <div class="card__shadow"></div>
                        </div>

                        <div class="card__data" style='background-color:black;border-radius:0rem;font-family:Raleway;'>
                            <h3 class="card__name" style="color: white;">AUCTION ARENA</h3>
                            <p class="card__description" style="color: white;">
                                Get ready to win the title of being the greatest cricket fan!
                            </p>

                            <a href="auctionarena.php" class="card__button"
                                style='color:black;background-color:#E5E5CB;'>View More</a>
                        </div>
                    </article>
                    <article class="card__article swiper-slide">
                        <div class="card__image" style="padding-top:0px;">
                            <img src="assets/event_img/Mindfest.jpg" alt="image" class="card__img"
                                style="width: 500px;height:250px;">
                            <div class="card__shadow"></div>
                        </div>

                        <div class="card__data" style='background-color:black;border-radius:0rem;font-family:Raleway;'>
                            <h3 class="card__name" style="color: white;">MINDFEST</h3>
                            <p class="card__description" style="color: white;">
                                The Journey of Creation where imagination fuels innovation.
                            </p>

                            <a href="mindfest.php" class="card__button"
                                style='color:black;background-color:#E5E5CB;'>View More</a>
                        </div>
                    </article>

                    <article class="card__article swiper-slide">
                        <div class="card__image" style="padding-top:0px;">
                            <img src="assets/event_img/InnoVerse.jpg" alt="image" class="card__img"
                                style="width: 500px;height:250px;">
                            <div class="card__shadow"></div>
                        </div>

                        <div class="card__data" style='background-color:black;border-radius:0rem;font-family:Raleway;'>
                            <h3 class="card__name" style="color: white;">INNOVERSE</h3>
                            <p class="card__description" style="color: white;">
                                Bridging Ideas, Building Tomorrow forging the future.
                            </p>

                            <a href="innoverse.php" class="card__button"
                                style='color:black;background-color:#E5E5CB;'>View More</a>
                        </div>
                    </article>
                </div>
            </div>

            <!-- Navigation buttons -->
            <div class="swiper-button-next">
                <i class="ri-arrow-right-s-line" style='color:#85bfff;'></i>
            </div>

            <div class="swiper-button-prev">
                <i class="ri-arrow-left-s-line" style='color:#85bfff;'></i>
            </div>

            <!-- Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </section>
    <script>
    function toggleMenu() {
        const nav = document.querySelector("nav");
        nav.classList.toggle("active");
        const hamburger = document.querySelector(".hamburger");
        hamburger.classList.toggle("active");
    }
    </script>
    <!--=============== SWIPER JS ===============-->
    <script src="assets/js/swiper-bundle.min.js"></script>

    <!--=============== MAIN JS ===============-->
    <script src="assets/js/event.js"></script>
</body>

</php>