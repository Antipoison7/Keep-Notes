<?php
    include_once("./resources/components/validation/userCred.php");

    function validateInputs(string $title, string $category, string $description, string $content){
        if(!strlen($title) || !strlen($category) || !strlen($description) || !strlen($content)){
            return false;
        }
        else{
            return true;
        }
    }

    function checkPassword(string $username, string $password){
        try{
            global $adminPassword, $adminUsername;
            
            if(($username == $adminUsername)&&(password_verify($password, $adminPassword))){
                return(true);
            }
            else{
                return(false);
            }
        }
        catch(Exception $e){
            return(false);
        }
    }
?>