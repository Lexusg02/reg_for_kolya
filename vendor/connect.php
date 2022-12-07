<?php

//mysqli_connect

$connect = mysqli_connect('localhost', 'root', 'root', 'php_reg');

if(!$connect) {
    die('Error connect to DB');
}
