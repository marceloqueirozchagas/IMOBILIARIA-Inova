<?php
class Imoveis extends CI_Controller
{
	public function consultar()
	{
		$this->load->library('pagination');
			
		$total = $this->imoveis_model->ObterTotal();
		$perpage = 10;
		$numlinks = $total / $perpage;

		$config['base_url'] = base_url().'/admin/imoveis/consultar/';
		$config['uri_segment']= '4';
		$config['total_rows'] = $total;
		$config['per_page'] = 10;
		$config['num_links'] = $numlinks;
		$config['full_tag_open'] = '<div id="paginacao">';
		$config['full_tag_close'] = '</div>';

		$this->pagination->initialize($config);
		
		if($numlinks >= 1)
			$data['paginacao'] = $this->pagination->create_links();
		else
			$data['paginacao'] = '';
	
		$data['imoveis'] = $this->imoveis_model->obterLista();
		$data['titulo'] = 'Consultar Imóveis'; 
		$data['pagina'] = 'admin/imoveis/consultar';
		$this->load->view('admin/layout', $data);
	}

	public function inserir()
	{
		$data['titulo'] = 'Inserir Imóvel'; 
		$data['pagina'] = 'admin/imoveis/inserir';
		$data['condominio'] = $this->condominios_model->ObterLista();
		$data['tipoImovel'] = $this->tipoImovel_model->ObterLista();
		$data['finalidade'] = $this->finalidade_model->ObterLista();
		$data['descricaoCheck'] = $this->descricaoImovel_model->ObterLista('C');
		$data['descricaoInput'] = $this->descricaoImovel_model->ObterLista('I');
		$this->load->view('admin/layout', $data);
	}
	
	public function alterar($CodigoImovel)
	{		
		$dados = $this->imoveis_model->ObterImovel($CodigoImovel);
		$data['tipoImovel'] = $this->tipoImovel_model->ObterLista();
		$data['finalidade'] = $this->finalidade_model->ObterLista();
		$data['descricaoCheck'] = $this->descricaoImovel_model->ObterLista('C');
		$data['descricaoInput'] = $this->descricaoImovel_model->ObterLista('I');
		$data['descricaoMarcada'] = $this->imovelDescricao_model->ObterLista($CodigoImovel);
		$data['imagensImovel'] = $this->imovelImagens_model->ObterLista($CodigoImovel);
		$data['imovel'] = $dados;
		$data['titulo'] = 'Alterar Imóvel';
		$data['pagina'] = 'admin/imoveis/alterar';
		$this->load->view('admin/layout', $data);
	}
	
	public function excluir($CodigoImovel)
	{
		$this->imoveis_model->Excluir($CodigoImovel);
		$this->recursos->setarMensagem('Imovel excluído com sucesso!','S');
		redirect(site_url('admin/imoveis/consultar'));
		
	}
	
	function salvar()
	{
		$cadastrado = true;
		$ordem = 1;
		$erro = "";
		$check = $this->input->post('ckbDescricao');
		$input = $this->input->post('inputDescricao');
		$imovel = array(
				'CodigoImovel' => $this->imoveis_model->gerarCodigoImovel($this->input->post('ddlTipo')),
				'Titulo' => $this->input->post('txtTitulo'),
				'Rua' => $this->input->post('txtRua'),
				'Descricao' => $this->input->post('txtDescricao'),
				'Complemento' => $this->input->post('txtComplemento'),
				'Numero' => $this->input->post('txtNumero'),
				'CEP' => $this->input->post('txtCEP'),
				'Bairro' => $this->input->post('txtBairro'),
				'CidadeID' => $this->input->post('ddlCidades'),
				'EstadoID' => $this->input->post('ddlEstados'),
				'ValorImovel' => $this->input->post('txtValorImovel'),
				'AreaConstruida' => $this->input->post('txtAreaConstruida'),
				'AreaTotal' => $this->input->post('txtAreaTotal'),
				'Observacoes' => $this->input->post('txtObservacoes'),
				'CondominioID' => $this->input->post('ddlCondominio'),
				'TipoImovelID' => $this->input->post('ddlTipo'),
				'FinalidadeID' => $this->input->post('ddlFinalidade'));
		$codigoImovel = $imovel['CodigoImovel'];

		// VERIFICA SE TODOS CAMPOS OBRIGATORIOS ESTAO PRRENCHIDOS
		$this->form_validation->set_message('is_natural', 'O campo %s deve ser selecionado');
		$this->form_validation->set_message('alpha', 'O campo %s deve ser selecionado');
		if ($this->form_validation->run())
		{
			// SALVA IMOVEL
			$this->imoveis_model->Inserir($imovel);
			
			// SALVA AS DESCRIÇÕES MARCADAS NOS CHECKBOXES
			for($i = 0; $i < count($check); $i++)
			{
				if($check[$i] != "")
				{
					$imovelDescricao = array(
					'CodigoImovel' => $codigoImovel,
					'DescricaoImovelID' => $check[$i],
					);
					
					$this->imovelDescricao_model->Inserir($imovelDescricao);
				}
			}
			
			// SALVA AS DESCRIÇÕES DIGITADAS NOS INPUTS
			foreach($input as $item)
			{
				if($this->input->post($item->DescricaoImovelID) > 0)
				{
					$imovelDescricao = array(
					'CodigoImovel' => $codigoImovel,
					'DescricaoImovelID' => $item->DescricaoImovelID,
					'Quantidade' => $this->input->post($item->descricaoimovelID),
					);
					
					$this->imovelDescricao_model->Inserir($imovelDescricao);
				}
			}
			
			// FAZ UPLOAD E SALVA AS IMAGENS
			foreach($_FILES['files']['tmp_name'] as $item)
			{
           		if($item!="")
				{
                	$uploadFile="";
                	$uploadFile=md5(uniqid(time())).".jpg";
                	$newfile= "assets/img/uploads/".$uploadFile;
                	
					if(move_uploaded_file($item, $newfile))
					{
                    	// SE UPLOAD FOR FEITO CRIAR NOVA IMAGEM COM NOME DO ID DO CONDOMINIO
						$novaImagem = $codigoImovel . '-' . $ordem . '.jpg';
						$imgImovel = $novaImagem;
						$tipo = substr($codigoImovel,0,2);
						
						$config['source_image'] = 'assets/img/uploads/' . $uploadFile;
						$config['new_image'] = "assets/img/imoveis/" .$tipo . '/' .$novaImagem;
						$config['maintain_ratio'] = FALSE;
						$config['width'] = 300;
						$config['height'] = 224;
						$this->load->library('image_lib', $config);
						$this->image_lib->initialize($config);	
						
						if ($this->image_lib->resize())
						{
							$this->image_lib->clear();
							unlink('assets/img/uploads/' . $uploadFile);
							
							$imovelImagens = array(
							'CodigoImovel' => $codigoImovel,
							'NomeImagem' => $novaImagem,
							'Ordem' => $ordem
							);
					
							$this->imovelImagens_model->inserir($imovelImagens);						
						}
						else
						{
							$erro .= $this->image_lib->display_errors();
							$cadastrado = false;
						}
                	}
                	else
					{
                    	$erro .= 'Erro ao enviar imagens';
						$cadastrado = false;
                	}
          		}
				$ordem ++;
   			}
		}
		
		// SENÃO RETORNA AO FORMULARIO
		else
		{
			$cadastrado = FALSE;
			$this->recursos->setarMensagem('Erro ao cadastrar imóvel!'.  validation_errors(),'E');
			$data['condominio'] = $this->condominios_model->ObterLista();
			$data['tipoImovel'] = $this->tipoImovel_model->ObterLista();
			$data['finalidade'] = $this->finalidade_model->ObterLista();
			$data['descricaoCheck'] = $this->descricaoImovel_model->ObterLista('C');
			$data['descricaoInput'] = $this->descricaoImovel_model->ObterLista('I');
			$data['titulo'] = 'Inserir Imóvel'; 
			$data['pagina'] = 'admin/imoveis/inserir';
			$this->load->view('admin/layout', $data);
		}
		
		if($cadastrado)
		{
			$this->recursos->setarMensagem('Imovel cadastrado com sucesso!','S');
			redirect(site_url('admin/imoveis/consultar'));
		}
		else
		{
			echo $erro;
		}
	}
	
	function Editar($CodigoImovel)
	{
		$erro = "";
		$cadastrado = TRUE;
		$imagensImovel = $this->imovelImagens_model->ObterLista($CodigoImovel);
		$ordem = $imagensImovel[count($imagensImovel) -1]->Ordem + 1;
		$imagens = $this->input->post('imagensMarcadas');
		
		// REMOVE AS IMAGENS SELECIONADAS
		if(count($imagens) > 0)
		{
			foreach($imagens as $item)
			{
				$this->imovelImagens_model->Excluir($CodigoImovel,$item);
				unlink('assets/img/imoveis/'.substr($CodigoImovel,0,2).'/'.$item);
			}
		}
		
		// FAZ UPLOAD E SALVA AS IMAGENS
		foreach($_FILES['files']['tmp_name'] as $item)
		{
       		if($item!="")
			{
            	$uploadFile="";
            	$uploadFile=md5(uniqid(time())).".jpg";
            	$newfile= "assets/img/uploads/".$uploadFile;
            	
				if(move_uploaded_file($item, $newfile))
				{
                	// SE UPLOAD FOR FEITO CRIAR NOVA IMAGEM COM NOME DO ID DO CONDOMINIO
					$novaImagem = $CodigoImovel . '-' . $ordem . '.jpg';
					$imgImovel = $novaImagem;
					$tipo = substr($CodigoImovel,0,2);
					
					$config['source_image'] = 'assets/img/uploads/' . $uploadFile;
					$config['new_image'] = "assets/img/imoveis/" .$tipo . '/' .$novaImagem;
					$config['maintain_ratio'] = FALSE;
					$config['width'] = 300;
					$config['height'] = 224;
					$this->load->library('image_lib', $config);
					$this->image_lib->initialize($config);	
					
					if ($this->image_lib->resize())
					{
						$this->image_lib->clear();
						//unlink('assets/img/uploads/' . $uploadFile);
						
						$imovelImagens = array(
						'CodigoImovel' => $CodigoImovel,
						'NomeImagem' => $novaImagem,
						'Ordem' => $ordem
						);
				
						$this->imovelImagens_model->inserir($imovelImagens);						
					}
					else
					{
						$erro .= $this->image_lib->display_errors();
						$cadastrado = false;
					}
            	}
            	else
				{
                	$erro .= 'Erro ao enviar imagens';
					$cadastrado = false;
            	}
      		}
			$ordem ++;
		}
			
		if($cadastrado)
		{
			$this->recursos->setarMensagem('Imovel alterado com sucesso!','S');
			redirect(site_url('admin/imoveis/consultar'));
		}
		else
		{
			echo $erro;
		}
	}
	
	function ObterEstados() 
	{
		$estados = $this->estados_model->ObterEstados();
		
		if( empty ( $estados ) )
		{
			echo '{ "nome": "Nenhum estado encontrado" }';
		}
		else
		{
			echo json_encode($estados);
		}
  	}
		
	function ObterCidades($EstadoID) 
	{
 		$cidades = $this->cidades_model->ObterCidades($EstadoID);
 
 		if( empty ( $cidades ) )
		{
			echo '{ "nome": "Nenhuma cidade encontrada" }';
		}
 		else 
		{
			echo json_encode($cidades);
		}	
    }
}
?>