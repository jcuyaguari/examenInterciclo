<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <?php
    include '../../config/conexionBD.php';
    $opc = $_GET['opc'];

    switch ($opc) {
        case 'crear':
            $nombre  = mb_strtoupper($_GET['nombre']);
            $direccion = mb_strtoupper($_GET['direccion']);
            $telefono = ($_GET['telefono']);
            $descripcion = ($_GET['descripcion']);

            $sql = "INSERT INTO local VALUES (0, '$nombre', '$direccion', '$telefono', '$descripcion' ,0)";
            if ($conn->query($sql) === TRUE) {
                echo "TRUE";
            } else {
                if ($conn->error == 1062) {
                    echo "<p class='error'>El local ya esta registrado </p>";
                } else {
                    echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
                }
            }
            break;
        case 'buscar':
            $nombre  = mb_strtoupper($_GET['nombre']);
            $sql = "SELECT * FROM local where loc_nombre='$nombre'AND loc_eliminado='0'";

            $row = $conn->query($sql)->fetch_assoc();
            if ($row > 0) {
                ?>
            <legend>Editar Local</legend>
            <label for="nombre">Ingresar el nuevo nombre</label>
            <br>
            <input type="text" id="nombreNuevo" name="nombreNuevo" value="<?php echo $row['loc_nombre'] ?>" placeholder="" />
            <br>
            <label for="direccion">Ingresar la nueva direccion</label>
            <br>
            <input type="text" id="direccionNueva" name="direccionNueva" value="<?php echo $row['loc_direccion'] ?>" placeholder="" />
            <br>
            <label for="telefono">Ingresar el nuevo telefono</label>
            <br>
            <input type="text" id="telefonoNuevo" name="telefonoNuevo" value="<?php echo $row['loc_telefono'] ?>" placeholder="" />
            <br>
            <label for="descripcion">Ingresar la nueva descripcion</label>
            <br>
            <input type="text" id="descripcionNueva" name="descripcionNueva" value="<?php echo $row['loc_descripcion'] ?>" placeholder="" />
            <br>
            <input class="txt" type="button" id="enviar" name="enviar" value="ACTUALIZAR" onclick="actualizarLocal()" />
        <?php
    } else {
        echo "<h2>NO SE ENCONTRO EL LOCAL</h2>";
    }
    break;
case 'modificar':
    $nombre  = mb_strtoupper($_GET['nombre']);
    $nombreN  = mb_strtoupper($_GET['nombreN']);
    $direccion = mb_strtoupper($_GET['direccion']);
    $telefono = ($_GET['telefono']);
    $descripcion = ($_GET['descripcion']);
    $sql = "UPDATE local SET loc_nombre='$nombreN', loc_direccion='$direccion', loc_telefono='$telefono', loc_descripcion='$descripcion' WHERE loc_nombre='$nombre'";
    if ($conn->query($sql) === TRUE) {
        echo "TRUE";
    } else {
        if ($conn->error == 1062) {
            echo "<p class='error'>No se pudo modificar </p>";
        } else {
            echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
        }
    }
    break;
case 'eliminar':
    $nombre  = mb_strtoupper($_GET['nombre']);
    $sql = "UPDATE local SET loc_eliminado=1 WHERE loc_nombre='$nombre'";
    if ($conn->query($sql) === TRUE) {
        echo "TRUE";
    } else {

        echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
    }
    break;
case 'buscarUsu':
    $cedula  = $_GET['cedula'];
    $sql = "SELECT * FROM usuario where usu_cedula='$cedula'";

    $row = $conn->query($sql)->fetch_assoc();
    if ($row > 0) {
        ?>
            <legend>Editar Local</legend>
            <label for="nombre">Ingresar el nuevo nombre</label>
            <br>
            <input type="text" id="nombreNuevo" name="nombreNuevo" value="<?php echo $row['usu_nombre'] ?>" placeholder="" />
            <br>
            <label for="direccion">Ingresar la nueva direccion</label>
            <br>
            <input type="text" id="direccionNueva" name="direccionNueva" value="<?php echo $row['loc_direccion'] ?>" placeholder="" />
            <br>
            <label for="telefono">Ingresar el nuevo telefono</label>
            <br>
            <input type="text" id="telefonoNuevo" name="telefonoNuevo" value="<?php echo $row['loc_telefono'] ?>" placeholder="" />
            <br>
            <label for="descripcion">Ingresar la nueva descripcion</label>
            <br>
            <input type="text" id="descripcionNueva" name="descripcionNueva" value="<?php echo $row['loc_descripcion'] ?>" placeholder="" />
            <br>
            <input class="txt" type="button" id="enviar" name="enviar" value="ACTUALIZAR" onclick="actualizarLocal()" />
        <?php
    } else {
        echo "<h2>NO SE ENCONTRO EL LOCAL</h2>";
    }
    break;
}


$conn->close();
?>
</body>

</html>