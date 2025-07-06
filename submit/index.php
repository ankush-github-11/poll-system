<?php
    include "../config/connect.php";
    $n = 0;
    if (isset($_POST["submit1"]))
        $n = 1;
    if (isset($_POST["submit2"]))
        $n = 2;
    if (isset($_POST["submit3"]))
        $n = 3;
    // Make changes if selecting option then submitting gives error
    if ($n != 0) {
        $poll = $_POST["result$n"];
        $ipaddress = $_SERVER['REMOTE_ADDR'];
        $sql = "insert into modal$n set ipaddress='$ipaddress',polloption='$poll'";
        $res = mysqli_query($conn, $sql);
    }
    header("Location: ../livepolls/?view=$n");
?>