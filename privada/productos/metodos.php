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
            $image = new Imagick();
            $image->readimageblob($img);
            echo '<img src="data:image/png;base64,' .  base64_encode($image->getimageblob())  . '" />';
            echo "<p>$nombre </p>";
            echo "<p>$tipo </p>";
            echo "<p>$precio </p>";
            echo "<p>$stock ddd </p>";
            echo "<p>$img </p>";
            break;
        default:
            # code...
            break;
    }

    $conn->close();
    ?>
</body>

</html>