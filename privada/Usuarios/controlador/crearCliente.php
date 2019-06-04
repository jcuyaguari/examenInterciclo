<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Crear Nuevo Cliente</title>
    <style type="text/css" rel="stylesheet"></style>
    <script src="metodos.js"> </script>
</head>

<body>
    <?php
    //incluir conexión a la base de datos
    include '../../../config/conexionBD.php';
    date_default_timezone_set("America/Guayaquil");
    $fecha = date('Y-m-d H:i:s', time());

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

            $sql = "INSERT INTO usuario VALUES (0, '$cedula', '$nombres', '$apellidos', '$direccion', '$telefono','$correo', 
            MD5('$contrasena'), '$fechaNacimiento', 'N', null, null, 'ADMIN')";

            if ($conn->query($sql) === TRUE) {
                echo 'Si';
            } else {
                if ($conn->errno == 1062) {
                    echo "No";
                } else {
                    echo '**FALSE**';
                }
            }
            break;
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        case 'actualizar':
            $cedula = ($_POST['cedulaA']);
            $nombres = mb_strtoupper($_POST['nombresA']);
            $apellidos = mb_strtoupper($_POST['apellidosA']);
            $direccion = mb_strtoupper($_POST['direccionA']);
            $telefono = ($_POST['telefonoA']);
            $fechaNacimiento = ($_POST['fechaNacimientoA']);
            $correo = ($_POST['correoA']);
            $contrasena = ($_POST['contrasenaA']);

            $codigo = $_POST["codigoA"];

            $sql = "UPDATE usuario 
             SET usu_cedula = '$cedula', 
             usu_nombres = '$nombres', 
             usu_apellidos = '$apellidos',  
             usu_direccion = '$direccion',  
             usu_telefono = '$telefono', 
             usu_correo = '$correo', 
             usu_password = '$contrasena', 
             usu_fecha_nacimiento = '$fechaNacimiento'
             WHERE usu_codigo = $codigo ";

            echo $sql;
            if ($conn->query($sql) === TRUE) {
                echo '**T**';
            } else {
                if ($conn->errno == 1062) {
                    echo '**N**';
                } else {
                    echo '**FALSE**';
                }
            }
            break;
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 

        case 'buscar':
            $datos = mb_strtoupper($_POST['buscarCedula']);
            $sql = "SELECT * FROM usuario WHERE usu_eliminado = 'N'
             AND usu_cedula LIKE '%$datos%'  OR  usu_eliminado = 'N'
             AND usu_nombres LIKE '%$datos%' ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo '<table border>';
                echo  '<tr>';
                echo '   <th>Cedula</th>';
                echo '    <th>Nombre</th>';
                echo '    <th>Apellido</th>';
                echo '    <th>Direccion</th>';
                echo '    <th>telefono</th>';
                echo '    <th>Fecha Nacimiento</th>';
                echo '    <th>Correo</th>';
                echo '    <th>Contraseña</th>';
                echo '    <th>Accion</th>';
                echo '</tr>';

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo " <td>" . $row["usu_cedula"] . "</td>";
                    echo " <td>" . $row["usu_nombres"] . "</td>";
                    echo " <td>" . $row['usu_apellidos'] . "</td>";
                    echo " <td>" . $row['usu_direccion'] . "</td>";
                    echo " <td>" . $row['usu_telefono'] . "</td>";
                    echo " <td>" . $row['usu_fecha_nacimiento'] . "</td>";
                    echo " <td>" . $row['usu_correo'] . "</td>";
                    echo " <td>" . $row['usu_password'] . "</td>";

                    echo "<td> <input type='button' value='Eliminar' onclick='eliminar(" . $row['usu_codigo'] . ")'> </td>";
                    echo "</tr>";
                }
                echo "</table border>";
            } else {
                echo "<b>NO SE ENCOTRO EL USUARIO</b>";
            }
            break;

            ///////////////////////////////////////////////////////////////////////////////////////////////////
        case 'eliminar':
            $codigo = $_POST["codigo"];
            $sql = "UPDATE usuario SET usu_eliminado = 'S' WHERE  usu_codigo ='$codigo'";
            echo "$sql  '<<>>>'  $codigo";
            if ($conn->query($sql) === TRUE) {
                echo '**T**';
            } else {
                if ($conn->errno == 1062) {
                    echo '**N**';
                } else {
                    echo '**FALSE**';
                }
            }
            break;
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        case 'buscarAct':
            $datos = ($_POST['codigoP']);
            $sql = "SELECT * FROM usuario WHERE usu_eliminado = 'N' AND usu_codigo LIKE '%$datos%'  OR  usu_eliminado = 'N'
            AND usu_cedula LIKE '%$datos%'  ";
            
            $row = $conn->query($sql)->fetch_assoc();
            if ($row > 0) {
                ?>
            <input type="txt" id="codigoA" name="codigoA" value=" <?php echo $row['usu_codigo'] ?>" hidden />

            <table border>
                <tr>
                    <td><label for="cedulaA">Cedula (*)</label></td>
                    <td><input type="text" id="cedulaA" name="cedulaA" value=" <?php
                                                                                echo $row['usu_cedula'] ?>" placeholder="Ingrese la cedula" required />
                </tr>

                <tr>
                    <td><label for="nombresA">Nombre (*)</label></td>
                    <td><input type="text" id="nombresA" name="nombresA" value=" <?php
                                                                                echo $row['usu_nombres'] ?>" placeholder="Ingrese el nombre" required /></td>
                </tr>
                <tr>
                    <td><label for="apellidosA">Apelido (*)</label></td>
                    <td><input type="text" id="apellidosA" name="apellidosA" value=" <?php
                                                                                    echo $row['usu_apellidos'] ?>" placeholder="Ingrese el apellido" required />
                    </td>

                </tr>
                <tr>
                    <td><label for="direccionA">Dirección (*)</label></td>
                    <td><input type="text" id="direccionA" name="direccionA" value=" <?php
                                                                                    echo $row['usu_direccion'] ?>" placeholder="Ingrese la direccion" required />
                    </td>
                </tr>
                <tr>
                    <td><label for="telefonoA">Teléfono (*)</label></td>
                    <td><input type="text" id="telefono" name="telefonoA" value=" <?php
                                                                                    echo $row['usu_telefono'] ?>" placeholder="Ingrese el telefono" required />
                    </td>
                </tr>
                <tr>
                    <td><label for="fechaA">Fecha Nacimiento (*)</label></td>
                    <td><input type="date" id="fechaNacimientoA" name="fechaNacimientoA" value="<?php
                                                                                                echo $row["usu_fecha_nacimiento"]; ?>">
                    
                    </td>
                </tr>
                <tr>
                    <td><label for="correoA">Correo electrónico (*)</label></td>
                    <td><input type="email" id="correoA" name="correoA" value=" <?php
                                                                                echo $row['usu_correo'] ?>" placeholder="Ingrese el correo" required />
                    </td>
                </tr>
                <tr>
                    <td><label for="correoA">Contraseña (*)</label></td>
                    <td><input type="password" id="contrasenaA" name="contrasenaA" value=" <?php
                                                                                            echo $row['usu_password'] ?>" placeholder="Ingrese la contraseña" required />
                    </td>

                </tr>
                <tr>
                    <td colspan=" 2" style="text-align: center">
                        <input class="txt" type="button" id="enviarA" name="enviarA" value="ACTUALIZAR USUARIO" onclick="actualizarCliente()" />
                    </td>
                </tr>
            </table border>
        <?php
    } else {
        echo "<b>NO SE ENCOTRO EL Usuario</b>";
    }
    break;
case 'iniciar':
    $correo = ($_POST["correo"]);
    $contrasena = $_POST["contrasena"];
    $sql = "SELECT * FROM cliente where cli_correo='$correo' AND cli_password= MD5('$contrasena')";
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
}
$conn->close();
?>

</body>

</html>