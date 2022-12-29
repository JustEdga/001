<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Home</title>
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
    .vl {
        background: rgb(252,252,252);
        background: linear-gradient(3deg, rgba(252,252,252,0.87718837535014) 13%, rgba(255,255,255,0.26094187675070024) 100%);
        height: 50px;
        width: 2px;
        position: absolute;
        left: 46%;
    }
</style>
<body>
    <div class="container">
        <img src="./img/mooseLogo.png" alt="logo">
        <nav class="nav">
            <a class="btn login" href="http://localhost/bit-php/001/bank/login.php">Login</a>
        </nav>
    </div>
    <div style="width: 30%; padding-left: 50px; margin-top: 100px;">
        <h1 style="font-size: 50px; font-weight: 600; margin-bottom: 0;">Simple way to manage your money</h1>
        <p style="font-size: 14px; color: #A0A0A0;">Connect your money to your friends & brands.</p>
        <a style="display: inline-block; margin: 20px 0; padding-left: 20px; padding-right: 20px" class="btn login" href="#">Get Started</a>
    </div>
    <div style="padding-left: 50px; position: absolute; bottom: 80px;">
        <h2 style="font-size: 42px; background-color: #F7FF82; display: inline-block; color: #000; padding: 35px 20px">6.7m</h2>
        <p style="display: inline-block; padding-left: 20px">There are 6.7 milion users in the world,<br> everyone is happy with our service.</p>
    </div>
    <div style="position: absolute; right: 120px; top: 205px; width: 150px">
        <p>We provide 24<br> hours emergency service <span style="color: #F7FF82;">&#10230;</span></p>
    </div>
    <div style="position: absolute; right: 150px; bottom: 200px;">
        <h2 style="font-size: 32px; margin-bottom: 0;">100% safe</h2>
        <p style="margin-top: 10px; color: #A0A0A0;">Your money is safe</p>
        <div class="vl"></div>
        <img style="width: 70px; padding-left: 27px; padding-top: 60px" src="./img/lock.png" alt="">
    </div>

</body>
</html>