<?php
    session_start();

    if((isset($_SESSION['signedIn'])) && ($_SESSION['signedIn'] == true)) {
        header('Location: home.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>lolteamup - sign up</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style-sign-pages.css">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a821291b86.js" crossorigin="anonymous"></script>

</head>
<body>
    <nav>
        <h1 class="logo">
            <a href="index.php" class="logoLink">lolteamup</a>
        </h1>
        <div class="navBtnsContainer">
            <a class="navSignupBtn" href="signup.php">
                Sign Up
            </a>
        </div>
    </nav>

    <form method="POST" action="login.php">
        <div class="signUpForm">
        <h2 class="formTitle">Login</h2>
            <?php
                if(isset($_SESSION['login_failed'])) {
                    echo $_SESSION['login_failed'];
                }
            ?>
            <input type="text" placeholder="Login" name="login"><br>
            <input type="password" placeholder="Password" name="password"><br>
            <input type="submit" value="SIGN IN">
            <p class="infoLogin">Not a member? <span><a href="signup.php">Sign up now!</a></span></p>
        </div>
    </form>

    <?php include "footer.php"; ?>

</body>
</html>