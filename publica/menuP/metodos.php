<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <?php
    include '../../config/conexionBD.php';
    $listaCantidad =  json_decode($_POST['listaCantidad']);
    $listaCodigos =  json_decode($_POST['listaCodigos']);
    $codigoU = $_POST['codigo'];
    $local = $_POST['local'];
    date_default_timezone_set("America/Guayaquil");
    $fecha = date('Y-m-d H:i:s', time());

    $sql = "INSERT INTO pedido VALUES (0, '$fecha', '$codigoU', '$local', 'CREADO', 0)";
    echo $sql;
    if ($conn->query($sql) === TRUE) {
        $sql1 = "SELECT ped_codigo FROM pedido WHERE ped_codigo = (SELECT MAX(ped_codigo) from pedido)";
        $result = $conn->query($sql1);
        $row = $result->fetch_assoc();
        $cod_ped = $row["ped_codigo"];

        for ($i=0; $i < sizeof($listaCantidad); $i++) { 
            $sql2 = "INSERT INTO det_ped VALUES (0, '$listaCodigos[$i]', '$cod_ped', '$listaCantidad[$i]')";
            $result = $conn->query($sql2);
            $sql3 = "UPDATE productos set pro_stock = (pro_stock - $listaCantidad[$i]) WHERE pro_codigo = '$listaCodigos[$i]'";
            $result = $conn->query($sql3);
        }
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