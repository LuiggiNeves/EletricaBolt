function convertDate(inputFormat) {
    function pad(s) { return (s < 10) ? '0' + s : s; }
    var d = new Date(inputFormat);
    return [pad(d.getDate()), pad(d.getMonth() + 1), d.getFullYear()].join('/')
}

function formatarData(data) {
    const partes = data.split('-');
    const dia = partes[2];
    const mes = partes[1];
    const ano = partes[0];
    return `${dia}/${mes}/${ano}`;
}

function diaAtual() {
    const today = new Date();
    const yyyy = today.getFullYear();
    let mm = today.getMonth() + 1; // Months start at 0!
    let dd = today.getDate();

    if (dd < 10) dd = '0' + dd;
    if (mm < 10) mm = '0' + mm;

    return formattedToday = dd + '/' + mm + '/' + yyyy;
}

function ativarGifLoader(div_do_gif, div_para_desativar) {
    $(div_para_desativar).hide();
    $(div_do_gif).show();
}

function desativarGifLoader(div_do_gif, div_para_ativar) {
    $(div_do_gif).hide();
    $(div_para_ativar).show();
}

function ajaxDinamico(url, tipo, dados, sucesso, token = "", error = null) {
    $.ajax({
        url: url,
        type: tipo,
        data: dados,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data, textStatus, xhr) {
            // Depuração
            // console.log(data);

            sucesso(data, textStatus, xhr);
        },
        error: function (response) {
            // Depuração
            // console.log(response);

            if (error != null) {
                error();
            }

            let mensagem = response["responseJSON"][0];
            $(".modal").modal("hide");
            swal(mensagem, "", "error");
        }
    });
}

function post(url, dados, sucesso, auth = false) {
    ajaxDinamico(url, "POST", dados, sucesso, (auth ? getToken() : ""));
}

function get(url, dados, sucesso, auth = false) {
    ajaxDinamico(url, "GET", dados, sucesso, (auth ? getToken() : ""));
}

function gerarStringAleatoria(tamanho) {
    const caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    let resultado = '';

    for (let i = 0; i < tamanho; i++) {
        const indiceAleatorio = Math.floor(Math.random() * caracteres.length);
        resultado += caracteres.charAt(indiceAleatorio);
    }

    return resultado;
}

function inicializaMascarasDoSistema() {
    $('.numero').mask("#");
}

$(document).ready(function () {

    inicializaMascarasDoSistema();

    $("form.naoEnvia").submit(function (e) {
        e.preventDefault();
    });

});