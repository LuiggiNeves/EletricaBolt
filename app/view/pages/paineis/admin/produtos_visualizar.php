<?php
include('../../layout/usuario/head.php');
?>

<?php
include('../../layout/usuario/auth.php');
?>

<style>
    .center-content {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
    }
</style>

</head>

<body>

    <?php
    include('../../layout/navbar_usuario.php');
    ?>

    <div class="container-fluid mt-3">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-12 my-1">
                <div class="row">
                    <div class="col-sm-12 col-md-3 my-3">
                        <button class="btn btn-sm btn-primary w-100" onclick="window.history.back()">Voltar</button>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-12 my-1">
                <span class="text-muted">
                    <i class="bi bi-person-fill"></i>
                    <?= unserialize($_SESSION["usuario_logado"])->getNome(); ?>
                </span>
            </div>

            <div class="col-sm-12 col-md-12 rounded bg-white border mb-3">
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
                                <div class="col-sm-12 col-md-12 mb-1">
                                    <small><b>Código de barras: </b> <span id="codigoDeBarrasDoProduto"></span></small>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-4 mt-3">
                            <span class="float-end editarDados mx-4" id="btnAbrirModalAlterarProduto">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z" />
                                </svg>&nbsp;Editar
                            </span>
                        </div>

                        <input type="hidden" id="idDoProdutoSelecionado" />
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-12 rounded bg-white border mb-3">
                <div class="row p-4">
                    <div class="col-sm-12 col-md-12">
                        <h3>
                            <i class="bi bi-images"></i>
                            Imagens
                        </h3>
                    </div>

                    <div class="row mt-3">
                        <div class="col-sm-12 col-md-12">
                            <div class="row imagensDoProduto">
                                <div class="col-sm-12 col-md-3 border rounded bg-light center-content mx-1 mb-2" style="height: 200px;" id="btnAdicionarNovaImagem">
                                    <small class="text-muted">Adicione uma imagem</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-12 rounded bg-white border mb-3">
                <div class="row p-4">
                    <div class="row mb-3">
                        <div class="col-sm-12 col-md-12">
                            <div class="row g-3 mb-4">
                                <div class="col-sm-12 col-md-12">
                                    <h3 class="">
                                        <i class="bi bi-bar-chart"></i>
                                        <span class="">Métricas</span>
                                    </h3>
                                </div>

                                <div class="col">
                                    <div class="bg-white justify-content-around align-items-center rounded">
                                        <div>
                                            <h3 class="fs-2 text-primary" id="qtd_acessos_ao_produto"></h3>
                                            <p class="fs-5 labelEstatisticaProduto">Qtd. de acessos</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <input type="file" id="novaImagemDoProduto" style="display: none;" />

    <!-- Modal para alterar produto -->
    <?php
    include('../../layout/modals/produto_alterar.php');
    ?>

    <?php
    include('../../layout/usuario/footer.php');
    ?>

    <!-- Arquivos JS -->
    <script src="<?php echo HOST_APP; ?>/app/view/js/produtos.js?v=<?php echo VERSION; ?>"></script>

    <script>
        const id = $(location).attr('pathname').split("/")[3];

        listarCategorias();
        leProdutoPorId(id);
    </script>

</body>