<?php

include('../conexion/conexion.php');

// Obtenemos los valores del formulario
$nombre = $_POST['nombre'];
$ape_paterno = $_POST['ape_paterno'];
$ape_materno = $_POST['ape_materno'];
$direccion = $_POST['direccion'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$constraseña = $_POST['password_u'];


// Abrimos la conexión a la base de datos
$conn = conectar();

// Consulta a la base de datos
$sql = "INSERT INTO usuario (nombre, ape_paterno, ape_materno, direccion, email, telefono, password_u) VALUES ('".$nombre."', '".$ape_paterno."', '".$ape_materno."', '".$direccion."', '".$email."', '".$telefono."', '".$constraseña."')";

$result = mysqli_query($conn, $sql);


$msg = 'Usuario '.$nombre.' '.$ape_paterno.' '.$ape_materno.' registrado exitosamente!';

// Cerramos la conexión a la base de datos
desconectar($conexion);

echo $msg;

?>