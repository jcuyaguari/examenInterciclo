<?php 
session_start(); 
if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE || $_SESSION['ROL'] === 'USER'){ 
    header("Location: /examenInterciclo/publica/user/login.html"); 
    } 
?>
<!DOCTYPE html>
<html>

<head>
    <title>
        Pedido
    </title>
    <script type="text/javascript" src="metodos.js"></script>
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

    <!-- <input type="button" onclick="cambiar('1')" value="Listar Pedidos Pendientes" style="background-color: red;">
    <input type="button" onclick="cambiar('2')" value="Listar Pedidos Entregados" style="background-color: khaki;">
    <input type="button" onclick="cambiar('3')" value="Buscar Pedido" style="background-color: lightsalmon;">
    <input type="button" onclick="cambiar('4')" value="Editar Entrega" style="background-color: mediumpurple;"> -->

    <!-- desde aquirrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr/ -->
    <ul>
        <li>

            <a href=" #" onclick="cambiar('1')">
                <div class="name" data-text="Home">Listar Pedidos Pendientes</div>
                <div class="icon">
                    <i class="fa fa-plus-square" aria-hidden="true"></i>
                    <i class="fa fa-plus-square" aria-hidden="true"></i>

                </div>

            </a>
        </li>

        <li>
            <a href="#" onclick="cambiar('2')">
                <div class="name" data-text="Home">Listar Pedidos Entregados</div>
                <div class="icon">
                    <i class="fa fa-list" aria-hidden="true"></i>
                    <i class="fa fa-list" aria-hidden="true"></i>
                </div>

            </a>
        </li>

        <li>
            <a href="#" onclick="cambiar('3')">
                <div class="name" data-text="Home">Buscar Pedido</div>
                <div class="icon">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    <i class="fa fa-search" aria-hidden="true"></i>
                </div>

            </a>
        </li>

        <li>
            <a href="#" onclick="cambiar('4')">
                <div class="name" data-text="Home">Editar Entrega</div>
                <div class="icon">
                    <i class="fa fa-pencil-square" aria-hidden="true"></i>
                    <i class="fa fa-pencil-square" aria-hidden="true"></i>
                </div>

            </a>
        </li>
    </ul>
    <!-- desde aquirrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr/ -->
    <form id="form" method="POST">
        <div id='1'>
            <br><br><br><br><br><br><br><br>
            <fieldset style="text-align: center">

                <legend>CONFITRMAR ENVIO</legend>
                <table border>
                    <tr>
                        <th>CODIGO</th>
                        <th>FECHA DE GENERACION</th>
                        <th>LOCAL</th>
                        <th>ESTADO</th>
                        <th>VER DETALLE</th>
                        <th>ELIMINAR</th>
                        <th>ENVIAR</th>
                    </tr>
                    <?php

                    $sql = "SELECT  * 
                    FROM pedido p, local l where usu_eliminado=0 and ped_estado!='CREADO'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo " <td>" . $row["ped_codigo"] . "</td>";
                            echo " <td>" . $row["ped_fecha"] . "</td>";
                            echo " <td>" . $row["loc_nombre"] . "</td>";
                            echo " <td>" . $row['ped_estado'] . "</td>";
                            echo " <td><input type='button' id='det' name='det' value='VER DETALLE' onclick='detalle(" . $row["ped_codigo"] . ")'/></td>";
                            echo " <td><input type='button' id='ele' name='ele' value='ELMINIAR' onclick='eliminarPed(" . $row["ped_codigo"] . ")'/></td>";
                            echo "<td><input type='button' id='env' name='env' value='ENVIAR' onclick='enviarPed(" . $row["ped_codigo"] . ")'/></td>";
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
            <fieldset>
                <legend>CONFIRMAR ENTREGA</legend>
                <div id='detallePedido'>

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
                <input type='button' id='bus' name='bus' value='BUSCAR' onclick='buscar(fechaA.value+fechaN.value)'/>




                <table border>
                    <tr>
                        <th>CODIGO</th>
                        <th>FECHA DE GENERACION</th>
                        <th>LOCAL</th>
                        <th>ESTADO</th>
                    </tr>
                    <?php
                    $fechaA="fechaA.value";
                    echo("$fechaA");
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
        <div id='4'>

        </div>
    </form>

</body>

</html>