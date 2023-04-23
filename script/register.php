<?php
    include 'connection.php';

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_check = $_POST['password_check'];
    $question = $_POST['question'];
    $answer = $_POST['answer'];
    $note = $_POST['note'];

    

    header("Location: ../../index.php");
    die();
?>