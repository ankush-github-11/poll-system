<?php
// Set the HTTP response code to 404
 // http_response_code(404);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
        <link rel="stylesheet" href="../error/error-stylesheet.css">

</head>
<body>
    <div class="total-div">
        <div class="main-div">
            <div class="header-div no-select">
                <img src="../images/main-logo.png" alt="Main Logo">
                <div>Pollnow</div>
            </div>
            <div class="body-div">
                <div class="left-div">
                    <div class="text-1">ERROR CODE: 404</div>
                    <div class="text-2">OOOPS!!</div>
                    <div class="text-3">This is not the page you are looking for</div>
                    <div class="text-4">Here are some useful links instead:</div>
                    <div class="buttons-div">
                        <a href="../home/index.php" class="home">Home</a>
                        <a href="../createpoll/create.php" class="create">Create Poll</a>
                    </div>
                </div>
                <div class="right-div">
                    <img src="../images/error-404.png" alt="">
                    <div class="typewriter"></div>
                </div>
            </div>
        </div>
    </div>
    <script src="./error-script.js"></script>
</body>
</html>