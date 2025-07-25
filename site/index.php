<?php
    include_once("./resources/components/ui/ui.php");
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
        <link rel="stylesheet" href="./resources/styles/index.css">
        <link rel="icon" href="./resources/public/favicon.png" type="image/x-icon">
    </head>
    <body>
        <?php echo(uiHeader("An Idiot's Experience of Linux", $isLoggedIn)); ?>
        <main>
            <div class="feed">
                <div class="category">
                    <h1></h1>
                </div>
                <div class="post">
                    <div class="post__title">
                        <h1></h1>
                    </div>
                    <div class="post__description">
                        <h2></h2>
                    </div>
                    <div class="post__content">
                        <p></p>
                    </div>
                </div>
            </div>
        </main>
        <?php echo(uiFooter()); ?>
    </body>
</html>