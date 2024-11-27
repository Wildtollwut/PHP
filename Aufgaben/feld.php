<?php
/*
 Schreiben Sie bitte ein Java-Programm, in dem ...
 - die Klasse 'Schachfeld' definiert wird,
   + die Klasse besitzt zwei private Methoden (linie() und reihe()) und eine public Methode (getZufallsfeld())
     - keine der Methoden hat �bergabewerte
     - linie() liefert als R�ckgabewert einen Buchstaben zwischen A und H (als String)
     - reihe() liefert als R�ckgabewert eine Ziffer zwischen 1 und 8 (als String)
     - getZufallsfeld() liefert als R�ckgabewert die Konkatenation der R�ckgabewerte aus linie() und reihe()
 - im Main ein Objekt "feld" vom Typ Schachfeld instanziiert wird
   + zur Kontrolle wird der R�ckgabewert feld.getZufallsfeld() auf der Konsole ausgegeben
*/

$feld = new Schachfeld();
echo $feld->getZufallsfeld();




class Schachfeld{

private function linie(){
    $alphabet = range('A', 'H');
    $linie = array_rand($alphabet);
    return $alphabet[$linie];
}

private function reihe(){
    return strval(rand(1, 8));  //strval gibt string zurueck
}

public function getZufallsfeld(){
    return $this->linie() . $this->reihe();
    
}


}



?>