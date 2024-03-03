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
                    <p><a href="#">home </a> > <a href="#">Categoria</a></p>
                </div>
                <div>
                    <h2 id="texto_valor_da_pesquisa"></h2>
                </div>
            </div>

        </div>
        <div class="container-search-results">

            <div class="main-search-results">
                <!--RETIRAR OS INCLUDES E LIGAR COM OS PRODUTOS EM PHP-->
                <?php include 'produto-search-all.php'; ?>
                <?php include 'produto-search-all.php'; ?>
                <?php include 'produto-search-all.php'; ?>
                <?php include 'produto-search-all.php'; ?>
                <?php include 'produto-search-all.php'; ?>
                <?php include 'produto-search-all.php'; ?>
                <?php include 'produto-search-all.php'; ?>
                <?php include 'produto-search-all.php'; ?>
                <?php include 'produto-search-all.php'; ?>
                <?php include 'produto-search-all.php'; ?>
                <?php include 'produto-search-all.php'; ?>
                <?php include 'produto-search-all.php'; ?>
            </div>
        </div>

        <div class="container-next-list-product">
            <div class="next-list-product">
                <a href="#">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
                <a href="#">5</a>
                <p>...</p>
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

    <script>
        $(document).ready(function() {
            const conteudo_url = $(location).attr('pathname').split("/")[4];
            const valorFormatado = decodeURIComponent(conteudo_url);

            $("#texto_valor_da_pesquisa").text(
                valorFormatado
            );
        });
    </script>
</body>