var Id = document.getElementById("id");

//accede a todos los textbox
var nombre = document.getElementById("nombre");
var edad = document.getElementById("edad");
var sexo = document.getElementById("sexo");
var edo_civil = document.getElementById("edo_civil");
var nivel = document.getElementById("nivel_educativo");
var ingresos = document.getElementById("ingresos");
var nacionalidad = document.getElementById("nacionalidad");
var vivienda = document.getElementById("idVivienda");
var ocupacion = document.getElementById("ocupacion");

function buscar(){
    fetch('/controladores/buscarHabitante.php?Id=' + Id.value)
  .then(response => response.json())
  .then(data => {
    console.log(data);
    //Le pone los valores encontrados a cada text
    nombre.value = data[0][1];
    edad.value = data[0][2];
    sexo.value = data[0][3];
    edo_civil.value = data[0][4];
    nivel.value = data[0][5];
    ingresos.value = data[0][6];
    nacionalidad.value = data[0][7];
    vivienda.value = data[0][8];
    ocupacion.value = data[1][0];
    console.log(data[1][0]);
  });
}

function actualizar(){
    // Construye la URL con los parámetros GET
    var url = "/controladores/actualizarHabitante.php?id=" + Id.value + "&nombre=" + nombre.value + "&edad=" + edad.value + "&sexo=" + sexo.value + "&edo_civil=" + edo_civil.value + "&nivel_educativo=" + nivel.value + "&ingresos=" + ingresos.value + "&nacionalidad=" + nacionalidad.value + "&vivienda=" + vivienda.value + "&ocupacion=" + ocupacion.value;

    // Redirige a la página PHP con los parámetros GET
    window.location.href = url;
}

function limpiar(){
    nombre.value = "";
    edad.value = "";
    sexo.value = "";
    edo_civil.value = "";
    nivel.value = "";
    ingresos.value = "";
    nacionalidad.value = "";
    vivienda.value = "";
    ocupacion.value = "";
}