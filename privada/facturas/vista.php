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
                        <th>FECHA DE GENERACION</th>
                        <th>ESTADO</th>
                        <th>SUB TOTAL</th>
                        <th>IVA</th>
                        <th>TOTAL</th>
                        <th>DETALLE</th>
                    </tr>
                    <?php

                    $sql = "SELECT * FROM factura f ";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo " <td>" . $row["fac_id"] . "</td>";
                            echo " <td>" . $row["fac_fecha"] . "</td>";
                            echo " <td>" . $row["fac_estado"] . "</td>";
                            echo " <td>" . $row['fac_subtotal'] . "</td>";
                            echo " <td>" . $row['fac_iva'] . "</td>";
                            echo " <td>" . $row['fac_total'] . "</td>";
                            echo " <td><input type='button' id='det' name='det' value='VER DETALLE' onclick='detalleFAC(" . $row["fac_id"] . ")'/></td>";
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

                <legend>PEDIDOS POR FACTURAR</legend>
                <table border>
                    <tr>
                        <th>CODIGO</th>
                        <th>FECHA DE GENERACION</th>
                        <th>LOCAL</th>
                        <th>ESTADO</th>
                        <th>CANCELAR ENVIO</th>
                        <th>ENTREGA COMPLATADA</th>
                    </tr>
                    <?php
                    $sql = "SELECT  * 
                    FROM pedido p, local l where usu_eliminado=0 and ped_estado='EN CAMINO' or ped_estado='ENTREGADO' ";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo " <td>" . $row["ped_codigo"] . "</td>";
                            echo " <td>" . $row["ped_fecha"] . "</td>";
                            echo " <td>" . $row["loc_nombre"] . "</td>";
                            echo " <td>" . $row['ped_estado'] . "</td>";
                            echo " <td><input type='button' id='ele' name='ele' value='CANCELAR' onclick='eliminarPed(" . $row["ped_codigo"] . ")'/></td>";
                            echo "<td><input type='button' id='env' name='env' value='ENVIAR' onclick='entregaPed(" . $row["ped_codigo"] . ")'/></td>";
                            echo "<span class='slider' ></s pan>";
                            echo "</tb>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr>";
                        echo " <td colspan='4'> UD NO CUENTA CON PEDIDOS POR GENERAR FACTURAS</td> ";
                        echo "</tr>";
                    }
                    ?>
                </table border>
            </fieldset>

        </div>
        <div id='3'>
            <br><br><br><br><br><br><br><br>
            <fieldset style="text-align: center">
                <legend>BUSCAR PEDIDOS POR FECHA</legend>
                <label for="fechaA">INGRESAR FECHA MAS ANTIGUA </label><br>
                <input type="text" id="fechaA" name="fechaA" value="" placeholder="AAAA-MM-DD" /><br>
                <label for="fechaA">INGRESAR FECHA MAS RECIENTE </label><br>
                <input type="text" id="fechaN" name="fechaN" value="" placeholder="AAAA-MM-DD" />
                <input type='button' id='bus' name='bus' value='BUSCAR' onclick='buscar(fechaA)' />




                <table border>
                    <tr>
                        <th>CODIGO</th>
                        <th>FECHA DE GENERACION</th>
                        <th>LOCAL</th>
                        <th>ESTADO</th>
                    </tr>
                    <?php
                    $fechaA = "fechaA.value";
                    echo ("$fechaA");
                    $sql = "SELECT  * 
                    FROM pedido p, local l where usu_eliminado=0 and ped_estado='EN CAMINO' or ped_estado='ENTREGADO' ";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo " <td>" . $row["ped_codigo"] . "</td>";
                            echo " <td>" . $row["ped_fecha"] . "</td>";
                            echo " <td>" . $row["loc_nombre"] . "</td>";
                            echo " <td>" . $row['ped_estado'] . "</td>";
                            echo "<span class='slider' ></s pan>";
                            echo "</tb>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr>";
                        echo " <td colspan='4'> UD NO CUENTA CON PEDIDOS POR GENERAR FACTURAS</td> ";
                        echo "</tr>";
                    }
                    ?>
                </table border>
            </fieldset>



        </div>
    </form>
    <?php
    $conn->close();
    ?>
</body>

</html>