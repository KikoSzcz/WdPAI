<?php

require_once __DIR__ . '/../models/adminPanel.php';

$groupName = $_POST['groupName'];
$userList = $_POST['userList'];

adminPanel::editGroup($groupName, $userList);

