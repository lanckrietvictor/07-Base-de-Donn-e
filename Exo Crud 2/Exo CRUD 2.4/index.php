<?php 

//Faire le line avec le base de donnée
include "connection.php";

/*!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	GENERAL FUNCTIONS
	!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!*/

//Afficher tous
	function displayAll($table) {
		foreach ($table as $key => $value) {
			foreach ($value as $keys => $values) {
				echo $values." ";
			}
			echo "<br>";
		}
	}


	//Exo 4
	$drop_clients = $pdo->query("SELECT * FROM clients");
	$dropdown = $drop_clients->fetchAll();

	if(isset($_POST["submit"])) {
		stock($pdo);
	}

	function stock($pdo) {

		$ln = $pdo->quote($_POST["lastName"]);
		$fn = $pdo->quote($_POST["firstName"]);
		$bd = $pdo->quote($_POST["birthDate"]);
		$cd = $pdo->quote($_POST["card"]);
		$nr = $pdo->quote($_POST["number"]);

		$sql = "UPDATE clients SET lastName = $ln, firstName = $fn, birthDate = $bd, card = $cd, cardNumber = $nr";

	}

	?>


	<!DOCTYPE html>
	<html>
	<head>
		<title>
			Exo Crud 2.4
		</title>
		<meta charset="utf-8">
	</head>
	<body>

		<h1>Exercice 4</h1>

		<div id="dropdown">
			<select name="name" id="lastName">
				<?php 
				foreach ($dropdown as $key => $value) {
					echo "<option value='".$value["lastName"]."'>".$value["firstName"]." ".$value["lastName"]."</option>";
				}

				?>
			</select>
		</div>
		<br>
		<div id="change">
		</div>

		<form action="index.php" method="post">
			Last name: <input type="text" name="lastName"value=''>
			<br>
			First name: <input type="text" name="firstName">
			<br>
			Birth date: <input type="date" name="birthDate">
			<br>
			<input type="hidden" name="card" value="0">
			Loyalty card: <input type="number" name="card" min="0" max="1">
			<br>
			Loyalty card number: <input type="number" name="number">
			<br>
			<br>
			<button onclick="affiche();">Afficher les coordonées</button>
			<input type="submit" name="submit" value="Update information">
		</form>
		

		<script type="text/javascript">
			function affiche () {
				var lastName = document.getElementById("lastName").value;
				var xhr = new XMLHttpRequest();
				xhr.onreadystatechange = function () {
					if (xhr.readyState == 4 && xhr.status == 200) {
						document.getElementById("change").innerHTML = xhr.responseText;
					}
				}
				xhr.open("GET", "ajax.php?lastName="+lastName, true)
				xhr.send();
			}
		</script>
	</body>
	</html>