<?php
    class Post {
        public $id;
        public $title;
        public $date;
        public $author;
        public $comments = array();
        public $text;
        public $showComments = false;

        function __construct($id, $title, $date, $author, $text) {
            $this->id = $id;
            $this->title = $title;
            $this->date = $date;
            $this->author = $author;
            $this->text = $text;
        }

        function addComment(Comment $comment) {
            array_push($this->comments, $comment);
        }        
    }

    class Comment {
        public $author;
        public $date;
        public $text;

        function __construct($author, $date, $text) {
            $this->author = $author;
            $this->date = $date;
            $this->text = $text;
        }        
    }

    $post = new Post(0 ,"Proč jsou počítače špatné?", "1.1.2021", "RANDOM_USER", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et diam blandit, tristique ipsum tristique, condimentum libero. Vivamus rutrum pharetra faucibus. Suspendisse metus leo, bibendum porta ipsum at, imperdiet tempor neque. Etiam gravida, enim at viverra hendrerit, lectus lectus porta felis, quis gravida libero ipsum a risus. Vestibulum eu dignissim tortor, at efficitur erat. Integer porta, tortor eget tincidunt ullamcorper, tortor mauris hendrerit est, eu vestibulum eros orci vel ligula. Cras dignissim vehicula cursus.");
    $post->addComment(new Comment("Ondra Valsky", "1.1.2021", "dobře"));
    $post->addComment(new Comment("Ondra Valsky", "1.1.2021", "dobře"));

    $posts = [$post, $post];
?>