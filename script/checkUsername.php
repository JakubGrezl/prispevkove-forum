<?php
    include 'connection.php';

    if (!empty($_POST['username'])) {
        $username = $_POST['username'];
        $query = "SELECT * FROM user WHERE username = '$username'";
        $result = mysqli_query($conn, $query);
        $count = mysqli_num_rows($result);
        if ($count > 0) {
            echo "taken";
        } else {
            echo "free";
        }
    }
    
?>