// DOM.js

document.addEventListener('DOMContentLoaded', function() {
    // Selecionar o botão de exclusão
    const excluirButton = document.getElementById('butao_excluir');
    
    if (excluirButton) {
        excluirButton.addEventListener('click', function(event) {
            // Mostrar uma caixa de confirmação
            const confirmacao = confirm('Tem certeza de que deseja excluir os usuários selecionados?');
            
            if (!confirmacao) {
                // Se o administrador cancelar, prevenir o envio do formulário
                event.preventDefault();
            }
        });
    }
});
