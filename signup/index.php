<?php
    include "../config/connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup to Poll Now</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./signup-stylesheet.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>
<body>
    <div class="popup-1 hidden">Please fill all the fields</div>
    <div class="wrongName hidden">
        <?php
        if(isset($_SESSION["wrongName"]) and $_SESSION["wrongName"]!='no')
            echo $_SESSION["wrongName"];
        ?>
    </div>
    <div class="wrongEmail hidden">
        <?php
        if(isset($_SESSION["wrongEmail"]) and $_SESSION["wrongEmail"]!='no')
            echo $_SESSION["wrongEmail"];
        ?>
    </div>
    <div class="wrongPassword hidden">
        <?php
        if(isset($_SESSION["wrongPassword"]) and $_SESSION["wrongPassword"]!='no')
            echo $_SESSION["wrongPassword"];
        ?>
    </div>
    <div class="total-div">
        <div class="main-div">
            <div class="left-div">
                <h1 class="signup-text">Signup</h1>
                <p class="login-text">
                    Already have an account? 
                    <a href="../login/" draggable="false" class="login">Login</a>
                </p>
                <form action="./" method="POST">
                    <div class="email-password-btn-div">
                        <div>
                            <input required name="name" type="text" class="name-input" spellcheck="false" placeholder="Your Name">
                            <p class="name-alert invalidName hidden">
                                <?php
                                if(isset($_SESSION["invalidName"]) and $_SESSION["invalidName"] != "no")
                                    echo $_SESSION["invalidName"];
                                ?>
                            </p>
                        </div>
                        <div>
                            <input required name="email" type="email" class="email-input" spellcheck="false" placeholder="Your Email">
                            <p class="email-alert invalidEmail hidden">
                                <?php
                                if(isset($_SESSION["invalidEmail"]) and $_SESSION["invalidEmail"] != "no")
                                    echo $_SESSION["invalidEmail"];
                                ?>
                            </p>
                        </div>
                        <div>
                            <input required name="password" type="password" class="password-input" spellcheck="false" placeholder="Create Password">
                            <p class="password-alert invalidPassword hidden">
                                <?php
                                if(isset($_SESSION["invalidPassword"]) and $_SESSION["invalidPassword"] != "no"){
                                    echo $_SESSION["invalidPassword"];
                                    echo " (8 characters minimum)";
                                }
                                ?>
                            </p>
                        </div>
                        <div class="checkbox-password-div">
                            <div class="terms-conditions-div">
                                <input required class="form-check-input terms-input" type="checkbox" id="flexCheckDefault">
                                <label class="form-check-label terms-label" for="flexCheckDefault">Agree to Terms & Conditions</label>
                            </div>
                        </div>
                        <button type="submit" name="signup" class="signup-btn">S I G N U P</button>
                    </form>
                </div>
            </div>
            <div class="right-div">
                <img src="../images/login-page-image.jpg" class="right-image image-filter-light" draggable="false" alt="Background">
                <div class="text-div">
                    <h1 class="welcome-text">Create an account</h1>
                    <p class="caption-text">Signup to access all the features of Poll Now System</p>
                </div>
                <div class="button-div">
                    <a href="../">Back to Website<i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <script src="signup-script.js"></script>
</body>
</html>
<?php
function sanitizeName($name){
    $name = trim($name);
    $name = stripslashes($name);
    $name = htmlspecialchars($name);
    return $name;
}
function validateName($name){
    return preg_match("/^[a-zA-Z\s]+$/", $name);
}
function sanitizeEmail($email){
    return filter_var(trim($email), FILTER_SANITIZE_EMAIL);
}
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) && 
           str_ends_with(strtolower($email), '@gmail.com');
}
function sanitizePassword($password){
    return trim(htmlspecialchars($password));
}
function validatePassword($password){
    return strlen($password) >= 8;
}
function getLocalPart($email) {
    $parts = explode("@", $email);
    return $parts[0] ?? '';
}
if(isset($_POST["signup"])){
    $name = sanitizeName($_POST['name']);
    $email = sanitizeEmail($_POST['email']);
    $password = sanitizePassword($_POST['password']);
    if (validateName($name) && validateEmail($email) && validatePassword($password)) {
        $check_sql = "SELECT 1 FROM users WHERE email = '$email' LIMIT 1";
        $check_res = mysqli_query($conn, $check_sql);
        if ($check_res && mysqli_num_rows($check_res) > 0) {
            $_SESSION["invalidEmail"]    = "Email is already used";
            $_SESSION["invalidName"]     = "no";
            $_SESSION["invalidPassword"] = "no";
            $_SESSION["wrongName"]       = $name;
            $_SESSION["wrongEmail"]      = $email;
            $_SESSION["wrongPassword"]   = $password;
            header("Location: ./");
            exit();
        }
        $username = getLocalPart($email);
        $hashed = password_hash($password, PASSWORD_BCRYPT);
        $sql = "insert into users set username='$username', name='$name',email='$email', password='$hashed'";
        $res = mysqli_query($conn, $sql);
        if ($res == true)
        {
            $_SESSION["name"] = $name;
            $_SESSION["email"] = $email;
            $_SESSION["password"] = $password;
            $_SESSION["username"] = $username;
            $sql="select * from users where username='$username'";
            $res=mysqli_query($conn,$sql);
            if($res==true)
            {
                $count=mysqli_num_rows($res);
                if($count>0)
                {
                    $row=mysqli_fetch_assoc($res);
                    $_SESSION["uid"] = $row['uid'];
                }
            }
            header("Location:../createpoll/");
            exit();
        }
    }
    else{
        if(!validateName($name)){
            $_SESSION["invalidName"] = "Invalid Name";
        }
        else{
            $_SESSION["invalidName"] = "no";
        }
        if(!validateEmail($email)){
            $_SESSION["invalidEmail"] = "Invalid Email";
        }
        else{
            $_SESSION["invalidEmail"] = "no";
        }
        if(!validatePassword($password)){
            $_SESSION["invalidPassword"] = "Invalid Password";
        }
        else{
            $_SESSION["invalidPassword"] = "no";
        }
        $_SESSION["wrongName"] = $name;
        $_SESSION["wrongEmail"] = $email;
        $_SESSION["wrongPassword"] = $password;
        header("Location: ./");
        exit();
    }
}
?>