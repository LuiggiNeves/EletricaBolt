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
            <div class="col-sm-12 col-md-10 my-1">
                <span class="text-muted">
                    <i class="bi bi-person-fill"></i>
                    <?= unserialize($_SESSION["usuario_logado"])->getNome(); ?>
                </span>
            </div>

            <div class="col-sm-12 col-md-10 rounded bg-white shadow-sm p-4" style="height: 450px;">
                <div class="row mb-3">
                    <div class="col-sm-12 col-md-12">
                        <div class="row g-3 mb-4">
                            <div class="col-sm-12 col-md-12">
                                <h5 class="">
                                    <i class="bi bi-bar-chart"></i>
                                    <span class="">Métricas</span>
                                </h5>
                            </div>

                            <div class="col">
                                <div class="bg-white justify-content-around align-items-center rounded">
                                    <div>
                                        <h3 class="fs-2 text-primary" id="qtd_acessos_a_produtos">0</h3>
                                        <p class="fs-5 labelEstatisticaPainelAdmin">Qtd. de acessos a produtos</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-sm-12 col-md-12">
                                <h5 class="">
                                    <i class="bi bi-box"></i>
                                    <span class="">Produtos mais acessados</span>
                                </h5>
                            </div>

                            <div class="col">
                                <div class="row justify-content-center">
                                    <div class="col-sm-12 col-md-8">
                                        <div class="slider produtosMaisAcessados">
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

    <?php
    include('../../layout/footer.php');
    ?>

    <!-- Slick JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(".divPainel").addClass("btn-item-navbar-selecionado");
    </script>

</body>