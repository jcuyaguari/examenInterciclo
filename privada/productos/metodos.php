<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <?php
    include '../../config/conexionBD.php';
    $opc = $_GET['opc'];

    switch ($opc) {
        case 'crear':
            $nombre  = mb_strtoupper($_GET['nombre']);
            $tipo = mb_strtoupper($_GET['tipo']);
            $precio = ($_GET['precio']);
            $stock = ($_GET['stock']);
            $img = ($_GET['img']);
<<<<<<< HEAD

            $sql = "INSERT INTO productos VALUES (0, '$nombre', '$tipo', '$precio', '$stock', '$img',0)";
            if ($conn->query($sql) === TRUE) {
                echo "TRUE";
            } else {
                if ($conn->errno == 1062) {
                    echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistema </p>";
                } else {
                    echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
                }
            }
            //cerrar la base de datos
=======
            $image = new Imagick();
            $image->readimageblob($img);

            $sql = "insert into prodocto";
            echo '<img src="data:image/png;base64,' .  base64_encode($image->getimageblob())  . '" />';
            echo "<p>$nombre </p>";
            echo "<p>$tipo </p>";
            echo "<p>$precio </p>";
            echo "<p>$stock ddd </p>";
            echo "<p>$img </p>";
>>>>>>> 6bece62030a40f2969869c6f79c2e0ca57d9ba14
            break;
        default:
            # code...
            break;
    }

    $conn->close();
    ?>
</body>

</html>