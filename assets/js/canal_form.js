  function validarCanal() {
    var x = document.getElementById("canal").value; 
    if ( x == "") {
      alert("Completar campo Canal"); 
      
      return false
    }
  }

  function validarNumero() {
    var x = document.getElementById("numero").value; 
    if ( x == "") {
      alert("Completar campo Numero"); 
      return false
    }
  }

  var validarForm = function(e) { 
    a = validarNumero(e); 
    b = validarCanal(e); 
    if (a == false){
      e.preventDefault();
      return false
    }
    if (b == false){
      e.preventDefault();
      return false;
    }
  }

  var btnSubmit = document.getElementById("btn");


  btnSubmit.addEventListener("click", validarForm);
