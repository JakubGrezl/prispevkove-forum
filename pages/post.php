<head>
    <link rel="stylesheet" href="../styles/post.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<a href="../index.php">Home</a>
<?php

session_start();
include "../script/connection.php";
include "../script/globalFunctions.php";

$postResult = mysqli_query($conn, "SELECT u.username , u.ID_user, p.title, p.date, p.content, p.ID_post FROM post AS p LEFT JOIN user AS u ON p.ID_user = u.ID_user WHERE p.ID_post = ".$_GET['post-id'].";") or die(mysqli_error($conn));

echo "<div class='post-container'>";
    while ($post = mysqli_fetch_array($postResult)){
        echo "<div class='post-header'>";
        echo "<h1 class='post-title'>" . $post["title"] . "</h1>";
        echo "<p class='post-date'>" . $post["date"] . "</p>";
        echo "<p class='post-author'>" . ReturnAuthor($post) . "</p>";
        echo "</div>";
        echo "<p class='post-content'>" .$post["content"]. "</p>";
    

    echo "</div>";
?>

<h1>COMMENTS:</h1>

<div class="comment-section">

<form class="comment-form" action="../script/add-comment.php" method="post">
      <?php if(isset($_SESSION['id_user'])) {echo "<input type='hidden' name='id_user' value=".$_SESSION['id_user'].">" ;} else {"<input type='hidden' name='id_user' value='null'>";}?>
      <input type="hidden" name="id_post" value=<?php echo $post['ID_post']?>>
      
      <label for="body">Comment</label>
      <textarea id="comment-body" name="body"></textarea>
      <input type="submit" value="Submit">
</form>

<?php
    $commentsResult = mysqli_query($conn,"SELECT u.username, u.ID_user, c.date, c.content, c.ID_comment FROM comment AS c LEFT JOIN user AS u ON c.ID_user = u.ID_user LEFT JOIN post AS p ON p.ID_post = c.ID_post WHERE p.ID_post = ".$_GET['post-id'].";") or die(mysqli_error($conn));
    while ($comment = mysqli_fetch_array($commentsResult)){
        if ((isset($_SESSION["id_user"]) && $_SESSION["id_user"] == $comment["ID_user"]) || $_SESSION["id_user"] == 2) {
            echo "<button class='comment-delete' onclick='DeleteComment(".$comment["ID_comment"].")'>Delete comment</button>";
        }
        echo "<div class='comment-card-content'>";
        echo "<p class='comment-author'>" . ReturnAuthor($comment) . "</p>";
        echo "<p class='comment-date'>" . $comment["date"] . "</p>";
        echo "<p class='comment-body'>" . $comment["content"] . "</p>";
        
        echo "</div>";
    }
}
?>

</div>

<script>
    function DeleteComment($post) {
            $.ajax({
                url: '../script/delete-comment.php',
                type: 'POST',
                data: {
                    id_comment: $post
                },
                success: function(data){
                    window.location.reload();
                }
            });
        }
</script>