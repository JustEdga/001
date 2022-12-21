<?php
$users = unserialize(file_get_contents(__DIR__.'/data'));

$id = 0;
$error = 0;


if ($_GET['id'] ?? 0) {
    $id = (int) $_GET['id'];
}

if ($_GET['error'] ?? 0) {
    $error = 1;
}

foreach ($users as $user) {
    if ($user['id'] == $id) {
        break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Atimti lesas</title>
</head>
<body>
    <?php if ($error) : ?>
        <div class="alert">Error!</div>
    <?php endif ?>
    <div class="container">
        <a class="btn" href="http://localhost/bit-php/001/bank/bank.php">Home</a>
        <a class="btn" href="http://localhost/bit-php/001/bank/newSaskaita.php">Naujos saskaitos sukurimas</a>
        <a class="btn" href="http://localhost/bit-php/001/bank/saskaitos.php">Saskaitos</a>
    </div>
    <div class="data">
        <p>
            <i>Name: </i><span><?= $user['name'] ?></span>
            <br>
            <i>Surname: </i><span><?= $user['surname'] ?></span>
            <br>
            <i>Balance: </i><span><?= $user['balance'] ?></span>
        </p>
    </div>
    <form action="http://localhost/bit-php/001/bank/subt.php?id=<?= $user['id'] ?>" method="post">
        <input type="text" name="balance">
        <button class="btnSubmit" type="submit">SUBTRACT</button>
    </form>
</body>
</html>