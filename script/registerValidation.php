<?php
    include 'connection.php';
    
    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user AS u WHERE username = ". $_POST['username'])) > 0)
    {
        echo "<script>$('#username-error').css('display', 'block');</script>";
    } else {
        echo "<script>$('#username-error').css('display', 'none');</script>";
    }
?>