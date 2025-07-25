<?php
    include_once('./resources/components/db/db.php');
    include_once('./resources/components/ui/ui.php');
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
        <?php echo(uiHeader("An Idiot's Experience of Linux", true)); ?>
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
        <?php echo(uiFooter()); ?>
    </body>
</html>

