<?php

$color = '';

if ($_GET['color'] ?? '') {
    $color = 'crimson';
}
if (preg_match('/^[0-9a-f]{6}/', $_GET['color'] ?? '')) {
    $color = '#'.$_GET['color'];
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
    <form action="http://localhost/bit-php/001/index.php">

    <input type="text" name="color">
    <button type="submit">Submit</button>

    </form>
    <!-- 6 uzd START-->
    <form action="http://localhost/bit-php/001/index.php">
        <button>GET</button>
    </form>
    
    <form action="http://localhost/bit-php/001/index.php">
        <button>POST</button>
    </form>
    <!-- 6 uzd END -->
    </body>
</html>