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
    $codigo = $_GET["codigo"];
    $sql = "SELECT * FROM usuario where usu_codigo=$codigo";
    $row = $conn->query($sql)->fetch_assoc();

    ?>