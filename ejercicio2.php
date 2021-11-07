<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $ruta = "csv/locations.csv";
        $file = fopen($ruta, "r");
        while ($data = fgetcsv ($file, 1000, ",")) {
            $num = count ($data);
            echo $data[0].' '.$data[1];
            echo "</br>";
        }
        fclose($file);
        $rutaWriter = "csv/locations.csv";
        $fileWriter = fopen($ruta, "a");
        fputcsv($fileWriter, array('Sevilla', '37.38333300,-5.98333300'));
        fclose($fileWriter);
        echo "<hr>";
        $ruta = "csv/locations.csv";
        $file = fopen($ruta, "r");
        echo "<table border = 1px solid black>";
        echo "  <tr>";
        echo "      <th>Location</th>";
        echo "      <th>Latitude/Longitude</th>";
        echo "  </tr>";
        while(fgetcsv($file) == true)
        {
            $data = fgetcsv($file);
            echo "  <tr>";
            echo "      <td>", $data[0], "</td></br>";
            echo "      <td>", $data[1], "</td></br>";
            echo "  </tr>";
        }
        echo "</table>";
        fclose($file);
    ?>
</body>
</html>