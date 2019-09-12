<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>
		<?php 
			if(isset($titulo))
				echo "Inova - " . $titulo ;
			else
				echo "Inova Imóveis - Painel de Controle";
		?>
	</title>
	<link rel="stylesheet" href="meuestilo.css">
	<?php echo link_tag('assets/css/layout.css" type="text/css" media="screen'); ?>
	<!--[if lt IE 9]>
		<link rel="stylesheet" href="<?php echo base_url().assets/css/ie.css ?>" type="text/css" media="screen" />
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script type="text/javascript" src="<?php echo base_url(). 'assets/js/jquery-1.5.2.min.js' ?>" ></script>
    <script type="text/javascript" src="<?php echo base_url(). 'assets/js/Mascara.js' ?>" ></script>
	<script type="text/javascript" src="<?php echo base_url(). 'assets/js/hideshow.js' ?>"></script>
	<script type="text/javascript" src="<?php echo base_url(). 'assets/js/jquery.tablesorter.min.js' ?>" ></script>
	<script type="text/javascript" src="<?php echo base_url(). 'assets/js/jquery.equalHeight.js' ?>" ></script>
	
	<script type="text/javascript">
	
		$(document).ready(function(){
			//When page loads...
			$(".tablesorter").tablesorter(); 
			
			$(".tab_content").hide(); //Hide all content
			$("ul.tabs li:first").addClass("active").show(); //Activate first tab
			$(".tab_content:first").show(); //Show first tab content
			
			//On Click Event
			$("ul.tabs li").click(function(){
				$("ul.tabs li").removeClass("active"); //Remove any "active" class
				$(this).addClass("active"); //Add "active" class to selected tab
				$(".tab_content").hide(); //Hide all tab content
	
				var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
				$(activeTab).fadeIn(); //Fade in the active ID content
				return false;
			});
		});

	$(function(){
    	$('.column').equalHeight();
	});
	</script>
</head>
<body>
	<header id="header">
      <hgroup>
            <h1 class="site_title"><a href="<?php echo base_url().'admin' ?>">Menu Administração</a></h1>
      		<h2 class="section_title">Inova Imóves - Painel de Controle</h2>
            <div class="btn_view_site"><a href="http://www.inovams.com.br" target="_blank">Ver o Site</a></div>
      </hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar">
		<div class="user">
			<p><?php echo $this->session->userdata('usuario'); ?></p>
			<?php echo anchor('admin/usuarios/logout','','class=logout_user title=Desconectar') ?>
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs">
            	<a href="<?php echo base_url(). $this->uri->segment(1); ?>">Home</a>
				<?php if ($this->uri->segment(2)): ?>
				<div class="breadcrumb_divider"></div> 
                <a href="#"><?php echo $this->uri->segment(2); ?></a>
				<?php endif; ?>
				<?php if ($this->uri->segment(3)): ?>
				<div class="breadcrumb_divider"></div> 
                <a href="#"><?php echo $this->uri->segment(3); ?></a>
				<?php endif; ?>
				
            </article>
		</div>
	</section><!-- end of secondary bar -->
	
	<aside id="sidebar" class="column">
		<h3>Imóveis</h3>
		<ul class="toggle">
			<li class="icn_new_article">
				<?php echo anchor('admin/imoveis/inserir', 'Inserir'); ?>
			</li>
			<li class="icn_categories">
			<?php echo anchor('admin/imoveis/consultar', 'Consultar'); ?>
			</li>
		</ul>
        <h3>Condomínios</h3>
		<ul class="toggle">
			<li class="icn_new_article">
				<?php echo anchor('admin/condominios/inserir','Inserir') ?>
			</li>
			<li class="icn_categories">
				<?php echo anchor('admin/condominios/consultar','Consultar') ?>
			</li>
		</ul>
		<h3>Usuarios</h3>
		<ul class="toggle">
			<li class="icn_add_user"><a href="#">Inserir</a></li>
			<li class="icn_view_users"><a href="#">Consultar</a></li>
			<li class="icn_profile"><a href="#">Meu Cadastro</a></li>
		</ul>
		<h3>Estatísticas</h3>
		<ul class="toggle">
			<li class="icn_folder"><a href="#">Imóveis</a></li>
			<li class="icn_photo"><a href="#">Visitas</a></li>
			<li class="icn_audio"><a href="#">Relatórios</a></li>
		</ul>
		<h3>Admin</h3>
		<ul class="toggle">
			<li class="icn_settings"><a href="#">Opções</a></li>
			<li class="icn_security"><a href="#">Pagamentos</a></li>
			<li class="icn_jump_back">
				<?php echo anchor('admin/usuarios/logout','Sair','title=Desconectar') ?>
			</li>
		</ul>

	</aside><!-- end of sidebar -->
	
	<section id="main" class="column">
		<?php
			$this->recursos->retornarMensagem(); 
			$this->load->view($pagina); 
		?>
	</section>
</body>
</html>