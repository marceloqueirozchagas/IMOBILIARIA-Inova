<article class="module width_full">
<header>
	<h3>Condomínios Cadastrados</h3>
</header>
	<?php 
		echo link_tag('assets/css/paginacao.css" type="text/css" media="screen'); 
		if($condominios != NULL){
	?>
	
	<table class="tablesorter" cellspacing="0"> 
		<thead> 
			<tr> 
   				<th align="left">Imagem</th> 
    			<th align="left">Nome</th> 
				<th align="left">Valor do Condomínio</th> 
    			<th align="left">Ações</th> 
			</tr> 
		</thead> 
		<tbody> 
			<?php foreach($condominios as $item): ?>
				<tr> 
	   				<td>
						<img src="<?php echo base_url()."assets/img/condominios/".$item->ImagemLogo; ?>" 
							width="90" height="70" />
					</td> 
	    			<td>
						<?php echo $item->Nome ?>
					</td> 
	    			<td>
						<?php echo "R$ ".$item->ValorCondominio ?>
					</td> 
	    			<td>
						<a href="<?php echo base_url().'admin/condominios/alterar/'. $item->CondominioID ?>">
							<img src="<?php echo base_url().'assets/images/icn_edit.png' ?>" border="0"  />
						</a>
						<a href="excluir/<?php echo $item->CondominioID ?>">
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
	
	<?php 
		} // end if
		else
		{
			echo "Nenhum Condomínio foi encontrado!";
		} 	
	?>
	
	<footer>
		<a href="<?php echo base_url(). '/admin/condominios/inserir' ?>">
			<img src="<?php echo base_url().'assets/images/cadastrar.png' ?>" />
		</a>
	</footer> 
</article><!-- end of content manager article -->