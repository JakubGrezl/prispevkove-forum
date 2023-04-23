<head>
    <link rel="stylesheet" href="../styles/post.css">
</head>

<?php
    include "../script/connection.php";
    include "../script/globalFunctions.php";

    $postResult = mysqli_query($conn, "SELECT u.username AS 'author' , p.title, p.date, p.content FROM post AS p LEFT JOIN user AS u ON p.ID_user = u.ID_user WHERE p.ID_post = ".$_GET['post-id'].";");
    while ($post = mysqli_fetch_array($postResult)){
        echo "<h1 class='post-title'>" . $post["title"] . "</h1>";
        echo "<p class='post-date'>" . $post["date"] . "</p>";
        echo "<p class='post-author'>" . ReturnAuthor($post) . "</p>";
        echo "<p class='post-content'>" .$post["content"]. "</p>";
    }
?>

<h1>COMMENTS:</h1>

<?php
    $commentsResult = mysqli_query($conn,"SELECT u.username as 'author', c.date, c.content FROM comment AS c LEFT JOIN user AS u ON c.ID_user = u.ID_user LEFT JOIN post AS p ON p.ID_post = c.ID_post WHERE p.ID_post = ".$_GET['post-id'].";");
    while ($comment = mysqli_fetch_array($commentsResult)){
        echo "<div class='comment-card-content'>";
        echo "<p class='comment-author'>" . ReturnAuthor($comment) . "</p>";
        echo "<p class='comment-date'>" . $comment["date"] . "</p>";
        echo "<p class='comment-content'>" . $comment["content"] . "</p>";
        echo "</div>";
    }
?>