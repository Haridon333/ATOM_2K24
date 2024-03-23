<?php
@ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TECHNO-CALYPSE</title>
    <link href="assets/atom2k23.png" rel="icon" style="width:100px;height:100px;">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#btn_3").click(function() {
                evname = "TECHNO-CALYPSE";
                registerEvent(evname);
    
            });
            
        });
    
        function registerEvent(evname) {

            $.ajax({
                type: "POST",
                url: "eregistered.php",
                data:"evname="+evname,
                success: function(html) {
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
                success: function(html) {
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
        <center><h1>TECHNO-CALYPSE</h1></center>
        <details>
            <summary>
                <span class="faq-title">Description</span>
                <!-- Plus Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-plus expand-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="#303651" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                    <path d="M9 12l6 0"></path>
                    <path d="M12 9l0 6"></path>
                </svg>
                <!-- Minus Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-minus expand-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="#303651" fill="none" stroke-linecap="round" stroke-linejoin="round" style="display: none;">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                    <path d="M9 12l6 0"></path>
                </svg>
            </summary>
            <div class="faq-content">
                <p>If you're looking for an event that challenges more than just what you learned from book, Look no further! We are here with awesome events and interesting games which gears up your brains, activate your brain cells by unlocking the mysteries which finally makes you a master in various technical aspects! Are you guys ready for the fun filled knowledgeable day. If yes, go register now!

                </p>
                <center><h2 class="round" style="color: #000000;">Round 1 - ZERO HOUR</h2></center>
                <p>
                    Show us you’re prepared to handle what's heading your way and make your team stand out from the crowd by acing this simple quiz [ with a little twist ] and a round of rapid fire we’ve made for you. Prove your knowledge by putting your brains to the test. But remember, you’re on a timer. A perfect warm up to get your neurons fired up for the rounds to come.
                </p>
                <center><h2 class="round" style="color: #000000;">Round 1 DETAILS</h2></center>
                <p>
                    • Total No. Of Questions: 30 (10+10+10) 
                    <br>
                    • Total Time allotted - 15 minutes
                </p>
                <center><h2 class="round" style="color: #000000;">Round 2 - DEBUGGING DRAMA</h2></center>
                <p>Be prepared to pull out all stops in the final round where you face-off directly against your rival teams in this battle of wits. Join us for an immersive QR Quest! Scan your way through a series of codes, collecting puzzle pieces of a secret program. Piece together the code snippets for the ultimate reveal! Engage, decode, conquer!

                </p>
                <center><h2 class="round" style="color: #000000;">Round 2 DETAILS</h2></center>
                <p>
                    • Total No. Of Tasks :5 & (5 more questions towards the end)
                    <br>
                    • Total Time Allotted - 1 Hour
                </p>
            </div>
        </details>
      
              <details>
            <summary>
                <span class="faq-title">Event Rules</span>
                <!-- Plus Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-plus expand-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="#303651" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                    <path d="M9 12l6 0"></path>
                    <path d="M12 9l0 6"></path>
                </svg>
                <!-- Minus Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-minus expand-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="#303651" fill="none" stroke-linecap="round" stroke-linejoin="round" style="display: none;">
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
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-plus expand-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="#303651" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                    <path d="M9 12l6 0"></path>
                    <path d="M12 9l0 6"></path>
                </svg>
                <!-- Minus Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-minus expand-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="#303651" fill="none" stroke-linecap="round" stroke-linejoin="round" style="display: none;">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                    <path d="M9 12l6 0"></path>
                </svg>
            </summary>
            <div class="faq-content">
                <h4 class="date" style="color: rgb(0, 0, 0);">19/03/24</h4>
            </div>
        </details>
      
              <details>
            <summary>
                <span class="faq-title">Contact</span>
                <!-- Plus Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-plus expand-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="#303651" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                    <path d="M9 12l6 0"></path>
                    <path d="M12 9l0 6"></path>
                </svg>
                <!-- Minus Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-minus expand-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="#303651" fill="none" stroke-linecap="round" stroke-linejoin="round" style="display: none;">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                    <path d="M9 12l6 0"></path>
                </svg>
            </summary>
            <div class="faq-content">
                <ul style="list-style-type: none;">
                    <li><a style="color: #000000;text-transform: uppercase;text-decoration: none;" href=" tel:+916369185251">Jeevith(22E610) - 6369185251</a></li>
                    <li><a style="color: #000000;text-transform: uppercase;text-decoration: none;" href=" tel:+919994066603">Lakshmi Priyadarshini (22E619)- 9994066603</a></li>
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
        <center><button id="btn_3">Register Now</button></center>
        <br><br>
    </section>
</body>
</html>