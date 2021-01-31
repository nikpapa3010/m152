<?php
function loggedin() {
    if($_SESSION['loggedin']) {
        return '<img src="public/img/User.png" width="50" height="50" class="d-inline-block my-2 my-sm-0" alt="">';
    }
    else {
        return '<a href="login"><button class="btn btn-outline-success mr-sm-2">Login</button></a>';
    }
}

require 'app/Views/commons/header.commons.php';
?>