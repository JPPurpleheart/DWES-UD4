<?php
    $servidor = "localhost";
    $baseDatos = "agenciaviajes";
    $usuario = "developer";
    $pass = "developer";
    try {
        $con = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $pass);
        echo "Conectado correctamente";
        echo "</br>";
        $sql = "INSERT INTO turista (nombre, apellido1, apellido2, direccion, telefono) VALUES ('José Pablo', 'Machuca', 'González', 'Sevilla', '643005602')";
        $numClientes = $con -> exec($sql);
        $last_id = $con -> lastInsertId();
        echo "Se han insertado $numClientes cliente nuevo con el id: $last_id";
        $sql = "DELETE FROM turista WHERE id=1";
        $numClientesEliminados = $con -> exec($sql);
        echo "Se han borrado $numClientesEliminados cliente";
        $sql = "UPDATE turista SET nombre ='Carmen', apellido1='Rufo', apellido2='Palono', direccion='Sevilla', telefono='111111111' WHERE id=10 OR id=2";
        $numeroClientesActualizados = $con -> exec($sql);
        echo "Se han actualizado $numeroClientesActualizados cliente";
    } catch (PDOException $e) {
        echo "Conexión fallida:" . $e->getMessage();
    }
    $con = null;
?>
<!--
INSERT INTO `catalogo`(`titulo`, `autor`, `genero`, `paginas`, `precio`, `publicacion`, `portada`) VALUES ('','','','','','','')
-->