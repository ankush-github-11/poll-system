<?php
include "./config/connect.php";
    function getUserIP() {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            return $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            return explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0];
        } else {
            return $_SERVER['REMOTE_ADDR'];
        }
    }
unset(
    $_SESSION['wrongName'],
    $_SESSION['wrongEmail'],
    $_SESSION['wrongPassword'],
    $_SESSION['invalidName'],
    $_SESSION['invalidEmail'],
    $_SESSION['invalidPassword'],
    $_SESSION['invalidCredentials']
);
if(isset($_POST["signout"])){
    // session_start();
    session_unset();
    session_destroy();
    header("Location: ./");
    exit();
}
if(isset($_POST["createpoll"])){
    if(isset($_SESSION["name"])){
        header("Location: ./createpoll/");
        exit();
    }
    else{
        header("Location: ./signup/");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Create and participate in polls easily with PollNow.">
    <title>Poll Now</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="index-stylesheet.css">
    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
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
            if(isset($_SESSION["uid"])){
                $uid = $_SESSION["uid"];
                $sql = "select * from users where uid = '$uid'";
                $res = mysqli_query($conn, $sql);
                if($res && mysqli_num_rows($res) > 0){
                    $arr = mysqli_fetch_assoc($res);
                    echo $arr["name"];
                }
            }
        ?>
    </div>
    <header>
        <!-- Navbar Starts -->
        <nav class="no-select">
            <div class="navbar-side-div slide-animation hidden">
                <div class="navbar-fa-div"><i class="fa-solid fa-square-xmark fa-2xl"></i></div>
                <div class="nav-side-item-1-div">
                    <a draggable="false" class="nav-side-item-1" href="./">Home</a>
                </div>
                <div class="nav-side-item-2-div">
                    <a draggable="false" class="nav-side-item-2" href="">Contact</a>
                </div>
                <div class="nav-side-item-3-div">
                    <a draggable="false" class="nav-side-item-3" href="./viewpolls/">View Polls</a>
                </div>
                <div class="nav-side-item-4-div">
                    <a draggable="false" class="nav-side-item-4" href="./security/">Security</a>
                </div>
            </div>
            <div class="my-navbar-div fixed-top">
                <div class="website-logo-div no-select">
                    <a draggable="false" class="website-logo" href="./">
                        <img draggable="false" src="./images/main-logo.png" alt="Poll Now" width="50" height="50">
                    </a>
                </div>
                <div class="nav-items-top">
                    <div class="nav-items-div">
                        <div class="nav-item-1-div">
                            <a draggable="false" class="nav-item-1" href="./">Home</a>
                            <div class="nav-item-1-hover-div"></div>
                        </div>
                        <div class="nav-item-2-div">
                            <a draggable="false" class="nav-item-2" href="">Contact</a>
                            <div class="nav-item-2-hover-div"></div>
                        </div>
                        <div class="nav-item-3-div">
                            <a draggable="false" class="nav-item-3" href="./viewpolls/">View Polls</a>
                            <div class="nav-item-3-hover-div"></div>
                        </div>
                        <div class="nav-item-4-div">
                            <a draggable="false" class="nav-item-4" href="./security/">Security</a>
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
                    <a draggable="false" class="nav-link active" href="./login/">Login</a>
                </div>
                <div class="signup hidden">
                    <a draggable="false" class="nav-link active" href="./signup/">Sign Up</a>
                </div>
            <!-- Profile Code Starts -->
                <div class="dropdown-profile-div hidden">
                    <div class="profile">
                        <img draggable="false" src="./images/profile-logo.png" class="profile-logo no-select" alt="Profile Logo">
                    </div>
                    <div class="profile-dropdown-div hidden">
                        <div class="profile-image-name-div">
                            <div class="profile-image-div">
                                <a href="./profile/"><img draggable="false" src="./images/profile-logo.png" class="profile-logo no-select" alt="Profile Logo"></a>
                            </div>
                            <div class="profile-name-div">
                                <a href="./profile/">
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
                        <a href="./profile/" class="profile-div">
                            <i class="fa-solid fa-user"></i>
                            <div>My Profile</div>
                        </a>
                        <a href="./edit/" class="edit-div">
                            <i class="fa-solid fa-pen-to-square"></i>
                            <div>Edit Profile</div>
                        </a>
                        <form action="./" method="POST" class="signout-div">
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
        <div class="total-div-1">
            <div class="bg-glow-container">
                <div class="glow-box box1"></div>
                <div class="glow-box box2"></div>
                <div class="glow-box box3"></div>
                <div class="glow-box box4"></div>
                <div class="glow-box box5"></div>
            </div>
            <div class="middle-div">
                <div class="middle-div-under-1">
                    <div class="create-text">
                        <h2>Create and Participate</h2>
                        <h2>in Polls Easily</h2>
                    </div>
                    <!-- <div class="vote-text">
                        <h3 class="moving-glow">Vote in live polls or create your own in seconds</h3>
                    </div> -->
                    <div class="btn-middle-div no-select">
                        <form action="./" method="POST">
                            <input type="submit" class="btn createpoll" value="Create Poll" name="createpoll"/>
                        </form>
                        <a href="./viewpolls/" type="button" draggable="false" class="btn demo">View Polls</a>
                    </div>
                    <!-- <div class="swing-container no-select">
                        <img class="swing-image" src="./images/swing-1.png" alt="Swinging Image" draggable="false">
                    </div> -->
                </div>
            </div>
            <div class="side-div">
                <div class="popular-polls-div">
                    <h3 class="popular-polls">Popular Polls</h3>
                </div>
                <div class="side-div-under-1">
                    <div class="side-box-1 reveal-me-1">
                        <h4>Best Programming Language</h4>
                        <p>C / C++ / Java / Python / Javascript / etc.</p>
                        <div class="btn-vote-side-box-1">
                            <div class="people-voted-1-div-parent">
                                <div class="people-voted-1-div">
                                    <?php
                                        $sql = "select * from modal1";
                                        $res = mysqli_query($conn, $sql);
                                        $count = mysqli_num_rows($res);
                                        echo $count;
                                    ?>                  
                                </div>
                                <div>people have voted</div>
                            </div>
                            <button type="button" class="btn btn-side-box btn-vote-1">Vote</button>
                        </div>
                    </div>
                    <div class="side-box-2 reveal-me-2">
                        <h4>Favourite Time of the Year</h4>
                        <p>Summer / Monsoon / Fall / Winter / Spring</p>
                        <div class="btn-vote-side-box-2">
                            <div class="people-voted-2-div-parent">
                                <div class="people-voted-2-div">
                                    <?php
                                        $sql = "select * from modal2";
                                        $res = mysqli_query($conn, $sql);
                                        $count = mysqli_num_rows($res);
                                        echo $count;
                                    ?>                  
                                </div>
                                <div>people have voted</div>
                            </div>
                            <button type="button" class="btn btn-side-box btn-vote-2">Vote</button>
                        </div>
                    </div>
                    <div class="side-box-3 reveal-me-3">
                        <h4>Most Useful Gadget</h4>
                        <p>Smartphone / Laptop / Smartwatch / Tablet</p>
                        <div class="btn-vote-side-box-3">
                            <div class="people-voted-3-div-parent">
                                <div class="people-voted-3-div">
                                    <?php
                                        $sql = "select * from modal3";
                                        $res = mysqli_query($conn, $sql);
                                        $count = mysqli_num_rows($res);
                                        echo $count;
                                    ?>                  
                                </div>
                                <div>people have voted</div>
                            </div>
                            <button type="button" class="btn btn-side-box btn-vote-3">Vote</button>
                        </div>
                    </div>
                </div>
                <h3>Growth Overview</h3>
                <div class="side-div-under-2 no-select">
                    <div class="side-box-4 reveal-me-4">
                        <div class="my-fa-1">
                            <div><i class="fa-solid fa-paper-plane fa-xl"></i></div>
                            <h3>10,000</h3>
                            <div>Votes Cast</div>
                        </div>
                        <div class="my-fa-2">
                            <div><i class="fa-solid fa-wand-magic-sparkles fa-xl"></i></div>
                            <h3>1,000</h3>
                            <div>Polls Conducted</div>
                        </div>
                        <div class="my-fa-3">
                            <div><i class="fa-solid fa-users fa-xl"></i></div>
                            <h3>500</h3>
                            <div>Active Users</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="total-div-2">
            <div class="how-it-works-div">
                <h1>How It Works</h1>
                <div class="how-it-works-under-1 step reveal-me-5">
                    <h4><i class="fa-solid fa-user-plus"></i>Login & Register</h4>
                    <div>Create your account or sign in to get started with polling activities. Fast and secure registration ensures a smooth experience.</div>
                </div>
                <div class="how-it-works-under-2 step reveal-me-6">
                    <h4><i class="fa-solid fa-address-card"></i>Verify Identity</h4>
                    <div>To maintain a trustworthy voting environment, quickly verify your identity. It keeps polls fair and authentic.</div>
                </div>
                <div class="how-it-works-under-3 step reveal-me-7">
                    <h4><i class="fa-solid fa-table-list"></i>Create or Participate in Polls</h4>
                    <div>You can easily create your own polls or participate in exciting polls created by others. Engage with the community effortlessly.</div>
                </div>
                <div class="how-it-works-under-4 step reveal-me-8">
                    <h4><i class="fa-solid fa-square-poll-vertical"></i>Confirm Your Vote and See The Results</h4>
                    <div>After voting, instantly confirm your choice and view real-time results. Stay updated and see how your opinion shapes the outcome.</div>
                </div>
            </div>
        </div>
        <div class="total-div-3 hidden">
            <div class="modal-1 hidden">
                <div class="modal-1-header">
                    <h2>Best Programming Language</h2>
                    <i class="fa-regular x-1 fa-circle-xmark fa-2xl"></i>
                </div>
                <div class="modal-1-line-top"></div>
                <div class="modal-1-options-div">
                    <div class="modal-1-op-1">C</div>
                    <div class="modal-1-op-2">C++</div>
                    <div class="modal-1-op-3">Java</div>
                    <div class="modal-1-op-4">Python</div>
                    <div class="modal-1-op-5">Javascript</div>
                    <div class="modal-1-op-6">C#</div>
                    <div class="modal-1-op-7">PHP</div>
                    <div class="modal-1-op-8">Ruby</div>
                    <div class="modal-1-op-9">Go</div>
                    <div class="modal-1-op-10">Rust</div>
                    <div class="modal-1-op-11">HTML</div>
                    <div class="modal-1-op-12">Assembly</div>
                    <div class="modal-1-op-13">R</div>
                    <div class="modal-1-op-14">Swift</div>
                    <div class="modal-1-op-15">Kotlin</div>
                </div>
                <div class="modal-1-result hidden">
                <div class="UI-decision-1 hidden" data-value="<?php
                    $address = getUserIP();
                    $sql = "select * from modal1 where ipaddress='$address'";
                    $res = mysqli_query($conn,$sql);
                    if($res && mysqli_num_rows($res) > 0){
                        echo "Voted"; // Change this to Vote to check the
                    }
                    ?>">
                    </div>
                    <i class="fa-solid fa-paper-plane fa-2xl"></i>
                    <h5>Your response is already been submitted</h5>
                    <form action="./livepolls/" method="GET">
                        <input type="text" class="view1 hidden" name="view" value="1">
                        <input type="submit" class="btn btn-view-res-1" value="View Results">
                    </form>
                </div>
                <div class="modal-1-line-down"></div>
                <div class="modal-1-cancel-submit">
                    <button type="button" class="btn btn-danger cancel-1">Cancel</button>
                    <form action="./submit/" method="POST" class="submit-1-form pe-none">
                        <input type="text" class="view1 hidden" name="view" value="1">
                        <input type="text" class="result-1 hidden" name="result1">
                        <input type="submit" class="btn btn-success submit-1" name="submit1">
                    </form>
                </div>
            </div>
            <div class="modal-2 hidden">
                <div class="modal-2-header">
                    <h2>Favourite Time of the Year</h2>
                    <i class="fa-regular x-2 fa-circle-xmark fa-2xl"></i>
                </div>
                <div class="modal-2-line-top"></div>
                <div class="modal-2-options-div">
                    <div class="modal-2-op-1">Summer</div>
                    <div class="modal-2-op-2">Monsoon</div>
                    <div class="modal-2-op-3">Fall</div>
                    <div class="modal-2-op-4">Winter</div>
                    <div class="modal-2-op-5">Spring</div>
                </div>
                <div class="modal-2-result hidden">
                <div class="UI-decision-2 hidden" data-value="<?php
                    $address = getUserIP();
                    $sql = "select * from modal2 where ipaddress='$address'";
                    $res = mysqli_query($conn,$sql);
                    if($res && mysqli_num_rows($res) > 0){
                        echo "Voted";
                    }
                    ?>">
                    </div>
                    <i class="fa-solid fa-paper-plane fa-2xl"></i>
                    <h5>Your response is already been submitted</h5>
                    <form action="./livepolls/" method="GET">
                        <input type="text" class="view2 hidden" name="view" value="2">
                        <input type="submit" class="btn btn-view-res-2" value="View Results">
                    </form>
                </div>
                <div class="modal-2-line-down"></div>
                <div class="modal-2-cancel-submit">
                    <button type="button" class="btn btn-danger cancel-2">Cancel</button>
                    <form action="./submit/" method="POST" class="submit-2-form pe-none">
                        <input type="text" class="view2 hidden" name="view" value="2">
                        <input type="text" class="result-2 hidden" name="result2">
                        <input type="submit" class="btn btn-success submit-2" name="submit2">
                    </form>
                </div>
            </div>
            <div class="modal-3 hidden">
                <div class="modal-3-header">
                    <h2>Most Useful Gadget</h2>
                    <i class="fa-regular x-3 fa-circle-xmark fa-2xl"></i>
                </div>
                <div class="modal-3-line-top"></div>
                <div class="modal-3-options-div">
                    <div class="modal-3-op-1">Smartphone</div>
                    <div class="modal-3-op-2">Laptop</div>
                    <div class="modal-3-op-3">Smartwatch</div>
                    <div class="modal-3-op-4">Tablet</div>
                </div>
                <div class="modal-3-result hidden">
                <div class="UI-decision-3 hidden" data-value="<?php
                    $address = getUserIP();
                    $sql = "select * from modal3 where ipaddress='$address'";
                    $res = mysqli_query($conn,$sql);
                    if($res && mysqli_num_rows($res) > 0){
                        echo "Voted";
                    }
                    ?>">
                    </div>
                    <i class="fa-solid fa-paper-plane fa-2xl"></i>
                    <h5>Your response is already been submitted</h5>
                    <form action="./livepolls/" method="GET">
                        <input type="text" class="view3 hidden" name="view" value="3">
                        <input type="submit" class="btn btn-view-res-3" value="View Results">
                    </form>
                </div>
                <div class="modal-3-line-down"></div>
                <div class="modal-3-cancel-submit">
                    <button type="button" class="btn btn-danger cancel-3">Cancel</button>
                    <form action="./submit/" method="POST" class="submit-3-form pe-none">
                        <input type="text" class="view3 hidden" name="view" value="3">
                        <input type="text" class="result-3 hidden" name="result3">
                        <input type="submit" class="btn btn-success submit-3" name="submit3">
                    </form>
                </div>
            </div>
        </div>
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
    <script type="text/javascript" src="index-script.js" defer></script>
</body>

</html>

