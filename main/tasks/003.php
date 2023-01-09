<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
</body>
</html>

<?php 

$f = '';
$m = range(50, 400, 50);

for ($i = 0; $i < 400; ++$i) {
    for ($j = 0; $j <= 7; ++$j) {
        if (strlen($f)+4 === $m[$j]) {
            $f .= '<br>';
        }
    }
    $f .= '*';
}


echo "<p style='overflow-wrap: break-word;'>$f</p>";


// -- 2 --

$n = [];
$nCount = 0;

for ($i = 0; $i < 300; $i++) {
    $n[] = rand(0, 300);
}
foreach ($n as $num) {
    if ($num > 150) {
        $nCount++;
    }
    if ($num > 275) {
        echo "<i style='color: crimson;'>$num</i> ";
    } else {
        echo $num.' ';
    }
}


echo '<br>';
echo 'Count: ', $nCount;

// -- 3 --

echo '<br><br><br>';

$num = '';

for ($i = 1; $i < rand(3000, 4000); $i++) {
    if ($i % 77 === 0) {
        $num .= $i.', ';
    }
}

$num1 = mb_substr($num, 0, -2);

echo $num1;


// -- 4 --


// echo "<br>";

// $stars = '';
// $sRange = range(24, 625, 25);
// $sColorRange = range(0, 625, 56);

// for ($i = 0; $i < 625; $i++) {
//     for ($j = 0; $j <= 24; $j++) {
//         if ($i === $sRange[$j]) {
//             $stars .= '<br>';
//         }
//     }
//     for ($k = 0; $k <= 11; $k++) {
//         if ($i === $sColorRange[$k]) {
//             $stars .= "<i style='color: crimson;'>*</i>";
//         } 
//     }
//     $stars .= '*';
// }

// echo '<pre>';


// echo "<p>$stars</p>";


// -- 6 --

echo '<br><br><br>';

$coin = rand(0, 1);

while ($coin !== 0) {
    echo 'S';
    $coin = rand(0, 1);
}

echo '<br>';
$count = 0;

while ($count <= 3) {
    echo 'H';
    if ($coin < 1) {
        $count++;
        $coin = rand(0, 1);
    } else {
        break;
    }
}

echo '<br>';

$c = '';

while (substr($c, -3) !== 'HHH') {
    if ($coin) {
        $c .= 'S';
    } else {
        $c .= 'H';
    }
    $coin = rand(0, 1);
}

echo '<br>';

echo $c;


// -- 7 --

echo '<br>';

$petras = 0;
$kazys = 0;

while ($petras <= 222 && $kazys <= 222) {
    $petras = $petras + rand(10, 20);
    $kazys = $kazys + rand(5, 25);
}


if ($petras > $kazys) {
    echo 'Petras: ',$petras,'<br>';
    echo 'Kazys: ',$kazys,'<br>';
    echo "Partija laimejo: Petras";
} else {
    echo 'Petras: ',$petras,'<br>';
    echo 'Kazys: ',$kazys,'<br>';
    echo "Partija laimejo: Kazys";
}