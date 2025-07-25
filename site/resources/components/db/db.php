<?php
    include_once("./resources/components/posts/posts.php");

    function getCategories(){
        $db = new SQLite3('./resources/public/notes.db', SQLITE3_OPEN_CREATE | SQLITE3_OPEN_READWRITE);
    
        $query = $db->prepare("SELECT DISTINCT Category FROM Posts");

        $results = $query -> execute();

        $returnArray = array();

        while($category = $results->fetchArray()){
            array_push($returnArray, $category['Category']);
        }
    
        $results->finalize();
        $query->close();
        $db->close();

        return($returnArray);
    }

    function writePost(string $title, string $category, string $description, string $content){
        $db = new SQLite3('./resources/public/notes.db', SQLITE3_OPEN_CREATE | SQLITE3_OPEN_READWRITE);
    
        $query = $db->prepare("INSERT INTO Posts (Title, Category, Description, Content) VALUES (:title, :category, :description, :content)");
    
        $query->bindParam("title", $title, SQLITE3_TEXT);
        $query->bindParam("category", $category, SQLITE3_TEXT);
        $query->bindParam("description", $description, SQLITE3_TEXT);
        $query->bindParam("content", $content, SQLITE3_TEXT);

        $query -> execute();

        $query->close();
        $db->close();
    }

    function getPosts(){
        $db = new SQLite3('./resources/public/notes.db', SQLITE3_OPEN_CREATE | SQLITE3_OPEN_READWRITE);
    
        $query = $db->prepare("SELECT * FROM Posts ORDER BY Category DESC, Title DESC");

        $results = $query -> execute();

        $returnArray = array();

        while($dbPost = $results->fetchArray()){
            $postObj = new Post($dbPost["Title"], $dbPost["Category"], $dbPost["Description"], $dbPost["Content"]);

            $returnArray[$dbPost['Category']][] = $postObj;
        }
    
        $results->finalize();
        $query->close();
        $db->close();

        return($returnArray);
    }
?>