<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registro Vivienda</title>
  <link rel="stylesheet" href="/styles/style.css">
</head>
<body>
<div class="lateral">
    <h2>Menú</h2>
    <ul>
      <li><a type="link">Registro de Viviendas</a></li>
      <li><a type="link" href="../habitante">Registro de Habitantes</a></li>
    </ul>
  </div>
  <form method="post" action="/controladores/agregarVivienda.php">
    <h1>Viviendas</h1>
    <label for="tipo_vivienda">Tipo de vivienda:</label>
    <select id="tipo_vivienda" name="tipo_vivienda">
      <option value="casa">Casa</option>
      <option value="departamento">Departamento</option>
      <option value="oficina">Oficina</option>
      <option value="vecindad">Vecindad</option>
    </select>
    <br>
    <label for="tendencia">Tendencia:</label>
    <br>
    <input type="radio" id="propietario" name="tendencia" value="propietario">
    <label for="propietario">Propia</label>
    <br>
    <input type="radio" id="alquilada" name="tendencia" value="alquilada">
    <label for="alquilada">Alquilada</label>
    <br><br><br>
    <label for="material">Material:</label>
    <select id="material" name="material">
      <option value="concreto">Vivienda de concreto</option>
      <option value="adobe">Vivienda de adobe (antiguo)</option>
      <option value="ladrillo">Vivienda de ladrillo</option>
      <option value="madera">Vivienda de madera</option>
      <option value="carton">Vivienda de carton</option>
      <option value="piedra">Casa de piedra</option>
      <option value="prefabricada">Vivienda prefabricada</option>
      <option value="ecologico">Material ecologico</option>
      <option value="paja">Casa de paja, ramas o caña</option>
      <option value="adobe_moderno">Material adobe moderno</option>
    </select>
    <br>
    <label for="saneamiento">Saneamiento:</label>
    <select id="saneamiento" name="saneamiento">
        <option value="drenaje">Drenaje</option>
        <option value="fosa_septica">Fosa séptica</option>
        <option value="letrina">Letrina</option>
    </select>
    <br>
    <label for="servicio_agua">Servicio de agua:</label>
    <input type="checkbox" id="servicio_agua" name="servicio_agua" value="1">
    <br>
    <label for="servicio_luz">Servicio de luz:</label>
    <input type="checkbox" id="servicio_luz" name="servicio_luz" value="1">
    <br>
    <label for="servicio_drenaje">Servicio de drenaje:</label>
    <input type="checkbox" id="servicio_drenaje" name="servicio_drenaje" value="1">
    <br><br><br>
    <label for="num_habitaciones">Número de habitaciones:</label>
    <input type="number" id="num_habitaciones" name="num_habitaciones">
    <br>
    <label for="num_banos">Número de baños:</label>
    <input type="number" id="num_banos" name="num_banos">
    <br>
    <label for="direccion">Dirección:</label>
    <input type="text" id="direccion" name="direccion">
    <label for="municipio">Municipio:</label>
    <select name="municipio" id="municipio">
      <option value="">--Selecciona un municipio--</option>
      <?php
      $conn = mysqli_connect("localhost", "root", "", "db_censo");
      $sql = "SELECT * FROM municipio";
      $resultado = mysqli_query($conn, $sql);
          while ($fila = mysqli_fetch_array($resultado)) {
            echo "<option value='" . $fila['idmunicipio'] . "'>" . $fila['nombre_municipio'] . "</option>";
          }
      mysqli_close($conn);
      ?>
    </select>
    <label for="localidad">Localidad</label>
    <select name="localidad" id="localidad">
      <option value="">Selecciona un municipio primero</option>
    </select>
    <input type="submit" value="Guardar">
    <input type="button" value="Limpiar" onclick="limpiar()">
  </form>
  <script src="script.js"></script>
</body>