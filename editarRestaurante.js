var cancelar = document.getElementById("cancelar");
var editar = document.getElementById("editar");
var salvar = document.getElementById("salvar");
var inputs =  document.getElementsByTagName("input");
var descricao = document.getElementById("descricao");
var select = document.getElementById("andarSelect");

descricao.disabled = 'true';
select.disabled = 'true';
for (var i = 0; i < inputs.length; i++) {
    var input = inputs[i];
    input.disabled = 'true';
    select.disabled = 'true';

}
editar.style.display = 'block';
salvar.style.display = 'none';
cancelar.style.display = 'none';

function edit(){
     inputs =  document.getElementsByTagName("input");
    descricao.disabled = '';
    select.disabled = '';
    for (var i = 0; i < inputs.length; i++) {
        var input = inputs[i];
        input.disabled = '';
        

    }
    editar.style.display = 'none';
    salvar.style.display = 'block';
    cancelar.style.display = 'block';
}

function cancel(){
     inputs =  document.getElementsByTagName("input");
    descricao.disabled = 'true';
    select.disabled = 'true';
    for (var i = 0; i < inputs.length; i++) {
        var input = inputs[i];
        input.disabled = 'true';

    }
    editar.style.display = 'block';
    salvar.style.display = 'none';
    cancelar.style.display = 'none';
}
function save(){
    inputs =  document.getElementsByTagName("input");
    descricao.disabled = 'true';
    select.disabled = 'true';
    for (var i = 0; i < inputs.length; i++) {
        var input = inputs[i];
        input.disabled = 'true';

    }
    editar.style.display = 'block';
    salvar.style.display = 'none';
    cancelar.style.display = 'none';
}