<?php
	include 'conex.php';
	include 'contador.php';
?>

<!doctype html>
<html>
	<head>



<!--Creación del gráfico-->

		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    	<script type="text/javascript">
      	google.charts.load('current', {'packages':['corechart']});
      	google.charts.setOnLoadCallback(drawChart);

      	function drawChart() {

        	var data = google.visualization.arrayToDataTable([
	          ['Especialidad', 'Veces'];


	          <?php 
	          	while($chart = mysqli_fetch_assoc[$result]){
	          		echo "['".$chart['Especialidad']."', '".$chart[$EspecialidadVeces]."']"; //Agregar un contador de veces que se repite cada especialidad en una página oculta
	          	}
	          	
	          ?>

        	]);

        	var options = {
			title: 'Especialidades más solicitadas'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>


<!-- Codigo normal html-->
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
					<th>Localidad</th>
					<th>Dirección</th>
					<th>Altura</th>
					<th>Especialidad</th>
					<th>Fecha</th>
				</tr>

				<?php
					$sql="SELECT * FROM `datos`";
					$result=mysqli_query($conex,$sql);
					while($mostrar=mysqli_fetch_array($result)){
				?>

				<tr bgcolor="f9f9f9">
					<td><?php echo $mostrar['Localidad'] ?></td>
					<td><?php echo $mostrar['Dirección'] ?></td>
					<td><?php echo $mostrar['Altura'] ?></td>
					<td><?php echo $mostrar['Especialidad'] ?></td>
					<td><?php echo $mostrar['Fecha'] ?></td>
				</tr>

				<?php
					}
				?>
			</table>
		</div>

            

	</body>

</html>