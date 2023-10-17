function listar() {
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
                        <tr>
                            <td style="width: 80%">
                                `+ categorias[i]["nome"] + `
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

$(document).ready(function () {

    $("#modalNovaCategoria").on("click", function () {
        $("#cadastrarCategoriaModal").modal("show");
    });

    $("#criarCategoria").on("click", function () {
        let nome = $("#nomeCategoria").val();
        criar(nome);
    });

});