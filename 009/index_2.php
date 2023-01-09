<?php

require __DIR__ . './Stikline/Stikline.php';

$s1 = new Stikline(200);
$s2 = new Stikline(150);
$s3 = new Stikline(100);

$s1->ipilti(50);
$s1->ipilti(50);
$s1->ipilti(250);


$s2->ipilti($s1->ispilti());
$s3->ipilti($s2->ispilti());


echo '<pre>';
print_r($s1);
print_r($s2);
print_r($s3);