<?php

    session_start();

    if(!isset($_POST['login']) || (!isset($_POST['password']))) {
        header('Location: signin.php');
        exit();
    }

    require_once "connection.php";

    $conn = @new mysqli($host,$db_user,$db_password,$db_name);

    if($conn->connect_errno!=0) {
        echo "Error: ".$conn->connect_errno;
    } else {

        $login = $_POST['login'];
        $password = $_POST['password'];

        $login = htmlentities($login, ENT_QUOTES, "UTF-8");

        if($result = @$conn->query(
            sprintf($sql = "SELECT * FROM users WHERE username ='%s'",
            mysqli_real_escape_string($conn, $login)))) {

                $hm_users = $result->num_rows;
                if($hm_users>0) {
                    $line = $result->fetch_assoc();

                    if(password_verify($password, $line['password'])){
                        $_SESSION['signedIn'] = true;
                        $_SESSION['userID'] = $line['userID'];
                        $_SESSION['login'] = $line['login'];
                        $_SESSION['password'] = $line['password'];
                        $_SESSION['email'] = $line['email'];
                        $_SESSION['lolName'] = $line['lolName'];

                        unset($_SESSION['login_failed']);

                        $result->free_result();
                        header('Location: home.php');
                    } else {
                        $_SESSION['login_failed'] = 
                        '<span style="color: red; font-family: sans-serif;">
                            Enter correct username or password!
                        </span>';
    
                        header('Location: signin.php');
                    }

                } else {
                    $_SESSION['login_failed'] = 
                    '<span style="color: red; font-family: sans-serif;">
                        Enter correct username or password!
                    </span>';

                    header('Location: signin.php');
                }
        }
        $conn->close();
    }

?>