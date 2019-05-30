<?php
session_start();
if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE) {
    header("Location: /SistemaDeGestion/public/vista/login.html");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Gestión de usuario USER</title>
    <link rel='stylesheet' type='text/css' href='css/estilo.css'>
    <script type="text/javascript" src="js/metodos.js"></script>

</head>

<body onload="cambiar('1')">
    <?php
    include '../../../config/conexionBD.php';
    ?>
    <ul class="menu">
        <li><a href="#" onclick="cambiar('1')" title="Enlace genérico">CORREOS</a></li>
        <li><a href="#" onclick="cambiar('2')" title="Enlace genérico">NUEVO CORREO</a></li>
        <li><a href="#" onclick="cambiar('3')" title="Enlace genérico">MI CUENTA</a></li>
        <li><a href="#" onclick="cambiar('4')" title="Enlace genérico">BUSCAR CORREO</a></li>
    </ul>
    <?php
    $codigo = $_GET["codigo"];
    $sql = "SELECT * FROM usuario where usu_codigo=$codigo";
    $row = $conn->query($sql)->fetch_assoc();
    ?>