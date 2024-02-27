<?php
include('../../layout/head.php');
?>

<?php
include('../../layout/auth.php');
?>

<!-- Slick CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


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

            <div class="col-sm-12 col-md-12 rounded bg-white border p-4" style="min-height: 450px;">
                <div class="row mb-3">
                    <div class="col-sm-12 col-md-12">
                        <div class="row g-3 mb-4">
                            <div class="col-sm-12 col-md-12 mb-3">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <h4 class="">
                                            <i class="bi bi-speedometer2"></i>
                                            <span class="">Painel</span>
                                        </h4>
                                    </div>
                                </div>

                                <div class="bg-white justify-content-around align-items-center rounded">
                                    <div>
                                        <h3 class="fs-2 text-primary" id="qtd_acessos_a_produtos">0</h3>
                                        <p class="fs-5 labelEstatisticaPainelAdmin">Qtd. de acessos a produtos</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12 mb-3">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <h4 class="">
                                            <i class="bi bi-bar-chart-fill"></i>
                                            <span class="">Produtos mais acessados</span>
                                        </h4>
                                    </div>
                                </div>

                                <div class="row" id="produtos_mais_acessados">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include('../../layout/footer.php');
    ?>

    <!-- Arquivos JS -->
    <script src="<?php echo HOST_APP; ?>/app/view/js/painel.js?v=<?php echo VERSION; ?>"></script>

    <!-- Slick JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(".divPainel").addClass("btn-item-navbar-selecionado");

        qtdDeAcessoAProdutos();
        listaProdutosMaisAcessados();
    </script>

</body>