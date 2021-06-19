<?php
require_once __DIR__.'/../models/registerUser.php';


$email = $_POST['email'];
$password = $_POST['password'];
$name = $_POST['name'];
$surname = $_POST['surname'];

registerUser::registerNewUser($email, $password, $name, $surname);
