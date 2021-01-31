<?php
require_once "app/Models/usersrepository.class.php";
include "app/Controllers/ErrorController.php";

$user = new UsersRepository(Database::connect());

$_SESSION['METHOD'] = '';

$errors = [];

$username = "";
$password = "";
$password2 = "";
$email = "";

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
  $username = htmlspecialchars($_POST['username']);
  $password = htmlspecialchars($_POST['password']);

  $username = trim($username);
  if($username=="") {
    $errors[] = "Bitte geben Sie einen Usernamen ein";
  }

  $password = trim($password);
  if($password=="") {
    $errors[] = "Bitte geben Sie ein Passwort ein";
  }

  if(empty($errors)) {
    if($user->login_check($username, $password) == true)         
    {
      $_SESSION['loggedin'] = true;
      $_SESSION['username'] = $username;

      echo "<script type='text/javascript'>window.location='home'</script>";
    }
    else
    {
      echo "<script type='text/javascript'>window.location='login'</script>";
    }
  }
  else {
    require 'app/Views/login.views.php';
  }
}

elseif($_SERVER['REQUEST_METHOD'] == 'POST')
{
  $username = htmlspecialchars($_POST['username']);
  $password = htmlspecialchars($_POST['password']);
  $password2 = htmlspecialchars($_POST['password2']);
  $email = htmlspecialchars($_POST['email']);

  $username = trim($username);
  if($username=="") {
    $errors[] = "Bitte geben Sie einen Usernamen ein";
  }

  $password = trim($password);
  if($password=="") {
    $errors[] = "Bitte geben Sie ein Passwort ein";
  }
  $password2 = trim($password2);
  if($password2==$password) {
    $errors[] = "Passwörter stimmen nicht überein";
  }
  
  $email = trim($email);
  if($email=="") {
    $errors[] = "Bitte geben Sie eine Email ein";
  }
  elseif(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    $errors[] = "Die Email ist ungültig";
  }

  if(empty($errors)) {
    $user->newUser($username, $password, $email);
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;

    echo "<script type='text/javascript'>window.location='home'</script>";
  }
  else
  {
    echo "<script type='text/javascript'>window.location='login'</script>";
  }
}
else {
  require 'app/Views/login.views.php';
}
?>