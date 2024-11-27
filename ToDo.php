<html>
	<head>
		<style>
		   .main {
			   display: inline-block;
			   width: 79vw;
		   }
		   .side {
			   display: inline-block;
			   width: 19vw;
		   }
		</style>
	</head>
	<body>
	    <?php 
    session_start();
    // if kein Key Count in Session[] existiert, dann ist count 0
    if(!isset($_SESSION["count"])){
        $_SESSION["count"] = 0;
    }    
    $_SESSION["count"] ++;

	echo $_SESSION["count"];
	?>

		<div class="main">
			<?php
			/*
				print_r($_SERVER);
				print_r($_POST);
			*/

				if($_SERVER["REQUEST_METHOD"] == "POST")
				{

					$taskFileName = "Task.txt";
					if (!empty($_POST["Task"])) {	
						file_put_contents($taskFileName, "[ ] " . $_POST["Task"] . "\r\n", FILE_APPEND);

						// Redirect browser so we go back to a GET request, so when using F5 we won't duplicate tasks after adding one
						//header('Location: 1.php');
					} elseif (!empty($_POST["toggletask"])) {
						$varString = file_get_contents($taskFileName);
						$array = explode("\r\n", $varString);

						// get correct string from array based on $_POST["toggletask"], using intval function on $_POST["toggletask"] to turn it into an integer
						$oldString = $array[intval($_POST["toggletask"]) - 1];
						// $array[intval($_POST["toggletask"])];
						// $array[intval("4")];
						// $array[4];
						// -> Zeile #5
					
						// check if task is checked or not
						$checked = false;
						if(substr($oldString, 1, 1) == "x")
						{
							$checked = true;
						} 
						$checked = !$checked;

						$newString = "";
						// construct new string based on previous check
						if($checked == true)
						{
							// substr($correctString, 0, 1) . 'x' . substr($correctString, 2)
							// [                               x    ] abc -> [x] abc
							// [x] abc
							$newString = "[x] " . substr($oldString, 4);
						}
						else
						{
							$newString = "[ ] " . substr($oldString, 4);
						}
						$array[intval($_POST["toggletask"]) - 1] = $newString;

						// implode array
						$varString = implode("\r\n", $array);

						// write to file
						file_put_contents($taskFileName, $varString);

						//header('Location: 1.php');
					}
				}
			?>
		
			<h1>Do-do List </h1>
			<ul>
			<?php 
				$taskFileName = "Task.txt";
				if(file_exists($taskFileName))
				{
					$varString = file_get_contents($taskFileName);
					$array = explode("\r\n", $varString);
					for($i = 0; $i < count($array); $i++)
					{
						$item = $array[$i];
						if (empty($item)) continue;	
						//  substr(string $string, int $offset, ?int $length = null): string
						$checked = false;
						if(substr($item, 1, 1) == "x" ) {
							$checked = true;
						}
					
						echo '<li> <form action="1.php" method="POST"> <input disabled readonly type = "checkbox" ' . ($checked ? 'checked' : '') . '> ' . substr($item, 4) . '<button name = "toggletask" value = "' . $i + 1 . '" >Toggle</button> </form></li>';
					}
				}
			?>
			</ul>

			<form action = "1.php" method = "POST">
				<label for = "Task"> Task: </label>
				<input id = "Task" type = "text" name = "Task">
				<button type = "submit"> Submit </button>
			</form>
		</div>
		<div class="side">
			<div>
				POST:
				<pre>
					<?php
					  print_r($_POST);
					?>
				</pre>
			</div>
		</div>
	</body>
</html>