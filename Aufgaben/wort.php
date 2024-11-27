<?php 
/*
    Schreiben Sie bitte zun?chst die 3 folgenden Methoden:
    a) Funktionsname: schreibeListe
       ?bergabewert:  1 String-Liste 'l'
       Funktion:      l wird sortiert, anschlie?end werden alle Strings in l auf der Konsole ausgegeben
       R?ckgabewert:  Keiner
    b) Funktionsname: hatLeerzeichen
       ?bergabewert:  1 String 's'
       Funktion:      F?llt die boolesche Variable 'b' mit 'true', FALLS s (mindestens) ein Leerzeichen besitzt, SONST 'false'
       R?ckgabewert:  b
    c) Funktionsname: schonVorhanden
       ?bergabewert:  1 String-Liste 'l' und ein String 's'
       Funktion:      F?llt die boolesche Variable 'b' mit 'true', FALLS s in l vorkommt, SONST 'false'
       R?ckgabewert:  b

    Testen Sie die obigen Methoden bitte mithilfe des folgenden Programms:
    - Zun?chst wird eine Liste vom Typ String eingef?hrt
    - Das Programm startet eine Endlos-Schleife, in der pro Durchlauf ...
      + vom User ein Wort abgefragt wird
        - falls in der Eingabe ein Leerzeichen vorkommt: entsprechende Fehlermeldung:
        - falls in der Eingabe KEIN Leerzeichen vorkommt, ABER die Eingabe bereits in der Liste vorkommt: entsprechende Fehlermeldung
        - falls WEDER ein Leerzeichen vorkommt, NOCH die Eingabe bereits vorkommt, so wird die Eingabe in die Liste mit aufgenommen
      + alle Elemente der Liste werden auf der Konsole ausgegeben
*/

$stringListe = array("das hier", "ist eine ganz", "tolle liste", "von Strings", "dies");

while(true){

    
    $eingabe = readline("\nWort eingeben: ");

    if(hatLeerzeichen($eingabe)){
        echo "Fehler, Leerzeichen vorhanden\n";
    }
    elseif(schonVorhanden($eingabe, $stringListe)){
        echo "Fehler, schon vorhanden\n";
    }
    else{
        $stringListe[] = $eingabe;
        schreibeListe($stringListe);
    }
    
}




function schreibeListe($l){
    sort($l);
    foreach($l as $element){
        echo $element . "\n";
    }
}

function hatLeerzeichen($s){
 $b = str_contains($s, " ");
 return $b;
}

function schonVorhanden($l, $s){
    $b = array_search($l, $s);
    return $b;
}



?>