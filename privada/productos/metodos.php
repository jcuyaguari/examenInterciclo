<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <?php
    include '../../config/conexionBD.php';
    $opc = $_POST['opc'];
    switch ($opc) {
        case 'actualizar':
            $nombre  = mb_strtoupper($_POST['nombreA']);
            $tipo = mb_strtoupper($_POST['tipoA']);
            $precio = ($_POST['precioA']);
            $stock = ($_POST['stockA']);
            $codigo = ($_POST['codigoA']);
            $img = addslashes(file_get_contents($_FILES['filesA']['tmp_name']));

            if ($img != null) {
                $sql = "UPDATE  productos SET pro_nombre = '$nombre', pro_precio = '$precio', pro_stock = '$stock', pro_imagen = '$img'  WHERE pro_codigo = $codigo ";
            } else {
                $sql = "UPDATE  productos SET pro_nombre = '$nombre', pro_precio = '$precio', pro_stock = '$stock'  WHERE pro_codigo = $codigo ";
            }


            echo "$sql";
            if ($conn->query($sql) === TRUE) {
                echo '**T**';
            } else {
                echo '**FALSE**';
            }
            break;
        case 'buscar':
            $datos = mb_strtoupper($_POST['buscarP']);
            $sql = "SELECT * FROM productos WHERE pro_eliminado = 0 AND pro_codigo LIKE '%$datos%'  OR  pro_eliminado = 0 AND pro_nombre LIKE '%$datos%'  ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo '<table border>';
                echo  '<tr>';
                echo '   <th>CODIGO</th>';
                echo '    <th>NOMBRE</th>';
                echo '    <th>PRECIO</th>';
                echo '    <th>STOCK</th>';
                echo '    <th>IMAGEN</th>';
                echo '    <th>ACCION</th>';
                echo '</tr>';
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo " <td>" . $row["pro_codigo"] . "</td>";
                    echo " <td>" . $row["pro_nombre"] . "</td>";
                    echo " <td>" . $row['pro_precio'] . "</td>";
                    echo " <td>" . $row['pro_stock'] . "</td>";
                    echo ' <td><img style="width: 383px; height: 245px;" src="data:image/jpg;base64,' . base64_encode($row['pro_imagen']) . '"></td>';
                    echo "<td> <input type='button' value='Eliminar' onclick='eliminar(" . $row['pro_codigo'] . ")'> </td>";
                    echo "</tr>";
                }
                echo "</table border>";
            } else {
                echo "<b>NO SE ENCOTRO EL PRODUCTO</b>";
            }
            break;
        case 'crear':
            $nombre  = mb_strtoupper($_POST['nombre']);
            $tipo = mb_strtoupper($_POST['tipo']);
            $precio = ($_POST['precio']);
            $stock = ($_POST['stock']);
            $img = addslashes(file_get_contents($_FILES['files']['tmp_name']));

            $sql = "INSERT INTO productos VALUES (0, '$nombre', '$tipo', '$precio', '$stock', '$img',0)";
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
        case 'eliminar':
            $codigo  = mb_strtoupper($_POST['cod']);
            $sql = "UPDATE productos SET pro_eliminado = 1 WHERE  pro_codigo = $codigo";
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
        case 'buscarAct':
            $datos = mb_strtoupper($_POST['actualizarP']);
            $sql = "SELECT * FROM productos WHERE pro_eliminado = 0 AND pro_codigo LIKE '%$datos%'  OR  pro_eliminado = 0 AND pro_nombre LIKE '%$datos%'  ";
            $row = $conn->query($sql)->fetch_assoc();
            if ($row > 0) {
                ?>
            <input type="txt" id="codigoA" name="codigoA" value="<?php echo $row['pro_codigo'] ?>" hidden />
            <table border>
                <tr>
                    <td><label for="nombreA">Nombre(*)</label></td>
                    <td><input class="txt" type="text" id="nombreA" name="nombreA" value=" <?php echo $row['pro_nombre'] ?>" placeholder="Ingrese el nombre del producto" required><br>
                    </td>
                </tr>

                <tr>
                    <td><label for="tipoA">Tipo(*)</label></td>
                    <td><select class="txt" id='tipoA' name='tipoA' required>
                            <option value="Planta">Planta</option>
                            <option value="Arreglo">Arreglo</option>
                            <option value="Flor">Flor</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td><label for="precioA">Precio(*)</label></td>
                    <td><input class="txt" type="number" id="precioA" name="precioA" value="<?php echo $row['pro_precio'] ?>" placeholder="Ingrese precio del producto" required /><br>
                </tr>

                <tr>
                    <td><label for="stockA">Stock(*)</label></td>
                    <td><input class="txt" type="number" id="stockA" name="stockA" value="<?php echo $row['pro_stock'] ?>" placeholder="Ingrese cantidad de productos a ingresar" required /><br>
                </tr>


                <tr>
                    <td><label for="filesA">Imagen(*)</label></td>

                    <td style="text-align: center">
                        <div id="listA">
                            <?php echo ' <img id="imgA" style="width: 383px; height: 245px;" src="data:image/jpg;base64,' . base64_encode($row['pro_imagen']) . '">'; ?>
                        </div>
                        <input type="file" id="filesA" name="filesA" value="Seleccionar Imagen" onchange="hola()" />
                        <br />
                    </td>
                </tr>
                <tr>
                    <td colspan=" 2" style="text-align: center">
                        <input class="txt" type="button" id="enviar" name="enviar" value="ACTUALIZAR PRODUCTO" onclick="actualizarProducto()" />
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