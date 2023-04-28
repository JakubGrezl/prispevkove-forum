<?php 
    include "connection.php";

    $name =  htmlspecialchars($_POST['name']);
    $surname =  htmlspecialchars($_POST['surname']);
    $username =  htmlspecialchars($_POST['username']);
    $password = htmlspecialchars(md5($_POST['password']));
    $email = htmlspecialchars($_POST['email']);
    $question = htmlspecialchars($_POST['question']);
    $answer = htmlspecialchars($_POST['answer']);
    $note = htmlspecialchars($_POST['note']);

    $sql = "INSERT INTO user (name, surname, username, password, email, question, answer, note) VALUES ('".$name."', '".$surname."', '".$username."', '".$password."', '".$email."', '".$question."', '".$answer."', '".$note."')";
    mysqli_query($conn, $sql) or die(mysqli_error($conn));

    header("Location: ../index.php");
    die();

?>  