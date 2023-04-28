<?php
    session_start();

    $_SESSION['id_user'] = null;
    $_SESSION['username'] = null;

    session_destroy();
?>