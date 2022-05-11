<?php
    session_start();

    if(!isset($_SESSION['signedIn'])) {
        header('Location: index.php');
    }

    require_once 'connection.php';
    mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_STRICT);

    $conn = new mysqli($host,$db_user,$db_password,$db_name);

    if($conn->connect_errno!=0) {

        throw new Exception(mysqli_connect_errno());

    } else {
        if(isset($_POST['submit'])) {
            $rank = $_POST['rank'];
            $nickname = $_POST['nickname'];
            $lane = $_POST['lane'];

            if($conn->query("INSERT INTO announcement (annID,rank,nickname,lane) 
            VALUES (NULL,'$rank','$nickname','$lane')")){
                header('Location: home.php');
            } else {
                throw new Exception($conn->error);
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>lolteamup - add an announcement</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style-sign-pages.css">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a821291b86.js" crossorigin="anonymous"></script>

</head>
<body>
    <nav>
        <h1 class="logo">
            <a href="home.php" class="logoLink">lolteamup</a>
        </h1>
        <div class="navBtnsContainer">
            <a class="navSignupBtn" href="home.php">
                Home
            </a>
        </div>
    </nav>

    <form action="addAnnouncement.php" method="POST">
        <div class="signUpForm">
        <h2 class="formTitle">Add an announcement</h2>
            <input type="text" placeholder="League of Legends Nickname" name="nickname" required>

            <select type="text" name="lane">
                <option value="" selected disabled hidden>Choose your lane</option>
                <option value="topIcon.png">Top</option>
                <option value="jungleIcon.png">Jungle</option>
                <option value="midIcon.png">Middle</option>
                <option value="bottomIcon.png">ADC</option>
                <option value="supportIcon.png">Support</option>
            </select>    

            <select type="text" name="rank">
                <option value="" selected disabled hidden>Choose your rank</option>
                <option value="Iron IV">Iron IV</option>
                <option value="Iron III">Iron III</option>
                <option value="Iron II">Iron II</option>
                <option value="Iron I">Iron I</option>
                <option value="" disabled></option>
                <option value="Silver IV">Silver IV</option>
                <option value="Silver III">Silver III</option>
                <option value="Silver II">Silver II</option>
                <option value="Silver I">Silver I</option>
                <option value="" disabled></option>
                <option value="Gold IV">Gold IV</option>
                <option value="Gold III">Gold III</option>
                <option value="Gold II">Gold II</option>
                <option value="Gold I">Gold I</option>
                <option value="" disabled></option>
                <option value="Platinum IV">Platinum IV</option>
                <option value="Platinum III">Platinum III</option>
                <option value="Platinum II">Platinum II</option>
                <option value="Platinum I">Platinum I</option>
                <option value="" disabled></option>
                <option value="Diamond IV">Diamond IV</option>
                <option value="Diamond III">Diamond III</option>
                <option value="Diamond II">Diamond II</option>
                <option value="Diamond I">Diamond I</option>
                <option value="" disabled></option>
                <option value="Master">Master</option>
                <option value="Grandmaster">Grandmaster</option>
                <option value="Challenger">Challenger</option>
            </select>    
            <button type="submit" name="submit" id="saveBtn">Submit</button>
        </div>
    </form>

    <?php include "footer.php"; ?>

</body>
</html>