<?php

if ($_GET['color'] ?? '') {
    $color = 'crimson';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>WEB mechanika</title>
</head>
<body style="background-color: <?= $color ?? '#0d1117' ?>; color: #fff;">
    <a class="btn" href="http://localhost/bit-php/001/index.php">Vienas</a>
    <a class="btn" href="http://localhost/bit-php/001/index.php?color=1">Antras</a>
</body>
</html>