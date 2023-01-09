<?php

class Kibiras3 {
    protected $akmenuKiekis;


    public function __construct($kiekis) {
        $this->akmenuKiekis = $kiekis;
    }

    public function prideti1Akmeni() : void {
        $this->akmenuKiekis++;
    }

    public function kiekPririnktaAkmenu() : void {
        echo 'Pririnkta: '.$this->akmenuKiekis;
    }
}