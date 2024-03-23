<?php
@ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="assets/atom2k23.png" rel="icon" style="width:100px;height:100px;">
    <meta charset="UTF-8">
    <title>AUCTION ARENA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        $("#btn_14").click(function() {
            fsname = "AUCTION ARENA";
            registerFlagEvent(fsname);

        });

    });

    function registerEvent(evname) {

        $.ajax({
            type: "POST",
            url: "flagregister.php",
            data: "evname=" + evname,
            success: function(html) {
                if (html == 'true') {

                    alert(`You have Registered for ${evname}`);

                } else if (html == 'rem') {

                    alert("Already Registered");

                } else {

                    alert("Login before registering to a Event");


                    window.location.href = "Login/index.php";

                }
            }

        });
    }

    function wsfees(wsname) {
        ftype = wsname;
        $.ajax({
            type: "POST",
            url: "modules/pay_process.php",
            data: "type=" + ftype,
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
    }

    function registerFlagEvent(fsname) {
        $.ajax({
            type: "POST",
            url: "flagregister.php",
            data: "fsname=" + fsname,
            success: function(html) {
                if (html == 'true') {

                    alert(`You have Registered for ${fsname}`);


                } else if (html == 'rem') {

                    alert("Already Registered");

                } else if (html == 'genfee') {
                    var val = confirm(
                        "You Need to pay General fee! \n Do not close the page before the payment confirmation."
                        );
                    if (val == true) {
                        generalfee();
                    }
                } else {
                    alert("Login before registering to a Event")
                    window.location.href = "login.php";
                }
            }

        });
    }

    function registerWorkshop(wsname) {
        $.ajax({
            type: "POST",
            url: "wregistered.php",
            data: "wsname=" + wsname,
            success: function(html) {
                if (html == 'true') {
                    if (wsname == "MISSING PIECES OF BUSINESS SAGA") {
                        alert(`You have Registered for ${wsname}`);
                    } else {
                        var val1 = confirm(
                            " Confirm to pay workshop fee. \n Do not close the page before the payment confirmation. \n After the payment do return back to this page."
                            );
                        if (val1 == true) {
                            let wstype = wsname.substring(0, 3).toUpperCase();
                            wsfees(wstype);
                        }
                    }
                } else if (html == 'rem') {
                    alert("Already Registered");

                } else if (html == 'full') {
                    alert(
                        "Oops! We're sorry. All the slots are full for this Workshop. Thank you for checking out.");

                } else if (html == 'false1') {
                    alert("Oops!");

                } else {
                    alert("Login before registering to a Event");
                    // alert(html);
                    // alert(html);
                    window.location.href = "login.php";
                }
            }

        });
    }
    </script>
    <style>
    html {
        font-size: 14px;
        font-family: "Poppins", sans-serif;
    }

    body {
        background: white;
        margin: 0;
        padding: 0;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    * {
        box-sizing: border-box;
    }

    .faq-container {
        display: flex;
        flex-direction: column;
        gap: 16px;
        width: 95%;
    }

    details {
        font-size: 1rem;
        background: #F6FAFF;
        border-radius: 8px;
        border: 1px solid #C3DEFF;
        transition: border-color 0.3s ease-in-out;
    }

    details:hover {
        border-color: #A4A1FF;
    }

    summary {
        user-select: none;
        cursor: pointer;
        font-weight: 600;
        display: flex;
        align-items: center;
        padding: 1em;
    }

    summary::-webkit-details-marker {
        display: none;
    }

    .faq-title {
        color: #1C2035;
        flex-grow: 1;
        opacity: 0.65;
        transition: opacity 250ms ease-in-out;
    }

    summary:hover .faq-title {
        opacity: 1;
    }

    .faq-content {
        color: #303651;
        padding: 0.2em 1em 1em 1em;
        font-weight: 300;
        line-height: 1.5;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease-out;
    }

    details[open] .faq-content {
        max-height: 1000px;
    }

    .expand-icon {
        margin-left: auto;
        transition: transform 150ms ease-out;
    }

    details[open] .icon-tabler-circle-plus {
        display: none;
    }

    details:not([open]) .icon-tabler-circle-minus {
        display: none;
    }

    /* Progressive Enhancements for larger screens */
    @media (min-width: 768px) {
        html {
            font-size: 16px;
        }

        .faq-container {
            width: 90%;
            max-width: 600px;
        }
    }
    </style>
    <script>
    function toggleIcon(expandIconPlus, expandIconMinus, isOpen) {
        if (isOpen) {
            expandIconPlus.style.display = 'none';
            expandIconMinus.style.display = 'block';
        } else {
            expandIconPlus.style.display = 'block';
            expandIconMinus.style.display = 'none';
        }
    }

    function createAccordion(el) {
        let animation = null;
        let isClosing = false;
        let isExpanding = false;
        const summary = el.querySelector('summary');
        const content = el.querySelector('.faq-content');
        const expandIconPlus = summary.querySelector('.icon-tabler-circle-plus');
        const expandIconMinus = summary.querySelector('.icon-tabler-circle-minus');

        function onClick(e) {
            e.preventDefault();
            el.style.overflow = 'hidden';
            if (isClosing || !el.open) {
                open();
            } else if (isExpanding || el.open) {
                shrink();
            }
        }

        function shrink() {
            isClosing = true;
            const startHeight = `${el.offsetHeight}px`;
            const endHeight = `${summary.offsetHeight}px`;
            if (animation) {
                animation.cancel();
            }
            animation = el.animate({
                height: [startHeight, endHeight]
            }, {
                duration: 400,
                easing: 'ease-out'
            });
            animation.onfinish = () => {
                toggleIcon(expandIconPlus, expandIconMinus, false);
                onAnimationFinish(false);
            };
            animation.oncancel = () => {
                toggleIcon(expandIconPlus, expandIconMinus, false);
                isClosing = false;
            };
        }

        function open() {
            el.style.height = `${el.offsetHeight}px`;
            el.open = true;
            window.requestAnimationFrame(expand);
        }

        function expand() {
            isExpanding = true;
            const startHeight = `${el.offsetHeight}px`;
            const endHeight = `${summary.offsetHeight + content.offsetHeight}px`;
            if (animation) {
                animation.cancel();
            }
            animation = el.animate({
                height: [startHeight, endHeight]
            }, {
                duration: 350,
                easing: 'ease-out'
            });
            animation.onfinish = () => {
                toggleIcon(expandIconPlus, expandIconMinus, true);
                onAnimationFinish(true);
            };
            animation.oncancel = () => {
                toggleIcon(expandIconPlus, expandIconMinus, true);
                isExpanding = false;
            };
        }

        function onAnimationFinish(open) {
            el.open = open;
            animation = null;
            isClosing = false;
            isExpanding = false;
            el.style.height = el.style.overflow = '';
        }

        summary.addEventListener('click', onClick);
    }

    document.querySelectorAll('details').forEach(createAccordion);
    </script>
</head>

<body>

    <section class="faq-container" aria-label="Frequently Asked Questions">
        <center>
            <h1>AUCTION ARENA
            </h1>
        </center>
        <details>
            <summary>
                <span class="faq-title">Description</span>
                <!-- Plus Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-plus expand-icon"
                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="#303651" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                    <path d="M9 12l6 0"></path>
                    <path d="M12 9l0 6"></path>
                </svg>
                <!-- Minus Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-minus expand-icon"
                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="#303651" fill="none"
                    stroke-linecap="round" stroke-linejoin="round" style="display: none;">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                    <path d="M9 12l6 0"></path>
                </svg>
            </summary>
            <div class="faq-content">
                <p>
                    Calling all cricket fans! Unleash your knowledge and strategy in the
                    ultimate cricket showdown! Do you dream of building your own dream team?
                    Then this event is for you! Test your knowledge with a thrilling quiz covering
                    all aspects of cricket - history, legends, records, and more! Put your strategic
                    skills to the test in a live auction – strategize, bid, and build your dream team.
                    Don't miss out on this chance to test your cricket knowledge, show off your
                    strategic thinking, and have a blast with fellow fans!
                </p>
                <center>
                    <h2 class="round" style="color: #000000;">Round 1 - QUIZ MASTERS </h2>
                </center>
                <p>
                    In this round, each team, consisting of four members will be given a set of cricket related
                    questions, to be solved in the given time. The top 10 teams who solve these questions will be
                    selected for next round.
                </p>
                <!-- <center>
                    <h2 class="round" style="color: #000000;">Round 1 DETAILS</h2>
                </center>
                <p>
                    • Total No. Of Questions: MAX 10
                    <br>
                    • Total Time allotted - 20 minutes
                </p> -->
                <center>
                    <h2 class="round" style="color: #000000;">Round 2 - STUMP MAESTRO </h2>
                </center>
                <p>
                    This round involves bowling and hitting the stumps. Participants can showcase their bowling skills
                    while attempting to hit the stumps, creating an engaging and competitive atmosphere. Everyone in
                    each
                    team will be given a chance to topple the stumps, thus giving all the members to showcase their
                    cricketing skills and enjoy the exhilaration of the competition.
                </p>
                <!-- <center>
                    <h2 class="round" style="color: #000000;">Round 2 DETAILS</h2>
                </center>
                <p>
                    • Total No. Of Games: 1
                    <br>
                    • Total Time Allotted - 40 minutes-->
                <center>
                    <h2 class="round" style="color: #000000;">Round 3 - THE GRAND AUCTION</h2>
                </center>
                <p>
                Each team will be given a fixed budget to spend on acquiring players. They will have to analyze player stats, identify hidden gems, and build a balanced team. Each player will have a base price and unique skill sets. The teams need to bid strategically, outmaneuver their opponents, in order to secure the players they need. The team with the highest overall score based on their chosen player’s performance will be crowned the champions!
                </p>
                <!-- <center>
                        <h2 class="round" style="color: #000000;">Round 3 DETAILS</h2>
                    </center>
                    <p>
                        • Total No. Of Games: 1
                        <br>
                        • Total Time Allotted - 40 minutes
    

                </p> -->
            </div>
        </details>

        <details>
            <summary>
                <span class="faq-title">Event Rules</span>
                <!-- Plus Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-plus expand-icon"
                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="#303651" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                    <path d="M9 12l6 0"></path>
                    <path d="M12 9l0 6"></path>
                </svg>
                <!-- Minus Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-minus expand-icon"
                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="#303651" fill="none"
                    stroke-linecap="round" stroke-linejoin="round" style="display: none;">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                    <path d="M9 12l6 0"></path>
                </svg>
            </summary>
            <div class="faq-content">
                • Discussion between other teams is prohibited.
                <br>
                • Use of mobile phones is strictly prohibited.
                <br>
                • The decision of the convener and the volunteer will stand final in the winners list.
                <br>
                • Each participating team must contain 4 members.

            </div>
        </details>

        <details>
            <summary>
                <span class="faq-title">Date</span>
                <!-- Plus Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-plus expand-icon"
                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="#303651" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                    <path d="M9 12l6 0"></path>
                    <path d="M12 9l0 6"></path>
                </svg>
                <!-- Minus Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-minus expand-icon"
                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="#303651" fill="none"
                    stroke-linecap="round" stroke-linejoin="round" style="display: none;">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                    <path d="M9 12l6 0"></path>
                </svg>
            </summary>
            <div class="faq-content">
                <h4 class="date" style="color: rgb(0, 0, 0);">ROUND 1 - 21/03/24</h4>
                <h4 class="date" style="color: rgb(0, 0, 0);">ROUND 2 - 21/03/24</h4>
                <h4 class="date" style="color: rgb(0, 0, 0);">ROUND 3 - 23/03/24</h4>
            </div>
        </details>

        <details>
            <summary>
                <span class="faq-title">Contact</span>
                <!-- Plus Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-plus expand-icon"
                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="#303651" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                    <path d="M9 12l6 0"></path>
                    <path d="M12 9l0 6"></path>
                </svg>
                <!-- Minus Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-minus expand-icon"
                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="#303651" fill="none"
                    stroke-linecap="round" stroke-linejoin="round" style="display: none;">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                    <path d="M9 12l6 0"></path>
                </svg>
            </summary>
            <div class="faq-content">
                <ul style="list-style-type: none;">
                    <li><a style="color: #000000;text-transform: uppercase;text-decoration: none;"
                            href=" tel:+917448847810">Purusothmanak (22L134)- 7448847810</a></li>
                    <li><a style="color: #000000;text-transform: uppercase;text-decoration: none;"
                            href=" tel:+917867925399">Kaviya(22E617)- 7867925399</a></li>
                </ul>
            </div>
        </details>
        <STYle>
        button {
            font-family: AquireBold;
            background-color: white;
            color: black;
            border-radius: 10em;
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

        ;

        button:active {
            transform: translateY(2px) translateX(1px);
            box-shadow: 0 0 0 0 black;
        }

        ;
        </STYle>
        <CEnter><button id="btn_14">Register Now</button></CEnter>
        <br><br>
    </section>
</body>

</html>