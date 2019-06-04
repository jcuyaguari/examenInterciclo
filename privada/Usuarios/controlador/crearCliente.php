

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
           
            $opc = $_POST['opc'];
            switch ($opc) {
        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            case 'crear':
            $cedula= isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
            $nombres= isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]), 'UTF-8') : null;    
            $apellidos= isset($_POST["apellidos"]) ? mb_strtoupper(trim($_POST["apellidos"]), 'UTF-8') : null;
            $direccion= isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'UTF-8') : null;
            $telefono= isset($_POST["telefono"]) ? trim($_POST["telefono"]): null;   
            $fechanacimiento= isset($_POST["fechanacimiento"]) ? trim($_POST["fechanacimiento"]): null; 
            $correo= isset($_POST["correo"]) ? trim($_POST["correo"]): null;
            $contrasena= isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;
            $roluser = 'admin';
            $sql= "INSERT INTO cliente VALUES(0, '$cedula', '$nombres', '$apellidos', '$direccion', '$telefono', 
            '$correo', MD5('$contrasena'), '$fechanacimiento', 'N', '$roluser')";        
            if($conn->query($sql) === TRUE) {
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
             $cedula = ($_POST['cedula']); 
             $nombres = mb_strtoupper($_POST['nombres']);
             $apellidos = mb_strtoupper($_POST['apellidos']); 
             $direccion = mb_strtoupper($_POST['direccion']); 
             $telefono = ($_POST['telefono']); 
             $fechaNacimiento = ($_POST['fechaNacimiento']);  
             $correo = ($_POST['correo']);  
             $contrasena= ($_POST['contrasena']); 

             $codigo = $_POST["codigo"]; 
            
             $sql = "UPDATE cliente 
             SET cli_cedula = '$cedula', 
             cli_nombre = '$nombres', 
             cli_apellido = '$apellidos',  
             cli_direccion = '$direccion',  
             cli_telefono = '$telefono', 
             cli_correo = '$correo', 
             cli_password = '$contrasena', 
             cli_fecha_nacimiento = '$fechaNacimiento'
             WHERE cli_id = $codigo ";  

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
            $sql = "SELECT * FROM cliente WHERE cli_eliminado = 'N'
             AND cli_cedula LIKE '%$datos%'  OR  cli_eliminado = 'N'
             AND cli_nombre LIKE '%$datos%' ";
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
                    echo " <td>" . $row["cli_cedula"] . "</td>";
                    echo " <td>" . $row["cli_nombre"] . "</td>";
                    echo " <td>" . $row['cli_apellido'] . "</td>";
                    echo " <td>" . $row['cli_direccion'] . "</td>";
                    echo " <td>" . $row['cli_telefono'] . "</td>";
                    echo " <td>" . $row['cli_fecha_nacimiento'] . "</td>";
                    echo " <td>" . $row['cli_correo'] . "</td>";
                    echo " <td>" . $row['cli_password'] . "</td>";

                    echo "<td> <input type='button' value='Eliminar' onclick='eliminar(" . $row['cli_cedula'] . ")'> </td>";
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
            $sql = "UPDATE cliente SET cli_eliminado = 'S' WHERE  cli_id ='$codigo'";
            echo "$sql";
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
            $datos = mb_strtoupper($_POST['codigo']);

            $sql = "SELECT * FROM cliente WHERE cli_cedula  LIKE '%$datos%' ";

            $row = $conn->query($sql)->fetch_assoc();
            if ($row > 0) {
                ?>
                <input type="txt" id="codigo" name="codigo" value=" <?php echo $row['cli_cedula'] ?>" hidden />
                
                <table border>
                <tr>
                <td><label for="cedula">Cedula (*)</label></td>
                    <td><input type="text" id="cedula" name="cedula" value=""<?php 
                    echo $row['cli_cedula'] ?> placeholder="Ingrese la cedula" required />
                    </tr>
        
                    <tr>
                        <td><label for="nombres">Nombre (*)</label></td>
                        <td><input type="text" id="nombres" name="nombres" value="" <?php 
                    echo $row['cli_nombre'] ?> placeholder="Ingrese el nombre" required /></td>
                    </tr>
                    <tr>
                        <td><label for="apellidos">Apelido (*)</label></td>
                        <td><input type="text" id="apellidos" name="apellidos" value="" <?php 
                    echo $row['cli_apellido'] ?> placeholder="Ingrese el apellido" required />
                             </td>
        
                    </tr>
                    <tr>
                        <td><label for="direccion">Dirección (*)</label></td>
                        <td><input type="text" id="direccion" name="direccion" value=""<?php 
                    echo $row['cli_direccion'] ?> placeholder="Ingrese la direccion" required />
                       </td>
                    </tr>
                    <tr>
                        <td><label for="telefono">Teléfono (*)</label></td>
                        <td><input type="text" id="telefono" name="telefono" value="" <?php 
                    echo $row['cli_telefono'] ?> placeholder="Ingrese el telefono" required />
                             </td>
                    </tr>
                    <tr>
                        <td><label for="fecha">Fecha Nacimiento (*)</label></td>
                        <td><input type="date" id="fechaNacimiento" name="fechaNacimiento" value="" <?php 
                    echo $row['cli_fecha_nacimiento'] ?> placeholder="Ingrese la fecha" required />
                        </td>
                    </tr>
                    <tr>
                        <td><label for="correo">Correo electrónico (*)</label></td>
                        <td><input type="email" id="correo" name="correo" value="" <?php 
                    echo $row['cli_correo'] ?> placeholder="Ingrese el correo" required />
                       </td>
                    </tr>
                    <tr>
                        <td><label for="correo">Contraseña (*)</label></td>
                        <td><input type="password" id="contrasena" name="contrasena" value="" <?php 
                    echo $row['cli_password'] ?> placeholder="Ingrese la contraseña" required />
                       </td>

                    </tr>
                    <tr>
                    <td colspan=" 2" style="text-align: center">
                        <input class="txt" type="button" id="enviar" name="enviar" value="ACTUALIZAR USUARIO" onclick="actualizarCliente()" />
                    </td>
                </tr>
            </table border>
        <?php
    } else {
        echo "<b>NO SE ENCOTRO EL PRODUCTO</b>";
    }
    break;
        }
$conn->close();
?>

</body>
</html>
