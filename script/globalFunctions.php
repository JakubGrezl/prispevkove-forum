<?php
    function ReturnAuthor($post){
        return ($post["author"] == null) ? "Neregistrovaný uživatel" : $post["author"];
    }
?>

<script>
    function validateEmail(email) {
        return String(email).match(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/);
    }
</script>