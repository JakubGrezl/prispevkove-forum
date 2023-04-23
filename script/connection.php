<?php
    $conn = new mysqli("localhost", "root", "", "prispevkove-forum", 3306);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>