function listar() {
    let formData = new FormData();
    formData.append("route", "listar-produtos");

    post("../app/controller/http/controller.php", formData,
        function (response) {
            let dados = response["dados"];
            let mensagem = response["mensagem"];

            let produtos = dados["produtos"];

            $(".tabela-produtos tbody tr").remove();

            for (let i = 0; i < produtos.length; i++) {
                $(".tabela-produtos tbody").append(
                    `
                        <tr>
                            <td style="width: 80%">
                                `+ produtos[i]["nome"] + `
                            </td>

                            <td style="width: 20%">
                                <button class="btn btn-sm backgroundTema text-white w-100">
                                    Visualizar
                                </button>
                            </td>
                        </tr>
                    `
                );
            }
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

});