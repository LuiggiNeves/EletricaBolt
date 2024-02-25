<?php
include('layout/head.php');
include('layout/ultimaUrlVisitada.php');
?>


</head>

<body>
    <?php include 'navbar.php'; ?>
    <main>
        <div class="main-container">


            <div class="carrosel-responsive">
                <div class="carrosel-container-responsive">
                    <div id="carouselExampleInterval1" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="6000">
                                <img src="<?php echo HOST_APP; ?>/app/view/images/banner-responsive-2.png" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item" data-bs-interval="2000">
                                <img src="<?php echo HOST_APP; ?>/app/view/images/banner-responsive-3.png" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item" data-bs-interval="2000">
                                <img src="<?php echo HOST_APP; ?>/app/view/images/banner-responsive-2.png" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval1" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval1" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                    <!-- Segundo Carrossel -->
                    <div id="carouselExampleInterval2" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <!-- Adicione os itens do segundo carrossel aqui -->
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval2" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval2" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-product">
            <div class="container-main-anuncio">
                <div class="main-anuncios">
                    <div class="main-anuncios-box">
                        <a href=""><img src="<?php echo HOST_APP; ?>/app/view/images/anuncio-one.png" alt=""></a>
                    </div>

                    <div class="main-anuncios-box anuncios-box_two">
                        <a href=""><img src="<?php echo HOST_APP; ?>/app/view/images/anuncio-two.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-slides">
            <div class="slides-primary">
                <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false">

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="<?php echo HOST_APP; ?>/app/view/images/banner-1.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo HOST_APP; ?>/app/view/images/banner-2.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo HOST_APP; ?>/app/view/images/banner-3.png" class="d-block w-100" alt="...">
                        </div>
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="main-product">
            <div class="main-product-container">
                <div class="catalago-box-container">
                    <div class="catalago-box" id="produtosEncontrados">

                    </div>
                </div>
            </div>
        </div>


        <div class="main-block-pc">
            <div class="main-block-anuncios ">
                <div class="container-block">
                    <div class="block-box">

                        <div class="box-anuncio ">
                            <a href=""><img src="<?php echo HOST_APP; ?>/app/view/images/LorenSid.png" alt=""></a>
                        </div>

                        <div class="box-anuncio ">
                            <a href=""><img src="<?php echo HOST_APP; ?>/app/view/images/Sil.png" alt=""></a>
                        </div>

                        <div class="box-anuncio ">
                            <a href=""><img src="<?php echo HOST_APP; ?>/app/view/images/Margirius.png" alt=""></a>
                        </div>

                        <div class="box-anuncio ">
                            <a href=""><img src="<?php echo HOST_APP; ?>/app/view/images/Zagonel.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-product">
            <div class="main-product-container">
                <div class="catalago-box-container">
                    <div class="catalago-box">

                    </div>
                </div>
            </div>
        </div>

        </div>
    </main>



    <div class="container-maps">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d920.8866679058535!2d-47.421683878772036!3d-22.596052305832707!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c881102109f7d5%3A0xa02316d1e6c0f085!2sEletrica%20Bolt!5e0!3m2!1spt-BR!2sbr!4v1700187778398!5m2!1spt-BR!2sbr" width="1200" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <?php include 'footer.php' ?>




    <?php
    include('layout/footer.php');
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MVEwCi8WsuZu6L5i5zV6VjAGhFDpSc3NM9LAcLk8bFpOxksnDfjsiX2v4blGbX5R" crossorigin="anonymous"></script>


    <!-- Arquivos JS -->
    <script src="<?php echo HOST_APP; ?>/app/view/js/inicio.js?v=<?php echo VERSION; ?>"></script>



    <script>
        $(document).ready(function() {
            pesquisar();
        });

        document.getElementById("search-button").addEventListener("click", function() {
            window.location.href = "html/product-search.html";
        });




        document.addEventListener('DOMContentLoaded', function() {
            const dropdowns = document.querySelectorAll('.dropdown');
            dropdowns.forEach(dropdown => {
                dropdown.addEventListener('mouseenter', function() {
                    this.querySelector('.dropdown-content').style.display = 'block';
                });
                dropdown.addEventListener('mouseleave', function() {
                    this.querySelector('.dropdown-content').style.display = 'none';
                });
            });
        });



    </script>
</body>