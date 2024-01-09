var paginaAtual = 1;
var totalPaginas = 1;

function pesquisarCategorias(dados_de_pesquisa) {
    $(".divTabelaCategoria").hide();
    $(".spinner-loading-categorias").show();

    let formData = new FormData();
    formData.append("route", "pesquisa-categorias");
    formData.append("dados-de-pesquisa", dados_de_pesquisa);

    post("../app/controller/http/controller.php", formData,
        function (response) {
            let dados = response["dados"];
            let mensagem = response["mensagem"];

            let categorias = dados["categorias"];
            let qtd_categorias = parseInt(dados["qtd_categorias"]);

            totalPaginas = Math.ceil(qtd_categorias / 10);

            let textoQtdCategorias = "";
            if (qtd_categorias == 0) {
                textoQtdCategorias = "Nenhuma encontrada";
            } else if (qtd_categorias == 1) {
                textoQtdCategorias = "<b>1</b> categoria encontrada";
            } else {
                textoQtdCategorias = "<b>" + qtd_categorias + "</b> categorias encontradas";
            }

            $("#qtdCategorias").html(
                textoQtdCategorias
            );
            $("#alertQtdCategorias").show();

            $(".tabela-categorias tbody tr").remove();

            for (let i = 0; i < categorias.length; i++) {
                $(".tabela-categorias tbody").append(
                    `
                        <tr class="categoriaEncontrada" id_categoria=`+ categorias[i]["id"] + `>
                            <td style="width: 70%">
                                `+ categorias[i]["nome"] + `
                            </td>

                            <td style="width: 30%">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6 mb-2">
                                        <button class="btn btn-sm btn-primary text-white w-100 visualizarCategoria">
                                            Visualizar
                                        </button>
                                    </div>
                                    <div class="col-sm-12 col-md-6 mb-2">
                                        <button class="btn btn-sm btn-primary text-white w-100 btnProdutosDaCategoria">
                                            Produtos
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    `
                );
            }

            atualizarPaginacao();

            removeSpinner($("#btnPesquisarCategorias"), "Pesquisar");

            $(".spinner-loading-categorias").hide();
            $(".divTabelaCategoria").show();
        },
        "",
        function () {

        }
    );
}

function criar(nome) {
    let formData = new FormData();
    formData.append("route", "criar-categoria");
    formData.append("nome", nome);

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

function lerPorId(id, $btn = null) {
    let formData = new FormData();
    formData.append("route", "le-categoria-por-id");
    formData.append("id", id);

    post("../app/controller/http/controller.php", formData,
        function (response) {
            let dados = response["dados"];
            let mensagem = response["mensagem"];

            let categoria = dados["categoria"];

            $("#idCategoriaAtual").val(id);
            $("#nomeCategoriaVisualizada").val(categoria["nome"]);

            $("#visualizarCategoriaModal").modal("show");

            if ($btn != null) {
                removeSpinner($btn, "Visualizar");
            }
        },
        "",
        function () {

        }
    );
}

function altera(id, nome) {
    let formData = new FormData();
    formData.append("route", "altera-categoria");
    formData.append("id", id);
    formData.append("nome", nome);

    post("../app/controller/http/controller.php", formData,
        function (response) {
            let dados = response["dados"];
            let mensagem = response["mensagem"];

            pesquisar();
            $(".modal").modal("hide");

            swal(mensagem, "", "success");

            removeSpinner($("#alterarCategoria"), "Salvar");
        },
        "",
        function () {

        }
    );
}

function listarProdutosSemCategoria() {
    let formData = new FormData();
    formData.append("route", "listar-produtos-sem-categoria");

    post("../app/controller/http/controller.php", formData,
        function (response) {
            let dados = response["dados"];
            let mensagem = response["mensagem"];

            let produtos = dados["produtos"];

            $("#produtosSemCategoria option").remove();

            if (produtos.length == 0) {
                $("#produtosSemCategoria").append(
                    `
                    <option disabled selected>
                        Nenhum produto para inserir
                    </option>
                    `
                );
            } else {
                for (let i = 0; i < produtos.length; i++) {
                    $("#produtosSemCategoria").append(
                        `
                        <option value="`+ produtos[i]["id"] + `">
                            `+ produtos[i]["nome"] + `
                        </option>
                        `
                    );
                }
            }
        },
        "",
        function () {

        }
    );
}

function listarProdutoPorCategoria(id_categoria, $btn = null) {
    $(".divProdutosDaCategoria").hide();
    $(".spinner-loading-produtos-da-categoria").show();

    let formData = new FormData();
    formData.append("route", "listar-produtos-por-categoria");
    formData.append("id_categoria", id_categoria);

    post("../app/controller/http/controller.php", formData,
        function (response) {
            let dados = response["dados"];
            let mensagem = response["mensagem"];

            let produtos = dados["produtos"];

            $("#produtosDaCategoria tbody tr").remove();

            for (let i = 0; i < produtos.length; i++) {
                $("#produtosDaCategoria tbody").append(
                    `
                        <tr id_produto='`+ produtos[i]["id"] + `'>
                            <td class='col-9'>
                                <small class='fw-bold'>`+ produtos[i]["nome"] + `</small>
                            </td>
                            <td>
                                <button class='btn btn-danger btn-sm removerProduto'>
                                    <i class='bi bi-trash'></i>
                                </button>
                            </td>
                        </tr>
                    `
                );
            }

            if ($btn != null) {
                removeSpinner($($btn), "Produtos");
            }

            $(".spinner-loading-produtos-da-categoria").hide();
            $(".divProdutosDaCategoria").show();
        },
        "",
        function () {

        }
    );
}

function inserirProdutoEmCategoria(id_categoria, id_produto) {
    let formData = new FormData();
    formData.append("route", "criar-categoria-produto");
    formData.append("id_categoria", id_categoria);
    formData.append("id_produto", id_produto);

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
                    removeSpinner($("#btnAdicionarProdutoACategoria"), "Adicionar");

                    listarProdutosSemCategoria();
                    listarProdutoPorCategoria($("#categoriaSelecionada").val());
                    $("#visualizarCategoriaProdutosModal").modal("show");
                });
        },
        "",
        function () {

        }
    );
}

function removeProdutoEmCategoria(id_categoria, id_produto, $btn = null) {
    let formData = new FormData();
    formData.append("route", "remove-produto-de-categoria");
    formData.append("id_categoria", id_categoria);
    formData.append("id_produto", id_produto);

    post("../app/controller/http/controller.php", formData,
        function (response) {
            let dados = response["dados"];
            let mensagem = response["mensagem"];

            $(".modal").modal("hide");

            swal({
                title: "Produto removido com sucesso!",
                text: "",
                icon: "success"
            })
                .then((btnOkWasPressed) => {
                    if ($btn != null) {
                        removeSpinner($btn,
                            `
                            <i class='bi bi-trash'></i>
                            `
                        );
                    }

                    listarProdutosSemCategoria();
                    listarProdutoPorCategoria($("#categoriaSelecionada").val());
                    $("#visualizarCategoriaProdutosModal").modal("show");
                });
        },
        "",
        function () {

        }
    );
}

function pesquisar() {
    const limit = 10;
    const offset = (paginaAtual - 1) * limit;

    pesquisarCategorias(
        JSON.stringify(
            {
                nome: $("#pesquisarNomeCategoria").val(),
                limit: limit,
                offset: offset
            }
        )
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

$(document).ready(function () {

    $("#modalNovaCategoria").on("click", function () {
        $("#cadastrarCategoriaModal").modal("show");
    });

    $("#criarCategoria").on("click", function () {
        let formularioEstaValido = true;
        let form = $("#formularioCadastrarCategoria")[0];
        if (!form.checkValidity()) {
            form.classList.add('was-validated');
            formularioEstaValido = false;
        }

        if (formularioEstaValido) {
            let nome = $("#nomeCategoria").val();
            criar(nome);
            $("#formularioCadastrarCategoria").removeClass("was-validated");
        }
    });

    $(document).on("click", ".visualizarCategoria", function () {
        let id_categoria = $(this).parents("tr.categoriaEncontrada").attr("id_categoria");
        $("#categoriaSelecionada").val(id_categoria);

        setSpinner($(this));

        lerPorId(id_categoria, $(this));
    });

    $("#alterarCategoria").on("click", function () {
        let formularioEstaValido = true;
        let form = $("#formularioAlterarCategoria")[0];
        if (!form.checkValidity()) {
            form.classList.add('was-validated');
            formularioEstaValido = false;
        }

        if (formularioEstaValido) {
            let id = $("#idCategoriaAtual").val();
            let nome = $("#nomeCategoriaVisualizada").val();

            setSpinner($("#alterarCategoria"));

            altera(id, nome);
            $("#formularioAlterarCategoria").removeClass("was-validated");
        }
    });

    $(document).on("click", ".btnProdutosDaCategoria", function () {
        let id_categoria = $(this).parents("tr.categoriaEncontrada").attr("id_categoria");
        $("#categoriaSelecionada").val(id_categoria);

        setSpinner($(this));

        listarProdutoPorCategoria(id_categoria, $(this));

        $("#visualizarCategoriaProdutosModal").modal("show");
    });

    $("#btnAdicionarProdutoACategoria").on("click", function () {
        let id_produto = $("#produtosSemCategoria").val();
        let id_categoria = $("#categoriaSelecionada").val();

        setSpinner($("#btnAdicionarProdutoACategoria"));

        inserirProdutoEmCategoria(id_categoria, id_produto);
    });

    $(document).on("click", ".removerProduto", function () {
        let id_produto = $(this).parents("tr").attr("id_produto");
        let id_categoria = $("#categoriaSelecionada").val();

        setSpinner($(this));

        removeProdutoEmCategoria(id_categoria, id_produto);
    });

    $("#btnPesquisarCategorias").on("click", function () {
        setSpinner($("#btnPesquisarCategorias"));

        pesquisar();
    });

});