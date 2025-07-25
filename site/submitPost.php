<?php
	include_once("./resources/components/validation/validate.php");
	include_once("./resources/components/db/db.php");
    include_once("./resources/components/validation/validate.php");

    session_start();
    $isLoggedIn = false;

    if(isset($_SESSION["username"])&&isset($_SESSION["password"])){
        $isLoggedIn = checkPassword($_SESSION["username"], $_SESSION["password"]); 
    }

    if(!$isLoggedIn){
        header("Location: ./login.php");
        exit;
    }

	if(isset($_POST["title"]) && isset($_POST["description"]) && isset($_POST["category"]) && isset($_POST["contents"])){
		$title = $_POST["title"];
		$description = $_POST["description"];
		$category = $_POST["category"];
		$contents = $_POST["contents"];

		if(validateInputs($title, $description, $category, $contents)){
			writePost($title, $category, $description, $contents);
			header("Location: ./index.php");
			exit;
		}
		else{
			header("Location: ./newPost.php");
			exit;
		}
	}
?>
