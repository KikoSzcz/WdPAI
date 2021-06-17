<?php
require_once __DIR__.'/../models/adminPanel.php';

$selectedGroup = $_POST['selectedGroup'];

echo adminPanel::showUserInGroup($selectedGroup);

