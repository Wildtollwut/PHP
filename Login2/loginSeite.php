
<html> 
	<head>
	<title>Login</title>
	</head>

	<body>
		
		<?php 
			include __DIR__."./navigation.php";
		?>
		
		<h1>Login</h1>
							<!-- Gibt den "?blablaText" Teil der URL an login.php weiter wenn das Formular abgeschickt wird -->
		<form action="login.php<?php if (isset($_GET["redirect_to"])) { echo "?redirect_to=" . htmlspecialchars($_GET["redirect_to"]); } ?>"  method="POST">

			<?php 
				if(isset($_GET["loginerror"]) && $_GET["loginerror"] == 1){
					echo "Wrong username or password";
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
			<span>
				<button name="login" type="submit">Login</button>
			</span>
			<span>
				&nbsp;&nbsp; <!-- abstand -->
				<a href="registerSeite.php" name="register">Sign up</a>
			</span>
		</form>


	</body>

</html>