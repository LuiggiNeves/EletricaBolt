function login(email, senha) {
    let formData = new FormData();
    formData.append("route", "login");
    formData.append("email", email);
    formData.append("senha", senha);

    post("../app/controller/http/controller.php", formData,
        function (response) {
            let dados = response["dados"];
            let mensagem = response["mensagem"];

            if (dados["login_realizado"]) {
                window.location = "../painel/";
            } else {
                swal("Houve um erro ao tentar realizar o login", "", "error")
            }

            $("#realizaLogin").html("Acessar");
            $("#realizaLogin").removeAttr("disabled");
        },
        "",
        function () {
            $("#realizaLogin").html("Acessar");
            $("#realizaLogin").removeAttr("disabled");
        }
    );
}

$(document).ready(function () {

    $("#realizaLogin").on("click", function () {
        let email = $("#email").val();
        let senha = $("#senha").val();

        login(email, senha);
    });

});