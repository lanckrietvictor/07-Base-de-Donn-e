<?php 

//Faire le line avec le base de donnée
require_once "connection.php";


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

	function populateDropdown($table) {
		foreach ($table as $value) {
			echo "<option>".$value['id']."</option>";
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

	if (isset($_POST["submit2"])) {
		showPlanning($pdo);
	}

	function showPlanning($pdo) {
		$title = $pdo->quote($_POST["titre"]);
		$artist = $pdo->quote($_POST["artiste"]);
		$date = $pdo->quote($_POST["dateSpectacle"]);
		$type =$pdo->quote($_POST["type"]);
		$genre1 = $pdo->quote($_POST["genre1"]);
		$genre2 = $pdo->quote($_POST["genre2"]);
		$duration = $pdo->quote($_POST["duration"]);
		$startTime = $pdo->quote($_POST["startTime"]);

		$sql2 = "INSERT INTO shows (title, performer, date, showTypesId, firstGenresId, secondGenresId, duration, startTime) VALUES ($title, $artist, $date, $type, $genre1, $genre2, $duration, $startTime)";

		$pdo->prepare($sql2)->execute();

	}

//Exo 3
	$result_types = $pdo->query("SELECT * FROM showTypes");
	$types = $result_types->fetchAll();

	$result_genres = $pdo->query("SELECT * FROM genres");
	$genres = $result_genres->fetchAll();

	

	

	?>

	<!DOCTYPE html>
	<html>
	<head>
		<title>
			Exo Crud 2
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
			<input type="submit" name="submit2">
		</form>

		<hr>

		<h1>Exercice 3</h1>

		<form action="index.php" method="post">
			Titre: <input type="text" name="titre">
			<br>
			Artiste: <input type="text" name="artiste">
			<br>
			Date of spectacle: <input type="date" name="dateSpectacle">
			<br>
			
			Type de spectacle: <select name="type">
			<?php 
			foreach ($types as $value) {
				echo "<option value='".$value["id"]."'>".$value["type"]."</option>";
			}
			?>
			</select>
			<br>

			Genre 1: <select name="genre1">
			<?php 
			foreach ($genres as $value) {
				echo "<option value='".$value["showTypesId"]."'>".$value["genre"]."</option>";
			}
			?>
		</select>
		<br>

		Genre 2: <select name="genre2">
			<?php 
			foreach ($genres as $value) {
				echo "<option value='".$value["showTypesId"]."'>".$value["genre"]."</option>";
			}
			?>
		</select>
		<br>
		Duration: <input type="time" name="duration" step="1">
		<br>
		Starting time: <input type="time" name="startTime" step="1">
		<br>
		<input type="submit" name="submit">
	</form>

</body>
</html>