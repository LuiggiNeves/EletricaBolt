<?php
include('../../layout/head.php');
?>

<?php
include('../../layout/auth.php');
?>
</head>

<body>

    <?php
    include('../../layout/navbar_usuario.php');
    ?>

    <div class="container-fluid mt-3">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-10 my-1">
                <span class="text-muted">
                    <i class="bi bi-person-fill"></i>
                    <?= unserialize($_SESSION["usuario_logado"])->getNome(); ?>
                </span>
            </div>

            <div class="col-sm-12 col-md-10 rounded bg-white shadow-sm" style="height: 450px;">
                <div class="row p-4">
                    <div class="col-sm-12 col-md-12">
                        <h3>
                            <i class="bi bi-speedometer2"></i>
                            Painel
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include('../../layout/footer.php');
    ?>

    <script>
        $(".divPainel").addClass("btn-item-navbar-selecionado");
    </script>

</body>