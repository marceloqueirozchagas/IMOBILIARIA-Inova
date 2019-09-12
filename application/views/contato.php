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
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
            
       	<script type="text/javascript">
			$(document).ready(function(){
					var geocoder;
					var map;
					
					geocoder = new google.maps.Geocoder();
					geocoder.geocode({'address': 'Rua Nortelandia, 280 , Bairro Santa Fé , Campo Grande MS'}, function(results, status) {
					  if (status == google.maps.GeocoderStatus.OK) {
							  latlng = results[0].geometry.location;
							  var myOptions = {
									zoom: 15,
									center: latlng,
									mapTypeId: google.maps.MapTypeId.ROADMAP
							 }
				  
							  map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
						  
							  var image = 'assets/img/icon-inova.png';
							
							  var beachMarker = new google.maps.Marker({
								  position: latlng,
								  map: map,
								  icon: image
							  });
						
					  } else {
						alert("Geocoder failed due to: " + status);
					  }
					});
			});
    	</script>
            
    </head>
    <body id="contato" >
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
                <img src="<?php echo base_url(). 'assets/img/banner/7.jpg' ?>" width="940" height="236" />
            </div>
        </div>    
        
        <!-- **************************  CONTEUDO PRINCIPAL *******************************-->
        <div id="content" class="container_12 clearfix">
      
            <!-- CONTEUDO LADO ESQUERDO -->
            <div class="grid_9" id="principal">
                <div class="grid_5 alpha">
                    <p>Preencha o formulário abaixo, informando o assunto que deseja tratar conosco.
                        E aguarde que em breve entraremos em contato.
                    </p>
                
                    <form>
                        <p>
                            <label>Nome:</label>
                            <input type="text" name="nome" />
                        </p>
                        <p>
                            <label>E-mail:</label>
                            <input type="text" name="email" />
                        </p>
                        <p>
                            <label>Telefone:</label>
                            <input type="text" name="telefone" />
                        </p>
                        <p>
                          <label>Mensagem:</label>
                            <textarea  name="mensagem" rows="10" ></textarea>
                        </p>
                        <p><input type="button" name="enviar" value="enviar" /></p>
                    </form>
                </div> 
             
                <div class="grid_4 omega" id="info">
                    <p><b>Canais de Comunicação Inova Imóvel</b></p>
                    <p>Inova Imóveis</p>
                    <p>Rua Nortelandia, 280</p>
                    <p>Bairro Santa Fé</p>
                    <p>(67) 3327 - 2000</p>
                    <p>(67) 8478 - 0180</p>
                    <p>contato@inovams.com.br </p>
                    
                    <div id="map_canvas"></div>
                </div>
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
