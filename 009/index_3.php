<?php

require __DIR__ . './Grybas/Grybas.php';
require __DIR__ . './Krepsys/Krepsys.php';

$k = new Krepsys;

while($k->grybauti(new Grybas)){}

echo '<pre>';
print_r($k);