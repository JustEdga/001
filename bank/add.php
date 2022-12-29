<?php

$users = unserialize(file_get_contents(__DIR__.'/data'));

$id = (int) $_GET['id'];


foreach($users as $index => $user) {
    if ($user['id'] == $id) {
        if ($_POST['balance'] <= 0) {
            header('Location: http://localhost/bit-php/001/bank/addBalance.php?id='.$id.'&error=1');
            die;
        }
        $users[$index]['balance'] += (int) $_POST['balance'];
        break;
    }
}

file_put_contents(__DIR__.'/data', serialize($users));

header('Location: http://localhost/bit-php/001/bank/addBalance.php?id='.$id.'&success=1');