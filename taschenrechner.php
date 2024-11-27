<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taschenrechner</title>
</head>

<body>
<h1> Taschenrechner </h1>

<!-- Form Formular daten zum abschicken, method POST, verwendet POST statt Get Methode 
        action " " an gleiche Seite, oder link zu anderer Seite -->
<form action="" method = "POST"> 
<label for = "zahl1">Zahl 1</label>
<input id = "zahl1" name = "inputZahl1">
<br>
<br>
<label for = "zahl2">Zahl 2</label>
<input id = "zahl2" name = "inputZahl2">
<br>
<br>
<button name = "operator" type = "submit" value = "plus"> + </button>
<button name = "operator" type = "submit" value = "minus"> - </button>
<button name = "operator" type = "submit" value = "mal"> * </button>
<button name = "operator" type = "submit" value = "geteilt"> : </button>
<br>
<br>
</form>
<div>
    <?php 
    session_start();
    // if kein Key Count in Session[] existiert, dann ist count 0
    if(!isset($_SESSION["count"])){
        $_SESSION["count"] = 0;
    }    
    $_SESSION["count"] ++;


    if(isset($_POST["operator"])) {
        $zahl1 = $_POST["inputZahl1"];
        $zahl2 = $_POST["inputZahl2"];
        //isset testet ob vorhanden, gibt true/false zuruck 
        //$operator = isset($_POST["operator"]))
        $operator = $_POST["operator"];
         
        if(empty($zahl1)  || empty($zahl2)){
            echo "Bitte eine Zahl eingeben.";
        }
        else if(!is_numeric($zahl1) || !is_numeric($zahl2)){
            echo "Bitte eine Zahl eingeben.";
        }
        else{
            
            if($operator == "plus"){
                echo $zahl1 + $zahl2;
            }
            else if($operator == "minus"){
                echo $zahl1 - $zahl2;
            }
            else if($operator == "mal"){
                echo $zahl1 * $zahl2;
            }
            else if($operator == "geteilt"){
                echo $zahl1 / $zahl2;
            }
        }
    }

    echo $_SESSION["count"];

    


    ?>
</div>



</body>
</html>