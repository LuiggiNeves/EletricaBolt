<?php
include('layout/head.php');
?>

<link rel="stylesheet" href="<?php echo HOST_APP; ?>/app/view/css/pagina_incial.css?v=<?php echo VERSION; ?>" />

<style>
    @media(max-width: 570px) {
        #logoBolt {
            width: 20% !important;
        }
    }
</style>

</head>

<body>

    <header>
        <div class="header-primary mt-4">
            <div class="header-container">
                <div class="social-ico-container">
                    <div class="social-ico-img ">
                        <div class="ico-one ico-generic">
                            <a href="">
                                <img src="<?php echo HOST_APP; ?>/app/view/images/wpp-ico.png" alt="">
                            </a>
                        </div>

                        <div class="ico-two ico-generic">
                            <a href="https://www.instagram.com/eletricabolt/" target="_blank"><img src="<?php echo HOST_APP; ?>/app/view/images/ig-ico.png" alt=""></a>
                        </div>

                        <div class="ico-tree ico-generic">
                            <a href="https://www.facebook.com/eletricaboltLim" target="_blank"><img src="<?php echo HOST_APP; ?>/app/view/images/fc-ico.png" alt=""></a>
                        </div>
                    </div>

                    <div class="social-name-partnes social-generic">
                        <a href="https://www.bing.com/ck/a?!&&p=3055a31e23cdc5c3JmltdHM9MTY5ODEwNTYwMCZpZ3VpZD0yNDJlYmY1ZS04NDc3LTZmYzktMzBhOS1hYzQ1ODUwZTZlMmYmaW5zaWQ9NTgzOA&ptn=3&hsh=3&fclid=242ebf5e-8477-6fc9-30a9-ac45850e6e2f&u=a1L21hcHM_Jm1lcGk9MTM0fn5Vbmtub3dufkFkZHJlc3NfTGluayZ0eT0xOCZxPUVsZXRyaWNhJTIwQm9sdCZzcz15cGlkLllONzk5M3g4NDcxNjUwMzkxMTM3NDEyMzE2JnBwb2lzPS0yMi41OTYwNDgzNTUxMDI1NF8tNDcuNDIxNDA1NzkyMjM2MzNfRWxldHJpY2ElMjBCb2x0X1lONzk5M3g4NDcxNjUwMzkxMTM3NDEyMzE2fiZjcD0tMjIuNTk2MDQ4fi00Ny40MjE0MDYmdj0yJnNWPTE&ntb=1" target="_blank">Localização</a>
                        <a href="#">Parceiros</a>
                    </div>
                </div>
            </div>

            <hr class="hr-headr">

            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-sm-1 col-md-1 mb-2 text-center">
                        <img src="<?php echo HOST_APP; ?>/app/view/images/bolt-logo-am.png" class="w-100" id="logoBolt">
                    </div>
                    <div class="col-sm-12 col-md-12 text-center">
                        <h3 id="text-menu-bolt">Elétrica Bolt</h3>
                    </div>
                </div>
            </div>

            <hr class="hr-two">

            <div class="header-container container-header-two">
                <div class="nav-container">
                    <div class="nav-box">
                        <div class="nav-item-one nav-item-generic">
                            <p>Todas as Categorias</p>
                        </div>

                        <div class="nav-item-two nav-item-generic">
                            <p>Novidades</p>
                        </div>

                        <div class="nav-item-tree nav-item-generic">
                            <p>Margirius</p>
                        </div>

                        <div class="nav-item-four nav-item-generic">
                            <p>Cabos</p>
                        </div>

                        <div class="nav-item-five nav-item-generic">
                            <p>Hidraulica</p>
                        </div>

                        <div class="nav-item-six nav-item-generic">
                            <p>Chuveiros</p>
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
                    <div class="mySlides">
                        <img src="<?php echo HOST_APP; ?>/app/view/images//banner-1.png" style="width:100%">
                    </div>

                    <div class="mySlides">
                        <img src="<?php echo HOST_APP; ?>/app/view/images//banner-2.png" style="width:100%">
                    </div>

                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                </div>
            </div>

            <div class="container-fluid mt-5">
                <div class="row">
                    <div class="col-sm-12 col-md-12 text-center">
                        <h1>Produtos</h1>
                    </div>
                </div>
            </div>

            <div class="container-fluid mt-5">
                <div class="row">
                    <div class="col-sm-12 col-md-12">

                    </div>
                </div>
            </div>
        </div>
    </main>







    <footer class="container-fluid mb-2">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-12">
                <div class="container-maps">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d17522.835279870113!2d-47.424479728267265!3d-22.589485758683427!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c881102109f7d5%3A0xa02316d1e6c0f085!2sEletrica%20Bolt!5e0!3m2!1spt-BR!2sbr!4v1698365687170!5m2!1spt-BR!2sbr" width="1200" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

            <div class="col-sm-12 col-md-12">
                <div class="footer-container">
                    <div class="box-footer">
                        <div class="box-footer-img">
                            <img src="<?php echo HOST_APP; ?>/app/view/images/bolt-logo-completa-am.jpg" alt="">
                            <h4>Elétrica Bolt</h4>
                        </div>
                    </div>
                </div>

                <div class="footer-fix-container">
                    <div>
                        <h4>Whatsapp (19)98117-5834 | Fixo 38888-0808</h4>
                    </div>
                </div>

                <div class="footer-fix-container">
                    <div>
                        <p><strong>Rua</strong> Monge Beneditino Dom Bernardo Botelho Nunes <strong>142</strong>-Limeira, SP, 13482-131 </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <?php
    include('layout/footer.php');
    ?>

    <script>
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
    </script>

</body>