<?php

require 'Routing.php';
require  __DIR__.'/src/controllers/SessionController.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('projects', 'DefaultController');
Router::get('mainSite', 'DefaultController');
Router::get('logout', 'SecurityController');
Router::post('login', 'SecurityController');

Router::run($path);
