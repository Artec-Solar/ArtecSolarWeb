document.addEventListener('DOMContentLoaded', function () {
  // Elementos do formulário
  const tipoCadastro = document.getElementById('tipoCadastro');
  const campoCpfCnpj = document.getElementById('cpfCnpj');
  const campoRg = document.getElementById('rg');
  const campoInscricaoEstadual = document.getElementById('inscricaoEstadual');
  const labelCpfCnpj = document.querySelector('label[for="cpfCnpj"]');
  const labelRg = document.querySelector('label[for="rg"]');
  const labelInscricaoEstadual = document.querySelector('label[for="inscricaoEstadual"]');
  const iconCpfCnpj = labelCpfCnpj.querySelector('i'); // Seleciona o ícone diretamente dentro da label

  // Máscaras de CPF e CNPJ
  const cpfMask = "999.999.999-99";
  const cnpjMask = "99.999.999/9999-99";
  const rgMask = "99.999.999-9";  // Máscara para o RG

  // Função para mostrar/ocultar campos e mudar máscara conforme o tipo de cadastro
  function toggleCampos() {
      if (tipoCadastro.value === "Pessoa Jurídica") {
          // Exibe os campos para Pessoa Jurídica (CNPJ e Inscrição Estadual)
          campoCpfCnpj.setAttribute('placeholder', 'CNPJ');
          labelCpfCnpj.innerHTML = '<i class="fas fa-building input-icon"></i> CNPJ <span style="color:red">*</span>'; // Muda a label para "CNPJ" e mantém o ícone
          campoCpfCnpj.value = ''; // Limpa o campo
          campoCpfCnpj.style.display = 'block';
          labelCpfCnpj.style.display = 'block'; // Exibe label do CNPJ
          iconCpfCnpj.className = "fas fa-building input-icon"; // Atualiza o ícone para CNPJ
          campoRg.style.display = 'none'; // Oculta RG
          labelRg.style.display = 'none'; // Oculta label RG
          campoInscricaoEstadual.style.display = 'block'; // Exibe Inscrição Estadual
          labelInscricaoEstadual.style.display = 'block'; // Exibe label Inscrição Estadual
          Inputmask(cnpjMask).mask(campoCpfCnpj); // Aplica a máscara de CNPJ
      } else if (tipoCadastro.value === "Pessoa Física") {
          // Exibe os campos para Pessoa Física (CPF e RG)
          campoCpfCnpj.setAttribute('placeholder', 'CPF');
          labelCpfCnpj.innerHTML = '<i class="fas fa-id-card input-icon"></i> CPF <span style="color:red">*</span>'; // Muda a label para "CPF" e mantém o ícone
          campoCpfCnpj.value = ''; // Limpa o campo
          campoCpfCnpj.style.display = 'block';
          labelCpfCnpj.style.display = 'block'; // Exibe label do CPF
          iconCpfCnpj.className = "fas fa-id-card input-icon"; // Atualiza o ícone para CPF
          campoRg.style.display = 'block'; // Exibe RG
          labelRg.style.display = 'block'; // Exibe label RG
          campoInscricaoEstadual.style.display = 'none'; // Oculta Inscrição Estadual
          labelInscricaoEstadual.style.display = 'none'; // Oculta label Inscrição Estadual
          Inputmask(cpfMask).mask(campoCpfCnpj); // Aplica a máscara de CPF
      }
  }

  // Acionar a função de toggle ao mudar a seleção de tipo de cadastro
  tipoCadastro.addEventListener('change', toggleCampos);

  // Chama a função ao carregar a página para garantir que o estado inicial esteja correto
  toggleCampos();

  // Adiciona máscara dinâmica ao campo RG enquanto o usuário digita
  campoRg.addEventListener('input', function () {
      // Regex para validar o formato do RG
      const rgRegex = /^\d{2}\.\d{3}\.\d{3}-\d{1}$/;
      let rgValue = campoRg.value;

      // Aplica a máscara do RG (XX.XXX.XXX-X)
      rgValue = rgValue.replace(/\D/g, ''); // Remove caracteres não numéricos
      if (rgValue.length <= 2) {
          rgValue = rgValue.replace(/(\d{2})/, '$1');
      } else if (rgValue.length <= 5) {
          rgValue = rgValue.replace(/(\d{2})(\d{3})/, '$1.$2');
      } else if (rgValue.length <= 8) {
          rgValue = rgValue.replace(/(\d{2})(\d{3})(\d{3})/, '$1.$2.$3');
      } else if (rgValue.length <= 9) {
          rgValue = rgValue.replace(/(\d{2})(\d{3})(\d{3})(\d{1})/, '$1.$2.$3-$4');
      }
      
      // Atualiza o campo RG com a máscara
      campoRg.value = rgValue;

      // Validação do RG com a regex
      if (!rgRegex.test(rgValue)) {
          // Caso o RG não seja válido, pode-se adicionar uma mensagem de erro ou outra ação
          // Exemplo:
          // alert('RG inválido!');
      }
  });

  // Função de validação de CPF e CNPJ
  $(document).ready(function () {
      // Aplicar máscara para CPF e CNPJ e telefone
      Inputmask("999.999.999-99").mask("#cpfCnpj");
      Inputmask("(99) 99999-9999").mask("#telefone");
      Inputmask("99999-999").mask("#cep");

      // Validação do formulário
      $('#cadastroForm').submit(function (event) {
          event.preventDefault();
          let valid = true;

          // Validação CPF/CNPJ
          if (!validateCpfCnpj($('#cpfCnpj').val())) {
              valid = false;
              alert("CPF ou CNPJ inválido!");
          }

          // Se todos os campos forem válidos, envia o formulário
          if (valid) {
            showNotification('Formulário Enviado!', 'success');
              // Submissão do formulário pode ser feita aqui
          }
      });
  });

  // Função para validar CPF/CNPJ
  function validateCpfCnpj(cpfCnpj) {
      const cpfRegex = /(\d{3}\.\d{3}\.\d{3}-\d{2})/;
      const cnpjRegex = /(\d{2}\.\d{3}\.\d{3}\/\d{4}-\d{2})/;

      if (cpfRegex.test(cpfCnpj) || cnpjRegex.test(cpfCnpj)) {
          return true;
      }
      return false;
  }
});
