<?php
require_once __DIR__.'/../../src/models/userImage.php';

?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/awesome/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="public/js/editAccountPage.js"></script>


    <title>All users list</title>
</head>

<body>
<?php require_once __DIR__.'/../../public/viewsModules/navBar.php'; ?>
<div class="container">
    <div class="users-list">
        <?php require_once __DIR__.'/../../public/viewsModules/usersList.php'; ?>
    </div>
    <div style="clear: both"></div>
    <a href='<?= $_SERVER['HTTP_REFERER']; ?>'>Back</a>
</div>
</body>