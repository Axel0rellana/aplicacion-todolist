<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "todolist";

try{
	$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
}catch(PDOException $e){
	echo "Error de conexion: ".$e->getMessage();
}

if(isset($_POST['agregar_tarea'])){
	$tarea = $_POST['tarea'];
	$sql = "INSERT INTO tareas (tarea) VALUES (:tarea)";
	$consulta = $conn->prepare($sql);
	$consulta->bindParam(":tarea", $tarea);
	$consulta->execute();
	header('location:index.php');
}

if(isset($_POST['id'])){
	$id = $_POST['id'];
	$completado = (isset($_POST['completado'])) ? 1 : 0;
	$sql = "UPDATE tareas SET completado=:completado WHERE id=:id";
	$consulta = $conn->prepare($sql);
	$consulta->bindParam(":completado", $completado);
	$consulta->bindParam(":id", $id);
	$consulta->execute();
	header('location:index.php');
}

if(isset($_GET['id'])){
	$id = $_GET['id'];
	$sql = "DELETE FROM tareas WHERE id=:id";
	$consulta = $conn->prepare($sql);
	$consulta->bindParam(":id", $id);
	$consulta->execute();
	header('location:index.php');
}

$sql = "SELECT * FROM tareas";
$registros = $conn->query($sql);

?>