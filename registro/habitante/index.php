<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registro Habitante</title>
  <link rel="stylesheet" href="/styles/style.css">
</head>
<body>
  <div class="lateral">
    <h2>Menú</h2>
    <ul>
      <li><a type="link" href="../vivienda">Registro de Viviendas</a></li>
      <li><a type="link">Registro de Habitantes</a></li>
    </ul>
  </div>
  <form method="post" action="/controladores/agregarHabitante.php">
    <h1>Habitantes</h1>
    <label for="id">ID:</label>
    <input type="text" name="id" id="id">
	<input type="button" value="Buscar" onclick=buscar()><br><br>
    <label for="idVivienda">idVivienda</label>
    <select name="idVivienda" id="idVivienda">
      <?php
      $conn = mysqli_connect("localhost", "root", "", "db_censo");
      $sql = "SELECT * FROM vivienda";
      $resultado = mysqli_query($conn, $sql);
          while ($fila = mysqli_fetch_array($resultado)) {
            echo "<option value='" . $fila['idvivienda'] . "'>" . $fila['idvivienda'] . "</option>";
          }
      mysqli_close($conn);
      ?>
    </select>
    <label for="nombre">Nombre:</label>
		<input type="text" name="nombre" id="nombre"><br><br>

		<label for="edad">Edad:</label>
		<input type="number" name="edad" id="edad"><br><br>

		<label for="sexo">Sexo:</label>
		<select name="sexo" id="sexo">
			<option value="H">Hombre</option>
			<option value="M">Mujer</option>
		</select><br><br>

		<label for="edo_civil">Estado civil:</label>
		<select name="edo_civil" id="edo_civil">
			<option value="Soltero">Soltero/a</option>
			<option value="Casado">Casado/a</option>
			<option value="Divorciado">Divorciado/a</option>
			<option value="Viudo">Viudo/a</option>
		</select><br><br>

		<label for="nivel_educativo">Nivel educativo:</label>
		<select name="nivel_educativo" id="nivel_educativo">
			<option value="No estudia">No estudia</option>
			<option value="Kinder">Kinder</option>
			<option value="Primaria">Primaria</option>
			<option value="Secundaria">Secundaria</option>
			<option value="Preparatoria">Preparatoria</option>
			<option value="Universidad">Universidad</option>
			<option value="Posgrado">Posgrado</option>
		</select><br><br>

		<label for="ingresos">Ingresos:</label>
		<input type="number" name="ingresos" id="ingresos"><br><br>

		<label for="nacionalidad">Nacionalidad:</label>
		<input type="text" name="nacionalidad" id="nacionalidad"><br><br>

		<label for="ocupacion">Ocupacion:</label>
		<select name="ocupacion" id="ocupacion">
			<?php
			$conn = mysqli_connect("localhost", "root", "", "db_censo");
			$sql = "SELECT * FROM ocupacion";
			$resultado = mysqli_query($conn, $sql);
				while ($fila = mysqli_fetch_array($resultado)) {
					echo "<option value='" . $fila['idocupacion'] . "'>" . $fila['nombre_ocupacion'] . "</option>";
				}
			mysqli_close($conn);
			?>
		</select><br><br>

		<input type="submit" value="Guardar">
        <input type="button" value="Actualizar" onclick="actualizar()">
		<input type="button" value="Limpiar" onclick="limpiar()">
  </form>
  <script src="script.js"></script>
</body>