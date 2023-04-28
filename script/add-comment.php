<?php
    include "connection.php";

    $content = htmlspecialchars($_POST['body']);
    $id_post = htmlspecialchars($_POST['id_post']);
    
    if($_POST['id_user'] == null) {
        mysqli_query($conn, "INSERT INTO comment (content, date, ID_post) VALUES ('" . $content . "', NOW()),".$_POST['id_post'].";") or die(mysqli_error($conn));  
    } else
    {
        $id_user = $_POST['id_user'];
        mysqli_query($conn, "INSERT INTO comment (content, ID_user, date, ID_post) VALUES ('".$content."', ".$id_user.", NOW(), ".$id_post.");") or die(mysqli_error($conn));

    }

    header("Location: ../pages/post.php?post-id=".$_POST['id_post']) and die();
?>