<?php


require_once 'db_connection.php';


$json = file_get_contents('php://input');
$data = json_decode($json);

$username = $data->username;
$password = $data->password;

$query = 'INSERT INTO  `users` (`id`,`username`,`password`) VALUES ("", ?, ?)';
$stmt = $conn->prepare($query);
$stmt->execute([$username, $password]);

$result = 'created successfully';
echo $result;
