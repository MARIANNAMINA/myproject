<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM Employee WHERE id=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['name']) && isset($_POST['surname'])){
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$sql = 'UPDATE Employee SET name=:name, surname=:surname WHERE id=:id';
	$statement = $connection->prepare($sql);
	if ($statement->execute([':name' => $name, ':surname' => $surname, ':id' => $id]))
		
}
?>