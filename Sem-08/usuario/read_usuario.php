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
$valores = "";

// Abrimos la conexión a la base de datos
$conn = conectar();

// Consulta a la base de datos
$sql = "SELECT idusuario, nombre, ape_paterno, ape_materno, direccion, email, telefono, password_u FROM usuario";

$result = mysqli_query($conn, $sql);

while($crow = mysqli_fetch_assoc($result)){

	$dat =$crow[0].'||'. $crow[1] .'||'. $crow[2].'||'.$crow[3];
	
	  $valores = $valores .'<tr>'.
	                         '<td>'.$crow['nombre'].'</td>'.
							 '<td>'.$crow['ape_paterno'].'</td>'.
							 '<td>'.$crow['ape_materno'].'</td>'.
							 '<td>'.$crow['direccion'].'</td>'.
							 '<td>'.$crow['email'].'</td>'.
							 '<td>'.$crow['telefono'].'</td>'.
							 '<td>'.$crow['password_u'].'</td>'.
							 '<td>'.
								'<i onclick="eliminar_form('.$crow['idusuario'].')" class="pe pe-7s-trash text-accent"></i>&nbsp;&nbsp;'.
							    '<i onclick="editar_form('.$crow['idusuario'].')" class="pe pe-7s-pen text-accent"></i>'.
							 '</td>'.
						   '</tr>';
}

// Cerramos la conexión a la base de datos
desconectar($conexion);

echo $valores;

?>