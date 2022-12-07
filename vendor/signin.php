<?php
session_start();
require_once 'connect.php';

$login = $_POST['login'];

$salt = $_POST['salt']; // соль из БД
    
$password = md5($salt . $_POST['password']);


$check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password' AND `salt` = '$salt'");
if(mysqli_num_rows($check_user) > 0) {

    $user = mysqli_fetch_assoc($check_user);

    if($password == $user['password']){
        $_SESSION['user'] = [
            "id" => $user['id'],
            "full_name" => $user['full_name'],
            "avatar" => $user['avatar'],
            "email" => $user['email'],
    
    ];
    
    header('Location: ../profile.php');
    }

    

} else {
    $_SESSION['message'] = 'Ошибка при входе';
    header('Location: ../index.php');
}

