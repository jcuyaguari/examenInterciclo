<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <?php
    include '../../config/conexionBD.php';
    $opc = $_POST['opc'];

    switch ($opc) {
        case 'listar':
            $cod = $_POST['codigo'];
            ?>
        <table border>
            <tr>
                <th>CANTIDAD</th>
                <th>PRODUCTO</th>
                <th>VALOR UNITARIO</th>
                <th>TOTAL</th>
            </tr>
            <?php

            $sql = "SELECT dp.det_ped_cantidad as cantidad, p.pro_nombre as productos,  p.pro_precio as valorUni, (dp.det_ped_cantidad * p.pro_precio ) as total 
            FROM  factura f, fac_detalle fd, pedido pe, det_ped dp, productos p 
            WHERE f.fac_id = $cod
                AND f.fac_id = fd.facd_factura
                and fd.facd_pedido = pe.ped_codigo
                and pe.ped_codigo = dp.det_ped_pedido 
                and dp.det_ped_producto =p.pro_codigo;";
            $result = $conn->query($sql);
            $total = 0;
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo " <td>" . $row["cantidad"] . "</td>";
                    echo " <td>" . $row["productos"] . "</td>";
                    echo " <td>" . $row['valorUni'] . "</td>";
                    echo " <td>" . $row['total'] . "</td>";
                }
            } else {
                echo "<tr>";
                echo " <td colspan='4'> UD NO CUENTA CON PEDIDOS </td> ";
                echo "</tr>";
            }
            ?>
        </table border>
        <?php
        break;
        case 'actualizar':
        $cod =  $_POST['codigo'];
        $nuevo =  $_POST['nuevo'];
        $sql3 = "UPDATE factura set fac_estado = '$nuevo' WHERE fac_id = '$cod'";
        $result = $conn->query($sql3);
        echo '**T**';
        break;
}

$conn->close();
?>
</body>

</html>