var municipio = document.getElementById("municipio");
var localidad = document.getElementById("localidad");

municipio.addEventListener("change", function() {
    fetch('/controladores/localidades.php?municipio=' + municipio.value)
  .then(response => response.json())
  .then(data => {
        // Elimina las opciones actuales del combobox de localidades
        while (localidad.options.length > 0) {
            localidad.remove(0);
        }

        // Agrega las nuevas opciones al combobox de localidades
        for (var i = 0; i < data.length; i++) {
            var opcion = document.createElement("option");
            opcion.text = data[i][1];
            opcion.value = data[i][0];
            localidad.add(opcion);
        }
  });
});

function limpiar(){
    //obtenemos todos los input
    var tipo = document.getElementById("tipo_vivienda");
    var propietario = document.getElementById("propietario");
    var alquilada = document.getElementById("alquilada");
    var material = document.getElementById("material");
    var saneamiento = document.getElementById("saneamiento");
    var agua = document.getElementById("servicio_agua");
    var luz = document.getElementById("servicio_luz");
    var drenaje = document.getElementById("servicio_drenaje");
    var habitaciones = document.getElementById("num_habitaciones");
    var banos = document.getElementById("num_banos");
    var direccion = document.getElementById("direccion");
    var municipio = document.getElementById("municipio");
    var localidad = document.getElementById("localidad");

    //ponemos valores vacios
    tipo.value = "";
    propietario.checked = false;
    alquilada.checked = false;
    material.value = "";
    saneamiento.value = "";
    agua.checked = false;
    luz.checked = false;
    drenaje.checked = false;
    habitaciones.value = "";
    banos.value = "";
    direccion.value = "";
    municipio.value = "";
    localidad.value = "";
}