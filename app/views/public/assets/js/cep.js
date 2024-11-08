function limpa_formulario_cep() {
  // Limpa valores do formulário de CEP.
  document.getElementById("rua").value = "";
  document.getElementById("bairro").value = "";
  document.getElementById("cidade").value = "";
  document.getElementById("uf").value = "";
  document.getElementById("ibge").value = "";
}

function meu_callback(conteudo) {
  if (!("erro" in conteudo)) {
    // Atualiza os campos com os valores.
    document.getElementById("rua").value = conteudo.logradouro;
    document.getElementById("bairro").value = conteudo.bairro;
    document.getElementById("cidade").value = conteudo.localidade;
    document.getElementById("uf").value = conteudo.uf;
    document.getElementById("ibge").value = conteudo.ibge;
  } else {
    limpa_formulario_cep();
    alert("CEP não encontrado.");
  }
}

function pesquisacep(valor) {
  // Nova variável "cep" somente com dígitos.
  var cep = valor.replace(/\D/g, "");
  var validacep = /^[0-9]{8}$/;

  if (cep !== "" && validacep.test(cep)) {
    document.getElementById("rua").value = "...";
    document.getElementById("bairro").value = "...";
    document.getElementById("cidade").value = "...";
    document.getElementById("uf").value = "...";
    document.getElementById("ibge").value = "...";

    // Cria um elemento de script com o JSONP do ViaCEP
    var script = document.createElement("script");
    script.src =
      "https://viacep.com.br/ws/" + cep + "/json/?callback=meu_callback";
    document.body.appendChild(script);
  } else if (cep !== "") {
    limpa_formulario_cep();
    alert("Formato de CEP inválido.");
  } else {
    limpa_formulario_cep();
  }
}
