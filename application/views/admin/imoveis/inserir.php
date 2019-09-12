<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.MultiFile.js' ?>" /></script>
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
<style>
.descricao ul {
	list-style:none;
	}
.descricao li {
	list-style:none;
	float:left;
	display:block;
	width: 200px;
	margin-left:10px;
}
</style>
<script type="text/javascript">
	$(document).ready(function() {
		$(".tablesorter").tablesorter(); 
	
		$(".tab_content").hide(); //Hide all content
		$("ul.tabs li:first").addClass("active").show(); //Activate first tab
		$(".tab_content:first").show(); //Show first tab content

		//On Click Event
		$("ul.tabs li").click(function() {
			$("ul.tabs li").removeClass("active"); //Remove any "active" class
			$(this).addClass("active"); //Add "active" class to selected tab
			$(".tab_content").hide(); //Hide all tab content
			
			//Find the href attribute value to identify the active tab + content
			var activeTab = $(this).find("a").attr("href"); 
			$(activeTab).fadeIn(); //Fade in the active ID content
			return false;
		});
	});
	
	$(function(){
        $('.column').equalHeight();
    });
</script>
<article class="module width_full">
<?php echo form_open_multipart('admin/imoveis/salvar'); ?>
	<header><h3 class="tabs_involved">Cadastrar novo Imóvel</h3>
		<ul class="tabs">
   			<li><a href="#tab1">Dados do Imóvel</a></li>
    		<li><a href="#tab2">Descrição</a></li>
			<li><a href="#tab3">Fotos</a></li>
		</ul>
	</header>
	<?php echo form_open_multipart('admin/imoveis/salvar'); ?>
	<div class="tab_container">
		<div id="tab1" class="tab_content">
			<fieldset>
				<table>
					<tr>
						<td>
							<label>Tipo de Imóvel</label>
							<?php
								$options = array ('-1' => '(Selecione)');
    							foreach($tipoImovel as $item)
								{
									$options[$item->TipoImovelID] = $item->Descricao;
								}
    							echo form_dropdown('ddlTipo', $options);
						 		echo form_error('ddlTipo', '<h5>', '</h5>'); 
							?>
						</td>
					</tr>
					<tr>
						<td>
							<label>Finalidade</label>
							<?php
								$options = array ('-1' => '(Selecione)');
	    						foreach($finalidade as $item)
								{
									$options[$item->FinalidadeID] = $item->Descricao;
								}
	    						echo form_dropdown('ddlFinalidade', $options);
							 	echo form_error('ddlFinalidade', '<h5>', '</h5>'); 
							?>
						</td>
					</tr>
					<tr>
						<td>
							<label>Condomínio</label>
							<?php
								$options = array ('-1' => '(Selecione)');
	    						foreach($condominio as $item)
								{
									$options[$item->CondominioID] = $item->Nome;
								}
	    						echo form_dropdown('ddlCondominio', $options);
							 	echo form_error('ddlCondominio', '<h5>', '</h5>'); 
							?>
						</td>
					</tr>
					<tr>
						<td>
							<label>Titulo</label>
							<?php 
								echo form_input('txtTitulo',set_value('txtTitulo'));
								echo form_error('txtTitulo', '<h5>', '</h5>');
							?>
						</td>
					</tr>
					<tr>
						<td>
							<label>Valor do Imóvel</label>
							<?php 
								echo form_input('txtValorImovel',set_value('txtValorImovel')); 
								echo form_error('txtValorImovel', '<h5>', '</h5>');
							?>
						</td>
					</tr>
					<tr>
						<td>
							<label>Área Total</label>
							<?php 
								echo form_input('txtAreaTotal',set_value('txtAreaTotal')); 
								echo form_error('txtAreaTotal', '<h5>', '</h5>');
							?>
						</td>
					</tr>
					<tr>
						<td>
							<label>Área Construída</label>
							<?php 
								echo form_input('txtAreaConstruida',set_value('txtAreaConstruida')); 
								echo form_error('txtAreaConstruida', '<h5>', '</h5>');
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
							<label>Complemento</label>
							<?php 
								echo form_input('txtComplemento',set_value('txtComplemento'));
								echo form_error('txtComplemento', '<h5>', '</h5>');
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
				</table>
			</fieldset>
		</div><!-- end of #tab1 -->
			
		<div id="tab2" class="tab_content">
			<fieldset>
				<table>
					<tr>
						<td class="descricao">
                            <ul>
								<?php
									foreach($descricaoCheck as $item)
									{
										echo '<li>';
										echo form_checkbox('ckbDescricao[]', $item->DescricaoImovelID,set_checkbox('ckbDescricao',$item->DescricaoImovelID));
										echo $item->Descricao;
										echo '</li>';
									}
								?>
							</ul>
						</td>
					</tr>
					<tr>
						<td class="descricao">
                            <ul>
								<?php
									foreach($descricaoInput as $item)
									{
										echo '<li>';
										echo '<label>'.$item->Descricao.'</label>';
										echo form_input('inputDescricao[]',set_value('inputDescricao[]')); 
										echo '</li>';
									}
								?>
							</ul>
						</td>
					</tr>
					<tr>
						<td>
							<label>Descrição</label>
							<?php echo form_textarea('txtDescricao',set_value('txtDescricao')); ?>
						</td>
					</tr>
					<tr>
						<td>
							<label>Observações</label>
							<?php echo form_textarea('txtObservacoes',set_value('txtObservacoes')); ?>
						</td>
					</tr>
				</table>
			</fieldset>
		</div><!-- end of #tab2 -->
			
		<div id="tab3" class="tab_content">

	 			<input type="file" name="files[]" class="multi" accept="jpeg|jpg|png|gif" />

		</div><!-- end of #tab3 -->
	</div><!-- end of .tab_container -->	
	<?php echo form_submit('submit','Salvar') ?>
	<?php echo form_close(); ?>	
</article><!-- end of content manager article -->