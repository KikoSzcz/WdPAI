<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/awesome/font-awesome.min.css">
    <title>Main site</title>
</head>
<body>
<div class="base-container">
    <?php require_once __DIR__.'/../../public/viewsModules/navBar.php'; ?>
    <div class="website-tittle">Main site</div>

    <a href="/editAccountPage">Edit account</a>
    <a href="/usersList">Users list</a>

    <div class="Your_recived_message">
        <p>Your recived message</p>
    </div>
    <div class="Your_send_message">
        <p>Your send message</p>
    </div>

    <a href="/newMessage">Create new message</a>

</div>
</body>
</html>