<html> 
	<head>
	<title>Register</title>
	</head>

	<body>
		
		<?php 
			include __DIR__."./navigation.php";
		?>
		
		<h1>Register</h1>

		<form action="register.php"  method="POST">

			<?php 
				if(isset($_GET["username_taken"]) && $_GET["username_taken"] == 1){
					echo "Username already exists";
				}
				if(isset($_GET["username_invalid"]) && $_GET["username_invalid"] == 1){
					echo "Invalid username. No \":\" allowed.";
				}
				if(isset($_GET["passwords_dont_match"]) && $_GET["passwords_dont_match"] == 1){
					echo "Please input the same password twice.";
				}
				if(isset($_GET["fields_empty"]) && $_GET["fields_empty"] == 1){
					echo "Enter all fields.";
				}
			?>
			<div>
				<label>
					Username
					<input id="usernameID" name="username">
				</label>
			</div>
			<br>
			<div>
				<label for="passwordID">Password</label>
				<input id="passwordID" name="password">
			</div>
			<br>
			<div>
				<label for="passwordID2">Repeat password</label>
				<input id="passwordID2" name="password2">
			</div>
			<br>
			<span>
				<button name="signUp" type="submit">Sign up</button>
			</span>

		</form>


	</body>

</html>