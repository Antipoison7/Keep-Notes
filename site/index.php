<?php
    include_once("./resources/components/ui/ui.php");
    include_once("./resources/components/validation/validate.php");
    include_once("./resources/components/db/db.php");

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
        <link rel="stylesheet" href="./resources/styles/index.css">
        <link rel="icon" href="./resources/public/favicon.png" type="image/x-icon">
    </head>
    <body>
        <?php echo(uiHeader("An Idiot's Experience of Linux", $isLoggedIn)); ?>
        <main>
            <div class="feed">
                <?php
                    $postCat = getPosts();

                    foreach($postCat as $categoryName => $posts){
                        echo("<div class=\"category\">
                        <h1>" . htmlspecialchars($categoryName) . "</h1>");
                        foreach($posts as $post){
                            echo($post->generatePost());
                        }
                        echo("</div>");
                    }
                ?>
            </div>
        </main>
        <?php echo(uiFooter()); ?>
    </body>
</html>