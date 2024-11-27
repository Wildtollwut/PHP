
<?php 



/*
<input id="usernameID" name="username">
<button name="login" type="submit">Login</button>
<input id="passwordID" name="password">
*/

include __DIR__."./auth.include.php";

function backToLogin() {
	// Back to login form, keep the $_GET data in the URL
	header("Location: loginSeite.php?loginerror=1&" . http_build_query($_GET));
}

if(!isset($_POST["login"]) || empty($_POST["username"]) || empty($_POST["password"])){
	// Entweder nicht Login geklickt und trotzdem irgendwie auf diese Seite gekommen, oder Username/Passwort nicht befuellt
	backToLogin();
	
}

if(login($_POST["username"], $_POST["password"])){

	if(isset($_GET["redirect_to"])){
		header("Location: ".$_GET["redirect_to"]);
	} else {
		header("Location: membersSeite.php");
	}

}else{

	backToLogin();

}

?>