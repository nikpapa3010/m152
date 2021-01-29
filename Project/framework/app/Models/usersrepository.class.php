<?php

require 'app/Models/database.class.php';

class UsersRepository {
    private $pdo = null;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function login_check($username, $password) : bool {
        $exists = false;

        $stmt = $this->pdo->prepare("SELECT `Password` FROM `User` WHERE `Username` = :username;");
        $stmt->execute(['username' => $username]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if($result) {
            $exists = password_verify($password, $result['Password']);
        }

        return $exists;
    }

    public function latestarticle() {
        $stmt = $this->pdo->prepare("SELECT * FROM v_LatestArtikel;");
        $stmt->execute();

        $array = $stmt->fetch(PDO::FETCH_ASSOC);

        return '
        <div>

        <h2>'                   .   $array['Title']     . '</h2>
        <div class="row">
        <h6 class="col-md-2">'  .   $array['Username']  . '</h6>
        <h6 class="col">'       .   $array['Date']      . '</h6>
        </div>

        <br>

        <h5>'                   .   $array['Text']      .   '</h5>

        <div>';
    }

    public function lastarticles() {
        $stmt = $this->pdo->prepare("SELECT * FROM v_LastArtikel;");
        $stmt->execute();

        $array = $stmt->fetchall(PDO::FETCH_ASSOC);

        $result = array();
        foreach($array as $index=>$value) {
            array_push($result, '
            
            <div>

            <h2>'                   .   $value['Title']     . '</h2>
            <div class="row">
            <h6 class="col-md-2">'  .   $value['Username']  . '</h6>
            <h6 class="col">'       .   $value['Date']      . '</h6>
            </div>

            <br>

            <h5>'                   .   $value['Text']      .   '</h5>

        <div><br>');
        }

        return implode("", $result);
    }
    
    public function allarticles() {
        $stmt = $this->pdo->prepare("SELECT * FROM v_AllArtikel;");
        $stmt->execute();

        $array = $stmt->fetchall(PDO::FETCH_ASSOC);

        $result = array();
        foreach($array as $index=>$value) {
            array_push($result, '
            
            <div>

            <h2>'                   .   $value['Title']     . '</h2>
            <div class="row">
            <h6 class="col-md-2">'  .   $value['Username']  . '</h6>
            <h6 class="col">'       .   $value['Date']      . '</h6>
            </div>

            <br>

            <h5>'                   .   $value['Text']      .   '</h5>

        <div><br><br>');
        }

        return implode("", $result);
    }

    /*function ordersdisplay() {
        $user = new UsersRepository(Database::connect());
        $array = $user->orders();

        $result = array();
        foreach($array as $index=>$value) {

            array_push($result,'  <tr>
                <th scope="row">'   . $value['OrdersID'] . '</th>
                <td>'               . $value['Firstname'] . '</td>
                <td>'               . $value['Lastname'] . '</td>
                <td>'               . $value['Email'] . '</td>
                <td>'               . $value['Tel'] . '</td>
                <td>'               . $value['Service'] . '</td>
                <td>'               . $value['Priority'] . '</td>
                <td>'               . $value['DeliverDate'] . '</td>
                </tr>');
        }
        return implode("", $result);
    }*/
}

?>