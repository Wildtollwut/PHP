
<?php 


/*Schreiben Sie bitte ein Programm, in dem ...
 - eine Klasse Firma definiert wird
   + die Member der Klasse sind:
     - String: name
     - Double-Liste: konten
     - Methode: getSumme
       + Funktion: berechnet den Gesamtbetrag aller Listenelemente
       + Rückgabewert: Gesamtbetrag
     - Getter und Setter für die Attribute.

 - In der Main erstellen Sie zwei Firmen und geben die Werte testweise aus.
 */

 $firma1 = new Firma();
 $firma1->getSumme(); 


 class Firma {

    public $name;
    public $konten = array(453.64, 398, 29.58, 2983.23);


    function getSumme() {
        
        $gesamtbetrag = 0;

        foreach($this->konten as $zahl){
            $gesamtbetrag += $zahl;
        }

        echo $gesamtbetrag;
    }
   
 }











 ?>