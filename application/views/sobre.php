<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
        <script language="javascript" src="<?php echo base_url(). 'assets/js/jquery-ui-1.8.17.custom/js/jquery-ui-1.8.17.custom.min.js' ?>" ></script>
        <script language="javascript" src="<?php echo base_url(). 'assets/js/plugins/nivo-slider/jquery.nivo.slider.js' ?>" ></script>
        <script language="javascript" src="<?php echo base_url(). 'assets/js/plugins/jquery.corner.js' ?>" ></script>
        <script language="javascript" src="<?php echo base_url(). 'assets/js/scripts.js' ?>" ></script>
    </head>
    
    <body id="quemsomos">
        <div id="bg"></div>
        
        <!-- **************************  CABEÇALHO *******************************-->
        <div id="header" class="container_12 clearfix">
        	<div class="grid_12" id="topo">
            	<div class="grid_5 alpha" id="logo">
                	<img src="<?php echo base_url(). 'assets/img/logo_image.jpg' ?>" width="267" height="70" alt="Inova" />
                </div>
                <div class="grid_7 omega" id="menutopo"> 
                    <ul>
                        <li id="menu-home"><?php echo anchor('home','HOME'); ?></li>
                        <li id="menu-quemsomos" ><?php echo anchor('sobre','QUEM SOMOS'); ?></li>
                        <li id="menu-faleconosco"><?php echo anchor('contato','FALE CONOSCO'); ?></li>
                    </ul>
                </div>
          	</div>
			<div class="grid_12" id="sobre" >
            	<img src="<?php echo base_url(). 'assets/img/banner/6.jpg '?>" width="940" height="236" />
            </div>
        </div>

        <!-- **************************  CONTEUDO PRINCIPAL *******************************-->
        <div id="content" class="container_12 clearfix">
        
        	<!-- CONTEUDO LADO ESQUERDO -->
          	<div class="grid_9" id="principal">
            	<p>
                 Tendo em vista a grande procura por terrenos e casas em condomínios fechados, tendência na maioria dos grandes 	centros, foi criada a nossa empresa, afim de proporcionar um atendimento personalizado a este segmento, desde a indicação do condomínio, sua localização conforme a necessidade do cliente, a disponibilidade de terrenos no mesmo, como também de casas/sobrados prontos para venda,intermediando também a indicação de um profissional(arquiteto/engenheiro) afim de que o cliente contrate a construção de seu imóvel de acordo com seu gosto.
        		</p>
        		<p>
                  Atuamos também na compra/venda e intermediação de imóveis em toda a cidade, como casas, apartamentos, lotes, áreas urbanas, somos uma equipe experiente neste segmento, e temos a certeza que iremos proporcionar ótimos negócios aos nossos clientes, agindo com ética e profissionalismo.
             	</p>
                <br />
                <br />
                <p>
                	Entrega teu caminho ao Senhor; Confia nele e ele tudo fará
                    <strong>Salmos 37:5</strong>
                </P>
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
