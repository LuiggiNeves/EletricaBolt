<?php
include('layout/head.php');
?>

</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg backgroundTema">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="#">Produtos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Categorias</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Onde estamos?</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Contato</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main role="main">

        <section class="jumbotron">
            <div class="container">
                <div class="row my-5 justify-content-center">
                    <div class="col-sm-12 col-md-1">
                        <img src="<?php echo HOST_APP; ?>/app/view/images/logo.png" class="w-100" />
                    </div>
                </div>
            </div>
        </section>

        <div class="album py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-12 col-md-10 border rounded p-4">
                        <div class="row">
                            <div class="col-sm-12 col-md-3">
                                <img src="https://cdn.pixabay.com/photo/2017/03/15/20/31/control-cabinet-2147370_1280.jpg" class="w-100 rounded" />
                            </div>
                            <div class="col-sm-12 col-md-9">
                                <h4>Disjuntor 125 Amperes Tripolar Curva D Para Padrão Energia</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <footer class="text-muted mb-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-11 col-md-10 mb-3">
                    Localização
                    Eletrica Bolt- Rua Monge Beneditino, Dom Bernardo Botelho Nunes, 142, Limeira - SP, 13482-131
                </div>

                <div class="col-sm-11 col-md-10">
                    Telefone
                    (19)98118-5834
                </div>
            </div>
        </div>
    </footer>

    <?php
    include('layout/footer.php');
    ?>

</body>