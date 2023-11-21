function listar() {
    $(".divTabelaCategoria").hide();
    $(".spinner-loading-categorias").show();

    let formData = new FormData();
    formData.append("route", "listar-categorias");

    post("../app/controller/http/controller.php", formData,
        function (response) {
            let dados = response["dados"];
            let mensagem = response["mensagem"];

            let categorias = dados["categorias"];

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

function lerPorId(id) {
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

            listar();
            $(".modal").modal("hide");

            swal(mensagem, "", "success");
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

function listarProdutoPorCategoria(id_categoria) {
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

function removeProdutoEmCategoria(id_categoria, id_produto) {
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

$(document).ready(function () {

    $("#modalNovaCategoria").on("click", function () {
        $("#cadastrarCategoriaModal").modal("show");
    });

    $("#criarCategoria").on("click", function () {
        let nome = $("#nomeCategoria").val();
        criar(nome);
    });

    $(document).on("click", ".visualizarCategoria", function () {
        let id_categoria = $(this).parents("tr.categoriaEncontrada").attr("id_categoria");
        $("#categoriaSelecionada").val(id_categoria);

        lerPorId(id_categoria);
    });

    $("#alterarCategoria").on("click", function () {
        let id = $("#idCategoriaAtual").val();
        let nome = $("#nomeCategoriaVisualizada").val();

        altera(id, nome);
    });

    $(document).on("click", ".btnProdutosDaCategoria", function () {
        let id_categoria = $(this).parents("tr.categoriaEncontrada").attr("id_categoria");
        $("#categoriaSelecionada").val(id_categoria);

        listarProdutoPorCategoria(id_categoria);

        $("#visualizarCategoriaProdutosModal").modal("show");
    });

    $("#btnAdicionarProdutoACategoria").on("click", function () {
        let id_produto = $("#produtosSemCategoria").val();
        let id_categoria = $("#categoriaSelecionada").val();

        inserirProdutoEmCategoria(id_categoria, id_produto);
    });

    $(document).on("click", ".removerProduto", function () {
        let id_produto = $(this).parents("tr").attr("id_produto");
        let id_categoria = $("#categoriaSelecionada").val();

        removeProdutoEmCategoria(id_categoria, id_produto);
    });

});