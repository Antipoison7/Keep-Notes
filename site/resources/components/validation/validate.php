<?php
    function validateInputs(string $title, string $category, string $description, string $content){
        if(!strlen($title) || !strlen($category) || !strlen($description) || !strlen($content)){
            return false;
        }
    }
?>