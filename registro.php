<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Registro</title>
</head>

<body>

<?php

 

	$nombre = $_POST['nombre'];
	$correo = $_POST['correo'];
	$usuario = $_POST['usuario'];
	$password = md5($_POST['contraseña']);

   
	
	include("conexion.php");

	
	$consulta = mysqli_query($conexion,  "INSERT INTO usuarios (nombre, correo, usuario, contraseña) VALUES('$nombre','$correo', '$usuario', '$password')");


	header("Location: registro.html");

?>	
    

</body>
</html>