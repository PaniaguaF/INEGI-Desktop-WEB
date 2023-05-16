<?php
if (isset($_GET['municipio'])) {
    $conn = mysqli_connect("localhost", "root", "", "db_censo");
    $municipio = mysqli_real_escape_string($conn, $_GET['municipio']);
    $sql = "SELECT * FROM localidades WHERE municipio_idmunicipio=$municipio";
    $resultado = mysqli_query($conn, $sql);
    $opciones = array();

    while ($fila = mysqli_fetch_array($resultado)) {
        $opcion = array();
        array_push($opcion, $fila['idlocalidades']);
        array_push($opcion, $fila['nombre_localidad']);
        array_push($opciones, $opcion);
    }

    mysqli_close($conn);
    // Devuelve las opciones del combobox de localidades como un objeto JSON
    header('Content-type: application/json');
    echo json_encode($opciones);
    }
?>