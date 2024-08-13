// DOM.js

document.addEventListener('DOMContentLoaded', function() {
    // Seleciona o botão de exclusão pelo ID

    const excluirButton = document.getElementById('butao_excluir');
    
    // Verifica se o botão de exclusão existe na página
    if (excluirButton) {
        // Adiciona um evento de clique ao botão de exclusão
        excluirButton.addEventListener('click', function(event) {
            // Exibe uma caixa de confirmação para o usuário
            const confirmacao = confirm('Tem certeza de que deseja excluir os usuários selecionados?');
            // Se o usuário não confirmar (cancela), evita a ação padrão do evento
            if (!confirmacao) {
                // Se o administrador cancelar, prevenir o envio do formulário
                event.preventDefault();
            }
        });
    }
});
