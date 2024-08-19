// DOM.js

document.addEventListener('DOMContentLoaded', function() {
    // Seleciona o botão de exclusão pelo ID
    const excluirButton = document.getElementById('butao_excluir');
    if (excluirButton) {
        excluirButton.addEventListener('click', function(event) {
            const confirmacao = confirm('Tem certeza de que deseja excluir os usuários selecionados?');
    
            if (!confirmacao) {
                // Se o administrador cancelar, prevenir o envio do formulário
                event.preventDefault();
            }
        });
    }
});
