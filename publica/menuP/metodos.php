<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <?php
    include '../../config/conexionBD.php';
    $listaCantidad = $_POST['listaCantidad'];
    $listaCodigos = $_POST['listaCodigos'];
    $codigoU = $_POST['codigo'];

    date_default_timezone_set("America/Guayaquil");
    $fecha = date('Y-m-d H:i:s', time());

    $sql = "INSERT INTO pedido VALUES (0, '$fecha', '$codigoU', 'ACTIVO', 0)";
    echo "$sql";
    if ($conn->query($sql) === TRUE) {
        echo '**T**';
    } else {
        if ($conn->errno == 1062) {
            echo '**N**';
        } else {
            echo '**FALSE**';
        }
    }
    
    ?>
</body>

</html>