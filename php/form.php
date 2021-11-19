<?php
	include 'conex.php';

	$localidad = $_POST['localidad'];
	$calle = $_POST['calle'];
	$altura = $_POST['altura'];
	$especialidad = $_POST['especialidad'];


    $consulta= "INSERT INTO datos_pacientes(Direccion, Altura, EspecialidadID_FK, LocalidadID_FK) VALUES ('$calle', '$altura', '$especialidad', '$localidad')";
    
    
    $resultado = mysqli_query($conex,$consulta);

?>

<script>
    window.location.replace("https://cartilla-medica.000webhostapp.com/php/mapa.php");
</script>