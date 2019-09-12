<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Inova - PAINEL DE CONTROLE</title>
	<?php echo link_tag('assets/css/login-box.css') ?>
</head>
<body>
	<div style="position:absolute; left:50%; top:50%; margin-left:-200; margin-top:-200;">
		<div id="login-box">
			<h2>Logar</h2>
			Inova Imóveis - PAINEL DE CONTROLE
			<br />
			<br />
			<?php echo form_open('admin/usuarios/login'); ?>
				<div id="login-box-name" style="margin-top:20px;">Usuario:</div>
				<div id="login-box-field" style="margin-top:20px;">
					<?php 
						echo form_input('txtLogin',set_value('txtLogin'), 'class=form-login size=20 maxlength=20');
						echo form_error('txtLogin', '<h5>', '</h5>');
					?>
				</div>
				<div id="login-box-name">Senha:</div>
				<div id="login-box-field">
					<?php 
						echo form_password('txtSenha',set_value('txtSenha'), 'class=form-login size=20 maxlength=20');
						echo form_error('txtSenha', '<h5>', '</h5>');
					?>
				</div>
				<?php 
					echo form_submit('btnSubmit','Entrar','style=margin-left:90px;'); 
				?>
			<br>
			<?php 
				if(isset($msg))
				{
					echo '<br /><br />'.$msg; 
				} 
				echo form_close();		
			?>
		</div>
	</div>
</body>
</html>