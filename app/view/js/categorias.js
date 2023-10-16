function listar() {
    let formData = new FormData();
    formData.append("route", "listar-categorias");

    post("../app/controller/http/controller.php", formData,
        function (response) {
            let dados = response["dados"];
            let mensagem = response["mensagem"];

            let categorias = dados["categorias"];

            for (let i = 0; i < categorias.length; i++) {
                $(".tabela-categorias tbody").append(
                    `
                        <tr>
                            <td style="width: 80%">
                                `+ categorias[i]["nome"] + `
                            </td>

                            <td style="width: 20%">
                                <button class="btn btn-sm btn-primary w-100">
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

$(document).ready(function () {

});