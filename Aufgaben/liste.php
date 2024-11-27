<?php 
/*
        VORBEMERKUNG:
        Das folgende Programm soll mit einer Liste von String-Arrays der Länge 2 arbeiten 
        => Jedes Element der Liste ist also ein Array, in dem jeweils 2 Strings abgespeichert werden können.

        AUFGABENSTELLUNG:
        Schreiben Sie bitte ein Programm, in dem ...
        - zunächst eine Liste von String-Arrays der Länge 2 eingeführt wird
        - eine Endlos-Schleife startet, in der pro Durchlauf ...
          + vom User ein deutsches Wort und dessen englische übersetzung abgefragt wird
          + die beiden User-Eingaben in ein String-Array der Länge 2 abgespeichert werden
          + dieses Array in der Liste abgespeichert wird
          + anschließend alle Wortpaare der Liste ausgegeben werden
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