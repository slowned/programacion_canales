function validarNombre() {
  var x = document.getElementById("programa").value; 
  if ( x == "") {
    alert("Completar campo Nombre de programa"); 
    return false
  }
}


function validarDescripcion() {
  var x = document.getElementById("descripcion").value; 
  if ( x == "") {
    alert("Completar campo Descripcion"); 
    return false
  }
}

function validarFecha() {
  var x = document.getElementById("fecha").value; 
  if ( x == "") {
    alert("Completar la fecha"); 
    return false
  }
}

function validarHora() {
  var x = document.getElementById("hora_inicio").value; 
  if ( x == "") {
    alert("Completar campo Hora de inicio"); 
    return false
  }
}

function validarDuracion() {
  var x = document.getElementById("duracion").value; 
  if ( x == "") {
    alert("Completar campo duracion"); 
    return false
  }
}
var validarForm = function(e) { 
 a = validarNombre(e);
   b = validarFecha(e);
   c = validarDescripcion(e);
   d = validarHora(e);
   e = validarDuracion(e);
  if (a == false){
    event.preventDefault();
    return false
  }
  if (b == false){
    event.preventDefault();
    return false
  }
  if (c == false){
    event.preventDefault();
    return false
  }
  if (d == false){
    event.preventDefault();
    return false
  }
  if (e == false){
    event.preventDefault();
    return false;
  }
}

var btnSubmit = document.getElementById("btn");
btnSubmit.addEventListener("click", validarForm);
