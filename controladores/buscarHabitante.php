<?php
if (isset($_GET['Id'])) {
    $conn = mysqli_connect("localhost", "root", "", "db_censo");
    $id = mysqli_real_escape_string($conn, $_GET['Id']);
    $sql = "SELECT * FROM habitante WHERE idhabitante=$id";
    $resultado = mysqli_query($conn, $sql);
    $opciones = array();

    while ($fila = mysqli_fetch_array($resultado)) {
        array_push($opciones, $fila);
    }
    $sql = "SELECT ocupacion_idocupacion FROM habitante_ocupacion WHERE habitante_idhabitante=$id";
    $resultado = mysqli_query($conn, $sql);

    while ($fila = mysqli_fetch_array($resultado)) {
        array_push($opciones, $fila);
    }
    mysqli_close($conn);
    // Devuelve las opciones del combobox de localidades como un objeto JSON
    header('Content-type: application/json');
    echo json_encode($opciones);
    }
?>