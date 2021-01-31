<?php

$router = new Router();

$router->define([
    '' => 'app/Controllers/HomeController.php',
    'home' => 'app/Controllers/HomeController.php',
    'projects' => 'app/Controllers/ProjektController.php',
    'aboutus' => 'app/Controllers/AboutUsController.php',
    'social' => 'app/Controllers/SocialController.php',
    'header' => 'app/Controllers/HeaderController.php',
    'login' => 'app/Controllers/LoginController.php',
    'user' => 'app/Controllers/UserController.php',
    'admin' => 'app/Controllers/AdminController.php'
]);