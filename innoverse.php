<?php
@ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
<link href="assets/atom2k23.png" rel="icon" style="width:100px;height:100px;">
    <meta charset="UTF-8">
    <title>INNOVERSE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#btn_16").click(function () {
                fsname = "INNOVERSE";
                registerFlagEvent(fsname);

            });

        });

        function registerEvent(evname) {

            $.ajax({
                type: "POST",
                url: "flagregister.php",
                data: "evname=" + evname,
                success: function (html) {
                    if (html == 'true') {

                        alert(`You have Registered for ${evname}`);

                    } else if (html == 'rem') {

                        alert("Already Registered");

                    } else {

                        alert("Login before registering to a Event")
                        console.log(html);

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
                success: function (html) {
                    if (html == 'false') {
                        $("#add_err1").html('<div class="alert alert-danger"> \
                            <strong>Please Try Again Later.</strong> \ \
                        </div>');

                        window.location.href = "profile.php";

                    } else {
                        window.location.href = html;
                    }
                },
                beforeSend: function () {
                    $("#add_err1").html("Loading...");
                }
            });
        }

        function registerFlagEvent(fsname) {
            $.ajax({
                type: "POST",
                url: "flagregister.php",
                data: "fsname=" + fsname,
                success: function (html) {
                    if (html == 'true') {

                        alert(`You have Registered for ${fsname}`);


                    } else if (html == 'rem') {

                        alert("Already Registered");

                    } else if (html == 'genfee') {
                        var val = confirm("You Need to pay General fee! \n Do not close the page before the payment confirmation.");
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
                success: function (html) {
                    if (html == 'true') {
                        if (wsname == "MISSING PIECES OF BUSINESS SAGA") {
                            alert(`You have Registered for ${wsname}`);
                        } else {
                            var val1 = confirm(" Confirm to pay workshop fee. \n Do not close the page before the payment confirmation. \n After the payment do return back to this page.");
                            if (val1 == true) {
                                let wstype = wsname.substring(0, 3).toUpperCase();
                                wsfees(wstype);
                            }
                        }
                    } else if (html == 'rem') {
                        alert("Already Registered");

                    } else if (html == 'full') {
                        alert("Oops! We're sorry. All the slots are full for this Workshop. Thank you for checking out.");

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
            <h1>INNOVERSE</h1>
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
                A Software paper presentation event is going to be a perfect
platform for people who are interested in Presenting their skills in the trending
software domains. The topics provided are Machine learning and Artificial
intelligence, Quantum computing, Edge computing, Low code and No code
technology, Mixed reality, Cloud computing, Digital Image Processing, Big data analytics, Block chain and vision systems. We anticipate your innovative
ideas to contribute to these
technologies. So, what, techies, get in on the action! It's time to get in shape!!

                </p>
                <center>
                    <h2 class="round" style="color: #000000;">FIELD OF EVENT </h2>
                </center>
                <p>
                    Software
                </p>
                <center>
                    <h2 class="round" style="color: #000000;">TAGLINE </h2>
                </center>
                <p>
                    Bridging Ideas, Building Tomorrow
                </p>
                <center>
                    <h2 class="round" style="color: #000000;">Round 1 - INGENIOUS </h2>
                </center>
                <p>
                Participants are required to submit their original papers. Papers should be
submitted via email to atom2k24innoverse@gmail.com not later than
20/03/2024. A panel of experts will review all submitted papers, and the top 10
papers will be selected based on originality, relevance to the theme, clarity of
presentation, and academic merit. Authors of the selected papers will be
notified via email and invited to present their work in the next
round of the event.
                </p>
                <!-- <center>
                    <h2 class="round" style="color: #000000;">Round 1 DETAILS</h2>
                </center>
                <p>
                    • TOTAL NO. OF. TOPICS TO BE CHOSEN: 1 per Team   
                    <br>
                    • DEADLINE: Till 20th of March
                    <br>
                    • ID FOR SUBMISSION OF AN ABSTRACT : atom2k24mindfest@gmail.com
                </p> -->
                <center>
                    <h2 class="round" style="color: #000000;">Round 2 - TECHSAT</h2>
                </center>
                <p>
                    Each qualified participant will be allocated a total presentation time of 15 minutes, comprising both the presentation of their paper and addressing any questions posed by the judges. After all presentations have concluded, the judging panel will convene to deliberate and select the top-performing presenter as the winner of the Paper Presentation Event. The announcement of the winner will take place at the conclusion of the event.
                </p>
                <!-- <center>
                    <h2 class="round" style="color: #000000;">Round 2 DETAILS</h2>
                </center>
                <p>
                    • Total No. Of Questions: MAX 10
                    <br>
                    • Total Time Allotted - 45 minutes to 1 Hr -->
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
                • Each team can have a maximum of 2 members.
                <br>
                • All the participants are supposed to participate with their College ID. Spot entries will not be allowed.
                <br>
                • The venue of the event will be informed in the WhatsApp group. Participants must strictly adhere to the timings.
                <br>
                • The participants will be given 10 minutes to present their ideas followed by 5 minutes of question-and-answer session
                <br>
                •Submission of projects (implementation of ideas) will be an added credit (Prototype of the project is not mandatory, if you have, you are welcome to demonstrate the same).
                <br>
                • The paper should be strictly in IEEE format. 
                <br>
                • The judges’ decision is final and no correspondence will be entertained. 
                <br> 
                • In case of any queries, do contact the event convenors.
                
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
            <h4 class="date" style="color: rgb(0, 0, 0);">ROUND 1 - Abstract submission</h4>
                <h4 class="date" style="color: rgb(0, 0, 0);">ROUND 2 - 23/03/23</h4>
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
                            href=" tel:+919344446553">Harish KB (22U218)- 9344446553</a></li>
                    <li><a style="color: #000000;text-transform: uppercase;text-decoration: none;"
                            href=" tel:+916383639877">Dharani Sree K (23L401) - 8122287722</a></li>
                </ul>
            </div>
        </details>
        <STYle>
            button {
                font-family:AquireBold ;
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
};

button:active {
transform: translateY(2px) translateX(1px);
box-shadow: 0 0 0 0 black;
};
        </STYle>
        <CEnter><button id="btn_16">Register Now</button></CEnter>
        <br><br>
    </section>
</body>

</html>