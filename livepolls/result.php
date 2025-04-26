<?php
include "../config/connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poll Results</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="result-stylesheet.css">
</head>

<body>
    <header>
        <!-- Navbar Starts -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary nav">
            <div class="container-fluid nav-div">
                <a class="navbar-brand" href="../index.php">
                    <img src="../images/main-logo.png" alt="Poll Now" width="50" height="50">
                </a>
                <button class="navbar-toggler btn-nav" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav nav-items">
                        <div class="nav-item">
                            <a draggable="false" class="nav-link active" href="../home/index.php">Home</a>
                        </div>
                        <div class="nav-item">
                            <a draggable="false" class="nav-link active" href="">Contact</a>
                        </div>
                        <div class="nav-item">
                            <a draggable="false" class="nav-link active" href="">Security</a>
                        </div>
                        <div class="nav-item">
                            <a draggable="false" class="nav-link active" href="">View Polls</a>
                        </div>
                        <div class="login">
                            <a draggable="false" class="nav-link active" href="">Login</a>
                        </div>
                        <div class="signup">
                            <a draggable="false" class="nav-link active" href="">Sign Up</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="total-div">
            <div class="middle-div">
                <h1>Poll Result</h1>
                <div class="middle-div-under-1">
                <!-- <div class="box1">
                        <p class="poll-option"></p>
                        <div class="outer-bar">
                            <div class="round-top"></div>
                            <div class="inner-bar"></div>
                        </div>
                        <div class="outer-round">
                            <div class="inner-round">
                                <div class="poll-percentage"></div>
                            </div>
                        </div>
                    </div>
                    <div class="box2">
                        <p class="poll-option"></p>
                        <div class="outer-bar">
                            <div class="round-top"></div>
                            <div class="inner-bar"></div>
                        </div>
                        <div class="outer-round">
                            <div class="inner-round">
                                <div class="poll-percentage"></div>
                            </div>
                        </div>
                    </div>
                    <div class="box3">
                        <p class="poll-option"></p>
                        <div class="outer-bar">
                            <div class="round-top"></div>
                            <div class="inner-bar"></div>
                        </div>
                        <div class="outer-round">
                            <div class="inner-round">
                                <div class="poll-percentage"></div>
                            </div>
                        </div>
                    </div>
                    <div class="box4">
                        <p class="poll-option"></p>
                        <div class="outer-bar">
                            <div class="round-top"></div>
                            <div class="inner-bar"></div>
                        </div>
                        <div class="outer-round">
                            <div class="inner-round">
                                <div class="poll-percentage"></div>
                            </div>
                        </div>
                    </div>
                    <div class="box5">
                        <p class="poll-option"></p>
                        <div class="outer-bar">
                            <div class="round-top"></div>
                            <div class="inner-bar"></div>
                        </div>
                        <div class="outer-round">
                            <div class="inner-round">
                                <div class="poll-percentage"></div>
                            </div>
                        </div>
                    </div>
                    <div class="box6">
                        <p class="poll-option"></p>
                        <div class="outer-bar">
                            <div class="round-top"></div>
                            <div class="inner-bar"></div>
                        </div>
                        <div class="outer-round">
                            <div class="inner-round">
                                <div class="poll-percentage"></div>
                            </div>
                        </div>
                    </div>
                    <div class="box7">
                        <p class="poll-option"></p>
                        <div class="outer-bar">
                            <div class="round-top"></div>
                            <div class="inner-bar"></div>
                        </div>
                        <div class="outer-round">
                            <div class="inner-round">
                                <div class="poll-percentage"></div>
                            </div>
                        </div>
                    </div>
                    <div class="box8">
                        <p class="poll-option"></p>
                        <div class="outer-bar">
                            <div class="round-top"></div>
                            <div class="inner-bar"></div>
                        </div>
                        <div class="outer-round">
                            <div class="inner-round">
                                <div class="poll-percentage"></div>
                            </div>
                        </div>
                    </div>
                    <div class="box9">
                        <p class="poll-option"></p>
                        <div class="outer-bar">
                            <div class="round-top"></div>
                            <div class="inner-bar"></div>
                        </div>
                        <div class="outer-round">
                            <div class="inner-round">
                                <div class="poll-percentage"></div>
                            </div>
                        </div>
                    </div>
                    <div class="box10">
                        <p class="poll-option"></p>
                        <div class="outer-bar">
                            <div class="round-top"></div>
                            <div class="inner-bar"></div>
                        </div>
                        <div class="outer-round">
                            <div class="inner-round">
                                <div class="poll-percentage"></div>
                            </div>
                        </div>
                    </div>
                    <div class="box11">
                        <p class="poll-option"></p>
                        <div class="outer-bar">
                            <div class="round-top"></div>
                            <div class="inner-bar"></div>
                        </div>
                        <div class="outer-round">
                            <div class="inner-round">
                                <div class="poll-percentage"></div>
                            </div>
                        </div>
                    </div>
                    <div class="box12">
                        <p class="poll-option"></p>
                        <div class="outer-bar">
                            <div class="round-top"></div>
                            <div class="inner-bar"></div>
                        </div>
                        <div class="outer-round">
                            <div class="inner-round">
                                <div class="poll-percentage"></div>
                            </div>
                        </div>
                    </div>
                    <div class="box13">
                        <p class="poll-option"></p>
                        <div class="outer-bar">
                            <div class="round-top"></div>
                            <div class="inner-bar"></div>
                        </div>
                        <div class="outer-round">
                            <div class="inner-round">
                                <div class="poll-percentage"></div>
                            </div>
                        </div>
                    </div>
                    <div class="box14">
                        <p class="poll-option"></p>
                        <div class="outer-bar">
                            <div class="round-top"></div>
                            <div class="inner-bar"></div>
                        </div>
                        <div class="outer-round">
                            <div class="inner-round">
                                <div class="poll-percentage"></div>
                            </div>
                        </div>
                    </div>
                    <div class="box15">
                        <p class="poll-option"></p>
                        <div class="outer-bar">
                            <div class="round-top"></div>
                            <div class="inner-bar"></div>
                        </div>
                        <div class="outer-round">
                            <div class="inner-round">
                                <div class="poll-percentage"></div>
                            </div>
                        </div>
                    </div> -->
                </div>
                <div class="hidden view" data-value="
                <?php
                    $n = 0;
                    if (isset($_GET["view"]))
                        $n = $_GET["view"];
                    echo $n;
                ?>
                "></div>
                <input class="view-array hidden" value="
                <?php
                    if (isset($_GET["view"]))
                        $n = $_GET["view"];
                    $array = [];
                    $array1 = ['C', 'C++', 'Java', 'Python', 'Javascript', 'C#', 'PHP', 'Ruby', 'Go', 'Rust', 'HTML', 'Assembly', 'R', 'Swift', 'Kotlin'];
                    $array2 = ['Summer', 'Monsoon', 'Fall', 'Winter', 'Spring'];
                    $array3 = ['Smartphone', 'Laptop', 'Smartwatch', 'Tablet'];
                    if ($n == 1)
                        $optionsArray = $array1;
                    if ($n == 2)
                        $optionsArray = $array2;
                    if ($n == 3)
                        $optionsArray = $array3;

                        foreach ($optionsArray as $option) {
                            $sql = "SELECT COUNT(*) as count FROM modal$n WHERE polloption = '$option'";
                            $res = mysqli_query($conn, $sql);
                            if ($res) {
                                $row = mysqli_fetch_assoc($res);
                                $count = $row['count'];
                                echo "$count ";
                            }
                        }
                ?>
                ">
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
                <ul>
                    <li><a href="../home/index.php">How It Works</a></li>
                    <li><a href="">View Polls</a></li>
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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="result-script.js"></script>
</body>

</html>
<?php
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
?>