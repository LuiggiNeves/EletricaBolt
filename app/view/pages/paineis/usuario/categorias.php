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
                    <div class="col-sm-12 col-md-12 mb-2">
                        <h3>
                            <i class="bi bi-grid"></i>
                            Categorias
                        </h3>
                    </div>

                    <div class="col-sm-12 col-md-12 mb-2">
                        <div class="row mt-4">
                            <div class="col-sm-12 col-md-3">
                                <button class="btn btn-sm btn-primary w-100 text-white" id="modalNovaCategoria">Nova categoria</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 mb-2">
                        <div class="table-responsive" style="height: 300px; overflow-y: scroll; overflow-x: hidden;">
                            <table class="table tabela-categorias table-striped table-hover">
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
    </div>

    <!-- Modal para cadastrar categoria -->
    <?php
    include('../../layout/modals/categoria_cadastrar.php');
    ?>

    <!-- Modal para visualizar categoria -->
    <?php
    include('../../layout/modals/categoria_visualizar.php');
    ?>

    <!-- Modal para visualizar produtos da categoria -->
    <?php
    include('../../layout/modals/categoria_produtos.php');
    ?>

    <?php
    include('../../layout/footer.php');
    ?>

    <!-- Arquivos JS -->
    <script src="<?php echo HOST_APP; ?>/app/view/js/categorias.js?v=<?php echo VERSION; ?>"></script>

    <script>
        $(".divCategorias").addClass("btn-item-navbar-selecionado");

        listar();
        listarProdutosSemCategoria();
    </script>

</body>