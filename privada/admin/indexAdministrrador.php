
<?php 
session_start(); 
if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE || $_SESSION['ROL'] === 'USER'){ 
    header("Location: /examenInterciclo/publica/user/login.html"); 
    } 
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="boton.css">
    <title>Administrar</title>
</head>

<body>
    <div class="fondo">

        <div class="nav">
            <a class="a" href="../productos/vista.php">Administrar Productos</a>
            <a class="b " href="../USER/listarusuarios.php">Administrar Usuarios</a>
            <a class="c " href="../Usuarios/controlador/CRUD_CLIENTE.php">Administrar Admin</a>
            <a class="d" href="../Locales/VistaLocal.php">Administrar Locales</a>
            <a class="e" href="../facturas/vista.php">Administrar Facturas</a>
            <a class="f " href="../pedidos/VistaPedido.php">Administrar Pedidos</a>
            <a class="f " href="../../config/cerar_session.php">Cerrar session</a>
        </div>
    </div>


</body>

</html>