<?php require_once 'Ovoce.php';

class Jablko extends Ovoce {
    public $odruda;

    public function __construct($barva, $odruda) {
        parent::__construct("Jablko", $barva);
        $this->odruda = $odruda;
    }

    public function vypisPopis() {
        return "Tohle je jablko odrůdy {$this->odruda}, barva: {$this->barva}.";
    }
}
?>