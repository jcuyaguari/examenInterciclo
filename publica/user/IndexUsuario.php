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
    <form id="form" method="POST">
        <div id='uno'>
            <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
            <label for="cedula">Cedula (*)</label>
            <br>
            <input type="text" id="cedulaUsu" name="cedulaUsu" value="<?php echo $row["usu_cedula"]; ?>" />
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
            <input type="text" id="rol" name="rol" value="<?php echo $row["usu_rol"]; ?>" />
            <br>
            <input class="txt" type="button" id="eliminar" name="eliminar" value="ELIMINAR" onclick="eliminarUsuario()" />
            <input type="reset" id="regresar" name="regresar" value="REGRESAR" onclick="location.href='../menuP/menu.php?codigo=<?php echo $codigo?>'">
            <input type="reset" id="salir" name="salir" value="SALIR" onclick="location.href='login.html'">
            <input class="txt" type="button" id="eliminar" name="eliminar" value="ELIMINAR" onclick="actualizarUsuario()" />


            <a href="modificar.php?codigo=<?php echo $row["usu_codigo"]; ?>&rol=USER&cod=<?php echo $row["usu_codigo"]; ?>"><input type="button" id="modifcar" name="modifcar" value="Modificar"></a>
            <a href="cambiar_contrasena.php?codigo=<?php echo $row["usu_codigo"]; ?>&rol=USER&cod=<?php echo $row["usu_codigo"]; ?>"><input type="button" id="cambiar" name="cambiar" value="Cambiar Contraseña"></a>
            <a href="../../../config/cerrar_sesion.php"><input type="button" id="cancelar" name="cancelar" value="Salir"></a>

        </div>
        <?php
        $conn->close();
        ?>
    </form>
</body>

</html>