<?php
require_once 'Ovoce.php';

class Farma {
    public $nazevFarmy;
    public $majitel;
    public $skladOvoce = []; 

    public function __construct($nazev, $majitel) {
        $this->nazevFarmy = $nazev;
        $this->majitel = $majitel;
    }

    public function uskladnitOvoce(Ovoce $konkretniOvoce) {
        $this->skladOvoce[] = $konkretniOvoce;
        echo "Na farmu {$this->nazevFarmy} bylo uskladněno: {$konkretniOvoce->nazev}<br>";
    }

    public function vypisZasoby() {
        $pocet = count($this->skladOvoce);
        echo "Majitel {$this->majitel} hlásí: Aktuálně máme {$pocet} ks ovoce.<br>";
    }
}
?>