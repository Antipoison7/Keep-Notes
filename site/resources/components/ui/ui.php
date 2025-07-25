<?php
    function uiHeader(string $title, bool $loggedIn){
        $loginText = "Log in";
        $loginLink = "./login.php";

        if($loggedIn){
            $loginText = "Log out";
            $loginLink = "./logout.php";
        }

        return("
        <header>
            <a href=\"./index.php\"><h1 class=\"title\">" . $title . "</h1></a>
            <div class=\"login\">
                <p><a href=\"" . $loginLink . "\">" . $loginText . "</a></p>
            </div>
        </header>");
    }

    function uiFooter(){
        return("
        <footer>
            <a href=\"./index.php\"><p>Home</p></a>
            <a href=\"./login.php\"><p>Login</p></a>
            <a href=\"./newPost.php\"><p>New Post</p></a>
            <a href=\"./logout.php\"><p>Log Out</p></a>
        </footer>
        ");
    }
?>