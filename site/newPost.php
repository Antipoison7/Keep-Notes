<?php
    include_once('./resources/components/db/db.php');
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
        <header>
            <h1 class="title">An Idiot's Experience of Linux</h1>
            <div class="login">
                <p>login</p>
            </div>
        </header>
        <main>
		<form method="post" action="./submitPost.php">
            <input type="text" name="title">
            <input type="text" name="description">
            <input type="text" list="categories" name="category">
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
			<textarea name="contents"></textarea>
			<button type="submit">Post</button>
		</form>
        </main>
        <footer>
            <p><a href="./index.php">Home</a></p>
            <p><a href="./login.php">Login</a></p>
            <p><a href="./newPost.php">New Post</a></p>
            <p><a href="./logout.php">Log Out</a></p>
        </footer>
    </body>
</html>

