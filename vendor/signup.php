<?php

session_start();
require_once 'connect.php';



$full_name = $_POST['full_name'];
$login = $_POST['login'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];
$salt = $_POST['salt'];


function generateSalt()
	{
		$salt = '';
		$saltLength = 8;
		
		for($i = 0; $i < $saltLength; $i++) {
			$salt .= chr(mt_rand(33, 126)); 
		}
		
		return $salt;
	}

if($password === $password_confirm) {

    
    $path = 'uploads/' . time() . $_FILES['avatar']['name'];
    if(!move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path)) {
        $_SESSION['message'] = 'Ошибка при загрузке фото';
        header('Location: ../register.php');
    }

    
    $salt = generateSalt();
    $password = md5($salt . $password);

    mysqli_query($connect, "INSERT INTO `users` (`full_name`, `login`, `email`, `password`, `avatar`, `salt`) VALUES ('$full_name', '$login', '$email', '$password', '$path', '$salt')");

    $_SESSION['message'] = 'РЕгистрация прошла успешно';
    header('Location: ../index.php');

}else {
    $_SESSION['message'] = 'Пароли разные';
    header('Location: ../register.php');
    
}

