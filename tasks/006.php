<body style='
background-color: #0d1117; color: #fff; font-family: Gill Sans, Gill Sans MT, Calibri, Trebuchet MS, sans-serif;'></body>

<?php


function h1(string $text) : string 
{
    return "<h1 style='display: inline;'>$text</h1>";
}

function h(string $text,  int $num) {
    return "<h$num'>$text</h$num>";
}

function calc(int $num) {
    $count = -1;
    if ($num < 0) {
        return 'Tik sveiki skaiciai!';
    } else {
        for ($i = 1; $i < $num; $i++) {
            if ($num % $i === 0) {
                $count++;
            }
        }
    }
    return $count;
}


$mas = [];

foreach(range(1, 100) as $_) {
    $s = rand(33, 77);
    $s = calc($s);
    $mas[] = $s;
}

rsort($mas);



$mas6 = [];

foreach(range(1, 100) as $_) {
    $s = rand(333, 777);
    if (calc($s) !== 0) {
        $mas6[] = $s;
    }
}

$mas7 = [];


$mas9 = [];

foreach(range(1, 3) as $_) {
    $s = rand(1, 33);
    $mas9[] = $s;
    foreach ($mas9 as $val) {
        $i = array_slice($mas9, -3, 3);
        foreach ($i as $value) {
            if (calc($value) > 0) {
                $mas9[] = rand(1, 33);
            }
        }
    }
}


$mas10 = [];

foreach (range(1, 10) as $_) {
    $s = [];
    foreach (range(1, 10) as $_) {
        $s[] = rand(1, 100);
    }
    $mas10[] = $s;
}


$sum = 0;
$av = 0;

function mas10($mas10, $sum='0', $av='0') {
    for ($i = 0; $i < count($mas10); $i++) {
        foreach ($mas10[$i] as $v) {
            if (calc($v) === 0) {
                $sum = $sum + $v;
                $av = $sum / count($mas10[$i]);
            }
        }
    }
    return $sum;
}

echo mas10($mas10).'<br>';

$min = $mas10[0][0];

if ($av < 70) {
    foreach($mas10 as $key => $_) {
        foreach ($_ as $i => $v) {
            if ($v < $min) {
                $min = $v;
            }
        }
    }
}


echo $min.'<br>';

echo $mas10[2][7].'<br>';

echo 'SUMA: '.$sum.'<br>';
echo 'AVERAGE: '.$av.'<br>';

echo '<pre>';
print_r($mas10);



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

    <?= h1('Hello, world!') ?>
    <?= preg_replace_callback('/\d+/', function($d) {
        return h1($d[0]);
    }, md5(time())) ?>
    <br>
    <?= calc(6) ?>

    
</body>
</html>