<?php
require_once __DIR__.'/../models/saveUserInformationInDatabase.php';

$email = json_decode($_COOKIE['user'], true)['email'];
$code = json_decode($_COOKIE['user'], true)['code'];
$newName = $_POST['newName'];
$newSurname = $_POST['newSurname'];
$newImage = $_POST['newImage'];

saveUserInformationInDatabase::saveUserInformation($email, $newName, $newSurname, $newImage);
saveUserInformationInDatabase::editCookie($email, $newName, $newSurname, $code);
