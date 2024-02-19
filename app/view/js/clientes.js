function criar(nome, celular) {
    let formData = new FormData();
    formData.append("route", "criar-cliente");
    formData.append("nome", nome);
    formData.append("celular", celular);

    post("../../app/controller/http/controller.php", formData,
        function (response) {
            let dados = response["dados"];
            let mensagem = response["mensagem"];

            $("#criarContaCliente").html("Criar conta");
            $("#criarContaCliente").removeAttr("disabled");

            swal({
                title: "Cadastrado com sucesso!",
                text: "",
                icon: "success"
            })
                .then((btnOkWasPressed) => {
                    sessionStorage.setItem("nomeCliente", dados["cliente"]["nome"]);
                    sessionStorage.setItem("idCliente", dados["cliente"]["id"]);

                    if (sessionStorage.getItem("ultimaUrlVisitada") != null) {
                        window.location = sessionStorage.getItem("ultimaUrlVisitada");
                    } else {
                        window.location = "../../";
                    }
                });
        },
        function () {
            $("#criarContaCliente").html("Criar conta");
            $("#criarContaCliente").removeAttr("disabled");
        }
    );
}

function login(celular) {
    let formData = new FormData();
    formData.append("route", "login-cliente");
    formData.append("celular", celular);

    post("../../app/controller/http/controller.php", formData,
        function (response) {
            let dados = response["dados"];
            let mensagem = response["mensagem"];

            sessionStorage.setItem("nomeCliente", dados["cliente"]["nome"]);
            sessionStorage.setItem("idCliente", dados["cliente"]["id"]);

            $("#loginCliente").html("Entrar");
            $("#loginCliente").removeAttr("disabled");

            if (sessionStorage.getItem("ultimaUrlVisitada") != null) {
                window.location = sessionStorage.getItem("ultimaUrlVisitada");
            } else {
                window.location = "../../";
            }
        },
        function () {
            $("#loginCliente").html("Entrar");
            $("#loginCliente").removeAttr("disabled");
        }
    );
}

function listarTodosOsClientes() {
    $(".divTabelaCategoria").hide();
    $(".spinner-loading-clientes").show();

    let formData = new FormData();
    formData.append("route", "listar-clientes");

    post("../app/controller/http/controller.php", formData,
        function (response) {
            let dados = response["dados"];
            let mensagem = response["mensagem"];

            let clientes = dados["clientes"];

            $(".tabela-clientes tbody tr").remove();

            for (let i = 0; i < clientes.length; i++) {
                $(".tabela-clientes tbody").append(
                    `
                        <tr>
                            <td>
                                `+ clientes[i]["nome"] + `
                            </td>
                            <td>
                                `+ clientes[i]["celular"] + `
                            </td>
                        </tr>
                    `
                );
            }

            $(".spinner-loading-clientes").hide();
            $(".divTabelaCategoria").show();
        },
        function () {
        }
    );
}

$(document).ready(function () {

    $("#criarContaCliente").on("click", function () {
        let formularioEstaValido = true;
        let form = $("#formClienteCriarConta")[0];
        if (!form.checkValidity()) {
            form.classList.add('was-validated');
            formularioEstaValido = false;
        }

        if (formularioEstaValido) {
            setSpinner($("#criarContaCliente"));

            criar(
                $("#nomeCriarCliente").val(),
                $("#celularCriarCliente").val()
            );
            $("#formClienteCriarConta").removeClass("was-validated");
        }
    });

    $("#loginCliente").on("click", function () {
        login($("#celularLogin").val());
    });

});