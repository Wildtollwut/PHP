<?php

include __DIR__."./auth.include.php";

forceLogin();

?>
<html> 
	<head>
	<title>Members</title>
	</head>

	<body>
		<?php 
			include __DIR__."./navigation.php";
		?>

		<h1>Membersite</h1>
		<p>Hello, <?php echo getUserName(); ?>
		<br>
		<br>
		<a href="logout.php">Logout</a>

	</body>

</html>