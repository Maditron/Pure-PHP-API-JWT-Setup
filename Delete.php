<?php


require_once 'db_connection.php';


$json = file_get_contents('php://input');
$data = json_decode($json);

$id = $data->id;


$query = "DELETE FROM users WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->execute([$id]);


if (!$query){
$result = 'deleted successfully';
echo $result;
}

else{
    echo "record isn't found";
}

