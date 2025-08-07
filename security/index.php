<?php
    include "../config/connect.php";
    if(isset($_POST["createpoll"])){
        if(isset($_SESSION["name"])){
            header("Location: ../createpoll/");
            exit();
        }
        else{
            header("Location: ../signup/");
            exit();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Security</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="security-stylesheet.css">
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
            $uid = $_SESSION["uid"];
            $sql = "select * from users where uid = '$uid'";
            $res = mysqli_query($conn, $sql);
            if($res && mysqli_num_rows($res) > 0){
                $arr = mysqli_fetch_assoc($res);
                echo $arr["name"];
            }
        ?>
    </div>
    <header>
        <!-- Navbar Starts -->
        <nav class="no-select">
            <div class="navbar-side-div slide-animation hidden">
                <div class="navbar-fa-div"><i class="fa-solid fa-square-xmark fa-2xl"></i></div>
                <div class="nav-side-item-1-div">
                    <a draggable="false" class="nav-side-item-1" href="../">Home</a>
                </div>
                <div class="nav-side-item-2-div">
                    <a draggable="false" class="nav-side-item-2" href="">Contact</a>
                </div>
                <div class="nav-side-item-3-div">
                    <a draggable="false" class="nav-side-item-3" href="../viewpolls/">View Polls</a>
                </div>
                <div class="nav-side-item-4-div">
                    <a draggable="false" class="nav-side-item-4" href="../security/">Security</a>
                </div>
            </div>
            <div class="my-navbar-div fixed-top">
                <div class="website-logo-div">
                    <a draggable="false" class="website-logo" href="../">
                        <img draggable="false" src="../images/main-logo.png" alt="Poll Now" width="50" height="50">
                    </a>
                </div>
                <div class="nav-items-top">
                    <div class="nav-items-div">
                        <div class="nav-item-1-div">
                            <a draggable="false" class="nav-item-1" href="../">Home</a>
                            <div class="nav-item-1-hover-div"></div>
                        </div>
                        <div class="nav-item-2-div">
                            <a draggable="false" class="nav-item-2" href="">Contact</a>
                            <div class="nav-item-2-hover-div"></div>
                        </div>
                        <div class="nav-item-3-div">
                            <a draggable="false" class="nav-item-3" href="../viewpolls/">View Polls</a>
                            <div class="nav-item-3-hover-div"></div>
                        </div>
                        <div class="nav-item-4-div">
                            <a draggable="false" class="nav-item-4" href="../security/">Security</a>
                            <div class="nav-item-4-hover-div"></div>
                        </div>
                    </div>
                </div>
                <div class="hamburger-div">
                    <i class="fa-solid fa-bars"></i>
                </div>
                <div class="light-dark-div">
                    <svg class="light-mode-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="#ff0055"><path d="M480-360q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35Zm0 80q-83 0-141.5-58.5T280-480q0-83 58.5-141.5T480-680q83 0 141.5 58.5T680-480q0 83-58.5 141.5T480-280ZM200-440H40v-80h160v80Zm720 0H760v-80h160v80ZM440-760v-160h80v160h-80Zm0 720v-160h80v160h-80ZM256-650l-101-97 57-59 96 100-52 56Zm492 496-97-101 53-55 101 97-57 59Zm-98-550 97-101 59 57-100 96-56-52ZM154-212l101-97 55 53-97 101-59-57Zm326-268Z"/></svg>
                    <svg class="dark-mode-svg hidden" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="#ff0055"><path d="M480-120q-150 0-255-105T120-480q0-150 105-255t255-105q14 0 27.5 1t26.5 3q-41 29-65.5 75.5T444-660q0 90 63 153t153 63q55 0 101-24.5t75-65.5q2 13 3 26.5t1 27.5q0 150-105 255T480-120Zm0-80q88 0 158-48.5T740-375q-20 5-40 8t-40 3q-123 0-209.5-86.5T364-660q0-20 3-40t8-40q-78 32-126.5 102T200-480q0 116 82 198t198 82Zm-10-270Z"/></svg>
                </div>
                <div class="login hidden">
                    <a draggable="false" class="nav-link active" href="../login/">Login</a>
                </div>
                <div class="signup hidden">
                    <a draggable="false" class="nav-link active" href="../signup/">Sign Up</a>
                </div>
            <!-- Profile Code Starts -->
                <div class="dropdown-profile-div hidden">
                    <div class="profile">
                        <img draggable="false" src="../images/profile-logo.png" class="profile-logo no-select" alt="Profile Logo">
                    </div>
                    <div class="profile-dropdown-div hidden">
                        <div class="profile-image-name-div">
                            <div class="profile-image-div">
                                <a href="../profile/"><img draggable="false" src="../images/profile-logo.png" class="profile-logo no-select" alt="Profile Logo"></a>
                            </div>
                            <div class="profile-name-div">
                                <a href="../profile/">
                                    <?php
                                        $uid = $_SESSION["uid"];
                                        $sql = "select * from users where uid = '$uid'";
                                        $res = mysqli_query($conn, $sql);
                                        if($res && mysqli_num_rows($res) > 0){
                                            $arr = mysqli_fetch_assoc($res);
                                            echo $arr["name"];
                                        }
                                    ?>
                                </a>
                            </div>
                        </div>
                        <div class="horizontal-line"></div>
                        <a href="../profile/" class="profile-div">
                            <i class="fa-solid fa-user"></i>
                            <div>My Profile</div>
                        </a>
                        <a href="../edit/" class="edit-div">
                            <i class="fa-solid fa-pen-to-square"></i>
                            <div>Edit Profile</div>
                        </a>
                        <form action="../" method="POST" class="signout-div">
                            <button class="sign-out-btn" name="signout" type="submit">
                                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                Sign Out
                            </button>
                        </form>
                    </div>
                </div>
            <!-- Profile Code Ends -->
            </div>
        </nav>
    </header>
    <main>
        <h3>Security at Poll Now</h3>
        <p>At Poll Now, we take your data and privacy seriously. Below is an overview of our security practices.</p>

        <h5>1. Data Encryption</h5>
        <ul>
        <li>All traffic is served over HTTPS (TLS 1.2+), ensuring secure communication between clients and servers.</li>
        <li>User passwords are hashed using bcrypt with a cost factor of 12, making password theft extremely difficult.</li>
        <li>Poll results and personal data are encrypted at rest using AES-256 encryption.</li>
        </ul>

        <h5>2. Authentication & Authorization</h5>
        <ul>
        <li>Role-based access control ensures only authorized users (e.g. admins) can manage polls and sensitive data.</li>
        <li>Session tokens are stored in HttpOnly and Secure cookies with short expiration times to prevent session hijacking.</li>
        </ul>

        <h5>3. Input Validation & Injection Prevention</h5>
        <ul>
        <li>All user inputs are validated and sanitized on the server to prevent injection attacks.</li>
        <li>Parameterized queries are used to prevent SQL injection by isolating code from data.</li>
        <li>All user-facing output is escaped to mitigate cross-site scripting (XSS) vulnerabilities.</li>
        </ul>

        <h5>4. CSRF Protection</h5>
        <ul>
        <li>Every form includes a unique CSRF token that is verified on submission to prevent unauthorized actions.</li>
        <li>These tokens are checked server-side to ensure the request came from a valid and authenticated session.</li>
        </ul>

        <h5>5. Rate Limiting & Abuse Prevention</h5>
        <ul>
        <li>We implement rate limiting based on IP to prevent brute-force attacks on login and poll creation.</li>
        <li>High-risk actions (such as voting) are protected using invisible reCAPTCHA v3 to detect and block bots.</li>
        </ul>

        <h5>6. Monitoring & Incident Response</h5>
        <ul>
        <li>Authentication and error events are logged in real time for auditing and anomaly detection.</li>
        <li>Automatic alerts are triggered on detection of suspicious activity like repeated failed login attempts.</li>
        <li>Our security team is on-call 24/7 to respond to and contain any incidents that may occur.</li>
        </ul>

        <h5>7. Compliance & Privacy</h5>
        <ul>
        <li>We comply with GDPR and CCPA, ensuring users' rights over their personal data are fully respected.</li>
        <li>Up-to-date Privacy Policy and Terms of Service explain how we handle and protect your information.</li>
        <li>Users can request to download or permanently delete their data at any time from their account settings.</li>
        </ul>

        <h5>8. Ongoing Security Practices</h5>
        <ul>
        <li>We conduct regular third-party penetration testing to find and fix security gaps proactively.</li>
        <li>Our codebase is scanned continuously with tools like Snyk and Dependabot to detect vulnerable dependencies.</li>
        <li>All developers and staff undergo mandatory security training every six months to stay current with best practices.</li>
        </ul>

        <p>If you discover any potential vulnerability or threat, please <a href="mailto:ankush10yt@gmail.com">contact our security team</a> immediately. We appreciate your support in keeping Poll Now safe for everyone.</p>
    </main>
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-section branding">
                <h2>Poll Now</h2>
                <p>Vote in live polls or create your own in seconds.</p>
            </div>
            <div class="footer-section links">
                <h3>Quick Links</h3>
                <ul class="no-select">
                    <li>
                        <a href="./">                        
                            <form action="./" method="POST">
                                <input type="submit" class="footer-createpoll" value="Create Poll" name="createpoll"/>
                            </form>
                        </a>
                    </li>
                    <li><a href="../viewpolls/">View Polls</a></li>
                </ul>
            </div>
            <div class="footer-section contact">
                <h3>Contact</h3>
                <p>Email: ankush10yt@gmail.com</p>
                <p>Phone: +91-98312-52214</p>
            </div>
            <div class="footer-section social">
                <h3>Follow Us</h3>
                <div class="social-icons no-select">
                    <a href="https://www.facebook.com/people/Ankush-Bhattacharjee/100069448176354/?mibextid=ZbWKwL"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://x.com/coder_ankush"><i class="fab fa-twitter"></i></a>
                    <a href="https://github.com/ankush-github-11"><i class="fab fa-github"></i></a>
                    <a href="https://www.linkedin.com/in/ankush-bhattacharjee-609972302"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>© 2025 Poll Now. All rights reserved.</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="security-script.js" defer></script>
</body>
</html>