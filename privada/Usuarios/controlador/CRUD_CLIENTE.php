<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
    <link rel="stylesheet" type="text/css" href="disenio.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script type="text/javascript" src="metodos.js"></script>
    <script src="//code.jquery.com/jquery-latest.js"></script>
    <script src="metodos.js"></script>
</head>


<body onload="cambiar('cuatro')">
<?php
    include '../../../config/conexionBD.php';
    ?>

    <header>
        <h1 class='elegantshadow'>CRUD USUARIO</h1>
    </header>
    <ul>
        <li>
            <a href=" #" onclick="cambiar('uno')">
                <div class="name" data-text="Home">CREAR CLIENTES</div>
                <div class="icon">
                    <i class="fa fa-plus-square" aria-hidden="true"></i>
                    <i class="fa fa-plus-square" aria-hidden="true"></i>
                </div>

            </a>
        </li>

        <li>
            <a href="#" onclick="cambiar('dos')">
                <div class="name" data-text="Home">LISTAR CLIENTES</div>
                <div class="icon">
                    <i class="fa fa-list" aria-hidden="true"></i>
                    <i class="fa fa-list" aria-hidden="true"></i>
                </div>

            </a>
        </li>

        <li>
            <a href="#" onclick="cambiar('tres')">
                <div class="name" data-text="Home">ELIMINAR CLIENTES</div>
                <div class="icon">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    <i class="fa fa-search" aria-hidden="true"></i>
                </div>

            </a>
        </li>

        <li>
            <a href="#" onclick="cambiar('cuatro')">
                <div class="name" data-text="Home">ACTUALIZAR CLIENTES</div>
                <div class="icon">
                    <i class="fa fa-pencil-square" aria-hidden="true"></i>
                    <i class="fa fa-pencil-square" aria-hidden="true"></i>
                </div>

            </a>
        </li>
    </ul>

  
    <form class="form-horizontal" id="crearCLiente" enctype="multipart/form-data" >
        <input id='opc' name='opc' hidden>
       
        <div id='uno'>
            <br>
            <br>
        <table border>
        <tr>
                    <td><label for="cedula">Cedula (*)</label></td>
                    <td><input type="text" id="cedula" name="cedula" value=""
                                    placeholder="Ingrese el número de cedula ..." required /></td>
                    </tr>
        
                    <tr>
                        <td><label for="nombres">Nombre (*)</label></td>
                        <td><input type="text" id="nombres" name="nombres" value="" placeholder="Ingrese sus dos nombres..."
                                required /></td>
                    </tr>
                    <tr>
                        <td><label for="apellidos">Apelido (*)</label></td>
                        <td><input type="text" id="apellidos" name="apellidos" value=""
                                placeholder="Ingrese sus dos apellidos..." required /></td>
        
                    </tr>
                    <tr>
                        <td><label for="direccion">Dirección (*)</label></td>
                        <td><input type="text" id="direccion" name="direccion" value="" placeholder="Ingrese su dirección ..."
                                required /></td>
                    </tr>
                    <tr>
                        <td><label for="telefono">Teléfono (*)</label></td>
                        <td><input type="text" id="telefono" name="telefono" value=""
                                placeholder="Ingrese su número telefónico..." required /></td>
                    </tr>
                    <tr>
                        <td><label for="fecha">Fecha Nacimiento (*)</label></td>
                        <td><input type="date" id="fechaNacimiento" name="fechaNacimiento" value="" placeholder="Ingrese su
                            fecha de nacimiento ..." required /></td>
                    </tr>
                    <tr>
                        <td><label for="correo">Correo electrónico (*)</label></td>
                        <td><input type="email" id="correo" name="correo" value="" placeholder="Ingrese su correo electrónico.."
                                required /></td>
                    </tr>
                    <tr>
                        <td><label for="correo">Contraseña (*)</label></td>
                        <td><input type="password" id="contrasena" name="contrasena" value="" placeholder="Ingrese su
                            contraseña ..." required /></td>
                    </tr>
            <tr>
                <td colspan=" 2" style="text-align: center">
                    <input class="txt" type="button" id="enviar" name="enviar" value="Aceptar" onclick="crearCliente()" />
                    <input class="txt" type="button" id="cancelar" name="cancelar" value="Cancelar" onclick="cancelar()" />
                </td>
            </tr>
        </table border>
     </div>


    <div id='dos'>
        <table  border >

            <tr>
                <th>Cedula</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>fecha Nacimiento</th>
                <th>Correo</th>
                <th>Contraseña</th>
            </tr>
            <?php
            $sql = "SELECT * FROM cliente WHERE cli_eliminado = 'N'";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                while($row = $result-> fetch_assoc()){
                    echo "<tr>";
                    echo "<td>". $row["cli_cedula"] . "</td>";
                    echo "<td>". $row["cli_nombre"] . "</td>";
                    echo "<td>". $row["cli_apellido"] . "</td>";
                    echo "<td>". $row["cli_direccion"] . "</td>";
                    echo "<td>". $row["cli_telefono"] . "</td>";
                    echo "<td>". $row["cli_fecha_nacimiento"] . "</td>";
                    echo "<td>". $row["cli_correo"] . "</td>";
                    echo "<td>". $row["cli_password"] . "</td></tr>";  
                }
            }else{
                echo "<tr>";
                echo "<td> No existe el cliente</td>";
                echo "</tr>";
            }
            ?>
        </table border>
        </div>


<div id='tres'>
<label for="precio">Ingrese el numero de cedula</label><br>
<input class="txt" type="text" id="buscarCedula" name="buscarCedula" value="" 
onkeyup="buscar(this.value)" 
placeholder="Ingrese el codigo o nombre" />
<div id="busqueda">
</div>
</div>


<div id='cuatro'>
<label for="precio">Ingrese el numero de cedula</label><br>
<input class="txt" type="text" id="codigo" name="codigo" value=""
 onkeyup="buscarAct(this.value)" 
placeholder="Ingrese el codigo o nombre" />
<br>
<br>
<div id="actualizacion">
</div>
</div>

<?php
$conn->close();
?>
</form>
</body>
</html>