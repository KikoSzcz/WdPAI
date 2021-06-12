<?php
require_once __DIR__.'/../models/sendMessage.php';

$emailsList = $_POST['emailsList'];
$messageText = $_POST['messageText'];
$attachments = $_POST['attachments'];
$title = $_POST['title'];

$cookie = json_decode($_COOKIE['user'], true);
$fromWho = $cookie['email'];

$sender = new sendMessage($emailsList, $fromWho, $title, $messageText, $attachments);
$sender->send();