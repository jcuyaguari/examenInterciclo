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

            break;
        case 'eliminar':
            $codigo  = $_GET['codigo'];
            //echo "<script>console.log( 'Debug Objects: " . $codigo . "' );</script>";
            $sql = "UPDATE usuario SET usu_eliminado='S' WHERE usu_codigo='$codigo'";
            if ($conn->query($sql) === TRUE) {
                echo "TRUE";
            } else {

                echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
            }
            break;
        case 'cambiar':

            break;
        case 'modificar':

            break;
    }
    $conn->close();
    ?>
</body>

</html>