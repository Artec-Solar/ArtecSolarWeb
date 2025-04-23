<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set('America/Sao_Paulo');
setlocale(LC_TIME, 'pt_BR');
$timezone_brasil = date("Y-m-d H:i:s");
$date_brasil = date("Y-m-d");

// Configuração do banco de dados MySQL
// define('HOST', 'p:srv1939.hstgr.io');  // Adiciona 'p:' para conexão persistente
// define('USUARIO', 'u120216170_root');
// define('SENHA', '9>gHHdG6');
// define('DB', 'u120216170_sandbox');

define('HOST', 'p:srv1939.hstgr.io');
define('USUARIO', 'u120216170_user');
define('SENHA', 'w^qZRST8B');
define('DB', 'u120216170_artec');

// Usando mysqli_connect, mas agora com conexão persistente
$conn = mysqli_connect(HOST, USUARIO, SENHA, DB);

if (!$conn) {
    die('NÃO FOI POSSIVEL CONECTAR COM BANCO DE DADOS: ' . mysqli_connect_error());
}

// Função para validar CPF
function validateCpf($cpf) {
    return preg_match('/^\d{3}\.\d{3}\.\d{3}-\d{2}$/', $cpf);
}

// Função para validar CNPJ
function validateCnpj($cnpj) {
    return preg_match('/^\d{2}\.\d{3}\.\d{3}\/\d{4}-\d{2}$/', $cnpj);
}

// Função para validar email
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Função para validar telefone (com DDD)
function validateTelefone($telefone) {
    return preg_match('/^\(\d{2}\) \d{5}-\d{4}$/', $telefone);
}

// Função para validar CEP
function validateCep($cep) {
    return preg_match('/^\d{5}-\d{3}$/', $cep);
}

// Receber os dados enviados pelo frontend
$data = json_decode(file_get_contents("php://input"), true);

// Verificar se os dados foram recebidos corretamente
if ($data) {
    // Sanitizando os dados recebidos
    $solicitacao = mysqli_real_escape_string($conn, htmlspecialchars($data['solicitacao']));
    $tipoSistema = mysqli_real_escape_string($conn, htmlspecialchars($data['tipoSistema']));
    $tipoCadastro = mysqli_real_escape_string($conn, htmlspecialchars($data['tipoCadastro']));
    $nome = mysqli_real_escape_string($conn, htmlspecialchars($data['nome']));
    $cpfCnpj = mysqli_real_escape_string($conn, htmlspecialchars($data['cpfCnpj']));
    $rg = mysqli_real_escape_string($conn, htmlspecialchars($data['rg']));
    $inscricaoEstadual = mysqli_real_escape_string($conn, htmlspecialchars($data['inscricaoEstadual']));
    $email = mysqli_real_escape_string($conn, htmlspecialchars($data['email']));
    $telefone = mysqli_real_escape_string($conn, htmlspecialchars($data['telefone']));
    $cep = mysqli_real_escape_string($conn, htmlspecialchars($data['cep']));
    $cidade = mysqli_real_escape_string($conn, htmlspecialchars($data['cidade']));
    $endereco = mysqli_real_escape_string($conn, htmlspecialchars($data['endereco']));
    $bairro = mysqli_real_escape_string($conn, htmlspecialchars($data['bairro']));
    $complemento = mysqli_real_escape_string($conn, htmlspecialchars($data['complemento']));
    $observacoes = mysqli_real_escape_string($conn, htmlspecialchars($data['observacoes']));
    $comoConheceu = mysqli_real_escape_string($conn, htmlspecialchars($data['comoConheceu']));

    // Verificação de campos obrigatórios
    if (empty($solicitacao) || empty($tipoSistema) || empty($tipoCadastro) || empty($nome) || empty($cpfCnpj) || empty($email) || empty($telefone) || empty($cep) || empty($cidade) || empty($endereco) || empty($bairro)) {
        echo json_encode(['message' => 'Campos obrigatórios não podem estar vazios']);
        exit;
    }

    // Validar CPF ou CNPJ
    if ($tipoCadastro === 'Pessoa Física' && !validateCpf($cpfCnpj)) {
        echo json_encode(['message' => 'CPF inválido']);
        exit;
    }
    if ($tipoCadastro === 'Pessoa Jurídica' && !validateCnpj($cpfCnpj)) {
        echo json_encode(['message' => 'CNPJ inválido']);
        exit;
    }

    // Validar e-mail
    if (!validateEmail($email)) {
        echo json_encode(['message' => 'E-mail inválido']);
        exit;
    }

    // Validar telefone
    if (!validateTelefone($telefone)) {
        echo json_encode(['message' => 'Telefone inválido']);
        exit;
    }

    // Validar CEP
    if (!validateCep($cep)) {
        echo json_encode(['message' => 'CEP inválido']);
        exit;
    }

    // Inserir os dados na tabela PessoaSolicitacao usando mysqli_query
    $sql = "INSERT INTO PessoaSolicitacao (
        solicitacao, tipoSistema, tipoCadastro, nome, cpfCnpj, rg,
        inscricaoEstadual, email, telefone, cep, cidade, endereco,
        bairro, complemento, observacoes, comoConheceu, created_at
    ) VALUES (
        '$solicitacao', '$tipoSistema', '$tipoCadastro', '$nome', '$cpfCnpj', '$rg',
        '$inscricaoEstadual', '$email', '$telefone', '$cep', '$cidade', '$endereco',
        '$bairro', '$complemento', '$observacoes', '$comoConheceu', '$timezone_brasil'
    )";

    if (mysqli_query($conn, $sql)) {
        echo json_encode(['message' => 'Cadastro realizado com sucesso!']);
    } else {
        echo json_encode(['message' => 'Erro ao cadastrar: ' . mysqli_error($conn)]);
    }

    // Fechar a conexão
    mysqli_close($conn);
} else {
    echo json_encode(['message' => 'Dados não recebidos corretamente']);
}
?>
