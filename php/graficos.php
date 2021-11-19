<?php

include 'conex.php';

$sql1 = "SELECT Tipo AS Especialidad, COUNT(EspecialidadID) AS VecesEsp FROM especialidades INNER JOIN datos_pacientes ON EspecialidadID = EspecialidadID_FK GROUP BY EspecialidadID_FK";
$result1 = $conex->query($sql1);
$sql2 = "SELECT Nombre AS Localidad, COUNT(LocalidadID) AS VecesLoc FROM Localidad INNER JOIN datos_pacientes ON LocalidadID = LocalidadID_FK GROUP BY LocalidadID_FK";
$result2 = $conex->query($sql2);


?>



<html>
<head>
    <title>Gráficas</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);


    //Gráfica de Donut


    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Especialidad', 'Veces Consultada'],
            <?php
                while($row = $result1->fetch_assoc()) {
                    echo "['".$row["Especialidad"]."',".$row["VecesEsp"]."],";
                }

            ?>
        ]);

        var options = {
            title: 'Especialidades más consultadas',
            pieHole: 0.3,
        };

        var chart = new google.visualization.PieChart(document.getElementById('especialidades'));
        chart.draw(data, options);
    } </script>


    <script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Especialidad', 'Veces Consultada'],
            <?php
                while($row = $result2->fetch_assoc()) {
                    echo "['".$row["Localidad"]."',".$row["VecesLoc"]."],";
                }

            ?>
        ]);

        var options = {
            title: 'Localidades más consultadas',
            pieHole: 0.6,
        };

        var chart = new google.visualization.PieChart(document.getElementById('localidades'));
        chart.draw(data, options);
    }
    </script>



</head>
<body>
    <div id="especialidades" style="width: 700px; height: 500px; margin: 0 auto !important;"></div>
    <div id="localidades" style="width: 700px; height: 500px; margin: 0 auto !important;"></div>

</body>
</html>