<?php
require_once __DIR__.'/../models/deleteMessage.php';

$id = $_POST['id'];
$typeOfMessage = $_POST['typeOfMessage'];

deleteMessage::deleteMessageByID($id, $typeOfMessage);