<?php

require_once __DIR__.'/../../src/models/userImage.php';
require_once __DIR__.'/../../src/controllers/permissionController.php';

$perimsionControll = new permissionController();
if($perimsionControll->isUserAdmin()){
    $adminPanel = '<a href="/adminPanel">Admin panel</a>';
}else{
    $adminPanel = '';
}

?>

<div class="nav_bar">
    <a class="logout" href="logout">
        <i class="fa fa-sign-out" aria-hidden="true"></i>
    </a>
    <a href="/editAccountPage">
        <div class="user_information_nav_bar">
            <p class="name"><?= json_decode($_COOKIE['user'], true)['name']; ?> <?= json_decode($_COOKIE['user'], true)['surname']; ?></p>

            <img src='<?php userImage::getUserImage() ?>'/>
        </div>
    </a>
    <div class="navigation_menu">
        <a href="/mainSite">Main site</a>
        <a href="/usersList">Users list</a>
        <a href="/creatNewMessage">New message</a>
        <a href="/recivedMessage">Recived message</a>
        <a href="/sendedMessage">Sended message</a>
        <?= $adminPanel ?>
    </div>
</div>