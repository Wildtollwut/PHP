<?php
/*
 Schreiben Sie bitte ein Java-Programm, in dem ...
 - eine Klasse 'Produkt' definiert wird
   + Klassenmember sind:
     - name (String, private)
        + normaler Getter und Setter
     - mindestpreis (Integer, private)
        + kein Getter, normaler Setter
     - verkaufspreis (Integer, private)
        + normaler Getter; Setter: nur FALLS value>=mindestpreis SONST verkaufspreis=mindestpreis
 - im Main alle obigen "Feature" getestet werden
*/


$produkt = new Produkt;
$produkt->setName("Obstkorb");
$produkt->setMin(5);
$produkt->setVerkaufspreis(33);
echo $produkt->getName();
echo $produkt->getPreis();



class Produkt{

private $name;
private $mindestpreis;
private $verkaufspreis;

function getName(){
    return $this->name;
}

function setName($name){
    $this->name = $name;
}

function setMin($mindespreis){
    $this->mindestpreis = $mindespreis;
}

function getPreis(){
    return $this->verkaufspreis;
}

function setVerkaufspreis($verkaufspreis){
    if($verkaufspreis >= $this->mindestpreis){
        $this->verkaufspreis = $verkaufspreis;
    }
    else $this->verkaufspreis = $this->mindestpreis;
}

}





?>