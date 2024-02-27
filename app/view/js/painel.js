function qtdDeAcessoAProdutos() {
    let formData = new FormData();
    formData.append("route", "qtd-acesso-produtos");

    post("../app/controller/http/controller.php", formData,
        function (response) {
            let dados = response["dados"];
            let mensagem = response["mensagem"];

            $("#qtd_acessos_a_produtos").text(dados["qtd"])
        },
        function () {
        }
    );
}

function listaProdutosMaisAcessados() {
    let formData = new FormData();
    formData.append("route", "produtos-mais-acessados");

    post("../app/controller/http/controller.php", formData,
        function (response) {
            let dados = response["dados"];
            let mensagem = response["mensagem"];

            let produtos = dados["produtos"];

            for (let i = 0; i < produtos.length; i++) {
                let path_imagem = produtos[i]["imagem_path"] != null ? `../app/files/entities/` + produtos[i]["imagem_path"] + `` : `../app/view/images/produto.png`;

                $("#produtos_mais_acessados").append(
                    `
                    <div class="col-sm-12 col-md-2">
                        <div class="row justify-content-center border p-3">
                            <div class="col-sm-12 col-md-12 text-center mb-2">
                                <img src="`+ path_imagem + `" style="height: 100px; width: 100px;"/>
                            </div>
                            <div class="col-sm-12 col-md-12 text-center">
                                <b>`+ produtos[i]["nome"] + `</b>
                                <br>
                                <b><span class="text-primary">`+ produtos[i]["qtd"] + `</span> qtd. de acessos</b>
                            </div>
                        </div>
                    </div>
                    `
                );
            }
        },
        function () {
        }
    );
}

$(document).ready(function () {


});