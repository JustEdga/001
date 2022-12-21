<?php

$data = file_get_contents(__DIR__.'/data');
$data = unserialize($data);

$id = 0;
if ($_GET['id'] ?? 0) {
    $id = (int) $_GET['id'];
}


$alert = 0;

foreach($data as $i => $user) {
    if ($user['id'] == $id) {
        if ($user['balance'] == 0) {
            unset($data[$i]);
            break;
        } else {
           $alert = 1; 
        }
    }
}

file_put_contents(__DIR__.'/data', serialize($data));


usort($data, "surname_sort");

function surname_sort($a, $b) {
    if ($a['surname'] == $b['surname']) {
        return 0;
    }
    return ($a['surname'] < $b['surname']) ? -1 : 1;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Saskaitu sarasas</title>
</head>
<body>
    <?php if ($alert) : ?>
        <div class="alert">Balansas turi buti 0!</div>
    <?php endif ?>
    <div class="container">
        <a class="btn" href="http://localhost/bit-php/001/bank/bank.php">Home</a>
        <a class="btn" href="http://localhost/bit-php/001/bank/newSaskaita.php">Naujos saskaitos sukurimas</a>
    </div>
    <div class="containerData">
        <?php foreach($data as $li) : ?>
            <div class="data">
                <p><?= '<i>Name</i>: <span>'.$li['name'].'</span>'.
                '<i>Surname</i>: <span>'.$li['surname'].'</span>'.
                '<i>iBan</i>: <span>'.'LT '.$li['iBan'].'</span>'.
                '<i>idNum</i>: <span>'.$li['PIN'].'</span>'.
                '<i>Balance</i>: <span>'.$li['balance'].'</span>'  ?></p>
                    <div class="btnBin">
                        <form class="formBtn" action="http://localhost/bit-php/001/bank/saskaitos.php?id=<?= $li['id'] ?>" method="post">
                                <button class="btnSubmit delete">Delete</button>
                        </form>
                        <a style="border-radius: 5px" class="btn" href="http://localhost/bit-php/001/bank/addBalance.php?id=<?= $li['id'] ?>">Add</a>
                        <a style="border-radius: 5px" class="btn" href="http://localhost/bit-php/001/bank/subBalance.php?id=<?= $li['id'] ?>">Minus</a>
                    </div>
                </div>
        <?php endforeach ?>
    </div>
    
</body>
</html>