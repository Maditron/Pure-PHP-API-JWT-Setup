<?php

require_once 'db_connection.php';


$query = 'SELECT * FROM users';
$stmt = $conn->prepare($query);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($users);

echo $json;

