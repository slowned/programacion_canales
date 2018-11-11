(function(){
    var form = document.getElementById("userForm"),
        inputName = document.getElementById("name"),
        btn = document.getElementById("btn");

    var validarNombre = function(e){
        var name = form.name.value;
        if(name !== ""){
            if(/^[A-Za-z]+$/.test(name)){
                return true;
            } else {
                inputName.setAttribute("placeholder", "el nombre solo puede contener letras");
                inputName.className = "error";
                e.preventDefault();
                return false;
            }

        } else {
              inputName.setAttribute("placeholder", "Debe completar el campo nombre");
              inputName.className = "error";
              e.preventDefault();
              return false;
        }
    };
    var validarPass = function(){};

    btn.addEventListener("click", validarNombre);
}())
