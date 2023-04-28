<?php
    include 'connection.php';


    mysqli_query($conn, "DELETE FROM post WHERE `post`.`ID_post` = ".$_POST['id_post']) or die(mysqli_error($conn));

?>