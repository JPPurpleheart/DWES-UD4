<?php
echo "<h1>Ejercicio 8</h1>";
    $servidor = "localhost";
    $baseDatos = "agenciaviajes";
    $usuario = "developer";
    $pass = "developer";
    try {
        $con = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $pass);
        $sql = "SELECT * FROM turista";
        $turistas = $con -> query($sql);
        echo "<h2>A. Tabla con PDO::FETCH_ASSOC</h2>";
        echo "<table border=1px solid black>";
            echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>Nombre</th>";
                echo "<th>Apellido 1</th>";
                echo "<th>Apellido 2</th>";
                echo "<th>Dirección</th>";
                echo "<th>Teléfono</th>";
            echo "</tr>";
            while ($turista_as = $turistas -> fetch(PDO::FETCH_ASSOC)) {
                $id = $turista_as["id"];
                $nombre = $turista_as["nombre"];
                $apellido1 = $turista_as["apellido1"];
                $apellido2 = $turista_as["apellido2"];
                $direccion = $turista_as["direccion"];
                $telefono = $turista_as["telefono"];
                echo "<tr>";
                    echo "<td>", $id, "</td>";
                    echo "<td>", $nombre, "</td>";
                    echo "<td>", $apellido1, "</td>";
                    echo "<td>", $apellido2, "</td>";
                    echo "<td>", $direccion, "</td>";
                    echo "<td>", $telefono, "</td>";
                echo "</tr>";
            }
        echo "</table>";
    } catch (PDOException $e) {
        echo "Conexión fallida:" . $e->getMessage();
    }
    $con = null;
    echo "</br>";
    echo "<hr>";
    try {
        $con = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $pass);
        $sql = "SELECT * FROM turista";
        $turistas = $con -> query($sql);
        echo "<h2>B. Tabla con PDO::FETCH_NUM</h2>";
        echo "<table border=1px solid black>";
            echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>Nombre</th>";
                echo "<th>Apellido 1</th>";
                echo "<th>Apellido 2</th>";
                echo "<th>Dirección</th>";
                echo "<th>Teléfono</th>";
            echo "</tr>";
            while ($turista_nu = $turistas -> fetch(PDO::FETCH_NUM)) {
                $id = $turista_nu[0];
                $nombre = $turista_nu[1];
                $apellido1 = $turista_nu[2];
                $apellido2 = $turista_nu[3];
                $direccion = $turista_nu[4];
                $telefono = $turista_nu[5];
                echo "<tr>";
                    echo "<td>", $id, "</td>";
                    echo "<td>", $nombre, "</td>";
                    echo "<td>", $apellido1, "</td>";
                    echo "<td>", $apellido2, "</td>";
                    echo "<td>", $direccion, "</td>";
                    echo "<td>", $telefono, "</td>";
                echo "</tr>";
            }
        echo "</table>";
    } catch (PDOException $e) {
        echo "Conexión fallida:" . $e->getMessage();
    }
    $con = null;
    echo "</br>";
    echo "<hr>";
    try {
        $con = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $pass);
        $sql = "SELECT * FROM turista";
        $turistas = $con -> query($sql);
        echo "<h2>C. Tabla con PDO::FETCH_BOTH</h2>";
        echo "<table border=1px solid black>";
            echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>Nombre</th>";
                echo "<th>Apellido 1</th>";
                echo "<th>Apellido 2</th>";
                echo "<th>Dirección</th>";
                echo "<th>Teléfono</th>";
            echo "</tr>";
            while ($turista_bo = $turistas -> fetch(PDO::FETCH_BOTH)) {
                $id = $turista_bo["id"];
                $nombre = $turista_bo["nombre"];
                $apellido1 = $turista_bo["apellido1"];
                $apellido2 = $turista_bo["apellido2"];
                $direccion = $turista_bo["direccion"];
                $telefono = $turista_bo["telefono"];
                echo "<tr>";
                    echo "<td>", $id, "</td>";
                    echo "<td>", $nombre, "</td>";
                    echo "<td>", $apellido1, "</td>";
                    echo "<td>", $apellido2, "</td>";
                    echo "<td>", $direccion, "</td>";
                    echo "<td>", $telefono, "</td>";
                echo "</tr>";
            }
    echo "</table>";
    } catch (PDOException $e) {
        echo "Conexión fallida:" . $e->getMessage();
    }
    $con = null;
    echo "</br>";
    echo "<hr>";
    try {
        $con = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $pass);
        $sql = "SELECT * FROM turista";
        $turistas = $con -> query($sql);
        echo "<h2>D. Tabla con PDO::FETCH_OBJ</h2>";
        echo "<table border=1px solid black>";
            echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>Nombre</th>";
                echo "<th>Apellido 1</th>";
                echo "<th>Apellido 2</th>";
                echo "<th>Dirección</th>";
                echo "<th>Teléfono</th>";
            echo "</tr>";
            while ($turista_ob = $turistas -> fetch(PDO::FETCH_OBJ)) {
                $id = $turista_ob -> id;
                $nombre = $turista_ob -> nombre;
                $apellido1 = $turista_ob -> apellido1;
                $apellido2 = $turista_ob -> apellido2;
                $direccion = $turista_ob -> direccion;
                $telefono = $turista_ob -> telefono;
                echo "<tr>";
                    echo "<td>", $id, "</td>";
                    echo "<td>", $nombre, "</td>";
                    echo "<td>", $apellido1, "</td>";
                    echo "<td>", $apellido2, "</td>";
                    echo "<td>", $direccion, "</td>";
                    echo "<td>", $telefono, "</td>";
                echo "</tr>";
            }
        echo "</table>";
    } catch (PDOException $e) {
        echo "Conexión fallida:" . $e->getMessage();
    }
    $con = null;
    echo "</br>";
    echo "<hr>";
    try {
        $con = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $pass);
        $sql = "SELECT * FROM turista";
        $turistas = $con -> query($sql);
        echo "<h2>E. Tabla con PDO::FETCH_LAZY</h2>";
        echo "<table border=1px solid black>";
            echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>Nombre</th>";
                echo "<th>Apellido 1</th>";
                echo "<th>Apellido 2</th>";
                echo "<th>Dirección</th>";
                echo "<th>Teléfono</th>";
            echo "</tr>";
            while ($turista_la = $turistas -> fetch(PDO::FETCH_LAZY)) {
                $id = $turista_la["id"];
                $nombre = $turista_la["nombre"];
                $apellido1 = $turista_la["apellido1"];
                $apellido2 = $turista_la["apellido2"];
                $direccion = $turista_la["direccion"];
                $telefono = $turista_la["telefono"];
                echo "<tr>";
                    echo "<td>", $id, "</td>";
                    echo "<td>", $nombre, "</td>";
                    echo "<td>", $apellido1, "</td>";
                    echo "<td>", $apellido2, "</td>";
                    echo "<td>", $direccion, "</td>";
                    echo "<td>", $telefono, "</td>";
                echo "</tr>";
            }
    echo "</table>";
    } catch (PDOException $e) {
        echo "Conexión fallida:" . $e->getMessage();
    }
    $con = null;
    echo "</br>";
    echo "<hr>";
    try {
        $con = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $pass);
        $sql = "SELECT * FROM turista";
        $turistas = $con -> prepare($sql);
        $turistas -> execute();
        $turistas -> bindColumn('id', $id);
        $turistas -> bindColumn('nombre', $nombre);
        $turistas -> bindColumn('apellido1', $apellido1);
        $turistas -> bindColumn('apellido2', $apellido2);
        $turistas -> bindColumn('direccion', $direccion);
        $turistas -> bindColumn('telefono', $telefono);
        echo "<h2>F. Tabla con PDO::FETCH_BOUND</h2>";
        echo "<table border=1px solid black>";
            echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>Nombre</th>";
                echo "<th>Apellido 1</th>";
                echo "<th>Apellido 2</th>";
                echo "<th>Dirección</th>";
                echo "<th>Teléfono</th>";
            echo "</tr>";
            while ($turista = $turistas -> fetch(PDO::FETCH_BOUND)) {
                $datos = $id . "\t" . $nombre . "\t" . $apellido1 . "\t" . $apellido2 . "\t" . $direccion . "\t" . $telefono . "\n";
                echo "<tr>";
                echo "<td>", $id, "</td>";
                echo "<td>", $nombre, "</td>";
                echo "<td>", $apellido1, "</td>";
                echo "<td>", $apellido2, "</td>";
                echo "<td>", $direccion, "</td>";
                echo "<td>", $telefono, "</td>";
                echo "</tr>";
            }
        echo "</table>";
    } catch (PDOException $e) {
        echo "Conexión fallida:" . $e->getMessage();
    }
    $con = null;
?>