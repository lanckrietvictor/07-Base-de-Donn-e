<?php 

//Faire le line avec le base de donnée
include "connection.php";

//display five latest factures
$table_date = $pdo->query("SELECT * 
	FROM factures 
	ORDER BY date_facture DESC
	LIMIT 5");
$factures_sorted_by_date = $table_date->fetchAll(PDO::FETCH_ASSOC);

//display five latest persons
$table_persons = $pdo->query("
	SELECT factures.id_personne, factures.numero_facture, personnes.nom_personne, personnes.prenom_personne
	FROM factures
	INNER JOIN personnes
	ON factures.id_personne = personnes.id_personne
	ORDER BY date_facture DESC
	LIMIT 5");
$persons_sorted_by_date = $table_persons->fetchAll(PDO::FETCH_ASSOC);

//display five latest firms
$table_firms = $pdo->query("
	SELECT factures.id_societe, societes.nom_societe, factures.date_facture
	FROM factures
	INNER JOIN societes
	ON factures.id_societe = societes.id_societe
	ORDER BY factures.date_facture DESC
	LIMIT 5");
$societes_sorted_by_date = $table_firms->fetchAll(PDO::FETCH_ASSOC);


/*if(isset($_POST["submit"])) {        //used to fill up database
		stock($pdo);
	}

	function stock($pdo) {

		$nf = $pdo->quote($_POST["numero_facture"]);
		$df = $pdo->quote($_POST["date_facture"]);
		$idp = $pdo->quote($_POST["id_personne"]);
		$idc = $pdo->quote($_POST["id_societe"]);

			$sql = "INSERT INTO factures (numero_facture, date_facture, id_personne, id_societe) VALUES ($nf, $df, $idp, $idc)";

		$pdo->prepare($sql)->execute();
	}*/

?>

<!DOCTYPE html>
<html>
<head>
	<title>Facturation</title>
</head>
<style>
	table, th, tr, td {
		border: solid 1px black;
	}

	td {
		margin: auto;
		text-align: center;
	}

	table {
		width: 100%;
	}
</style>
<body>
	<h1>
		Facturation
	</h1>
	<p>
		Bonjour Jean-Christian!
	</p>

	<h2>5 dernières factures</h2>

	<div id="test">
	</div>
	
	<table>
	<tr>
		<th>ID de la facture</th>
		<th>Numéro de la facture</th>
		<th>Date de la facture</th>
		<th>ID de la personne</th>
		<th>ID de la société</th>
	</tr>

	<?php 

	for ($i=0; $i < 5; $i++) { 

		foreach ($factures_sorted_by_date[$i] as $key => $value) {
			echo "<td>".$value."</td>";
		}

		echo "<td style='border: none;'><button name='linkToDetailFacture' class='detail' value='".$factures_sorted_by_date[$i]["id_facture"]."'onclick='linkToDetailFacture(this)'>Information détaillée</button></td>";

		echo "</tr>";
	}

	?>

	</table>

	<h2>5 dernières personnes</h2>

	<table>
	<tr>
		<th>ID de la personne</th>
		<th>Nom de la personne</th>
		<th>Prénom de la personne</th>
		<th>Date de la facture</th>

	<?php 

	for ($i=0; $i < count($persons_sorted_by_date); $i++) { 
		echo "<tr>";
		foreach ($persons_sorted_by_date[$i] as $key => $value) {
			echo "<td>".$value."</td>";
		}

		echo "<td style='border: none;'><button name='linkToDetailPerson' class='detail' value='".$persons_sorted_by_date[$i]["id_personne"]."'onclick='linkToDetailPerson(this)'>Information détaillée</button></td>";

		echo "</tr>";
	}

	?>

	</table>

	<h2>5 dernières sociétés</h2>

	<table>
	<tr>
		<th>ID de la société</th>
		<th>Nom de la société</th>
		<th>Date de la facture</th>

	<?php 

	for ($i=0; $i < count($societes_sorted_by_date); $i++) { 
		echo "<tr>";
		foreach ($societes_sorted_by_date[$i] as $key => $value) {
			echo "<td>".$value."</td>";
		}

		echo "<td style='border: none;'><button name='linkToDetailSociete' class='detail' value='".$societes_sorted_by_date[$i]["id_societe"]."'onclick='linkToDetailSociete(this)'>Information détaillée</button></td>";

		echo "</tr>";
	}

	?>

	</table>


	
	<!--<form action="index.php" method="post"> 
			numero_facture: <input type="text" name="numero_facture">
			<br>
			date: <input type="date" name="date_facture">
			<br>
			id_personne: <input type="number" name="id_personne">
			<br>
			id_societe: <input type="number" name="id_societe">
			<input type="submit" name="submit">
		</form>-->

	<script>
		function linkToDetailFacture (objButton) {
			var clicked = objButton.value;
			location.href = "detailfacture.php?detail="+clicked;
		}

		function linkToDetailPerson (objButton) {
			var clicked = objButton.value;
			location.href = "detailcontact.php?detail="+clicked;
		}

		function linkToDetailSociete (objButton) {
			var clicked = objButton.value;
			location.href = "detailsociete.php?detail="+clicked;
		}
	</script>
</html>