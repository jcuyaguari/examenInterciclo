<?php
 session_start();
 if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE || $_SESSION['rol']==='admin'){
 header("Location: /examenInterciclo/publica/user/login.html");
 }
?>

<!DOCTYPE html>
<html>

<body>
    <?php
    include '../../config/conexionBD.php';
    $opc = $_GET['opc'];

    switch ($opc) {
        case 'buscar':
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