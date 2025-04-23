<!DOCTYPE html>
<html class="no-js" lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width" />
  <title>Artec Solar</title>

  <!-- CSS -->
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <link rel="stylesheet" href="../../css/bootstrap.min.css">
  <link rel="stylesheet" href="../../css/bootstrap-responsive.min.css">
  <link rel="stylesheet" href="../../css/main.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" type="image/png" href="../../images/logo.jpg">

  <meta name="description" content="Formulário de Cadastro de Solicitação.">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

  <!-- JS -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/inputmask@5.0.7/dist/inputmask.min.js"></script>

  <!-- JS for Validation -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>

  <!-- JS -->
  <script src="../../js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
  <script src="../../js/jquery-1.9.1.min.js"></script>
  <script src="../../js/bootstrap.min.js"></script>
  <script src="../../js/main.js"></script>

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f4f7fa;
      margin: 0;
      padding: 0;
    }

    .form-container {
      max-width: 900px;
      margin: 0 auto;
      padding: 40px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      margin-top: 100px;
    }

    .form-container h2 {
      font-size: 24px;
      font-weight: 600;
      color: #333;
      margin-bottom: 30px;
      text-align: center;
    }

    .form-group {
      margin-bottom: 20px;
      position: relative;
    }

    .form-group label {
      font-size: 14px;
      font-weight: 500;
      color: #333;
      display: block;
      margin-bottom: 5px;
    }

    .input-field {
      width: 100%;
      padding: 12px 15px;
      border-radius: 8px;
      border: 1px solid #ccc;
      box-sizing: border-box;
      font-size: 14px;
      background-color: #f9f9f9;
      transition: all 0.3s ease;
    }

    .input-field:focus {
      border-color: #4A90E2;
      outline: none;
      background-color: #fff;
    }

    .input-field:disabled {
      background-color: #f1f1f1;
    }

    .input-icon {
      color: #4A90E2;
      font-size: 16px;
      margin-right: 10px;
    }

    .form-group i {
      color: #999;
    }

    .form-group .input-field {
      padding-left: 40px;
    }

    .submit-btn {
      padding: 12px 25px;
      background-color: #4A90E2;
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      width: 100%;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .submit-btn:hover {
      background-color: #357ABD;
    }

    .form-group i {
      color: #999;
    }

    .error {
      color: red;
      font-size: 12px;
      margin-top: 5px;
    }

    .success {
      color: green;
      font-size: 12px;
      margin-top: 5px;
    }
  </style>
</head>

<body>
  <header class="navbar navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <a id="logo" class="pull-left" href="index.html"></a>
        <div class="nav-collapse collapse pull-right">
          <ul class="nav">
            <li><a href="../../index.html">Home</a></li>
            <li><a href="../../empresa.html">Empresa</a></li>
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Produtos <i class="fa fa-angle-down"></i></a>
              <ul class="dropdown-menu">
                <li><a href="../../produto-01.html">Energia Solar</a></li>
                <li><a href="../../produto-02.html">Aquecimento Solar</a></li>
                <li><a href="../../produto-03.html">Climatização</a></li>
              </ul>
            </li>
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Serviços <i class="fa fa-angle-down"></i></a>
              <ul class="dropdown-menu">
                <li><a href="../../servico-01.html">Higienização de Ar Condicionado</a></li>
                <li><a href="../../servico-02.html">Manutenção de Aquecedor Solar</a></li>
                <li><a href="../../servico-03.html">Manutenção de Ar Condicionado</a></li>
                <li><a href="../../produto-01.html">Projeto de Energia Fotovoltaica</a></li>
              </ul>
            </li>
            <li><a href="../../contato.html">Contato</a></li>
            <li class="login"><a href="http://webmail.artecsolar.com.br" target="_blank" title="Acessar WebMail"><i class="fa fa-envelope"></i></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
  </header>

<!-- Container de notificações -->
<div id="notification-container"></div>

  <!-- Formulário Moderno -->
  <div class="form-container">
    <h2><i class="fa-solid fa-id-card mr-2"></i> Cadastro de Solicitação</h2>

    <form id="cadastroForm">
      <div class="form-group">
        <label for="solicitacao"><i class="fas fa-cogs input-icon"></i> Qual a solicitação? <span style="color:red">*</span></label>
        <select id="solicitacao" name="solicitacao" class="input-field" required>
          <option value="" disabled selected>Selecione uma opção</option>
          <option value="Atualização de Dasdos">Atualização de Dados</option>
          <option value="Visita Técnica">Visita Técnica</option>
          <option value="Manutenção">Manutenção</option>
          <option value="Orçamento">Orçamento</option>
          <option value="Garantia">Garantia</option>
          <option value="Outro">Outro</option>
        </select>
      </div>

      <div class="form-group">
        <label for="tipoSistema"><i class="fas fa-cogs input-icon"></i> Tipo de sistema <span style="color:red">*</span></label>
        <select id="tipoSistema" name="tipoSistema" class="input-field" required>
          <option value="" disabled selected>Selecione uma opção</option>
          <option value="Climatização de Ambientes">Climatização de Ambientes</option>
          <option value="Aquecimento Solar Banho">Aquecimento Solar Banho</option>
          <option value="Aquecimento Solar Piscina">Aquecimento Solar Piscina</option>
          <option value="Energia Solar I Fotovoltaico">Energia solar I Fotovoltaico</option>
          <option value="Sistema VRF">Sistema VRF</option>
          <option value="Sistema de Renovação de AR">Sistema de Renovação de AR</option>
          <option value="Sistema de Exaustão de Ambientes">Sistema de Exaustão de Ambientes</option>
          <option value="Contrato PMOC">Contrato PMOC</option>
          <option value="Outro">Outro</option>
        </select>
      </div>

      <div class="form-group">
        <label for="tipoCadastro"><i class="fas fa-edit input-icon"></i> Tipo de cadastro <span style="color:red">*</span></label>
        <select id="tipoCadastro" name="tipoCadastro" class="input-field" required>
          <option value="" disabled selected>Selecione uma opção</option>
          <option value="Pessoa Física">Pessoa Física</option>
          <option value="Pessoa Jurídica">Pessoa Jurídica</option>
        </select>
      </div>

      <div class="form-group">
        <label for="nome"><i class="fas fa-user input-icon"></i> Nome / Razão Social <span style="color:red">*</span></label>
        <input type="text" id="nome" name="nome" class="input-field" required placeholder="Nome ou Razão Social">
      </div>

      <div class="form-group">
        <label for="cpfCnpj"><i class="fas fa-id-card input-icon"></i> CPF / CNPJ <span style="color:red">*</span></label>
        <input type="text" id="cpfCnpj" name="cpfCnpj" class="input-field" required placeholder="CPF ou CNPJ">
      </div>

      <div class="form-group">
        <label for="rg"><i class="fas fa-id-badge input-icon"></i> RG <span style="color:red">*</span></label>
        <input type="text" id="rg" name="rg" class="input-field" placeholder="Número do RG">
      </div>

      <div class="form-group">
        <label for="inscricaoEstadual"><i class="fas fa-building input-icon"></i> Inscrição Estadual</label>
        <input type="text" id="inscricaoEstadual" name="inscricaoEstadual" class="input-field" placeholder="Inscrição Estadual">
      </div>

      <div class="form-group">
        <label for="email"><i class="fas fa-envelope input-icon"></i> E-mail <span style="color:red">*</span></label>
        <input type="email" id="email" name="email" class="input-field" required placeholder="exemplo@dominio.com">
      </div>

      <div class="form-group">
        <label for="telefone"><i class="fas fa-phone input-icon"></i> Contato Telefônico <span style="color:red">*</span></label>
        <input type="tel" id="telefone" name="telefone" class="input-field" required placeholder="(XX) XXXXX-XXXX">
      </div>

      <div class="form-group">
        <label for="cep"><i class="fas fa-map-marker-alt input-icon"></i> CEP <span style="color:red">*</span></label>
        <input type="text" id="cep" name="cep" class="input-field" required placeholder="CEP">
      </div>

      <div class="form-group">
        <label for="cidade"><i class="fas fa-city input-icon"></i> Cidade <span style="color:red">*</span></label>
        <input type="text" id="cidade" name="cidade" class="input-field" required placeholder="Cidade">
      </div>

      <div class="form-group">
        <label for="endereco"><i class="fas fa-home input-icon"></i> Endereço <span style="color:red">*</span></label>
        <input type="text" id="endereco" name="endereco" class="input-field" required placeholder="Endereço">
      </div>

      <div class="form-group">
        <label for="bairro"><i class="fas fa-map-marker input-icon"></i> Bairro <span style="color:red">*</span></label>
        <input type="text" id="bairro" name="bairro" class="input-field" required placeholder="Bairro">
      </div>

      <div class="form-group">
        <label for="complemento"><i class="fas fa-location-arrow input-icon"></i> Complemento</label>
        <input type="text" id="complemento" name="complemento" class="input-field" placeholder="Complemento">
      </div>

      <div class="form-group">
        <label for="observacoes"><i class="fas fa-comment input-icon"></i> Observações</label>
        <textarea id="observacoes" name="observacoes" rows="4" class="input-field" placeholder="Observações"></textarea>
      </div>

      <div class="form-group">
        <label for="comoConheceu"><i class="fas fa-users input-icon"></i> Como você conheceu a nossa empresa?</label>
        <textarea id="comoConheceu" name="comoConheceu" rows="2" class="input-field" placeholder="Exemplo: Redes sociais, indicação, etc."></textarea>
      </div>

      <div class="form-group">
        <button type="submit" class="submit-btn"><i class="fa-solid fa-floppy-disk mr-2" style="color: white;"></i> Enviar Solicitação</button>
      </div>
    </form>
  </div>
  <script src="api/send.js"></script>
  <script src="api/cep.js"></script>
  <script src="js/regex.js"></script>
</body>

</html>