<?php
    $servidor = "localhost";
    $baseDatos = "agenciaviajes";
    $usuario = "developer";
    $pass = "developer";
    try {
        $con = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $pass);
        echo "Conectado correctamente";
        echo "</br>";
        $correcto = 0;
        $numClientes = 0;
        $con -> beginTransaction();
        $sql = "INSERT INTO turista (nombre, apellido1, apellido2, direccion, telefono) VALUES ('Luis Adrián', 'Solís', 'Ramírez', 'Juarez', '648905312')";
        $numClientes += $con -> exec($sql);
        $last_id = $con -> lastInsertId();
        if ($last_id > 0) {
            $correcto += 1;
        }
        $sql = "INSERT INTO turista (nombre, apellido1, apellido2, direccion, telefono) VALUES ('Luis Andrés', 'Solís', 'Ramírez', 'Juarez', '642675392')";
        $numClientes += $con -> exec($sql);
        $last_id_2 = $con -> lastInsertId();
        if ($last_id > 0 && $last_id != $last_id_2 ) {
            $correcto += 1;
        }
        $sql = "INSERT INTO turista (nombre, apellido1, apellido2, direccion, telefono) VALUES ('Luis Gerardo', 'Solís', 'Ramírez', 'Juarez', '647085912')";
        $numClientes += $con -> exec($sql);
        $last_id_3 = $con -> lastInsertId();
        if ($last_id_3 > 0 && $last_id != $last_id_2 && $last_id_2 != $last_id_3 && $last_id != $last_id_3) {
            $correcto += 1;
        }
        if ($correcto != 3) {
            echo "Error no se han insertado los clientes";
            $con -> rollBack();
        } else {
            echo "Se han insertado $numClientes clientes nuevos";
            $con -> commit();
        }
    } catch (PDOException $e) {
        echo "Conexión fallida:" . $e->getMessage();
    }
    $con = null;
?>