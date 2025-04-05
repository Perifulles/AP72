<?php
require_once "autoloader.php";
?>
<html>
    <head>
        <title>Welcome to LAMP Infrastructure</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container-fluid">


        <?php
        $connection = new Conexion();
        $Model = new Model();

        echo "<h1><U>Ejercicio 2</U></h1>";
        $Model->showAllProducts();
        echo "<br>";

        echo "<h1><U>Ejercicio 3</U></h1>";
        $Model->showAllEmp();
        echo "<br>";


        echo "<h1><U>Ejercicio 4</U></h1>";
        $Model->showAllClients('desc');
        echo "<br>";


        echo "<h1><U>Ejercicio 5</U></h1>";

        echo "<br>";

        ?>






        </div>
    </body>
</html>





</html>

