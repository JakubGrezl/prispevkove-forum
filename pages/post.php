<head>
    <link rel="stylesheet" href="../styles/post.css">
</head>

<?php
    include "../script/connection.php";


    $result = mysqli_query($conn, "SELECT * FROM `post` WHERE ID_post = ".$_GET["post-id"].";");
    while ($post = mysqli_fetch_array($result)){
        echo "<div class='post-card-content'>";
        echo "<h1 class='post-title'>" . $post["title"] . "</h1>";
        echo "<p class='post-date'>" . $post["date"] . "</p>";
        echo "<p class='post-author'>" . $post["author"] . "</p>";
        echo "<p class='post-content'>" . substr($post["content"], 0, 50) . "</p>";
        echo "</div>";

    }


?>

