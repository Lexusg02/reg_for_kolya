<?php
session_start();

if($_SESSION['user']) {
    header('Location: profile.php');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/main.css">
    <title>Форма авторизации</title>
</head>
<body>
   <!--Авторизакия--> 
    <form  method="post" action="vendor/signin.php">
        <label>Login</label>
        <input type="text" name="login" placeholder="enter login">
        <label>Password</label>
        <input type="password" name="password" placeholder="enter password">
        <button type="submit">LogIn</button>
        <p>
            У вас нет аккаунта - <a href="register.php">зпрегайтесь</a>
        </p>

        <?php
            if($_SESSION['message']) {
                echo '<p class="message">' . $_SESSION['message'] . '</p>';
            } 
            unset($_SESSION['message']);
            ?>

    </form>

   
</body>
</html>



