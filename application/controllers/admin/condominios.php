<?php
	class Condominios extends CI_Controller
	{
		public function Inserir()
		{
			$data['titulo'] = 'Inserir Condomínio'; 
			$data['pagina'] = 'admin/condominios/inserir';
			$this->load->view('admin/layout', $data);
		}
	
		public function Consultar()
		{
			$this->load->library('pagination');
			
			$total = $this->condominios_model->ObterTotal();
			$perpage = 10;
			$numlinks = $total / $perpage;

			$config['base_url'] = base_url().'/admin/condominios/consultar/';
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
			$data['condominios'] = $this->condominios_model->ObterListaPaginacao($perpage,$this->uri->segment(4)) ;
			$data['titulo'] = 'Consulta de Condomínios';
			$data['pagina'] = 'admin/condominios/consultar';
			$this->load->view('admin/layout', $data);
		}
		
		public function Alterar($condominioID)
		{
			$dados = $this->condominios_model->ObterCondominio($condominioID);
			$data['condominio'] = $dados;
			$data['cidadeSelecionada'] = $dados->CidadeID;
			$data['estadoSelecionado'] = $dados->EstadoID;
			$data['titulo'] = 'Alterar Condomínio';
			$data['pagina'] = 'admin/condominios/alterar';
			$this->load->view('admin/layout', $data);
		}
		
		public function Salvar()
		{
			$condominio = array(
				'Nome' => $this->input->post('txtNome'),
				'Rua' => $this->input->post('txtRua'),
				'Descricao' => $this->input->post('txtDescricao'),
				'Numero' => $this->input->post('txtNumero'),
				'CEP' => $this->input->post('txtCEP'),
				'Bairro' => $this->input->post('txtBairoo'),
				'CidadeID' => $this->input->post('ddlCidades'),
				'EstadoID' => $this->input->post('ddlEstados'),
				'ValorCondominio' => $this->input->post('txtValor')
			);
			
			$logmarca = $_FILES['txtImagem']['name'];
			$cadastrado = TRUE;
			$mensagensErro ='';
			
			// VERIFICA SE TODOS CAMPOS OBRIGATORIOS ESTAO PRRENCHIDOS
			if ($this->form_validation->run())
			{
			
				// SE SELECIONADO ARQUIVO FAZER UPLOAD PARA PASTA UPLOADS/
				if($logmarca != "")
				{
					$config['upload_path'] = 'assets/img/uploads';
					$config['allowed_types'] = 'jpg|jpeg|png|gif';
	
					$this->load->library('upload', $config);
	
					if ( ! $this->upload->do_upload('txtImagem'))
					{
						$mensagensErro = $mensagensErro." ".$this->upload->display_errors();
						$cadastrado = FALSE;
					}
					else
					{
						// SE UPLOAD FOR FEITO CRIAR NOVA IMAGEM COM NOME DO ID DO CONDOMINIO
						$ultimoCondominio = $this->condominios_model->ObterUltimoCondominio();
						$novaImagem = $ultimoCondominio['CondominioID'] + 1;
						$novaImagem = $novaImagem.'.jpg';
						$condominio['ImagemLogo'] = $novaImagem;

						$config['image_library'] = 'GD2';
						$config['source_image'] = 'assets/img/uploads/'.$logmarca;
						$config['new_image'] = 'assets/img/condominios/'.$novaImagem;
						$config['maintain_ratio'] = FALSE;
						$config['width'] = 300;
						$config['height'] = 224;
		
						$this->load->library('image_lib', $config);
						
						if ( ! $this->image_lib->resize())
						{
							$mensagensErro = $mensagensErro." ".$this->image_lib->display_errors();
							$cadastrado = FALSE;
						}
						else
						{
							unlink('assets/img/uploads/'.$logmarca);
						}
					}	
				}
				else
				{
					$condominio['ImagemLogo'] = "SemImagem.png";
				}
				
				// SE FOI FEITO O UPLOAD E O REDIMENSIONAMENTO CORRETO ENTAO INSERE NO BD
				if($cadastrado)
				{
					if($this->condominios_model->Inserir($condominio) == false)
					{
						$cadastrado = FALSE;

						$this->recursos->setarMensagem('Erro ao cadastrar condomínio!','E');
						$data['estadoSelecionado'] = $condominio['EstadoID'];
						$data['cidadeSelecionada'] = $condominio['CidadeID'];
						$data['pagina'] = 'admin/condominios/inserir';
						$this->load->view('admin/layout', $data);
					}
					else
					{
						$this->recursos->setarMensagem('Condomínio cadastrado com sucesso!','S');
						redirect(site_url('admin/condominios/consultar'));
					}	
				}
				else
				{
					$this->recursos->setarMensagem($mensagensErro,'E');
					$data['pagina'] = 'admin/condominios/inserir';
					$this->load->view('admin/layout', $data);
				}
			}
			else
			{
				$data['estadoSelecionado'] = $condominio['EstadoID'];
				$data['cidadeSelecionada'] = $condominio['CidadeID'];
				$data['pagina'] = 'admin/condominios/inserir';
				$data['titulo'] = 'Inserir Condomínio';
				$this->recursos->setarMensagem('Erro ao cadastrar','A');
				$this->load->view('admin/layout', $data);
			}
		}
		
		public function Editar($CondominioID)
		{
			$dados = $this->condominios_model->ObterCondominio($CondominioID);

			$condominio = array(
				'Nome' => $this->input->post('txtNome'),
				'Rua' => $this->input->post('txtRua'),
				'Descricao' => $this->input->post('txtDescricao'),
				'Numero' => $this->input->post('txtNumero'),
				'CEP' => $this->input->post('txtCEP'),
				'Bairro' => $this->input->post('txtBairoo'),
				'CidadeID' => $this->input->post('ddlCidades'),
				'EstadoID' => $this->input->post('ddlEstados'),
				'ValorCondominio' => $this->input->post('txtValor')
			);
			
			$trocarImagem = $this->input->post('trocaImagem');
			
			$logmarca = $this->input->post('userfile');
			$cadastrado = TRUE;
			$mensagensErro = '';
			
			// VERIFICA SE TODOS CAMPOS OBRIGATORIOS ESTAO PRRENCHIDOS
			if ($this->form_validation->run() == FALSE)
			{
			
				// SE SELECIONADO ARQUIVO FAZER UPLOAD PARA PASTA UPLOADS/
				if($trocarImagem == 'S')
				{
					$config['upload_path'] = 'assets/img/uploads';
					$config['allowed_types'] = 'jpg|jpeg|png|gif';
	
					$this->load->library('upload', $config);
	
					if (! $this->upload->do_upload())
					{
						$mensagensErro = $this->upload->display_errors();
						$cadastrado = FALSE;
					}
					else
					{
						$dadosImagem = $this->upload->data();
						$velhaImagem = $dados->ImagemLogo;
						$novaImagem = $condominioID.'.jpg';
						$condominio['ImagemLogo'] = $novaImagem;
						
						if($velhaImagem != 'SemImagem.png')
						{
							unlink('assets/img/condominios/'.$velhaImagem);
						}
							
						$config['image_library'] = 'GD2';
						$config['source_image'] = 'assets/img/uploads/'.$dadosImagem['file_name'];
						$config['new_image'] = 'assets/img/condominios/'.$novaImagem;
						$config['maintain_ratio'] = FALSE;
						$config['width'] = 300;
						$config['height'] = 224;
		
						$this->load->library('image_lib', $config);
						
						if ( ! $this->image_lib->resize())
						{
							$mensagensErro .= $this->image_lib->display_errors();
							$cadastrado = FALSE;
						}
						else
						{
							unlink('assets/img/uploads/'.$dadosImagem['file_name']);
						}
					}	
				}
				
				// SE FOI FEITO O UPLOAD E O REDIMENSIONAMENTO CORRETO ENTAO INSERE NO BD
				if($cadastrado)
				{
					if($this->condominios_model->Alterar($condominio, $condominioID))
					{
						$this->recursos->setarMensagem('Erro ao cadastrar'. $mensagensErro,'E');
						$cadastrado = FALSE;
						$data['condominio'] = $dados;
						$data['cidadeSelecionada'] = $dados->CidadeID;
						$data['estadoSelecionado'] = $dados->EstadoID;
						$data['titulo'] = 'Alterar Condomínio';
						$data['pagina'] = 'admin/condominios/alterar';
						$this->load->view('admin/layout', $data);
					}
					else
					{
						$this->recursos->setarMensagem('Condomínio alterado com sucesso!','S');
						redirect(site_url('admin/condominios/consultar'));
					}	
				}
				else
				{
					$data['condominio'] = $dados;
					$data['cidadeSelecionada'] = $dados->CidadeID;
					$data['estadoSelecionado'] = $dados->EstadoID;
					$data['titulo'] = 'Alterar Condomínio';
					$data['pagina'] = 'admin/condominios/alterar';
					$this->recursos->setarMensagem($mensagensErro,'E');
					$this->load->view('admin/layout', $data);
				}
			}
			else
			{
				$data['condominio'] = $dados;
				$data['cidadeSelecionada'] = $condominio['CidadeID'];
				$data['estadoSelecionado'] = $condominio['EstadoID'];
				$data['titulo'] = 'Alterar Condomínio';
				$data['pagina'] = 'admin/condominios/alterar';
				$this->recursos->setarMensagem('Erro ao cadastrar!'.$mensagensErro,'E');
				$this->load->view('admin/layout', $data);
			}
		}
		
		public function Excluir($condominioID)
		{
			$imagem = $condominioID. "jpg";
			unlink('assets/img/uploads/'.$imagem);
			$this->condominios_model->Excluir($condominioID);
			$this->recursos->setarMensagem('Condomínio excluido com sucesso!','S');
			redirect(site_url('admin/condominios/consultar'));
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