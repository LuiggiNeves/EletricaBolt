<?php
include('layout/head.php');
?>
<link rel="stylesheet" href="<?php echo HOST_APP; ?>/app/view/css/pagina_incial_base.css">
<link rel="stylesheet" href="<?php echo HOST_APP; ?>/app/view/css/pagina_incial.css">
<link rel="stylesheet" href="<?php echo HOST_APP; ?>/app/view/css/produto-layout.css">
<link rel="stylesheet" href="<?php echo HOST_APP; ?>/app/view/css/carrinho-layout.css">
<link rel="stylesheet" href="<?php echo HOST_APP; ?>/app/view/css/produto-preview.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</head>
<body>

<?php include 'navbar.php'?>



<main>

    <div class="container-loc-page">
        <div class="loc-page">
            <div class="loc-page-path">
                <p><a href="#">home </a> > <a href="#">NomePathDoSite</a></p>
            </div>
        </div>
    </div>

    <div class="container-main-preview ">
        <div class="main-preview-layout border">
            
            <div class="container-content">
                <div class="product-preview-img"> <!--Imagems do produto-->

                    <div class="multiple-imgs"> <!--Container de varias imagens (secundarias, pequenas)-->
                        <img src="<?php echo HOST_APP; ?>/app/view/images/conector-duplo.png" alt="">
                        <img src="<?php echo HOST_APP; ?>/app/view/images/conector-duplo.png" alt="">
                        <img src="<?php echo HOST_APP; ?>/app/view/images/conector-duplo.png" alt="">
                        <img src="<?php echo HOST_APP; ?>/app/view/images/conector-duplo.png" alt="">
                    </div>

                    
                    <div class="active-img-container"><!-- Imagem que será exibida(principal, maior)-->
                        <div class="active-img">
                            <div class="border">
                                <img src="<?php echo HOST_APP; ?>/app/view/images/conector-duplo.png" alt="">
                            </div>
                        </div>
                    </div>

                </div>


                <div class="product-preview-info-container"><!--Nome, cod, cod de barras, preço categoria do produto-->

                    <div class="product-preview-info">
                        <h2>CONECTOR DUPLO 4MM² À 6MM²</h2> <!--NOME PROD-->
                        <p><strong>Preço:</strong> R$1.116,60</p> <!-- PREÇO-->
                        <p><strong>Categoria:</strong> Conectores</p> <!-- CATEG-->
                        <p><strong>código:</strong> 6867</p>  <!-- COD--> 
                        <p><strong>Barras:</strong> 9 788545 20241 7</p> <!--COD BARRAS-->

                    </div>
                        
                    <div class="product-preview-container-btn">
                        <div class="product-preview-btn">
                            <input type="button" value="Carrinho">
                            <input type="button" value="Pedir produto">                    
                        </div>

                    </div>

                    
                </div>
            </div>

            
            <div class="product-preview-descricao">
                <h3>Descrição</h3>
                <!--DESC NO LUGAR DO <P>-->
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates 
                    blanditiis dolor suscipit hic, cum atque enim dicta quae dolores! Deserunt recusandae, 
                    tempore quam deleniti architecto officia eligendi non voluptate sed.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates 
                    blanditiis dolor suscipit hic, cum atque enim dicta quae dolores! Deserunt recusandae, 
                    tempore quam deleniti architecto officia eligendi non voluptate sed.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates 
                    blanditiis dolor suscipit hic, cum atque enim dicta quae dolores! Deserunt recusandae, 
                    tempore quam deleniti architecto officia eligendi non voluptate sed.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates 
                    blanditiis dolor suscipit hic, cum atque enim dicta quae dolores! Deserunt recusandae, 
                    tempore quam deleniti architecto officia eligendi non voluptate sed.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates 
                    blanditiis dolor suscipit hic, cum atque enim dicta quae dolores! Deserunt recusandae, 
                    tempore quam deleniti architecto officia eligendi non voluptate sed.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates 
                    blanditiis dolor suscipit hic, cum atque enim dicta quae dolores! Deserunt recusandae, 
                    tempore quam deleniti architecto officia eligendi non voluptate sed.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates 
                    blanditiis dolor suscipit hic, cum atque enim dicta quae dolores! Deserunt recusandae, 
                    tempore quam deleniti architecto officia eligendi non voluptate sed.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates 
                    blanditiis dolor suscipit hic, cum atque enim dicta quae dolores! Deserunt recusandae, 
                    tempore quam deleniti architecto officia eligendi non voluptate sed.</p>
            </div>
        </div>
    </div>
</main>

<div id="container-footer">
    <?php include 'footer.php' ?>
</div>

</body>
