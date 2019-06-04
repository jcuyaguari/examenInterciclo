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
                <th>CODIGO</th>
                <th>PRODUCTO</th>
                <th>TIPO</th>
                <th>CANTIDAD</th>
                <th>VALOR UNITARIO</th>
                <th>VALOR TOTAL</th>
            </tr>
            <?php

            $sql = "SELECT  pd.det_ped_id as codigo, p.pro_nombre as nombre, p.pro_tipo as tipo, pd.det_ped_cantidad as cantidad,p.pro_precio as unitario, (P.pro_precio * pd.det_ped_cantidad) as total
            FROM det_ped  pd, productos p 
            WHERE pd.det_ped_pedido = $cod and p.pro_codigo = pd.det_ped_producto;";
            $result = $conn->query($sql);
            $total = 0;
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo " <td>" . $row["codigo"] . "</td>";
                    echo " <td>" . $row["nombre"] . "</td>";
                    echo " <td>" . $row['tipo'] . "</td>";
                    echo " <td>" . $row['cantidad'] . "</td>";
                    echo " <td>" . $row['unitario'] . "</td>";
                    echo " <td>" . $row['total'] . "</td>";
                    $total = $total + $row['total'];
                }
                echo " <tr ><td colspan='5' style='text-align: center'>TOTAL </td><td>" . $total . "</td></tr>";
            } else {
                echo "<tr>";
                echo " <td colspan='4'> UD NO CUENTA CON PEDIDOS </td> ";
                echo "</tr>";
            }
            ?>
        </table border>
        <?php
        break;
    case "crear":
        $lista = json_decode($_POST['lista'], true);
        $cod =  $_POST['cod'];

        date_default_timezone_set("America/Guayaquil");
        $fecha = date('Y-m-d H:i:s', time());

        $sql = "INSERT INTO factura VALUES (0, '$fecha', '$cod', 'ACTIVA', 0, 0, 0)";
        if ($conn->query($sql) === TRUE) {
            $sql1 = "SELECT fac_id FROM factura WHERE fac_id = (SELECT MAX(fac_id) from factura)";
            $result = $conn->query($sql1);
            $row = $result->fetch_assoc();
            $cod_fac = $row["fac_id"];

            for ($i = 0; $i < sizeof($lista); $i++) {
                $sql2 = "INSERT INTO fac_detalle VALUES (0, '$lista[$i]', '$cod_fac')";
                $result = $conn->query($sql2);
                $sql3 = "UPDATE pedido set ped_estado = 'CONFIRMADO' WHERE ped_codigo = '$lista[$i]'";
                $result = $conn->query($sql3);
            }

            $sql5 = "SELECT SUM(dp.det_ped_cantidad *  p.pro_precio) as total
            FROM  factura f, fac_detalle fd, pedido pe, det_ped dp, productos p 
            WHERE f.fac_id = $cod_fac
                AND f.fac_id = fd.facd_factura
                and fd.facd_pedido = pe.ped_codigo
                and pe.ped_codigo = dp.det_ped_pedido 
                and dp.det_ped_producto =p.pro_codigo;";
            $result = $conn->query($sql5);
            $row = $result->fetch_assoc();
            $subtotal = $row["total"];
            $iva = $subtotal * 0.12;
            $total = $iva + $subtotal;
            $sql6 = "UPDATE factura set fac_subtotal = $subtotal, fac_iva = $iva, fac_total = $total WHERE fac_id = $cod_fac";
            $result = $conn->query($sql6);

            echo '**T**';
        } else {
            if ($conn->errno == 1062) {
                echo '**N**';
            } else {
                echo '**FALSE**';
            }
        }

        break;

    case 'eliminar':
        $cod =  $_POST['codigo'];
        $sql3 = "UPDATE pedido set usu_eliminado = '1' WHERE ped_codigo = '$cod'";
        $result = $conn->query($sql3);
        echo '**T**';
        break;
    default:
    case 'listarFAC':
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

    case 'enviar':
        $cod =  $_POST['codigo'];
        $sql3 = "UPDATE pedido set ped_estado = 'EN CAMINO' WHERE ped_codigo = '$cod'";
        $result = $conn->query($sql3);
        echo '**T**';
        break;
    case 'entregar':
        echo ('hola');
        $cod =  $_POST['codigo'];
        $sql = "UPDATE pedido set ped_estado = 'ENTREGADO' WHERE ped_codigo = '$cod'";
        $result = $conn->query($sql);
        echo '**T**';
        break;
    case 'buscarPed':
        $fechaA  = $_GET['fechaA'];
        $fechaN  = $_GET['fechaN'];
        $sql = "SELECT * FROM pedido where ped_fecha>='2019-06-04' and ped_fecha<'2019-06-04'";



        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo " <td>" . $row["ped_codigo"] . "</td>";
                echo " <td>" . $row["ped_fecha"] . "</td>";
                echo " <td>" . $row["loc_nombre"] . "</td>";
                echo " <td>" . $row['ped_estado'] . "</td>";
            }
        } else {

            echo "<tr>";
            echo " <td colspan='7'> No existen locales </td> ";
            echo "</tr>";
        }


        break;
}

$conn->close();
?>
</body>

</html>