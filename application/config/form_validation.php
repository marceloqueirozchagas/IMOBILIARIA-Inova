<?php
	$config = array(
		'condominios/salvar' => array(
			array(
				'field'   => 'txtNome',
				'label'   => 'Nome',
				'rules'   => 'required'
			),
			array(
				'field'   => 'txtDescricao',
				'label'   => 'Descricao',
				'rules'   => 'required'
			),
			array(
				'field'   => 'txtValor',
				'label'   => 'Valor do Condomínio',
				'rules'   => 'required|decimal'
			),
			array(
				'field'   => 'txtRua',
				'label'   => 'Rua',
				'rules'   => 'required'
			),
			array(
				'field'   => 'txtNumero',
				'label'   => 'Número',
				'rules'   => 'required|integer'
			),
			array(
				'field'   => 'txtBairro',
				'label'   => 'Bairro',
				'rules'   => 'required'
			),
			array(
				'field'   => 'ddlEstados',
				'label'   => 'Estado',
				'rules'   => 'required'
			),
			array(
				'field'   => 'ddlCidades',
				'label'   => 'Cidade',
				'rules'   => 'required'
			)
		),
		
		'condominios/editar' => array(
			array(
				'field'   => 'txtNome',
				'label'   => 'Nome',
				'rules'   => 'required'
			),
			array(
				'field'   => 'txtDescricao',
				'label'   => 'Descricao',
				'rules'   => 'required'
			),
			array(
				'field'   => 'txtValor',
				'label'   => 'Valor do Condomínio',
				'rules'   => 'required|decimal'
			),
			array(
				'field'   => 'txtRua',
				'label'   => 'Rua',
				'rules'   => 'required'
			),
			array(
				'field'   => 'txtNumero',
				'label'   => 'Número',
				'rules'   => 'required|integer'
			),
			array(
				'field'   => 'txtBairro',
				'label'   => 'Bairro',
				'rules'   => 'required'
			),
			array(
				'field'   => 'ddlEstados',
				'label'   => 'Estado',
				'rules'   => 'required'
			),
			array(
				'field'   => 'ddlCidades',
				'label'   => 'Cidade',
				'rules'   => 'required'
			)
		),
		
		'usuarios/login' => array(
			array(
				'field'   => 'txtLogin',
				'label'   => 'Usuario',
				'rules'   => 'required'
			),
			array(
				'field'   => 'txtSenha',
				'label'   => 'Senha',
				'rules'   => 'required'
			)
		),
		
		'imoveis/salvar' => array(
			array(
				'field'   => 'txtTitulo',
				'label'   => 'Titulo',
				'rules'   => 'required'
			),
			array(
				'field'   => 'txtValorImovel',
				'label'   => 'Valor do Imóvel',
				'rules'   => 'required'
			),
			array(
				'field'   => 'txtAreaTotal',
				'label'   => 'Area Total',
				'rules'   => 'required'
			),
			array(
				'field'   => 'txtAreaConstruida',
				'label'   => 'Área Construída',
				'rules'   => 'required'
			),
			array(
				'field'   => 'txtRua',
				'label'   => 'Rua',
				'rules'   => 'required'
			),
			array(
				'field'   => 'txtNumero',
				'label'   => 'Número',
				'rules'   => 'required'
			),
			array(
				'field'   => 'txtBairro',
				'label'   => 'Bairro',
				'rules'   => 'required'
			),
			array(
				'field'   => 'txtDescricao',
				'label'   => 'Descricao',
				'rules'   => 'required'
			),
			array(
				'field'   => 'txtObservacoes',
				'label'   => 'Observação',
				'rules'   => 'required'
			),
			array(
				'field'   => 'ckbDescricao',
				'label'   => 'ckbDescricao',
				'rules'   => 'required'
			),
			array(
				'field'   => 'inputDescricao[]',
				'label'   => 'inputDescricao'

			),
			array(
				'field'   => 'txtCEP',
				'label'   => 'CEP',
				'rules'   => 'required'
			),
			array(
				'field'   => 'ddlEstados',
				'label'   => 'Estado',
				'rules'   => 'is_natural'
			),
			array(
				'field'   => 'ddlCidades',
				'label'   => 'Cidade',
				'rules'   => 'is_natural'
			),
			array(
				'field'   => 'ddlTipo',
				'label'   => 'Tipo',
				'rules'   => 'alpha'
			),
			array(
				'field'   => 'ddlFinalidade',
				'label'   => 'Finalidade',
				'rules'   => 'is_natural'
			)
		)
		
			
	);
?>