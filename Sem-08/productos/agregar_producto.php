<?php

include('../conexion/conexion.php');

// Obtenemos los valores del formulario
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$stock = $_POST['stock'];
$precio = $_POST['precio_venta'];



// Abrimos la conexión a la base de datos
$conn = conectar();

// Consulta a la base de datos
$sql = "INSERT INTO producto (nombre, descripcion, stock, precio_venta) VALUES ('".$nombre."', '".$descripcion."', '".$stock."', '".$precio."')";

$result = mysqli_query($conn, $sql);


$msg = 'Producto '.$nombre.' registrado!';

// Cerramos la conexión a la base de datos
desconectar($conexion);

echo $msg;

?>