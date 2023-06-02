  /*JS DO CPF */
  const inputCpf = document.getElementById("cpf");

inputCpf.addEventListener("input", formatarCpf);

function formatarCpf() {
  const cpf = inputCpf.value.replace(/\D/g, '');
  const cpfFormatado = cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
  inputCpf.value = cpfFormatado;
}