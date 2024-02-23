<?php
include('layout/head.php');
include('layout/ultimaUrlVisitada.php');
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</head>

<body>
    <?php include 'navbar.php' ?>

    <main>
        <div class="container-main-preview ">
            <div class="main-preview-layout border">

                <div class="container-content">
                    <div class="product-preview-img">
                        <div class="multiple-imgs"></div>

                        <div class="active-img-container">
                            <div class="active-img">
                                <div class="border">
                                    <img id="imagemDoProduto">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="product-preview-info-container">
                        <div class="product-preview-info">
                            <h1 id="nomeDoProduto"></h1>

                            <?php if (isset($_SESSION["pode_ver_preco"]) && $_SESSION["pode_ver_preco"] == 'Sim') : ?>
                                <div id="divPrecoDoProduto">
                                    <strong>Preço:</strong> <span id="precoDoProduto"></span>
                                </div>
                            <?php endif; ?>

                            <div id="divCategoriaDoProduto">
                                <strong>Categoria:</strong> <span id="categoriaDoProduto"></span>
                            </div>
                        </div>

                        <div class="product-preview-container-btn">
                            <div class="product-preview-btn">
                                <input type="button" value="Pedir produto">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product-preview-descricao">
                    <h3>Descrição</h3>

                    <p id="descricaoDoProduto"></p>
                </div>
            </div>
        </div>
    </main>

    <div id="container-footer">
        <?php include 'footer.php' ?>
    </div>

    <?php include 'layout/footer.php' ?>

    <!-- Arquivos JS -->
    <script src="<?php echo HOST_APP; ?>/app/view/js/inicio_produtos.js?v=<?php echo VERSION; ?>"></script>

    <script>
        const id = $(location).attr('pathname').split("/")[4];

        leDadosDoProdutoPorId(id);
        visualizarProduto(id);
    </script>

</body>