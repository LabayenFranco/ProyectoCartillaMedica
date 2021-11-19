<?php
    include ("php/conex.php");
    $getLoc = "SELECT LocalidadID, Nombre FROM Localidad";
    $getLoc2 = mysqli_query($conex,$getLoc);
    $getEsp = "SELECT EspecialidadID, Tipo FROM especialidades";
    $getEsp2 = mysqli_query($conex,$getEsp);
?>




<!DOCTYPE html>
<html lang="es">
<head>
	<title>Cartilla Médica</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
</head>
<body>
	<div class="content">
		<h1>Bienvenid@</h1>
		<h3>Ingresá los datos requeridos por favor</h3>
		<form method="POST" action="php/form.php">
			<label>Localidad: </label>
			<select name="localidad">


        <?php
            while ($row = mysqli_fetch_array($getLoc2)){
                $nombre = $row['Nombre'];
                $locid = $row['LocalidadID'];
        ?>
        <option value="<?php echo $locid; ?>"> <?php echo $nombre; ?> </option>
        <?php } ?>


			</select> <br>
			<label>Dirección: </label>
			<input type="text" name="calle" placeholder="Calle" required>
			<input type="number" name="altura" placeholder="Altura" required> <br>
			<label>Especialidad: </label>
			<select name="especialidad" placeholder="Especialidad">

            <?php
            while ($row = mysqli_fetch_array($getEsp2)){
                $Especialidad = $row['Tipo'];
                $EspecialidadID = $row['EspecialidadID'];
        ?>
        <option value="<?php echo $EspecialidadID; ?>"> <?php echo $Especialidad; ?> </option>
        <?php } ?>

			</select> <br>
			<input type="submit" name="send">
		</form>
	</div>
</body>
</html>