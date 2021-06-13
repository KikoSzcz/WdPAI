<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/awesome/font-awesome.min.css">
    <script src="public/js/showMessage.js"></script>
    <title>Main site</title>
</head>
<body>
<?php require_once __DIR__.'/../../public/viewsModules/navBar.php'; ?>
    <div class="container">
        <div class="Your_recived_message">
            <p>Your recived message:</p>
            <?php require_once __DIR__.'/../../public/viewsModules/recivedMessage.php'; ?>
            </br></br>
        </div>
        <div class="Your_send_message">
            <p>Your send message</p>
            <?php require_once __DIR__.'/../../public/viewsModules/sendedMessage.php'; ?>
            </br></br>
        </div>
        </br></br></br></br>
    </div>
</body>
</html>