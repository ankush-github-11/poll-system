<?php
    include "../config/connect.php";
    if(!(isset($_POST["title"]) || isset($_SESSION['pid']))){
        include "../error/";
        exit();
    }
    if(isset($_SESSION["uid"])) $uid = $_SESSION["uid"];
    if(isset($_SESSION["name"])) $name = $_SESSION["name"];
    if(isset($_POST["title"])){
        $title = $_POST["title"];
    }
    if(isset($_POST["description"])){
        $description = $_POST["description"];
    }

    $i = 1;
    $arrayOfOptions = [];
    while(isset($_POST["option$i"])){
        array_push($arrayOfOptions, $_POST["option$i"]);
        $i++;
    }
    $joinedOptions = implode("<.-:.=>", $arrayOfOptions);

    if(isset($_POST["pollTypeOptions"])) $pollTypeOptions = $_POST["pollTypeOptions"];
    
    if(isset($_POST["themeOptions"])) $themeOptions = $_POST["themeOptions"];

    if(isset($_POST["caseOptions"])) $caseOptions = $_POST["caseOptions"];
    
    $publishImmediatelyCheckbox = "no";
    if(isset($_POST["publish-immediately-checkbox"]))  $publishImmediatelyCheckbox = "yes";
    $dateAndTime = "";
    if(isset($_POST["dateAndTime"])) $dateAndTime = $_POST["dateAndTime"];
    if($dateAndTime=="Calendar")  $dateAndTime = "no";

    // if publishImmediately is yes and date is no then consider the YES to the publishImmediately
    // if dateandTime and publishImmediately both are no then also consider the publishImmediately
    // if date is given also publishImmediately is yes then consider the publishImmediately
    // if publishImmdediately is no and date is given then consider the dateAndTime

    if(isset($_POST["duration"])) $duration = $_POST["duration"];

    if(isset($_POST["votersRepresentation"])) $votersRepresentation = $_POST["votersRepresentation"];

    if(isset($_POST["devices"])) $devices = $_POST["devices"];

    if(isset($_POST["showResults"])) $showResults = $_POST["showResults"];
    $sql = "";
    function generateRandomPassword($length = 12) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $password = '';
        $maxIndex = strlen($characters) - 1;
    
        for ($i = 0; $i < $length; $i++) {
            $index = rand(0, $maxIndex);
            $password .= $characters[$index];
        }
    
        return $password;
    }

    if(isset($_POST['title'])){
        $pollPassword = generateRandomPassword();
        $sql = "insert into polls set uid = '$uid', name='$name', pollPassword='$pollPassword', title='$title', description='$description', options='$joinedOptions', pollType='$pollTypeOptions', theme='$themeOptions', caseOptions='$caseOptions', publishImmediately= '$publishImmediatelyCheckbox', startDateAndTime='$dateAndTime', duration='$duration', votersRepresentation='$votersRepresentation', devices='$devices', showResults='$showResults' ";
        $uid = $_SESSION['uid'];
        $temp = "update users set pollsCreated = pollsCreated + 1 where uid = $uid";
        $res = mysqli_query($conn, $temp);
    }

    $res = false;
    $arr = [];
    if(isset($_POST['title'])) {
        $res = mysqli_query($conn, $sql);
        $sql = "select * from polls where uid='$uid' and title='$title'";
        $res = mysqli_query($conn, $sql);
        if($res == true && mysqli_num_rows($res) > 0){
            mysqli_data_seek($res, mysqli_num_rows($res) - 1); // Move pointer to last row
            $arr = mysqli_fetch_assoc($res); // Fetch the last row
            $_SESSION['pid'] = $arr["pid"];
            $_SESSION['pollPassword'] = $arr["pollPassword"];
        }
    }
    $message ="";
    $message =  "Your poll has been created successfully!";
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
<body class="">
    <div class="no-select popup-screen hidden">
        <div class="popup-1 hidden">Copied to Clipboard</div>
    </div>
    <div class="total-div">
        <div class="main-div">
            <div class="content-div">
                <div class="tick-div">
                    <i class="fa-regular fa-circle-check"></i>
                </div>
                <div class="message">
                    <?php
                        echo $message;
                    ?>
                </div>
            </div>
            <div class="view-share-div">
                <button class="view-btn">View Poll</button>
                <button class="btn">Share Poll</button>
            </div>
            <div class="link-clipboard-div">
                <div class="link-print-div-1">
                    <?php
                        $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")
                        . "://$_SERVER[HTTP_HOST]/myproject/poll?pid=".$_SESSION['pid'];
                        echo $url;
                    ?>
                </div>
                <div class="fa-regular fa-clone clipboard-btn-1"></div>
            </div>
            <div class="link-clipboard-div">
                <div class="link-print-div-2">
                    <?php
                        echo "Admin Password: ". $_SESSION['pollPassword']
                    ?>
                </div>
                <div class="fa-regular fa-clone clipboard-btn-2"></div>
            </div>
        </div>
    </div>
    <script src="poll-script.js"></script>
</body>
</html>