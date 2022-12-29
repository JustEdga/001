<?php

class Kibiras2 {

    protected $akmenuKiekis;
    static private $akmenuKiekisVisuoseKibiruose;


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