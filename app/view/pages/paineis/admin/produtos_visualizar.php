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

            <div class="col-sm-12 col-md-10 rounded bg-white shadow-sm mb-3">
                <div class="row p-4">
                    <div class="col-sm-12 col-md-12">
                        <h3>
                            <i class="bi bi-box"></i>
                            Produtos
                        </h3>
                    </div>

                    <div class="row mt-3">
                        <div class="col-sm-12 col-md-8">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 mb-1">
                                    <small><b>Nome: </b> <span id="nomeDoProduto"></span></small>
                                </div>
                                <div class="col-sm-12 col-md-12 mb-1">
                                    <small><b>Categoria: </b> <span id="categoriaDoProduto"></span></small>
                                </div>
                                <div class="col-sm-12 col-md-12 mb-1">
                                    <small><b>Descrição: </b> <span id="descricaoDoProduto"></span></small>
                                </div>
                                <div class="col-sm-12 col-md-12 mb-1">
                                    <small><b>Preço: </b> <span id="precoDoProduto"></span></small>
                                </div>
                                <div class="col-sm-12 col-md-12 mb-1">
                                    <small><b>Código de referência: </b> <span id="codigoDeReferenciaDoProduto"></span></small>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-4">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 text-center">
                                    <div id="imagemContainer" class="rounded"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-4 mt-3">
                            <button class="btn btn-sm btn-primary w-100" id="btnAbrirModalAlterarProduto">Alterar produto</button>
                        </div>

                        <input type="hidden" id="idDoProdutoSelecionado" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para alterar produto -->
    <?php
    include('../../layout/modals/produto_alterar.php');
    ?>

    <?php
    include('../../layout/footer.php');
    ?>

    <!-- Arquivos JS -->
    <script src="<?php echo HOST_APP; ?>/app/view/js/produtos.js?v=<?php echo VERSION; ?>"></script>

    <script>
        const id = $(location).attr('pathname').split("/")[3];

        listarCategorias();
        leProdutoPorId(id);
    </script>

</body>