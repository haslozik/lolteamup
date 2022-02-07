<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>rlteamup</title>

    <link rel="stylesheet" href="style.css">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a821291b86.js" crossorigin="anonymous"></script>

</head>
<body>
    
    <nav>
        <h1 class="logo">
            rlteamup
        </h1>
        <div class="navBtnsContainer">
            <button class="navLoginBtn">
                Log In
            </button>
            <button class="navSignupBtn">
                Sign Up
            </button>
        </div>
    </nav>
    <section class="titleSection">
        <h1 class="titleText">
            Team up with other Rocket League players!
        </h1>
    </section>
    <section class="finderSection">
        <h1 class="finderText">Below you can find players announcements</h1>
        <h5 class="finderInfoText">If you want to add an announcement, you must be logged in!</h5>
        <br><hr>
    </section>
    <section class="announcementsSection">
        <div class="announcementElement">
            <div class="announcementImage"></div>
            <h3 class="announcementName">
                Nickname1
            </h3>
            <h4 class="announcementRank">
                Diamond 2
            </h4>
        </div>
        <div class="announcementElement">
            <div class="announcementImage"></div>
            <h3 class="announcementName">
                Nickname2
            </h3>
            <h4 class="announcementRank">
                Grand Champion 1
            </h4>
        </div>
        <div class="announcementElement">
            <div class="announcementImage"></div>
            <h3 class="announcementName">
                Nickname3
            </h3>
            <h4 class="announcementRank">
                Silver 3
            </h4>
        </div>
    </section>
    
    <?php include("footer.php") ?>

</body>
</html>