<?php
    $servidor = "localhost";
    $baseDatos = "agenciaviajes";
    $usuario = "developer";
    $pass = "developer";
    try {
        $con = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $pass);
        echo "Conectado correctamente";
        echo "</br>";
        $sql = "INSERT INTO turista (nombre, apellido1, apellido2, direccion, telefono) VALUES ('Pablo', 'de', 'Tarso', 'Damasco', '943105602')";
        $numClientes = $con -> exec($sql);
        $last_id = $con -> lastInsertId();
        echo "Se han insertado $numClientes cliente nuevo con el id: $last_id";
        $sql = "DELETE FROM turista WHERE id=2";
        $numClientesEliminados = $con -> exec($sql);
        echo "Se han borrado $numClientesEliminados cliente";
        $sql = "UPDATE turista SET nombre ='Caín', apellido1='ben', apellido2='Adam', direccion='Edén', telefono='010100001' WHERE id=10 OR id=4";
        $numeroClientesActualizados = $con -> exec($sql);
        echo "Se han actualizado $numeroClientesActualizados cliente";
    } catch (PDOException $e) {
        echo "Conexión fallida:" . $e->getMessage();
    }
    $con = null;
?>