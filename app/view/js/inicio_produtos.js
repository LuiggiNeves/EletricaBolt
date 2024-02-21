function leDadosDoProdutoPorId(id) {
    let formData = new FormData();
    formData.append("route", "le-produto-por-id");
    formData.append("id", id);

    post("../../app/controller/http/controller.php", formData,
        function (response) {
            let dados = response["dados"];
            let mensagem = response["mensagem"];

            let produto = dados["produto"];

            carregaViewDoProduto(
                produto["nome"],
                formataDinheiro(produto["preco"]),
                produto["categoria"]["nome"],
                produto["codigo_referencia"],
                produto["descricao"]
            );

            carregaImagensDoProduto(
                produto["imagens"]
            );
        },
        function () {

        }
    );
}

function carregaViewDoProduto(nome, preco, categoria, codigo_de_referencia, descricao) {
    $("#nomeDoProduto").text(nome);
    $("#precoDoProduto").text(preco);

    if (categoria == null) {
        $("#divCategoriaDoProduto").hide();
    } else {
        $("#categoriaDoProduto").text(categoria);
    }

    $("#codigoDeReferenciaDoProduto").text(codigo_de_referencia);
    $("#descricaoDoProduto").text(descricao);
}

function carregaImagensDoProduto(imagens) {
    let imagem_padrao = `../../app/view/images/produto.png`;
    if (Array.isArray(imagens)) {
        for (let i = 0; i < imagens.length; i++) {
            let path_imagem = imagens[i]["imagem_path"] != null ? `../../app/files/entities/` + imagens[i]["imagem_path"] + `` : imagem_padrao;
            if (i == 0) {
                imagem_padrao = path_imagem;
            }

            $(".multiple-imgs").append(
                `
                    <img src="`+ path_imagem + `" class="w-100" />
                `
            );
        }
    }

    $("#imagemDoProduto").attr("src", imagem_padrao);
}

function visualizarProduto(id) {
    let formData = new FormData();
    formData.append("route", "visualizar-produto");
    formData.append("id", id);

    post("../../app/controller/http/controller.php", formData,
        function (response) {
            let dados = response["dados"];
            let mensagem = response["mensagem"];
        },
        function () {

        }
    );
}

$(document).ready(function () {

});