<?php
@ob_start();
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="assets/atom2k23.png" rel="icon" style="width:100px;height:100px;">
    <title>QUESTODESSEY</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        $("#btn_1").click(function() {
            evname = "QUESTODESSEY";
            registerEvent(evname);

        });

    });

    function registerEvent(evname) {

        $.ajax({
            type: "POST",
            url: "./eregistered.php",
            data: "evname=" + evname,
            success: function(html) {
                if (html == 'true') {

                    alert(`You have Registered for ${evname}`);

                } else if (html == 'rem') {

                    alert("Already Registered");

                } else {

                    alert("Login before registering to a Event")
                    console.log(html);

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
            <h1>QUEST ODYSSEY</h1>
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
                <p>Quest Odyssey is an exhilarating competition where teams of two navigate through rounds of diverse
                    challenges. The teams tackle fast-paced tasks like card arrangements and word puzzles, followed by
                    technical questions. Successful teams advance further, facing complex challenges involving circuit
                    corrections and decoding. The competition fosters teamwork, creativity, and appreciation for
                    technology, offering participants an unforgettable journey of camaraderie and intellectual
                    stimulation.
                </p>
                <center>
                    <h2 class="round" style="color: #000000;">Round 1 - MIND METTLE</h2>
                </center>
                <p>
                    Participants will face four tasks: arranging a deck of cards, guessing words, flipping cups, and
                    unjumbling instrument names, each within one minute. Technical questions follow based on task
                    completion. The challenges test speed, accuracy, and technical knowledge.
                </p>
                <center>
                    <h2 class="round" style="color: #000000;">Round 1 DETAILS</h2>
                </center>
                <p>
                    • Total No. Of Questions - Based on the tasks completed
                    <br>
                    • Total Time allotted - 10 minutes
                </p>
                <center>
                    <h2 class="round" style="color: #000000;">Round 2 - ELECTRO LEX</h2>
                </center>
                <p>Selected participants from Round 1 will be provided a circuitry filled with intentional errors and
                    will be expected to correct them within the given time, and simulate it to monitor its behaviour.
                    The numerical output must then be decoded into alphabets, after which they will have to do a word
                    search to complete the round.

                </p>
                <center>
                    <h2 class="round" style="color: #000000;">Round 2 DETAILS</h2>
                </center>
                <p>
                    • Total No. Of Games - 2
                    <br>
                    • Total Time Allotted - 20 minutes
                </p>
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
                • Teams are not permitted to engage in discussions with each other.
                <br>
                • Usage of phone is strictly prohibited.
                <br>
                • The convenors' decisions regarding the winners list are final and binding.

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
                <h4 class="date" style="color: rgb(0, 0, 0);">22/03/24</h4>
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
                            href=" tel:+919600899810">Gokul R (22E118)- 9600899810</a></li>
                    <li><a style="color: #000000;text-transform: uppercase;text-decoration: none;"
                            href=" tel:+918637493123">Judy M (22D224)- 8637493123</a></li>
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
        <center><button id="btn_1">Register Now</button></center>
        <br><br>
    </section>
</body>

</html>