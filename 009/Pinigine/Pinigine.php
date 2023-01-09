<?php

class Pinigine {
    private $popieriniaiPinigai;
    private $metaliniaiPinigai;


     public function __construct() {
        $this->popieriniaiPinigai = 0;
        $this->metaliniaiPinigai = 0;
    }

    public function ideti($kiekis) : void {
        if ($kiekis < 3) {
            $this->metaliniaiPinigai += $kiekis;
        } else {
            $this-> popieriniaiPinigai += $kiekis;
        }
    }

    public function skaiciuoti() : void {
        echo 'Pinigines suma: '.$this->metaliniaiPinigai + $this->popieriniaiPinigai;
    }

    public function monetos() : void {
        echo 'Metaliniai pinigai: '.$this->metaliniaiPinigai;
    }

    public function banknotai() : void {
        echo 'Popieriniai pinigai: '.$this->popieriniaiPinigai;
    }

}