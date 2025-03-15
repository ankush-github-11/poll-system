<?php
include "../config/connect.php";
if(isset($_POST["signout"])){
    // session_start();
    session_unset();
    session_destroy();
    header("Location: ./index.php");
    exit();
}
if(isset($_POST["createpoll"])){
    if(isset($_SESSION["name"])){
        header("Location: ../createpoll/create.php");
        exit();
    }
    else{
        header("Location: ../signup/signup.php");
        exit();
    }
}
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
    <link rel="stylesheet" href="index-stylesheet.css">
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
                            <form action="./index.php" method="POST">
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
        <div class="total-div-1">
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
                        <form action="./index.php" method="POST">
                            <input type="submit" class="btn createpoll" value="Create Poll" name="createpoll"/>
                        </form>
                        <button type="button" class="btn demo">Demo</button>
                    </div>
                    <!-- <div class="swing-container no-select">
                        <img class="swing-image" src="../images/swing-1.png" alt="Swinging Image" draggable="false">
                    </div> -->
                </div>
            </div>
            <div class="side-div">
                <div class="popular-polls-div glow-border">
                    <h3 class="popular-polls">Popular Polls</h3>
                </div>
                <div class="side-div-under-1">
                    <div class="side-box-1">
                        <h4>Programming Language</h4>
                        <p>C / C++ / Java / Python / Javascript / etc.</p>
                        <div class="btn-vote-side-box-1">
                            <div>
                                <?php
                                $sql = "select * from modal1";
                                $res = mysqli_query($conn, $sql);
                                $count = mysqli_num_rows($res);
                                echo $count;
                                ?>   
                                people have voted
                            </div>
                            <button type="button" class="btn btn-side-box btn-vote-1">Vote</button>
                        </div>
                    </div>
                    <div class="side-box-2">
                        <h4>Favourite Time of the Year</h4>
                        <p>Summer / Monsoon / Fall / Winter / Spring</p>
                        <div class="btn-vote-side-box-2">
                            <div>
                                <?php
                                $sql = "select * from modal2";
                                $res = mysqli_query($conn, $sql);
                                $count = mysqli_num_rows($res);
                                echo $count;
                                ?>                  
                                people have voted
                            </div>
                            <button type="button" class="btn btn-side-box btn-vote-2">Vote</button>
                        </div>
                    </div>
                    <div class="side-box-3">
                        <h4>Most Useful Gadget</h4>
                        <p>Smartphone / Laptop / Smartwatch / Tablet</p>
                        <div class="btn-vote-side-box-3">
                            <div>
                            <?php
                                $sql = "select * from modal3";
                                $res = mysqli_query($conn, $sql);
                                $count = mysqli_num_rows($res);
                                echo $count;
                            ?> 
                            people have voted</div>
                            <button type="button" class="btn btn-side-box btn-vote-3">Vote</button>
                        </div>
                    </div>
                </div>
                <h3>Growth Overview</h3>
                <div class="side-div-under-2 no-select">
                    <div class="side-box-4">
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
                <h3>How It Works</h3>
                <div class="how-it-works-div-under">
                    <div class="moving-border">Login & Register 🔑</div>
                    <div class="moving-border">Verify Identity 👤</div>
                    <div class="moving-border">Create or Participate in Polls 🗳️</div>
                    <div class="moving-border">Confirm Your Vote and See The Results ✅</div>
                </div>
            </div>
        </div>
        <div class="total-div-3 hidden">
            <div class="modal-1 hidden">
                <div class="modal-1-header">
                    <h1>Programming Language</h1>
                    <i class="fa-regular x-1 fa-circle-xmark fa-2xl"></i>
                </div>
                <div class="modal-1-line"></div>
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
                    $address = $_SERVER["REMOTE_ADDR"];
                    $sql = "select * from modal1 where ipaddress='$address'";
                    $res = mysqli_query($conn,$sql);
                    if($res && mysqli_num_rows($res) > 0){
                        echo "Voted";
                    }
                    ?>">
                    </div>
                    <i class="fa-solid fa-paper-plane fa-2xl"></i>
                    <h3>Your Response is already been submitted</h3>
                    <form action="../livepolls/result.php" method="GET">
                        <input type="text" class="view1 hidden" name="view" value="1">
                        <input type="submit" class="btn btn-view-res-1" value="View Results">
                    </form>
                </div>
                <div class="modal-1-line"></div>
                <div class="modal-1-cancel-submit">
                    <button type="button" class="btn btn-danger cancel-1">Cancel</button>
                    <!-- Change the POST to GET if dont want the resubmission and resubmission alert -->
                    <form action="../livepolls/result.php" method="POST">
                        <input type="text" class="result-1 hidden" name="result1">
                        <input type="submit" class="btn btn-success submit-1" name="submit1">
                    </form>
                </div>
            </div>
            <div class="modal-2 hidden">
                <div class="modal-2-header">
                    <h1>Favourite Time of the Year</h1>
                    <i class="fa-regular x-2 fa-circle-xmark fa-2xl"></i>
                </div>
                <div class="modal-2-line"></div>
                <div class="modal-2-options-div">
                    <div class="modal-2-op-1">Summer</div>
                    <div class="modal-2-op-2">Monsoon</div>
                    <div class="modal-2-op-3">Fall</div>
                    <div class="modal-2-op-4">Winter</div>
                    <div class="modal-2-op-5">Spring</div>
                </div>
                <div class="modal-2-result hidden">
                <div class="UI-decision-2 hidden" data-value="<?php
                    $address = $_SERVER["REMOTE_ADDR"];
                    $sql = "select * from modal2 where ipaddress='$address'";
                    $res = mysqli_query($conn,$sql);
                    if($res && mysqli_num_rows($res) > 0){
                        echo "Voted";
                    }
                    ?>">
                    </div>
                    <i class="fa-solid fa-paper-plane fa-2xl"></i>
                    <h3>Your Response is already been submitted</h3>
                    <form action="../livepolls/result.php" method="GET">
                        <input type="text" class="view2 hidden" name="view" value="2">
                        <input type="submit" class="btn btn-view-res-2" value="View Results">
                    </form>
                </div>
                <div class="modal-2-line"></div>
                <div class="modal-2-cancel-submit">
                    <button type="button" class="btn btn-danger cancel-2">Cancel</button>
                    <form action="../livepolls/result.php" method="POST">
                        <input type="text" class="result-2 hidden" name="result2">
                        <input type="submit" class="btn btn-success submit-2" name="submit2">
                    </form>
                </div>
            </div>
            <div class="modal-3 hidden">
                <div class="modal-3-header">
                    <h1>Most Useful Gadget</h1>
                    <i class="fa-regular x-3 fa-circle-xmark fa-2xl"></i>
                </div>
                <div class="modal-3-line"></div>
                <div class="modal-3-options-div">
                    <div class="modal-3-op-1">Smartphone</div>
                    <div class="modal-3-op-2">Laptop</div>
                    <div class="modal-3-op-3">Smartwatch</div>
                    <div class="modal-3-op-4">Tablet</div>
                </div>
                <div class="modal-3-result hidden">
                <div class="UI-decision-3 hidden" data-value="<?php
                    $address = $_SERVER["REMOTE_ADDR"];
                    $sql = "select * from modal3 where ipaddress='$address'";
                    $res = mysqli_query($conn,$sql);
                    if($res && mysqli_num_rows($res) > 0){
                        echo "Voted";
                    }
                    ?>">
                    </div>
                    <i class="fa-solid fa-paper-plane fa-2xl"></i>
                    <h3>Your Response is already been submitted</h3>
                    <form action="../livepolls/result.php" method="GET">
                        <input type="text" class="view3 hidden" name="view" value="3">
                        <input type="submit" class="btn btn-view-res-3" value="View Results">
                    </form>
                </div>
                <div class="modal-3-line"></div>
                <div class="modal-3-cancel-submit">
                    <button type="button" class="btn btn-danger cancel-3">Cancel</button>
                    <form action="../livepolls/result.php" method="POST">
                        <input type="text" class="result-3 hidden" name="result3">
                        <input type="submit" class="btn btn-success submit-3" name="submit3">
                    </form>
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












    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="index-script.js" defer></script>
</body>

</html>

