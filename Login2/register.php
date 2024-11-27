<?php 

include __DIR__."./auth.include.php";



if(!isset($_POST["signUp"]) || empty($_POST["username"]) || empty($_POST["password"]) || empty($_POST["password2"])){
	// Entweder nicht Signup geklickt und trotzdem irgendwie auf diese Seite gekommen, oder Username/Passwort/Passwort2 nicht befuellt
	header("Location: registerSeite.php?fields_empty=1");
	die();
	
}
if(!isValidUsername($_POST["username"])){
	header("Location: registerSeite.php?username_invalid=1");
	die();
}
if($_POST["password"] != $_POST["password2"]){
	header("Location: registerSeite.php?passwords_dont_match=1");
	die();
}
if(usernameExists($_POST["username"])){
	header("Location: registerSeite.php?username_taken=1");
	die();
}

register($_POST["username"], $_POST["password"]);
login($_POST["username"], $_POST["password"]);
header("Location: membersSeite.php");

?>	