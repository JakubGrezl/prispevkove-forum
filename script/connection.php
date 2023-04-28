<?php
    $conn = new mysqli("localhost", "root", "", "prispevkove-forum", 3307);

    $conn->set_charset("utf8");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>