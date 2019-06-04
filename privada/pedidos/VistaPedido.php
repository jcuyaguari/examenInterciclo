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
        Pedido
    </title>
    <script type="text/javascript" src="metodos.js"></script>
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body onload="cambiar('1')">
    <?php
    include '../../config/conexionBD.php';
    ?>
    <header>

    <h1 class='elegantshadow'>Pedido</h1>
    </header>

    <!-- <input type="button" onclick="cambiar('1')" value="Listar Pedidos Pendientes" style="background-color: red;">
    <input type="button" onclick="cambiar('2')" value="Listar Pedidos Entregados" style="background-color: khaki;">
    <input type="button" onclick="cambiar('3')" value="Buscar Pedido" style="background-color: lightsalmon;">
    <input type="button" onclick="cambiar('4')" value="Editar Entrega" style="background-color: mediumpurple;"> -->

    <!-- desde aquirrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr/ -->
      <ul>
        <li>

            <a href=" #" onclick="cambiar('1')">
                <div class="name" data-text="Home">Listar Pedidos Pendientes</div>
                <div class="icon">
                <i class="fa fa-plus-square" aria-hidden="true"></i>
                <i class="fa fa-plus-square" aria-hidden="true"></i>
                
                </div>

            </a>
        </li>

        <li>
            <a href="#" onclick="cambiar('2')">
                <div class="name" data-text="Home">Listar Pedidos Entregados</div>
                <div class="icon">
                <i class="fa fa-list" aria-hidden="true"></i>
                <i class="fa fa-list" aria-hidden="true"></i>
                </div>

            </a>
        </li>

        <li>
            <a href="#" onclick="cambiar('3')">
                <div class="name" data-text="Home">Buscar Pedido</div>
                <div class="icon">
                <i class="fa fa-search" aria-hidden="true"></i>   
                <i class="fa fa-search" aria-hidden="true"></i>   
                </div>

            </a>
        </li>

        <li>
            <a href="#" onclick="cambiar('4')">
                <div class="name" data-text="Home">Editar Entrega</div>
                <div class="icon">
                <i class="fa fa-pencil-square" aria-hidden="true"></i>
                <i class="fa fa-pencil-square" aria-hidden="true"></i>
                </div>

            </a>
        </li>
    </ul>
    <!-- desde aquirrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr/ -->
    <form id="form" method="POST">
        <div id='1'>
            <h1>
                Listar Pedidos Pendientes
            </h1>
            <h1>A&Ntilde;ADIR NUEVO LOCAL</h1>
            <fieldset>
                <legend>NO ENTREGADOS</legend>
                <table id='tab_pedido' style="border-style: solid">
                    <tr>

                        <th>CLIENTE |</th>
                        <th>FECHA DE PEDIDO |</th>
                        <th>ESTADO |</th>
                        <th>TELEFONO |</th>
                        <th>CLIENTE </th>
                    </tr>
                    <br>
                </table>
            </fieldset>
        </div>
        <div id='2'>
            <h1>A&Ntilde;ADIR NUEVO LOCAL</h1>
            <fieldset>
                <legend>ENTREGADOS</legend>
                <table id='tab_pedido' style="border-style: solid">
                    <tr>

                        <th>CLIENTE</th>
                        <th>FECHA DE PEDIDO</th>
                        <th>ESTADO</th>
                        <th>TELEFONO CLIENTE</th>
                    </tr>
                    <br>
                </table>
            </fieldset>
        </div>
        <div id='3'>
            <h1>A&Ntilde;ADIR NUEVO LOCAL</h1>
            <fieldset>
                <legend>NO ENTREGADOS</legend>
                <h1>hola</h1>
            </fieldset>
        </div>
        <div id='4'>
            <h1>A&Ntilde;ADIR NUEVO LOCAL</h1>
            <fieldset>
                <legend>NO ENTREGADOS</legend>

            </fieldset>
        </div>
    </form>

</body>

</html>