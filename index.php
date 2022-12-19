<?php


$n = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $n[] = rand(5, 10);
}

$n = json_encode($n);

file_put_contents(__DIR__.'/data.json', $n);
$jn = file_get_contents(__DIR__ . '/data.json');
$number = json_decode($jn, 1);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <ul>
    <?php for($i = 0; $i < count($number); $i++) : ?>
        <li><?= $number[$i] ?></li>
    <?php endfor ?>
    </ul>
    <form action="http://localhost/bit-php/001/index.php" method="post">

        <button type="submit">GO</button>

    </form>
</body>
</html>