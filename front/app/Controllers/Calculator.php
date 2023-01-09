<?php
namespace Front\Controllers;
use Front\App;

class Calculator {

    public function sum($a, $b) 
    {
        $result = $a + $b;

        return App::view('calculator', compact('result'));
    }

    public function diff($a, $b) 
    {
        $result = $a - $b;
        return App::view('calculator', compact('result'));
    }

    public function mult($a, $b) 
    {
        $result = $a * $b;
        return App::view('calculator', compact('result'));
    }

    public function div($a, $b) 
    {
        $result = $a / $b;
        return App::view('calculator', compact('result'));
    }
    

}