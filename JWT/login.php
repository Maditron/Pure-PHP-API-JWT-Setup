<?php

namespace logintoken;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use database\DataBase;

require_once '../vendor/autoload.php';

$res = false;


if (isset($_POST['Email']) && isset($_POST['Password'])){

    $db = new DataBase();
    $user = $db->select('SELECT * FROM users where email = ?', [$_POST['Email']])->fetch();

    if ($user != null){
        if (password_verify($_POST['Password'], $user['password'])){

            $res = true;

            $email = $_POST['Email'];
            $secretKey = 'xmxdx'; // some made up key
            $payload = [
                'iss' => 'https://maditron.com',
                'iat' => time(), // now
                'nbf' => time(),
                'exp' => time() + 86400 * 30,
                $data = ['email' => $email]
            ];

            $jwt = JWT::encode($payload, $secretKey, 'HS256');

            if($jwt){
                $db->update('users', $user['id'], ['token','tokenexp'], [$jwt,time() + 86400 * 30]);
            }

            session_start();

            $_SESSION['loggedUserEmail'] = $email;


        }
        else{
            echo 'error';
            $res = false;
        }
    }
    else{
        echo 'error';
        $res = false;
    }
}



?>

<?php 

if (!$res){

?>

<form action="" method="post">
        <input type="text" name="Email" placeholder="Email">
        <input type="text" name="Password" placeholder="Password">
        <button type="submit" name="login">login</button>
</form>


<?php

}
else{
    ?>
    <h3>Logged in</h3>
<?php
}

?>