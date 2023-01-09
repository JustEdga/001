<?php

class Kibiras2 {

    protected $akmenuKiekis;
    private static $akmenuKiekisVisuoseKibiruose = 0;


    public static function akmenuKiekisVisuoseKibiruose() : void {
        echo 'Pririnkta visuose kibiruose: '.self::$akmenuKiekisVisuoseKibiruose;
    }

    public function __construct($kiekis) {
        $this->akmenuKiekis = $kiekis;
    }

    public function prideti1Akmeni() : void {
        self::$akmenuKiekisVisuoseKibiruose++;
        $this->akmenuKiekis++;
    }

    public function kiekPririnktaAkmenu() : void {
        echo 'Pririnkta: '.$this->akmenuKiekis;
    }

}