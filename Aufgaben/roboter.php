
<?php

/*
 * Sie bauen einen Roboter. Erstellen Sie die Klasse Robot mit folgenden Membern:
 *  - Integer "batterieLaufzeit"
 *  - String "aufgabe"
 *  - Methode "istBatterieLaufzeitNiedrig"
 *      gibt true zur?ck, wenn die Laufzeit kleiner 2 ist, sonst false.
 *  - Methode "f?hreAufgabeAus"
 *      gibt auf dem Bildschirm den Text des Attributs "aufgabe" aus, wenn "istBatterieLaufzeitNiedrig" false liefert
 *          und reduziert dann die Batterielaufzeit um 1,
 *      sonst soll "Ich muss aufgeladen werden." in der Konsole erscheinen.
 *
 * Erstellen Sie in der Main einen Roboter mit der Aufgabe "Ich reiche Butter." und einer Batterielaufzeit von 5.
 * Lassen Sie ihn f?nfmal in einer Schleife Butter reichen.
 */


 //$roboter = new Roboter();
 //$roboter->batterielaufzeit = 5;
 //$roboter->aufgabe = "text ganz toll!<br>";

 $roboter2 = new Roboter(5, "anderer Text<br>");

 //for($i = 0; $i < 5; $i++){
//	 $roboter->fuehreAufgabeAus();
 //}

  for($i = 0; $i < 5; $i++){
	 $roboter2->fuehreAufgabeAus();
 }


 class Roboter{

	public $batterielaufzeit;
	public $aufgabe;

	function __construct($batterielaufzeit, $aufgabe){
		$this->batterielaufzeit = $batterielaufzeit;
		$this->aufgabe = $aufgabe;
	}

	function istBatterieLaufzeitNiedrig(){
		return $this->batterielaufzeit < 2 ? true : false;
		
	}

	function fuehreAufgabeAus(){

		if(!$this->istBatterieLaufzeitNiedrig()){
			echo $this->aufgabe;
			$this->batterielaufzeit--;
		}
		else echo "ich muss aufgeladen werden <br>";
		
	}


 }






















 ?>