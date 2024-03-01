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

    carrinho.push(produto);

    salvarCarrinhoNoLocalStorage();
    atualizarCarrinho();

    swal("Produto adicionado ao carrinho!", "", "success");

    // Resetar o campo de quantidade para 1
    document.getElementById("quantity_" + idProduto).value = 1;
}


function atualizarCarrinho() {
    const carrinhoElement = document.getElementById("carrinho");
    carrinhoElement.innerHTML = "";

    carrinho.forEach(produto => {
        carrinhoElement.innerHTML += `
            <div class="carrinho-layout-produto">
                <div class="container-carrinho-layout">
                    <div class="menu-um">
                        <div class="layout-img">
                            <img src="${produto.imagem}" alt="${produto.nome}">
                        </div>
                    </div>
                    <div class="menu-dois unselectable">
                        <div class="layout-infos">
                            <div class="menu-divisivel">
                                <div class="menu-carrinho-nome menu-carrinho-generico">
                                    <p><strong>NOME</strong></p>
                                </div>

                                <div class="menu-cod menu-carrinho-generico">
                                    <p><strong>CÓDIGO</strong></p>  
                                </div>

                                <div class="menu-valor menu-carrinho-generico">
                                    <p><strong>VALOR</strong></p>
                                </div>

                                <div class="menu-qnt menu-carrinho-generico">
                                    <p><strong>QNT</strong></p>
                                </div>

                                <div class="btn-remove-produto">
                                    <div class="carrinho-remover">
                                    <button onclick="removerDoCarrinho(${carrinho.indexOf(produto)})"><img src="` + path_aplicacao + `/app/view/images/X.png" alt=""></button>
                                    </div>
                                </div>
                            </div>
                            <div class="menu-result">
                                <div class="menu-return-result">
                                    <div class="result-nome result-carrinho-generico">
                                        <p>${produto.nome}</p>
                                    </div>

                                    <div class="result-cod result-carrinho-generico">
                                        <p>${produto.codigo_referencia}</p>
                                    </div>

                                    
                                    <div class="result-valor result-carrinho-generico">
                                        <p>${formataDinheiro(produto.preco.toFixed(2))}</p>
                                    </div>

                                    
                                    <div class="result-qnt result-carrinho-generico">
                                        <p>${produto.quantidade}</p>
                                    </div>


                                    <div class="btn-remove-produto">
                                        <div class="carrinho-remover">
                                            <button onclick="removerDoCarrinho(${produto.id})"></button> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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

