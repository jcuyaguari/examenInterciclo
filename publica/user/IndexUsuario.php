
<?php 
session_start(); 
if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE || $_SESSION['ROL'] === 'ADMIN'){ 
    header("Location: /examenInterciclo/publica/user/login.html"); 
    } 
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
    <link rel="stylesheet" type="text/css" href="../menuP/estilo.css">
    <link rel="stylesheet" type="text/css" href="../menuP/texto.css">
    <script type="text/javascript" src="controlador.js"></script>

</head>


<body onload="cambiar('uno')">
    <?php
    include '../../config/conexionBD.php';
    $codigo = $_GET["codigo"];
    $sql = "SELECT * FROM usuario where usu_codigo=$codigo";
    $row = $conn->query($sql)->fetch_assoc();
    ?>
    <header>
    <a href='../menuP/menu.php?codigo=<?php echo $codigo?>'><input type='button' id='cancelar' name='cancelar' value='PAGINA PRINCIPAL'></a>
    <a href="../../config/cerar_session.php"><input type="button" id="cancelar" name="cancelar" value="CERRAR SECION"></a>
    <h1 class='elegantshadow'>Floristeria "La Casa de las Flores"</h1>
    </header>
    
    <!-- <input type="button" onclick="cambiar('uno')" value="OPCIONES DE CUENTA">
    <input type="button" onclick="cambiar('dos')" value="MIS PEDIDOS">
    <input type="button" onclick="cambiar('tres')" value="MIS FACTURAS"> -->

    <ul>
        <li>
            <a href=" #" onclick="cambiar('uno')">
                <div class="name" data-text="Home">OPCIONES DE CUENTA</div>
                <div class="icon">
                    <i class="fa fa-plus-square" aria-hidden="true"></i>
                    <i class="fa fa-plus-square" aria-hidden="true"></i>
                </div>

            </a>
        </li>
        <li>
            <a href=" #" onclick="cambiar('dos')">
                <div class="name" data-text="Home">MIS PEDIDOS</div>
                <div class="icon">
                    <i class="fa fa-plus-square" aria-hidden="true"></i>
                    <i class="fa fa-plus-square" aria-hidden="true"></i>
                </div>

            </a>
        </li>
        <li>
            <a href=" #" onclick="cambiar('tres')">
                <div class="name" data-text="Home">MIS FACTURAS</div>
                <div class="icon">
                    <i class="fa fa-plus-square" aria-hidden="true"></i>
                    <i class="fa fa-plus-square" aria-hidden="true"></i>
                </div>

            </a>
        </li>

    </ul>
    <br>
    <br>
    <br>
    <form id="form" method="POST">
            <div id='uno'>
                <br>
                <br>
            <fieldset>
            <legend>OPCIONES DE CUENTA</legend>
            <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
            <label for="cedula">Cedula (*)</label>
            <br>
            <input type="text" id="cedulaUsu" name="cedulaUsu" value="<?php echo $row["usu_cedula"]; ?>" disabled />
            <br>
            <label for="nombres">Nombres (*)</label>
            <br>
            <input type="text" id="nombres" name="nombres" value="<?php echo $row["usu_nombres"]; ?>" />
            <br>
            <label for="apellidos">Apelidos (*)</label>
            <br>
            <input type="text" id="apellidos" name="apellidos" value="<?php echo $row["usu_apellidos"]; ?>" />
            <br>
            <label for="direccion">Dirección (*)</label>
            <br>
            <input type="text" id="direccion" name="direccion" value="<?php echo $row["usu_direccion"]; ?>" />
            <br>
            <label for="telefono">Teléfono (*)</label>
            <br>
            <input type="text" id="telefono" name="telefono" value="<?php echo $row["usu_telefono"]; ?>" />
            <br>
            <label for="fecha">Fecha Nacimiento (*)</label>
            <br>
            <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo $row["usu_fecha_nacimiento"]; ?>" />
            <br>
            <label for="correo">Correo electrónico (*)</label>
            <br>
            <input type="email" id="correo" name="correo" value="<?php echo $row["usu_correo"]; ?>" />
            <br>
            <label for="ROL">Rol de Usuario (*)</label>
            <br>
            <input type="text" id="rol" name="rol" value="<?php echo $row["usu_rol"]; ?>" disabled />
            <br>
            <input class="txt" type="button" id="eliminar" name="eliminar" value="ELIMINAR" onclick="eliminarUsuario()" />
            <input class="txt" type="button" id="actualizar" name="actualizar" value="ACTUALIZAR" onclick="actualizarUsuario()" />
            <input class="txt" type="button" id="AContrasena" name="AContrasena" value="CAMBIAR CONTRASEÑA" onclick="actualizarContrasena()" />
            <br>
            <input type="reset" id="regresar" name="regresar" value="REGRESAR" onclick="location.href='../menuP/menu.php?codigo=<?php echo $codigo ?>'">
            <input type="reset" id="salir" name="salir" value="SALIR" onclick="location.href='../../config/cerar_session.php'">
        </fieldset>
        </div>
        <div id="dos">
            <br>
            <br>
            <fieldset style="text-align: center">
                <legend>PEDIDOS POR FACTURAR</legend>
                <table border>
                    <tr>
                        <th>CODIGO</th>
                        <th>FECHA DE GENERACION</th>
                        <th>LOCAL</th>
                        <th>ESTADO</th>
                        <th>VER DETALLE</th>
                        <th>ELIMINAR</th>
                        <th>GENERAR FACTURA</th>
                    </tr>
                    <?php

                    $sql = "SELECT  * 
                    FROM pedido p, local l 
                    WHERE p.ped_cod_local = l.loc_id AND p.ped_cod_user= $codigo AND p.usu_eliminado = 0 AND p.ped_estado = 'CREADO';";
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
                            echo " <td style='text-align: center'>";
                            echo "<label class='switch' >";
                            echo "<input type='checkbox' onclick='facturas(" . $row["ped_codigo"] . ",this)' >";
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
                <input type="button" name="fac" id='btnFactura' onclick="factura(<?php echo $codigo ?>)" value="GENERAR FACTURAS">
            </fieldset>
            <fieldset>
                <legend>DETALLE DE PEDIDO</legend>
                <div id='detallePedido'>

                </div>
            </fieldset>



            <fieldset style="text-align: center">
                <legend>OTROS PEDIDOS</legend>
                <table border>
                    <tr>
                        <th>CODIGO</th>
                        <th>FECHA DE GENERACION</th>
                        <th>LOCAL</th>
                        <th>ESTADO</th>
                        <th>VER DETALLE</th>
                        <th>ELIMINAR</th>
                    </tr>
                    <?php

                    $sql = "SELECT  * 
                    FROM pedido p, local l 
                    WHERE p.ped_cod_local = l.loc_id AND p.ped_cod_user= $codigo AND p.usu_eliminado = 0 AND p.ped_estado <> 'CREADO';";
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
        <div id="tres">
            <br>
            <br>
            <fieldset style="text-align: center">
                <legend>MIS FACTURAS</legend>
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

                    $sql = "SELECT * FROM factura f WHERE f.fac_cliente = $codigo";
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
        <?php
        $conn->close();
        ?>
    </form>
</body>

</html>