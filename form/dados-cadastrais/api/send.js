// Espera o DOM ser completamente carregado
document.addEventListener('DOMContentLoaded', function() {

    // Função para criar e mostrar notificações
    function showNotification(message, type = 'success') {
        const notificationContainer = document.getElementById('notification-container');

        // Verifica se o contêiner existe
        if (!notificationContainer) {
            console.error('Notification container not found!');
            return;
        }

        // Criando o elemento de notificação
        const notification = document.createElement('div');
        notification.classList.add('notification');

        // Adiciona a classe de tipo (sucesso, erro, aviso)
        notification.classList.add(type);

        // Criar o elemento do ícone
        const iconElement = document.createElement('span');
        iconElement.classList.add('icon');

        // Definir ícone com base no tipo de notificação
        let iconClass;
        switch (type) {
            case 'success':
                iconClass = 'fa-check-circle';  // Ícone de sucesso
                break;
            case 'error':
                iconClass = 'fa-times-circle';  // Ícone de erro
                break;
            case 'warning':
                iconClass = 'fa-exclamation-circle';  // Ícone de aviso
                break;
            default:
                iconClass = 'fa-info-circle';  // Ícone padrão
        }

        // Adiciona a classe de ícone
        iconElement.classList.add('fa', iconClass);

        // Criar o elemento de mensagem
        const messageElement = document.createElement('span');
        messageElement.textContent = message;

        // Adicionar ícone e mensagem à notificação
        notification.appendChild(iconElement);
        notification.appendChild(messageElement);

        // Adiciona a notificação ao contêiner
        notificationContainer.appendChild(notification);

        // Adiciona a animação de fade-in
        setTimeout(() => {
            notification.style.opacity = 1;
        }, 10);  // Garantir que a animação de fade-in funcione corretamente

        // Remove a notificação após 5 segundos
        setTimeout(() => {
            notification.style.animation = 'fadeOut 0.5s ease-in forwards';
            setTimeout(() => {
                notificationContainer.removeChild(notification);
            }, 500);
        }, 5000);
    }

    // Exemplo de como chamar a função para mostrar notificações
    document.getElementById('cadastroForm').addEventListener('submit', function (event) {
        event.preventDefault(); // Previne o envio padrão do formulário

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
            cep: document.getElementById('cep').value,
            cidade: document.getElementById('cidade').value,
            endereco: document.getElementById('endereco').value,
            bairro: document.getElementById('bairro').value,
            complemento: document.getElementById('complemento').value,
            observacoes: document.getElementById('observacoes').value,
            comoConheceu: document.getElementById('comoConheceu').value
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
