<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <title>Document</title>
    <!--jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./styles/post-card.css">
    
</head>
<body>
    <?php
        include "script/connection.php";
        include "script/post.php";
    ?>  
        <div class="card-wrapper">
     <?php
        while ($post = mysqli_fetch_array($posts)) {
            echo "<form class='post-card' action='./pages/post.php' method='get'>";
            echo "<div class='post-card-content' onclick='clickable(".$post["ID_post"].")'>";
            echo "<h1 class='post-title'>" . $post["title"] . "</h1>";
            echo "<p class='post-date'>" . $post["date"] . "</p>";
            echo "<p class='post-author'>" . $post["author"] . "</p>";
            echo "<p class='post-content'>" . substr($post["content"], 0, 50) . "</p>";
            echo "<input type='hidden' name='post-id' value='".$post["ID_post"]."'>";
            echo "<input class='post-submit' type='submit' id='submit-btn-".$post["ID_post"]."'>";
            echo "</div></form>";
        }
            ?> 

            <form action="" method="post"></form>
        </div>   
    <script>
        function clickable(idnum) {
            document.getElementById('submit-btn-' + idnum).click();
        }
    </script>
</body>
</html>

