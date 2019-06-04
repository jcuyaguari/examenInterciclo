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
            </tr>
            <?php

            $sql = "SELECT  pd.det_ped_id as codigo, p.pro_nombre as nombre, p.pro_tipo as tipo, pd.det_ped_cantidad as cantidad 
            FROM det_ped  pd, productos p 
            WHERE pd.det_ped_pedido = $cod and p.pro_codigo = pd.det_ped_producto;";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo " <td>" . $row["codigo"] . "</td>";
                    echo " <td>" . $row["nombre"] . "</td>";
                    echo " <td>" . $row['tipo'] . "</td>";
                    echo " <td>" . $row['cantidad'] . "</td>";
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
    case "crear":
        $data = json_decode($_POST['lista'], true);
        
        break;
    default:
        echo '<b> NO HAY DATOS </b>';
        break;
}

$conn->close();
?>
</body>

</html>