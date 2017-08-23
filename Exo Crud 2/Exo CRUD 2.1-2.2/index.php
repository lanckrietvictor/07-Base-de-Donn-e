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

	//Exo 1
	if(isset($_POST["submit"])) {
		stock($pdo);
	}

	function stock($pdo) {

		$ln = $pdo->quote($_POST["lastName"]);
		$fn = $pdo->quote($_POST["firstName"]);
		$bd = $pdo->quote($_POST["birthDate"]);
		$cd = $pdo->quote($_POST["card"]);
		$nr = $pdo->quote($_POST["number"]);

		if ($cd == 1) {
			$sql = "INSERT INTO clients (lastName, firstName, birthDate, card, cardNumber) VALUES ($ln, $fn, $bd, $cd, $nr)";


			echo "Client with loyalty card added";
		}	

		elseif ($cd == 0) {
			$sql = "INSERT INTO clients (lastName, firstName, birthDate, card, cardNumber) VALUES ($ln, $fn, $bd, $cd, NULL)";

			echo "Client without loyalty card added";
		}

		$pdo->prepare($sql)->execute();
	}

	?>

	<!DOCTYPE html>
	<html>
	<head>
		<title>
			Exo Crud 2.1
		</title>
		<meta charset="utf-8">
	</head>
	<body>

		<h1>Exercice 1/2</h1>

		<form action="index.php" method="post">
			Last name: <input type="text" name="lastName">
			<br>
			First name: <input type="text" name="firstName">
			<br>
			Birth date: <input type="date" name="birthDate">
			<br>
			<input type="hidden" name="card" value="0">
			Loyalty card: <input type="checkbox" name="card" value="1">
			<br>
			Loyalty card number: <input type="number" name="number">
			<br>
			<input type="submit" name="submit">
		</form>

	</body>
	</html>