<?php
    include 'connection.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user AS u WHERE email = '$email' AND password = '$password'";

    die();
?>