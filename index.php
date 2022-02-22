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
            <a class="navLoginBtn" href="signin.php">
                Sign In
            </a>
            <a class="navSignupBtn" href="signup.php">
                Sign Up
            </a>
        </div>
        <i class="fas fa-bars"></i>
    </nav>
    <div class="menuPhoneContainer">
        <i class="fas fa-times"></i>
            <a class="navLoginBtn" href="signin.php">
                Sign In
            </a>
            <a class="navSignupBtn" href="signup.php">
                Sign Up
            </a>
            <a href="mailto:mail@mail.com">
                Contact
            </a>
    </div>
    <section class="titleSection">
        <h1 class="titleText">
            Team up with other League of Legends players!
        </h1>
    </section>
    <section class="finderSection">
        <h1 class="finderText">Below you can find players announcements</h1>
        <h5 class="finderInfoText">If you want to add an announcement you must be logged in!</h5>
        <br><hr>
    </section>
    <section class="announcementsSection">
        <div class="announcementElement">
            <div class="announcementImage"></div>
            <h3 class="announcementName">
                Nickname1
            </h3>
            <h4 class="announcementRank">
                Diamond II
            </h4>
        </div>
        <div class="announcementElement">
            <div class="announcementImage"></div>
            <h3 class="announcementName">
                Nickname2
            </h3>
            <h4 class="announcementRank">
                Gold IV
            </h4>
        </div>
        <div class="announcementElement">
            <div class="announcementImage"></div>
            <h3 class="announcementName">
                Nickname3
            </h3>
            <h4 class="announcementRank">
                Silver III
            </h4>
        </div>
    </section>
    <?php include "footer.php"; ?>

</body>
</html>