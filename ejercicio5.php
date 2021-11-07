<?php
    @$mysqli = mysqli_connect('localhost', 'developer', 'developer', 'agenciaviajes');
    $error = mysqli_connect_errno();
    if ($error != null) {
        echo "<p>Error $error conectando a la base de datos:", mysqli_connect_error($mysqli),"</p>";
        exit();
    }
    echo "</br>";
    $result = mysqli_query($mysqli, "INSERT INTO `vuelos` (origen, destino, fecha, companya, vuelo) VALUES ('Casablanca', 'Paris', '2021-10-21 09:16:52', 'IberAirlines', 'A353')");
    if($result == false) {
        echo "La consulta ha fallado";
    } else {
        echo " Se han insertado ", mysqli_affected_rows($mysqli), " filas con éxito";
    }
    echo "</br>";
    $result = mysqli_query($mysqli, "UPDATE `vuelos` SET origen='Jerusalem' WHERE id=7");
    if($result == false) {
        echo "La consulta ha fallado";
    } else {
        echo " Se han actualizado ", mysqli_affected_rows($mysqli), " filas con éxito";
    }
    echo "</br>";
    $result = mysqli_query($mysqli, "DELETE FROM `vuelos` WHERE destino ='Ber-seeba'");
    if($result == false) {
        echo "La consulta ha fallado";
    } else {
        echo " Se han borrado ", mysqli_affected_rows($mysqli), " filas con éxito";
    }
    mysqli_close($mysqli);
?>