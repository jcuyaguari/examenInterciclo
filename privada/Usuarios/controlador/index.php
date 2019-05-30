<!DOCTYPE html>
<html>

<head>
    <title>
       Clientes
    </title>
    <script type="text/javascript" src="metodos.js"></script>
</head>

<body onload="cambiar('1')">
    <?php
    include '../config/conexionBD.php';
    ?>
    <input type="button" onclick="cambiar('1')" value="Crear Usuario">
    <input type="button" onclick="cambiar('2')" value="Listar Clientes">
    <input type="button" onclick="cambiar('3')" value="Actualizar Clientes">
    <input type="button" onclick="cambiar('4')" value="Eliminar Clientes">
   
    <div id='1'>
    <form id="formulario01" method="POST" action=" ">
        <fieldset>
            <legend>Creacion de usuarios</legend>
            <label for="cedula">Cedula (*)</label>
            <input type="text" id="cedula" name="cedula" value="" placeholder="Ingrese el número de cedula ..."
                required />
            <br>
            <label for="nombres">Nombres (*)</label>
            <input type="text" id="nombres" name="nombres" value="" placeholder="Ingrese sus dos nombres..." required />
            <br>
            <label for="apellidos">Apelidos (*)</label>
            <input type="text" id="apellidos" name="apellidos" value="" placeholder="Ingrese sus dos apellidos..."
                required />
            <br>
            <label for="direccion">Dirección (*)</label>
            <input type="text" id="direccion" name="direccion" value="" placeholder="Ingrese su dirección ..."
                required />
            <br>
            <label for="telefono">Teléfono (*)</label>
            <input type="text" id="telefono" name="telefono" value="" placeholder="Ingrese su número telefónico..."
                required />
            <br>
            <label for="fecha">Fecha Nacimiento (*)</label>
            <input type="date" id="fechaNacimiento" name="fechaNacimiento" value=""
                placeholder="Ingrese sufecha de nacimiento ..." required />
            <br>
            <label for="correo">Correo electrónico (*)</label>
            <input type="email" id="correo" name="correo" value="" placeholder="Ingrese su correo electrónico..."
                required />
            <br>
            <label for="correo">Contraseña (*)</label>
            <input type="password" id="contrasena" name="contrasena" value="" placeholder="Ingrese sucontraseña ..."
                required />
            <br>
            <label for="rol">Tipo de Usuario (*)</label>
            <input list="browsers" name="rol" id="rol">
            <datalist id="browsers">
                <option value="ADMIN">
                <option value="USER">
            </datalist>

            <br>
            <input type="submit" id="crear" name="crear" value="Aceptar" />
            <input type="reset" id="cancelar" name="cancelar" value="Cancelar" />
    </form>
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