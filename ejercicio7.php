<?php
    function creaConexion() {
        @$mysqli = new mysqli('localhost', 'developer', 'developer', 'agenciaviajes');
        $error = $mysqli->connect_errno;
        if ($error != null) {
            echo "<p>Error $error conectando a la base de datos:", mysqli_connect_error($mysqli),"</p>";
            exit();
        }
        return $mysqli;
    }
    function creaVuelo($mysqli, $origen, $destino, $fecha, $companya, $vuelo) {
        $sql = "INSERT INTO vuelos (origen, destino, fecha, companya, vuelo) VALUES (?, ?, ?, ?, ?)";
        $consulta = $mysqli->stmt_init();
        if($stmt = $mysqli->prepare($sql)){
            $stmt->bind_param("sssss", $origen, $destino, $fecha, $companya, $vuelo);
            $stmt->execute();
            if($stmt->execute()) {
                echo "Se han insertado ", mysqli_affected_rows($mysqli), " filas con éxito";
            } else {
                echo "Error en la inserción de filas </br>";
            }
            $stmt->close();
        }
    }
    function modificaDestino($mysqli, $destino_su, $id_su) {
        $sql = "UPDATE vuelos SET destino=? WHERE id=?";
        $consulta = $mysqli->stmt_init();
        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("si", $destino_su, $id_su);
            $stmt->execute();
            if($stmt->execute()) {
                echo "Se han actualizado ", mysqli_affected_rows($mysqli), " filas con éxito";
            } else {
                echo "Error en la actualización de filas";
            }
            $stmt->close();
        }
    }
    function modificaCompanya($mysqli, $companya_u2, $id_u2) {
        $sql = "UPDATE vuelos SET companya=? WHERE id=?";
        $consulta = $mysqli->stmt_init();
        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("si", $companya_u2, $id_u2);
            $stmt->execute();
            if($stmt->execute()) {
                echo "Se han actualizado ", mysqli_affected_rows($mysqli), " filas con éxito";
            } else {
                echo "Error en la actualización de filas";
            }
            $stmt->close();
        }
    }
    function eliminaVuelo($mysqli, $id_del) {
        $sql = "DELETE FROM vuelos WHERE id=?";
        $consulta = $mysqli->stmt_init();
        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("i", $id_del);
            $stmt->execute();
            if($stmt->execute()) {
                echo "Se han eliminado ", mysqli_affected_rows($mysqli), " filas con éxito";
            } else {
                echo "Error en la eliminación de filas";
            }
            $stmt->close();
        }
    }
    function extraeVuelos($mysqli) {
        $sql = "SELECT * FROM vuelos";
        $result = $mysqli->query($sql);
        return $result;
    }
    $mysqli->close();
?>