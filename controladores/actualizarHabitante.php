<?php
    $id = $_GET['id'];
    $nombre = $_GET['nombre'];
    $edad = $_GET['edad'];
    $sexo = $_GET['sexo'];
    $edo_civil = $_GET['edo_civil'];
    $nivel_educativo = $_GET['nivel_educativo'];
    $ingresos = $_GET['ingresos'];
    $nacionalidad = $_GET['nacionalidad'];
    $vivienda = $_GET['vivienda'];
    $idocupacion = $_GET['ocupacion'];

    $bool = false;
    $conn = mysqli_connect("localhost", "root", "", "db_censo");
    $sqlSelect = "select * from habitante where idhabitante=".$id;
    $resultado = mysqli_query($conn, $sqlSelect);
    while ($fila = mysqli_fetch_array($resultado)) {
        $bool = true;
    }

    if($bool) {
        $sql = "UPDATE habitante SET nombre='$nombre', edad=$edad, sexo='$sexo', edo_civil='$edo_civil', nivel_educativo='$nivel_educativo', ingresos=$ingresos, nacionalidad='$nacionalidad', vivienda_idvivienda=$vivienda WHERE idhabitante=$id";
        $sql2 = "DELETE FROM habitante_ocupacion WHERE habitante_idhabitante = $id;";
        $sql3 = "INSERT INTO habitante_ocupacion (habitante_idhabitante, ocupacion_idocupacion) VALUES($id, $idocupacion);";
        if(mysqli_query($conn, $sql) and mysqli_query($conn, $sql2) and mysqli_query($conn, $sql3)) {
            echo "<a>Registro actualizado exitosamente</a>";
        } else {
            echo "Error al actualizar el registro: " . mysqli_error($conn);
        }
    } else {
        echo "<a>Aun no hay alguien registrado con este ID</a>";
    }
    mysqli_close($conn);
?>