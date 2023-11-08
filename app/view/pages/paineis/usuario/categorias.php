<?php
include('../../layout/head.php');
?>

<?php
include('../../layout/auth.php');
?>

</head>

<body class="bg-light">

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

            <div class="col-sm-12 col-md-10 rounded bg-white border shadow-sm" style="height: 400px;">
                <div class="row p-4">
                    <div class="col-sm-12 col-md-12 mb-2">
                        <h3>
                            <i class="bi bi-grid"></i>
                            Categorias
                        </h3>
                    </div>

                    <div class="col-sm-12 col-md-12 mb-2">
                        <div class="row mt-4">
                            <div class="col-sm-12 col-md-3">
                                <button class="btn btn-sm w-100 backgroundTema text-white" id="modalNovaCategoria">Nova categoria</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 mb-2">
                        <table class="table tabela-categorias">
                            <thead>
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para cadastrar categoria -->
    <?php
    include('../../layout/modals/categoria_cadastrar.php');
    ?>

    <!-- Modal para visualizar categoria -->
    <?php
    include('../../layout/modals/categoria_visualizar.php');
    ?>

    <?php
    include('../../layout/footer.php');
    ?>

    <!-- Arquivos JS -->
    <script src="<?php echo HOST_APP; ?>/app/view/js/categorias.js?v=<?php echo VERSION; ?>"></script>

    <script>
        $(".divCategorias").addClass("btn-item-navbar-selecionado");

        listar();
    </script>

</body>