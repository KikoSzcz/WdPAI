<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/awesome/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="public/js/sendMessage.js"></script>
    <script src="public/js/readState.js"></script>

    <title>Edit account page</title>
</head>

<body>
<?php require_once __DIR__.'/../../public/viewsModules/navBar.php'; ?>
<div class="container-new-message">
    <div class="new-messge">
        <p>To who:</p>
        <input name="emailsList" type="text">
        <p>Title</p>
        <input name="title" type="text">
        <p>Message</p>
        <textarea name="messageText" rows="15"></textarea>
        <p>Attachments</p>
        <input name="attachments" type="file" multiple>
        <button type="submit" onclick="sendMessage()">Send message</button>
        <p class="message"></p>
        <script>readStateAndPut();</script>
    </div>
</div>
</body>