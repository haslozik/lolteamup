<?php
    session_start();

    if(!isset($_SESSION['signedIn'])) {
        header('Location: index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>lolteamup</title>

    <link rel="stylesheet" href="css/style.css">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a821291b86.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="main.js"></script>

</head>
<body>

    <nav>
        <h1 class="logo">
            <a href="index.php" class="logoLink">lolteamup</a>
        </h1>
        <div class="navBtnsContainer">
            <a class="navLoginBtn" href="addAnnouncement.php">
                Add announcement
            </a>
            <a class="navSignupBtn" href="signout.php">
                Sign Out
            </a>
        </div>
        <i class="fas fa-bars"></i>
    </nav>
    <div class="menuPhoneContainer">
        <i class="fas fa-times"></i>
            <a class="navLoginBtn" href="addAnnouncement.php">
                Add announcement
            </a>
            <a href="mailto:mail@mail.com">
                Contact
            </a>
            <a class="navSignupBtn" href="signout.php">
                Sign Out
            </a>
    </div>

    <footer>
        <h1 class="logo">
            <a href="index.php"><sup>&copy;</sup>lolteamup</a>
        </h1>
        <div class="footerMenu">
            <a class="navLoginBtn" href="addAnnouncement.php">
                Add announcement
            </a>
            <a href="mailto:mail@mail.com">
                Contact
            </a>
        </div>
    </footer>
</body>
</html>