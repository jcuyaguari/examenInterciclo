<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>
    <?php
    include '../../config/conexionBD.php';
    $opc = $_POST['opc'];
    switch ($opc) {
        case 'crear':
            $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
            $nombres = isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]), 'UTF-8') : null;
            $apellidos = isset($_POST["apellidos"]) ? mb_strtoupper(trim($_POST["apellidos"]), 'UTF-8') : null;
            $direccion = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'UTF-8') : null;
            $telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]) : null;
            $correo = isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
            $fechaNacimiento = isset($_POST["fechaNacimiento"]) ? trim($_POST["fechaNacimiento"]) : null;
            $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;

            $sql = "INSERT INTO usuario VALUES (0, '$cedula', '$nombres', '$apellidos', '$direccion', '$telefono','$correo', MD5('$contrasena'), '$fechaNacimiento', 'N', null, null, 'USER')";

            if ($conn->query($sql) === TRUE) {
                echo '*T*';
            } else {
                if ($conn->errno == 1062) {
                    echo '*N*';
                } else {
                    echo '*FALSE*';
                }
            }

            break;
        case 'iniciar':
            $correo = ($_POST["correo"]);
            $contrasena = $_POST["contrasena"];
            $sql = "SELECT * FROM usuario where usu_rol='USER' AND usu_correo='$correo' AND usu_password= MD5('$contrasena')";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            if ($result->num_rows > 0) {
                echo '**T**';
                echo "<input hidden id='codigo' value='" . $row['usu_codigo'] . "'></input>";
            } else {
                echo '**FALSE**';
                echo "$conn->erro";
            }
            break;

        case 'eliminar':
            date_default_timezone_set("America/Guayaquil");
            $fecha = date('Y-m-d H:i:s', time());
            $cedula = ($_POST["cedula"]);
            $sql = "UPDATE usuario SET usu_eliminado='S', usu_fecha_modificacion='$fecha' WHERE usu_cedula='$cedula'";
            if ($conn->query($sql) === TRUE) {
                echo "TRUE";
            } else {

                echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
            }
            break;
        case 'actualizar':
            date_default_timezone_set("America/Guayaquil");
            $fechaM = date('Y-m-d H:i:s', time());
            $cedula = ($_POST["cedula"]);
            $nombre = ($_POST["nombre"]);
            $apellido = ($_POST["apellido"]);
            $direccion = ($_POST["direccion"]);
            $telefono = ($_POST["telefono"]);
            $fechaN = ($_POST["fechaN"]);
            $correo = ($_POST["correo"]);

            $sql = "UPDATE usuario SET usu_nombres='$nombre', usu_apellidos='$apellido',usu_direccion='$direccion', usu_telefono='$telefono', usu_correo='$correo', usu_fecha_nacimiento='$fechaN', usu_fecha_modificacion='$fechaM' WHERE usu_cedula='$cedula'";
            if ($conn->query($sql) === TRUE) {
                echo "TRUE";
            } else {

                echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
            }


            break;
    }
    $conn->close();
    ?>

</body>

</html>