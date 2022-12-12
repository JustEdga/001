<?php

$name = 'Pomas';
$surname = 'Pomidoras';

if (strlen($name) < strlen($surname)) {
    echo $name;
} else {
    echo $surname;
}

// -- 2 --

echo '<br>';

echo strtoupper($name);
echo '<br>';
echo strtolower($surname);

// -- 3 --

echo '<br>';

$c = "$name[0].$surname[0]";

echo $c;

// - 4 --

echo '<br>';

$d = 'Name last 3 char: '.substr($name, -3).'<br>'.'Surname last 3 char: '.substr($surname, -3);

echo $d;

// -- 5 --

echo '<br>';

$american = 'An American in Paris';
$re = '/a/i';
$subst = '*';

$result = preg_replace($re, $subst, $american);


echo 'Pakeistas: ', $result;

// -- 6 --

echo '<br>';

preg_match_all($re, $american, $matches, PREG_SET_ORDER, 0);

$count = 0;

foreach ($matches as $item) {
    $count++;
}

echo $count;

// -- 7 --

echo '<br>';

$re3 = '/[aeiou]/i';
$subst2 = '';

$str = "Breakfast at Tiffany's";
$str2 = '2001: A Space Odyssey';
$str3 = "It's a Wonderful Life";

$result2 = preg_replace($re3, $subst2, $american);
$result3 = preg_replace($re3, $subst2, $str);
$result4 = preg_replace($re3, $subst2, $str2);
$result5 = preg_replace($re3, $subst2, $str3);

echo 'Be balsiu: ', $result2;
echo '<br>';
echo 'Be balsiu str: ', $result3;
echo '<br>';
echo 'Be balsiu str2: ', $result4;
echo '<br>';
echo 'Be balsiu str3: ', $result5;

// -- 8 --

echo '<br>';

$reN = '/[1-9]/i';
$starWars = 'Star Wars: Episode '.str_repeat(' ', rand(0,5)). rand(1,9) . ' - A New Hope';

echo $starWars;

preg_match_all($reN, $starWars, $number, PREG_SET_ORDER, 0);

echo '<pre>';

echo "Episode: ", $number[0][0];


// -- 9 --

echo '<br>';

$stringas = "Don't Be a Menace to South Central While Drinking Your Juice in the Hood";
$stringas2 = "Tik nereikia gąsdinti Pietų Centro, geriant sultis pas save kvartale";

$wordCount = 0;
$wordCount2 = 0;

$stringas = explode(' ', $stringas);
$stringas2 = explode(' ', $stringas2);
foreach ($stringas as $count) {
    if (mb_strlen($count) <= 5) {
        $wordCount++;
    }
}
foreach ($stringas2 as $count2) {
    if (mb_strlen($count2) <= 5) {
        $wordCount2++;
    }
}

echo 'Word count: ', $wordCount;
echo '<br>';
echo 'Word count: ', $wordCount2;


// -- 10 --

echo '<br>';

$char = "abcdefghijklmnopqrstuvwxyz";
$randomWord = '';

for ($i = 0; $i < 3; $i++) {
    $index = rand(0, strlen($char) - 1);
    $randomWord .= $char[$index];
}


echo 'Random word of 3: ', $randomWord;

// -- 11 --

echo '<br>';

$str11 = "Don't Be a Menace to South Central While Drinking Your Juice in the Hood Tik nereikia gąsdinti Pietų Centro, geriant sultis pas save kvartale";

$strArr = explode(' ', $str11);
$arrCount = -1;
$ranStr = '';

foreach ($strArr as $count) {
    $arrCount++;
}

echo $arrCount;

for ($i = 0; $i < 10; ++$i) {
    $index = rand(0, $arrCount);
    $ranStr .= $strArr[$index].' ';
}

echo '<pre>';

print_r($strArr);

echo '<br>';

echo $ranStr;


