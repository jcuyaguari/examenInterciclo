<?php 
session_start(); 
if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE || $_SESSION['ROL'] === 'USER'){ 
    header("Location: /examenInterciclo/publica/user/login.html"); 
    } 
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Gestión de usuarios</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <script type="text/javascript" src="metodos.js"></script>
    <style>
        body {
            background: "css/correo.jpg";
            padding: 25px;
            margin: 25px;
        }

        td {
            padding: 10px;
            margin: 10px;
        }
    </style>
</head>

<body background="css/correo2.jpg">
    <header>
    <a href="../admin/indexAdministrrador.php"><input type="button" id="cancelar" name="cancelar" value="REGRESAR A INICIO"></a>
    <h1 class='elegantshadow'>ADMINISTRADOR</h1>
    </header>
    <legend>BUSCAR USUARIO</legend>
    <br>
    <label for="descripcion">Ingresar la cedula</label>
    <br>
    <input type="text" id="descripcion" name="descripcion" value="" placeholder="Cedula Cliente" />
    <br>
    <input class="txt" type="button" id="buscar" name="buscar" value="ACEPTAR" onclick="buscarUsuario(descripcion.value)" />
    <table style="border-style: solid">
        <legend>USUARIOS REGISTRADOS</legend>
        <tr>
            <th>Cedula</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Dirección</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Fecha Nacimiento</th>
            <th>Tipo de usuario</th>
            <th>Estado</th>
            <th colspan="2">OPCIONES</th>
        </tr>
        <?php
        include '../../config/conexionBD.php';
        $codigo = $_GET["codigo"];
        $sql = "SELECT * FROM usuario";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo " <td>" . $row["usu_cedula"] . "</td>";
                echo " <td>" . $row['usu_nombres'] . "</td>";
                echo " <td>" . $row['usu_apellidos'] . "</td>";
                echo " <td>" . $row['usu_direccion'] . "</td>";
                echo " <td>" . $row['usu_telefono'] . "</td>";
                echo " <td>" . $row['usu_correo'] . "</td>";
                echo " <td>" . $row['usu_fecha_nacimiento'] . "</td>";
                echo " <td>" . $row['usu_rol'] . "</td>";
                if ($row['usu_eliminado'] == 'S') {
                    echo " <td>" . 'Eliminado' . "</td>";
                    echo "<td><input type='button' id='reactivar' name='reactivar' value='ACTIVAR' onclick='reactivar(" . $row["usu_codigo"] . ")' /></td>";
                } else {
                    echo " <td> " . 'Activo' . "</td> ";
                    echo "<td><input type='button' id='eliminar' name='eliminar' value='ELIMINAR' onclick='eliminar(" . $row["usu_codigo"] . ")' /></td>";
                }
                echo "<td><input type='button' id='cambiar' name='cambiar' value='CAMBIAR CONTRASEÑA' onclick='actualizarContrasena(" . $row["usu_codigo"] . ")' /></td>";;

                echo "</tr>";
            }
        } else {
            echo "<tr>";
            echo "<td colspan='7'> No existen usuarios registradas en el sistema </td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>