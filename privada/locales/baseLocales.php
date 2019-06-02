<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <h1>hola</h1>
    <?php
    include '../../config/conexionBD.php';
    $opc = $_GET['opc'];

    switch ($opc) {
        case 'crear':
            $nombre  = mb_strtoupper($_GET['nombre']);
            $direccion = mb_strtoupper($_GET['direccion']);
            $telefono = ($_GET['telefono']);
            $descripcion = ($_GET['descripcion']);

            $sql = "INSERT INTO local VALUES (0, '$nombre', '$direccion', '$telefono', '$descripcion' ,0)";
            if ($conn->query($sql) === TRUE) {
                echo "TRUE";
            } else {
                if ($conn->error == 1062) {
                    echo "<p class='error'>El local ya esta registrado </p>";
                } else {
                    echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
                }
            }
            //cerrar la base de datos
            break;
        case 'buscar':

            break;
        case 'modificar':
            $nombre  = mb_strtoupper($_GET['nombre']);
            $direccion = mb_strtoupper($_GET['direccion']);
            $telefono = ($_GET['telefono']);
            $descripcion = ($_GET['descripcion']);
            //$eliminado = ($_GET['eliminado']);

            $sql = "UPDATE local SET (0, '$nombre', '$direccion', '$telefono', '$descripcion' ,0) WHERE loc_nombre='$nombre'";
            if ($conn->query($sql) === TRUE) {
                echo "TRUE";
            } else {
                if ($conn->error == 1062) {
                    echo "<p class='error'>El local ya esta registrado </p>";
                } else {
                    echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
                }
            }
            break;
        case 'eliminar':
            $nombre  = mb_strtoupper($_GET['nombre']);

            //$sql = "UPDATE INTO local where loc_nombre=$nombre VALUES loc_eliminado=(1)";


            $sql = "UPDATE local SET loc_eliminado=1 WHERE loc_nombre='$nombre'";
            if ($conn->query($sql) === TRUE) {
                echo "TRUE";
            } else {

                echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
            }
            break;
    }
    $conn->close();
    ?>
</body>

</html>