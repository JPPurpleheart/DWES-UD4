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
        $ruta = "txt/personajes.txt";
        $file = fopen($ruta, "r");
        do
        {
            echo fgets($file), "</br>";
        } while(!feof($file));
        fclose($file);
        echo "<hr>";
        $rutaWriter = "txt/personajes.txt";
        $fileWriter = fopen($rutaWriter, "a+");
        if (is_writable($rutaWriter)) {
            if (!$fileWriter = fopen($rutaWriter, "a+")) {
                echo "No se puede abrir el fichero personajes.txt";
                exit;
            }
            else{
                $cadena = "\nJosé Pablo Machuca González, 164, 63, Black, Light Dark Skin, Brown, 1996, Male, Earth, Human\n";
                if (fwrite($fileWriter, $cadena) === FALSE) {
                    echo "No se puede escribir en el fichero personajes.txt";
                    exit;
                }
                else {
                    do
                    {
                        fwrite($fileWriter, $cadena);
                    } while(!feof($fileWriter));
                }
                fclose($fileWriter);
            }
        }
        else {
            echo "El fichero no es escribible";
        }
        $rutaTable = "txt/personajes.txt";
        $fileTable = fopen($rutaTable, "r");
        echo "<table>";
        echo "  <tr>";
        echo "      <th></th>";
        echo "  </tr>";
        do
        { 
            # code...
        } while(!feof($fileTable));
        echo "</table>";
    ?>
</body>
</html>