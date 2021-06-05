<?php
require_once __DIR__.'/../../src/models/userImage.php';

?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/awesome/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="public/js/editAccountPage.js"></script>


    <title>Edit account page</title>
</head>

<body>
<?php require_once __DIR__.'/../../public/viewsModules/navBar.php'; ?>
<div class="container">
    <div class="account-details-container">
        <div class="left-account-details">
            <p>E-mail:</p>
            <p>Name:</p>
            <p>Surname:</p>
            <p>Image:</p>
        </div>
        <div class="right-account-details">
            <p><?= json_decode($_COOKIE['user'], true)['email']; ?></p>
            <p><?= json_decode($_COOKIE['user'], true)['name']; ?></p>
            <p><?= json_decode($_COOKIE['user'], true)['surname']; ?></p>
            <p><img src='<?php userImage::getUserImage() ?>'/></p>
        </div>
        <div style="clear: both;"></div>
    </div>
    <div class="edit-account-buttons">
        <input type="button" id="editButton" value="Edit account" onClick="editAccount()"/>
    </div>

    </br>
    <a href='<?= $_SERVER['HTTP_REFERER']; ?>'>Back</a>
</div>
</body>