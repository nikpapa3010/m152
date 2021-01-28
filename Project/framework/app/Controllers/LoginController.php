<?php
require 'core/session_management.php';
require_once "app/Models/usersrepository.class.php";

if($_SERVER['REQUEST_METHOD'] === 'POST') 
{  
  if(isset($_POST["username"]) && isset($_POST["password"]))
  {
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);
    
    $user = new UsersRepository(Database::connect());
    if($user->login_check($username, $password) == true)         
    {
      $_SESSION['logged_in'] = true;
      $_SESSION['username'] = $username;

      echo "<script type='text/javascript'>window.location='logincontent'</script>";
    }
    else
    {
      require 'app/Views/login.views.php';
    }
  }
}

else {
  require 'app/Views/login.views.php';
}
?>