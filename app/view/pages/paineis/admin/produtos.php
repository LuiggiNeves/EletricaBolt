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

            <div class="col-sm-12 col-md-10 rounded bg-white shadow-sm mb-3" style="min-height: 850px;">
                <div class="row p-4">
                    <div class="col-sm-12 col-md-12">
                        <h3>
                            <i class="bi bi-box"></i>
                            Produtos
                        </h3>
                    </div>

                    <div class="col-sm-12 col-md-12 mb-5">
                        <div class="row mt-4">
                            <div class="col-sm-12 col-md-3">
                                <button class="btn btn-sm btn-primary w-100 text-white" id="modalNovoProduto">Novo produto</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 mb-2">
                        <?php include '../../layout/formularios/pesquisa_produtos.php'; ?>
                    </div>

                    <div class="col-sm-12 col-md-12 mb-4 mt-4">
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class=" alert alert-success" id="alertQtdProdutos" style="display: none;">
                                    <span id="qtdProdutos"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="divConteudoProdutos col-sm-12 col-md-12 mb-2" style="display: none;">
                        <div class="spinner-loading-produtos text-center" style="display: none;">
                            <div class="spinner-border text-primary mt-5" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>

                        <div class="tabela-produtos row mx-1" style="display: none; height: 300px; overflow-y: scroll;">
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

    <!-- Modal para cadastrar produto -->
    <?php
    include('../../layout/modals/produto_cadastrar.php');
    ?>

    <!-- Modal para visualizar e alterar produto -->
    <?php
    include('../../layout/modals/produto_visualizar.php');
    ?>

    <?php
    include('../../layout/footer.php');
    ?>

    <!-- Arquivos JS -->
    <script src="<?php echo HOST_APP; ?>/app/view/js/produtos.js?v=<?php echo VERSION; ?>"></script>

    <script>
        $(".divProdutos").addClass("btn-item-navbar-selecionado");

        listarCategorias();
    </script>

</body>