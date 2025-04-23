    // Função para buscar o endereço pelo CEP
    document.getElementById('cep').addEventListener('blur', function() {
        const cep = document.getElementById('cep').value.replace(/\D/g, ''); // Remove caracteres não numéricos
  
        // Verifica se o CEP tem o formato correto (8 dígitos)
        if (cep.length === 8) {
          // Realiza a consulta na API ViaCEP
          fetch(`https://viacep.com.br/ws/${cep}/json/`)
            .then(response => response.json())
            .then(data => {
              if (data.erro) {
                alert("CEP não encontrado.");
              } else {
                // Preenche os campos com os dados retornados pela API
                document.getElementById('endereco').value = data.logradouro || '';
                document.getElementById('bairro').value = data.bairro || '';
                document.getElementById('cidade').value = data.localidade || '';
                document.getElementById('complemento').value = data.complemento || '';
              }
            })
            .catch(error => {
              console.error("Erro ao consultar o CEP: ", error);
              alert("Ocorreu um erro ao buscar o CEP.");
            });
        } else {
          alert("CEP inválido.");
        }
      });