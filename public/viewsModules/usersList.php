<?php
require_once __DIR__.'/../../src/models/usersList.php';

$usersMethod = new usersList();
$usersData = $usersMethod->getAllUsersData();

$usersSize = sizeof($usersData[0]);

for($i=0;$i<$usersSize;$i++)
{
    echo '<div class="user">
        <img class="userListImage" src="'.$usersData[3][$i].'"/>
        <p class="userListName">'.$usersData[1][$i].' '.$usersData[2][$i].'</p>
        <p class="userEmail">'.$usersData[0][$i].'</p>
    </div>';
}
