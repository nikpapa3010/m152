<?php
require 'app/Views/commons/header.commons.php';

function loggedin() {
    if($_SESSION['loggedin']) {
        return '<img src="public/img/User.png" width="50" height="50" class="d-inline-block my-2 my-sm-0" alt="">';
    }
    else {
        return '<button class="btn btn-outline-success mr-sm-2" type="submit">Login</button>';
    }
}

?>