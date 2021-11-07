<?php
    
    //Función que crea la conexión con la base de datos de agenciaviajes y devuelve la conexión creada para su uso en otras funciones.
    function creaConexion() {
        $con = null;
        //Probamos a conectar a la base de datos con try y si conecta correctamente realizamos el resto de funciones para operar con la tabla turista.
        try {
        
            //Definimos los párametros de la conexión con la base de datos.
            $servidor = "localhost";
            $baseDatos = "agenciaviajes";
            $usuario = "developer";
            $pass = "developer";

            //Intentamos la conexión con la base de datos utilizando los parámetros.
            $con = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $pass);
        
        //Si la conexión falla lanzamos un mensaje de error en base a una PDOException que se captura dentro del catch.
        } catch (PDOException $e) {
            echo "Conexión fallida:" . $e->getMessage();
        }

        //Devolvemos la conexión.
        return $con;
    }

    //Función que añade un turista a la tabla turista y devuelve el id del turista creado.
    function creaTurista($con, $nombre, $apellido1, $apellido2, $direccion, $telefono) {

        //Preparamos la consulta INSERT.
        $sql = $con -> prepare("INSERT INTO turista (nombre, apellido1, apellido2, direccion, telefono) VALUES (:nombre, :apellido1, :apellido2, :direccion, :telefono)");

        //Pasamos los párametros a la consulta.
        $sql -> bindParam(":nombre", $nombre);
        $sql -> bindParam(":apellido1", $apellido1);
        $sql -> bindParam(":apellido2", $apellido2);
        $sql -> bindParam(":direccion", $direccion);
        $sql -> bindParam(":telefono", $telefono);
        
        //Ejecutamos la consulta.
        $sql -> execute();

        //Si todo fue bien pedimos el último id.
        $last_id = $con -> lastInsertId();
        
        //Devolvemos el id.
        return $last_id;
    }

    //Función que devuelve una sola fila de la tabla turista con los datos de un turista en función de su id concreto.
    function extraeTurista($con, $id) {
        
        //Preparamos la consulta.
        $sql = $con -> prepare("SELECT * FROM turista WHERE `id` = :id");
        
        //Pasamos el id a la consulta.
        $sql -> bindParam(":id", $id);

        //Ejecutamos la consulta.
        $sql -> execute();

        //Mientras haya filas seleccionables las almacenamos en una variable
        while ($select = $sql -> fetch(PDO::FETCH_BOTH)) {

            //Devolvemos el resultado de la consulta.
            return $select;

        }

    }

    //Función que devuelve un array con todos los datos de los turistas de la tabla turista.
    function extraeTuristas($con) {
                    
        //Preparamos la consulta.
        $sql = $con -> prepare("SELECT * FROM turista");
        
        //Ejecutamos la consulta.
        $sql -> execute();

        //Creamos el array a devolver y un índice para rellenar el array.
        $i = 0;
        $select = array();

        //Mientras haya filas seleccionables las almacenamos en una variable
        while ($fila = $sql -> fetch(PDO::FETCH_BOTH)) {

            //Poblamos el array  a devolver con las filas devueltas.
            $select[$i] = $fila;

            //Aumentamos el índice.
            $i ++;

        }

        //Devolvemos el resultado de la consulta.
        return $select;

    }

    //Función que permite modificar la dirección de un turista y el teléfono del mismo en función de su id concreto y devuelve true si fue modificado.
    function actualizaTurista($con, $direccion, $telefono, $id) {
        
        //Creamos la variable a devolver inicializándola a false.
        $actualizado = false;

        //Preparamos la consulta.
        $sql = $con -> prepare("UPDATE turista SET `direccion`=:direccion, `telefono`=:telefono WHERE `id`=:id");

        //Pasamos los párametros a la consulta.
        $sql -> bindParam(":direccion", $direccion);
        $sql -> bindParam(":telefono", $telefono);
        $sql -> bindParam(":id", $id);

        //Ejecutamos la consulta.
        $sql -> execute();

        //Si la consulta se a realizado ponemos la variable a devolver a true.
        if ($sql -> execute()) {
            $actualizado = true;
        } else {
            $actualizado = "Error actualizando la tabla.";
        }

        //Devolvemos el resultado de la consulta.
        return $actualizado;

    }

    //Función que elimina un turista según su id concreto y no devuelve nada.
    function eliminaTurista($con, $id) {

        //Preparamos la consulta.
        $sql = $con -> prepare("DELETE FROM turista WHERE `id`=:id");

        //Pasamos los párametros a la consulta.
        $sql -> bindParam(":id", $id);

        //Ejecutamos la consulta.
        $sql -> execute();

    }

    echo "<h1>Ejercicio 11: CRUD con PDO<h1>";

    echo "<h3>Crea Conexión<h3>";
    
    //Crea la conexión
    $con = creaConexion();

    echo "Se ha creado la conexión";

    echo "<hr>";

    echo "<h3>Crea Turista<h3>";
    
    //Paso los parametros de creación del turista
    $nombre = "Javier";
    $apellido1 = "Martínez";
    $apellido2 = "Pérez";
    $direccion = "Segovia";
    $telefono = 508098307;
    
    //Creo el turista
    $id = creaTurista($con, $nombre, $apellido1, $apellido2, $direccion, $telefono);
    
    //Muestro el id
    echo $id;
    echo "<hr>";

    echo "<h3>Extrae Turista por ID<h3>";
    
    //Paso el id de extracción
    $id= 2;

    //Extraigo el turista
    $select = extraeTurista($con, $id);

    //Muestro el turista
    echo var_dump($select);
    echo "<hr>";

    echo "<h3>Extrae Turistas<h3>";
    
    //Extraigo toda la tabla
    $select = extraeTuristas($con);

    //Muestro los datos
    echo var_dump($select);
    echo "<hr>";
    
    echo "<h3>Actualiza dirección y teléfono del Turista por ID<h3>";

    //Paso los parametros de actualización
    $direccion = "Sevilla";
    $telefono = 619129417;
    $id = 15;

    //Actualizo el turista
    $actualizado = actualizaTurista($con, $direccion, $telefono, $id);
    
    //Muestro true si se actualizó
    echo var_dump($actualizado);
    
    echo "<hr>";

    echo "<h3>Elimina Turista con ID<h3>";

    //Paso el id de eliminación
    $id = 4;
    
    //Elimino el turista
    eliminaTurista($con, $id);
    
    echo "Se eliminó el turista con id: $id";

?>

<!-- UPDATE catalogo `precio`= WHERE `id`= -->