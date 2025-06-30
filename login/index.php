<?php
    include "../config/connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to POLL NOW</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./login-stylesheet.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body>

    <div class="wrongEmail hidden">
        <?php
            if(isset($_SESSION["wrongEmail"])) echo $_SESSION["wrongEmail"];
        ?>
    </div>
    <div class="wrongPassword hidden">
        <?php
            if(isset($_SESSION["wrongPassword"])) echo $_SESSION["wrongPassword"];
        ?>
    </div>

    <div class="popup-1 hidden">Please fill all the fields</div>
    <div class="total-div">
        <div class="main-div">
            <div class="left-div">
                <img src="../images/login-page-image.jpg" class="left-image image-filter-light" draggable="false" alt="Background">
                <div class="text-div">
                    <h1 class="welcome-text">Welcome Back</h1>
                    <p class="caption-text">Login to access all the features of Poll Now System
                    </p>
                </div>
                <div class="button-div">
                    <a href="../">Back to Website<i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="right-div">
                <h1 class="login-text">Login</h1>
                <p class="signup-text">
                    Don't have an account? 
                    <a href="../signup/" draggable="false" class="signup">Sign Up</a>
                </p>
                <form action="./" method="POST">
                <div class="email-password-btn-div">
                        
                    <input required name="email" type="text" class="email-input" spellcheck="false" placeholder="Email">
                        
                    <input required name="password" type="password" class="password-input" spellcheck="false" placeholder="Password">
                    
                    <p class="credentials-alert invalidCredentials">
                        <?php
                            if(isset($_SESSION["invalidCredentials"]) && $_SESSION["invalidCredentials"] == "yes"){
                               echo "Wrong Credentials"; 
                            }
                        ?>
                    </p>
                    
                    <div class="remember-forgot-div">
                        <div class="remember-div">
                            <input class="form-check-input remember-input" type="checkbox" id="flexCheckDefault">
                            <label class="form-check-label remember-me-label" for="flexCheckDefault">Remember me</label>
                        </div>
                        <div class="forgot-password-div">
                            <a href="../soon/" class="forgot-password" draggable="false">Forgot Password?</a>
                        </div>
                    </div>
                    <button class="login-btn" name="login" type="submit">L O G I N</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <script src="login-script.js"></script>
</body>

</html>
<?php
function sanitizeEmail($email){
    return filter_var(trim($email), FILTER_SANITIZE_EMAIL);
}
function validateEmail($email){
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
function sanitizePassword($password){
    return trim(htmlspecialchars($password));
}
function validatePassword($password){
    return strlen($password) >= 8;
}
function wrongCredentialsReturn ($email, $password){
    $_SESSION["invalidCredentials"] = "yes";
    $_SESSION["wrongEmail"] = $email;
    $_SESSION["wrongPassword"] = $password;
    header("Location: ./");
    exit();
}
if (isset($_POST["login"])) {
    $email = sanitizeEmail($_POST["email"]);
    $password = sanitizePassword($_POST["password"]);
    if (validateEmail($email) && validatePassword($password)) {
        $sql = "select * from users where email='$email' and password='$password'";
        $res = mysqli_query($conn, $sql);
        if ($res == true) {
            $count = mysqli_num_rows($res);
            if ($count > 0) {
                $row = mysqli_fetch_assoc($res);
                $_SESSION["uid"] = $row["uid"];
                $_SESSION["name"] = $row["name"];
                $_SESSION["username"] = $row["username"];
                $_SESSION["invalidCredentials"] = "no";
                header("Location: ../createpoll/");
                exit();
            }
            else{
                wrongCredentialsReturn ($email, $password);
            } 
                
        }
        else{
            wrongCredentialsReturn ($email, $password);
        }
    }
    else {
        wrongCredentialsReturn ($email, $password);
    }
}

?>