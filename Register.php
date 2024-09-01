<?php


require_once 'db_connection.php';


$json = file_get_contents('php://input');
$data = json_decode($json);

$username = $data->username;
$password = $data->password;

$query = "SELECT * FROM users WHERE username = ? ";
$stmt = $conn->prepare($query);
$stmt->execute([$username]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
if ($user){
    $response['status'] = false;
    $response['message'] = 'username already exists';
}
else{
    $query = 'INSERT INTO  `users` (`id`,`username`,`password`) VALUES ("", ?, ?)';
    $stmt = $conn->prepare($query);
    $password = password_hash($password, PASSWORD_DEFAULT);
    $result = $stmt->execute([$username, $password]);

    if ($result){
        $response['status'] = true;
        $response['message'] = 'signup successful';
    }

    else{
        $response['status'] = false;
        $response['message'] = 'signup not successful. something went wrong';
    }
}

echo json_encode($response, JSON_UNESCAPED_UNICODE); // JSON_UNESCAPED_UNICODE for persian words




