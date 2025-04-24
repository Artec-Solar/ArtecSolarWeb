// Em js/notification.js

// Função para criar e mostrar notificações
export function showNotification(message, type = 'success') {
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
