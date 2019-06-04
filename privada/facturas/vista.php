<?php
session_start();
if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE || $_SESSION['ROL'] === 'USER') {
    header("Location: /examenInterciclo/publica/user/login.html");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>
        Pedido
    </title>
    <script type="text/javascript" src="controlador.js"></script>
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body onload="cambiar('1')">
    <?php
    include '../../config/conexionBD.php';
    ?>
    <header>

        <h1 class='elegantshadow'>Pedido</h1>
    </header>
    <ul>
        <li>

            <a href=" #" onclick="cambiar('1')">
                <div class="name" data-text="Home">LISTA DE FACTRUAS</div>
                <div class="icon">
                    <i class="fa fa-plus-square" aria-hidden="true"></i>
                    <i class="fa fa-plus-square" aria-hidden="true"></i>

                </div>

            </a>
        </li>

        <li>
            <a href="#" onclick="cambiar('2')">
                <div class="name" data-text="Home">EDITAR ESTADO DE FACTURAS</div>
                <div class="icon">
                    <i class="fa fa-list" aria-hidden="true"></i>
                    <i class="fa fa-list" aria-hidden="true"></i>
                </div>

            </a>
        </li>

        <li>
            <a href="#" onclick="cambiar('3')">
                <div class="name" data-text="Home">LISTAR</div>
                <div class="icon">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    <i class="fa fa-search" aria-hidden="true"></i>
                </div>

            </a>
        </li>
    </ul>
    <form id="form" method="POST">
        <div id='1'>
            <br><br><br><br><br><br><br><br>
            <fieldset style="text-align: center">
                <legend>TODAS LAS FACTRUAS</legend>
                <table border>
                    <tr>
                        <th>CODIGO</th>
                        <th>USUARIO</th>
                        <th>FECHA</th>
                        <th>ESTADO</th>
                        <th>SUB TOTAL</th>
                        <th>IVA</th>
                        <th>TOTAL</th>
                        <th>DETALLE</th>
                    </tr>
                    <?php

                    $sql = "SELECT CONCAT(u.usu_nombres, ' ', u.usu_apellidos) as Nombre, f.fac_id as codigo, 
                    f.fac_fecha as fecha, f.fac_estado as estado, f.fac_subtotal as subtotal, 
                    f.fac_iva as iva, f.fac_total as total 
                    FROM factura f, usuario u
                    where f.fac_cliente = u.usu_codigo ";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo " <td>" . $row["codigo"] . "</td>";
                            echo " <td>" . $row["Nombre"] . "</td>";
                            echo " <td>" . $row["fecha"] . "</td>";
                            echo " <td>" . $row["estado"] . "</td>";
                            echo " <td>" . $row['subtotal'] . "</td>";
                            echo " <td>" . $row['iva'] . "</td>";
                            echo " <td>" . $row['total'] . "</td>";
                            echo " <td><input type='button' id='det' name='det' value='VER DETALLE' onclick='detalleFAC(" . $row["codigo"] . ")'/></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr>";
                        echo " <td colspan='6'> NO TIENE PEDIDOS DIFERENTES DE CREADO </td> ";
                        echo "</tr>";
                    }
                    ?>
                </table border>
                <legend>DETALLE DE FACTURA</legend>
                <div id='detFac'>

                </div>
            </fieldset>
        </div>

        <div id='2'>
            <br><br><br><br><br><br><br><br>
            <fieldset style="text-align: center">
                <legend>TODAS LAS FACTRUAS</legend>
                <table border>
                    <tr>
                        <th>CODIGO</th>
                        <th>USUARIO</th>
                        <th>FECHA</th>
                        <th>ESTADO</th>
                        <th>SUB TOTAL</th>
                        <th>IVA</th>
                        <th>TOTAL</th>
                        <th>CAMBIAR</th>
                    </tr>
                    <?php

                    $sql = "SELECT CONCAT(u.usu_nombres, ' ', u.usu_apellidos) as Nombre, f.fac_id as codigo, 
                    f.fac_fecha as fecha, f.fac_estado as estado, f.fac_subtotal as subtotal, 
                    f.fac_iva as iva, f.fac_total as total 
                    FROM factura f, usuario u
                    where f.fac_cliente = u.usu_codigo ";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo " <td>" . $row["codigo"] . "</td>";
                            echo " <td>" . $row["Nombre"] . "</td>";
                            echo " <td>" . $row["fecha"] . "</td>";
                            echo " <td>" . $row["estado"] . "</td>";
                            echo " <td>" . $row['subtotal'] . "</td>";
                            echo " <td>" . $row['iva'] . "</td>";
                            echo " <td>" . $row['total'] . "</td>";
                            echo " <td><select  id='tipo' name='tipo' onchange='cambiarEstado(" . $row["codigo"] . ",this)'>
                            <option value='ACTIVAR'>ACTIVAR</option>
                            <option value='ANULAR'>ANULAR</option>
                        </select>
                    </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr>";
                        echo " <td colspan='6'> NO TIENE PEDIDOS DIFERENTES DE CREADO </td> ";
                        echo "</tr>";
                    }
                    ?>
                </table border>
            </fieldset>

        </div>
        <div id='3'>

        </div>
    </form>
    <?php
    $conn->close();
    ?>
</body>

</html>