<?php 

$errors = array();


if(isset($_POST["submit"])){

	if(empty($_POST["name"])){
		array_push($errors, "Name ist Leer");
	}
	if(empty($_POST["text"])){
		array_push($errors, "Textfeld ist Leer");
	}
	if(str_contains($_POST["name"], ":")){
		array_push($errors, "Name darf kein : enthalten");
	}

	if(count($errors) == 0){
		file_put_contents("./texte.txt", $_POST["name"] . ":" . str_replace("\n", "<br>", $_POST["text"]) . "\n", FILE_APPEND);
		header("Location: guestbook.php");  // schickt bie F5 nicht doppelt ab
	}
}



?>

<html>
	<head>

	</head>

	<body> 

		<form action="" method="POST">

			<label for="nameid">Name</label>
			<input id="nameid" name="name">
			<br>
			<br>
			<label for="textid">Guestbook</label>
			<br>
			<textarea id="textid" name="text" cols="80" rows="16"></textarea>
			<br>
			<br>
			<button name="submit" type="submit">Submit</button>

		</form>

	<?php 
		if(count($errors) > 0){
			foreach($errors as $element){
				echo $element . "<br>";
				
			}
		}
	?>

	<div>

		<?php 
			
			$texte = explode("\n", file_get_contents("./texte.txt"));

			foreach($texte as $element){
				if(empty($element)) continue;

				$name = substr($element, 0, strpos($element, ":"));
				$message = substr($element, strpos($element, ":") + 1);
				echo <<<"END"
				     <div style="border: 1px solid black;">
						<div>$name</div>
						<div>$message</div>   
					</div>
END;
			}
		?>

	</div>

	</body>


</html>