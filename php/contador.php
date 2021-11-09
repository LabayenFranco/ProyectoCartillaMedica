<?php

	include 'conex.php';

	$sql="SELECT especialidad, COUNT(Especialidad) Veces FROM datos group by especialidad";
	$result=mysqli_query($conex,$sql);
    $mostrar=mysqli_fetch_array($result);
    array_push($mostrar, "a");

    $i=0;
    while($i<6){
		echo $mostrar[$i];
		$i++;
	} 


//PROBABLEMENTE necesite otra tabla para esto, diferentes variables para diferentes resultados



	//http://www-db.deis.unibo.it/courses/TW/DOCS/w3schools/sql/sql_func_count.asp.html
	//https://developers.google.com/chart/interactive/docs/gallery/piechart
	//https://social.msdn.microsoft.com/Forums/es-ES/6aa42b11-5446-4aeb-ae11-aee6d654604b/contar-las-veces-que-se-repite-un-campo-en-una-tabla?forum=sqlserveres
?>