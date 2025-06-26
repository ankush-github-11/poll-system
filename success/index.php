<?php
    include "../config/connect.php";
    if(isset($_POST["selectedOption"])){
        $_SESSION["selectedOp"] = $_POST["selectedOption"];
    }
    if(!isset($_SESSION["selectedOp"])){
        // Error logic : That's not the page you are looking for
        include "../error/";
        exit();
    }
    if(isset($_POST["selectedOption"]) && isset($_POST["votedPid"])){
        $pid = $_POST["votedPid"];
        $option = $_POST["selectedOption"];
        $uid = "";
        if(isset($_SESSION["uid"])) $uid = $_SESSION["uid"];
        else{
            // Error logic : That's not the page you are looking for
            include "../error/";
            exit();
        }
        $sql = "insert into votes set pid='$pid', uid='$uid', selectedOption='$option'";
        $res = mysqli_query($conn, $sql);
        $temp = "update users set pollsVoted = pollsVoted + 1 where uid = $uid";
        $res = mysqli_query($conn, $temp);
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
                <a href="../viewpolls/" class="view-btn">Other Polls</a>
                <a href="../home/" class="btn">Go to Homepage</a>
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