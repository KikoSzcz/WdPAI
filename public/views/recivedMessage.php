<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/awesome/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="public/js/showMessage.js"></script>
    <script src="public/js/deleteMessage.js"></script>
    <title>Recived messages</title>
</head>
<body>
<?php require_once __DIR__.'/../../public/viewsModules/navBar.php'; ?>
<div class="container">
    <div class="Your_recived_message">
        <p>Your recived message:</p>
        <?php require_once __DIR__.'/../../public/viewsModules/recivedMessage.php'; ?>
        </br></br>
    </div>
</div>
</body>
</html>