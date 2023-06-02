var caixaPesquisa = document.getElementById("txtBusca");
var divs2 = document.getElementsByClassName("blocoShopping");

caixaPesquisa.addEventListener("input", function() {
  var textoPesquisa = this.value.toLowerCase();
  
  for (var i = 0; i < divs2.length; i++) {
    var div2 = divs2[i];
    var a = div2.getElementsByTagName("a")[0];
    var textoH1 = a.innerText.toLowerCase();
    
    if (textoH1.includes(textoPesquisa)) {
      div2.classList.remove("hide");
    } else {
      div2.classList.add("hide");
    }
  }
});