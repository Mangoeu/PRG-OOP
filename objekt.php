<?php 

class cars {
    public $name;
    public $spotreba;
    public $nadrz;
    

      function input_spotreba($name, $spotreba, $nadrz) {
        $this->name = $name;  
        $this->spotreba = $spotreba;
        $this->nadrz = $nadrz;
        
  }

  function get_name() {
    return $this->name;
    }
    function get_spotreba() {
    return $this->spotreba;
    }

    function get_nadrz() {
    return $this->nadrz;
    }

}

$Auta = new cars();
$Auta->input_spotreba("BMW",5,55);


echo "Spotřeba " . $Auta-> get_name(). " je ".$Auta ->get_spotreba(). " itrů na 100 km.";

echo "<br>";

echo "Nádrž je ve stavu: " . $Auta ->get_nadrz() . " litrů.";






?>