<?php

$name = 'Vardenis';
$surname = 'Pavardenis';
$birthDate = 2003;
$thisYear = 2022;
$age = $thisYear - $birthDate;


echo "Aš esu $name $surname. Man yra $age metai(ų)";
echo '<br>';

// -- 2 --

$a = rand(0, 4);
$b = rand(0, 4);

echo 'Pirmas n: ', $a;
echo '<br>';
echo 'Antras n: ', $b;
echo '<br>';

if ($a === 0 || $b === 0) {
    echo 'Ats: ', 'Dalyba is 0 negalima';
} elseif ($a > $b) {
    echo 'Ats: ', round($a / $b, 2);
} else {
    echo 'Ats: ', round($b / $a, 2);
}

// -- 3 --

echo '<br>';

$n1 = rand(0, 25);
$n2 = rand(0, 25);
$n3 = rand(0, 25);

echo '<br>';

echo 'Ats: ', ($n1 + $n2 + $n3) / 3;

// -- 4 --

echo '<br>';

$n4 = rand(1, 10);
$n5 = rand(1, 10);
$n6 = rand(1, 10);

echo '<br>';

echo 'Pirma krastine: ', $n4;
echo '<br>';
echo 'Antra krastine: ', $n5;
echo '<br>';
echo 'Trecia krastine: ', $n6;
echo '<br>';

if (($n4 + $n5) > $n6 && ($n4 + $n6) > $n5 && ($n5 + $n6) > $n4) {
    echo 'Trikampis galimas';
} else {
    echo 'Trikampis negalimas';
}

// -- 5 --

echo '<br>';

$n7 = rand(0, 2);
$n8 = rand(0, 2);
$n9 = rand(0, 2);
$n10 = rand(0, 2);

$nuliai = 0;
$vienetai = 0;
$dvejetai = 0;

echo '<br>';

match($n7) {
    0 => ++$nuliai,
    1 => ++$vienetai,
    2 => ++$dvejetai,
    default => 'error',
};

match($n8) {
    0 => ++$nuliai,
    1 => ++$vienetai,
    2 => ++$dvejetai,
    default => 'error',
};

match($n9) {
    0 => ++$nuliai,
    1 => ++$vienetai,
    2 => ++$dvejetai,
    default => 'error',
};

match($n10) {
    0 => ++$nuliai,
    1 => ++$vienetai,
    2 => ++$dvejetai,
    default => 'error',
};
echo 'Nuliai: ', $nuliai;
echo '<br>';
echo 'Vienetai: ', $vienetai;
echo '<br>';
echo 'Dvejetai: ', $dvejetai;

// -- 6 --

echo '<br>';

$n11 = rand(1, 6);

echo "<h$n11>$n11</h$n11>";

// -- 7 --

echo '<br>';

$n12 = rand(-10, 10);
$n13 = rand(-10, 10);
$n14 = rand(-10, 10);

if ($n12 < 0) {
    echo "<h1 style='color: green'>$n12</h2>";
} elseif ($n12 === 0) {
    echo "<h1 style='color: crimson'>$n12</h2>";
} else {
    echo "<h1 style='color: skyblue'>$n12</h2>";
}

if ($n13 < 0) {
    echo "<h1 style='color: green'>$n13</h2>";
} elseif ($n13 === 0) {
    echo "<h1 style='color: crimson'>$n13</h2>";
} else {
    echo "<h1 style='color: skyblue'>$n13</h2>";
}

if ($n14 < 0) {
    echo "<h1 style='color: green'>$n14</h2>";
} elseif ($n14 === 0) {
    echo "<h1 style='color: crimson'>$n14</h2>";
} else {
    echo "<h1 style='color: skyblue'>$n14</h2>";
}

// -- 8 --

echo '<br>';

$candles = rand(5, 3000);

echo $candles;
echo '<br>';

if ($candles < 1000) {
    echo 'Candles: ', $candles;
} elseif ($candles < 2000) {
    echo 'Candles(>1000): ', $candles - ($candles * 0.03);
} else {
    echo 'Candles(>2000): ', $candles - ($candles * 0.04);
}

// -- 9 --

echo '<br>';

$n15 = rand(0, 100);
$n16 = rand(0, 100);
$n17 = rand(0, 100);

echo 'Aritmetinis vidurkis: ', round(($n15 + $n16 + $n17) / 3);

echo '<br>';

$n15 = rand(10, 90);
$n16 = rand(10, 90);
$n17 = rand(10, 90);

echo 'Aritmetinis vidurkis(2): ', round(($n15 + $n16 + $n17) / 3);

// -- 10 --

echo '<br>';

$h = rand(1, 24);
$m = rand(1, 60);
$s = rand(1, 60);
$sExtra = rand(0, 300);

echo 'h: ', $h;
echo '<br>';
echo 'm: ', $m;
echo '<br>';
echo 's: ', $s;
echo '<br>';
echo 's extra: ', $sExtra;
echo '<br>';
echo 'EXTRA: ', $sExtra % 60;
echo '<br>';

$mAdded = ($sExtra - ($sExtra % 60)) / 60;
echo 'M added: ', $mAdded;
echo '<br>';



if ($m === 60) {
    $m = 0; $h++;
}
if ($s === 60) {
    $s = 0; $m++;
}

echo "$h Hours $m Minutes $s Seconds";

echo '<br>';
$mNew = $m + $mAdded;
echo 'New m : ', $mNew;
echo '<br>';
$sNew = $s + ($sExtra % 60);
echo 'New s: ', $sNew;
echo '<br>';

if ($mNew > 60) {
    $mNew = $mNew - 60; $h++; 
}
if ($sNew > 60) {
    $sNew = $sNew - 60; $mNew++; 
}

echo '<br>';

echo "Added S: $h Hours $mNew Minutes $sNew Seconds";
