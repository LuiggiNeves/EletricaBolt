function listar(dados_de_pesquisa) {
    $(".tabela-produtos").hide();
    $(".spinner-loading-produtos").show();

    let formData = new FormData();
    formData.append("route", "pesquisa-produtos");
    formData.append("dados-de-pesquisa", dados_de_pesquisa);

    post("../app/controller/http/controller.php", formData,
        function (response) {
            let dados = response["dados"];
            let mensagem = response["mensagem"];

            let produtos = dados["produtos"];

            $(".tabela-produtos .produto-encontrado").remove();

            let textoQtdProdutos = "";
            if (produtos.length == 0) {
                textoQtdProdutos = "Nenhum produto encontrado";
            } else if (produtos.length == 1) {
                textoQtdProdutos = "<b>1</b> produto encontrado";
            } else {
                textoQtdProdutos = "<b>" + produtos.length + "</b> produtos encontrados";
            }

            $("#qtdProdutos").html(
                textoQtdProdutos
            );

            for (let i = 0; i < produtos.length; i++) {
                $(".tabela-produtos").append(
                    `
                        <div class='produto-encontrado mb-1 col-sm-12 col-md-12 border' id_produto='`+ produtos[i]["id"] + `'>
                            <div class='row'>
                                <div class='col-sm-12 col-md-1 p-3'>
                                    <img src='../app/files/entities/`+ produtos[i]["imagem_path"] + `' class='w-100 rounded' height='60px'/>
                                </div>
                                <div class='col-sm-12 col-md-10'>
                                    <div class='row mt-4'>
                                        <div class='col-sm-12 col-md-10 mb-2'>
                                            <b>`+ produtos[i]["nome"] + `</b>
                                        </div>
                                        <div class='col-sm-12 col-md-2 mb-2'>
                                            <button class='btn btn-sm btn-primary text-white btn-visualizar-produto'>Visualizar</button>
                                        </div>
                                    </div>
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

function exibirImagem(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            var imagemContainer = document.getElementById('imagemContainer');
            imagemContainer.innerHTML = '<img src="' + e.target.result + '" width="200" height="200" />';
        };

        reader.readAsDataURL(input.files[0]);
    }
}

function criar(nome, preco, descricao, arquivo) {
    let formData = new FormData();
    formData.append("route", "criar-produto");
    formData.append("nome", nome);
    formData.append("preco", preco);
    formData.append("descricao", descricao);
    formData.append("arquivo", arquivo);

    post("../app/controller/http/controller.php", formData,
        function (response) {
            let dados = response["dados"];
            let mensagem = response["mensagem"];

            $("#cadastrarCategoriaModal").modal("hide");
            swal(mensagem, "", "success");

            listar();
        },
        "",
        function () {

        }
    );
}

$(document).ready(function () {

    $("#modalNovoProduto").on("click", function () {
        $("#cadastrarProdutoModal").modal("show");
    });

    $("#criarProduto").on("click", function () {
        criar(
            $("#nomeDoProduto").val(),
            $("#precoDoProduto").val(),
            $("#descricaoDoProduto").val(),
            $("#imagemDoProduto")[0].files[0]
        );
    });

    $("#btnPesquisarProdutos").on("click", function () {
        $(".divConteudoProdutos").show();

        listar(
            JSON.stringify({ nome: $("#pesquisarNomeProduto").val() })
        );
    });

});