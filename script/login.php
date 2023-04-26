<?php
    include 'connection.php';

    $username = $_POST['login-username'];
    $password = md5($_POST['login-password']);

    $sql = "SELECT * FROM user AS u WHERE u.username = '".$username."' AND u.password = '".$password."';";

    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if (mysqli_num_rows($result) > 0) {
        echo "login_success";
        setcookie("login", true);
    } 
        
    header("Location: ../index.php");
    die();
?>