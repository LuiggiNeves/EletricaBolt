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

$(document).ready(function () {


});