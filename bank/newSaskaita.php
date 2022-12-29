<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: http://localhost/bit-php/001/bank/bank.php');
    die;
}

if (!file_exists(__DIR__.'/data')) {
    $arr =[];
} else {
    $arr = unserialize(file_get_contents(__DIR__.'/data'));
}

// foreach($arr as $val) {
//     print_r($val['PIN']);
// }

$error = 0;
$errorPIN = 0;
$errorLen = 0;
$success = 0;

if ($_GET['errorPIN'] ?? 0) {
    $errorPIN = 1;
}
if ($_GET['errorLen'] ?? 0) {
    $errorLen = 1;
}
if ($_GET['error'] ?? 0) {
    $error = 1;
}
if ($_GET['success'] ?? 0) {
    $success = 1;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach ($arr as $val) {
        if ($val['PIN'] == $_POST['PIN']) {
            header('Location: http://localhost/bit-php/001/bank/newSaskaita.php?error=1');
            die;
        }
    }
    
    if (strlen($_POST['name']) < 4) {
        header('Location: http://localhost/bit-php/001/bank/newSaskaita.php?errorLen=1');
        die;
    }
    if (strlen($_POST['surname']) < 4) {
        header('Location: http://localhost/bit-php/001/bank/newSaskaita.php?errorLen=1');
        die;
    }
    
    if (strlen($_POST['PIN']) !== 11) {
        header('Location: http://localhost/bit-php/001/bank/newSaskaita.php?errorPIN=1');
        die;
    }
    $arr[] = $_POST;
    file_put_contents(__DIR__.'/data', serialize($arr));
    header('Location: http://localhost/bit-php/001/bank/newSaskaita.php?success=1');
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
<style>
    body {
        background-color: #222222;
    }
    .container {
        display: flex;
        justify-content: space-between;
        width: 100%;
    }
    img {
        padding-left: 50px;
        width: 80px;
    }
    .nav {
        display: flex;
        padding-right: 50px
    }
    .btn {
        color: #CCCCCC;
        border: none;
    }
    .btn:hover {
        background-color: #cccccc4b;
    }
    .login {
        background-color: #DCB0FE;
        color: #000;
        border-radius: 5px;
    }
    .login:hover {
        background: #DCB0FE;
        color: #000;
        padding: 12px;
        margin: 8px;
    }
     .btnSubmit {
        display: inline-block;
        margin-top: 5px;
        border: none;
        border-radius: 5px;
        padding: 8px 0;
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
        100% {top: -50%}
    }

</style>
<body>
    <?php if ($errorLen) : ?>
        <div class="alert">Min: 3 simboliai!</div>
    <?php endif ?>
    <?php if ($errorPIN) : ?>
        <div class="alert">Asmens kodas netinka!</div>
    <?php endif ?>
    <?php if ($error) : ?>
        <div class="alert">Toks asmens kodas jau egzistuoja!</div>
    <?php endif ?>
    <?php if ($success) : ?>
        <div class="success">Pavyko!</div>
    <?php endif ?>
    <div class="container">
        <img src="./img/mooseLogo.png" alt="logo">
        <nav class="nav">
            <a style="background-color: #222222; box-shadow: 10px 10px 5px -200px rgba(25,25,25,0.75);" class="btn" href="http://localhost/bit-php/001/bank/bank.php">Home</a>
            <a style="background-color: #222222; box-shadow: 10px 10px 5px -200px rgba(25,25,25,0.75);" class="btn" href="http://localhost/bit-php/001/bank/saskaitos.php">Saskaitu sarasas</a>
            <form action="http://localhost/bit-php/001/bank/login.php?logout" method="post">
                <button type="submit" class="btn login">Logout</button>
            </form>
        </nav>
    </div>
    <div class="containerForm">
        <form class="form" action="http://localhost/bit-php/001/bank/newSaskaita.php" method="post">
            <input type="text" name="name" placeholder="Vardas">
            <input type="text" name="surname" placeholder="Pavarde">
            <input type="hidden" name="iBan" value="<?= $iBan ?>">
            <input type="number" name="PIN" placeholder="Asmens kodas">
            <input type="hidden" name="id" value="<?= $random ?>">
            <input type="hidden" name="balance" value="0">
            <button class="btnSubmit" type="submit">Create</button>
        </form>
    </div>
</body>
</html>