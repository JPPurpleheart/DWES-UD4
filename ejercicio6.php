<?php
    function creaConexion() {
        @$mysqli = mysqli_connect('localhost', 'developer', 'developer', 'agenciaviajes');
        $error = mysqli_connect_errno();
        if ($error != null) {
            echo "<p>Error $error conectando a la base de datos:", mysqli_connect_error($mysqli),"</p>";
            exit();
        }
        return $mysqli;
    }
    function creaVuelo($mysqli, $origen, $destino, $fecha, $companya, $vuelo) {
        $sql = "INSERT INTO vuelos (origen, destino, fecha, companya, vuelo) VALUES (?, ?, ?, ?, ?)";
        $consulta = mysqli_stmt_init($mysqli);
        if($stmt = mysqli_prepare($mysqli, $sql)){
            mysqli_stmt_bind_param($stmt, "sssss", $origen, $destino, $fecha, $companya, $vuelo);
            mysqli_stmt_execute($stmt);
            if(mysqli_stmt_execute($stmt)) {
                echo "Se han insertado ", mysqli_affected_rows($mysqli), " filas con éxito";
            } else {
                echo "Error en la inserción de filas </br>";
            }
            mysqli_stmt_close($stmt);
        }
    }
    function modificaDestino($mysqli, $destino_su, $id_su) {
        $sql = "UPDATE vuelos SET destino=? WHERE id=?";
        $consulta = mysqli_stmt_init($mysqli);
        if ($stmt = mysqli_prepare($mysqli, $sql)) {
            mysqli_stmt_bind_param($stmt, "si", $destino_su, $id_su);
            mysqli_stmt_execute($stmt);
            if(mysqli_stmt_execute($stmt)) {
                echo "Se han actualizado ", mysqli_affected_rows($mysqli), " filas con éxito";
            } else {
                echo "Error en la actualización de filas";
            }
            mysqli_stmt_close($stmt);
        }
    }
    function modificaCompanya($mysqli, $companya_u2, $id_u2) {
        $sql = "UPDATE vuelos SET companya=? WHERE id=?";
        $consulta = mysqli_stmt_init($mysqli);
        if ($stmt = mysqli_prepare($mysqli, $sql)) {
            mysqli_stmt_bind_param($stmt, "si", $companya_u2, $id_u2);
            mysqli_stmt_execute($stmt);
            if(mysqli_stmt_execute($stmt)) {
                echo "Se han actualizado ", mysqli_affected_rows($mysqli), " filas con éxito";
            } else {
                echo "Error en la actualización de filas";
            }
            mysqli_stmt_close($stmt);
        }
    }
    function eliminaVuelo($mysqli, $id_del) {
        $sql = "DELETE FROM vuelos WHERE id=?";
        $consulta = mysqli_stmt_init($mysqli);
        if ($stmt = mysqli_prepare($mysqli, $sql)) {
            mysqli_stmt_bind_param($stmt, "i", $id_del);
            mysqli_stmt_execute($stmt);
            if(mysqli_stmt_execute($stmt)) {
                echo "Se han eliminado ", mysqli_affected_rows($mysqli), " filas con éxito";
            } else {
                echo "Error en la eliminación de filas";
            }
            mysqli_stmt_close($stmt);
        }
    }
    function extraeVuelos($mysqli) {
        $sql = "SELECT * FROM vuelos";
        $result = mysqli_query($mysqli, $sql);
        return $result;
    }
    mysqli_close($mysqli);
?>