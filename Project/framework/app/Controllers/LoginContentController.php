<?php
session_start();

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {

    include 'app/Models/usersrepository.class.php';
    
    function ordersdisplay() {
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
    }

    function usersdisplay() {
        $user = new UsersRepository(Database::connect());
        $array = $user->users();

        $result = array();
        foreach($array as $index=>$value) {
            
            array_push($result,'  <tr>
                            <th scope="row">'   . $value['OrdersID'] . '</th>
                            <td>'               . $value['Lastname'] . '</td>
                            <td>'               . $value['Username'] . '</td>
                            <td>'               . $value['Service'] . '</td>
                            <td>'               . $value['DeliverDate'] . '</td>
                            <td>'               . $value['Status'] . '</td>
                            </tr>');
            }
            return implode("", $result);
    }
    require 'app/Views/logincontent.views.php';
}

else {
    echo "<script type='text/javascript'>window.location='landing'</script>";
}
?>