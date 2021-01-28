<?php
session_start();
require_once 'app/Models/usersrepository.class.php';

$user = new UsersRepository(Database::connect());

require 'app/Views/home.views.php';
?>