<?php
    include "../config/connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poll Now</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="poll-stylesheet.css">
</head>
<body>
    <div class="sessionUsername hidden">
        <?php
            if(isset($_SESSION["username"]))
                echo $_SESSION["username"];
            // else{
            //     header("Location: ../signup/signup.php");
            //     exit();
            // }
        ?>
    </div>
    <div class="pid hidden"> 
        <?php
            if(isset($_SERVER['QUERY_STRING'])){
                $query_string = $_SERVER['QUERY_STRING'];
                preg_match('/\d+/', $query_string, $matches);
                $pid = $matches[0] ?? null;
                echo htmlspecialchars($pid, ENT_QUOTES, 'UTF-8');
                $sql = "select * from polls where pid = '$pid'";
                $res = mysqli_query($conn, $sql);
                $arr = [];
                if($res==true){
                    if(mysqli_num_rows($res) > 0){
                        $arr = mysqli_fetch_assoc($res);
                    }
                    else{
                        echo "<br>";
                        echo "<br>";
                        echo "<br>";
                        echo "No such Polls Exist";
                        echo "<br>";
                        echo "Enter a valid one";
                        exit();
                        // Refine the Design please
                    }
                }
            }
        ?>
    </div>
    <div class="sessionName hidden">
        <?php
            if(isset($_SESSION["name"]))
                echo $_SESSION["name"];
        ?>
    </div>
    <div class="options hidden">
        <?php
            echo $arr["options"];
        ?>
    </div>
    <div class="theme hidden">
        <?php
            echo $arr["theme"];
        ?>
    </div>
    <header>
        <!-- Navbar Starts -->
        <nav>
            <div class="navbar-side-div slide-animation hidden">
                <div class="navbar-fa-div"><i class="fa-solid fa-square-xmark fa-2xl"></i></div>
                <div class="nav-side-item-1-div">
                    <a draggable="false" class="nav-side-item-1" href="../home/index.php">Home</a>
                </div>
                <div class="nav-side-item-2-div">
                    <a draggable="false" class="nav-side-item-2" href="">Contact</a>
                </div>
                <div class="nav-side-item-3-div">
                    <a draggable="false" class="nav-side-item-3" href="">View Polls</a>
                </div>
                <div class="nav-side-item-4-div">
                    <a draggable="false" class="nav-side-item-4" href="">Security</a>
                </div>
            </div>
            <div class="my-navbar-div fixed-top">
                <div class="website-logo-div">
                    <a class="website-logo" href="../home/index.php">
                        <img src="../images/main-logo.png" alt="Poll Now" width="50" height="50">
                    </a>
                </div>
                <div class="nav-items-top">
                    <div class="nav-items-div">
                        <div class="nav-item-1-div">
                            <a draggable="false" class="nav-item-1" href="../home/index.php">Home</a>
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
                </div>
                <div class="hamburger-div">
                    <i class="fa-solid fa-bars"></i>
                </div>
                <div class="light-dark-div">
                    <svg class="light-mode-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="#ff0055"><path d="M480-360q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35Zm0 80q-83 0-141.5-58.5T280-480q0-83 58.5-141.5T480-680q83 0 141.5 58.5T680-480q0 83-58.5 141.5T480-280ZM200-440H40v-80h160v80Zm720 0H760v-80h160v80ZM440-760v-160h80v160h-80Zm0 720v-160h80v160h-80ZM256-650l-101-97 57-59 96 100-52 56Zm492 496-97-101 53-55 101 97-57 59Zm-98-550 97-101 59 57-100 96-56-52ZM154-212l101-97 55 53-97 101-59-57Zm326-268Z"/></svg>
                    <svg class="dark-mode-svg hidden" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="#ff0055"><path d="M480-120q-150 0-255-105T120-480q0-150 105-255t255-105q14 0 27.5 1t26.5 3q-41 29-65.5 75.5T444-660q0 90 63 153t153 63q55 0 101-24.5t75-65.5q2 13 3 26.5t1 27.5q0 150-105 255T480-120Zm0-80q88 0 158-48.5T740-375q-20 5-40 8t-40 3q-123 0-209.5-86.5T364-660q0-20 3-40t8-40q-78 32-126.5 102T200-480q0 116 82 198t198 82Zm-10-270Z"/></svg>
                </div>
                <div class="login hidden">
                    <a draggable="false" class="nav-link active" href="../login/login.php">Login</a>
                </div>
                <div class="signup hidden">
                    <a draggable="false" class="nav-link active" href="../signup/signup.php">Sign Up</a>
                </div>
            <!-- Profile Code Starts -->
                <div class="dropdown-profile-div hidden">
                    <div class="profile">
                        <img draggable="false" src="../images/profile-logo.png" class="profile-logo no-select" alt="Profile Logo">
                    </div>
                    <div class="profile-dropdown-div hidden">
                        <div class="profile-image-name-div">
                            <div class="profile-image-div">
                                <a href="../profile/profile.php"><img draggable="false" src="../images/profile-logo.png" class="profile-logo no-select" alt="Profile Logo"></a>
                            </div>
                            <div class="profile-name-div">
                                <a href="../profile/profile.php">
                                    <?php
                                        if(isset($_SESSION["name"]))
                                        echo $_SESSION["name"];
                                    ?>
                                </a>
                            </div>
                        </div>
                        <div class="horizontal-line"></div>
                        <div class="settings-div">
                            <i class="fa-solid fa-gear"></i>
                            <a href="../settings/settings.php">Settings</a>
                        </div>
                        <div class="edit-div">
                            <i class="fa-solid fa-pen-to-square"></i>
                            <a href="../edit/edit.php">Edit Profile</a>
                        </div>
                        <div class="signout-div">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                            <form action="../home/index.php" method="POST">
                                <button class="sign-out-btn" name="signout" type="submit">Sign Out</button>
                            </form>
                        </div>
                    </div>
                </div>
            <!-- Profile Code Ends -->
            </div>
        </nav>
    </header>
    <main>
        <div class="total-div">
            <div class="main-div-1">
                <div class="participant-view">
                    <div class="participant-header-div">
                        <!-- <div class="participant-header-image-div">
                            <img class="participant-image" src="../images/admin-logo.png" alt="">
                        </div> -->
                        <div class="participant-header-texts">
                            <div class="participant-header-name">Author: 
                                <?php
                                echo $arr["name"];
                                ?>
                            </div>
                            <div class="participant-header-title">
                                <?php
                                    echo $arr["title"];
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="participant-description">
                        <!-- Poll Description -->
                         <?php
                            echo $arr["description"];
                         ?>
                    </div>
                    <div class="participant-body-div">
                        <!-- <div class="participant-body-heading">Select Your Option</div> -->
                        <div class="participant-poll-options-div">
                            <!-- <div class="option-div">
                                <div class="preview-option">
                                    Hello this is your poll option number 1
                                </div>
                                <div class="green-dot-div">
                                    <div class="green-dot-border">
                                        <div class="green-dot"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="option-div">
                                <div class="preview-option">
                                    Hello this is your poll option number 2
                                </div>
                                <div class="green-dot-div">
                                    <div class="green-dot-border">
                                        <div class="green-dot"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="option-div">
                                <div class="preview-option">
                                    Hello this is your poll option number 3
                                </div>
                                <div class="green-dot-div">
                                    <div class="green-dot-border">
                                        <div class="green-dot"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="option-div">
                                <div class="preview-option">
                                    Hello this is your poll option number 4
                                </div>
                                <div class="green-dot-div">
                                    <div class="green-dot-border">
                                        <div class="green-dot"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="option-div">
                                <div class="preview-option">
                                    Hello this is your poll option number 5
                                </div>
                                <div class="green-dot-div">
                                    <div class="green-dot-border">
                                        <div class="green-dot"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="option-div">
                                <div class="preview-option">
                                    Hello this is your poll option number 6
                                </div>
                                <div class="green-dot-div">
                                    <div class="green-dot-border">
                                        <div class="green-dot"></div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div class="participants-horizontal-line-div">
                        <div class="participants-horizontal-line"></div>
                    </div>
                    <div class="participants-footer-div">
                        <form action="../success/success.php" method="POST">
                            <input type="text" class="hidden selected-option" name="selectedOption">
                            <input type="text" class="hidden voted-pid" name="votedPid">
                            <div class="participants-footer-buttons-div">
                                <button type="button" class="btn participants-footer-btn-exit">Exit</button>
                                <button type="submit" class="btn participants-footer-btn-submit disabled-button">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="main-div-2">
                <div class="admin-btn-div">
                    <form action="../polladmin/polladmin.php" method="POST">
                        <input class="admin-btn" value="Admin Dashboard" type="submit" name="submit">
                        <input type="text" class="hidden voted-pid" name="votedPid">
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
                <ul>
                    <li><a href="../home/index.php">How It Works</a></li>
                    <li><a href="">View Polls</a></li>
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
    <script src="./poll-script.js"></script>
</body>
</html>