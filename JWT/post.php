<?php


namespace post;

require_once 'database.php';
require_once '../vendor/autoload.php';

use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use database\DataBase;

class Post{

    public function index(){
        session_start();
        if(isset($_SESSION['loggedUserEmail'])){
            $email = $_SESSION['loggedUserEmail'];
            $db = new DataBase();
            $user = $db->select('SELECT * FROM users where email = ?', [$email])->fetch();
            if ($user['token'] != null && $user['tokenexp'] > time()){

                $jwt = $user['token'];

                $secretKey = 'xmxdx';

                if (isset($jwt)){
                try {
                    $decoded_token = JWT::decode($jwt, new Key($secretKey, 'HS256'));
                    http_response_code(200);
                
                    $posts = $db->select('select * from posts')->fetchAll();
                    echo '<pre>';
                    var_dump($posts);

                } catch (Exception $e) {
                    http_response_code(401);
                    echo 'Error: ' . $e->getMessage();
                }
            }
            else{
                http_response_code(401);
                echo 'Error: Unauthorized';
            }


            }
        }
        

    }


}