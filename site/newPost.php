<?php
    include_once('./resources/components/db/db.php');
    include_once('./resources/components/ui/ui.php');
    include_once("./resources/components/validation/validate.php");

    session_start();
    $isLoggedIn = false;

    if(isset($_SESSION["username"])&&isset($_SESSION["password"])){
        $isLoggedIn = checkPassword($_SESSION["username"], $_SESSION["password"]); 
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Idiot's Experience of Linux</title>
        <link rel="stylesheet" href="./resources/styles/global.css">
        <link rel="icon" href="./resources/public/favicon.png" type="image/x-icon">
    </head>
    <body>
        <?php echo(uiHeader("An Idiot's Experience of Linux", $isLoggedIn)); ?>
        <main>
		<form method="post" action="./submitPost.php">
            <label for="title">Title</label>
            <input type="text" name="title" id="title">
            <label for="description">Description</label>
            <input type="text" name="description" id="description">
            <label for="category">Category</label>
            <input type="text" list="categories" name="category" id="category">
            <datalist id="categories">
            <?php
                $category_array = getCategories();

                // Sanitize outputs
                foreach($category_array as $value => $key){
                    $category_array[$key] = htmlspecialchars($value);
                }

                // Write to datalist
                foreach($category_array as $cat){
                    echo("<option value=\"{$cat}\">");
                }
            ?>
            </datalist>
            <label for="contents">Article</label>
			<textarea name="contents" id="contents"></textarea>
			<button type="submit">Post</button>
		</form>
        </main>
        <?php echo(uiFooter()); ?>
    </body>
</html>

