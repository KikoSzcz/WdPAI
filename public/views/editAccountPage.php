<?php
require_once __DIR__.'/../../src/models/userImage.php';

?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/awesome/font-awesome.min.css">
    <title>Edit account page</title>
</head>

<body>
<?php require_once __DIR__.'/../../public/viewsModules/navBar.php'; ?>
<div class="container">
    <div class="login-container">
        <div class="website-tittle">Edit account page</div>
            <p>Name: <?= json_decode($_COOKIE['user'], true)['name']; ?></p>
            <p>Surname: <?= json_decode($_COOKIE['user'], true)['surname']; ?></p>
            <p>E-mail: <?= json_decode($_COOKIE['user'], true)['email']; ?></p>
            <p>Image: <img src='<?php userImage::getUserImage() ?>'/></p>
    </div>
    <a href='<?= $_SERVER['HTTP_REFERER']; ?>'>Back</a>
</div>
</body>