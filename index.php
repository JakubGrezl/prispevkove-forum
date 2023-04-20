<!DOCTYPE html>
    <?php
        $MAINPATH = dirname(__FILE__);
    ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./styles/post-card.css">
    
</head>
<body>
    <?php
        include "script/post.php";

        $posts = [
            new Post(0, "První příspěvek", "2021-01-01", "Petr", "Lorem ipsum dolor sit amet consectetur a, Lorem ipsum dolor sit amet consectetur a,Lorem ipsum dolor sit amet consectetur a,Lorem ipsum dolor sit amet consectetur a"),
            new Post(1, "Druhý příspěvek", "2021-01-02", "Petr", "Lorem ipsum dolor sit amet consectetur a"),
            new Post(2, "Třetí příspěvek", "2021-01-03", "Petr", "Lorem ipsum dolor sit amet consectetur a"),
        ];

        $comments = [
            new Comment("Petr", "2021-01-01", "Lorem ipsum dolor sit amet consectetur a"),
            new Comment("Petr", "2021-01-02", "Lorem ipsum dolor sit amet consectetur a"),
            new Comment("Petr", "2021-01-03", "Lorem ipsum dolor sit amet consectetur a"),
        ];

        

        foreach ($posts as $post) {
            echo "<div class='post-card'>";
            echo "<h1 class='post-title'>" . $post->title . "</h1>";
            echo "<p class='post-date'>" . $post->date . "</p>";
            echo "<p class='post-author'>" . $post->author . "</p>";
            echo "<p class='post-content'>" . substr($post->content, 0, 50) . "</p>";
            echo "</div></div>";
        }
    ?>
    <script src="./script/comments"></script>
</body>
</html>

