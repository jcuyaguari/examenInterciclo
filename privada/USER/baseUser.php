<!DOCTYPE html>
<html lang="en">

<body>
    <?php
    include '../../config/conexionBD.php';
    $opc = $_GET['opc'];
    switch ($opc) {
        case 'reactivar':
            date_default_timezone_set("America/Guayaquil");
            $fechaM = date('Y-m-d H:i:s', time());
            $codigo  = $_GET['codigo'];
            $sql = "UPDATE usuario SET usu_eliminado='N', usu_fecha_modificacion='$fechaM' WHERE usu_codigo='$codigo'";
            if ($conn->query($sql) === TRUE) {
                echo "TRUE";
            } else {

                echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
            }
            break;
        case 'eliminar':
            date_default_timezone_set("America/Guayaquil");
            $fechaM = date('Y-m-d H:i:s', time());
            $codigo  = $_GET['codigo'];
            $sql = "UPDATE usuario SET usu_eliminado='S', usu_fecha_modificacion='$fechaM' WHERE usu_codigo='$codigo'";
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
            echo ("$codigo");
            $sql = "UPDATE usuario SET usu_password= MD5('$contrasenaN'), usu_fecha_modificacion='$fechaM' WHERE usu_codigo='$codigo'";
            if ($conn->query($sql) === TRUE) {
                echo "TRUE";
            } else {
                echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
            }
            break;
        case 'buscarUsu':
            $cedula  = $_GET['cedula'];
            $sql = "SELECT * FROM usuario where usu_cedula='$cedula'";



            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {
                    echo " NOMBRE:" . $row['usu_nombres'];
                    echo " APELLIDO:" . $row['usu_apellidos'];
                    echo " DIRECCION:" . $row['usu_direccion'];
                    echo " TELEFONO:" . $row["usu_telefono"];
                }
            } else {

                echo "<tr>";
                echo " <td colspan='7'> No existen locales </td> ";
                echo "</tr>";
            }


            break;
    }
    $conn->close();
    ?>
</body>

</html>