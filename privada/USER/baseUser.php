<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>
    <?php
    include '../../config/conexionBD.php';
    $opc = $_GET['opc'];
    switch ($opc) {
        case 'reactivar':
            $codigo  = $_GET['codigo'];
            $sql = "UPDATE usuario SET usu_eliminado='N' WHERE usu_codigo='$codigo'";
            if ($conn->query($sql) === TRUE) {
                echo "TRUE";
            } else {

                echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
            }
            break;
        case 'eliminar':
            $codigo  = $_GET['codigo'];
            $sql = "UPDATE usuario SET usu_eliminado='S' WHERE usu_codigo='$codigo'";
            if ($conn->query($sql) === TRUE) {
                echo "TRUE";
            } else {

                echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
            }
            break;
        case 'cambiar':
            date_default_timezone_set("America/Guayaquil");
            $fechaM = date('Y-m-d H:i:s', time());
            $codigo = $_GET["codigo"];
            $contrasenaN = $_GET["contrasenaN"];
            echo("$codigo");
            $sql = "UPDATE usuario SET usu_password= MD5('$contrasenaN'), usu_fecha_modificacion='$fechaM' WHERE usu_codigo='$codigo'";
            if ($conn->query($sql) === TRUE) {
                echo "TRUE";
            } else {
                echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
            }
            break;
        case 'modificar':

            break;
    }
    $conn->close();
    ?>
</body>

</html>