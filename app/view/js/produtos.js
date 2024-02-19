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

            $(".tabela-produtos tbody tr").remove();

            for (let i = 0; i < produtos.length; i++) {
                $(".tabela-produtos tbody").append(
                    `
                        <tr class="produtoEncontrado" id_produto=`+ produtos[i]["id"] + `>
                            <td style="width: 80%">
                                `+ produtos[i]["nome"] + `
                            </td>

                            <td style="width: 20%">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 mb-2">
                                        <a href='../produtos-visualizar/`+ produtos[i]["id"] + `' class='btn btn-sm btn-primary text-white btn-visualizar-produto'>
                                            Visualizar
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    `
                );
            }

            atualizarPaginacao();

            removeSpinner($("#btnPesquisarProdutos"), "Pesquisar");

            $(".spinner-loading-produtos").hide();
            $(".divTabelaProdutos").show();
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

function exibirImagemEmComponente(input, $componente) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $($componente).html(
                `
                <img src="` + e.target.result + `" />
                `
            );
        };

        reader.readAsDataURL(input.files[0]);
    }
}

function criar(nome, preco, descricao, id_categoria, codigo_referencia, codigo_barras) {
    let formData = new FormData();
    formData.append("route", "criar-produto");
    formData.append("nome", nome);
    formData.append("preco", preco);
    formData.append("descricao", descricao);
    formData.append("categoria_id", id_categoria);
    formData.append("codigo_referencia", codigo_referencia);
    formData.append("codigo_barras", codigo_barras);

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
                    removeSpinner($("#criarProduto"), "Cadastrar");
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
                produto["codigo_barras"]
            );

            carregaViewAlterarProduto(
                produto["nome"],
                produto["categoria"] != null ? produto["categoria"]["nome"] : "",
                produto["descricao"],
                formataDinheiro(produto["preco"]),
                produto["codigo_referencia"],
                produto["codigo_barras"]
            );

            carregaMetricasProduto(
                produto["metricas"]["qtd_acessos"]
            );

            carregaImagensDoProduto(
                produto["imagens"]
            );
        },
        "",
        function () {

        }
    );
}

function alterar(id, nome, preco, descricao, id_categoria, codigo_referencia, codigo_barras) {
    let formData = new FormData();
    formData.append("route", "altera-produto");
    formData.append("id", id);
    formData.append("nome", nome);
    formData.append("preco", preco);
    formData.append("descricao", descricao);
    formData.append("categoria_id", id_categoria);
    formData.append("codigo_referencia", codigo_referencia);
    formData.append("codigo_barras", codigo_barras);

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
                    removeSpinner($("#alterarProduto"), "Alterar");
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
                codigo_de_barras: $("#pesquisarCodigoDeBarrasProduto").val(),
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
    $(".categoriaDoProduto").val(0);
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
    nome, id_categoria, descricao, preco, codigo_de_referencia, codigo_de_barras
) {
    $("#alterarNomeDoProduto").val(nome);
    $("#alterarDescricaoDoProduto").val(descricao);
    $("#alterarPrecoDoProduto").val(preco);
    $("#alterarCodigoDeReferenciaDoProduto").val(codigo_de_referencia);
    $("#alterarCodigoDeBarrasDoProduto").val(codigo_de_barras);

    $("#alterarCategoriaDoProduto").val(id_categoria);
}

function carregaViewAlterarProduto(
    nome, categoria, descricao, preco, codigo_de_referencia, codigo_de_barras
) {
    $("#nomeDoProduto").text(nome);
    $("#descricaoDoProduto").text(descricao);
    $("#precoDoProduto").text(preco);
    $("#codigoDeReferenciaDoProduto").text(codigo_de_referencia);
    $("#codigoDeBarrasDoProduto").text(codigo_de_barras);

    $("#categoriaDoProduto").text(categoria);
}

function carregaMetricasProduto(
    qtd_acessos
) {
    $("#qtd_acessos_ao_produto").text(qtd_acessos);
}

function carregaImagensDoProduto(
    imagens
) {
    $(".divImagemEncontrada").remove();

    for (let i = 0; i < imagens.length; i++) {
        let path_imagem = imagens[i]["imagem_path"] != null ? `../app/files/entities/` + imagens[i]["imagem_path"] + `` : `../app/view/images/produto.png`;

        $(".imagensDoProduto").append(
            `
                <div class="col-sm-12 col-md-3 border rounded divImagemEncontrada mx-1 mb-2" id_imagem="`+ imagens[i]["id"] + `">
                    <img src="`+ path_imagem + `" class="w-100" />
                </div>
            `
        );
    }
}

function criarNovaImagem(produto_id, arquivo) {
    let formData = new FormData();
    formData.append("route", "criar-produto-imagem");
    formData.append("produto_id", produto_id);
    formData.append("arquivo", arquivo);

    post("../app/controller/http/controller.php", formData,
        function (response) {
            let dados = response["dados"];
            let mensagem = response["mensagem"];

            swal({
                title: mensagem,
                text: "",
                icon: "success"
            })
                .then((btnOkWasPressed) => {
                    leProdutoPorId(produto_id);
                });
        },
        "",
        function () {

        }
    );
}

function removeImagem(id) {
    let formData = new FormData();
    formData.append("route", "remove-produto-imagem");
    formData.append("id", id);

    post("../app/controller/http/controller.php", formData,
        function (response) {
            let dados = response["dados"];
            let mensagem = response["mensagem"];

            swal({
                title: "Imagem removida com sucesso!",
                text: "",
                icon: "success"
            })
                .then((btnOkWasPressed) => {
                    leProdutoPorId(
                        $("#idDoProdutoSelecionado").val()
                    );
                });
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
        let formularioEstaValido = true;
        let form = $("#formularioCadastrarProduto")[0];
        if (!form.checkValidity()) {
            form.classList.add('was-validated');
            formularioEstaValido = false;
        }

        if (formularioEstaValido) {
            setSpinner($("#criarProduto"));

            criar(
                $("#nomeDoProduto").val(),
                $("#precoDoProduto").val(),
                $("#descricaoDoProduto").val(),
                $("#categoriaDoProduto").val(),
                $("#codigoDeReferenciaDoProduto").val(),
                $("#codigoDeBarrasDoProduto").val()
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
            setSpinner($("#alterarProduto"));

            alterar(
                $("#idDoProdutoSelecionado").val(),
                $("#alterarNomeDoProduto").val(),
                $("#alterarPrecoDoProduto").val(),
                $("#alterarDescricaoDoProduto").val(),
                $("#alterarCategoriaDoProduto").val(),
                $("#alterarCodigoDeReferenciaDoProduto").val(),
                $("#alterarCodigoDeBarrasDoProduto").val()
            );
            $("#formularioAlterarProduto").removeClass("was-validated");
        }
    });

    $("#btnPesquisarProdutos").on("click", function () {
        setSpinner($("#btnPesquisarProdutos"));

        pesquisar();
    });

    $("#btnAbrirModalAlterarProduto").on("click", function () {
        $("#visualizarProdutoModal").modal("show");
    });

    $("#btnAdicionarNovaImagem").on("click", function () {
        $("#novaImagemDoProduto").click();
    });

    $("#novaImagemDoProduto").on("change", function () {
        let imagem = $("#novaImagemDoProduto")[0].files[0];
        imagem = imagem == undefined ? null : imagem;

        criarNovaImagem(
            $("#idDoProdutoSelecionado").val(),
            imagem
        );
    })

    $(document).on("click", ".divImagemEncontrada", function () {
        let id = $(this).attr("id_imagem");

        swal({
            title: "",
            text: "Deseja remover a imagem?",
            icon: "warning",
            buttons: true,
            dangerMode: true
        })
            .then((btnOkWasPressed) => {
                if (btnOkWasPressed) {
                    removeImagem(id);
                }
            });
    })
});