
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
        <?php echo(uiHeader("Log In", $isLoggedIn)); ?>
        <main>
            <form action="./checkLogin.php" method="post">
                <label for=" username">Username</label>
                <input name="username" id="username" type="text">
                <label for="password">Password</label>
                <input name="password" id="password" type="password">
                <button type="submit">Log in</button>
            </form>
        </main>
        <?php echo(uiFooter()); ?>
    </body>
</html>