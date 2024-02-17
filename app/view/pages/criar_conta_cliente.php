<?php
include('layout/head.php');
?>

<link rel="stylesheet" href="<?php echo HOST_APP; ?>/app/view/css/pagina_incial_base.css">
<link rel="stylesheet" href="<?php echo HOST_APP; ?>/app/view/css/pagina_incial.css">
<link rel="stylesheet" href="<?php echo HOST_APP; ?>/app/view/css/produto-layout.css">
<link rel="stylesheet" href="<?php echo HOST_APP; ?>/app/view/css/modal.css">
<link rel="stylesheet" href="<?php echo HOST_APP; ?>/app/view/css/carrinho.css">


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</head>

<body>
    <?php include 'navbar.php'; ?>
    <main>
        <div class="main-container">
            <a href="#" class="openMenu flutuante"><img src="<?php echo HOST_APP; ?>/app/view/images/bag-ico.png" alt=""></a>

            <a href="#" class="flutuante openMenu">
                <img src="<?php echo HOST_APP; ?>/app/view/images/bag-ico.png" alt="Texto alternativo">
            </a>
        </div>


        <div class="container-fluid my-5">
            <div class="row mt-2 justify-content-center">
                <div class="col-sm-12 col-md-4 border rounded shadow-sm p-5">
                    <h3>Criar conta</h3>

                    <form id="formClienteCriarConta">
                        <div class="row mb-3">
                            <div class="col-sm-12 col-md-12">
                                <label>Nome: </label>
                                <input type="text" class="form-control w-100" id="nomeCriarCliente" required />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-12 col-md-12">
                                <label>Celular: </label>
                                <input type="text" class="form-control w-100" id="celularCriarCliente" required />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-12 col-md-12">
                                <button class="btn btn-primary px-3" type="button" id="criarContaCliente">Criar conta</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <?php include 'footer.php' ?>

    <?php
    include('layout/footer.php');
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MVEwCi8WsuZu6L5i5zV6VjAGhFDpSc3NM9LAcLk8bFpOxksnDfjsiX2v4blGbX5R" crossorigin="anonymous"></script>

    <!-- Arquivos JS -->
    <script src="<?php echo HOST_APP; ?>/app/view/js/clientes.js?v=<?php echo VERSION; ?>"></script>

    <script>
        $(document).ready(function() {

        });
    </script>
</body>