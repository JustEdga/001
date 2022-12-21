<?php
if (!file_exists(__DIR__.'/data')) {
    $arr =[];
} else {
    $arr = unserialize(file_get_contents(__DIR__.'/data'));
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $arr[] = $_POST;
    file_put_contents(__DIR__.'/data', serialize($arr));
    header('Location: http://localhost/bit-php/001/bank/newSaskaita.php');
    die;
}

$random = rand(10000, 600000);
$iBan = rand(111111111111111111, 999999999999999999);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Nauja saskaita</title>
</head>
<body>
    <div class="container">
        <a class="btn" href="http://localhost/bit-php/001/bank/bank.php">Home</a>
        <a class="btn" href="http://localhost/bit-php/001/bank/saskaitos.php">Saskaitu sarasas</a>
    </div>
    <div class="containerForm">
        <form class="form" action="http://localhost/bit-php/001/bank/newSaskaita.php" method="post">
            <input type="text" name="name" placeholder="Vardas">
            <input type="text" name="surname" placeholder="Pavarde">
            <input type="hidden" name="iBan" value="<?= $iBan ?>">
            <input type="text" name="PIN" placeholder="Asmens kodas">
            <input type="hidden" name="id" value="<?= $random ?>">
            <input type="hidden" name="balance" value="0">
            <button class="btnSubmit" type="submit">Create</button>
        </form>
    </div>
</body>
</html>