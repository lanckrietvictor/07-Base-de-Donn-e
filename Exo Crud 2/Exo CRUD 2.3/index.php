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

	//Exo 3
	$result_types = $pdo->query("SELECT * FROM showTypes");
	$types = $result_types->fetchAll();

	$result_genres = $pdo->query("SELECT * FROM genres");
	$genres = $result_genres->fetchAll();

	if (isset($_POST["submit"])) {
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

		$sql = "INSERT INTO shows (title, performer, date, showTypesId, firstGenresId, secondGenreId, duration, startTime) VALUES ($title, $artist, $date, $type, $genre1, $genre2, $duration, $startTime)";

		$pdo->prepare($sql)->execute();
		echo "Added to table";

	}


	?>

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