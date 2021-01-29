<?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    session_unset();
    session_destroy();
}
else {
    session_start();
    unset($_SESSION['loggedin']);
}
?>