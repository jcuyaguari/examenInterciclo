<?php
session_start();
$_SESSION['isLogged'] = FALSE;
session_destroy();
header("Location: /examenInterciclo/publica/user/login.html");
?>