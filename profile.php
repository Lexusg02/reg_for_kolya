<?php
session_start();

if(!$_SESSION['user']) {
    header('Location: /');
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
    <title>Profile</title>
</head>
<body>
   <!--Profile--> 
    <form>
        <img src="<?=$_SESSION['user']['avatar']?> "? width="250px" >
        <h2 style="margin:10px 0 ;"><?=$_SESSION['user']['full_name']?></h2>
        <a href="#"><?=$_SESSION['user']['email']?></a>
        <a href="vendor/logout.php" class="logout">EXIT</a>
    </form>

   
</body>
</html>



