<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: http://localhost/bit-php/001/bank/bank.php');
    die;
}


$users = unserialize(file_get_contents(__DIR__.'/data'));

$id = 0;
$success = 0;
$error = 0;

if ($_GET['error'] ?? 0) {
    $error = 1;
}

if ($_GET['success'] ?? 0) {
    $success = 1;
}

if ($_GET['id'] ?? 0) {
    $id = (int) $_GET['id'];
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
    .data {
        margin-top: 200px;
        justify-content: center;
        align-items: center;
    }
    img {
        padding-left: 50px;
        width: 80px;
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
    form {
        display: flex;
        justify-content: center;
        align-items: center;
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
    <?php if ($error) : ?>
        <div class="alert">Error!</div>
    <?php endif ?>
    <?php if ($success) : ?>
        <div class="success">Pavyko!</div>
    <?php endif ?>
    <div class="container">
        <img src="./img/mooseLogo.png" alt="logo">
        <nav class="nav">
            <a style="background-color: #222222; box-shadow: 10px 10px 5px -200px rgba(25,25,25,0.75);" class="btn" href="http://localhost/bit-php/001/bank/bank.php">Home</a>
            <a style="background-color: #222222; box-shadow: 10px 10px 5px -200px rgba(25,25,25,0.75);" class="btn" href="http://localhost/bit-php/001/bank/newSaskaita.php">Naujos saskaitos sukurimas</a>
            <a style="background-color: #222222; box-shadow: 10px 10px 5px -200px rgba(25,25,25,0.75);" class="btn" href="http://localhost/bit-php/001/bank/saskaitos.php">Saskaitu sarasas</a>
            <form action="http://localhost/bit-php/001/bank/login.php?logout" method="post">
                <button type="submit" class="btn login">Logout</button>
            </form>
        </nav>
    </div>
    <div class="data">
        <p style="font-size: 20px;">
            <i>Name: </i><span><?= $user['name'] ?></span>
            <br>
            <i>Surname: </i><span><?= $user['surname'] ?></span>
            <br>
            <i>Balance: </i><span><?= $user['balance'] ?></span>
        </p>
    </div>
    <form action="http://localhost/bit-php/001/bank/add.php?id=<?= $user['id'] ?>" method="post">
        <input type="text" name="balance">
        <button class="btnSubmit" type="submit">ADD</button>
    </form>
</body>
</html>