<?php 
    include "connection.php";

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $email = $_POST['email'];
    $question = $_POST['question'];
    $answer = $_POST['answer'];
    $note = $_POST['note'];

    $sql = "INSERT INTO user (name, surname, username, password, email, question, answer, note) VALUES ('".$name."', '".$surname."', '".$username."', '".$password."', '".$email."', '".$question."', '".$answer."', '".$note."')";
    mysqli_query($conn, $sql) or die(mysqli_error($conn));

    header("Location: ../index.php");
    die();

?>  