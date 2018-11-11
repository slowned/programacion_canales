  function validarCategoria() {
    var x = document.getElementById("categoria").value; 
    if ( x == "") {
      alert("Completar campo Categoria"); 
      return false
    }
  }

  var validarForm = function(e) { 
    a = validarCategoria(e); 
    if (a == false){
      e.preventDefault()
      return false
    }
  }

  var btnSubmit = document.getElementById("btn");


  btnSubmit.addEventListener("click", validarForm);
