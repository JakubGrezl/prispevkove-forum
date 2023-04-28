<?php
session_start();
include 'connection.php';

$username =  htmlspecialchars($_POST['login-username']);
$password =  htmlspecialchars(md5($_POST['login-password']));

$sql = "SELECT * FROM user AS u WHERE u.username = '" . $username . "' AND u.password = '" . $password . "';";

$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

if (mysqli_num_rows($result) > 0){
    while ($row = mysqli_fetch_assoc($result)) {
        $id_user = $row['ID_user'];
        $username = $row['username'];
        $_SESSION['id_user'] = $id_user;
        $_SESSION['username'] = $username;
        header("Location: ../index.php") and die();
    }
} else {
    header("Location: ../index.php") and die();
}