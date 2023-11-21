<?php
include('layout/head.php');
?>

<link rel="stylesheet" href="<?php echo HOST_APP; ?>/app/view/css/pagina_incial_base.css">
<link rel="stylesheet" href="<?php echo HOST_APP; ?>/app/view/css/pagina_incial.css">

</head>

<body>

    <header>
        <div class="header-primary">
            <!--ig, wpp, face-->
            <div class="header-container header-primary-color">
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
                            <p>
                            <div class="ico-user-container">
                                <div class="ico-user-one ico-user-generic">
                                    <a href="html/login.html"><img src="<?php echo HOST_APP; ?>/app/view/images/person-ico.png" alt=""></a>
                                </div>

                                <div class="ico-user-two ico-user-generic">
                                    <a href="#" onclick="openModal()"><img src="<?php echo HOST_APP; ?>/app/view/images/bag-ico.png" alt=""></a>
                                </div>

                                <div class="ico-user-tree ico-user-generic">
                                    <a href="#"><img src="<?php echo HOST_APP; ?>/app/view/images/heart-ico-none.png" alt=""></a>
                                    </p>
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
                            <p>Todos</p>
                            <div class="dropdown-content">
                                <a href="#">Chuveiros & Resistencias</a>
                                <a href="#">Perfil & Led´s</a>
                                <a href="#">Espelhos & Tomadas</a>
                                <a href="#">Cabos</a>
                                <a href="#">Hidraulica</a>
                                <a href="#">Ventiladores</a>
                                <a href="#">Iluminação</a>
                                <a href="#">Eletrodutos</a>
                                <a href="#">Automação</a>
                                <a href="#">Todos os Produtos</a>
                            </div>
                        </div>

                        <div class="nav-item-two nav-item-generic dropdown">
                            <p>Novidades</p>
                            <div class="dropdown-content">
                                <a href="#">Novidades</a>
                            </div>
                        </div>

                        <div class="nav-item-tree nav-item-generic dropdown">
                            <p>MarGirius</p>
                            <div class="dropdown-content">
                                <a href="#">Chaves</a>
                                <a href="#">Espelhos</a>
                                <a href="#">Módulos</a>
                                <a href="#">Disjuntores</a>
                                <a href="#">Tudo MG</a>
                            </div>
                        </div>

                        <div class="nav-item-four nav-item-generic dropdown">
                            <p>Cabos</p>
                            <div class="dropdown-content">
                                <a href="#">1,0mm²</a>
                                <a href="#">1,5mm²</a>
                                <a href="#">2,5mm²</a>
                                <a href="#">4,0mm²</a>
                                <a href="#">6,0mm²</a>
                                <a href="#">10,0mm²</a>
                                <a href="#">16,0mm²</a>
                                <a href="#">Todos Cabos</a>
                            </div>
                        </div>

                        <div class="nav-item-five nav-item-generic dropdown">
                            <p>Hidraulica</p>
                            <div class="dropdown-content">
                                <a href="#">Tubos</a>
                                <a href="#">Conexões</a>
                                <a href="#">Cotovelos</a>
                                <a href="#">Tudo Hidraulica</a>
                            </div>
                        </div>

                        <div class="nav-item-six nav-item-generic dropdown">
                            <p>Chuveiros</p>
                            <div class="dropdown-content">
                                <a href="#">Lorenzetti</a>
                                <a href="#">Zagonel</a>
                                <a href="#">Hydra</a>
                                <a href="#">Tudo Chuveiro</a>
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
                    <!-- Slides -->
                    <div class="mySlides">
                        <img src="<?php echo HOST_APP; ?>/app/view/images/banner-1.png" style="width:100%">
                    </div>

                    <div class="mySlides">
                        <img src="<?php echo HOST_APP; ?>/app/view/images/banner-2.png" style="width:100%">
                    </div>

                    <!-- Botões para avançar e retroceder manualmente -->
                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                </div>
            </div>

            <!--display none para pcs-->
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
            <!-- FIM display none para pcs-->
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
                        <div class="catalago-box">


                            <div class="catalago-product-base">
                                <div class="card">
                                    <div class="card-img">
                                        <p><img src="<?php echo HOST_APP; ?>/app/view/images/wago img teste.jpg" alt="Nome do Produto"></p>
                                    </div>
                                    <div class="card-body">
                                        <div class="product-title" a href="#" onclick="openProductView()">Wago 2p 6mm²</a></div>
                                        <div class="product-price">R$--,--</div>
                                        <div class="product-quantity">
                                            <div class="quantity-block-product">
                                                <div class="quantity-button" onclick="decreaseQuantity()">
                                                    <p>-</p>
                                                </div>
                                                <div class="quantity-input-style"><input type="text" class="quantity-input" id="quantity" value="1" minlength="1"></div>
                                                <div class="quantity-button" onclick="increaseQuantity()">
                                                    <p>+</p>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="add-to-cart" onclick="adicionarAoCarrinho()">Adicionar ao Carrinho</button>
                                        <button class="add-to-cart" onclick="Preço()">Preço</button>
                                    </div>
                                </div>
                            </div>

                            <div class="catalago-product-base">
                                <div class="card">
                                    <div class="card-img">
                                        <p><img src="<?php echo HOST_APP; ?>/app/view/images/wago img teste.jpg" alt="Nome do Produto"></p>
                                    </div>
                                    <div class="card-body">
                                        <div class="product-title" a href="#" onclick="openProductView()">Wago 2p 6mm²</a></div>
                                        <div class="product-price">R$--,--</div>
                                        <div class="product-quantity">
                                            <div class="quantity-block-product">
                                                <div class="quantity-button" onclick="decreaseQuantity()">
                                                    <p>-</p>
                                                </div>
                                                <div class="quantity-input-style"><input type="text" class="quantity-input" id="quantity" value="1" minlength="1"></div>
                                                <div class="quantity-button" onclick="increaseQuantity()">
                                                    <p>+</p>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="add-to-cart" onclick="adicionarAoCarrinho()">Adicionar ao Carrinho</button>
                                        <button class="add-to-cart" onclick="Preço()">Preço</button>
                                    </div>
                                </div>
                            </div>

                            <div class="catalago-product-base">
                                <div class="card">
                                    <div class="card-img">
                                        <p><img src="<?php echo HOST_APP; ?>/app/view/images/wago img teste.jpg" alt="Nome do Produto"></p>
                                    </div>
                                    <div class="card-body">
                                        <div class="product-title" a href="#" onclick="openProductView()">Wago 2p 6mm²</a></div>
                                        <div class="product-price">R$--,--</div>
                                        <div class="product-quantity">
                                            <div class="quantity-block-product">
                                                <div class="quantity-button" onclick="decreaseQuantity()">
                                                    <p>-</p>
                                                </div>
                                                <div class="quantity-input-style"><input type="text" class="quantity-input" id="quantity" value="1" minlength="1"></div>
                                                <div class="quantity-button" onclick="increaseQuantity()">
                                                    <p>+</p>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="add-to-cart" onclick="adicionarAoCarrinho()">Adicionar ao Carrinho</button>
                                        <button class="add-to-cart" onclick="Preço()">Preço</button>
                                    </div>
                                </div>
                            </div>

                            <div class="catalago-product-base">
                                <div class="card">
                                    <div class="card-img">
                                        <p><img src="<?php echo HOST_APP; ?>/app/view/images/wago img teste.jpg" alt="Nome do Produto"></p>
                                    </div>
                                    <div class="card-body">
                                        <div class="product-title" a href="#" onclick="openProductView()">Wago 2p 6mm²</a></div>
                                        <div class="product-price">R$--,--</div>
                                        <div class="product-quantity">
                                            <div class="quantity-block-product">
                                                <div class="quantity-button" onclick="decreaseQuantity()">
                                                    <p>-</p>
                                                </div>
                                                <div class="quantity-input-style"><input type="text" class="quantity-input" id="quantity" value="1" minlength="1"></div>
                                                <div class="quantity-button" onclick="increaseQuantity()">
                                                    <p>+</p>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="add-to-cart" onclick="adicionarAoCarrinho()">Adicionar ao Carrinho</button>
                                        <button class="add-to-cart" onclick="Preço()">Preço</button>
                                    </div>
                                </div>
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

                            <div class="catalago-product-base">
                                <div class="card">
                                    <div class="card-img">
                                        <p><img src="<?php echo HOST_APP; ?>/app/view/images/wago img teste.jpg" alt="Nome do Produto"></p>
                                    </div>
                                    <div class="card-body">
                                        <div class="product-title" a href="#" onclick="openProductView()">Wago 2p 6mm²</a></div>
                                        <div class="product-price">R$--,--</div>
                                        <div class="product-quantity">
                                            <div class="quantity-block-product">
                                                <div class="quantity-button" onclick="decreaseQuantity()">
                                                    <p>-</p>
                                                </div>
                                                <div class="quantity-input-style"><input type="text" class="quantity-input" id="quantity" value="1" minlength="1"></div>
                                                <div class="quantity-button" onclick="increaseQuantity()">
                                                    <p>+</p>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="add-to-cart" onclick="adicionarAoCarrinho()">Adicionar ao Carrinho</button>
                                        <button class="add-to-cart" onclick="Preço()">Preço</button>
                                    </div>
                                </div>
                            </div>


                            <div class="catalago-product-base">
                                <div class="card">
                                    <div class="card-img">
                                        <p><img src="<?php echo HOST_APP; ?>/app/view/images/wago img teste.jpg" alt="Nome do Produto"></p>
                                    </div>
                                    <div class="card-body">
                                        <div class="product-title" a href="#" onclick="openProductView()">Wago 2p 6mm²</a></div>
                                        <div class="product-price">R$--,--</div>
                                        <div class="product-quantity">
                                            <div class="quantity-block-product">
                                                <div class="quantity-button" onclick="decreaseQuantity()">
                                                    <p>-</p>
                                                </div>
                                                <div class="quantity-input-style"><input type="text" class="quantity-input" id="quantity" value="1" minlength="1"></div>
                                                <div class="quantity-button" onclick="increaseQuantity()">
                                                    <p>+</p>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="add-to-cart" onclick="adicionarAoCarrinho()">Adicionar ao Carrinho</button>
                                        <button class="add-to-cart" onclick="Preço()">Preço</button>
                                    </div>
                                </div>
                            </div>


                            <div class="catalago-product-base">
                                <div class="card">
                                    <div class="card-img">
                                        <p><img src="<?php echo HOST_APP; ?>/app/view/images/wago img teste.jpg" alt="Nome do Produto"></p>
                                    </div>
                                    <div class="card-body">
                                        <div class="product-title" a href="#" onclick="openProductView()">Wago 2p 6mm²</a></div>
                                        <div class="product-price">R$--,--</div>
                                        <div class="product-quantity">
                                            <div class="quantity-block-product">
                                                <div class="quantity-button" onclick="decreaseQuantity()">
                                                    <p>-</p>
                                                </div>
                                                <div class="quantity-input-style"><input type="text" class="quantity-input" id="quantity" value="1" minlength="1"></div>
                                                <div class="quantity-button" onclick="increaseQuantity()">
                                                    <p>+</p>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="add-to-cart" onclick="adicionarAoCarrinho()">Adicionar ao Carrinho</button>
                                        <button class="add-to-cart" onclick="Preço()">Preço</button>
                                    </div>
                                </div>
                            </div>


                            <div class="catalago-product-base">
                                <div class="card">
                                    <div class="card-img">
                                        <p><img src="<?php echo HOST_APP; ?>/app/view/images/wago img teste.jpg" alt="Nome do Produto"></p>
                                    </div>
                                    <div class="card-body">
                                        <div class="product-title" a href="#" onclick="openProductView()">Wago 2p 6mm²</a></div>
                                        <div class="product-price">R$--,--</div>
                                        <div class="product-quantity">
                                            <div class="quantity-block-product">
                                                <div class="quantity-button" onclick="decreaseQuantity()">
                                                    <p>-</p>
                                                </div>
                                                <div class="quantity-input-style"><input type="text" class="quantity-input" id="quantity" value="1" minlength="1"></div>
                                                <div class="quantity-button" onclick="increaseQuantity()">
                                                    <p>+</p>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="add-to-cart" onclick="adicionarAoCarrinho()">Adicionar ao Carrinho</button>
                                        <button class="add-to-cart" onclick="Preço()">Preço</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>







    </main>



    <footer>
        <!--Maps-->
        <div class="container-maps">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d920.8866679058535!2d-47.421683878772036!3d-22.596052305832707!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c881102109f7d5%3A0xa02316d1e6c0f085!2sEletrica%20Bolt!5e0!3m2!1spt-BR!2sbr!4v1700187778398!5m2!1spt-BR!2sbr" width="1200" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div><!--FIMM Maps-->
        <hr>
        <div class="borda"></div>
        <div class="box-footer"><!--Box do footer por completo-->

            <div class="container-footer"><!--Container footer-->
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
                        <p>EletricaBoltLimeira@gmail.com</p>
                    </div>
                    <div class="img-text-generic"><a href="#"><img src="<?php echo HOST_APP; ?>/app/view/images/tell.png" alt=""></a>
                        <p>(19) 38808-3007</p>
                    </div>
                    <div class="img-text-generic"><a href="#"><img src="<?php echo HOST_APP; ?>/app/view/images/wpp-footer.png" alt=""></a>
                        <p>(19) 98117-5834</p>
                    </div>
                </div>
                <div class="footer-localizacao">
                    <h2>Localização</h2>
                    <div class="img-text-generic"><a href="https://www.bing.com/maps?osid=a87b7f07-0a5e-40fd-a781-89b0e4d06420&cp=-22.596044~-47.426734&lvl=16&pi=0&imgid=b14265fe-a911-45d7-a1d5-15677cb6d20f&v=2&sV=2&form=S00027" target="_blank"><img src="<?php echo HOST_APP; ?>/app/view/images/google-maps.png" alt=""></a>
                        <p>Maps</p>
                    </div>
                    <p><Strong>Rua</strong> Monge Beneditino, Dom Bernardo Botelho Nunes <strong>Nº142</strong> (JD Roseira).</p>

                </div>

                <div class="footer-container-desenvolvedor">
                    <div class="footer-desenvolvedor">
                        <div class="footer-desenvolvedor-container">
                            <div class="footer-des-h2">
                                <h2>Desenvolvido</h2>
                            </div>
                            <div class="container-nive-sistemas"><a href="#" class="nive-sistemas">Nive Sistemas</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="borda"></div>
    </footer>



    <!--Menu suspensos(Display:none; por padrão)-->



    <!--Product view mostra o produto com mais detalhes e em uma nova janela por cima das outras-->
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
                                            ea reprehenderit quaerat amet consectetur adipisicing elit. Amet explicabo aspernatur itaque? Labore
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





    <!--Carrinho HTML-->
    <!-- Modal HTML -->
    <div class="modal" id="modal">
        <div class="container-modal">
            <div class="modal-content">
                <div>
                    <!-- Modal Title -->
                    <div class="modal-title">
                        <!-- Modal Title Image -->
                        <div class="modal-title-img">
                            <img src="<?php echo HOST_APP; ?>/app/view/images/bag-ico.png" alt="">
                        </div>
                        <!-- Modal Title Heading -->
                        <div class="modal-title-h2">
                            <h2>Carrinho</h2>
                        </div>
                        <!-- Modal Close Button -->
                        <div class="modal-title-close">
                            <span class="close-btn" onclick="closeModal()">&times;</span>
                        </div>
                    </div>
                    <!-- Modal Product Display Area -->
                    <div class="modal-product">
                        <!-- Conteúdo dos produtos no carrinho -->
                    </div>
                    <!-- Modal Buttons Area -->
                    <div class="modal-btn">
                        <!-- Botão para solicitar orçamento -->
                        <input type="button" value="Solicitar Orçamento">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
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

</html>