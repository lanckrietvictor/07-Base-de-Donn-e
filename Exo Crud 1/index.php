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



//Exo 1: Afficher Clients
	$result_clients = $pdo->query("SELECT * FROM clients");

	$donnees_clients = $result_clients->fetchAll(pdo::FETCH_OBJ);

//Exo 2: Afficher les types de spectacles
	$result_spectacleTypes = $pdo->query("SELECT type FROM showTypes");

	$donnees_spectacleTypes = $result_spectacleTypes->fetchAll(pdo::FETCH_OBJ);

//Exo 3
	$exo3break = 0;

//Exo 4
	$result_carteFidelite = $pdo->query("SELECT * FROM clients WHERE card=1");

	$donnees_carteFidelite = $result_carteFidelite->fetchAll(pdo::FETCH_OBJ);

//Exo 5

	$result_nameWithM = $pdo->query("SELECT lastName, firstName FROM clients WHERE lastName LIKE 'M%'");
	$donnees_nameWithM = $result_nameWithM->fetchAll();

//Exo 6
	$result_shows = $pdo->query("SELECT title, performer, date, startTime FROM shows");
	$donnees_shows = $result_shows->fetchAll();

//Exo 7
	$result7 = $pdo->query("SELECT * FROM clients");
	$exo7 = $result7->fetchAll();

	?>

	<!DOCTYPE html>
	<html>
	<head>
		<title>CRUD 1</title>
		<meta charset="utf-8">
	</head>
	<body>

		<h1>Exo CRUD 1</h1>

		<h2>1. Afficher tous les clients</h2>
		<?php

		displayAll($donnees_clients);
		echo "<br> <hr>";
		?>

		<h2>2. Afficher tous les types de spectacles possibles.</h2>

		<?php  

		displayAll($donnees_spectacleTypes);
		echo "<br> <hr>";

		?>

		<h2>
			3. Afficher les 20 premiers clients
		</h2>

		<?php 

		foreach ($donnees_clients as $key => $value) {
			foreach ($value as $keys => $values) {
				echo $values." ";
			}
			echo "<br>";
			if (++$exo3break == 20) {
				break;
			}
		}

		echo "<br> <hr>";

		?>


		<h2>
			4. Clients possédant une carte de fidélité
		</h2>
		<?php 

		displayAll($donnees_carteFidelite);
		echo "<br> <hr>";

		?>

		<h2>
			5. Nom commence par "M"
		</h2>

		<?php 

		foreach ($donnees_nameWithM as $value) {
			echo "Nom : ".$value["lastName"]."<br>"."Prénom : ".$value["firstName"];
			echo "<br> <br>";
		}

		echo "<br> <hr>";


		?>

		<h2>
			6. Affichage des shows
		</h2>

		<?php 

		foreach ($donnees_shows as $value) {
			echo $value["title"]." par ".$value["performer"].", le ".$value["date"]." à ".$value["startTime"].". <br>";
		}

		echo "<br> <hr>";


		 ?>

		 <h2>
		 	7. Tous les clients
		 </h2>

		 <?php foreach ($exo7 as $value) {

		 	if ($value["card"]==1) {		 		
		 	echo 
		 	"
		 		Nom : ".$value["lastName"]."<br>
		 		Prénom : ".$value["firstName"]."<br>
		 		Date de naissance : ".$value["birthDate"]."<br>Carte de fidélité : Oui <br>Numéro de carte : ".$value["cardNumber"]."<br><br>";

			}

			else {
				echo 
		 	"
		 		Nom : ".$value["lastName"]."<br>
		 		Prénom : ".$value["firstName"]."<br>
		 		Date de naissance : ".$value["birthDate"]."<br>Carte de fidélité : No <br><br>";

			}
		}

		 	?>

	</body>
	</html>