<html lang="pt-br">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta charset="utf-8"/>
		<meta name="description" content="Na Imobiliaria Inova você encontra as melhores opções para todos os tipos de imóveis,
    	e os melhores condomínios da cidade, simplesmente a sua melhor oportunidade de comprar seu imóvel">
		<meta name="keywords" content="Inova Imóveis, Inova, compra, venda, imóveis, condominios, apartamentos, damha, alphaville, casas,
    	imobiliaria, inova, terrenos, campo grande, ms,"> 
		<meta name="author" content="Marcelo Queiroz das Chagas"> 
        <title>Inova Imóveis</title>
        
		<!----------------- FRAMEWORK 960GRID PARA LAYOUTS-------------------->
        <?php echo link_tag('assets/css/960grid/960.css'); ?>
        <?php echo link_tag('assets/css/960grid/reset.css'); ?>
        <?php echo link_tag('assets/css/960grid/text.css'); ?>
        <?php echo link_tag('assets/js/jquery-ui-1.8.17.custom/css/custom-theme/jquery-ui-1.8.17.custom.css'); ?>
        
		<!----------------- PLUGIN SLIDESHOW -------------------->
        <?php echo link_tag('assets/js/plugins/nivo-slider/nivo-slider.css'); ?>
        <?php echo link_tag('assets/js/plugins/nivo-slider/style.css'); ?>
        <script language="javascript" src="<?php echo base_url(). 'assets/js/jquery-1.4.3.min.js' ?>" ></script>
        <script language="javascript" src="<?php echo base_url(). 'assets/js/jquery-ui-1.8.17.custom/js/jquery-ui-1.8.17.custom.min.js' ?>" >
		</script>
        <script language="javascript" src="<?php echo base_url(). 'assets/js/plugins/nivo-slider/jquery.nivo.slider.js' ?>" ></script>
        <script language="javascript" src="<?php echo base_url(). 'assets/js/plugins/jquery.corner.js' ?>" ></script>
        <script language="javascript" src="<?php echo base_url(). 'assets/js/scripts.js' ?>" ></script>
    </head>
	<body id="home">
        <div id="bg"></div>
        
        <!-- **************************  CABEÇALHO *******************************-->
        <div id="header" class="container_12 clearfix">
  			<div class="grid_12" id="topo">
        		<div class="grid_5 alpha" id="logo">
          			<img src="assets/img/logo_image.jpg" width="267" height="70" alt="Inova" />
    			</div>
        		<div class="grid_7 omega" id="menutopo"> 
            		<ul>
                        <li id="menu-home"><?php echo anchor('home','HOME'); ?></li>
                        <li id="menu-quemsomos" ><?php echo anchor('sobre','QUEM SOMOS'); ?></li>
                        <li id="menu-faleconosco"><?php echo anchor('contato','FALE CONOSCO'); ?></li>
            		</ul>
        		</div>
  			</div>
            
			<!-- **************************  SLIDSHOW *******************************-->
    		<div class="grid_12" id="slideshow">
        		<div id="slider" class="nivoSlider">
    				<img src="assets/img/banner/2.jpg" width="950" height="338" alt="" />
                    <img src="assets/img/banner/3.jpg" width="950" height="338" alt=" " />
                    <img src="assets/img/banner/4.jpg" width="950" height="338" alt=" " />
                    <img src="assets/img/banner/5.jpg" width="950" height="338" alt=" " />
                    <img src="assets/img/banner/1.jpg" width="950" height="338" alt="" />
         		</div>
     		</div>
		</div>

		<!-- **************************  CONTEUDO PRINCIPAL *******************************-->
		<div id="content" class="container_12 clearfix">

			<!-- CONTEUDO LADO ESQUERDO -->
 		 	<div class="grid_9" id="principal">
      			<?php $this->load->view($pagina); ?>
        	</div>
			
            <!-- SUBMENU LADO DIREITO -->
  			<div class="grid_3" id="submenu">
        		<div id="opacity"></div>
        		<div id="sub">
        			
                    <h6>Busca por Imóveis</h6>
                    <ul>
                        <li><a href="detalhes.html">Apartamentos</a></li>
                        <li><a href="#">Casas</a></li>
                        <li><a href="#">Sobrados</a></li>
                        <li><a href="#">Ponto Comercial</a></li>
                        <li><a href="#">Terrenos</a></li>
                        <li><a href="#">Rural</a></li>
                    </ul>
                    
                    <h6>Busca por Condominios</h6>
                    <ul>
                        <li><a href="#">Casas</a></li>
                        <li><a href="#">Sobrados</a></li>
                        <li><a href="#">Terrenos</a></li>
                    </ul>
        		</div>
  			</div>
		</div>
		
        <!-- ************************** RODAPÉ *******************************-->
		<div class="footer-bottom"> 
			<div id="footer" class="container_12 clearfix" >
				<h6 align="center">Inova Imóveis CRECI 831-J</h6>
        		<h6 align="center">Telefones: (67) 3327-2000 8478-0180</h6>
			</div>
		</div>
	</body>
</html>
