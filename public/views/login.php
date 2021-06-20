<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="public/js/register.js"></script>
    <script src="public/js/loginPage.js"></script>
    <title>Login page</title>
</head>

<body>
<div class="container">
    <div class="login-container">
        <div class="login">
            <form class="loginForm" action="login" method="POST">
                <input name="email" type="text" placeholder="email@email.com">
                <input name="password" type="password" placeholder="password">
                <button type="submit">Login</button>
            </form>
            <div class="toRegister">
                <a href="#" onclick="showReister()">Create new account</a>
            </div>

        </div>
        <div class="register">
            <input name="email" type="text" placeholder="email@wdpai.com">
            <input name="password" type="password" placeholder="password">
            <input name="name" type="text" placeholder="Name">
            <input name="surname" type="text" placeholder="Surname">
            <button type="button" onclick="registerNewUser()">Register</button>
            <p class="answer"></p>
            <div class="toLogin">
                <a href="#" onclick="showLogin()">Login</a>
            </div>

        </div>
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