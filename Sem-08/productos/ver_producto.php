<?php

include('../conexion/conexion.php');

// Obtenemos los valores del formulario
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$stock = $_POST['stock'];
$precio = $_POST['precio_venta'];
$valores = "";

// Abrimos la conexión a la base de datos
$conn = conectar();

// Consulta a la base de datos
$sql = "SELECT idproducto, nombre, descripcion, stock, precio_venta FROM producto";

$result = mysqli_query($conn, $sql);

while($crow = mysqli_fetch_assoc($result)){
	  $valores = $valores .'<tr>'.
	                         '<td>'.$crow['nombre'].'</td>'.
							 '<td>'.$crow['descripcion'].'</td>'.
							 '<td>'.$crow['stock'].'</td>'.
							 '<td>'.$crow['precio_venta'].'</td>'.
							 '<td>'.
								'<i onclick="eliminar_form('.$crow['idproducto'].')" class="pe pe-7s-trash text-accent"></i>&nbsp;&nbsp;'.
							    '<i onclick="editar_form('.$crow['idproducto'].')" class="pe pe-7s-pen text-accent"></i>'.
							 '</td>'.
						   '</tr>';
}

// Cerramos la conexión a la base de datos
desconectar($conexion);

echo $valores;

?>