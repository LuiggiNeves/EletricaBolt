
function aumentarQuantidade(id) {
    let quantidadeInput = document.getElementById(id);
    quantidadeInput.value = parseInt(quantidadeInput.value) + 1;
}

function diminuirQuantidade(id) {
    let quantidadeInput = document.getElementById(id);
    if (parseInt(quantidadeInput.value) > 1) {
        quantidadeInput.value = parseInt(quantidadeInput.value) - 1;
    }
}