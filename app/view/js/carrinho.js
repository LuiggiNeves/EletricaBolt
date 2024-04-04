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

function adicionarAoCarrinho(idProduto, nomeProduto, precoProduto, imagemProduto, quantidade, codigoReferencia) {
    if (usuarioNaoEstaLogado()) {
        window.location = path_aplicacao + "eb/login/";
    }

    const produto = {
        id: idProduto,
        nome: nomeProduto,
        preco: precoProduto,
        imagem: imagemProduto,
        quantidade: quantidade,
        codigo_referencia: codigoReferencia
    };

    console.log(idProduto, nomeProduto)

    carrinho.push(produto);

    salvarCarrinhoNoLocalStorage();
    atualizarCarrinho();

    swal("Produto adicionado ao carrinho!", "", "success");

    // Resetar o campo de quantidade para 1
    let quantityElement = document.getElementById("quantity_" + idProduto);
    if (quantityElement) {
        quantityElement.value = 1;
    }
}


function atualizarCarrinho() {
    const carrinhoElement = document.getElementById("carrinho");
    carrinhoElement.innerHTML = "";

    carrinho.forEach(produto => {
        carrinhoElement.innerHTML += `
        <div class="tble">
            <div class="imagem-total-block">
                <img src="${produto.imagem}" alt="">
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Código</th>
                        <th>Preço</th>
                        <th>Qnt</th>
                        <th><button onclick="removerDoCarrinho(${carrinho.indexOf(produto)})"><img src="` + path_aplicacao + `/app/view/images/X.png" alt=""></button></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>${produto.nome}</td>
                        <td>${produto.codigo_referencia}</td>
                        <td>${produto.preco}</td>
                        <td>${produto.quantidade}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        `;
    });
}

function formataDinheiro(valor) {
    return parseFloat(valor).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
}

function removerTudoDoCarrinho() {
    carrinho = [];
    salvarCarrinhoNoLocalStorage();
    atualizarCarrinho();
}

function removerDoCarrinho(posicao) {
    carrinho.splice(posicao, 1);
    salvarCarrinhoNoLocalStorage();
    atualizarCarrinho();
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
        mensagem += `Código: ${produto.codigo_referencia}\n`;
        mensagem += `Preço: R$ ${formataDinheiro(produto.preco.toFixed(2))}\n`;
        mensagem += `Quantidade: ${produto.quantidade}\n`;
        mensagem += `Subtotal: R$ ${subtotal.toFixed(2)}\n\n\n`;
        total += subtotal;
    });

    mensagem += `Total: R$ ${formataDinheiro(total.toFixed(2))}`;

    mensagem = encodeURIComponent(mensagem);

    window.open(`https://wa.me/19996430498?text=${mensagem}`);
}

