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
        <h5 class="finderInfoText">The announcements on the home page are random</h5>
        <br><hr>
    </section>
    <section class="announcementsSection">
        <?php

            $conn = mysqli_connect('localhost','root','','lolteamup');
            $sql = "SELECT * FROM announcement ORDER BY RAND()";
            $result = mysqli_query($conn,$sql);
            $queryResults = mysqli_num_rows($result);

            if($queryResults > 0) {
                while($row = mysqli_fetch_assoc($result)) {
        ?>

            <div class="announcementElement">
                <div class="announcementImage">
                    <?php echo '<img src="img/'.$row["lane"].'">'; ?>
                </div>
                <h3 class="announcementName">
                    <?php echo $row["nickname"] ?>
                </h3>
                <h4 class="announcementRank">
                    <?php echo $row["rank"] ?>
                </h4>
            </div>
            
        <?php
                }
            }
        ?>

    </section>
    <?php include "footer.php"; ?>

</body>
</html>