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
            <div class="col-sm-12 col-md-12 my-1">
                <span class="text-muted">
                    <i class="bi bi-person-fill"></i>
                    <?= unserialize($_SESSION["usuario_logado"])->getNome(); ?>
                </span>
            </div>

            <div class="col-sm-12 col-md-12 rounded bg-white border" style="min-height: 850px;">
                <div class="row p-4">
                    <div class="col-sm-12 col-md-12 mb-2">
                        <h3>
                            <i class="bi bi-people"></i>
                            Clientes
                        </h3>
                    </div>

                    <div class="col-sm-12 col-md-12 mb-4 mt-4">
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class=" alert alert-success" id="alertQtdClientes" style="display: none;">
                                    <span id="qtdClientes"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 mb-4">
                        <div class="spinner-loading-clientes w-100 text-center" style="display: none;">
                            <div class="spinner-border text-primary mt-5" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>

                        <div class="divTabelaCategoria table-responsive" style="min-height: 550px; overflow-y: scroll; overflow-x: hidden; display: none;">
                            <table class="table tabela-clientes table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Celular</th>
                                        <th scope="col">Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12">
                        <div class="row">
                            <div class="col-sm-12 col-md-auto mb-2">
                                <div class="bg-light border border-2 rounded" style="width: 25px; height: 25px; display: inline-block;">
                                    &nbsp;
                                </div>
                                <div style="display: inline-block;">
                                    <span style="font-size: 13px;" class="text-muted fw-bold">Cliente ativo</span>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-auto mb-2">
                                <div class="bg-danger rounded" style="width: 25px; height: 25px; display: inline-block;">
                                    &nbsp;
                                </div>
                                <div style="display: inline-block;">
                                    <span style="font-size: 13px;" class="text-muted fw-bold">Cliente inativo</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include('../../layout/modals/inativar_cliente.php');
    ?>

    <?php
    include('../../layout/modals/ativar_cliente.php');
    ?>

    <?php
    include('../../layout/footer.php');
    ?>

    <!-- Arquivos JS -->
    <script src="<?php echo HOST_APP; ?>/app/view/js/clientes.js?v=<?php echo VERSION; ?>"></script>

    <script>
        $(".divClientes").addClass("btn-item-navbar-selecionado");

        listarTodosOsClientes();
    </script>

</body>