<?php 
/*
    Schreiben Sie bitte zunächst die beiden folgenden Methoden:
    a) Funktionsname: fülleLottoArray
       Übergabewerte: 1 Integer-Array
       Funktion:      Füllt in das Array mit 6 Lottozahlen (Zahlen zwischen 1 und 49, KEINE Zahl darf mehrfach auftreten) 
       Rückgabewert:  Keiner

    b) Funktionsname: zähleTreffer
       Übergabewerte: 2 Integer-Array a und b
       Funktion:      Zählt die Anzahl der "Treffer" (= Anzahl der Zahlen, die in a und b gemeinsam auftreten)
       Rückgabewert:  Anzahl der Treffer
    
    Verwenden Sie obige Funktionen bitte in folgendem Java-Programm, in dem ...
    - zunächst ein Lottotipp ausgelost wird (Random oder vom Benutzer eingeben lassen)
		und in einem Array 'tipp' abgespeichert wird
    - anschließend eine do-while-Schleife startet, die pro Durchlauf ...
      + eine Lotto-Auslosung (6 Zahlen, also ohne Zusatzzahl) in ein Array 'auslosung' abspeichert
      + Lottotipp und (aktuelle) Auslosung auf der Konsole ausgibt
      + aktuelle Anzahl der Treffer (wie viele Richtige wurden erzielt?) ermittelt und auf der Konsole ausgibt
	  + die Auslosung in einem 2-dimensionalen Array abspeichert
    - die Schleife endet, wenn (mindestens) 3 Treffer erreicht wurden, oder 10 Durchläufe / Auslosungen stattfanden.
    - nach der Schleife zur Kontrolle die Auslosungen des 2-dimensionalen Arrays auf der Konsole ausgegeben werden
 */

$intarray = array();
$intarray2 = array();
$intarray3 = array();
$intarray4 = array();



for($i = 0; $i < 100; $i++){
    $intarray3 = fülleLottoArray();
    anderevariante2($intarray);

    echo zähleTreffer2($intarray, $intarray3);
}


 function zähleTreffer2($a, $b){
    return count(array_intersect($a, $b));

}


function zähleTreffer($a, $b){
    $count = 0;

    for($i = 0; $i < count($a); $i++){
        if(in_array($a[$i], $b)){
            $count++;
            
        }
    }
    return $count;
    

}

function fülleLottoArray(){
    $iarray = array();

    for($i = 0; $i < 6; $i++){
        $bool = true;
        $rnd = rand(1, 49);

        for($j = 0; $j < count($iarray); $j++){
            if($rnd == $iarray[$j]){
                $i--;
                $bool = false;
                break;
            }
            
        }

        if($bool == true){
            $iarray[$i] = $rnd;
        }

    }
    return $iarray;
    //var_dump($iarray);
 }


function anderevariante2(&$lottoarray) {
    while (count($lottoarray) < 6) {
        $rnd = rand(1, 49);
        $bool = true;
        for($j = 0; $j < count($lottoarray); $j++){
           if($rnd == $lottoarray[$j]){
               $bool = false;
               break;
           }
        }
        if ($bool) {
            $lottoarray[] = $rnd;
        }
    }
    //var_dump($lottoarray);
}


function anderevariante3(&$lottoarray) {
    $rnd = range(1, 49);
    while (count($lottoarray) < 6) {
        // jeweils ein element aus $rnd random nehmen
        $lottoarray[] = array_splice($rnd, rand(0, count($rnd) - 1), 1)[0];
    }

    var_dump($lottoarray);
}


function anderevariante(&$lottoarray){
     
   $anderesarray = range(1, 49);
   shuffle($anderesarray);        
   array_push($lottoarray, ...array_slice($anderesarray, 0, 6));
   var_dump($lottoarray);
   /*
        abc(...[0, 1, 2]);
       ==
       abc(0, 1, 2);
    */
}



?>