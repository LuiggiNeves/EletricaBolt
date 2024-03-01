<?php
include('layout/cliente/head.php');
?>




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


        <div class="container-fluid my-5 p-5">
            <div class="row mt-2 justify-content-center">
                <div class="col-sm-12 col-md-4 border bg-white rounded shadow-sm p-5">
                    <h3 class="mb-5">Entrar</h3>

                    <form id="formClienteLogin">
                        <div class="row mb-3">
                            <div class="col-sm-12 col-md-12">
                                <label>Celular: </label>
                                <input type="text" class="form-control w-100" id="celularLogin" required />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-12 col-md-12">
                                <button class="btn btn-primary px-3" type="button" id="loginCliente">Entrar</button>
                            </div>
                        </div>
                        
                        <div class="row mb-3 mt-5">
                            <div class="col-sm-12 col-md-12">
                                <i><a href="../cadastrar/" class="text-primary">Não tem conta? Clique aqui.</a></i>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <?php include 'footer.php' ?>

    <?php
    include('layout/cliente/footer.php');
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MVEwCi8WsuZu6L5i5zV6VjAGhFDpSc3NM9LAcLk8bFpOxksnDfjsiX2v4blGbX5R" crossorigin="anonymous"></script>

    <!-- Arquivos JS -->
    <script src="<?php echo HOST_APP; ?>/app/view/js/clientes.js?v=<?php echo VERSION; ?>"></script>

    <script>
        $(document).ready(function() {

        });
    </script>
</body>