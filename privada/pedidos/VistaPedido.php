<!DOCTYPE html>
<html>

<head>
    <title>
        Pedido
    </title>
    <script type="text/javascript" src="metodos.js"></script>
    <link href="estilo.css" rel="stylesheet" />
</head>

<body onload="cambiar('1')">
    <?php
    include '../../config/conexionBD.php';
    ?>
    <input type="button" onclick="cambiar('1')" value="Listar Pedidos Pendientes">
    <input type="button" onclick="cambiar('2')" value="Listar Pedidos Entregados">
    <input type="button" onclick="cambiar('3')" value="Buscar Pedido">
    <input type="button" onclick="cambiar('4')" value="Editar Entrega">


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