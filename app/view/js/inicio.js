function listar(dados_de_pesquisa) {
    $(".tabela-produtos").hide();
    $(".spinner-loading-produtos").show();

    let formData = new FormData();
    formData.append("route", "pesquisa-produtos");
    formData.append("dados-de-pesquisa", dados_de_pesquisa);

    post("app/controller/http/controller.php", formData,
        function (response) {
            let dados = response["dados"];
            let mensagem = response["mensagem"];




            let produtos = dados["produtos"];

            $("#produtosEncontrados .catalago-product-base").remove();

            let textoQtdProdutos = "";
            if (produtos.length == 0) {
                textoQtdProdutos = "Nenhum produto encontrado";
            } else if (produtos.length == 1) {
                textoQtdProdutos = "<b>1</b> produto encontrado";
            } else {
                textoQtdProdutos = "<b>" + produtos.length + "</b> produtos encontrados";
            }

            for (let i = 0; i < produtos.length; i++) {
                let path_imagem = produtos[i]["imagem_path"] != null ? path_aplicacao + `/app/files/entities/` + produtos[i]["imagem_path"] + `` : path_aplicacao + `/app/view/images/produto.png`;
                let quantityId = 'quantity_' + produtos[i].id;

                $("#produtosEncontrados").append(
                    `
                    <div class="catalago-product-base">rgba(0, 0, 0, 0.466);
                        <div class="card">
                            <div class="card-img p-3">
                                <p><img src="`+ path_imagem + `" alt="` + produtos[i]["nome"] + `"></p>
                            </div>
                            <div class="card-body">
                                <div class="product-title" a href="#" onclick="openProductView()">` + produtos[i]["nome"] + `</a></div>
                                    <div class="product-quantity">
                                        <div class="quantity-block-product">
                                            <div class="quantity-button" onclick="diminuirQuantidade('${quantityId}')">
                                                <p>-</p>
                                            </div>
                                            <div class="quantity-input-style"><input type="text" class="quantity-input" id="${quantityId}" value="1" minlength="1"></div>
                                            <div class="quantity-button" onclick="aumentarQuantidade('${quantityId}')">
                                                <p>+</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a class="add-to-cart" href="eb/produtos-visualizar/${produtos[i].id}">
                                    Visualizar produto
                                </a>

                                <button class="add-to-cart" onclick="adicionarAoCarrinho(${produtos[i].id}, '${produtos[i].nome}', ${produtos[i].preco}, '${path_imagem}', document.getElementById('${quantityId}').value)">Adicionar ao Carrinho</button>
                            </div>
                        </div>
                    </div>
                    `
                );
            }



            $(".spinner-loading-produtos").hide();
            $(".tabela-produtos").show();
        },
        "",
        function () {

        }
    );
}

function pesquisar() {
    listar(
        JSON.stringify({})
    );
}

$(document).ready(function () {



});


