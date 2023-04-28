<?php
    function ReturnAuthor($post){
        return ($post["ID_user"] == null) ? "Neregistrovaný uživatel" : $post["username"];
    }
?>

<script>
    function validateEmail(email) {
        return String(email).match(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/);
    }
</script>