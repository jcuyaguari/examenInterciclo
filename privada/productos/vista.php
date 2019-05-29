<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
    <link rel="stylesheet" type="text/css" href="disenio.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script type="text/javascript" src="controlador.js"></script>
</head>


<body onload="cambiar('uno')">
    <header>
        <h1 class='elegantshadow'>CRUD PRODUCTO</h1>
    </header>
    <ul>
        <li>

            <a href=" #" onclick="cambiar('uno')">
                <div class="name" data-text="Home">CREAR</div>
                <div class="icon">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    <i class="fa fa-home" aria-hidden="true"></i>
                </div>

            </a>
        </li>

        <li>
            <a href="#" onclick="cambiar('dos')">
                <div class="name" data-text="Home">LISTAR</div>
                <div class="icon">
                    <i class="fa fa-address-card" aria-hidden="true"></i>
                    <i class="fa fa-address-card" aria-hidden="true"></i>
                </div>

            </a>
        </li>

        <li>
            <a href="#" onclick="cambiar('tres')">
                <div class="name" data-text="Home">BUSCAR ACTUALIZAR</div>
                <div class="icon">
                    <i class="fa fa-telegram" aria-hidden="true"></i>
                    <i class="fa fa-telegram" aria-hidden="true"></i>
                </div>

            </a>
        </li>

        <li>
            <a href="#" onclick="cambiar('cuatro')">
                <div class="name" data-text="Home">ELIMINAR</div>
                <div class="icon">
                    <i class="fa fa-envira" aria-hidden="true"></i>
                    <i class="fa fa-envira" aria-hidden="true"></i>
                </div>

            </a>
        </li>
    </ul>

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
                <td><label for="imagen">Imagen(*)</label></td>
                <td style="text-align: center">
                    <div id="imagen" style=" width: 383px; height: 220px;">
                    </div>
                    <input type="button" id="btnImagen" value="Cargar iamgen" onclick="onButtonClicked()">
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
        <p>codigo listar</p>
        <p>PUEDE IR LOS DIV LOS FORM LOS QUE QUIERAN </p>
    </div>
    <div id='tres'>
        <p>codigo buscar / modificar</p>
        <p>PUEDE IR LOS DIV LOS FORM LOS QUE QUIERAN </p>
    </div>
    <div id='cuatro'>
        <p>codigo ELIMINAR</p>
        <p>PUEDE IR LOS DIV LOS FORM LOS QUE QUIERAN </p>
    </div>

</body>
<section>

</section>

</html>