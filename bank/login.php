<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_GET['logout'])) {
        unset($_SESSION['user']);
        header('Location: http://localhost/bit-php/001/bank/login.php');
        die;
    }
    
    $users = unserialize(file_get_contents(__DIR__.'/users'));

     foreach($users as $user) {
        if ($user['name'] == $_POST['name']) {
            if ($user['psw'] == md5($_POST['psw'])) {
                $_SESSION['user'] = $user;
                header('Location: http://localhost/bit-php/001/bank/saskaitos.php');
                die;
            }
        }
    }
    header('Location: http://localhost/bit-php/001/bank/login.php?error');
    die;
}


if (isset($_SESSION['user'])) {
    header('Location: http://localhost/bit-php/001/bank/saskaitos.php');
    die;
}

if (isset($_GET['error'])) {
    $error = 'User name or password is incorrect';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS',
        sans-serif; 
        background-color: #222222;
        color: #fff;
        margin: 0;
        padding: 0;
    }
    .container {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
    }
    form {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    input {
        margin: 10px 0;
        padding: 7px 0;
        font-size: 16px;
    }
    input::placeholder {
        text-align: center;
    }
    .btn {
        display: inline-block;
        margin-top: 20px;
        color: #000;
        border: none;
        background-color: #DCB0FE;
        padding: 8px 20px;
        border-radius: 5px;
        font-size: 16px;
    }
    .btn:hover {
        cursor: pointer;
    }
    .loginBin {
        display: flex;
        justify-content: center;
        align-items: center;
        background: rgba(255, 255, 255, 0.2);
        width: 50%;
        margin-top: 25%;
        padding: 150px 0;
        transform: translateY(-50%);
    }
    h1 {
        position: absolute;
        top: 5%;
        font-size: 42px;
    }
    .alert {
        position: absolute;
        top: 5%;
        left: 50%;
        font-size: 18px;
        background: rgba(220, 20, 60, 0.2);
        border: 1px solid rgba(220, 20, 60, 0.5);
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
    <div class="container">
        <?php if(isset($error)) : ?>
            <div class="alert">
                <?= $error ?>
            </div>
        <?php endif ?>
        <div class="loginBin">
            <h1>Login</h1>
            <form action="http://localhost/bit-php/001/bank/login.php" method="post">
                <label>Name</label>
                <input type="text" name="name" placeholder="Name">
                <label>Password</label>
                <input type="password" name="psw" placeholder="Password">
                <button class="btn" type="submit">Login</button>
            </form>
        </div>
    </div>
</body>
</html>