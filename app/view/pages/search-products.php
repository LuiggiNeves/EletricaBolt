<?php
include('layout/cliente/head.php');
?>

<link rel="stylesheet" href="<?php echo HOST_APP; ?>/app/view/css/search-products.css">
<link rel="stylesheet" href="<?php echo HOST_APP; ?>/app/view/css/search-products-all.css">



<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</head>

<body>

    <?php include 'navbar.php' ?>


    <main>
        <div class="container-loc-page">
            <div class="loc-page">
                <div class="loc-page-path">
                    <p><a href="#">HOME </a> > <a href="#">CATEGORIA</a></p>
                </div>
                <div>
                    <h2 id="texto_valor_da_pesquisa"></h2>
                </div>
            </div>
        </div>

        <div class="container-search-results">

            <div class="main-search-results">
                <div class="catalago-box-container">
                    <div class="catalago-box" id="produtosEncontrados">

                    </div>
                </div>
            </div>

        </div>
    </main>


    <div id="container-footer">
        <?php include 'footer.php' ?>
    </div>

    <?php
    include('layout/cliente/footer.php');
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MVEwCi8WsuZu6L5i5zV6VjAGhFDpSc3NM9LAcLk8bFpOxksnDfjsiX2v4blGbX5R" crossorigin="anonymous"></script>

    <script src="<?php echo HOST_APP; ?>/app/view/js/inicio.js?v=<?php echo VERSION; ?>"></script>

    <script>
        $(document).ready(function() {
            const conteudo_url = $(location).attr('pathname').split("/").pop();
            const valorFormatado = decodeURIComponent(conteudo_url);

            $("#texto_valor_da_pesquisa").text(
                valorFormatado
            );

            pesquisarPorNome(
                valorFormatado
            );
        });
    </script>
</body>