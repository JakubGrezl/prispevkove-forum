<?php
    class Post {
        public $id;
        public $title;
        public $date;
        public $author;
        public $comments = array();
        public $content;
        public $showComments = false;

        function __construct($id, $title, $date, $author, $content) {
            $this->id = $id;
            $this->title = $title;
            $this->date = $date;
            $this->author = $author;
            $this->content = $content;
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
?>