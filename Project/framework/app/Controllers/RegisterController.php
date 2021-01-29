<?php
require 'core/session_management.php';

$errors = [];

$firstname = "";
$lastname = "";
$email = "";
$tel = "";

$dienste = "";
$priority = "";
$date = "";
$date2 = "";

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
  $firstname = htmlspecialchars($_POST["firstname"]);
  $lastname = htmlspecialchars($_POST["lastname"]);
  $email = htmlspecialchars($_POST["email"]);
  $tel = htmlspecialchars($_POST["tel"]);

  $dienste = htmlspecialchars($_POST["dienste"]);
  $priority = htmlspecialchars($_POST["priority"]);

  $firstname = trim($firstname);
  if($firstname=="") {
    $errors[] = "Bitte geben Sie einen Vornamen ein";
  }
  $lastname = trim($lastname);
  if($lastname=="") {
    $errors[] = "Bitte geben Sie einen Nachnamen ein";
  }
  $email = trim($email);
  if($email=="") {
    $errors[] = "Bitte geben Sie eine Email ein";
  }
  elseif(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    $errors[] = "Die Email ist ungültig";
  }
  $tel = trim($tel);
  if($tel=="") {
    $errors[] = "Bitte geben Sie eine Telefonnummer ein";
  }
  elseif(!preg_match('/^[0-9- ]+$/D', $tel)) {
    $errors[] = "Die Telefonnummer ist ungültig";
  }


  if(empty($errors)) {
    $pdo = 0;
    try {
      $pdo = new PDO('mysql:host=localhost;dbname=jetski;charset=utf8', 'root');
    }
    catch(PDOException $pe) {
      die('Konnte keine Verbindung mit der Datenbank herstellen' . $pe->getMessage());
    }

    $sql = 'INSERT INTO `Orders` (`Firstname`,`Lastname`,`Email`,`Tel`,`Service`,`Priority`,`OrderDate`,`DeliverDate`)
    VALUES (:firstname,:lastname,:email,:tel,:service,:priority,:orderdate,:deliverdate);';

    $stmt = $pdo->prepare($sql);

    switch ($priority) {
        case "1":
          $date = date("Y/m/d", strtotime($date . " + 12 days"));
          break;
        case "2":
          $date = date("Y/m/d", strtotime($date . " + 7 days"));
          break;
        case "3":
          $date = date("Y/m/d", strtotime($date . " + 5 days"));
          break;
        }
    
    $date2 = date("Y/m/d");

    $order = array( ':firstname' => $firstname,
      ':lastname' => $lastname,
      ':email' => $email,
      ':tel' => $tel,
      ':service' => $dienste,
      ':priority' => $priority,
      ':deliverdate' => $date,
      ':orderdate' => $date2);

    if($stmt->execute($order)) {
      echo '<p class="alert alert-success">Bestellung gesetzt, kann am ' . $date . ' abgeholt werden</p>';
      $firstname = "";
      $lastname = "";
      $email = "";
      $tel = "";

      $dienste = "";
      $priority = "";

      $date = date("Y/m/d");
      $date2 = date("Y/m/d");
    }
    else {
      echo '<p class="alert alert-danger">Keine Bestellung gesetzt</p>';
    }
  }
}

require 'app/Views/register.views.php';
?>