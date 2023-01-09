<?php

require __DIR__ . './Kibiras/Kibiras1.php';
require __DIR__ . './Kibiras2/Kibiras2.php';
require __DIR__ . './Pinigine/Pinigine.php';


$k1 = new Kibiras1(0);
$k2 = new Kibiras1(0);
$k3 = new Kibiras1(0);

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


// -- 2 --


$p1 = new Pinigine();

$p1->ideti(1);
$p1->ideti(2);
$p1->ideti(5);
$p1->ideti(3);

echo '<br>';
$p1->skaiciuoti();

echo '<br>';
$p1->monetos();

echo '<br>';
$p1->banknotai();

echo '<pre>';
print_r($p1);

// -- 3 --

$k4 = new Kibiras2(0);
$k5 = new Kibiras2(0);

$k4->prideti1Akmeni();
$k4->prideti1Akmeni();
$k4->prideti1Akmeni();
$k5->prideti1Akmeni();
$k5->prideti1Akmeni();

$k4->kiekPririnktaAkmenu();
echo '<br>';
$k5->kiekPririnktaAkmenu();

echo '<br>';

Kibiras2::akmenuKiekisVisuoseKibiruose();


