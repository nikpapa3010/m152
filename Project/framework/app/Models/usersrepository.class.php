<?php

require 'app/Models/database.class.php';

class UsersRepository {
    private $pdo = null;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function login_check($username, $password) : bool {
        $exists = false;

        $stmt = $this->pdo->prepare("SELECT Password FROM User WHERE Username = :username;");
        $stmt->execute(['username' => $username]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if($result) {
            $exists = password_verify($password, $result['Password']);
        }

        return $exists;
    }

    public function newUser($username, $password, $email) {
        $stmt = $this->pdo->prepare("INSERT INTO User (Username, Email, Password, UsertypeID, MailingList)
            VALUES(':username', ':email', ':password', 1, 1);");
        $password = password_hash($this->password, PASSWORD_DEFAULT);
        $stmt->execute( [':username' => $this->username,
                        ':email' => $this->email,
                        ':password' => $password]);
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

    public function project() {
        $stmt = $this->pdo->prepare("SELECT * FROM v_Project;");
        $stmt->execute();

        $array = $stmt->fetchall(PDO::FETCH_ASSOC);

        $result = array();
        foreach($array as $index=>$value) {
            array_push($result, '<div class="row">
                <div class="col-lg-7">
                    <h1>' . $value['Projektname'] . '</h1>

                    <br>

                    <h3>' . $value['Synopsis'] . '</h3>
                </div>

                <div class="col-lg-5">
                    <div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="https://youtube.com/embed/' . $value['Video'] . '?rel=0" allowfullscreen></iframe>
</div>

                    <br>

                    <h3>' . $value['VideoName'] . '</h3>

                    <br>

                    <p>' . $value['VideoDesc'] . '</p>
                </div>
            </div>');
        }

        return implode("", $result);
    }
}

?>