<?php
    require_once "database/database.php";
    // print_r($_POST);

    if(isset($_COOKIE["email"])){
        $_SESSION["login"] = true;
    }

    if(isset($_SESSION["login"])){
        header("Location: dashboard_page.php");
    }

    if(isset($_POST["loginBtn"])){
        login($_POST);
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi | Login</title>
    <link rel="stylesheet" href="login_style.css">
    <script src="errorMsg.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
    <style>
        body {
            background-color: #1D5B79;
            background: linear-gradient(to left, #1D5B79, #468B97);
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="form-wrapper login">
            <form action="" method="POST">
                <h1>Login</h1>
                <div class="input-box">
                    <input type="email" placeholder="Email" required name="email" id="errorEmail">
                </div>
                <div class="input-box" >
                    <input type="password" placeholder="Password" required name="password" id="errorPassword">
                </div>
                <div class="userError" id="errorText">
                    <p>wrong password or email</p>
                </div>
                <div class="remember-me">
                    <label><input type="checkbox" name="checkbox">Remember Me</label>
                </div>
                <button type="submit" class="btn" name="loginBtn">Login</button>
            </form>
        </div>
        <div class="toggle-wrapper">
            <div class="toggle">
                <h1>Welcome Back!</h1>
                <p>Enter your email and password to enter the site</p>
                <img src="images/calendar2.png" alt="calendar" width="170px" height="170px">
            </div>
        </div>
    </div>
</body>
</html>