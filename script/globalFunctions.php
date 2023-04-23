<?php
    function ReturnAuthor($post){
        return ($post["author"] == null) ? "Neregistrovaný uživatel" : $post["author"];
    }
?>