<?php

class Stikline {

    private $turis;
    private $kiekis;


    public function __construct($turis) {
        $this->turis = $turis;
    }

    public function ipilti($kiekis) : void {
        $this->kiekis += $kiekis;
        if ($this->turis < $this->kiekis) {
            $this->kiekis = $this->turis;
        }
    }

    public function ispilti() {
        $kiekis = $this->kiekis;
        $this->kiekis = 0;
        return $kiekis;
    }

}