<?php


require_once 'db_connection.php';


$json = file_get_contents('php://input');
$data = json_decode($json);

$id = $_GET['id'];
// we should get the id in url like url?id=4


$query = "UPDATE users SET username = ?, password = ? WHERE id = ? ";
$stmt = $conn->prepare($query);
$stmt->execute([$data->username, $data->password, $id]);



$result = 'Updated successfully';
echo $result;