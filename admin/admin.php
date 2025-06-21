<?php
include "../config/connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="admin-stylesheet.css">
</head>

<body>
    <div class="total-div">
        <div class="main-div">
            <div class="header-div no-select">
                <a class="website-logo" href="../home/index.php">
                    <img src="../images/main-logo.png" alt="Poll Now" width="50" height="50">
                </a>
                <div class="poll-now-text">Pollnow</div>
                <div class="light-dark-div">
                    <svg class="light-mode-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="#ff0055">
                        <path d="M480-360q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35Zm0 80q-83 0-141.5-58.5T280-480q0-83 58.5-141.5T480-680q83 0 141.5 58.5T680-480q0 83-58.5 141.5T480-280ZM200-440H40v-80h160v80Zm720 0H760v-80h160v80ZM440-760v-160h80v160h-80Zm0 720v-160h80v160h-80ZM256-650l-101-97 57-59 96 100-52 56Zm492 496-97-101 53-55 101 97-57 59Zm-98-550 97-101 59 57-100 96-56-52ZM154-212l101-97 55 53-97 101-59-57Zm326-268Z" />
                    </svg>
                    <svg class="dark-mode-svg hidden" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="#ff0055">
                        <path d="M480-120q-150 0-255-105T120-480q0-150 105-255t255-105q14 0 27.5 1t26.5 3q-41 29-65.5 75.5T444-660q0 90 63 153t153 63q55 0 101-24.5t75-65.5q2 13 3 26.5t1 27.5q0 150-105 255T480-120Zm0-80q88 0 158-48.5T740-375q-20 5-40 8t-40 3q-123 0-209.5-86.5T364-660q0-20 3-40t8-40q-78 32-126.5 102T200-480q0 116 82 198t198 82Zm-10-270Z" />
                    </svg>
                </div>
            </div>
            <div class="body-div">
                <!-- <h2>Hello Admin</h2> -->
                <div class="three-option-div">
                    <div class="option-1 my-border">
                        <div class="option-1-text">Total Users</div>
                        <div class="option-1-val"></div>
                        <div class="option-1-line my-line"></div>
                    </div>
                    <div class="option-2">
                        <div class="option-2-text">Total Polls</div>
                        <div class="option-2-val"></div>
                        <div class="option-2-line"></div>
                    </div>
                    <div class="option-3">
                        <div class="option-3-text">Total Messages</div>
                        <div class="option-3-val"></div>
                        <div class="option-3-line"></div>
                    </div>
                </div>
                <div class="horizontal-line"></div>
                <div class="total-users-content hidden">
                    <?php
                    $sql = "select username, name, email, pollsCreated, pollsVoted, dateJoined from users";
                    $res = mysqli_query($conn, $sql);
                    $arr = [];
                    if ($res && mysqli_num_rows($res) > 0) {
                        while ($row = mysqli_fetch_assoc($res)) {
                            echo
                            $row["username"] . "<-/*756-=-=>"
                                . $row["name"] . "<-/*756-=-=>"
                                . $row["email"] . "<-/*756-=-=>"
                                . $row["pollsCreated"] . "<-/*756-=-=>"
                                . $row["pollsVoted"] . "<-/*756-=-=>"
                                . $row["dateJoined"];
                            echo "<(&*#$*-)>";
                        }
                    }
                    ?>
                </div>
                <div class="total-polls-content hidden">
                    <?php
                    $sql = "select name, title, options, showResults, timeCreated, duration from polls";
                    $res = mysqli_query($conn, $sql);
                    $arr = [];
                    if ($res && mysqli_num_rows($res) > 0) {
                        while ($row = mysqli_fetch_assoc($res)) {
                            echo
                            $row["name"] . "<-/*756-=-=>"
                                . $row["title"] . "<-/*756-=-=>"
                                . $row["options"] . "<-/*756-=-=>"
                                . $row["showResults"] . "<-/*756-=-=>"
                                . $row["timeCreated"] . "<-/*756-=-=>"
                                . $row["duration"];
                            echo "<(&*#$*-)>";
                        }
                    }
                    ?>
                </div>
                <div class="total-messages-content hidden">
                    <?php
                    $sql = "select username, message from messages";
                    $res = mysqli_query($conn, $sql);
                    $arr = [];
                    if ($res && mysqli_num_rows($res) > 0) {
                        while ($row = mysqli_fetch_assoc($res)) {
                            echo
                            $row["username"] . "<-/*756-=-=>"
                                . $row["message"];
                            echo "<(&*#$*-)>";
                        }
                    }
                    ?>
                </div>
                <div class="total-users">
                    <div class="total-users-row">
                        <div class="div-11">Sl No.</div>
                        <div class="div-12">Username</div>
                        <div class="div-13">Name</div>
                        <div class="div-14">Email Address</div>
                        <div class="div-15">Polls Created</div>
                        <div class="div-16">Polls Participated</div>
                        <div class="div-17">Date Joined</div>
                    </div>
                </div>
                <div class="total-polls hidden">
                    <div class="total-polls-row">
                        <div class="div-11">Sl No.</div>
                        <div class="div-12">Author Name</div>
                        <div class="div-13">Poll Title</div>
                        <div class="div-14">Poll Options</div>
                        <div class="div-15">Results After</div>
                        <div class="div-16">Creation Time</div>
                        <div class="div-17">Duration</div>
                    </div>
                </div>
                <div class="total-messages hidden">
                    <div class="total-messages-row">
                        <div class="div-11">Sl No.</div>
                        <div class="div-12">Username</div>
                        <div class="div-13">Message</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="admin-script.js"></script>
</body>

</html>