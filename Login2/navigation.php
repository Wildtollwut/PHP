


<nav>

	<a href="frontpage.php">Frontpage</a>
	<?php 
		include_once __DIR__."./auth.include.php";
		if(isLoggedIn()){
			echo "<a href=\"logout.php\">Logout</a>";
		}else{
			echo "<a href=\"loginSeite.php\">Login</a>";
		}
	
	?>
	<a href="membersSeite.php">Membersite</a>
	<a href="profilSeite.php">Userprofil</a>

</nav>
