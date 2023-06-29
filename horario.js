var contadorHidden = 0;
function adicionarHorario() {
  // Obter os valores dos inputs
  var selectDiaSemana = document.getElementById('diaSemanaSelect');
  var diasemana  = selectDiaSemana.options[selectDiaSemana.selectedIndex].textContent;
  var palavraChave = selectDiaSemana.value;
  var horarioInicio = document.getElementById('horarioinicio').value;
  var horarioFim = document.getElementById('horariofim').value;

  // Validar se todos os campos foram preenchidos
  if (palavraChave !== '0' && horarioInicio && horarioFim) {
    // Criar uma nova linha na tabela
    var tabela = document.getElementById('tabelaHorarios');
    var linha = tabela.insertRow();

    // Inserir os valores na nova linha
    var celulaDia = linha.insertCell(0);
    celulaDia.innerHTML = diasemana;
    celulaDia.classList.add("dia");

    var celulaHorarioInicio = linha.insertCell(1);
    celulaHorarioInicio.innerHTML = horarioInicio;

    var celulaHorarioFim = linha.insertCell(2);
    celulaHorarioFim.innerHTML = horarioFim;
    


    //INSERIR OS INPUT
    var hiddenPalavraChave = document.createElement('input');
    hiddenPalavraChave.type = 'text';
    hiddenPalavraChave.name = 'hiddendiaSemana';
    hiddenPalavraChave.value = palavraChave;

    var hiddenHorarioInicio = document.createElement('input');
    hiddenHorarioInicio.type = 'text';
    hiddenHorarioInicio.name = 'hiddenHorarioInicio';
    hiddenHorarioInicio.value = horarioInicio;

    var hiddenHorarioFim = document.createElement('input');
    hiddenHorarioFim.type = 'text';
    hiddenHorarioFim.name = 'hiddenHorarioFim';
    hiddenHorarioFim.value = horarioFim;

    var celulaExcluir = linha.insertCell(3);
    var botaoExcluir = document.createElement('button');
    botaoExcluir.innerHTML = 'Excluir';
    botaoExcluir.addEventListener('click', function() {
      // Excluir a linha da tabela
      tabela.deleteRow(linha.rowIndex);

      // Excluir os campos hidden correspondentes
      formulario.removeChild(hiddenPalavraChave);
      formulario.removeChild(hiddenHorarioInicio);
      formulario.removeChild(hiddenHorarioFim);
    });
    celulaExcluir.appendChild(botaoExcluir);


    var formulario = document.getElementById('cadLoja');
    formulario.appendChild(hiddenPalavraChave);
    formulario.appendChild(hiddenHorarioInicio);
    formulario.appendChild(hiddenHorarioFim);

    // Incrementar o contador
    contadorHidden++;

    // Limpar os campos de entrada
    document.getElementById('diaSemanaSelect').value = '0';
    document.getElementById('horarioinicio').value = '';
    document.getElementById('horariofim').value = '';
  } else {
    alert('Por favor, preencha todos os campos antes de adicionar o horário.');
  }
}