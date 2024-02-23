window.alert('Doc executado primeiro');

document.addEventListener("DOMContentLoaded", function() {
    carregarCarrinhoDoLocalStorage();
    atualizarCarrinho();
});
