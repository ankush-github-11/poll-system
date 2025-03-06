<?php
include "../config/connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="./profile-stylesheet.css">
    <title>Profile</title>
</head>
<body>
    <div class="sessionUsername hidden">
        <?php
            if(isset($_SESSION["username"]))
                echo $_SESSION["username"];
        ?>
    </div>
    <div class="sessionName hidden">
        <?php
            if(isset($_SESSION["name"]))
                echo $_SESSION["name"];
        ?>
    </div>
    <header>
        <div class="my-navbar-div fixed-top">
            <div class="website-logo-div">
                <a class="website-logo" href="../home/index.php">
                    <img src="../images/main-logo.png" alt="Poll Now" width="50" height="50">
                </a>
            </div>
            <div class="nav-items-div">
                <div class="nav-item-1-div">
                    <a draggable="false" class="nav-item-1" href="">Home</a>
                    <div class="nav-item-1-hover-div"></div>
                </div>
                <div class="nav-item-2-div">
                    <a draggable="false" class="nav-item-2" href="">Contact</a>
                    <div class="nav-item-2-hover-div"></div>
                </div>
                <div class="nav-item-3-div">
                    <a draggable="false" class="nav-item-3" href="">View Polls</a>
                    <div class="nav-item-3-hover-div"></div>
                </div>
                <div class="nav-item-4-div">
                    <a draggable="false" class="nav-item-4" href="">Security</a>
                    <div class="nav-item-4-hover-div"></div>
                </div>
            </div>
            <div class="light-dark-div">
                <svg class="light-mode-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="#ff0055"><path d="M480-360q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35Zm0 80q-83 0-141.5-58.5T280-480q0-83 58.5-141.5T480-680q83 0 141.5 58.5T680-480q0 83-58.5 141.5T480-280ZM200-440H40v-80h160v80Zm720 0H760v-80h160v80ZM440-760v-160h80v160h-80Zm0 720v-160h80v160h-80ZM256-650l-101-97 57-59 96 100-52 56Zm492 496-97-101 53-55 101 97-57 59Zm-98-550 97-101 59 57-100 96-56-52ZM154-212l101-97 55 53-97 101-59-57Zm326-268Z"/></svg>
                <svg class="dark-mode-svg hidden" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="#ff0055"><path d="M480-120q-150 0-255-105T120-480q0-150 105-255t255-105q14 0 27.5 1t26.5 3q-41 29-65.5 75.5T444-660q0 90 63 153t153 63q55 0 101-24.5t75-65.5q2 13 3 26.5t1 27.5q0 150-105 255T480-120Zm0-80q88 0 158-48.5T740-375q-20 5-40 8t-40 3q-123 0-209.5-86.5T364-660q0-20 3-40t8-40q-78 32-126.5 102T200-480q0 116 82 198t198 82Zm-10-270Z"/></svg>
            </div>

        </div>
    </header>
    <main>
        <div class="total-div">
            <div class="main-div">
                <div class="left-div">
                    <div class="quick-navigation-div">Quick Navigation</div>
                    <div class="dashboard-div">
                        <i class="fa-solid fa-address-card"></i>
                        Dashboard
                    </div>
                    <div class="help-faq-div">
                        <i class="fa-solid fa-circle-question"></i>
                        Help/FAQs
                    </div>
                    <div class="messages-and-support-div">
                        <i class="fa-solid fa-message"></i>
                        Messages & Support
                    </div>
                    <div class="report-a-bug-div">
                        <i class="fa-solid fa-bug"></i>
                        Report a bug
                    </div>
                </div>
                <div class="right-div">
                    <div class="right-div-under-1">
                        <div class="image-name-username-div e-card playing">
                            <div class="image"></div>
                            <div class="wave"></div>
                            <div class="wave"></div>
                            <div class="wave"></div>
                            <div class="infotop">
                                <div class="image-div no-select">
                                    <img draggable="false" src="../images/profile-logo.png" alt="Profile Image">
                                </div>
                                <div class="name-email-div">
                                    <div class="name-div-top">Ankush Bhattacharjee</div>
                                    <div class="email-div-top">ankush10yt@gmail.com</div>
                                </div>
                            </div>
                        </div>
                        <div class="polls-created-participated-div">
                            <div class="polls-created-div">
                                <div class="polls-created-text">Polls Created</div>
                                <div class="polls-created-number">9</div>
                                <div class="polls-created-seeall-arrow-div">
                                    <button class="polls-created-seeall-btn">
                                        See All<i class="fa-solid fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="polls-participated-div">
                                <div class="polls-participated-text">Polls Participated</div>
                                <div class="polls-participated-number">15</div>
                                <div class="polls-participated-seeall-arrow-div">
                                    <button class="polls-participated-seeall-btn">
                                        See All<i class="fa-solid fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="right-div-under-2">
                        <button class="btn-shine">
                            <a href="../edit/edit.php">Edit Profile</a>
                        </button>
                    </div>
                    <div class="right-div-under-3">
                        <div class="personal-informations-div">
                            <div class="personal-information-text-div">Personal Information</div>
                            <div class="username-div">
                                <div class="username-left-div">Username</div>
                                <div class="username-right-div">ankush10yt</div>
                            </div>
                            <div class="name-div">
                                <div class="name-left-div">Name</div>
                                <div class="name-right-div">Ankush Bhattacharjee</div>
                            </div>
                            <div class="bio-div">
                                <div class="bio-left-div">Bio</div>
                                <div class="bio-right-div add-js">--</div>
                            </div>
                            <div class="nationality-div">
                                <div class="nationality-left-div">Nationality</div>
                                <div class="nationality-right-div add-js">--</div>
                            </div>
                            <div class="city-div">
                                <div class="city-left-div">City</div>
                                <div class="city-right-div add-js">--</div>
                            </div>
                            <div class="dob-div">
                                <div class="dob-left-div">Date of Birth</div>
                                <div class="dob-right-div add-js">--</div>
                            </div>
                            <div class="status-div">
                                <div class="status-left-div">Status</div>
                                <div class="status-right-div">
                                    <div class="shining-dot"></div>
                                    Active
                                </div>
                            </div>  
                        </div>
                        <div class="contact-details-div">
                            <div class="contact-details-text-div">Contact Details</div>
                            <div class="email-div">
                                <div class="email-left-div">Email</div>
                                <div class="email-right-div">ankush10yt@gmail.com</div>
                            </div>
                            <div class="phone-div">
                                <div class="phone-left-div">Phone</div>
                                <div class="phone-right-div add-js">--</div>
                            </div>
                            <div class="website-div">
                                <div class="website-left-div">Your Website URL</div>
                                <div class="website-right-div add-js">--</div>
                            </div>
                            <div class="linkedin-div">
                                <div class="linkedin-left-div">LinkedIn URL</div>
                                <div class="linkedin-right-div add-js">--</div>
                            </div>
                            <div class="twitter-div">
                                <div class="twitter-left-div">Twitter/X URL</div>
                                <div class="twitter-right-div add-js">--</div>
                            </div>
                            <div class="facebook-div">
                                <div class="facebook-left-div">Facebook URL</div>
                                <div class="facebook-right-div add-js">--</div>
                            </div>
                            <div class="instagram-div">
                                <div class="instagram-left-div">Instagram URL</div>
                                <div class="instagram-right-div add-js">--</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <p>© 2024 Online Voting Platform. All rights reserved.</p>
        <div class="footer-div-1">
            <a class="" href="">Privacy Policy</a>
            <a class="" href="">Terms of Service</a>
            <a class="" href="">FAQ</a>
        </div>
    </footer>
    <script src="./profile-script.js"></script>
    </body>

    </html>