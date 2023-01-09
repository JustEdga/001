<?php

require __DIR__ . './Kibiras3/Kibiras3.php';
require __DIR__ . './Kibiras3/KibirasNePo1.php';


$k1 = new KibirasNePo1(0);
$k2 = new KibirasNePo1(0);
$k3 = new KibirasNePo1(0);

$k1->prideti1Akmeni();
$k1->prideti1Akmeni();
$k2->prideti1Akmeni();
$k3->prideti1Akmeni();
$k1->prideti1Akmeni();
$k3->prideti1Akmeni();

$k1->kiekPririnktaAkmenu();
echo '<br>';
$k2->kiekPririnktaAkmenu();
echo '<br>';
$k3->kiekPririnktaAkmenu();