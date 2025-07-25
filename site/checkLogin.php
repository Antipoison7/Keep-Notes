<?php
include_once("./resources/components/validation/validate.php");

session_start();

if(isset($_POST["username"])&&isset($_POST["password"])){
    $_SESSION["username"] = $_POST["username"];
    $_SESSION["password"] = $_POST["password"];

    if(checkPassword($_POST["username"], $_POST["password"])){
        header("Location: ./index.php");
		exit;
    }
    else{
        header("Location: ./login.php");
		exit;
    }

}
?>
