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
    }
    $conn->close();
    ?>

</body>

</html>