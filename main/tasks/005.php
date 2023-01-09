<body style='
background-color: #0d1117; color: #fff; font-family: Gill Sans, Gill Sans MT, Calibri, Trebuchet MS, sans-serif;'></body>

<?php

echo '<pre>';

$mas = [];
$rez = [];

foreach(range(1, 10) as $_) {
    $s = [];
    foreach(range(1, 5) as $_) {
        $s[] = rand(5, 25);
    }
    $mas[] = $s;
}

// -- 2-a --

$rez['a'] = 0;

foreach ($mas as $_) {
    foreach ($_ as $val) {
        $rez['a'] += $val > 10 ? 1 : 0;
    }
}

// -- 2-b --

$rez['b'] = $mas[0][0];

foreach ($mas as $_) {
    foreach ($_ as $val) {
        if ($val > $rez['b']) {
            $rez['b'] = $val;
        }
    }
}

// -- 2-c --

$rez['c'] = [];

foreach ($mas as $_) {
    foreach ($_ as $index => $val) {
        $rez['c'][$index] = ($rez['c'][$index] ?? 0) + $val;
    }
}

// -- 2-d --

foreach ($mas as &$s) {
    foreach(range(1, 2) as $_) {
        $s[] = rand(5, 25);
    }
}

// -- 2-e --

$rez['d'] = array_map(fn($v) => array_sum($v), $mas);

// -- 3 -- 

$rez['e'] = [];

function randLetter() {
    $char = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $i = rand(0, 25);
    $rand = $char[$i];
    return $rand;
}

foreach(range(1, 10) as $_) {
    $s = [];
    foreach(range(rand(2, 20), rand(2, 20)) as $_) {
        $s[] = randLetter();
    }
    sort($s);
    $rez['e'][] = $s;
}

// -- 4 --

sort($rez['e']);

foreach($rez['e'] as $index => $_) {
    foreach ($_ as $val) {
        if ($val === 'K') {
            $rez['e'] = array_merge(array($index => $_) + $rez['e']);
        }
    }
}

// -- 5 --

$rez['f'] = [];

foreach (range(1, 30) as $_) {
    $s = [];
    $s["user_id"] = rand(1, 1000000);
    $s["place_in_row"] = rand(0, 100);
    $rez['f'][] = $s;
}

// -- 6 --

sort($rez['f']);
$key = array_column($rez['f'], 'place_in_row');
array_multisort($key, SORT_ASC, $rez['f']);

// -- 7 --

function randLetSmall() {
    $char = 'abcdefghijklmnopqrstuvwxyz';
    $c = '';
    for ($i = 0 ; $i < rand(5, 15); $i++) {
        $j = rand(0, 25);
        $c .= $char[$j];
    }
    return $c;
}

foreach ($rez['f'] as  $_) {
    $s = [];
    $s['name'] = 'Pomidoras';
    $_[] = $s;
}

echo '<br>';


// -- 8 --

$rez['g'] = [];

foreach (range(1, 10) as $_) {
    $s = [];
    $randN = rand(0 ,5);
    if ($randN !== 0) {
        foreach (range(0, $randN) as $_) {
            $s[] = [rand(0, 10)];
        }
    } else {
        $s[] = [rand(0, 10)];
    }
    $rez['g'][] = $s;
}




print_r($rez['g']);