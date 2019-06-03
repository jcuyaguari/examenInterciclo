<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <link rel='stylesheet' type='text/css' media='screen' href='estilo.css'>
    <script src='main.js'></script>
</head>

<body>
    <?php
    include '../../config/conexionBD.php';
    $sql = "SELECT * FROM productos WHERE pro_eliminado = 0";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>
            <fieldset style="text-align: center; float: left;">
                <?php echo '<img style="width: 383px; height: 245px;" src="data:image/jpg;base64,' . base64_encode($row['pro_imagen']) . '">'; ?>
                <h1 style="border: double  black 10px;"> <?php echo $row['pro_nombre']; ?></h1>
                <b style="border: dotted  black 2px;"> <?php echo "$ " . $row['pro_precio'] ?></b> <br><br>
                <i style="border: solid  black 2px;"> <?php echo "Unidades Disponibles" . $row['pro_stock']; ?></i><br><br>
                <label class="switch">
                    <input type="checkbox">
                    <span class="slider"></span>
                </label>

            </fieldset>
        <?php
    }
    ?>
        <button name="button"  style="position: relative; margin-top: 20px; margin-left: 25%; height: 100px; width: 400px; float: left;">COMPRAR PRODUCTOS</button>
    <?php
} else {
    echo "<tr>";
    echo " <td colspan='7'> NO EXISTEN PRODUCTOS </td> ";
    echo "</tr>";
}
?>



    <?php
    $conn->close();
    ?>
</body>

</html>