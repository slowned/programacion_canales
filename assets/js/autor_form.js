var formulario = document.getElementById("autorForm"),
    elementos = formulario.elements,
    boton = document.getElementById("btn");

function validarNombre(e) {
    if(formulario.nombre.value !== ""){
        if(/^[A-Za-z]+$/.test(formulario.nombre.value)){
            return true;
        } else { 
              alert("el nombre solo puede contener letras");
              e.preventDefault();
              return false;
        }
    } else {
        alert("Completa el campo nombre");
        e.preventDefault();
    }
}

function validarApellido(e){
    if(formulario.apellido.value !== ""){
        if(/^[A-Za-z]+$/.test(formulario.apellido.value)){
            return true;
        } else { 
              alert("el campo apellido solo puede contener letras");
              e.preventDefault();
              return false;
        }
    } else {
        alert("Completa el campo apellido");
        e.preventDefault();
    }
}

function validar(e){
  validarApellido(e);
  validarNombre(e);
}
