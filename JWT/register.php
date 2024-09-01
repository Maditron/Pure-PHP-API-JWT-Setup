<?php

use Home\HomeController;

if (isset($_POST['Fullname']) && isset($_POST['Email']) && isset($_POST['Password'])){
    $hc = new HomeController;
    $hc->dbreg($_POST);
}


?>




<form action="" method="post">
        <input type="text" name="Fullname" placeholder="Fullname">
        <input type="text" name="Email" placeholder="Email">
        <input type="text" name="Password" placeholder="Password">
        <button type="submit">Register</button>
</form>