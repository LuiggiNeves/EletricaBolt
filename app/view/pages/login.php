<?php
include('layout/usuario/head.php');
?>

<style>
    body {
        margin: 0;
        padding: 0;
    }
</style>

</head>

<body class="bg-light">

    <section class="h-100 mt-2">
        <div class="container h-100">
            <div class="row justify-content-md-center h-100">
                <div class="col-md-5 col-sm-12">
                    <div class="card-wrapper mt-5">
                        <div class="row justify-content-center">
                            <div class="col-3 mb-3">
                                <img src="<?php echo HOST_APP; ?>/app/view/images/bolt-192x192.png" class="w-100">
                            </div>
                        </div>
                        <div class="fat p-3" style="background-color: white !important;">
                            <div class="card-body m-3">
                                <h4 class="card-title">Acessar conta</h4>
                                <form method="POST" id="formularioLogarUsuario" class="my-login-validation mt-5" novalidate="">
                                    <div class="form-group">
                                        <label for="email">Endereço de e-mail</label>
                                        <input id="email" type="email" class="form-control mt-2" name="email" value="" required autofocus>
                                    </div>

                                    <div class="form-group mt-3">
                                        <label for="senha" class="float-start">Senha</label>
                                        <input id="senha" type="password" class="form-control mt-2" name="senha" required data-eye>
                                    </div>

                                    <div class="form-group mt-3">
                                        <button id="realizaLogin" type="button" style="width: 100%" class="btn-primary btn btn-block btnEntrar">
                                            Acessar
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Footer
                        <div class="footer">
                            Copyright &copy; 2017 &mdash; Your Company
                        </div>
                        -->

                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    include('layout/usuario/footer.php');
    ?>

    <!-- Arquivos JS -->
    <script src="<?php echo HOST_APP; ?>/app/view/js/usuarios.js?v=<?php echo VERSION; ?>"></script>

</body>