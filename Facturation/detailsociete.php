<?php 

//Faire le line avec le base de donnée
include "connection.php";

$idf = $_GET["detail"];		//Recuperate id of the person from url

$sth = $pdo->query("
	SELECT societes.*,  type.type
	FROM societes 
	INNER JOIN type
	ON type.id_type = societes.id_type
	WHERE societes.id_societe = ".$idf);
$societes = $sth->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Societes</title>
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
	<?php  

	echo  "<h1> Les données de ".$societes[0]["nom_societe"]."</h1>";						//Make title personalised for each 								society by id

	?>
	
	<table>
		<tr>
			<th>ID de la société</th>
			<th>Nom de la société</th>
			<th>Adresse de la société</th>
			<th>Numéro téléphone de la société</th>
			<th>TVA de la société</th>
			<th>Type de la société</th>
		</tr>

		<?php 

		echo "<tr>";

		foreach ($societes[0] as $key => $value) {
			echo "<td>".$value."</td>";		//Table with all data 									on one person
		}

		echo "<tr>";

		?>

	</table>

</body>
</html>