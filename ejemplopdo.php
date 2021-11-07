<?php
    $servidor = "localhost";
    $baseDatos = "agenciaviajes";
    $usuario = "developer";
    $pass = "developer";
    try {
        $con = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $pass);
        echo "Conectado correctamente";
        echo "</br>";
        $sql = "SELECT * FROM turista";
        $turistas = $con -> query($sql);
        while ($turista = $turistas -> fetch()) {
            echo "El turista de nombre ", $turista["nombre"], " ", $turista["apellido1"], " ", $turista["apellido2"], " es de ", $turista["direccion"], "</br>";
        }
    } catch (PDOException $e) {
        echo "Conexión fallida:" . $e->getMessage();
    }
    $con = null;
?>