<body style='background-color: 020202; color: #fff; display: flex;'></body>

<?php

$mas = [];

for ($i = 0; $i < 30; $i++) {
    $mas[] = 0;
    $mas[$i] = rand(5, 25);
}

echo '<pre>';

// print_r($mas);

// --- 2-a ---

echo '<br>';

$a = 0;

foreach ($mas as $value) {
    if ($value > 10) {
        $a++;
    }
}

// echo 'Count: ', $a;

// --- 2-b ---

$b = [0];
$bIndex = [];

foreach ($mas as $index => $value) {
    if ($value > $b[0]) {
        $b[0] = $value;
        $bIndex[0] = $index;
    }
    if ($value == $b[0]) {
        $bIndex[] = $index;
    }
}

echo '<pre>';

// print_r($b);

echo '<pre>';
// print_r($bIndex);

// --- 2-c ---

echo '<br>';

$c = 0;

foreach ($mas as $index => $value) {
    if ($index % 2 === 0) {
        $c += $value;
    }
}

// echo $c;

// --- 2-d ---

echo '<br>';

$d = [];

foreach ($mas as $i => $val) {
    $d[] = $val - $i;
}

echo '<pre>';

// print_r($d);

// --- 2-e ---

echo '<br><pre>';

for ($i = 0; $i < 10; $i++) {
    $mas[] = rand(5, 25);
}

// print_r($mas);

// --- 2-f ---

echo '<br><pre>';

$d1 = [];
$d2 = [];

foreach ($mas as $i => $val) {
    if ($i % 2 === 0) {
        $d1[] = $val;
    } elseif ($index % 2 === 1) {
        $d2[] = $val;
    }
}

// print_r($d1);
// print_r($d2);


// --- 2-g ---

foreach($d1 as &$val) {
   $val = $val > 15 ? 0 : $val;
}

// print_r($d1);

// --- 2-h ---

foreach($mas as $index => $val) {
    if ($val > 10) {
        echo $index;
        break;
    }
}

// --- 2-i ---

echo '<br><pre>';
// print_r($mas);

foreach ($mas as $i => $val) {
    if ($i % 2 === 0) {
        unset($mas[$i]);
    }
}

// print_r($mas);

// --- 3 ---

$masA = [];

function randLet() {
    $i = rand(0,3);
    $abc = 'ABCD';
    $rand = $abc[$i];
    return $rand;
}

for ($i = 0; $i < 200; $i++) {
    $masA[] = randLet();
}

// print_r($masA);

// --- 4 --- 

sort($masA);

// print_r($masA);

// --- 5 ---

$mas5A = [];
$mas5B = [];
$mas5C = [];

for ($i = 0; $i < 200; $i++) {
    $mas5A[] = randLet();
}
for ($i = 0; $i < 200; $i++) {
    $mas5B[] = randLet();
}
for ($i = 0; $i < 200; $i++) {
    $mas5C[] = randLet();
}


// --- 6 ---

$mas6A = [];
$mas6B = [];

for ($i = 0; $i < 100; $i++) {
    $mas6A[] = rand(100, 999);
}
foreach ($mas6A as $i => $val) {
    if ($i !== 99) {
        if ($mas6A[$i] == $mas6A[$i+1]) {
            $mas6A[$i] = rand(100, 999);
        }
    }
}
for ($i = 0; $i < 100; $i++) {
    $mas6B[] = rand(100, 999);
}
foreach ($mas6B as $i => $val) {
    if ($i !== 99) {
        if ($mas6B[$i] == $mas6B[$i+1]) {
            $mas6B[$i] = rand(100, 999);
        }
    }
}

// print_r($mas6A);
// print_r($mas6B);


// --- 7 ---

$masAB = [];

for ($i = 0; $i < 100; $i++) {
    if ($mas6A[$i] !== $mas6B[$i]) {
        $masAB[] = $mas6A[$i];
    }
}

// print_r($masAB);

// --- 8 ---

$masAB = [];

for ($i = 0; $i < 100; $i++) {
    if ($mas6A[$i] == $mas6B[$i]) {
        $masAB[] = $mas6A[$i];
    }
}

// print_r($masAB);

// --- 9 ---

$masAB = [];

foreach ($mas6B as $val) {
    $masAB[] = $val;
}
foreach ($mas6A as $i => $val) {
    $i = $val;
}

// print_r($masAB);


// --- 10 ---

$masyvas = [];

for ($i = 0; $i < 10; $i++) {
    $masyvas[0] = rand(5, 25);
    $masyvas[1] = rand(5, 25);
    $masyvas[$i] = $masyvas[$i - 1] + $masyvas[$i - 1];

}

print_r($masyvas);
