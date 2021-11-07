<?php
    echo "<h1>Ejercicio 4: Muestra tabuladamente los datos de la Tabla vuelos de la Base de Datos agenciaviajes</h1>";
    @$mysqli = mysqli_connect('localhost', 'developer', 'developer', 'agenciaviajes');
    $error = mysqli_connect_errno();
    if ($error != null) {
        echo "<p>Error $error conectando a la base de datos:", mysqli_connect_error($mysqli),"</p>";
        exit();
    }
    $result = mysqli_query($mysqli, "SELECT * FROM `vuelos`");
    if($result == false){
        echo "La consulta ha fallado";
    }
    else{
        echo "<h2>A. Tabla con msqli_fetch_assoc</h2>";
        echo "<table border=1px solid black>";
            echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>Origen</th>";
                echo "<th>Destino</th>";
                echo "<th>Fecha</th>";
                echo "<th>Compañía</th>";
                echo "<th>Vuelo</th>";
            echo "</tr>";
            while($fila_as = mysqli_fetch_assoc($result)){
                $id = $fila_as["id"];
                $origen = $fila_as["origen"];
                $destino = $fila_as["destino"];
                $fecha = $fila_as["fecha"];
                $companya = $fila_as["companya"];
                $vuelo = $fila_as["vuelo"];
                echo "<tr>";
                    echo "<td>", $id, "</td>";
                    echo "<td>", $origen, "</td>";
                    echo "<td>", $destino, "</td>";
                    echo "<td>", $fecha, "</td>";
                    echo "<td>", $companya, "</td>";
                    echo "<td>", $vuelo, "</td>";
                echo "</tr>";
            }
        echo "</table>";
    }
    if(!mysqli_close($mysqli)){
        echo "Error al finalizar la conexión";
        mysqli_close($mysqli);
    }
    @$mysqli = mysqli_connect('localhost', 'developer', 'developer', 'agenciaviajes');
    $error = mysqli_connect_errno();
    if ($error != null) {
        echo "<p>Error $error conectando a la base de datos:", mysqli_connect_error($mysqli),"</p>";
        exit();
    }
    $result = mysqli_query($mysqli, "SELECT * FROM `vuelos`");
    if($result == false){
        echo "La consulta ha fallado";
    }
    else{
        echo "<h2>B. Tabla con msqli_fetch_object</h2>";
        echo "<table border=1px solid black>";
            echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>Origen</th>";
                echo "<th>Destino</th>";
                echo "<th>Fecha</th>";
                echo "<th>Compañía</th>";
                echo "<th>Vuelo</th>";
            echo "</tr>";
            while($fila_ob = mysqli_fetch_object($result)){
                echo "<tr>";
                    echo "<td>";
                    printf ("%s", $fila_ob->id);
                    echo "</td>";
                    echo "<td>";
                    printf ("%s", $fila_ob->origen);
                    echo "</td>";
                    echo "<td>";
                    printf ("%s", $fila_ob->destino);
                    echo "</td>";
                    echo "<td>";
                    printf ("%s", $fila_ob->fecha);
                    echo "</td>";
                    echo "<td>";
                    printf ("%s", $fila_ob->companya);
                    echo "</td>";
                    echo "<td>";
                    printf ("%s", $fila_ob->vuelo);
                    echo "</td>";
                echo "</tr>";
            }
        echo "</table>";
    }
    if(!mysqli_close($mysqli)){
        echo "Error al finalizar la conexión";
        mysqli_close($mysqli);
    }
    @$mysqli = mysqli_connect('localhost', 'developer', 'developer', 'agenciaviajes');
    $error = mysqli_connect_errno();
    if ($error != null) {
        echo "<p>Error $error conectando a la base de datos:", mysqli_connect_error($mysqli),"</p>";
        exit();
    }
    $result = mysqli_query($mysqli, "SELECT * FROM `vuelos`");
    if($result == false){
        echo "La consulta ha fallado";
    }
    else{
        echo "<h2>C. Tabla con msqli_fetch_array</h2>";
        echo "<table border=1px solid black>";
            echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>Origen</th>";
                echo "<th>Destino</th>";
                echo "<th>Fecha</th>";
                echo "<th>Compañía</th>";
                echo "<th>Vuelo</th>";
            echo "</tr>";
            while($fila_ar = mysqli_fetch_array($result)){
                $id = $fila_ar["id"];
                $origen = $fila_ar["origen"];
                $destino = $fila_ar["destino"];
                $fecha = $fila_ar["fecha"];
                $companya = $fila_ar["companya"];
                $vuelo = $fila_ar["vuelo"];
                echo "<tr>";
                    echo "<td>", $id, "</td>";
                    echo "<td>", $origen, "</td>";
                    echo "<td>", $destino, "</td>";
                    echo "<td>", $fecha, "</td>";
                    echo "<td>", $companya, "</td>";
                    echo "<td>", $vuelo, "</td>";
                echo "</tr>";
            }
        echo "</table>";
    }
    if(!mysqli_close($mysqli)){
        echo "Error al finalizar la conexión";
        mysqli_close($mysqli);
    }
    @$mysqli = mysqli_connect('localhost', 'developer', 'developer', 'agenciaviajes');
    $error = mysqli_connect_errno();
    if ($error != null) {
        echo "<p>Error $error conectando a la base de datos:", mysqli_connect_error($mysqli),"</p>";
        exit();
    }
    $result = mysqli_query($mysqli, "SELECT * FROM `vuelos`");
    if($result == false){
        echo "La consulta ha fallado";
    }
    else{
        echo "<h2>D. Tabla con msqli_fetch_row</h2>";
        echo "<table border=1px solid black>";
            echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>Origen</th>";
                echo "<th>Destino</th>";
                echo "<th>Fecha</th>";
                echo "<th>Compañía</th>";
                echo "<th>Vuelo</th>";
            echo "</tr>";
            while($fila_ro = mysqli_fetch_row($result)){
                $id = $fila_ro[0];
                $origen = $fila_ro[1];
                $destino = $fila_ro[2];
                $fecha = $fila_ro[3];
                $companya = $fila_ro[4];
                $vuelo = $fila_ro[5];
                echo "<tr>";
                    echo "<td>", $id, "</td>";
                    echo "<td>", $origen, "</td>";
                    echo "<td>", $destino, "</td>";
                    echo "<td>", $fecha, "</td>";
                    echo "<td>", $companya, "</td>";
                    echo "<td>", $vuelo, "</td>";
                echo "</tr>";
            }
        echo "</table>";
    }
    if(!mysqli_close($mysqli)){
        echo "Error al finalizar la conexión";
        mysqli_close($mysqli);
    }
?>