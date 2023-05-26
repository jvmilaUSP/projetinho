// SCRIPT DE ANDAR
var selectAndar = document.getElementById("andarSelect");
    var divs = document.getElementsByTagName("div");

    selectAndar.addEventListener("change", function() {
      var selectedOption = this.value;
      
      for (var i = 0; i < divs.length; i++) {
        var div = divs[i];
        
        if (div.id === selectedOption) {
          div.classList.remove("hide");
        } else {
          div.classList.add("hide");
        }
      }
    });