<?php
session_start();

include '../../config/conexionBD.php';

$usuario = isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
$contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;


if ($usuario == 'root' && $contrasena == "root") {
    $_SESSION['isLogged'] = TRUE;
    $_SESSION['ROL'] = 'ADMIN';
    header("Location:  /examenInterciclo/privada/admin/indexAdministrrador.php");
} else {
    $sql = "SELECT * FROM usuario WHERE usu_correo = '$usuario' and usu_password =
    MD5('$contrasena') ";

    echo "".$contrasena . "sadasdasd";
    echo $sql;
    $result = $conn->query($sql);
    $rows = $result->fetch_assoc();
    if ($result->num_rows > 0) {
        if ($rows['usu_rol'] == 'ADMIN' and $rows['usu_eliminado'] == 'N') {
            $_SESSION['isLogged'] = TRUE;
            $_SESSION['ROL'] = 'ADMIN';
            header("Location:  /examenInterciclo/privada/admin/indexAdministrrador.php");
        }else{
            $_SESSION['isLogged'] = TRUE;
            $_SESSION['ROL'] = 'USER';
            header("Location:  /examenInterciclo/publica/menuP/menu.php?codigo=".$rows['usu_codigo']."");
        }
    }else{
        header("Location:  /examenInterciclo/publica/user/login.html");
    }

    $conn->close();
}
