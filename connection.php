<!--
    Team 1
    Dagvadorj Mendsaikhan
    Lloyd Empedrado
    Fardeen Khan
-->
<html>
<?php
    //replace with your credentials
    $servername = "localhost";
    $username = "root";
    $password = "1234";
    $db = "FinalProject";           //the name of the database

    //establish a connection to the server
    $conn = mysqli_connect($servername, $username, $password, $db);

    if($conn->connect_error)
    {
        die("Connection error: " . $conn->connection_error . "<br>");
    }

    error_reporting(0);
?>
</html>
