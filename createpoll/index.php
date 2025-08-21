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
    <meta name="description" content="Create a new poll easily with customizable options. Set questions, add choices, and launch your online poll instantly.">
    <meta name="keywords" content="create poll, new poll, online poll, poll builder, add choices, launch poll">
    <meta name="robots" content="index, follow">
    <title>Create Poll</title>
    <link rel="icon" type="image/png" href="../images/main-logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="create-stylesheet.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>

<body>
    <div class="sessionUid hidden">
        <?php
            if(isset($_SESSION["uid"]))
                echo htmlspecialchars($_SESSION["uid"]);
            else{
                header("Location: ../signup/");
                exit();
            }
        ?>
    </div>
    <div class="sessionUsername hidden">
        <?php
            if(isset($_SESSION["username"]))
                echo htmlspecialchars($_SESSION["username"]);
        ?>
    </div>
    <div class="sessionName hidden">
        <?php
            if(isset($_SESSION["uid"])){
                $uid = $_SESSION["uid"];
                $sql = "select * from users where uid = '$uid'";
                $res = mysqli_query($conn, $sql);
                if($res && mysqli_num_rows($res) > 0){
                    $temp = mysqli_fetch_assoc($res);
                    echo htmlspecialchars($temp["name"]);
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
                    <a draggable="false" class="nav-side-item-1" href="../">Home</a>
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
                                            $profile = mysqli_fetch_assoc($res);
                                            echo htmlspecialchars($profile["name"]);
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
        <div class=" no-select popup-screen hidden">
            <div class="popup-1 hidden">Please fill all the fields</div>
            <div class="popup-2 hidden">Choose all the fields</div>
            <div class="popup-3 hidden">No two options can be identical</div>
        </div>

        <form action="../mypoll/" method="POST">

            <div class="total-div">
                <div class="container-div">
                    <div class="left-div">
                    <h2 class="create-text moving-glow">Create a New Poll</h2>
                    <div class="sidebar-options">
                        <div class="sidebar-1 op-active">
                            <i class="side-fa fa-solid fa-square-poll-horizontal"></i>
                            <div class="sidebar-1-text js-select">Question & Poll Options</div>
                        </div>
                        <div class="sidebar-2">
                            <i class="side-fa fa-solid fa-list-ul"></i>
                            <div class="sidebar-2-text js-select">Choose Template</div>
                            <span class="new-span">NEW</span>
                        </div>
                        <div class="sidebar-3">
                            <i class="side-fa fa-solid fa-calendar-check"></i>
                            <div class="sidebar-3-text js-select">Schedule and Duration</div>
                        </div>
                        <div class="sidebar-4">
                            <i class="side-fa fa-solid fa-gears"></i>
                            <div class="sidebar-4-text js-select">Advanced Settings</div>
                        </div>
                        <div class="sidebar-5">
                            <i class="side-fa fa-solid fa-arrow-up-right-from-square"></i>
                            <div class="sidebar-5-text js-select">Preview and Share Poll</div>
                        </div>
                    </div>
                    <div class="step-div">
                        <p class="step-p">Step 1 of 5</p>
                        <div class="outer-bar">
                            <div class="inner-bar"></div>
                        </div>
                    </div>
                </div>
                <div class="vertical-line"></div>
                <div class="right-div">
                    <div class="sidebar-nav-total">
                        <div class="sidebar-nav">
                            <i class="sidebar-nav-1-fa fa-solid fa-square-poll-horizontal">
                                <div class="my-fa hidden">Question & Poll Options</div>
                            </i>
                            <div class="vertical-line-nav"></div>
                            <i class="my-fa sidebar-nav-2-fa fa-solid fa-blue fa-list-ul">
                                <div class="my-fa hidden">Choose Template</div>
                            </i>
                            <div class="vertical-line-nav"></div>
                            <i class="my-fa sidebar-nav-3-fa fa-solid fa-calendar-check">
                                <div class="my-fa hidden">Schedule and Duration</div>
                            </i>
                            <div class="vertical-line-nav"></div>
                            <i class="my-fa sidebar-nav-4-fa fa-solid fa-gears">
                                <div class="my-fa hidden">Advanced Settings</div>
                            </i>
                            <div class="vertical-line-nav"></div>
                            <i class="my-fa sidebar-nav-5-fa fa-solid fa-arrow-up-right-from-square">
                                <div class="my-fa hidden">Preview and Share Poll</div>
                            </i>
                        </div>
                        <div class="outer-bar">
                            <div class="inner-bar"></div>
                        </div>
                    </div>
                    <h1 class="right-div-heading">Question & Poll Options</h1>
                    <div class="horizontal-line-right-div-1"></div>


                    

                    <div class="question-and-poll-options">
                        <div class="input-field form-title all-options">
                            <input type="text" required spellcheck="false" autocomplete="off" name="title">
                            <label>Enter the Title</label>
                        </div>
                        <div class="input-field form-desc all-options">
                            <input type="text" required spellcheck="false" autocomplete="off" name="description">
                            <label>Enter the Description</label>
                        </div>
                        <div class="add-option-div all-options no-select">
                            <div class="btn-add-op all-options no-select">+ Option</div>
                        </div>
                        <div class="input-field required-poll-option-1 option all-options">
                            <input type="text" required spellcheck="false" autocomplete="off" name="option1">
                            <label>Option 1</label>
                        </div>
                        <div class="input-field required-poll-option-2 option all-options">
                            <input type="text" required spellcheck="false" autocomplete="off" name="option2">
                            <label>Option 2</label>
                        </div>
                    </div>





                    <div class="choose-template hidden">
                        <!-- Predefined Poll Types -->
                        <div class="choose-template-div-1">
                            <div class="choose-template-heading-1">Predefined Poll Types</div>
                            <div class="choose-template-div-1-under">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input my-radio-btn" type="radio" name="pollTypeOptions"
                                    id="pollType1" value="single-choice" checked>
                                    <label class="form-check-label" for="pollType1">Single-Choice</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input my-radio-btn" type="radio" name="pollTypeOptions"
                                    id="pollType2" value="multiple-choice">
                                    <label class="form-check-label" for="pollType2">Multiple-Choice</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input my-radio-btn" type="radio" name="pollTypeOptions"
                                    id="pollType3" value="yes-no">
                                    <label class="form-check-label" for="pollType3">Yes/No</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input my-radio-btn" type="radio" name="pollTypeOptions"
                                        id="pollType4" value="open-ended">
                                    <label class="form-check-label" for="pollType4">Open-Ended</label>
                                </div>
                            </div>
                        </div>
                        <!-- Visual Themes -->
                        <div class="choose-template-div-2">
                            <div class="choose-template-heading-2">Visual Themes</div>
                            <div class="choose-template-div-2-under">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input my-radio-btn" type="radio" name="themeOptions"
                                    id="theme1" value="minimalist" checked>
                                    <label class="form-check-label" for="theme1">Minimalist</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input my-radio-btn" type="radio" name="themeOptions"
                                    id="theme2" value="colorful">
                                    <label class="form-check-label" for="theme2">Colorful</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input my-radio-btn" type="radio" name="themeOptions"
                                    id="theme3" value="dark-mode">
                                    <label class="form-check-label" for="theme3">Dark Mode</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input my-radio-btn" type="radio" name="themeOptions"
                                        id="theme4" value="gradient">
                                        <label class="form-check-label" for="theme4">Gradient</label>
                                </div>
                            </div>
                        </div>



                        <!-- Case-Specific Templates -->
                        <div class="choose-template-div-3">
                            <div class="choose-template-heading-3">Case-Specific</div>
                            <div class="choose-template-div-3-under">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input my-radio-btn" type="radio" name="caseOptions"
                                    id="case1" value="event">
                                    <label class="form-check-label" for="case1">Event Scheduling</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input my-radio-btn" type="radio" name="caseOptions"
                                    id="case2" value="surveys">
                                    <label class="form-check-label" for="case2">Surveys</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input my-radio-btn" type="radio" name="caseOptions"
                                    id="case3" value="quizzes">
                                    <label class="form-check-label" for="case3">Quizzes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input my-radio-btn" type="radio" name="caseOptions"
                                    id="case4" value="opinions">
                                    <label class="form-check-label" for="case4">Opinions</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input my-radio-btn" type="radio" name="caseOptions"
                                    id="case5" value="others">
                                    <label class="form-check-label" for="case5">Others</label>
                                </div>
                            </div>
                        </div>
                    </div>



                    
                    
                    <div class="schedule-and-duration hidden">
                        <div class="schedule-and-duration-div-1">
                            <label for="publish-immediately">Publish Immediately</label>
                            <input class="publish-immediately-checkbox form-check-input" name="publish-immediately-checkbox" type="checkbox">
                        </div>
                        <div class="schedule-and-duration-div-2">
                            <label>Select Start Date & Time</label>
                            <div class="schedule-message"></div>
                            <div class="schedule-and-duration-div-2-under">
                                <i class="fa-solid my-fa-calendar fa-calendar-days" alt="Calendar Icon"></i>
                                <input
                                    id="start-date-time"
                                    class="schedule-and-duration-div-2-calendar"
                                    type="text"
                                    name="dateAndTime"
                                />
                            </div>
                        </div>
                        
                        <div class="schedule-and-duration-div-3">
                            <div class="schedule-and-duration-div-3-header">Select Duration of the Poll</div>
                            <select class="btn btn-schedule-and-duration-div-3 dropdown-toggle" name="duration">
                                <option value="Infinite Time">Infinite</option>
                                <option value="1 Hour">1 Hour</option>
                                <option value="3 Hours">3 Hours</option>
                                <option value="6 Hours">6 Hours</option>
                                <option value="12 Hours">12 Hours</option>
                                <option value="1 Day">1 Day</option>
                            </select>
                        </div>
                    </div>


                    
                    
                    <div class="advanced-settings hidden">
                        <div class="advanced-settings-div-1">
                            <div>Voters Representation</div>
                            <div class="advanced-settings-div-1-under">
                                <div class="advanced-settings-div-1-under-1">
                                    <input type="radio" name="votersRepresentation" class="form-check-input initial-input advanced-settings-radio-btn" value="initial">
                                    <div class="initial-div no-select">A</div>
                                    <label for="initial-input" class="initial-label">Initial</label>
                                </div>
                                <div class="advanced-settings-div-1-under-2">
                                    <input type="radio" name="votersRepresentation" class="form-check-input counter-input advanced-settings-radio-btn" value="counter">
                                    <div class="counter-div no-select">11</div>
                                    <label for="counter-input" class="counter-label">Counter</label>
                                </div>
                            </div>
                        </div>
                        <div class="advanced-settings-div-2">
                            <div>Devices</div>
                            <div class="advanced-settings-div-2-under">
                                <div>
                                    <input type="radio" name="devices"
                                    class="form-check-input all-input advanced-settings-radio-btn" value="all" checked>
                                    <label for="all-input" class="all-label">All</label>
                                </div>
                                <div>
                                    <input type="radio" name="devices"
                                    class="form-check-input desktop-input advanced-settings-radio-btn" value="desktop">
                                    <label for="desktop-input" class="desktop-label">Desktop</label>
                                </div>
                                <div>
                                    <input type="radio" name="devices"
                                    class="form-check-input mobile-input advanced-settings-radio-btn" value="mobile">
                                    <label for="mobile-input" class="mobile-label">Mobile</label>
                                </div>
                            </div>
                        </div>



                        <div class="advanced-settings-div-3">
                            <div>Show Results After</div>
                            <div class="dropdown advanced-settings-div-3-under">
                                <select class="btn btn-advanced-settings-div-3-under dropdown-toggle" name="showResults">
                                    <option value="poll finishes">Poll Finishes</option>
                                    <option value="participant votes">Participant Votes</option>
                                </select>
                            </div>
                        </div>
                        
                    </div>

                    
                    
                    <div class="preview-and-share-poll hidden">
                        <div class="preview-btn-toggle no-select">
                            <div>Participant</div>
                            <div class="my-btn-toggle">Admin</div>
                        </div>
                        <div class="admin-view">
                            <div class="admin-header-div">
                                <!-- <div class="admin-header-image-div">
                                    <img class="admin-image" src="../images/admin-logo.png" alt="">
                                </div> -->
                                <div class="admin-header-texts">
                                    <div class="admin-header-name">Admin Name</div>
                                    <div class="admin-header-title">Poll Title</div>
                                </div>
                            </div>
                            <div class="admin-description">Poll Description</div>
                            <div class="admin-body-div">
                                <!-- <div class="poll-display-box">
                                    <div class="option-and-percent">
                                    <div class="poll-option">Option 1</div>
                                    <div class="percent">15%</div>
                                    </div>
                                    <div class="poll-display-percent"></div>
                                </div>
                                <div class="poll-display-box">
                                    <div class="option-and-percent">
                                    <div class="poll-option">Option 2</div>
                                    <div class="percent">15%</div>
                                    </div>
                                    <div class="poll-display-percent"></div>
                                </div>
                                <div class="poll-display-box">
                                    <div class="option-and-percent">
                                    <div class="poll-option">Option 3</div>
                                    <div class="percent">20%</div>
                                    </div>
                                    <div class="poll-display-percent"></div>
                                </div>
                                <div class="poll-display-box">
                                    <div class="option-and-percent">
                                    <div class="poll-option">Option 4</div>
                                    <div class="percent">30%</div>
                                    </div>
                                    <div class="poll-display-percent"></div>
                                </div>
                                <div class="poll-display-box">
                                    <div class="option-and-percent">
                                    <div class="poll-option">Option 5</div>
                                    <div class="percent">10%</div>
                                    </div>
                                    <div class="poll-display-percent"></div>
                                </div>
                                <div class="poll-display-box">
                                    <div class="option-and-percent">
                                    <div class="poll-option">Option 6</div>
                                    <div class="percent">10%</div>
                                    </div>
                                    <div class="poll-display-percent"></div>
                                </div> -->
                            </div>
                            <div class="admin-footer-div"></div>
                        </div>

                        <div class="participant-view hidden">
                            <div class="participant-header-div">
                                <!-- <div class="participant-header-image-div">
                                    <img class="participant-image" src="../images/admin-logo.png" alt="">
                                </div> -->
                                <div class="participant-header-texts">
                                    <div class="participant-header-name">Admin Name</div>
                                    <div class="participant-header-title">Poll Title</div>
                                </div>
                            </div>
                            <div class="participant-description">Poll Description</div>
                            <div class="participant-body-div">
                                <div class="participant-body-heading">Select Your Option</div>
                                <div class="participant-poll-options-div">
                                    <div class="option-div">
                                        <div class="preview-option">
                                            Poll Option 1
                                        </div>
                                        <div class="green-dot-div">
                                            <div class="green-dot-border">
                                                <div class="green-dot"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="option-div">
                                        <div class="preview-option">
                                            Poll Option 2
                                        </div>
                                        <div class="green-dot-div">
                                            <div class="green-dot-border">
                                                <div class="green-dot"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="option-div">
                                        <div class="preview-option">
                                            Poll Option 3
                                        </div>
                                        <div class="green-dot-div">
                                            <div class="green-dot-border">
                                                <div class="green-dot"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="option-div">
                                        <div class="preview-option">
                                            Poll Option 4
                                        </div>
                                        <div class="green-dot-div">
                                            <div class="green-dot-border">
                                                <div class="green-dot"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="option-div">
                                        <div class="preview-option">
                                            Poll Option 5
                                        </div>
                                        <div class="green-dot-div">
                                            <div class="green-dot-border">
                                                <div class="green-dot"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="option-div">
                                        <div class="preview-option">
                                            Poll Option 6
                                        </div>
                                        <div class="green-dot-div">
                                            <div class="green-dot-border">
                                                <div class="green-dot"></div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="participants-horizontal-line-div">
                                <div class="participants-horizontal-line"></div>
                            </div>
                            <div class="participants-footer-div">
                                <div class="participants-footer-buttons-div">
                                    <button type="button" class="btn participants-footer-btn-exit">Exit</button>
                                    <button type="button" class="btn participants-footer-btn-submit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    

                    <div class="horizontal-line-right-div-2"></div>
                    <div class="btn-cancel-continue">
                        <input type="reset" class="btn btn-cancel" value="Clear">
                        <button type="button" class="btn btn-continue">Continue</button>
                        <button type="submit" value="Create" class="hidden btn btn-create">Create</button>
                    </div>
                </div>
            </div>
        </div>        
    </form>
        
        
        
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
    
    
    
    
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="create-script.js"></script>
</body>

</html>