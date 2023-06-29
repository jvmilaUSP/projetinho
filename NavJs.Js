function mostrarNavS(){
  var x = document.getElementById("navSituacional") /* Pega a div de id "navSituacional" e armazena na variável X */
  if(x.className.indexOf("mostrarNavS") == -1)/* Confere se a classe "mostrarNavS" (Responsável pela aparição da NavS) ->NÃO<- está presente nas classes da <div>*/
  {
    x.className += " mostrarNavS" /*Se não: ele adiciona nas classes da <div> a classe "mostrarNavS", fazendo a Nav secundária aparecer.*/
    
    var posYNow = window.pageYOffset;
    if(posYInit<posYNow){
      document.getElementById("navSituacional").style.transform = "translateY(0%)";
    }else{
      document.getElementById("navSituacional").style.transform = "translateY(+"+  9652.6/document.getElementById("navSituacional").clientHeight.valueOf() +"%)";

    }
  }else 
  {
    x.className = x.className.replace(" mostrarNavS", "") /*Se sim: ele substitui a parte da classe "mostrarNavS", fazendo a Nav secundária desaparecer*/
  }
}
   
//Codigo de mexer nav scroll
var posYInit = 96;
window.onscroll = function(){
  var posYNow = window.pageYOffset;
  
  if(posYInit<posYNow){
    document.getElementById("navPrincipal").style.transform = "translateY(0%)";
    document.getElementById("banner").style.transform = "translateY(-"+  9889.2/document.getElementById("banner").clientHeight.valueOf() +"%)";
  }else{
    document.getElementById("navPrincipal").style.transform = "translateY(+"+  9652.6/document.getElementById("navPrincipal").clientHeight.valueOf() +"%)";
    document.getElementById("banner").style.transform = "translateY(0%)";

  }

}