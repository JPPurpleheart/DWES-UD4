<?php
    include 'ejercicio6.php';
    echo "<h1>Ejercicio 6: Funciones para Conectar a BBDD, SELECT, INSERT, UPDATE y DELETE</h1>";
    echo "<h2>creaConexión()</h2>";
    $mysqli = creaConexion();
    var_dump($mysqli);
    $origen = "Bilbao";
    $destino = "Ferrol";
    $fecha = "2021-10-22 09:45:39";
    $companya = "EuskaraHegazkinak";
    $vuelo = "B747";
    echo "<h2>creaVuelo()</h2>";
    creaVuelo($mysqli, $origen, $destino, $fecha, $companya, $vuelo);
    $destino_u1 = "Huelva";
    $id_u1 = 8;
    echo "<h2>modificaDestino()</h2>";
    modificaDestino($mysqli, $destino_su, $id_su);
    $companya_u2 = "Ryanair";
    $id_u2 = 9;
    echo "<h2>modificaCompanya()</h2>";
    modificaCompanya($mysqli, $companya_u2, $id_u2);
    $id_del = 14;
    echo "<h2>eliminaVuelo()</h2>";
    eliminaVuelo($mysqli, $id_del);
    echo "<h2>extraeVuelos()</h2>";
    $id = 15;
    extraeVuelos($mysqli);
?>