<?php 
/*
        VORBEMERKUNG:
        Das folgende Programm soll mit einer Liste von String-Arrays der L�nge 2 arbeiten 
        => Jedes Element der Liste ist also ein Array, in dem jeweils 2 Strings abgespeichert werden k�nnen.

        AUFGABENSTELLUNG:
        Schreiben Sie bitte ein Programm, in dem ...
        - zun�chst eine Liste von String-Arrays der L�nge 2 eingef�hrt wird
        - eine Endlos-Schleife startet, in der pro Durchlauf ...
          + vom User ein deutsches Wort und dessen englische �bersetzung abgefragt wird
          + die beiden User-Eingaben in ein String-Array der L�nge 2 abgespeichert werden
          + dieses Array in der Liste abgespeichert wird
          + anschlie�end alle Wortpaare der Liste ausgegeben werden
*/


$stringarray = array(array("test", "string"));


while(true){
    $deutsch = readline("Deutsches wort ");
    $englisch = readline("englisches wort ");

    $worte = array($deutsch, $englisch);
    array_push($stringarray, $worte);

    foreach($stringarray as $i){
        echo $i[0] . " - " . $i[1] ."\n";
        
        
    }
}



?>