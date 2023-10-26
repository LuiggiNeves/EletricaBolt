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

            <div class="col-sm-12 col-md-10 rounded bg-white border shadow-sm" style="height: 800px;">
                <div class="row p-4">
                    <div class="col-sm-12 col-md-12">
                        <h3>
                            <i class="bi bi-box"></i>
                            Produtos
                        </h3>
                    </div>

                    <div class="col-sm-12 col-md-12 mb-2">
                        <div class="row mt-4">
                            <div class="col-sm-12 col-md-3">
                                <button class="btn btn-sm w-100 backgroundTema text-white" id="modalNovoProduto">Novo produto</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 mb-2 mt-4">
                        <div class="alert alert-success" role="alert" id="qtdProdutos">
                            
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 mb-2">
                        <div class="tabela-produtos row">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para visualizar ranking de unidade -->
    <?php
    include('../../layout/modals/produto_cadastrar.php');
    ?>

    <?php
    include('../../layout/footer.php');
    ?>

    <!-- Arquivos JS -->
    <script src="<?php echo HOST_APP; ?>/app/view/js/produtos.js?v=<?php echo VERSION; ?>"></script>

    <script>
        $(".divProdutos").addClass("btn-item-navbar-selecionado");

        listar();
    </script>

</body>