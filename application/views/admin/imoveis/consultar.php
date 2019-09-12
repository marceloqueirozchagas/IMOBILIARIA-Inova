<article class="module width_full">
	<header>
		<h3>Imóveis Cadastrados</h3>
	</header>
		<?php echo link_tag('assets/css/paginacao.css" type="text/css" media="screen'); 
			if($imoveis != NULL){
		?>
	<table class="tablesorter" cellspacing="0"> 
		<thead> 
			<tr> 
   				<th align="left">Codigo</th> 
    			<th align="left">Titulo</th> 
				<th align="left">Valor do Condomínio</th> 
    			<th align="left">Ações</th> 
			</tr> 
		</thead> 
		<tbody> 
			<?php foreach($imoveis as $item): ?>
			<tr> 
   				<td>
					<?php echo $item->CodigoImovel; ?>
				</td> 
    			<td><?php echo $item->Titulo ?></td> 
    			<td><?php echo "R$ ".$item->ValorImovel ?></td> 
    			<td>
					<a href="<?php echo base_url().'admin/imoveis/alterar/'. $item->CodigoImovel ?>">
						<img src="<?php echo base_url().'assets/images/icn_edit.png' ?>" border="0"  />
					</a>
					<a href="<?php echo base_url(). 'admin/imoveis/excluir/'. $item->CodigoImovel ?>">
						<img src="<?php echo base_url().'assets/images/icn_trash.png' ?>" border="0" />
					</a>
				</td> 
			</tr>
			<?php endforeach; ?>
			<tr>
				<td>
					<?php echo $paginacao; ?>
				</td>
			</tr>
		</tbody>
	</table>
	<?php } 
		else 
			echo "Nenhum Condomínio foi encontrado!";
	?>
	<footer>
		<a href="<?php echo base_url(). '/admin/imoveis/inserir' ?>">
			<img src="<?php echo base_url().'assets/images/cadastrar.png' ?>" />
		</a>
	</footer> 
</article><!-- end of content manager article -->