<!DOCTYPE html>
<html>

<head>
    <title>
        Locales
    </title>
    <script type="text/javascript" src="metodos.js"></script>
</head>

<body onload="cambiar('1')">
    <?php
    include '../config/conexionBD.php';
    ?>
    <input type="button" onclick="cambiar('1')" value="A&Ntilde;ADIR NUEVO LOCAL">

    <input type="button" onclick="cambiar('2')" value="EDITAR LOCAL">

    <input type="button" onclick="cambiar('3')" value="ELIMINAR LOCAL">

    <table id='tab_local' style="border-style: solid">
        <tr>

            <th>ID</th>
            <th>NOMBRE</th>
            <th>DIRECCION</th>
            <th>TELEFONO</th>
        </tr>
        <?php
        $sql = "SELECT * FROM local";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo " <td>" . $row["loc_id"] . "</td>";
                echo " <td>" . $row['loc_nombre'] . "</td>";
                echo " <td>" . $row['loc_direccion'] . "</td>";
                echo " <td>" . $row['loc_telefono'] . "</td>";
            }
        } else {

            echo "<tr>";
            echo " <td colspan='7'> No existen locales </td> ";
            echo "</tr>";
        }

        ?>
        <form id="form" method="POST">
            <div id='1'>
                <h1>A&Ntilde;ADIR NUEVO LOCAL</h1>
                <fieldset>
                        <legend>Nuevo Local</legend>
                        <label for="id">Ingresar id</label>
                        <br>
                        <input type="int" id="id" name="id" value="" placeholder="ID" />
                        <br>
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
                        <br><br>
                        <input type="button" id="aceptar" name="aceptar" value="ACEPTAR" />
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
                        <input type="int" id="id" name="id" value="" placeholder="Ingrese solo un numero" />
                        <input type="button" id="editar" name="editar" value="editar" />
                        <br>
                    </fieldset>
                    <fieldset disabled="true">
                        <legend>Editar Local</legend>
                        <label for="nombres">Ingresar el nuevo nombre</label>
                        <br>
                        <input type="int" id="id" name="id" value="" placeholder="NOMBRE" />
                        <input type="button" id="editar" name="editar" value="editar" />
                        <br>
                        <label for="nombres">Ingresar la nueva direccion</label>
                        <br>
                        <input type="int" id="id" name="id" value="" placeholder="DIRECCION" />
                        <input type="button" id="editar" name="editar" value="editar" />
                        <br>
                        <label for="nombres">Ingresar el nuevo telefono</label>
                        <br>
                        <input type="int" id="id" name="id" value="" placeholder="TELEFONO" />
                        <input type="button" id="editar" name="editar" value="editar" />
                        <br>
                    </fieldset>

                </form>
            </div>
            <div id='3'>
                <h1>ELIMINAR LOCAL</h1>
                <form>
                    <fieldset>
                        <legend>Eliminar Local</legend>
                        <label for="nombres">Ingresar el id del local que desea eliminar</label>
                        <br>
                        <input type="int" id="id" name="id" value="" placeholder="Ingrese solo un numero" />
                        <input type="button" id="eliminar" name="eliminar" value="Eliminar" />
                        <br>
                    </fieldset>
                </form>
            </div>
        </form>
</body>

</html>