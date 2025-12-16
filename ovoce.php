<?php

class Ovoce {
    
    public $nazev;
    public $barva;
    public $jeZrale;

    
    public function __construct($nazev, $barva) {
        $this->nazev = $nazev;
        $this->barva = $barva;
        $this->jeZrale = false;
    }

    
    public function dozrat() {
        $this->jeZrale = true;
        $this->barva = "Sytě " . $this->barva;
        echo "Ovoce {$this->nazev} právě dozrálo!<br>";
    }
}
?>