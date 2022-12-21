<?php

$users = unserialize(file_get_contents(__DIR__.'/data'));

$id = (int) $_GET['id'];


foreach($users as $index => $user) {
    if ($user['id'] == $id) {
        $users[$index]['balance'] += (int) $_POST['balance'];
        break;
    }
}

file_put_contents(__DIR__.'/data', serialize($users));

header('Location: http://localhost/bit-php/001/bank/saskaitos.php');