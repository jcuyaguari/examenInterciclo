<?php
 session_start();
 if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE || $_SESSION['rol']=== 'admin'){
 header("Location: /examenInterciclo/publica/user/login.html");
 }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
    <link rel="stylesheet" type="text/css" href="disenio.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

</head>


<body onload="cambiar('dos')">
    <?php
    include '../../config/conexionBD.php';
    ?>

    <header>

        <h1 class='elegantshadow'>CRUD PRODUCTO</h1>
    </header>
    <ul>
        <li>

            <a href=" #" onclick="cambiar('uno')">
                <div class="name" data-text="Home">CREAR</div>
                <div class="icon">
                <i class="fa fa-plus-square" aria-hidden="true"></i>
                <i class="fa fa-plus-square" aria-hidden="true"></i>
                
                </div>

            </a>
        </li>

        <li>
            <a href="#" onclick="cambiar('dos')">
                <div class="name" data-text="Home">LISTAR</div>
                <div class="icon">
                <i class="fa fa-list" aria-hidden="true"></i>
                <i class="fa fa-list" aria-hidden="true"></i>
                </div>

            </a>
        </li>

        <li>
            <a href="#" onclick="cambiar('tres')">
                <div class="name" data-text="Home">BUSCAR ELIMINAR</div>
                <div class="icon">
                <i class="fa fa-search" aria-hidden="true"></i>   
                <i class="fa fa-search" aria-hidden="true"></i>   
                </div>

            </a>
        </li>

        <li>
            <a href="#" onclick="cambiar('cuatro')">
                <div class="name" data-text="Home">ACTUALIZAR</div>
                <div class="icon">
                <i class="fa fa-pencil-square" aria-hidden="true"></i>
                <i class="fa fa-pencil-square" aria-hidden="true"></i>
                </div>

            </a>
        </li>
    </ul>
    <form class="form-horizontal" id="formProducto" enctype="multipart/form-data">
        <input id='opc' name='opc' hidden>
        <div id='uno'>

            <table border>
                <tr>
                    <td><label for="nombre">Nombre(*)</label></td>
                    <td><input class="txt" type="text" id="nombre" name="nombre" value="" placeholder="Ingrese el nombre del producto" required><br>
                    </td>
                </tr>

                <tr>
                    <td><label for="tipo">Tipo(*)</label></td>
                    <td><select class="txt" id='tipo' name='tipo' required>
                            <option value="Planta">Planta</option>
                            <option value="Arreglo">Arreglo</option>
                            <option value="Flor">Flor</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td><label for="precio">Precio(*)</label></td>
                    <td><input class="txt" type="number" id="precio" name="precio" value="" placeholder="Ingrese precio del producto" required /><br>
                </tr>

                <tr>
                    <td><label for="stock">Stock(*)</label></td>
                    <td><input class="txt" type="number" id="stock" name="stock" value="" placeholder="Ingrese cantidad de productos a ingresar" required /><br>
                </tr>


                <tr>
                    <td><label for="file">Imagen(*)</label></td>

                    <td style="text-align: center">
                        <div id="list" ></div>
                        <input type="file" id="files" name="files" value="Seleccionar Imagen" />
                        <br/>
                        <script>
                            function archivo(evt) {
                                var files = evt.target.files;
                                for (var i = 0, f; f = files[i]; i++) {
                                    if (!f.type.match('image.*')) {
                                        continue;
                                    }
                                    var reader = new FileReader();

                                    reader.onload = (function(theFile) {
                                        return function(e) {
                                            document.getElementById("list").innerHTML = ['<img id="img" style="width: 383px; height: 245px;" src="', e.target.result, '" title="', escape(theFile.name), '"/>'].join('');
                                        };
                                    })(f);

                                    reader.readAsDataURL(f);
                                }
                            }

                            document.getElementById('files').addEventListener('change', archivo, false);
                        </script>
                    </td>
                </tr>
                <tr>
                    <td colspan=" 2" style="text-align: center">
                        <input class="txt" type="button" id="enviar" name="enviar" value="GUARDAR PRODUCTO" onclick="guardarProducto()" />
                    </td>
                </tr>
            </table border>


        </div>

        <div id='dos'>
            <table border>
                <tr>
                    <th>CODIGO</th>
                    <th>NOMBRE</th>
                    <th>PRECIO</th>
                    <th>STOCK</th>
                    <th>IMAGEN</th>
                </tr>

                <?php

                $sql = "SELECT * FROM productos WHERE pro_eliminado = 0";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo " <td>" . $row["pro_codigo"] . "</td>";
                        echo " <td>" . $row["pro_nombre"] . "</td>";
                        echo " <td>" . $row['pro_precio'] . "</td>";
                        echo " <td>" . $row['pro_stock'] . "</td>";
                        echo ' <td><img style="width: 383px; height: 245px;" src="data:image/jpg;base64,' . base64_encode($row['pro_imagen']) . '"></td></tr>';
                    }
                } else {
                    echo "<tr>";
                    echo " <td colspan='7'> No existen productos </td> ";
                    echo "</tr>";
                }
                ?>
            </table border>

        </div>
        <div id='tres'>
            <label for="precio">INGRESE CODIGO O NOMBRE DEL PRODUCTO</label><br>
            <input class="txt" type="text" id="buscarP" name="buscarP" value="" onkeyup="buscar(this.value)" placeholder="Ingrese el codigo o nombre" />
            <div id="busqueda">
            </div>
        </div>
        <div id='cuatro'>
            <label for="precio">INGRESE CODIGO O NOMBRE DEL PRODUCTO</label><br>
            <input class="txt" type="text" id="actualizarP" name="actualizarP" value="" onkeyup="buscarAct(this.value)" placeholder="Ingrese el codigo o nombre" />
            <br>
            <br>
            <div id="actualizacion">
            </div>
        </div>
        <?php
        $conn->close();
        ?>
    </form>
    <script src="//code.jquery.com/jquery-latest.js"></script>
    <script src="controlador.js"></script>
</body>
<section>

</section>

</html>