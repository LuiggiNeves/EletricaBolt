var path_aplicacao = "http://localhost/ELETRICABOLT/";

function convertDate(inputFormat) {
    function pad(s) { return (s < 10) ? '0' + s : s; }
    var d = new Date(inputFormat);
    return [pad(d.getDate()), pad(d.getMonth() + 1), d.getFullYear()].join('/')
}

function formatarData(data) {
    const partes = data.split('-');
    const dia = partes[2];
    const mes = partes[1];
    const ano = partes[0];
    return `${dia}/${mes}/${ano}`;
}

function diaAtual() {
    const today = new Date();
    const yyyy = today.getFullYear();
    let mm = today.getMonth() + 1; // Months start at 0!
    let dd = today.getDate();

    if (dd < 10) dd = '0' + dd;
    if (mm < 10) mm = '0' + mm;

    return formattedToday = dd + '/' + mm + '/' + yyyy;
}

function ativarGifLoader(div_do_gif, div_para_desativar) {
    $(div_para_desativar).hide();
    $(div_do_gif).show();
}

function desativarGifLoader(div_do_gif, div_para_ativar) {
    $(div_do_gif).hide();
    $(div_para_ativar).show();
}

function ajaxDinamico(url, tipo, dados, sucesso, token = "", error = null) {
    $.ajax({
        url: url,
        type: tipo,
        data: dados,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data, textStatus, xhr) {
            // Depuração
            // console.log(data);

            sucesso(data, textStatus, xhr);
        },
        error: function (response) {
            // Depuração
            // console.log(response);

            if (error != null) {
                error();
            }

            console.log(response);

            let mensagem = response["responseJSON"][0];
            $(".modal").modal("hide");
            swal(mensagem, "", "error");
        }
    });
}

function post(url, dados, sucesso, error = null) {
    ajaxDinamico(url, "POST", dados, sucesso, "", error);
}

function get(url, dados, sucesso, error = null) {
    ajaxDinamico(url, "GET", dados, sucesso, "", error);
}

function gerarStringAleatoria(tamanho) {
    const caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    let resultado = '';

    for (let i = 0; i < tamanho; i++) {
        const indiceAleatorio = Math.floor(Math.random() * caracteres.length);
        resultado += caracteres.charAt(indiceAleatorio);
    }

    return resultado;
}

function inicializaMascarasDoSistema() {
    $('.numero').mask("#");
}

function setSpinner($component) {
    $($component).html(
        `
            <div class="spinner-border text-light" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        `
    );
    $($component).attr("disabled", "disabled");
}

function removeSpinner($component, text) {
    $($component).html(text);
    $($component).removeAttr("disabled");
}

function formataDinheiro(number) {
    number = parseInt(number);

    return number.toLocaleString('pt-br', { style: 'currency', currency: 'BRL' });
}

function usuarioNaoEstaLogado() {
    return sessionStorage.getItem("idCliente") == null;
}

function pesquisaDeProdutos(dados_de_pesquisa) {
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

                console.log(produtos[i].codigo_referencia);

                $("#produtosEncontrados").append(
                    `
                    <div class="catalago-product-base">
                        <div class="card">
                            <div class="card-img p-3 w-100 text-center">
                                <img src="`+ path_imagem + `" alt="` + produtos[i]["nome"] + `" class="card-product-img">
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
                                    Ver Produto
                                </a>

                                <button class="add-to-cart" onclick="adicionarAoCarrinho(${produtos[i].id}, '${produtos[i].nome}', ${produtos[i].preco}, '${path_imagem}', document.getElementById('${quantityId}').value, '${produtos[i].codigo_referencia}')"> Adicionar Carrinho</button>

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

$(document).ready(function () {

    inicializaMascarasDoSistema();

    $("form.naoEnvia").submit(function (e) {
        e.preventDefault();
    });

    $("#search-button").on("click", function () {
        let valor_da_pesquisa = $("#pesquisa_de_produtos").val();

        window.location.href = path_aplicacao + "eb/pesquisar/" + valor_da_pesquisa;
    });

    function pesquisarEPassarURL() {
        let valor_da_pesquisa = $("#pesquisa_de_produtos").val();
        window.location.href = path_aplicacao + "eb/pesquisar/" + valor_da_pesquisa;
    }
    

    $("#search-button").on("click", function () {
        pesquisarEPassarURL();
    });
    

    $("#pesquisa_de_produtos").on("keypress", function (event) {

        if (event.key === "Enter") {
            pesquisarEPassarURL();
        }
    });

});