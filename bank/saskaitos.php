<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: http://localhost/bit-php/001/bank/bank.php');
    die;
}

$data = file_get_contents(__DIR__.'/data');
$data = unserialize($data);

$id = 0;
if ($_GET['id'] ?? 0) {
    $id = (int) $_GET['id'];
}

$success = 0; 

$alert = 0;

if ($_GET['success'] ?? 0) {
    $success = 1;
}

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
<style>
    body {
        background-color: #222222;
    }
    .container {
        display: flex;
        justify-content: space-between;
        width: 100%;
    }
    .nav {
        display: flex;
        padding-right: 50px
    }
    .btn {
        color: #CCCCCC;
        border: none;
        background-color: #cccccc4b;
        padding: 10px 20px;
        box-shadow: 10px 10px 5px 0px rgba(25,25,25,0.75);
    }
    .btn:hover {
        background-color: #cccccc8e;
    }
    .btnSubmit {
        border: none;
        border-radius: 5px;
        padding: 10px 15px;
        color: #cccccc;
        background-color: #cccccc4b;
        font-size: 16px;
        box-shadow: 10px 10px 5px 0px rgba(25,25,25,0.75);
    }
    .btnSubmit:hover {
        cursor: pointer;
        background-color: #cccccc8e;
        color: #fff;
    }
    img {
        padding-left: 50px;
        width: 80px;
    }
    .containerData {
        margin-top: 80px;
        align-items: initial;
    }
    .data {
        display: flex;
        justify-content: space-between;
        font-size: 19px;
    }
    .login {
        background-color: #DCB0FE;
        color: #000;
        border-radius: 5px;
    }
    .login:hover {
        background: #DCB0FE;
        color: #000;
        padding-left: 25px;
        padding-right: 25px;
        margin: 5px;
    }
    .alert {
        animation-name: alert;
        animation-duration: 3s;
        animation-iteration-count: 1;
        animation-timing-function: ease-out;
        animation-fill-mode: forwards;
    }
    .success {
        position: absolute;
        left: 50%;
        background: rgba(14, 215, 78, 0.2);
        border: 1px solid rgba(14, 215, 78, 0.5);
        border-radius: 15px;
        backdrop-filter: blur(3px);
        padding: 25px 50px;
        transform: translateX(-50%);
        animation-name: alert;
        animation-duration: 3s;
        animation-iteration-count: 1;
        animation-timing-function: ease-out;
        animation-fill-mode: forwards;
    }

    @keyframes alert {
        0% {top: 5%;}
        50% {top: 5%;}
        100% {top: -50%;}
    }
</style>
<body>
    <?php if ($success) : ?>
        <div class="success">Pavyko!</div>
    <?php endif ?>
    <?php if ($alert) : ?>
        <div class="alert">Balansas turi buti 0!</div>
    <?php endif ?>
    <div class="container">
        <img src="./img/mooseLogo.png" alt="logo">
        <nav class="nav">
            <a style="background-color: #222222; box-shadow: 10px 10px 5px -200px rgba(25,25,25,0.75);" class="btn" href="http://localhost/bit-php/001/bank/bank.php">Home</a>
            <a style="background-color: #222222; box-shadow: 10px 10px 5px -200px rgba(25,25,25,0.75);" class="btn" href="http://localhost/bit-php/001/bank/newSaskaita.php">Naujos saskaitos sukurimas</a>
            <form action="http://localhost/bit-php/001/bank/login.php?logout" method="post">
                <button type="submit" class="btn login">Logout</button>
            </form>
        </nav>
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
                        <form class="formBtn" action="http://localhost/bit-php/001/bank/saskaitos.php?id=<?= $li['id'] ?>&success=0" method="post">
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