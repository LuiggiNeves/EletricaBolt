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

    <header>
        <div class="header-primary">
            <div class="header-container header-primary-color header-container-primary">
                <div class="social-ico-container">
                    <div class="social-ico-img ">
                        <div class="ico-one ico-generic">
                            <a href=""><img src="<?php echo HOST_APP; ?>/app/view/images/wpp-ico.png" alt=""></a>
                        </div>
                        <div class="ico-two ico-generic">
                            <a href="https://www.instagram.com/eletricabolt/" target="_blank"><img src="<?php echo HOST_APP; ?>/app/view/images/ig-ico.png" alt=""></a>
                        </div>

                        <div class="ico-tree ico-generic">
                            <a href="https://www.facebook.com/eletricaboltLim" target="_blank"><img src="<?php echo HOST_APP; ?>/app/view/images/fc-ico.png" alt=""></a>
                        </div>
                    </div>

                    <div class="social-name-center social-generic">
                        <p>Bem vindo ao site da <strong class="light-text">Elétrica Bolt!</strong></p>
                    </div>

                    <div class="social-name-partnes social-generic">
                        <a href="https://www.bing.com/ck/a?!&&p=3055a31e23cdc5c3JmltdHM9MTY5ODEwNTYwMCZpZ3VpZD0yNDJlYmY1ZS04NDc3LTZmYzktMzBhOS1hYzQ1ODUwZTZlMmYmaW5zaWQ9NTgzOA&ptn=3&hsh=3&fclid=242ebf5e-8477-6fc9-30a9-ac45850e6e2f&u=a1L21hcHM_Jm1lcGk9MTM0fn5Vbmtub3dufkFkZHJlc3NfTGluayZ0eT0xOCZxPUVsZXRyaWNhJTIwQm9sdCZzcz15cGlkLllONzk5M3g4NDcxNjUwMzkxMTM3NDEyMzE2JnBwb2lzPS0yMi41OTYwNDgzNTUxMDI1NF8tNDcuNDIxNDA1NzkyMjM2MzNfRWxldHJpY2ElMjBCb2x0X1lONzk5M3g4NDcxNjUwMzkxMTM3NDEyMzE2fiZjcD0tMjIuNTk2MDQ4fi00Ny40MjE0MDYmdj0yJnNWPTE&ntb=1" target="_blank">Localização</a>
                        <a href="https://www.instagram.com/eletricabolt/" target="_blank">Parceiros</a>
                    </div>
                </div>
            </div>

            <hr class="hr-headr">

            <div class="header-container">
                <div class="menu-search-container">
                    <div class="menu-search">
                        <div class="container-menu-logo">
                            <div class="menu-logo">
                                <div class="logo">
                                    <div class="img-logo">
                                        <a href=""><img src="<?php echo HOST_APP; ?>/app/view/images/bolt-logo-completa-am.png" alt=""></a>
                                    </div>
                                    <div class="text-logo">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="search-container-princ">
                            <div class="search-container search-container-paralel">
                                <div class="search-bar-header">
                                    <input type="text" class="search-bar" placeholder="Pesquisar...">
                                </div>
                                <div class="search-container-btn">
                                    <button class="search-button" id="search-button">
                                        <p>Buscar</p>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="ico-user">
                            <div class="ico-user-container">
                                <div class="ico-user-one ico-user-generic">
                                    <a href="html/login.html"><img src="<?php echo HOST_APP; ?>/app/view/images/person-ico.png" alt=""></a>
                                </div>
                                <div class="ico-user-two ico-user-generic">
                                    <a href="#" onclick="openModal()"><img src="<?php echo HOST_APP; ?>/app/view/images/bag-ico.png" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="header-container container-header-two">
                <div class="nav-container">
                    <div class="nav-box dropdown_div nav_position">
                        <div class="nav-item-one nav-item-generic dropdown">
                            <p>Inserir aqui</p>
                            <div class="dropdown-content">
                                
                            </div>
                        </div>

                        <div class="nav-item-two nav-item-generic dropdown">
                            <p>Inserir aqui</p>
                            <div class="dropdown-content">
                                
                            </div>
                        </div>

                        <div class="nav-item-tree nav-item-generic dropdown">
                            <p>Inserir aqui</p>
                            <div class="dropdown-content">
                            </div>
                        </div>

                        <div class="nav-item-four nav-item-generic dropdown">
                            <p>Inserir aqui</p>
                            <div class="dropdown-content">
                            </div>
                        </div>

                        <div class="nav-item-five nav-item-generic dropdown">
                            <p>Inserir aqui</p>
                            <div class="dropdown-content">
                            </div>
                        </div>

                        <div class="nav-item-six nav-item-generic dropdown">
                            <p>Inserir aqui</p>
                            <div class="dropdown-content">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <main>
        <div class="main-container">
                

                <div class="carrosel-container">
                    <div class="slideshow-container">

                        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="1000">
                                <img src="<?php echo HOST_APP; ?>/app/view/images/banner-2.png" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item " data-bs-interval="1000">
                                <img src="<?php echo HOST_APP; ?>/app/view/images/banner-1.png" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item " data-bs-interval="1000">
                                <img src="<?php echo HOST_APP; ?>/app/view/images/banner-2.png" class="d-block w-100" alt="...">
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


<!--=
                                <div id="carouselExample" class="carousel slide">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="..." class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="..." class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="..." class="d-block w-100" alt="...">
                                        </div>
                                    </div>



                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                -->

                                </div>
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






    

    <footer>
        <div class="container-maps">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d920.8866679058535!2d-47.421683878772036!3d-22.596052305832707!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c881102109f7d5%3A0xa02316d1e6c0f085!2sEletrica%20Bolt!5e0!3m2!1spt-BR!2sbr!4v1700187778398!5m2!1spt-BR!2sbr" width="1200" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <hr>

        <div class="borda"></div>
        <div class="box-footer">
            <div class="container-footer">
                <div class="footer-logo">
                    <a href="index.html"><img src="<?php echo HOST_APP; ?>/app/view/images/bolt-logo-completa-am.png" alt=""></a>
                </div>
                <div class="footer-social">
                    <div class="smart-remove">
                        <h2>Redes Sociais</h2>
                    </div>
                    <div class="img-text-generic"><a href="https://www.facebook.com/eletricaboltLim" target="_blank"><img src="<?php echo HOST_APP; ?>/app/view/images/fc-ico.png" alt=""></a>
                        <p>FaceBook</p>
                    </div>
                    <div class="img-text-generic"><a href="" target="_blank"><img src="<?php echo HOST_APP; ?>/app/view/images/wpp-ico.png" alt=""></a>
                        <p>WhatsApp</p>
                    </div>
                    <div class="img-text-generic"><a href="https://www.instagram.com/eletricabolt/" target="_blank"><img src="<?php echo HOST_APP; ?>/app/view/images/ig-ico.png" alt=""></a>
                        <p>Instagram</p>
                    </div>
                </div>
                <div class="footer-contato">
                    <h2>Contato</h2>
                    <div class="img-text-generic"><a href="#"><img src="<?php echo HOST_APP; ?>/app/view/images/gmail.png" alt=""></a>
                        <p>eletricaboltLimeira@gmail.com</p>
                    </div>
                    <div class="img-text-generic"><a href="#"><img src="<?php echo HOST_APP; ?>/app/view/images/tell.png" alt=""></a>
                        <p>(19)3441-9868</p>
                    </div>
                    <div class="img-text-generic"><a href="#"><img src="<?php echo HOST_APP; ?>/app/view/images/wpp-footer.png" alt=""></a>
                        <p>(19) 98117-5834</p>
                    </div>
                </div>
                <div class="footer-localizacao">
                    <h2>Localização</h2>
                    <div class="img-text-generic maps-ico-move">
                        <a href="https://maps.app.goo.gl/2zyisiSGhbqfUHuS9" target="_blank"><img src="<?php echo HOST_APP; ?>/app/view/images/google-maps.png" alt=""></a>
                        <p>Maps</p>
                        
                    </div>
                    <p><strong>Rua</strong> Monge Beneditino, Dom Bernardo Botelho Nunes, <strong>142</strong>, <strong>Limeira</strong></p>
                </div>

                <div class="footer-container-desenvolvedor">
                    <div class="footer-desenvolvedor">
                        <div class="footer-desenvolvedor-container">
                            <div class="footer-des-h2">
                                <h2>Desenvolvedor</h2>
                            </div>
                            <div class="container-nive-sistemas">
                                <img src="<?php echo HOST_APP; ?>/app/view/images/nive.png" alt="">
                                <a href="https://nivesistemas.com.br/" class="nive-sistemas" target="_blank">Nive Sistemas</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="borda"></div>
    </footer>







    <div class="page-product-view" id="page-product-view">
        <div class="product-view-content">
            <span class="close-product-btn" onclick="closeProductView()">&times;</span>
            <div class="Container-product-view">
                <div class="product-view">
                    <div class="product-view-main">
                        <div class="product-view-img-container">
                            <div class="product-view-img"><img src="<?php echo HOST_APP; ?>/app/view/images/wago img teste.jpg" alt=""></div>
                        </div>
                        <div class="container-product-view-info">
                            <div class="product-view-info">
                                <div class="product-view-title">
                                    <h1>Conector Wago 2P até 6mm²</h1>
                                </div>
                                <div>
                                    <div class="product-view-desc">
                                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet explicabo aspernatur itaque? Labore
                                            ea reprehenderiTESSSEt quaerat amet consectetur adipisicing elit. Amet explicabo aspernatur itaque? Labore
                                            ea reprehenderit quaerat.</p>
                                    </div>
                                </div>
                                <div class="product-view-price">
                                    <div class="view-price">
                                        <p>R$--,--</p>
                                    </div>
                                </div>
                                <div>
                                    <div class="product-view-qnt">
                                        <div class="quantity-block">
                                            <div class="quantity-button" onclick="decreaseQuantity()">
                                                <p>-</p>
                                            </div>
                                            <div class="quantity-input-style"><input type="text" class="quantity-input" id="quantity" value="1" minlength="1"></div>
                                            <div class="quantity-button" onclick="increaseQuantity()">
                                                <p>+</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="product-view-btn">
                                        <div>
                                            <input type="button" value="Carrinho">
                                        </div>
                                        <div>
                                            <input type="button" value="Preço">
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