var formulario = document.getElementById("userForm"),
    elementos = formulario.elements,
    boton = document.getElementById("btn");

function validarEmail(e) {
    if(formulario.email.value !== ""){
        if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3k})+$/.test(formulario.email.value)){
            return true;
        } else {
              alert("se ha ingresado un email incorrecto");
              e.preventDefault();
              return false;
        }

    } else {
        alert("Completa el campo email");
        e.preventDefault();
    }
}

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

function validarApellido(e){
    if(formulario.surname.value !== ""){
        if(/^[A-Za-z]+$/.test(formulario.surname.value)){
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
function validarFoto(e){
    if(formulario.profile_pic.value !== ""){
        return true;
    } else {
        alert("Seleccione una foto");
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
  validarEmail(e);
  validarNombre(e);
  validarApellido(e);
  validarFoto(e);
  validarPass(e);
  comparar(e);
}

