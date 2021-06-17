<?php
require_once __DIR__.'/../models/adminPanel.php';

$groupName = $_POST['groupName'];

adminPanel::deleteGroup($groupName);

