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
        $file = simplexml_load_file("xml/comment.xml");
        printf("%s </br>", $file -> book[1] -> author);
        printf("%s </br>", $file -> book[1] -> title);
        printf("%s </br>", $file -> book[1] -> genre);
        printf("%s </br>", $file -> book[1] -> price);
        printf("%s </br>", $file -> book[1] -> publish_date);
        printf("%s </br>", $file -> book[1] -> description);
    ?>
    <table border = 1px solid black>
    <?php
        echo "  <tr>";
        echo "      <th>Título</th>";
        echo "      <th>Género</th>";
        echo "      <th>Precio</th>";
        echo "  </tr>";
        foreach($file->book as $libro)
        {
            echo "  <tr>";
            echo "          <td>", $libro-> title,"</td>";
            echo "          <td>", $libro-> genre,"</td>";
            echo "          <td>", $libro-> price,"</td>";
            echo "  </tr>";
        }
    ?>
    </table>
    <?php
        $newLibro = $file->addChild("book");
        $newLibro->addAttribute("id", "bk113");
        $newLibro->addChild("author", "C. S. Lewis");
        $newLibro->addChild("title", "Mere Christianity");
        $newLibro->addChild("genre", "Essays");
        $newLibro->addChild("price", "6.89");
        $newLibro->addChild("publish_date", "1952-03-01");
        $newLibro->addChild("description", "A classic of Christian apologetics.");
        $file->asXML("xml/comment.xml");
    ?>
</body>
</html>