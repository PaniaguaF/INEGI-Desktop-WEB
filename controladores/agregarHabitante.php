<?php
  $id = $_POST["id"];
  $idVivienda = $_POST["idVivienda"];
  $nombre = $_POST["nombre"];
  $edad = $_POST["edad"];
  $sexo = $_POST["sexo"];
  $edo_civil = $_POST["edo_civil"];
  $nivel_educativo = $_POST["nivel_educativo"];
  $ingresos = $_POST["ingresos"];
  $nacionalidad = $_POST["nacionalidad"];
  $idocupacion = $_POST["ocupacion"];

  $bool = true;
  $conn = mysqli_connect("localhost", "root", "", "db_censo");
  $sqlSelect = "select * from habitante where idhabitante=".$id;
  $resultado = mysqli_query($conn, $sqlSelect);
  while ($fila = mysqli_fetch_array($resultado)) {
    $bool = false;
  }

  if($bool) {
    $sql = "INSERT INTO habitante (idhabitante, nombre, edad, sexo, edo_civil, nivel_educativo, ingresos, nacionalidad, vivienda_idvivienda) VALUES ('$id', '$nombre', '$edad', '$sexo', '$edo_civil', '$nivel_educativo', '$ingresos', '$nacionalidad', '$idVivienda');";
    $sql2 = "DELETE FROM habitante_ocupacion WHERE habitante_idhabitante = $id;";
    $sql3 = "INSERT INTO habitante_ocupacion (habitante_idhabitante, ocupacion_idocupacion) VALUES($id, $idocupacion);";
    if(mysqli_query($conn, $sql) and mysqli_query($conn, $sql2) and mysqli_query($conn, $sql3)) {
        echo "<a>Registro guardado exitosamente</a>";
    } else {
        echo "Error al guardar el registro: " . mysqli_error($conn);
    }
  } else {
    echo "<a>Ya hay alguien registrado con este ID</a>";
  }
  mysqli_close($conn);
?>