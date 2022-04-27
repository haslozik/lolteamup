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
