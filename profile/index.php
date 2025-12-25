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
    if(isset($_SESSION["uid"])) $uid = $_SESSION["uid"];
    else{
        header("Location: ../error/");
        exit();
    }
    function sanitize_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
        return $data;
    }
    if(isset($_POST["submit-edit"])) {
        $fields = [];
        $values = [];
        if (!empty($_POST["name"])  && trim($_POST["name"]) != "") {
            $fields[] = "name = ?";
            $values[] = sanitize_input($_POST["name"]);
        }
        if (!empty($_POST["bio"]) && trim($_POST["bio"]) != "") {
            $fields[] = "bio = ?";
            $values[] = sanitize_input($_POST["bio"]);
        }
        if (!empty($_POST["phone"]) && trim($_POST["phone"]) != "") {
            $fields[] = "phone = ?";
            $values[] = sanitize_input($_POST["phone"]);
        }
        if (isset($_POST["website"])) {
            $fields[] = "website = ?";
            $values[] = sanitize_input($_POST["website"]);
        }
        // if (empty($fields)) {
        //     echo htmlspecialchars("No fields provided to update.");
        //     exit;
        // }
        $sql = "UPDATE users SET " . implode(", ", $fields) . " WHERE uid = ?";
        $values[] = $uid;
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }
        $types = str_repeat("s", count($values) - 1) . "i";
        $stmt->bind_param($types, ...$values);
        $stmt->execute();
        // else {
        //     echo htmlspecialchars("Error: " . $stmt->error);
        // }
        $stmt->close();
    }
    $sql = "select * from users where uid='$uid'";
    $res = mysqli_query($conn,$sql);
    $row = [];
    if($res==true){
        if(mysqli_num_rows($res)>0){
            $row = mysqli_fetch_assoc($res);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <meta name="description" content="Access your profile dashboard to view activity, manage polls, and update personal account settings.">
    <meta name="keywords" content="profile dashboard, user dashboard, manage polls, account settings, poll activity">
    <meta name="robots" content="index, follow">
    <link rel="icon" type="image/png" href="../images/main-logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="./profile-stylesheet.css">
</head>
<body>
    <div class="no-select popup-screen hidden">
        <div class="popup-1 hidden">Thanks for Messaging Us!</div>
        <div class="popup-2 hidden">Thanks for Reporting a Bug!</div>
    </div>
    <div class="sessionUsername hidden">
        <?php
            if(isset($_SESSION["username"]))
                echo htmlspecialchars(htmlspecialchars($_SESSION["username"]));
            else{
                header("Location: ../error/");
                exit();
            }
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
    <div class="message-div hidden">
        <?php
            if(isset($_POST["message-submit"])){
                $username = $_SESSION["username"];
                $message = sanitize_input($_POST["message"]);
                $stmt = $conn->prepare("INSERT INTO messages (username, message) VALUES (?, ?)");
                $stmt->bind_param("ss", $username, $message);
                $stmt->execute();
                $stmt->close();
                echo htmlspecialchars("Message Sent");
            }
        ?>
    </div>
    <div class="bug-div hidden">
        <?php
            if(isset($_POST["bug-submit"])){
                $username = $_SESSION["username"];
                $bugTitle = sanitize_input($_POST["bug-title"]);
                $bugDesc = sanitize_input($_POST["bug-desc"]);
                $bugType = sanitize_input($_POST["bug-type"]);
                $stmt = $conn->prepare("INSERT INTO bugs (username, bugTitle, bugDesc, bugType) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("ssss", $username, $bugTitle, $bugDesc, $bugType);
                $stmt->execute();
                $stmt->close();
                echo htmlspecialchars("Bug Sent");
            }
        ?>
    </div>
    <header>
        <nav class="no-select">
            <div class="navbar-side-div slide-animation hidden">
                <div class="navbar-fa-div"><i class="fa-solid fa-square-xmark fa-2xl"></i></div>
                <div class="nav-side-item-1-div">
                    <a draggable="false" class="nav-side-item-1" href="../">Home</a>
                </div>
                <div class="nav-side-item-2-div">
                    <a draggable="false" class="nav-side-item-2" href="../viewpolls/">View Polls</a>
                </div>
                <div class="nav-side-item-3-div">
                    <a draggable="false" class="nav-side-item-3" href="../security/">Security</a>
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
                            <a draggable="false" class="nav-item-2" href="../viewpolls/">View Polls</a>
                            <div class="nav-item-2-hover-div"></div>
                        </div>
                        <div class="nav-item-3-div">
                            <a draggable="false" class="nav-item-3" href="../security/">Security</a>
                            <div class="nav-item-3-hover-div"></div>
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
            </div>
        </nav>
    </header>
    <main>
        <div class="total-div">
            <div class="top-nav-div">
                <div class="dashboard-div active-div">
                    <i class="my-fa fa-solid fa-address-card"></i>
                </div>
                <div class="help-faq-div">
                    <i class="my-fa fa-solid fa-circle-question"></i>
                </div>
                <div class="messages-and-support-div">
                    <i class="my-fa fa-solid fa-message"></i>
                </div>
                <div class="report-a-bug-div">
                    <i class="my-fa fa-solid fa-bug"></i>
                </div>
            </div>
            <div class="main-div">
                <div class="left-div">
                    <div class="quick-navigation-div">Quick Navigation</div>
                    <div class="dashboard-div active-div">
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
                <div class="right-div-1 flex">
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
                                    <div class="name-div-top fade-scroll">
                                        <?php
                                            echo htmlspecialchars($row["name"]);
                                        ?>
                                    </div>
                                    <div class="date-joined-div-top">Date Joined:
                                        <?php
                                            $date = new DateTime($row['dateJoined']);
                                            $day = (int)$date->format('j');
                                            $daySuffix = date('S', mktime(0, 0, 0, 1, $day));
                                            echo htmlspecialchars($day . $daySuffix . ' ' . $date->format('F, Y'));
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="polls-created-participated-div">
                            <div class="polls-created-div">
                                <div class="polls-created-text">Polls Created</div>
                                <div class="polls-created-number">
                                    <?php
                                        echo htmlspecialchars($row['pollsCreated']);
                                    ?>
                                </div>
                                <div class="polls-created-seeall-arrow-div">
                                    <a href="../created/" class="polls-created-seeall-btn">
                                        See All<i class="fa-solid fa-chevron-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="polls-participated-div">
                                <div class="polls-participated-text">Polls Participated</div>
                                <div class="polls-participated-number">
                                    <?php
                                        echo htmlspecialchars($row['pollsVoted']);
                                    ?>
                                </div>
                                <div class="polls-participated-seeall-arrow-div">
                                    <a href="../participated/" class="polls-participated-seeall-btn">
                                        See All<i class="fa-solid fa-chevron-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="right-div-under-2">
                        <button class="btn-shine">
                            <a href="../edit/">Edit Profile</a>
                        </button>
                    </div>
                    <div class="right-div-under-3">
                        <div class="personal-informations-div">
                            <div class="personal-information-text-div">Personal Information</div>
                            <div class="username-div">
                                <div class="username-left-div">Username</div>
                                <div class="username-right-div">
                                    <?php
                                        echo htmlspecialchars(htmlspecialchars($row['username']));
                                    ?>
                                </div>
                            </div>
                            <div class="name-div">
                                <div class="name-left-div">Name</div>
                                <div class="name-right-div">
                                    <?php
                                        echo htmlspecialchars(htmlspecialchars($row['name']));
                                    ?>
                                </div>
                            </div>
                            <div class="bio-div">
                                <div class="bio-left-div">Bio</div>
                                <div class="bio-right-div add-js">
                                    <?php
                                        $val = trim($row['bio']);
                                        if(isset($row['bio']) && $val != "")
                                            echo htmlspecialchars(htmlspecialchars($row['bio']));
                                        else
                                            echo "<a href='../edit/' class='add-a'>+ Add</a>";
                                    ?>
                                </div>
                            </div>
                            <!-- <div class="nationality-div">
                                <div class="nationality-left-div">Nationality</div>
                                <div class="nationality-right-div add-js">
                                    <?php
                                        if(isset($row['nationality']))
                                            echo htmlspecialchars(htmlspecialchars($row['nationality']));
                                        else
                                            echo htmlspecialchars("<a href='../edit/' class='add-a'>+ Add</a>");
                                    ?>
                                </div>
                            </div>
                            <div class="city-div">
                                <div class="city-left-div">City</div>
                                <div class="city-right-div add-js">
                                    <?php
                                        if(isset($row['city']))
                                            echo htmlspecialchars(htmlspecialchars($row['city']));
                                        else
                                            echo htmlspecialchars("<a href='../edit/' class='add-a'>+ Add</a>");
                                    ?>
                                </div>
                            </div>
                            <div class="dob-div">
                                <div class="dob-left-div">Date of Birth</div>
                                <div class="dob-right-div add-js">
                                    <?php
                                        if(isset($row['dob']))
                                            echo htmlspecialchars(htmlspecialchars($row['dob']));
                                        else
                                            echo htmlspecialchars("<a href='../edit/' class='add-a'>+ Add</a>");
                                    ?>
                                </div>
                            </div> -->
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
                                <div class="email-right-div">
                                    <?php
                                        echo htmlspecialchars(htmlspecialchars($row['email']));
                                    ?>
                                </div>
                            </div>
                            <div class="phone-div">
                                <div class="phone-left-div">Phone</div>
                                <div class="phone-right-div add-js">
                                    <?php
                                        $val = trim($row['phone']);
                                        if(isset($row['phone']) && $val != "")
                                            echo htmlspecialchars(htmlspecialchars($row['phone']));
                                        else
                                            echo "<a href='../edit/' class='add-a'>+ Add</a>";
                                    ?>
                                </div>
                            </div>
                            <div class="website-div">
                                <div class="website-left-div">Your Website URL</div>
                                <a class="website-right-div add-js">
                                    <?php
                                    $val = trim($row['website']);
                                    if (isset($row['website']) && $val != "") {
                                        if (!preg_match("~^(?:f|ht)tps?://~i", $val)) {
                                            $val = "https://" . $val;
                                        }
                                        $safeUrl = htmlspecialchars($val, ENT_QUOTES, 'UTF-8');
                                        $displayText = htmlspecialchars($row['website'], ENT_QUOTES, 'UTF-8');
                                        echo "<a class='website-right-div add-js' href='{$safeUrl}' target='_blank'>{$displayText}</a>";
                                    }
                                    else {
                                        echo "<a href='../edit/' class='add-a'>+ Add</a>";
                                    }
                                    ?>
                                </a>
                            </div>
                            <!-- <div class="linkedin-div">
                                <div class="linkedin-left-div">LinkedIn URL</div>
                                <div class="linkedin-right-div add-js">
                                    <?php
                                        if(isset($row['linkedin']))
                                            echo htmlspecialchars(htmlspecialchars($row['linkedin']));
                                        else
                                            echo htmlspecialchars("<a href='../edit/' class='add-a'>+ Add</a>");
                                    ?>
                                </div>
                            </div>
                            <div class="twitter-div">
                                <div class="twitter-left-div">Twitter/X URL</div>
                                <div class="twitter-right-div add-js">
                                    <?php
                                        if(isset($row['twitter']))
                                            echo htmlspecialchars(htmlspecialchars($row['twitter']));
                                        else
                                            echo htmlspecialchars("<a href='../edit/' class='add-a'>+ Add</a>");
                                    ?>
                                </div>
                            </div>
                            <div class="facebook-div">
                                <div class="facebook-left-div">Facebook URL</div>
                                <div class="facebook-right-div add-js">
                                    <?php
                                        if(isset($row['facebook']))
                                            echo htmlspecialchars(htmlspecialchars($row['facebook']));
                                        else
                                            echo htmlspecialchars("<a href='../edit/' class='add-a'>+ Add</a>");
                                    ?>
                                </div>
                            </div>
                            <div class="instagram-div">
                                <div class="instagram-left-div">Instagram URL</div>
                                <div class="instagram-right-div add-js">
                                    <?php
                                        if(isset($row['instagram']))
                                            echo htmlspecialchars(htmlspecialchars($row['instagram']));
                                        else
                                            echo htmlspecialchars("<a href='../edit/' class='add-a'>+ Add</a>");
                                    ?>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="right-div-2 hidden">
                    <div class="general-questions-div">General Questions</div>
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <div class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                What is this polling system?
                            </div>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                This is an online platform where users can <strong>create, participate in, and analyze polls</strong> easily.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <div class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                How do I create a poll?
                            </div>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    You can create a poll by signing in, navigating to the <strong>"Create Poll"</strong> section, and filling in the required details such as question, options, and duration.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <div class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Do I need an account to vote in a poll?
                            </div>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    It <strong>depends</strong> on the poll settings. Some polls allow <strong> guest voting</strong>, while others require <strong>user registration</strong>.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="voting-process-div">Voting Process</div>
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <div class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                How many times can I vote in a poll?
                            </div>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    Each poll has its own rules. Some allow only one vote per user, while others may allow multiple votes <strong>depending on the settings.</strong>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <div class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                Can I change my vote after submitting?
                            </div>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    No, once a vote is submitted, it <strong>cannot be changed.</strong>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <div class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                How do I know if my vote was counted?
                            </div>
                            </h2>
                            <div id="collapseSix" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    After voting, you will see a <strong>confirmation message</strong>, and the poll results (if public) will update automatically.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <div class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                Why can't I vote in a poll?
                            </div>
                            </h2>
                            <div id="collapseSeven" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    The poll has <strong>ended</strong> or
                                    you've <strong>already voted</strong> (if multiple votes are not allowed) or
                                    you need to <strong>sign in</strong> to vote.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="poll-management-div">Poll Management</div>
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <div class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                Can I edit my poll after creating it?
                            </div>
                            </h2>
                            <div id="collapseEight" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    No, once a poll is published, you <strong>cannot edit</strong> the question or options. However, you can <strong>close the poll</strong> early if needed.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <div class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                How long does a poll stay active?
                            </div>
                            </h2>
                            <div id="collapseNine" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    The poll creator sets the duration. Once the <strong>time expires</strong>, voting is automatically disabled.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <div class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                Can I delete my poll?
                            </div>
                            </h2>
                            <div id="collapseTen" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    <strong>Yes</strong>, poll creators have the option to delete their polls from the dashboard.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="results-and-privacy-div">Results & Privacy</div>
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <div class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                                How are poll results displayed?
                            </div>
                            </h2>
                            <div id="collapseEleven" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    Poll results can be viewed in <strong>real-time if set to public</strong>. Otherwise, they are only visible <strong>after the poll ends</strong>.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <div class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwelve" aria-expanded="false" aria-controls="collapseTwelve">
                                Can I keep my poll results private?
                            </div>
                            </h2>
                            <div id="collapseTwelve" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    <strong>Yes</strong>, poll creators can choose to display results publicly or keep them private.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <div class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThirteen" aria-expanded="false" aria-controls="collapseThirteen">
                                Are votes anonymous?
                            </div>
                            </h2>
                            <div id="collapseThirteen" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    <strong>Depending on the poll settings</strong>, votes may be anonymous or linked to user accounts.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="technical-and-security-div">Technical & Security</div>
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <div class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFourteen" aria-expanded="false" aria-controls="collapseFourteen">
                                Is the polling system secure?
                            </div>
                            </h2>
                            <div id="collapseFourteen" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    <strong>Yes</strong>, we use <strong>encryption and anti-fraud measures</strong> to ensure the integrity of the polls.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <div class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFifteen" aria-expanded="false" aria-controls="collapseFifteen">
                                How do you prevent multiple votes from the same person?
                            </div>
                            </h2>
                            <div id="collapseFifteen" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    We use <strong>session tracking, IP restrictions, and optional user authentication</strong> to prevent duplicate votes.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <div class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSixteen" aria-expanded="false" aria-controls="collapseSixteen">
                                Can I embed a poll on my website?
                            </div>
                            </h2>
                            <div id="collapseSixteen" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    <strong>Yes</strong>, you can generate an embed code for your poll and add it to your website.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="right-div-3 hidden">
                    <div class="send-a-message-div">Send a message to us!</div>
                    <form class="send-message-div" action="./" method="POST">
                        <textarea class="textarea" rows="8" required name="message"></textarea>
                        <input type="submit" value="Send" class="send-btn" name="message-submit">
                    </form>
                </div>
                <div class="right-div-4 hidden">
                    <div class="report-bug-div">Report a Bug</div>
                    <div class="find-issue-div">Found an issue? Help us improve by reporting it!</div>
                    <form action="./" method="POST" class="bug-form">
                        <div class="flex-nowrap">
                            <div class="input-group-text-first" id="addon-wrapping">Bug Title</div>
                            <input required autocomplete="off" type="text" class="form-input" name="bug-title">
                        </div>
                        <div class="flex-nowrap bug-description-div">
                            <div class="input-group-text-first" id="addon-wrapping">Bug Description</div>
                            <textarea required type="text" class="form-textarea" rows="3" name="bug-desc"></textarea>
                        </div>
                        <div class="input-group-options mb-3">
                            <label class="input-group-text">Bug Category</label>
                            <select name="bug-type" class="form-select">
                                <option value="UI/UX Issue">UI/UX Issue</option>
                                <option value="Functional Bug">Functional Bug</option>
                                <option value="Performance Issue">Performance Issue</option>
                                <option value="Security Issue">Security Issue</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <input type="submit" name="bug-submit" class="submit-btn">
                    </div>
                </form>
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

    <script src="./profile-script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>

    </html>