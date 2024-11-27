

<?php

define("USERNAME_DELIMITER", ":");


function forceLogin() {
	if(!isLoggedIn()){
		header("Location: loginSeite.php?redirect_to=".$_SERVER["REQUEST_URI"]);
		die();
	}
}

function safe_session_start() {
	if(session_status() == PHP_SESSION_ACTIVE){
		return;
	}
	session_start();
}

function getUserData(){
	
	$arrayPasswordStrings = explode("\n", str_replace("\r\n", "\n", file_get_contents("passwords.txt")));

	//$passwordsString = file_get_contents("passwords.txt");
	//$newPasswordString = str_replace("\r\n", "\n", $passwordsString);
	//$arrayPasswordStrings = explode("\n", $newPasswordString);

	$userDataArray = array();

	foreach($arrayPasswordStrings as $element){
		// Leere Zeilen ueberspringen
		if (empty($element)) {
			continue;
		}

		$index = strpos($element, USERNAME_DELIMITER);
		// Falls kein : gefunden, Fehler abfangen
		if($index == -1){
			continue;
		}

		$username = substr($element, 0, $index);
		$password = substr($element, $index + 1);
		
		$userDataArray[] = array($username, $password);
		
	}
	return $userDataArray;
	
}


function isValidUsername($username) {

	$charArray = array("\n", "\r", USERNAME_DELIMITER);

	foreach($charArray as $element){
		if(str_contains($username, $element)){
			return false;
		}
	}
	return true;
}


function login($username, $password){
	
	$userData = getUserData();

	foreach($userData as $element){
		if($element[0] == $username && $element[1] == $password){
			// eingeloggt
			safe_session_start();
			$_SESSION["isLoggedIn"] = true;
			$_SESSION["username"] = $username;
			return true;
		}
	}
	// Nicht eingeloggt
	return false;
}


function usernameExists($username) {

	$userData = getUserData();

	foreach($userData as $element){
		if($element[0] == $username){
			return true;
		}
	}
	return false;
}


function logout(){

	safe_session_start(); // Session, die normalerweisse schon existiert weil wir eingeloggt sind, oeffnen
	session_unset();  //loescht Userdaten Variablen
	session_destroy();
	safe_session_start(); // Neue Session erstellen, da wir die alte gerade geloescht haben
	$_SESSION["isLoggedIn"] = false;

}


function register($username, $password){
	file_put_contents("./passwords.txt", $username . USERNAME_DELIMITER . $password, FILE_APPEND);
}


function isLoggedIn(){
	
	safe_session_start();

	if(isset($_SESSION["isLoggedIn"]) && $_SESSION["isLoggedIn"] == true) {
		return true;
	}
	return false;
}


function getUserName(){

	if(isLoggedIn() == false){
		return "";
	}

	return $_SESSION["username"];
}

?>

