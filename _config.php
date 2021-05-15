<?php
    session_start();
    $db = mysqli_connect("localhost","root","","quiz2");
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
?>
