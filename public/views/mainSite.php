<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>Main site</title>
</head>
<body>
<div class="base-container">
    <div class="website-tittle">Main site</div>
    <p>Witaj <?= json_decode($_COOKIE['user'], true)['name']; ?> <?= json_decode($_COOKIE['user'], true)['surname']; ?></p>
    <p>Zdjecie: <?= json_decode($_COOKIE['user'], true)['image']; ?></p>
    <a href="/projects">Projects</a>
    <form class="logout" action="logout" method="POST">
        <button type="submit">Logout</button>
    </form>
</div>
</body>
</html>