<?php 

$users = [
    ['id' => 1, 'username' => 'maddie', 'password' => 'c4adg4r8gf'],
    ['id' => 2, 'username' => 'Max', 'password' => 'c4ads64g'],
    ['id' => 3, 'username' => 'Nas', 'password' => 'c4d887'],
    ['id' => 4, 'username' => 'Jade', 'password' => 'c4agwrgrd'],
];

$users = json_encode($users);

echo $users;