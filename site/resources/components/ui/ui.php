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
            <h1 class=\"title\"><a href=\"./index.php\">" . $title . "</a></h1>
            <div class=\"login\">
                <p><a href=\"" . $loginLink . "\">" . $loginText . "</a></p>
            </div>
        </header>");
    }

    function uiFooter(){
        return("
        <footer>
            <p><a href=\"./index.php\">Home</a></p>
            <p><a href=\"./login.php\">Login</a></p>
            <p><a href=\"./newPost.php\">New Post</a></p>
            <p><a href=\"./logout.php\">Log Out</a></p>
        </footer>
        ");
    }
?>