<article class="module width_full">
<header>
	<h3>Editar Condomínio</h3>
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
			url: "<?php echo base_url(). 'admin/condominios/obterEstados' ?>",
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
				url:"<?php echo base_url(). 'admin/condominios/obterCidades/'. $estadoSelecionado ?>",
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
				url:"<?php echo base_url(). 'admin/condominios/obterCidades/' ?>" + estadoID,
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
		<?php echo form_open_multipart(base_url().'admin/condominios/editar/'.$condominio->CondominioID); ?>
			<fieldset>
				<table>
					<tr>
						<td>
							<label>Nome do Condomínio</label>
							<?php echo form_input('txtNome',$condominio->Nome); ?>
						</td>
					</tr>
					<tr>
						<td>
							<label>Descrição</label>
							<?php echo form_textarea('txtDescricao',$condominio->Descricao); ?>
						</td>
					</tr>
					<tr>
						<td>
							<label>Valor do Condomínio</label>
							<?php echo form_input('txtValor',$condominio->ValorCondominio); ?>
						</td>
					</tr>
					<tr>
						<td>
							<label>Rua</label>
							<?php echo form_input('txtRua',$condominio->Rua); ?>
						</td>
					</tr>
					<tr>
						<td>
							<label>Número</label>
							<?php echo form_input('txtNumero',$condominio->Numero); ?>
						</td>
					</tr>
					<tr>
						<td>
							<label>Bairro</label>
							<?php echo form_input('txtBairro',$condominio->Bairro); ?>
						</td>
					</tr>
					<tr>
						<td>
							<label>CEP</label>
							<?php echo form_input('txtCEP',$condominio->CEP); ?>
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
							<br>
							<br>
							<img align="left" src="<?php echo base_url(). "assets/img/condominios/".$condominio->ImagemLogo; ?>"/>
						</td>
					</tr>
					<tr>
						<td>
							<label>Deseja trocar a imagem?</label>
							<?php
								echo form_radio('trocaImagem', 'N', 'TRUE'). " Não";
								echo form_radio('trocaImagem', 'S'). " Sim";
								echo form_upload('userfile');
							?>
						</td>
					</tr>
					<tr>
						<td>
						<br>
						<br>
							<?php echo form_submit('btnSalvar','Alterar','class=alt_btn') ?>
							<?php echo form_reset('btnLimpar','Limpar') ?>
						</td>
					</tr>
				</table>
			</fieldset>
		</div>
		<footer></footer>
	<?php echo form_close(); ?>
</article><!-- end of post new article -->