// Em api/cep.js
import { showNotification } from '../js/notification.js';  // Importando a função de notification.js

// Espera o DOM ser completamente carregado
document.addEventListener('DOMContentLoaded', function () {

    document.getElementById('cadastroForm').addEventListener('submit', function (event) {
        event.preventDefault(); // Previne o envio padrão do formulário

        // Concatenar os campos de 'complemento' e 'comoConheceu' com separadores
        const complemento = document.getElementById('complemento').value;
        const tipoComplemento = document.getElementById('tipo-complemento').value;
        const comoConheceu = document.getElementById('comoConheceu').value;
        const outrosDetalhes = document.getElementById('outrosDetalhes').value;

        // Usar o separador "|" para concatenar os valores de complemento e comoConheceu
        const complementoConcatenado = `${tipoComplemento}:${complemento}`; // Exemplo: "Andar: 1º Andar"
        const comoConheceuConcatenado = `${comoConheceu}:${outrosDetalhes}`; // Exemplo: "Indicação: Amigo João"

        // Montar os dados para o envio
        const formData = {
            solicitacao: document.getElementById('solicitacao').value,
            tipoSistema: document.getElementById('tipoSistema').value,
            tipoCadastro: document.getElementById('tipoCadastro').value,
            nome: document.getElementById('nome').value,
            cpfCnpj: document.getElementById('cpfCnpj').value,
            rg: document.getElementById('rg').value,
            inscricaoEstadual: document.getElementById('inscricaoEstadual').value,
            email: document.getElementById('email').value,
            telefone: document.getElementById('telefone').value,
            celular: document.getElementById('celular').value,
            cep: document.getElementById('cep').value,
            cidade: document.getElementById('cidade').value,
            endereco: document.getElementById('endereco').value,
            bairro: document.getElementById('bairro').value,
            numero: document.getElementById('numero').value, // Adicionando o campo número
            complemento: complementoConcatenado, // Salvar "tipo-complemento" e "complemento"
            observacoes: document.getElementById('observacoes').value,
            comoConheceu: comoConheceuConcatenado // Salvar "comoConheceu" e "outrosDetalhes"
        };

        // Enviar dados para o backend via fetch
        fetch('backend/index.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(formData),
        })
            .then(response => response.json())
            .then(data => {
                if (data.message === 'Cadastro realizado com sucesso!') {
                    showNotification('Cadastro realizado com sucesso!', 'success');
                    // Limpar o formulário se o cadastro for bem-sucedido
                    document.getElementById('cadastroForm').reset();
                } else {
                    showNotification(data.message, 'error');
                }
            })
            .catch(error => {
                showNotification('Erro na comunicação com o servidor: ' + error.message, 'error');
            });
    });

});
