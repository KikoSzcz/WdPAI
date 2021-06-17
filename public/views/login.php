<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>Login page</title>
</head>

<body>
<div class="container">
    <div class="login-container">
        <div class="website-tittle">Loggin page</div>

        <form class="login" action="login" method="POST">
            <input name="email" type="text" placeholder="email@email.com">
            <input name="password" type="password" placeholder="password">
            <button type="submit">Login</button>
        </form>
        <div class="messages">
            <?php
            if(isset($messages)){
                foreach($messages as $message) {
                    echo $message;
                }
            }
            ?>
        </div>
    </div>
</div>
</body>