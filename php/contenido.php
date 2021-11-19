<?php
	include 'conex.php';
?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Contenido</title>
		<link rel="stylesheet" href="../css/contenido.css">
		<link rel="preconnect" href="https://fonts.googleapis.com">
	    <link rel="preconnect" href="https://fonts.gstatic.com">
    	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
	</head>

	<body>
		<h1>Datos Recopilados de los Usuarios</h1>
		<div class="datos">
			<table border=".1" cellpadding="5px">
				<tr bgcolor="#aeaeae">
					<th>Nro</th>
					<th>Dirección</th>
					<th>Altura</th>
					<th>Especialidad</th>
					<th>Localidad</th>
					<th>Fecha</th>
				</tr>

				<?php
					$sql="SELECT d.DatoID AS Nro, d.Direccion AS Direccion, d.Altura AS Altura, e.Tipo AS Especialidad, l.Nombre AS Localidad, d.Fecha AS Fecha FROM datos_pacientes AS d JOIN especialidades AS e ON EspecialidadID_FK = EspecialidadID JOIN Localidad AS l On LocalidadID_FK = LocalidadID GROUP BY d.DatoID";
					$result=mysqli_query($conex,$sql);
					while($mostrar=mysqli_fetch_array($result)){
				?>

				<tr bgcolor="f9f9f9">
					<td><?php echo $mostrar['Nro'] ?></td>
					<td><?php echo $mostrar['Direccion'] ?></td>
					<td><?php echo $mostrar['Altura'] ?></td>
					<td><?php echo $mostrar['Especialidad'] ?></td>
					<td><?php echo $mostrar['Localidad'] ?></td>
					<td><?php echo $mostrar['Fecha'] ?></td>
				</tr>

				<?php
					}
				?>
			</table>
		</div> <br>
		<br>

        <button onclick="window.location='graficos.php';"> Ver las gráficas </button> <br>


		<form id="baja" method="POST" action="baja.php">
    		<h2>Para eliminar una consulta ingrese el número de ID de la misma</h2>
    		<label>ID: </label>
    		<input type="number" name="ID" required>
    		<input type="submit" name="send">
		</form>

	</body>

</html>