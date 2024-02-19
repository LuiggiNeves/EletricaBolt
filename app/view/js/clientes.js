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
                let status = clientes[i]["status"];
                let bgTd = status == "Inativo" ? "table-danger" : "";

                $(".tabela-clientes tbody").append(
                    `
                        <tr class="`+ bgTd + `" id_cliente="` + clientes[i]["id"] + `" status="` + clientes[i]["status"] + `" pode_ver_preco="` + clientes[i]["pode_ver_preco"] + `">
                            <td class="col-2">
                                `+ clientes[i]["nome"] + `
                            </td>
                            <td class="col-2">
                                `+ clientes[i]["celular"] + `
                            </td>
                            <td class="col-2">
                                `+ clientes[i]["status"] + `
                            </td>
                            <td class="col-6">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6 mb-2">
                                        <button class="btn btn-primary btn-sm w-100 alterarStatus">
                                            Alterar status
                                        </button>
                                    </div>

                                    <div class="col-sm-12 col-md-6 mb-2">
                                        <button class="btn btn-primary btn-sm w-100 alteraAcessoProdutos">
                                            Acesso a produtos
                                        </button>
                                    </div>
                                </div>
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

function alteraStatus(id, status) {
    let formData = new FormData();
    formData.append("route", "altera-status-cliente");
    formData.append("id", id);
    formData.append("status", status);

    post("../app/controller/http/controller.php", formData,
        function (response) {
            let dados = response["dados"];
            let mensagem = response["mensagem"];

            $(".modal").modal("hide");
            swal("Status alterado com sucesso!", "", "success");

            listarTodosOsClientes();
        },
        function () {
        }
    );
}

function alteraPodeVerPreco(id, pode_ver_preco) {
    let formData = new FormData();
    formData.append("route", "altera-pode-ver-preco-cliente");
    formData.append("id", id);
    formData.append("pode_ver_preco", pode_ver_preco);

    post("../app/controller/http/controller.php", formData,
        function (response) {
            let dados = response["dados"];
            let mensagem = response["mensagem"];

            $(".modal").modal("hide");
            swal("Cliente alterado com sucesso!", "", "success");

            listarTodosOsClientes();
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

    $(document).on("click", ".alterarStatus", function () {
        let status = $(this).parents("tr").attr("status");
        let id = $(this).parents("tr").attr("id_cliente");

        if (status == "Ativo") {
            $("#idClienteSelecionadoInativar").val(id);

            $("#inativarClienteModal").modal("show");
        }

        if (status == "Inativo") {
            $("#idClienteSelecionadoAtivar").val(id);

            $("#ativarClienteModal").modal("show");
        }
    });

    $(document).on("click", ".btnInativarCliente", function () {
        let id = $("#idClienteSelecionadoInativar").val();

        alteraStatus(id, "Inativo");
    });

    $(document).on("click", ".btnAtivarCliente", function () {
        let id = $("#idClienteSelecionadoAtivar").val();

        alteraStatus(id, "Ativo");
    });

    $(document).on("click", ".alteraAcessoProdutos", function () {
        let id = $(this).parents("tr").attr("id_cliente");
        let pode_ver_preco = $(this).parents("tr").attr("pode_ver_preco");

        $("#clienteSelecionadoAlterarAcesso").val(id);
        $("[name='permitirVerProduto'][value='" + pode_ver_preco + "']").prop("checked", true);

        $("#alterarAcessoProduto").modal("show");
    });

    $("#btnSalvarAcesso").on("click", function () {
        alteraPodeVerPreco(
            $("#clienteSelecionadoAlterarAcesso").val(),
            $("[name='permitirVerProduto']:checked").val()
        );
    });

});