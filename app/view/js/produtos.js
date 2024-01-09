var paginaAtual = 1;
var totalPaginas = 1;

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
            let qtd_produtos = parseInt(dados["qtd_produtos"]);

            totalPaginas = Math.ceil(qtd_produtos / 10);

            $(".tabela-produtos .produto-encontrado").remove();

            let textoQtdProdutos = "";
            if (qtd_produtos == 0) {
                textoQtdProdutos = "Nenhum produto encontrado";
            } else if (qtd_produtos == 1) {
                textoQtdProdutos = "<b>1</b> produto encontrado";
            } else {
                textoQtdProdutos = "<b>" + qtd_produtos + "</b> produtos encontrados";
            }

            $("#qtdProdutos").html(
                textoQtdProdutos
            );
            $("#alertQtdProdutos").show();

            for (let i = 0; i < produtos.length; i++) {
                let path_imagem = produtos[i]["imagem_path"] != null ? `../app/files/entities/` + produtos[i]["imagem_path"] + `` : `../app/view/images/produto.png`;

                $(".tabela-produtos").append(
                    `
                        <div class='produto-encontrado col-sm-12 col-md-12 border mb-1' id_produto='`+ produtos[i]["id"] + `'>
                            <div class='row'>
                                <div class='col-sm-12 col-md-1 p-3'>
                                    <img src='`+ path_imagem + `' class='w-100 rounded'/>
                                </div>
                                <div class='col-sm-12 col-md-10'>
                                    <div class='row mt-4'>
                                        <div class='col-sm-12 col-md-10 mb-2'>
                                            <b>`+ produtos[i]["nome"] + `</b>
                                        </div>
                                        <div class='col-sm-12 col-md-2 mb-2'>
                                            <a href='../produtos-visualizar/`+ produtos[i]["id"] + `' class='btn btn-sm btn-primary text-white btn-visualizar-produto'>Visualizar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `
                );
            }

            atualizarPaginacao();

            $(".spinner-loading-produtos").hide();
            $(".tabela-produtos").show();
        },
        "",
        function () {

        }
    );
}

function exibirImagem(input, containerId) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            var imagemContainer = document.getElementById(containerId);
            imagemContainer.innerHTML = '<img src="' + e.target.result + '" width="200" height="200" />';
        };

        reader.readAsDataURL(input.files[0]);
    }
}

function criar(nome, preco, descricao, arquivo, id_categoria, codigo_referencia) {
    let formData = new FormData();
    formData.append("route", "criar-produto");
    formData.append("nome", nome);
    formData.append("preco", preco);
    formData.append("descricao", descricao);
    formData.append("arquivo", arquivo);
    formData.append("categoria_id", id_categoria);
    formData.append("codigo_referencia", codigo_referencia);

    post("../app/controller/http/controller.php", formData,
        function (response) {
            let dados = response["dados"];
            let mensagem = response["mensagem"];

            $(".modal").modal("hide");
            swal({
                title: mensagem,
                text: "",
                icon: "success"
            })
                .then((btnOkWasPressed) => {
                    resetaFormularioParaCadastro();
                    pesquisar();
                });
        },
        "",
        function () {

        }
    );
}

function leProdutoPorId(id) {
    let formData = new FormData();
    formData.append("route", "le-produto-por-id");
    formData.append("id", id);

    post("../app/controller/http/controller.php", formData,
        function (response) {
            let dados = response["dados"];
            let mensagem = response["mensagem"];

            let produto = dados["produto"];

            $("#idDoProdutoSelecionado").val(produto["id"]);

            carregaFormAlterarProduto(
                produto["nome"],
                produto["categoria"]["id"] != null ? produto["categoria"]["id"] : "0",
                produto["descricao"],
                produto["preco"],
                produto["codigo_referencia"],
                produto["imagem_path"]
            );

            carregaViewAlterarProduto(
                produto["nome"],
                produto["categoria"] != null ? produto["categoria"]["nome"] : "",
                produto["descricao"],
                produto["preco"],
                produto["codigo_referencia"],
                produto["imagem_path"]
            );

            carregaMetricasProduto(
                produto["metricas"]["qtd_acessos"]
            );
        },
        "",
        function () {

        }
    );
}

function alterar(id, nome, preco, descricao, arquivo, id_categoria, codigo_referencia) {
    let formData = new FormData();
    formData.append("route", "altera-produto");
    formData.append("id", id);
    formData.append("nome", nome);
    formData.append("preco", preco);
    formData.append("descricao", descricao);
    formData.append("arquivo", arquivo);
    formData.append("categoria_id", id_categoria);
    formData.append("codigo_referencia", codigo_referencia);

    post("../app/controller/http/controller.php", formData,
        function (response) {
            let dados = response["dados"];
            let mensagem = response["mensagem"];

            $(".modal").modal("hide");
            swal({
                title: mensagem,
                text: "",
                icon: "success"
            })
                .then((btnOkWasPressed) => {
                    leProdutoPorId(id);
                });


        },
        "",
        function () {

        }
    );
}

function pesquisar() {
    $(".divConteudoProdutos").show();

    const limit = 10;
    const offset = (paginaAtual - 1) * limit;

    listar(
        JSON.stringify(
            {
                nome: $("#pesquisarNomeProduto").val(),
                categoria: $("#pesquisarCategoriaProduto").val(),
                codigo_de_referencia: $("#pesquisarCodigoDeReferenciaProduto").val(),
                limit: limit,
                offset: offset
            }
        )
    );
}

function resetaFormularioParaCadastro() {
    $("#nomeDoProduto").val("");
    $("#descricaoDoProduto").val("");
    $("#precoDoProduto").val("");
    $("#imagemDoProduto").val("");
    $(".categoriaDoProduto").val(
        $(".categoriaDoProduto option:first").attr("value")
    );
    $("#imagemContainer").html("");
}

function listarCategorias() {
    let formData = new FormData();
    formData.append("route", "listar-categorias");

    post("../app/controller/http/controller.php", formData,
        function (response) {
            let dados = response["dados"];
            let mensagem = response["mensagem"];

            let categorias = dados["categorias"];

            $(".categoriaDoProduto option").remove();

            for (let i = 0; i < categorias.length; i++) {
                $(".categoriaDoProduto").append(
                    `
                        <option value="`+ categorias[i]["id"] + `">
                            `+ categorias[i]["nome"] + `
                        </option>  
                    `
                );
            }

            $(".categoriaDoProduto:not(.inputDePesquisa").prepend(
                `
                    <option value="0" selected>
                        Nenhuma categoria
                    </option>
                `
            );

            $(".inputDePesquisa").prepend(
                `
                    <option value="" selected>
                        Qualquer categoria
                    </option>
                `
            );
        },
        "",
        function () {

        }
    );
}

function atualizarEstadoBotoes() {
    $(".btn-anterior").prop("disabled", paginaAtual <= 1);
    $(".btn-proximo").prop("disabled", paginaAtual >= totalPaginas);
}


function atualizarPaginacao() {
    $("#paginaAtual").text(paginaAtual);
    $("#totalPaginas").text(totalPaginas);
    atualizarEstadoBotoes();

    $("#divPaginacao").show();
}

function paginaAnterior() {
    if (paginaAtual > 1) {
        paginaAtual--;
        pesquisar();
    }
}

function proximaPagina() {
    if (paginaAtual < totalPaginas) {
        paginaAtual++;
        pesquisar();
    }
}

function carregaFormAlterarProduto(
    nome, id_categoria, descricao, preco, codigo_de_referencia, imagem_path
) {
    $("#alterarNomeDoProduto").val(nome);
    $("#alterarDescricaoDoProduto").val(descricao);
    $("#alterarPrecoDoProduto").val(preco);
    $("#alterarCodigoDeReferenciaDoProduto").val(codigo_de_referencia);

    $("#alterarCategoriaDoProduto").val(id_categoria);

    $("#alterarImagemDoProduto").val("");
    let path_imagem = imagem_path != null ? `../app/files/entities/` + imagem_path + `` : `../app/view/images/produto.png`;
    $("#alterarImagemContainer").html(
        `
            <img src="`+ path_imagem + `" width="200" height="200" />
        `
    );
}

function carregaViewAlterarProduto(
    nome, categoria, descricao, preco, codigo_de_referencia, imagem_path
) {
    $("#nomeDoProduto").text(nome);
    $("#descricaoDoProduto").text(descricao);
    $("#precoDoProduto").text(preco);
    $("#codigoDeReferenciaDoProduto").text(codigo_de_referencia);

    $("#categoriaDoProduto").text(categoria);

    $("#imagemContainer").text("");
    let path_imagem = imagem_path != null ? `../app/files/entities/` + imagem_path + `` : `../app/view/images/produto.png`;
    $("#imagemContainer").html(
        `
            <img src="`+ path_imagem + `" width="150px" height="150px" />
        `
    );
}

function carregaMetricasProduto(
    qtd_acessos
) {
    $("#qtd_acessos_ao_produto").text(qtd_acessos);
}

$(document).ready(function () {

    $("#modalNovoProduto").on("click", function () {
        $("#cadastrarProdutoModal").modal("show");
    });

    $("#criarProduto").on("click", function () {
        let formularioEstaValido = true;
        let form = $("#formularioCadastrarProduto")[0];
        if (!form.checkValidity()) {
            form.classList.add('was-validated');
            formularioEstaValido = false;
        }

        if (formularioEstaValido) {
            let imagem = $("#imagemDoProduto")[0].files[0];
            imagem = imagem == undefined ? null : imagem;

            criar(
                $("#nomeDoProduto").val(),
                $("#precoDoProduto").val(),
                $("#descricaoDoProduto").val(),
                imagem,
                $("#categoriaDoProduto").val(),
                $("#codigoDeReferenciaDoProduto").val()
            );
            $("#formularioCadastrarProduto").removeClass("was-validated");
        }
    });

    $("#alterarProduto").on("click", function () {
        let formularioEstaValido = true;
        let form = $("#formularioAlterarProduto")[0];
        if (!form.checkValidity()) {
            form.classList.add('was-validated');
            formularioEstaValido = false;
        }

        if (formularioEstaValido) {
            let imagem = $("#alterarImagemDoProduto")[0].files[0];
            imagem = imagem == undefined ? null : imagem;

            alterar(
                $("#idDoProdutoSelecionado").val(),
                $("#alterarNomeDoProduto").val(),
                $("#alterarPrecoDoProduto").val(),
                $("#alterarDescricaoDoProduto").val(),
                imagem,
                $("#alterarCategoriaDoProduto").val(),
                $("#alterarCodigoDeReferenciaDoProduto").val()
            );
            $("#formularioAlterarProduto").removeClass("was-validated");
        }
    });

    $("#btnPesquisarProdutos").on("click", function () {
        pesquisar();
    });

    $("#btnAbrirModalAlterarProduto").on("click", function () {
        $("#visualizarProdutoModal").modal("show");
    });
});