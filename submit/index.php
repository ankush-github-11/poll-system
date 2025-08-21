<?php
    include "../config/connect.php";
    function getUserIP() {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            return $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            return explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0];
        } else {
            return $_SERVER['REMOTE_ADDR'];
        }
    }
    $n = 0;
    if (isset($_POST["submit1"])) $n = 1;
    if (isset($_POST["submit2"])) $n = 2;
    if (isset($_POST["submit3"])) $n = 3;
    if ($n != 0) {
        $poll = $_POST["result$n"];
        $ipaddress = getUserIP();
        $check_sql = "SELECT * FROM modal$n WHERE ipaddress = ?";
        $stmt = $conn->prepare($check_sql);
        $stmt->bind_param("s", $ipaddress);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 0){
            $insert_sql = "INSERT INTO modal$n (ipaddress, polloption) VALUES (?, ?)";
            $stmt = $conn->prepare($insert_sql);
            $stmt->bind_param("ss", $ipaddress, $poll);
            $stmt->execute();
        }
    }
    header("Location: ../livepolls/?view=$n");
    exit();
?>