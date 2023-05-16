<?php
// Conectar a la base de datos
$conn = mysqli_connect("localhost", "root", "", "db_censo");

// Verificar si se pudo conectar a la base de datos
if ($conn->connect_error) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
}

// Obtener el usuario y contraseña enviados por el formulario
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

// Consultar la base de datos para verificar si el usuario y la contraseña son válidos
$sql = "SELECT * FROM login_usuario WHERE usuario = '$usuario' AND pass = '$contrasena'";
$resultado = $conn->query($sql);

// Verificar si se encontró un usuario con el nombre de usuario y contraseña ingresados
if ($resultado->num_rows == 1) {
    // Si el usuario y contraseña son válidos, se redirige al usuario a la página "pagina.html"
    header('Location: ../registro/vivienda');
    exit;
} else {
    // Si el usuario y/o contraseña son incorrectos, se muestra un mensaje de error
    echo '<p>Usuario y/o contraseña incorrectos.</p>';
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
