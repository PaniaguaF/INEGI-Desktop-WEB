<?php
// Obtenemos los valores enviados desde el formulario
$tipo_vivienda = $_POST['tipo_vivienda'];
$tendencia = $_POST['tendencia'];
$material = $_POST['material'];
$saneamiento = $_POST['saneamiento'];
$servicio_agua = isset($_POST['servicio_agua']) ? 1 : 0;
$servicio_luz = isset($_POST['servicio_luz']) ? 1 : 0;
$servicio_drenaje = isset($_POST['servicio_drenaje']) ? 1 : 0;
$num_habitaciones = $_POST['num_habitaciones'];
$num_banos = $_POST['num_banos'];
$direccion = $_POST['direccion'];
$municipio = $_POST['municipio'];
$localidad = $_POST['localidad'];

// Conectamos a la base de datos
$conn = mysqli_connect("localhost", "root", "", "db_censo");

// Preparamos la consulta SQL para insertar los datos en la tabla vivienda
$sql = "INSERT INTO vivienda (tipo_vivienda, material, saneamiento, agua, luz, drenaje, tendencia, direccion, num_habitaciones, num_banios, localidades_idlocalidades, localidades_municipio_idmunicipio) VALUES ('$tipo_vivienda', '$material', '$saneamiento', $servicio_agua, $servicio_luz, $servicio_drenaje, '$tendencia', '$direccion', $num_habitaciones, $num_banos, $localidad, $municipio)";

// Preparamos la consulta SQL para insertar los datos en la tabla vivienda
$sql = "INSERT INTO vivienda (tipo_vivienda, material, saneamiento, agua, luz, drenaje, tendencia, direccion, num_habitaciones, num_banios, localidades_idlocalidades, localidades_municipio_idmunicipio) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Preparamos la sentencia
$stmt = mysqli_prepare($conn, $sql);

// Verificamos si la preparación de la sentencia fue exitosa
if ($stmt) {
    // Vinculamos los parámetros con los valores de las variables
    mysqli_stmt_bind_param($stmt, "sssiisssiiss", $tipo_vivienda, $material, $saneamiento, $servicio_agua, $servicio_luz, $servicio_drenaje, $tendencia, $direccion, $num_habitaciones, $num_banos, $localidad, $municipio);

    // Ejecutamos la sentencia preparada
    if (mysqli_stmt_execute($stmt)) {
        // Obtenemos el ID de la vivienda insertada
        $idvivienda = mysqli_insert_id($conn);

        echo "Registro creado correctamente<br>";
        echo "Id de Vivienda: " . $idvivienda;
    } else {
        echo "Error al ejecutar la consulta: " . mysqli_stmt_error($stmt);
    }
} else {
    echo "Error en la preparación de la consulta: " . mysqli_error($conn);
}

// Cerramos la conexión a la base de datos
mysqli_close($conn);

?>
