var formulario = document.getElementById("userForm"),
    elementos = formulario.elements,
    boton = document.getElementById("btn");

function validarNombre(e) {
    if(formulario.name.value !== ""){
        if(/^[A-Za-z]+$/.test(formulario.name.value)){
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


function validarPass(e){
    if(formulario.password.value !== ""){
      if(/^(?=.*[0-9])|(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/.test(formulario.password.value)){
            return true;
        } else {
              alert("La contrasenia debe contener un numero o un caracter especial \"!@#$%^&*\", mayusculas o minusculas y entre 6 y 16 carecteres");
              e.preventDefault();
              return false;
        }

    } else {
        alert("Completa el campo contrasenia");
        e.preventDefault();
    }
}

function comparar(e){
    if(formulario.password2.value !="" && formulario.password.value !=""){
        if(formulario.password2.value == formulario.password.value){
            return true;
        } else {
            alert("las contrasenias deben ser iguales");
            e.preventDefault();
        }
    } else {
      alert("Complete los campos de contrasenia");
      e.preventDefault();
    }
}

function validar(e){
  validarNombre(e);
  validarPass(e); comparar(e);
}

