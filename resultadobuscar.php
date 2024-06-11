<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" >
  <title>Resultados</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Agregamos Font Awesome para obtener el icono de hamburguesa -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=League+Gothic&display=swap"> <!-- Agregamos la fuente League Gothic -->
  
</head>


 <?php
	include('conexion.php');

	$buscar = $_POST['buscar'];
	echo "Su consulta: <em>".$buscar."</em><br>";

	$consulta = mysqli_query($conexion, "SELECT * FROM artistas WHERE nombre LIKE '%$buscar%' ");
?>


	<?php
		$nros=mysqli_num_rows($consulta);
		echo $nros;
	?>

    
	<?php
		while($resultados=mysqli_fetch_array($consulta)) {
	?>
    <p>
    <?php	
			echo $resultados['nombre'];
			echo $resultados['bio'];
	?>
    </p>
    <hr/>
    <?php
		}

		mysqli_free_result($consulta);
		mysqli_close($conexion);

	?>

 

</html>
