<?php 
session_start(); 
if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE || $_SESSION['ROL'] === 'USER'){ 
    header("Location: /examenInterciclo/publica/user/login.html"); 
    } 
?>
<!DOCTYPE html>
<html>

<head>
    <title>
        Locales
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" src="metodos.js"></script>
    <link href="estilo.css" rel="stylesheet" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body onload="cambiar('1')">
    <?php
    include '../../config/conexionBD.php';
    ?>
    <header>

        <h1 class='elegantshadow'>Locales</h1>
    </header>
    <!-- <input type="button" onclick="cambiar('1')" value="A&Ntilde;ADIR NUEVO LOCAL">

    <input type="button" onclick="cambiar('2')" value="EDITAR LOCAL">

    <input type="button" onclick="cambiar('3')" value="ELIMINAR LOCAL"> -->

    <ul>
        <li>

            <a href=" #" onclick="cambiar('1')">
                <div class="name" data-text="Home">A&Ntilde;ADIR NUEVO LOCAL</div>
                <div class="icon">
                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                   
                </div>

            </a>
        </li>

        <li>

            <a href=" #" onclick="cambiar('2')">
                <div class="name" data-text="Home">EDITAR LOCAL</div>
                <div class="icon">
                <i class="fa fa-pencil-square" aria-hidden="true"></i>
                <i class="fa fa-pencil-square" aria-hidden="true"></i>

                </div>

            </a>
        </li>

        <li>

            <a href=" #" onclick="cambiar('3')">
                <div class="name" data-text="Home">ELIMINAR LOCAL</div>
                <div class="icon">
                <i class="fa fa-trash" aria-hidden="true"></i>
                <i class="fa fa-trash" aria-hidden="true"></i>

                </div>

            </a>
        </li>
    </ul>


    <form id="form" method="POST">
        <div id='1'>
            <h1>A&Ntilde;ADIR NUEVO LOCAL</h1>
            <fieldset>
                <legend>Nuevo Local</legend>
                <label for="nombres">Ingresar nombre</label>
                <br>
                <input type="text" id="nombre" name="nombre" value="" placeholder="NOMBRE" />

                <br>
                <label for="direccion">Ingresar la direccion</label>
                <br>
                <input type="text" id="direccion" name="direccion" value="" placeholder="DIRECCION" />
                <br>
                <label for="telefono">Ingresar el telefono</label>
                <br>
                <input type="text" id="telefono" name="telefono" value="" placeholder="TELEFONO" />
                <br>
                <label for="descripcion">Ingresar la descripcion</label>
                <br>
                <input type="text" id="descripcion" name="descripcion" value="" placeholder="DESCRIPCION" />
                <br><br>
                <input class="" type="button" id="enviar" name="enviar" value="ACEPTAR" onclick="crearLocal()" />
                <input type="button" id="salir" name="salir" value="SALIR" />
                <br>
            </fieldset>
        </div>
        <div id='2'>
            <h1>EDITAR LOCAL</h1>
            <form>

                <fieldset>
                    <legend>Elegir local</legend>
                    <label for="nombres">Ingresar el id del local que desea editar</label>
                    <br>
                    <input type="text" id="nombreBuscar" name="nombreBuscar" value="" placeholder="Ingrese el nombre del local" />
                    <input class="txt" type="button" id="enviar" name="enviar" value="BUSCAR" onclick="buscarLocal()" />
                    <br>
                </fieldset>
                <fieldset id="editarLoc">

                </fieldset>

            </form>
        </div>
        <div id='3'>
            <h1>ELIMINAR LOCAL</h1>
            <form>
                <fieldset>
                    <legend>Eliminar Local</legend>
                    <label for="nombres">Ingresar el nombre del local que desea eliminar</label>
                    <br>
                    <input type="text" id="nombreEliminar" name="nombreEliminar" value="" placeholder="Ingrese correctamente el nombre" />
                    <input class="txt" type="button" id="eliminar" name="eliminar" value="ELIMINAR" onclick="eliminarLocal()" />
                    <br>
                </fieldset>
            </form>
        </div>
    </form>
    <table id='tab_local' border>

        <tr>
            <br>
            <th>NOMBRE</th>
            <th>DIRECCION</th>
            <th>TELEFONO</th>
            <th>DESCRIPCION</th>
        </tr>


        <?php
        $sql = "SELECT * FROM local where loc_eliminado='0'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo " <td>" . $row['loc_nombre'] . "</td>";
                echo " <td>" . $row['loc_direccion'] . "</td>";
                echo " <td>" . $row['loc_telefono'] . "</td>";
                echo " <td>" . $row["loc_descripcion"] . "</td>";
                #echo "<br>";
            }
        } else {

            echo "<tr>";
            echo " <td colspan='7'> No existen locales </td> ";
            echo "</tr>";
        }

        ?>
    </table border>
</body>

</html>