<?php

use Home\HomeController;

require_once 'HomeController.php';

if(isset($_GET['route'])){
    
    $hc = new HomeController;

    $route = $_GET['route'];

    switch ($route) {
        case 'register':
            $hc->register();
            break;

        case 'login':
            $hc->login();
            break;

        case 'posts':
            $hc->posts();
            break;
        
        default:
            echo 'no routes';
            return false;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
</head>
<body>
    

<hr>

    <form action="index.php" method="get">
        <ul>
            <li>
                <button type="submit" name="route" value="register">Register</button>
            </li>
            <li>
                <button type="submit" name="route" value="login">Login</button>
            </li>
            <li>
                <button type="submit" name="route" value="posts">Posts</button>
            </li>
        </ul>
    </form>



</body>
</html>