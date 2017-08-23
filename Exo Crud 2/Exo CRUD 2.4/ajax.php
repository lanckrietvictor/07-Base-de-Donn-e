<?php 

//Faire le line avec le base de donnée
include "connection.php";

$ln = $pdo->quote($_GET["lastName"]);

echo $ln;
echo "Hello world";


//retrieve data from table
$result_clients = $pdo->prepare("SELECT * FROM clients WHERE lastName = {$ln}");
$result_clients->execute();
$clients = $result_clients->fetchAll(pdo::FETCH_OBJ);


foreach ($clients as $key => $value) {
			foreach ($value as $keys => $values) {
				echo $values." ";
			}
		}

?>