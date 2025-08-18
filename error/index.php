<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 404</title>
    <link rel="icon" type="image/png" href="./images/main-logo.png">
    <link rel="icon" type="image/png" href="../images/main-logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- <link rel="stylesheet" href="../error/error-stylesheet.css"> -->
    <style>
        :root {
            --bg-1: rgb(255, 0, 85);
            --bg-2: rgb(255, 85, 142);
            --bg-3: rgb(235, 0, 78);
            --bg-color: #FAFAFA;
            --bg-color-less: rgb(237, 237, 237);
            --text-color: black;
            --text-color-less: rgb(57, 57, 57);
            --scrollbar-track: rgb(209, 209, 209);
        }

        .darkmode {
            --bg-1: rgb(255, 0, 85);
            --bg-2: rgb(255, 85, 142);
            --bg-3: rgb(235, 0, 78);
            --bg-color: #05141d;
            --bg-color-less: #0a212e;
            --text-color: rgb(240, 240, 240);
            --text-color-less: rgb(201, 201, 201);
            --scrollbar-track: rgb(39, 39, 39);
        }

        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            width: 8px;
            background-color: var(--scrollbar-track);
        }

        ::-webkit-scrollbar-thumb {
            background-color: var(--bg-1);
            border-radius: 20px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background-color: var(--bg-3);
        }

        .no-select {
            -webkit-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .hidden {
            display: none;
        }

        .flex {
            display: flex;
        }

        * {
            font-family: "Poppins", Arial, Helvetica, sans-serif;
            font-weight: 400;
            box-sizing: border-box;
        }

        body {
            padding: 0px;
            margin: 0px;
            background-color: var(--bg-color);
            color: var(--text-color);
        }

        .total-div {
            min-height: 100vh;
            height: fit-content;
            width: 100%;
            padding: 1.8vw;
        }

        .main-div {
            height: 100%;
            width: 100%;
        }

        .header-div {
            height: 50px;
            width: 100%;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .header-div img {
            height: 50px;
        }

        .header-div div {
            font-size: 25px;
            font-weight: 600;
            color: var(--text-color-less);
        }

        .body-div {
            height: fit-content;
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            gap: 35px;
        }

        .left-div {
            flex: 1;
            height: fit-content;
            min-width: 300px;
            margin-top: 150px;
            padding-left: 40px;
            /* padding-right: 20px; */
        }

        .text-1 {
            font-size: 20px;
            font-weight: 500;
            color: gray;
        }

        .text-2 {
            font-size: 60px;
            font-weight: 700;
            color: var(--text-color);
        }

        .text-3 {
            font-size: 35px;
            font-weight: 400;
            color: var(--text-color);
        }

        .text-4 {
            font-size: 20px;
            font-weight: 400;
            color: gray;
            margin-top: 20px;
        }

        .buttons-div {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 10px;
        }

        .home {
            height: 35px;
            width: 90px;
            border-radius: 100px;
            text-decoration: none;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: var(--bg-color-less);
            color: var(--text-color-less);
            font-weight: 500;
            letter-spacing: 0.3px;
        }

        .create {
            height: 35px;
            width: 130px;
            border-radius: 100px;
            text-decoration: none;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: var(--bg-color-less);
            color: var(--text-color-less);
            font-weight: 500;
            letter-spacing: 0.3px;
        }

        .right-div {
            flex: 1;
            height: fit-content;
            min-width: 100px;
            margin-right: 40px;
            margin-top: 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .right-div img {
            margin-top: 50px;
            filter: contrast(120%) brightness(110%);
        }

        .typewriter {
            color: var(--text-color-less);
            font-size: 24px;
            white-space: nowrap;
            padding-right: 5px;
            z-index: 10;
            transform: translateY(-30px);
            font-weight: 500;
        }

        @media only screen and (max-width: 768px) {
            .body-div {
                gap: 0px;
            }

            .left-div,
            .right-div {
                flex: 100%;
            }

            .right-div {
                margin-right: 0px;
                margin-top: 0px;
            }

            .left-div {
                margin-top: 20px;
                padding-left: 10px;
            }

            .right-div img {
                scale: 0.8;
                margin: 0px;
            }

            .text-1 {
                font-size: 15px;
            }

            .text-2 {
                font-size: 45px;
            }

            .text-3 {
                font-size: 20px;
            }

            .text-4 {
                font-size: 15px;
                font-weight: 400;
            }

            .typewriter {
                transform: translateY(-80px);
            }
        }

        @media (min-width: 769px) and (max-width: 991px) {
            .right-div img {
                scale: 0.8;
            }
        }
    </style>
</head>

<body>
    <div class="total-div">
        <div class="main-div">
            <div class="header-div no-select">
                <img draggable="false" src="/myproject/images/main-logo.png" alt="Main Logo">
                <div>Pollnow</div>
            </div>
            <div class="body-div">
                <div class="left-div">
                    <div class="text-1">ERROR CODE: 404</div>
                    <div class="text-2">OOOPS!!</div>
                    <div class="text-3">This is not the page you are looking for</div>
                    <div class="text-4">Here are some useful links instead:</div>
                    <div class="buttons-div">
                        <a href="/myproject/" class="home">Home</a>
                        <a href="/myproject/createpoll/" class="create">Create Poll</a>
                    </div>
                </div>
                <div class="right-div">
                    <img src="/myproject/images/error-404.png" alt="">
                    <div class="typewriter"></div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const initializeTheme = () => {
            const userPreference = localStorage.getItem('theme');
            const systemPreference = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
            const theme = userPreference || systemPreference;
            if (theme === 'dark') {
                document.body.classList.add('darkmode');
            }
            else {
                document.body.classList.remove('darkmode');
            }
        }
        initializeTheme();



        const text = "Page Not Found!";
        const speed = 150;
        let index = 0;
        const element = document.querySelector(".typewriter");

        function type() {
            if (index < text.length) {
                element.textContent += text.charAt(index);
                index++;
                setTimeout(type, speed);
            }
        }

        type();
    </script>
    <!-- <script src="./error-script.js"></script> -->
</body>

</html>