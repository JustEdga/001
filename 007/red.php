<?php

if (isset($_GET['go'])) {
    header('Location: http://localhost/bit-php/001/blue.php');
    die;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RED</title>
</head>
<body style="background: crimson;">
    <h1>
        <a href="http://localhost/bit-php/001/red.php?go">GO</a>
    </h1>
</body>
</html>