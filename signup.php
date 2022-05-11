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
                if($conn->query("INSERT INTO users VALUES(NULL, '$login', '$passwordHash', '$email')")){
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
            <a class="navLoginBtn" href="signin.php">
                Sign In
            </a>
        </div>
    </nav>

    <form method="POST" class="signUpForm">
        <div class="signUpForm">
            <h2 class="formTitle">Create an account</h2>
            <input type="text" placeholder="Login" name="login" style="margin-top: 0;">
                <?php
                    if(isset($_SESSION['errorLogin'])) {
                        echo '<div id="error">'.$_SESSION['errorLogin'].'</div>';
                        unset($_SESSION['errorLogin']);
                    }
                ?>
            <input type="password" placeholder="Password" name="password">
                <?php
                    if(isset($_SESSION['errorPassword'])) {
                        echo '<div id="error">'.$_SESSION['errorPassword'].'</div>';
                        unset($_SESSION['errorPassword']);
                    }
                ?>
            <input type="password" placeholder="Confirm Password" name="passwordConfirm">
            <input type="text" placeholder="Email" name="email">
                <?php
                    if(isset($_SESSION['errorEmail'])) {
                        echo '<div id="error">'.$_SESSION['errorEmail'].'</div>';
                        unset($_SESSION['errorEmail']);
                    }
                ?>
            <input type="submit" id="saveBtn" value="SIGN UP">
            <p class="infoLogin">If you have an account <span><a href="signin.php">sign in now!</a></span></p>
        </div>
    </form>
    
    <?php include "footer.php"; ?>

</body>
</html>