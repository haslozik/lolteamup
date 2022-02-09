<?php
session_start();

if(isset($_POST['email'])) {
    $successfulValidation = true;

    //login validation
    $login = $_POST['login'];
    if((strlen($login)<3) || (strlen($login)>20)) {
        $successfulValidation = false;
        $_SESSION['errorLogin'] = "Login must be 3 to 20 characters long";
    }
    if(ctype_alnum($login)==false) {
        $successfulValidation = false;
        $_SESSION['errorLogin'] = "Use only letters or numbers";
    }

    //password validation
    $password = $_POST['password'];
    $passwordConfirm = $_POST['passwordConfirm'];
    if((strlen($password)<8)) {
        $successfulValidation = false;
        $_SESSION['errorPassword'] = "Password must be at least 8 characters long";
    }
    if($password != $passwordConfirm) {
        $successfulValidation = false;
        $_SESSION['errorPassword'] = "Passwords must be the same";
    }

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    //checkbox validation
    if(!isset($_POST['checkBox'])) {
        $successfulValidation = false;
        $_SESSION['errorCheckbox'] = "You must accept the rules";
    }

    //email validation
    $email = $_POST['email'];
    $emailFV = filter_var($email, FILTER_SANITIZE_EMAIL);
    if((filter_var($emailFV, FILTER_VALIDATE_EMAIL)==false) || ($emailFV != $email)) {
        $successfulValidation = false;
        $_SESSION['errorEmail'] = "Please enter a valid email";
    }

    require_once 'connection.php';
    mysqli_report(MYSQLI_REPORT_STRICT);

    try {

        $conn = new mysqli($host,$db_user,$db_password,$db_name);

        if($conn->connect_errno!=0) {

            throw new Exception(mysqli_connect_errno());

        } else {

            //email exist?
            $result = $conn->query("SELECT userID FROM users WHERE email='$email'");
            if(!$result) {
                throw new Exception($conn->error);
            }

            $hm_email = $result->num_rows;
            if($hm_email>0) {
                $successfulValidation = false;
                $_SESSION['errorEmail'] = "There is already a user with this e-mail";
            }

            //successful validation
            if($successfulValidation == true) {
                if($conn->query("INSERT INTO users VALUES(NULL, '$login', '$passwordHash', '$email','$steamLink','$epicName')")){
                    $_SESSION['successfulSignedup'] = true;
                    header('Location: signedup.php');
                } else {
                    throw new Exception($conn->error);
                }
            }

            $conn->close();
        }

    } catch(Exception $e) {
        echo '<span style="color: red"> Connection with server failed</span>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>rlteamup - sign up</title>

    <link rel="stylesheet" href="css/style.css">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a821291b86.js" crossorigin="anonymous"></script>

</head>
<body>


    
</body>
</html>