<!DOCTYPE html>
<html>
<head>
	<title>PHP Database</title>
	<meta charset="utf-8">
</head>
<body>
	<?php 

//Faire le line avec le base de donnée
	include "connection database.php";

	echo "<h1>Toutes les données</h1>";

//Placer la requête SQL dans la variable
	$result = $pdo->query("SELECT * FROM students");
//Afficher les données

	$donnees = $result->fetchAll(pdo::FETCH_OBJ);
	foreach ($donnees as $key => $value) {
		foreach ($value as $keys => $values) {
			echo $values." ";
		}
		echo "<br>";
	}

	echo "<br> <hr>";

	echo "<h1>Prénoms</h1>";

	$result = $pdo->query("SELECT prenom FROM students");

	while ($donnees = $result->fetch()) {

		echo $donnees["prenom"];
		echo "<br>";
	}

	echo "<br> <hr>";

	echo "<h1>Prénoms, dates de naissance et école</h1>";

	$result = $pdo->query("SELECT * FROM students");

	while ($donnees = $result->fetch()) {

		if ($donnees["school"]==1) {
			$school = "Anderlecht";
		}

		else {
			$school = "Centrale";
		}

		echo $donnees["prenom"]." ".$donnees["datenaissance"]." "."<b>".$school."</b>";
		echo "<br>";
	}

	echo "<br> <hr>";

	echo "<h1>Elèves féminin</h1>";

	$result = $pdo->query("SELECT * FROM students WHERE genre = 'F'");

	$donnees = $result->fetchAll(pdo::FETCH_OBJ);
	foreach ($donnees as $key => $value) {
		foreach ($value as $keys => $values) {
			echo $values." ";
		}
		echo "<br>";
	}
	echo "<br> <hr>";

	echo "<h1>Elèves d'Anderlecht</h1>";

	$result = $pdo->query("SELECT * FROM students WHERE school = '1'");
	$donnees = $result->fetchAll(pdo::FETCH_OBJ);
	foreach ($donnees as $key => $value) {
		foreach ($value as $keys => $values) {
			echo $values." ";
		}
		echo "<br>";
	}
	echo "<br> <hr>";

	echo "<h1>Prénoms par ordre inverse</h1>";

	$result = $pdo->query("SELECT prenom FROM students ORDER BY prenom DESC");

	while ($donnees = $result->fetch()) {

		echo $donnees["prenom"];
		echo "<br>";
	}

	echo "<br> <hr>";

	//add Ginette Dalor et puis affichier
	$pdo->query("INSERT INTO becode (nom, prenom, datenaissance, genre, school) VALUES ('Dalor', 'Ginette', '1930-01-01', '2'");

	//Placer la requête SQL dans la variable
	$result = $pdo->query("SELECT * FROM students");

	//Afficher les données

	$donnees = $result->fetchAll(pdo::FETCH_OBJ);
	foreach ($donnees as $key => $value) {
		foreach ($value as $keys => $values) {
			echo $values." ";
		}
		echo "<br>";
	}

	echo "<br> <hr>";


	?>

</body>
</html>