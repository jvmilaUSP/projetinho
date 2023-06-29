// SCRIPT DE ANDAR
var selectElement = document.getElementById("andarSelect");
    var divs = document.getElementsByClassName("andar");

    selectElement.addEventListener("change", function() {
      var selectedOption = this.value;

      for (var i = 0; i < divs.length; i++) {
        var div = divs[i];
        if (selectedOption === "0"){
            div.classList.remove("hide");
        }
        else if (div.id === selectedOption) {
          div.classList.remove("hide");
        } else {
          div.classList.add("hide");
        }
      }
    });


    //SCRIPT DA CAIXA DE PESQUISA
    var caixaPesquisa = document.getElementById("txtBusca");
    var divs2 = document.getElementsByClassName("blocorestaurante");
    
    caixaPesquisa.addEventListener("input", function() {
      var textoPesquisa = this.value.toLowerCase();
      
      for (var i = 0; i < divs2.length; i++) {
        var div2 = divs2[i];
        var h1 = div2.getElementsByTagName("h1")[0];
        var textoH1 = h1.innerText.toLowerCase();
        
        if (textoH1.includes(textoPesquisa)) {
          div2.classList.remove("hide");
        } else {
          div2.classList.add("hide");
        }
      }
    });

    //cor dos numero
    var numeros = document.getElementsByClassName("numero");
  
  for (var i = 0; i < numeros.length; i++) {
    var numeroElemento = numeros[i];
    var numero = parseInt(numeroElemento.innerHTML);

    if (numero > 8) {
      numeroElemento.classList.add("red");
    } else if (numero >= 6 && numero <= 8) {
      numeroElemento.classList.add("yellow");
    } else {
      numeroElemento.classList.add("green");
    }
  }


