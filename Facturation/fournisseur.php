<?php 

//Faire le line avec le base de donnée
include "connection.php";

$sth = $pdo->query("
	SELECT societes.id_societe, societes.nom_societe, type.type
	FROM societes
	INNER JOIN type
	ON type.id_type = societes.id_type
	WHERE type.type = 'fournisseur'");
$clients = $sth->fetchAll(PDO::FETCH_ASSOC);	

?>

<!DOCTYPE html>
<html>
<head>
	<title>Fournisseur</title>
	<meta charset="utf-8">
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

	button {
		width: 100%;
	}
</style>
<body>
	<h1>Page fournisseur</h1>

	<table>
		<tr>
			<th>ID de la société</th>
			<th>Nom de la société</th>
			<th>Detail société</th>
		</tr>

		<?php 

		for ($i=0; $i < count($clients); $i++) { 
			echo "<tr>";
			foreach ($clients[$i] as $key => $value) {
				if ($key != "type") {
					echo "<td>".$value."</td>";
				}
			}
			echo "<td style='border: none;'><button name='linkToDetailFacture' class='detail' value='".$clients[$i]["id_societe"]."'onclick='linkToDetailSociete(this)'>Information détaillée</button></td>";
			echo "</tr>";			
		}

		?>

	</table>
	
	<script>
		function linkToDetailSociete (objButton) {
			var clicked = objButton.value;
			location.href = "detailsociete.php?detail="+clicked;
		}
	</script>
</body>
</html>