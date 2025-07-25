<?php
    class Post{
        private $title = "";
        private $category = "";
        private $description = "";
        private $content = "";

        public function __construct(string $title, string $category, string $description, string $content)
        {
           $this->title = $title;
           $this->category = $category;
           $this->description = $description;
           $this->content = $content; 
        }

        // Getters and Setters
        public function getTitle(){
            return($this->title);
        }

        public function getCategory(){
            return($this->category);
        }

        public function getDescription(){
            return($this->description);
        }

        public function getContent(){
            return($this->content);
        }
    
        public function toString(){
            $returnString = "Title: " . $this->title . "\r\n
                             Category: " . $this->category . "\r\n
                             Description: " . $this->description . "\r\n
                             Content: " . $this->content;
            return($returnString);
        }
    
        public function generatePost(){
            return(
                "<div class=\"post\">
                    <div class=\"post__title\">
                        <h1>{$this->title}</h1>
                    </div>
                    <div class=\"post__description\">
                        <h2>{$this->description}</h2>
                    </div>
                    <div class=\"post__content\">
                        <p>{$this->content}</p>
                    </div>
                </div>
                ");
        }
    }
?>