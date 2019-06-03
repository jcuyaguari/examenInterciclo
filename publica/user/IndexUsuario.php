
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>

    <script type="text/javascript" src="controlador.js"></script>
</head>
<body onload="cambiar('uno')">
    <?php
    include '../../config/conexionBD.php';
    ?>
    <ul class="menu">
        <input type="button" onclick="cambiar('uno')" value="LISTAR CORREOS">

        <input type="button" onclick="cambiar('dos')" value="ENVIAR CORREO">

        <input type="button" onclick="cambiar('tres')" value="OPCIONES">

    </ul>

    <?php
    $codigo = $_GET["codigo"];
    $sql = "SELECT * FROM usuario where usu_codigo=$codigo";
    $row = $conn->query($sql)->fetch_assoc();
    ?>
    <form id="form" method="POST">
        <div id='uno'>
            <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
            <label for="cedula">Cedula (*)</label>
            <br>
            <input type="text" id="cedula" name="cedula" value="<?php echo $row["usu_cedula"]; ?>" disabled />
            <br>
            <label for="nombres">Nombres (*)</label>
            <br>
            <input type="text" id="nombres" name="nombres" value="<?php echo $row["usu_nombres"]; ?>" disabled />
            <br>
            <label for="apellidos">Apelidos (*)</label>
            <br>
            <input type="text" id="apellidos" name="apellidos" value="<?php echo $row["usu_apellidos"]; ?>" disabled />
            <br>
            <label for="direccion">Dirección (*)</label>
            <br>
            <input type="text" id="direccion" name="direccion" value="<?php echo $row["usu_direccion"]; ?>" disabled />
            <br>
            <label for="telefono">Teléfono (*)</label>
            <br>
            <input type="text" id="telefono" name="telefono" value="<?php echo $row["usu_telefono"]; ?>" disabled />
            <br>
            <label for="fecha">Fecha Nacimiento (*)</label>
            <br>
            <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo $row["usu_fecha_nacimiento"]; ?>" disabled />
            <br>
            <label for="correo">Correo electrónico (*)</label>
            <br>
            <input type="email" id="correo" name="correo" value="<?php echo $row["usu_correo"]; ?>" disabled />
            <br>
            <label for="ROL">Rol de Usuario (*)</label>
            <br>
            <input type="text" id="rol" name="rol" value="<?php echo $row["usu_rol"]; ?>" disabled />
            <br>

            <a href="../../controladores/usuario/eliminar.php?codigo=<?php echo $row["usu_codigo"]; ?>&rol=USER&cod=<?php echo $row["usu_codigo"]; ?>">
                <input type="button" id=" eliminar " name=" eliminar " value=" Eliminar "></a>
            <a href="modificar.php?codigo=<?php echo $row["usu_codigo"]; ?>&rol=USER&cod=<?php echo $row["usu_codigo"]; ?>"><input type="button" id="modifcar" name="modifcar" value="Modificar"></a>
            <a href="cambiar_contrasena.php?codigo=<?php echo $row["usu_codigo"]; ?>&rol=USER&cod=<?php echo $row["usu_codigo"]; ?>"><input type="button" id="cambiar" name="cambiar" value="Cambiar Contraseña"></a>
            <a href="../../../config/cerrar_sesion.php"><input type="button" id="cancelar" name="cancelar" value="Salir"></a>

        </div>
        <div id='dos'>
            <br>
            <label for="destinatario">CORREO RECEPTOR (*)</label>
            <br>
            <input type="text" id="destinatario" name="destinatario" value="" placeholder="" onkeyup="buscarCorreo()" required />
            <label id="informacion">
            </label>
            <br>
            <label for="asunto"> ASUNTO (*)</label>
            <br>
            <input type="text" id="asunto" name="asunto" value="" placeholder="" required />
            <br>
            <label for="mensaje">Mensaje</label>
            <br>
            <textarea id="mensaje" name="mensaje" placeholder="" required></textarea>
            <br>
            <input id='emisor' name='emisor' value="<?php echo $row["usu_correo"]; ?>" type="hidden">
            <a onclick="correo(<?php echo $row['usu_codigo']; ?>)"><input type="button" id="enviar" name="enviar" value="ENVIAR"></a>
            <a href="../../../config/cerrar_sesion.php"><input type="button" id="cancelar" name="cancelar" value="Salir"></a>
        </div>

        <div id='tres'>

            <b>LISTA DE CORREOS RECIBIDOS</b>
            <h1></h1>
            <table id='12' style="border-style: solid">
                <tr>
                    <th>ASUNTO</th>
                    <th>MENSAJE</th>
                    <th>EMISOR</th>
                </tr>

                <?php

                $codigo = $_GET["codigo"];
                $sql = "SELECT * FROM usuario where usu_codigo=$codigo";
                $row = $conn->query($sql)->fetch_assoc();

                $sql = "SELECT * FROM correo  WHERE cor_reseptor = '" . $row['usu_correo'] . "';";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo " <td>" . $row["cor_asunto"] . "</td>";
                        echo " <td>" . $row['cor_mensaje'] . "</td>";
                        echo " <td>" . $row['cor_reseptor'] . "</td>";
                    }
                } else {

                    echo "<tr>";
                    echo " <td colspan='7'> No existen correos </td> ";
                    echo "</tr>";
                }
                ?>
            </table>
            <h1></h1>
            <b>LISTA DE CORREOS ENVIADOS</b>
            <h1></h1>
            <table id='12' style="border-style: solid">
                <tr>
                    <th>ASUNTO</th>
                    <th>MENSAJE</th>
                    <th>RECEPTO</th>
                </tr>

                <?php

                $codigo = $_GET["codigo"];
                $sql = "SELECT * FROM usuario where usu_codigo=$codigo";
                $row = $conn->query($sql)->fetch_assoc();

                $sql = "SELECT * FROM correo  WHERE cor_emisor = '" . $row['usu_correo'] . "';";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo " <td>" . $row["cor_asunto"] . "</td>";
                        echo " <td>" . $row['cor_mensaje'] . "</td>";
                        echo " <td>" . $row['cor_reseptor'] . "</td>";
                    }
                } else {

                    echo "<tr>";
                    echo " <td colspan='7'> No existen correos </td> ";
                    echo "</tr>";
                }
                ?>
            </table>
            <br>
            <a href="../../../config/cerrar_sesion.php"><input type="button" id="cancelar" name="cancelar" value="Salir"></a>
        </div>
        <?php
        $conn->close();
        ?>
    </form>
</body>

</html>