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
</head>


<body onload="cambiar('uno')">
    <header>
        <h1 class='elegantshadow'>CRUD PRODUCTO</h1>
    </header>
    <ul>
        <li>

            <a href=" #" onclick="cambiar('uno')">
                <div class="name" data-text="Home">CREAR CLIENTES</div>
                <div class="icon">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    <i class="fa fa-home" aria-hidden="true"></i>
                </div>

            </a>
        </li>

        <li>
            <a href="#" onclick="cambiar('dos')">
                <div class="name" data-text="Home">LISTAR CLIENTES</div>
                <div class="icon">
                    <i class="fa fa-address-card" aria-hidden="true"></i>
                    <i class="fa fa-address-card" aria-hidden="true"></i>
                </div>

            </a>
        </li>

        <li>
            <a href="#" onclick="cambiar('tres')">
                <div class="name" data-text="Home">ACTUALIZAR CLIENTES</div>
                <div class="icon">
                    <i class="fa fa-telegram" aria-hidden="true"></i>
                    <i class="fa fa-telegram" aria-hidden="true"></i>
                </div>

            </a>
        </li>

        <li>
            <a href="#" onclick="cambiar('cuatro')">
                <div class="name" data-text="Home">ELIMINAR CLIENTES</div>
                <div class="icon">
                    <i class="fa fa-envira" aria-hidden="true"></i>
                    <i class="fa fa-envira" aria-hidden="true"></i>
                </div>

            </a>
        </li>
    </ul>

    <div id='uno'>
    <form id="formulario01" method="POST" action=" ">
        <table border>
        <tr>
                <td><label for="tipo">Tipo(*)</label></td>
                <td><select class="txt" id='tipo' name='tipo' required>
                        <option value="ADMIN">ADMIN</option>
                        <option value="USER">USER</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="cedula">Cedula (*)</label></td>
                <td><input class="txt" type="text" id="nombre" name="nombre" value="" placeholder="Ingrese la cedula" required><br>
                </td>
            </tr>

            <tr>
                <td><label for="nombres">Nombres (*)</label></td>
                <td><input class="txt" type="number" id="precio" name="precio" value="" placeholder="Ingrese su nombre" required /><br>
            </tr>

            <tr>
                <td> <label for="apellidos">Apelidos (*)</label></td>
                <td><input class="txt" type="number" id="stock" name="stock" value="" placeholder="Ingrese cantidad de productos a ingresar" required /><br>
            </tr>

            <tr>
                <td> <label for="direccion">Dirección (*)</label></td>
                <td><input class="txt" type="number" id="stock" name="stock" value="" placeholder="Ingrese cantidad de productos a ingresar" required /><br>
            </tr>

            <tr>
                <td><label for="telefono">Teléfono (*)</label></td>
                <td><input class="txt" type="number" id="stock" name="stock" value="" placeholder="Ingrese cantidad de productos a ingresar" required /><br>
            </tr>

            <tr>
                <td> <label for="fecha">Fecha Nacimiento (*)</label></td>
                <td><input class="txt" type="number" id="stock" name="stock" value="" placeholder="Ingrese cantidad de productos a ingresar" required /><br>
            </tr>
            <tr>
                <td> <label for="correo">Correo electrónico (*)</label></td>
                <td><input class="txt" type="number" id="stock" name="stock" value="" placeholder="Ingrese cantidad de productos a ingresar" required /><br>
            </tr>
            <tr>
                <td><label for="correo">Contraseña (*)</label></td>
                <td><input class="txt" type="number" id="stock" name="stock" value="" placeholder="Ingrese cantidad de productos a ingresar" required /><br>
            </tr>

            <tr>
                <td colspan=" 2" style="text-align: center">
                    <input class="txt" type="button" id="enviar" name="enviar" value="Aceptar" onclick="guardarProducto()" />
                    <input class="txt" type="button" id="enviar" name="enviar" value="Cancelar" onclick="guardarProducto()" />
                </td>
            </tr>
        </table border>
    </div>

    <div id='dos'>
        <table id="tablaDatos" border style="width:100%">
            <tr>
                <th>Rol</th>
                <th>Cedula</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>fecha Nacimiento</th>
                <th>Correo</th>
                <th>Contraseña</th>
            </tr>
        </table border>
      
    </div>
    <div id='tres'>
    <td><input type="text" id="cedula" name="cedula" value="" placeholder="Ingrese el número de cedula ..." required /></td>
    <input type="submit" id="actualizar" name="actualizar" value="Actualizar" onclick="Actualizar()" />
    <form id="formulario01" method="POST" action="">
                    <table id="tablaDatos" border style="width:100%">
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
        
                </table border>
                <input type="submit" id="crear" name="crear" value="Aceptar" />
                <input type="reset" id="cancelar" name="cancelar" value="Cancelar" /> 
                </form>
    </div>
    <div id='cuatro'>
        <td><input type="text" id="cedula" name="cedula" value="" placeholder="Ingrese el número de cedula ..." required /></td>
        <input type="submit" id="buscar" name="buscar" value="Buscar" onclick="Buscar()" />
        <form id="formulario01" method="POST" action="">
                    <table id="tablaDatos" border style="width:100%">
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
        
                </table border>
                <input type="submit" id="eliminar" name="eliminar" value="Eliminar" onclick="Eliminar()" />
                <input type="reset" id="cancelar" name="cancelar" value="Cancelar"  onclick="Cancelar()" /> 
                </form>
       
    </div>

</body>
<section>

</section>

</html>