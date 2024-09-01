<?php

require_once 'db_connection.php';

$json = file_get_contents('php://input');
$data = json_decode($json);

$username = $data->username;
$password = $data->password;

if (isset($username) && $username !== '' && isset($password) && $password !== ''){
    $query = "SELECT * FROM users WHERE username = ? ";
    $stmt = $conn->prepare($query);
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user){
        if (password_verify($password, $user['password'])){
            $response['status'] = true;
            $response['message'] = 'logged in';
            $response['data'] = $user;
        }
        else{
            $response = 'wrong username or password';
        }
}   
else{
    $response = 'username does not exist';
}
}
else{
    $response = 'empty input';
}


echo json_encode($response);