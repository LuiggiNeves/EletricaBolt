let carrinho = [];

function carregarCarrinhoDoLocalStorage() {
    const carrinhoArmazenado = localStorage.getItem('carrinho');
    if (carrinhoArmazenado) {
        carrinho = JSON.parse(carrinhoArmazenado);
    }
}

function salvarCarrinhoNoLocalStorage() {
    localStorage.setItem('carrinho', JSON.stringify(carrinho));
}

function adicionarAoCarrinho(idProduto, nomeProduto, precoProduto, imagemProduto, quantidade) {
    const produto = {
        id: idProduto,
        nome: nomeProduto,
        preco: precoProduto,
        imagem: imagemProduto,
        quantidade: quantidade
    };

    carrinho.push(produto);

    salvarCarrinhoNoLocalStorage();
    atualizarCarrinho();
    window.alert("Produto adicionado ao carrinho!");
}

function atualizarCarrinho() {
    const carrinhoElement = document.getElementById("carrinho");
    carrinhoElement.innerHTML = "";

    carrinho.forEach(produto => {
        carrinhoElement.innerHTML += `
            <div class="carrinho-layout-produto">
                <div class="carrinho-img ">
                    <img src="${produto.imagem}" alt="${produto.nome}">
                </div>
                <div class="carrinho-nome carrinho-generico">
                    <p>${produto.nome}</p>
                </div>
                <div class="carrinho-codigo carrinho-generico">
                    <p>Codigo\n${produto.id}</p>
                </div>
                <div class="carrinho-preco carrinho-generico">
                    <p>R$ ${formataDinheiro(produto.preco.toFixed(2))}</p>
                </div>
                <div class="carrinho-quantidade carrinho-generico">
                    <p>${produto.quantidade}</p>
                </div>
                <div class="carrinho-remover ">
                    <button onclick="removerDoCarrinho(${produto.id})">x</button>
                </div>
            </div>
        `;
    });
}

function removerTudoDoCarrinho() {
    carrinho = [];
    salvarCarrinhoNoLocalStorage();
    atualizarCarrinho();
}

function removerDoCarrinho(idProduto) {
    const index = carrinho.findIndex(produto => produto.id === idProduto);
    if (index !== -1) {
        carrinho.splice(index, 1);
        salvarCarrinhoNoLocalStorage();
        atualizarCarrinho();
    }
}

function confirmacaoApagar() {
    const confirmacao = window.confirm("Deseja apagar todo o Orçamento?");

    if (confirmacao == true) {
        removerTudoDoCarrinho();
    } else {
        window.alert("Operação cancelada");
    }
}

function enviarOrcamento() {

}

function enviarCarrinho() {
    let mensagem = "Elétrica Bolt orçamento(site)\n\nCarrinho de Compras:\n\n";

    let total = 0;

    carrinho.forEach(produto => {
        let subtotal = produto.preco * produto.quantidade;
        mensagem += `*${produto.nome}*\n`;
        mensagem += `Código: ${produto.id.toFixed(2)}\n`;
        mensagem += `Preço: R$ ${formataDinheiro(produto.preco.toFixed(2))}\n`;
        mensagem += `Quantidade: ${produto.quantidade}\n`;
        mensagem += `Subtotal: R$ ${subtotal.toFixed(2)}\n\n\n`;
        total += subtotal;
    });

    mensagem += `Total: R$ ${formataDinheiro(total.toFixed(2))}`;

    mensagem = encodeURIComponent(mensagem);

    window.open(`https://wa.me/19996430498?text=${mensagem}`);
}

