<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/projects.css">
    <title>Projects</title>
</head>
<body>
    <div class="base-container">
        <div class="website-tittle">Projects site</div>
        <p>Witaj <?= json_decode($_COOKIE['user'], true)['email']; ?></p>
        <a href="/">Main site</a>
        <form class="logout" action="logout" method="POST">
            <button type="submit">Logout</button>
        </form>
    </div>
</body>
</html>