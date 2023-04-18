<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tvojemama</title>
    <link rel="stylesheet" href="styles/main-page.css">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <header>
        <h1>PŘÍSPĚVKOVÉ FÓRUM</h1>
        <div class="button-wrapper">
            <a href="pages/login.html" class="button"><p>Login</p></a>
            <a href="pages/profile.html" class="button"><p>Profile</p></a>
        </div>
    </header>
<?php
    include 'script/post.php';

    foreach ($posts as $post) {
        echo '<div class="post">';
        echo '<h2 class="post-title">' . $post->title . ' By ' . $post->author . '</h2>';
        echo '<p class="post-text">' . $post->text . '</p>';
        echo '<p class="post-date">' . $post->date . '</p>';
        $comments = $post->comments;
        if (!empty($comments)) {
            echo '<div class="post-comments">';
            echo '<h2 class="comment-title">Comments</h2>';

            echo '</div>';
        }
        echo '</div>';
    }
?>


</body>
<script src="script.js"></script>
<script src="script/commentShow.js"></script>
</html>