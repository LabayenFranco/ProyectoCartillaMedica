<?php

    include "conex.php";

    $id = $_POST['ID'];

    $sql= "DELETE FROM datos_pacientes WHERE DatoID = $id";
    $conex->query($sql);

?>

<script>
    window.location.replace("https://cartilla-medica.000webhostapp.com/php/contenido.php");
</script>