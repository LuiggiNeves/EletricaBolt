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

            <div class="col-sm-12 col-md-10 rounded bg-white shadow-sm" style="min-height: 850px;">
                <div class="row p-4">
                    <div class="col-sm-12 col-md-12 mb-2">
                        <h3>
                            <i class="bi bi-grid"></i>
                            Categorias
                        </h3>
                    </div>

                    <div class="col-sm-12 col-md-12 mb-5">
                        <div class="row mt-4">
                            <div class="col-sm-12 col-md-3">
                                <button class="btn btn-sm btn-primary w-100 text-white" id="modalNovaCategoria">Nova categoria</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 mb-2">
                        <?php include '../../layout/formularios/pesquisa_categorias.php'; ?>
                    </div>

                    <div class="col-sm-12 col-md-12 mb-4 mt-4">
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class=" alert alert-success" id="alertQtdCategorias" style="display: none;">
                                    <span id="qtdCategorias"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 mb-2">
                        <div class="spinner-loading-categorias w-100 text-center" style="display: none;">
                            <div class="spinner-border text-primary mt-5" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>

                        <div class="divTabelaCategoria table-responsive" style="height: 300px; overflow-y: scroll; overflow-x: hidden; display: none;">
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

                    <div class="col-sm-12 col-md-12 mt-3" id="divPaginacao" style="display: none;">
                        <button class="btn btn-outline-primary btn-sm btn-anterior" onclick="paginaAnterior()">
                            Anterior
                        </button>
                        <span class="paginacao-info mx-3">
                            Página
                            <span id="paginaAtual"></span>
                            de
                            <span id="totalPaginas"></span>
                        </span>
                        <button class="btn btn-outline-primary btn-sm btn-proximo" onclick="proximaPagina()">
                            Próximo
                        </button>
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

        listarProdutosSemCategoria();
    </script>

</body>