<?php
include('layout/head.php');
?>

<link rel="stylesheet" href="<?php echo HOST_APP; ?>/app/view/css/pagina_incial_base.css">
<link rel="stylesheet" href="<?php echo HOST_APP; ?>/app/view/css/pagina_incial.css">
<link rel="stylesheet" href="<?php echo HOST_APP; ?>/app/view/css/produto-layout.css">
<link rel="stylesheet" href="<?php echo HOST_APP; ?>/app/view/css/carrinho-layout.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</head>

<body>
<?php include 'navbar.php';?>
    <main>
        <div class="main-container">
                <div class="carrosel-container">
                    <div class="slideshow-container">

                        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="2000">
                                <img src="<?php echo HOST_APP; ?>/app/view/images/banner-1.png" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item " data-bs-interval="2000">
                                <img src="<?php echo HOST_APP; ?>/app/view/images/banner-2.png" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item " data-bs-interval="2000">
                                <img src="<?php echo HOST_APP; ?>/app/view/images/banner-3.png" class="d-block w-100" alt="...">
                            </div>

                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        </div>


                    </div>
                </div>

                <div class="main-block-anuncios main-block-anuncios-smart">
                    <div class="container-block">
                        <div class="block-box">
                            <div class="box-anuncio ">
                                <a href=""><img src="<?php echo HOST_APP; ?>/app/view/images/Zagonel.png" alt=""></a>
                            </div>

                            <div class="box-anuncio ">
                                <a href=""><img src="<?php echo HOST_APP; ?>/app/view/images/Margirius.png" alt=""></a>
                            </div>

                            <div class="box-anuncio ">
                                <a href=""><img src="<?php echo HOST_APP; ?>/app/view/images/Sil.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>


                <!--Só aparece na responsividade-->
                <div class="carrosel-responsive">
                    <div class="carrosel-container-responsive">
                        <!-- Primeiro Carrossel -->
                        <div id="carouselExampleInterval1" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active" data-bs-interval="2000">
                                    <img src="<?php echo HOST_APP; ?>/app/view/images/banner-2.png" class="d-block w-100" alt="...">
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

 
    <div class="modal" id="modal">
        <div class="container-modal">
            <div class="modal-content">
                <div>
                    <div class="modal-title">
                        <div class="modal-title-img modal-title-h2 title-generic-modal">
                            <img src="<?php echo HOST_APP; ?>/app/view/images/bag-ico.png" alt="">
                            <h2>Carrinho</h2>
                        </div>
                        <div class="modal-title-close">
                            <span class="close-btn" onclick="closeModal()">&times;</span>
                        </div>
                    </div>
                    <div class="modal-product">

                    </div>
                    <div class="modal-btn">
                        <input type="button" value="Solicitar Orçamento" id="input-modal-btn">
                    </div>
                </div>
            </div>
        </div>
    </div>

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

        const menuButtons = document.querySelectorAll('.menu-button');

        menuButtons.forEach(button => {
            button.addEventListener('click', () => {
                const target = button.getAttribute('data-target');
                const menu = document.querySelector(`.${target}`);
                const content = document.querySelector(`.content-${target}`);

                menu.classList.toggle('active');
                content.classList.toggle('active');
            });
        });

        let slideIndex = 1;
        let slideTimer;

        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
            restartTimer();
        }

        function autoSlides() {
            showSlides(slideIndex += 1);
            slideTimer = setTimeout(autoSlides, 10000);
        }

        function showSlides(n) {
            const slides = document.getElementsByClassName("mySlides");
            if (n > slides.length) {
                slideIndex = 1;
            }
            if (n < 1) {
                slideIndex = slides.length;
            }
            for (let i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slides[slideIndex - 1].style.display = "block";
        }

        function restartTimer() {
            clearTimeout(slideTimer);
            slideTimer = setTimeout(autoSlides, 5000);
        }

        autoSlides();

        const selectHead = document.querySelector('.select_head');

        selectHead.addEventListener('mouseenter', function() {
            this.querySelector('select').style.display = 'block';
        });

        selectHead.addEventListener('mouseleave', function() {
            this.querySelector('select').style.display = 'none';
        });

        function openModal() {
            document.getElementById("modal").style.display = "flex";
        }

        function closeModal() {
            document.getElementById("modal").style.display = "none";
        }

        function openModal() {
            document.getElementById("modal").style.display = "flex";

            document.getElementById("modal").addEventListener("click", function(event) {
                if (event.target === this) {
                    closeModal();
                }
            });
        }

        function closeModal() {
            document.getElementById("modal").style.display = "none";
        }

        function openProductView() {
            document.getElementById("page-product-view").style.display = "flex";
        }

        function closeProductView() {
            document.getElementById("page-product-view").style.display = "none";
        }

        function openProductView() {
            document.getElementById("page-product-view").style.display = "flex";

            document.getElementById("page-product-view").addEventListener("click", function(event) {
                if (event.target === this) {
                    closeProductView();
                }
            });
        }

        function closeProductView() {
            document.getElementById("page-product-view").style.display = "none";
        }

        function increaseQuantity() {
            var quantityInput = document.getElementById('quantity');
            var currentQuantity = parseInt(quantityInput.value);
            quantityInput.value = currentQuantity + 1;
        }

        function decreaseQuantity() {
            var quantityInput = document.getElementById('quantity');
            var currentQuantity = parseInt(quantityInput.value);
            if (currentQuantity > 0) {
                quantityInput.value = currentQuantity - 1;
            }
        }
    </script>
</body>