<article class="module width_full">
<header>
	<h3>Cadastro de Condomínios</h3>
</header>
<script type="text/javascript">
	$(document).ready(function(){
		<?php 
			if(!isset($estadoSelecionado)) 
				$estadoSelecionado = 12;
	
				
			if(!isset($cidadeSelecionada))
				$cidadeSelecionada = 4079;
		?>
		
		var estadoSelecionado = <?php echo $estadoSelecionado; ?>;
	 	var cidadeSelecionada = <?php echo $cidadeSelecionada; ?>;
		
		$.ajax({
			type:"POST",
			url:"obterEstados",
				dataType:"text",
				success:function(dados)
				{
					    estados = eval(""+dados.replace("[]","")+"");
	
					var options = "<option value='-1'>Selecione um estado</option>";
					
					$.each(estados,function(index,estado){
						if(estado.EstadoID == estadoSelecionado)
							options += "<option value='" + estado.EstadoID + "'" +  "selected='selected'" +">" + estado.Nome + "</option>";
						else
							options += "<option value='" + estado.EstadoID + "'" + ">" + estado.Nome + "</option>";
					});
	
					$("#ddlEstados").html(options);
				}
			});
		var estadoID = $("#ddlEstados option:selected").val();
		$.ajax({
	
				type:"POST",
				url:"obterCidades/" + estadoSelecionado,
				data:"estadoID=" + estadoID,
				dataType:"text",
				success:function(dados){
					cidades = eval(""+dados.replace("[]","")+"");
	
					var options = "<option value='-1'>Selecine um cidade</option>";
					var selecionado = "";
	
					$.each(cidades,function(index,cidade){
						if(cidade.CidadeID == cidadeSelecionada)
							options += "<option value='" + cidade.CidadeID + "'" +  "selected='selected'" +">" + cidade.Nome + "</option>";
						else
							options += "<option value='" + cidade.CidadeID + "'" + ">" + cidade.Nome + "</option>";
					});
	
					$("#ddlCidades").html(options);							
				}
			});
		
		$("#ddlEstados").change(function(){
	
			var estadoID = $("#ddlEstados option:selected").val();
			
			$.ajax({
				type:"POST",
				url:"obterCidades/" + estadoID,
				data:"estadoID="+estadoID,
				dataType:"text",
				success:function(dados){
					cidades = eval(""+dados.replace("[]","")+"");
	
					var options = "<option value='-1' selected='selected' >Selecine um cidade</option>";
	
					$.each(cidades,function(index,cidade){
						options += "<option value='"+cidade.CidadeID+"'>"+cidade.Nome+"</option>";
					});
	
					$("#ddlCidades").html(options);							
				}
			});
			
		});
	});
</script>
	<div class="module_content">
		<?php echo form_open_multipart('admin/condominios/salvar'); ?>
			<fieldset>
				<table>
					<tr>
						<td>
							<label>Nome do Condomínio</label>
							<?php 
								echo form_input('txtNome',set_value('txtNome'));
								echo form_error('txtNome', '<h5>', '</h5>');
							?>
						</td>
					</tr>
					<tr>
						<td>
							<label>Descrição</label>
							<?php 
								echo form_textarea('txtDescricao',set_value('txtDescricao')); 
								echo form_error('txtDescricao', '<h5>', '</h5>');
							?>
						</td>
					</tr>
					<tr>
						<td>
							<label>Valor do Condomínio</label>
							<?php 
								echo form_input('txtValor',set_value('txtValor')); 
								echo form_error('txtValor', '<h5>', '</h5>');
							?>
						</td>
					</tr>
					<tr>
						<td>
							<label>Rua</label>
							<?php 
								echo form_input('txtRua',set_value('txtRua'));
								echo form_error('txtRua', '<h5>', '</h5>');
							?>
						</td>
					</tr>
					<tr>
						<td>
							<label>Número</label>
							<?php 
								echo form_input('txtNumero',set_value('txtNumero'));
								echo form_error('txtNumero', '<h5>', '</h5>');
							?>
						</td>
					</tr>
					<tr>
						<td>
							<label>Bairro</label>
							<?php
								echo form_input('txtBairro',set_value('txtBairro')); 
								echo form_error('txtBairro', '<h5>', '</h5>');
							?>
						</td>
					</tr>
					<tr>
						<td>
							<label>CEP</label>
							<?php 
								echo form_input('txtCEP',set_value('txtCEP'),'class=txtCEP'); 
							?>
						</td>
					</tr>
					<tr>
						<td>
							<label>Estado</label>
							<select id="ddlEstados" name="ddlEstados"></select>
							<?php echo form_error('ddlEstados', '<h5>', '</h5>'); ?>
						</td>
					</tr>
					<tr>
						<td>
							<label>Cidade</label>
							<select id="ddlCidades" name="ddlCidades"></select>
							<?php echo form_error('ddlCidades', '<h5>', '</h5>'); ?>
						</td>
					</tr>
					<tr>
						<td>
							<label>Imagem</label>
							<?php echo form_upload('txtImagem'); ?>
						</td>
					</tr>
					<tr>
						<td>
						<br>
							<?php echo form_submit('btnSalvar','Salvar','class=alt_btn') ?>
							<?php echo form_reset('btnLimpar','Limpar') ?>
						</td>
					</tr>
				</table>
			</fieldset>
		</div>
		<footer></footer>
	<?php echo form_close(); ?>
</article><!-- end of post new article -->