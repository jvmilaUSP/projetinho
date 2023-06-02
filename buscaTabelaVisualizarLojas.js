function filtrarLinhas() {
  var selectAndar = document.getElementById('andarSelect');
  var tabela = document.getElementById('tabelaControle');
  var andarSelecionado = selectAndar.value; // Obtém o valor selecionado no <select>
  var linhas = tabela.getElementsByTagName('tr'); // Obtém todas as linhas da tabela

  // Adiciona um ouvinte de evento ao <select>
  selectAndar.addEventListener('change', filtrarLinhas);

  // Itera sobre as linhas e verifica se o atributo "data-andar" corresponde ao andar selecionado
  for (var i = 1; i < linhas.length; i++) {
    var tdAndar = linhas[i].querySelector('.tabelaAndar');
    if (andarSelecionado === "0" || (tdAndar && tdAndar.getAttribute('data-andar') === andarSelecionado)) {
        linhas[i].style.display = ''; // Mostra a linha
      } else {
      linhas[i].style.display = 'none'; // Oculta a linha
    }
    
  }
}

// Executa a função inicialmente para exibir todas as linhas
filtrarLinhas();


//FILTRAR LINHAS VIA PESQUISA
  //SCRIPT DA CAIXA DE PESQUISA
  var caixaPesquisa = document.getElementById("txtBusca");
  var trpesqs = document.getElementsByTagName('tr');
  
  caixaPesquisa.addEventListener("input", function() {
    var textoPesquisa = this.value.toLowerCase();
    
    for (var i = 1; i < trpesqs.length; i++) {
      var trpesq = trpesqs[i];
      var td = trpesq.getElementsByClassName("tabelaRestaurante")[0];
      var textotd = td.innerText.toLowerCase();
      
      if (textotd.includes(textoPesquisa)) {
        trpesq.classList.remove("hide");
      } else {
        trpesq.classList.add("hide");
      }
    }
  });







  

    
   


