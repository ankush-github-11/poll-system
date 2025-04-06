<?php
    include "../config/connect.php";
    if(isset($_POST["selectedOption"])){
        $_SESSION["selectedOp"] = $_POST["selectedOption"];
    }
    else{
        // Error logic : That's not the page you are looking for
    }
    if(isset($_SESSION["uid"])) $uid = $_SESSION["uid"];
    echo $_POST["votedPid"];
    if(isset($_POST["selectedOption"])){
        $sql = "select * from polls where ";
    }
    $message =  "Your vote has been successfully submitted!";
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
    <link rel="stylesheet" href="./success-stylesheet.css">
</head>
<body class="">
    <div class=" no-select popup-screen hidden">
        <div class="popup-1 hidden">Thank you for participating!</div>
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
                <div class="link-print-div">
                    Selected Option: 
                    <?php
                        echo $_SESSION["selectedOp"];
                    ?>
                </div>
                <!-- <div class="fa-regular fa-clone clipboard-btn"></div> -->
            </div>
        </div>
    </div>
    <script src="./success-script.js"></script>
</body>
</html>