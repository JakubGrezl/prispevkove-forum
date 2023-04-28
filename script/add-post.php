<?php
    include "connection.php";

    $title = $_POST['add-post-title'];
    $content = $_POST['add-post-text'];
    
    if($_POST['add-post-id_user'] == null) {
        mysqli_query($conn, "INSERT INTO post (title, content, date) VALUES ('" . $title . "', '" . $content . "', NOW());") or die(mysqli_error($conn));  
    } else
    {
        $id_user = $_POST['add-post-id_user'];
        mysqli_query($conn, "INSERT INTO post (title, content, ID_user, date) VALUES ('" . $title . "', '" . $content . "', '" . $id_user . "', NOW());") or die(mysqli_error($conn));

    }

    header("Location: ../index.php") and die();
?>