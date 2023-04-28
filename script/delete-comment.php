<?php
    include 'connection.php';


    mysqli_query($conn, "DELETE FROM comment WHERE `comment`.`ID_comment` = ".$_POST['id_comment']) or die(mysqli_error($conn));

?>