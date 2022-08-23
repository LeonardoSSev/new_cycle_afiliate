<?php function tStr($string){
	return addslashes(htmlentities(utf8_decode(trim($string))));
}
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/
//////////////////// FUNÇÕES ///////////////////////////

	function renderizaHeader($app, $usuario, $mensagem, $notificacao, $cmensagem, $cnotificacao, $fotos,$termos){
		
		$param = array("titulo"=>$app->site_titulo, 
					   "pagina" => "header",
					   "header" => array(
						"titulo" => 'Sistema Administer',
						"usuario" => $usuario,
						"mensagens" => $mensagem,
						"notificacao" => $notificacao,
						"cmensagem" => $cmensagem,
						"cnotificacao" => $cnotificacao,
						"fotos" => $fotos,
						"termos" => $termos
					   ));
						 
		$app->loadView("Header",$param);
	}

	function renderizaMenu($app, $nivel, $usuario, $fotos, $pegaadmin, $pegagraduacao, $pegarpermissao, $ativacao,$pegafase){
		
			
		$param = array("titulo"=>$app->site_titulo, 
					   "pagina" => "menu",
					   "menu" => array(
						"nivel" => $nivel,
						"usuario" => $usuario,
						"fotos" => $fotos,
						"liberarsaldo" => $pegarpermissao,
						"ativacao" => $ativacao,
						"pegafase" => $pegafase
					   ));
						 
		$app->loadView("Menus",$param);
	}

	function renderizaManutencao($app, $descricao){
		
		$param = array("titulo"=>$app->site_titulo, 
					   "pagina" => "manutencao",
					   "manutencao" => array(
						"descricao" => $descricao
					   ));
						 
		$app->loadView("Manutencao",$param);
	}

	function renderizaEsqueceu($app,$recaptcha){
		
		$param = array("titulo"=>$app->site_titulo, 
					   "pagina" => "esqueceu",
					   "esqueceu" => array(
						"nivel" => "",
						"sitekey" => $recaptcha['motivo']
					   ));
						 
		$app->loadView("Esqueceu",$param);
	}

	function renderizaRecuperar($app,$recaptcha){
		
		$param = array("titulo"=>$app->site_titulo, 
					   "pagina" => "recuperar",
					   "recuperar" => array(
						"nivel" => "",
						"sitekey" => $recaptcha['motivo']
					   ));
						 
		$app->loadView("Recuperar",$param);
	}

	function renderizaHomeInicial($app,  $diretos, $diretosp, $totalusuarios, $saldo,$saldob,$criarreentrada,$ativacao,$linkpatrocinador,
	$pagamentospendentes,$pagamentosareceber,$habilitar, $naoestanarede, $pegaexpirado,$pegareentrada,$esperar, $ultimoativo, $ultimocadastro,$qtdereentrada){

	

		$param = array("titulo"=>$app->site_titulo, 
					   "pagina" => "home",
					   "dados" => array(
						"diretos" => $diretos,
						"diretosp" => $diretosp,
						"totalusuarios" => $totalusuarios,
						"saldo" => $saldo,
						"saldobloqueado" => $saldob,
						"criarrentrada" => $criarreentrada,
						"ativacao" => $ativacao,
						"linkpatrocinador" => $linkpatrocinador,
						"pagamentospendentes" => $pagamentospendentes,
						"pagamentosareceber" => $pagamentosareceber,
						"habilitar" => $habilitar,
						"naoestanarede" => $naoestanarede,
						"pegaexpirado" => $pegaexpirado,
						"pegareentrada" => $pegareentrada,
						"esperar" => $esperar,
						"ultimoativo" => $ultimoativo,
						"ultimocadastro" => $ultimocadastro,
						"qtdereentrada" => $qtdereentrada
						
					   )
					   );
						 
		$app->loadView("Home",$param);
	}

	function renderizaAdmCadastros($app){
		
		$param = array("titulo"=>$app->site_titulo, 
					   "pagina" => "cadastros",
					   "vercadastros" => array(
						"cadastros" => ""
					   ));
						 
		$app->loadView("Admcadastros",$param);
	}

	function renderizaAdmRelatorios($app,  $investimentos,$reinvestimentos,$geral){
		
		$param = array("titulo"=>$app->site_titulo, 
					   "pagina" => "relatorios",
					   "admrelatorios" => array(
						"investimentos" => $investimentos,
						"reinvestimentos" => $reinvestimentos,
						"totalgeral" => $geral
					   )
					   );
						 
		$app->loadView("Admrelatorios",$param);
	}

	function renderizaLogin($app,$recaptcha){
		$param = array("titulo"=>$app->site_titulo,
						"pagina" => "login",
						"recaptcha" => array(
							"sitekey" => $recaptcha['motivo'],
							"secret" => $recaptcha['chaveapi']
						));

		$app->loadView("Login",$param);
		
	}



	function renderizaMandarDocumentos($app, $documentos){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "documentos",
				   "verdocumentos" => array(
				   "documentos" => $documentos
				   ));
						 
				$app->loadView("Mandardocumentos",$param);
	}

	function renderizaAdmUsuarios($app, $usuarios,$alocar){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "admusuarios",
				   "veradmusuarios" => array(
				   "admusuarios" => $usuarios,
				   "alocar" => $alocar
				   ));
						 
				$app->loadView("Admusuarios",$param);
	}

	function renderizaAdmUsuariosAtivos($app, $usuarios){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "admusuariosa",
				   "veradmusuariosa" => array(
				   "admusuariosa" => $usuarios
				   ));
						 
				$app->loadView("Admusuariospagos",$param);
	}

	function renderizaAdmUsuariosPendentes($app, $usuarios){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "admusuariosp",
				   "veradmusuariosp" => array(
				   "admusuariosp" => $usuarios
				   ));
						 
				$app->loadView("Admusuariospendentes",$param);
	}

	function renderizaAdmaddSaldoBloqueado($app, $usuarios){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "admusuarios",
				   "veradmusuarios" => array(
				   "admusuarios" => $usuarios
				   ));
						 
				$app->loadView("Admaddsaldobloqueado",$param);
	}

	function renderizaAdmUsuariosInvestimentos($app, $usuarios){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "admusuarios",
				   "veradmusuarios" => array(
				   "admusuarios" => $usuarios
				   ));
						 
				$app->loadView("AdmusuariosInvestimentos",$param);
	}

	function renderizaConfiguracoes($app, $config1, $config2, $config3, $config4, $config5, $config6, $config7, $config8, $config9,$config10,$config11,$config12,$config13,$config14,$config16,$config17,$config18,$config19,$config20){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "configuracoes",
				   "verconfiguracoes" => array(
				   "ciclo1" => $config1,
				   "ciclo2" => $config2,
				   "ciclo3" => $config3,
				   "ciclo4" => $config4,
				   "ciclo5" => $config5,
				   "ciclo6" => $config6,
				   "ciclo7" => $config7,
				   "ciclo8" => $config8,
				   "ciclo9" => $config19,
				   "ciclo10" => $config20,
				   "patrocinador" => $config9,
				   "linkpatrocinador" => $config10,
				   "reentradas" => $config11,
				   "criarreentradas" => $config12,
				   "manutencao" => $config13,
				   "bloqueio" => $config14,
				   "email" => $config16,
				   "mibank" => $config17,
				   "gerarpagamento" => $config18
				   ));
						 
				$app->loadView("Configuracoes",$param);
	}

	function renderizaComprovantes($app, $documentos, $mibank){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "documentos",
				   "verdocumentos" => array(
				   "documentos" => $documentos,
				   "mibank" => $mibank
				   ));
						 
				$app->loadView("Enviarcomprovante",$param);
	}
	
	function renderizaComprovantesb($app, $documentos, $mibank){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "documentos",
				   "verdocumentos" => array(
				   "documentos" => $documentos,
				   "mibank" => $mibank
				   ));
						 
				$app->loadView("Enviarcomprovantenewpay",$param);
	}

	function renderizaComprovantesc($app, $documentos, $mibank){
		
		$param = array("titulo"=>$app->site_titulo, 
		   "pagina" => "documentos",
		   "verdocumentos" => array(
		   "documentos" => $documentos,
		   "mibank" => $mibank
		   ));
				 
		$app->loadView("Enviarcomprovantebankon",$param);
}

	function renderizaMinhasDoacoes($app, $minhasdoacoes){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "minhasdoacoes",
				   "verminhasdoacoes" => array(
				   "minhasdoacoes" => $minhasdoacoes
				   ));
						 
				$app->loadView("Minhasdoacoes",$param);
	}

	function renderizaQueroInvestir($app, $queroinvestir){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "queroinvestir",
				   "verqueroinvestir" => array(
				   "queroinvestir" => $queroinvestir
				   ));
						 
				$app->loadView("Queroinvestir",$param);
	}

	function renderizaAdmComprovantes($app, $documentos){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "documentos",
				   "verdocumentos" => array(
				   "documentos" => $documentos
				   ));
						 
				$app->loadView("Vercomprovante",$param);
	}

	function renderizaFinancas($app, $financas){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "financas",
				   "verfinancas" => array(
				   "financas" => $financas
				   ));
						 
				$app->loadView("Financas",$param);
	}

	function renderizaAdmFinancas($app, $financas){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "financas",
				   "verfinancas" => array(
				   "financas" => $financas
				   ));
						 
				$app->loadView("Admfinancas",$param);
	}

	function renderizaFaturasPendentes($app, $faturasp){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "faturasp",
				   "verfaturas" => array(
				   "faturasp" => $faturasp
				   ));
						 
				$app->loadView("Faturaspendentes",$param);
	}

	function renderizaAdmFaturasPendentes($app, $faturasp){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "faturasp",
				   "verfaturas" => array(
				   "faturasp" => $faturasp
				   ));
						 
				$app->loadView("Admfaturaspendentes",$param);
	}

	function renderizaFaturasPagas($app, $faturas){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "faturas",
				   "verfaturas" => array(
				   "faturas" => $faturas
				   ));
						 
				$app->loadView("Faturaspagas",$param);
	}

	function renderizaAdmFaturasPagas($app, $faturas){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "faturas",
				   "verfaturas" => array(
				   "faturas" => $faturas
				   ));
						 
				$app->loadView("Admfaturaspagas",$param);
	}

	function renderizaDiretosPendentes($app, $diretosp){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "diretosp",
				   "verdiretos" => array(
				   "diretosp" => $diretosp
				   ));
						 
				$app->loadView("Diretosp",$param);
	}

	function renderizaDiretosAtivos($app, $diretos){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "diretos",
				   "verdiretos" => array(
				   "diretos" => $diretos
				   ));
						 
				$app->loadView("Diretos",$param);
	}

	function renderizaDados($app, $dados){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "editardados",
				   "verdados" => array(
				   "dados" => $dados
				   ));
						 
				$app->loadView("Dadospessoais",$param);
	}

	function renderizaAdmListaPlanos($app, $listaplanos){
		
		$param = array("titulo"=>$app->site_titulo, 
		   "pagina" => "listaplanos",
		   "veradmlistaplanos" => array(
		   "admlistaplanos" => $listaplanos
		   ));
				 
		$app->loadView("Admlistaplanos",$param);
	}

	function renderizaAdmEditarPlanos($app, $listaplanos){
		
		$param = array("titulo"=>$app->site_titulo, 
		   "pagina" => "editarplanos",
		   "veradmeditarplanos" => array(
		   "admeditarplanos" => $listaplanos
		   ));
				 
		$app->loadView("Admeditarplanos",$param);
	}

	function renderizaAdmCadastrarPlanos($app){
		
		$param = array("titulo"=>$app->site_titulo, 
		   "pagina" => "editarplanos",
		   "veradcadastrarplanos" => array(
		   "admcadastrarplanos" => ''
		   ));
				 
		$app->loadView("Admcadastrarplanos",$param);
	}

	function renderizaListaPlanos($app, $listaplanos){
		
		$param = array("titulo"=>$app->site_titulo, 
		   "pagina" => "listaplanos",
		   "verlistaplanos" => array(
		   "listaplanos" => $listaplanos
		   ));
				 
		$app->loadView("Listaplanos",$param);
	}

	function renderizaCompraPlanos($app, $listaplanos){
		
		$param = array("titulo"=>$app->site_titulo, 
		   "pagina" => "compraplanos",
		   "vercompraplanos" => array(
		   "compraplanos" => $listaplanos
		   ));
				 
		$app->loadView("Compraplanos",$param);
	}

	function renderizaAdmDados($app, $dados){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "admeditardados",
				   "verdados" => array(
				   "dados" => $dados
				   ));
						 
				$app->loadView("Admeditardados",$param);
	}

	function renderizaAdmDadosBancarios($app, $dadosbancarios){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "admdadosbancarios",
				   "veradmdadosbancarios" => array(
				   "admdadosbancarios" => $dadosbancarios
				   ));
						 
				$app->loadView("Admlistabancaria",$param);
	}

	

	function renderizaDadosBancarios($app, $picpay){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "editardadosbancarios",
				   "verdadosbancarios" => array(
				   "dadosbancarios" => $picpay
				   ));
						 
				$app->loadView("Listadadosbancarios",$param);
	}

	function renderizaVerDadosBancarios($app, $dadosbancarios){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "editardadosbancarios",
				   "verdadosbancarios" => array(
				   "dadosbancarios" => $dadosbancarios
				   ));
						 
				$app->loadView("Verdadosbancarios",$param);
	}

	function renderizaEditarDadosBancarios($app, $editardadosbancarios){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "editardadosbancarios",
				   "vereditardadosbancarios" => array(
				   "editardadosbancarios" => $editardadosbancarios
				   ));
						 
				$app->loadView("editardadosbancarios",$param);
	}

	function renderizaAdmEditarDadosBancarios($app, $editardadosbancarios){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "editardadosbancarios",
				   "vereditardadosbancarios" => array(
				   "editardadosbancarios" => $editardadosbancarios
				   ));
						 
				$app->loadView("Admeditardadosbancarios",$param);
	}

	function renderizaAdicionarDadosBancarios($app, $adicionardadosbancarios){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "adicionardadosbancarios",
				   "veradicionardadosbancarios" => array(
				   "adicionardadosbancarios" => $adicionardadosbancarios
				   ));
						 
				$app->loadView("adddadosbancarios",$param);
	}

	function renderizaAdmAdicionarDadosBancarios($app, $adicionardadosbancarios){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "adicionardadosbancarios",
				   "veradicionardadosbancarios" => array(
				   "adicionardadosbancarios" => $adicionardadosbancarios
				   ));
						 
				$app->loadView("Admadddadosbancarios",$param);
	}

	

	function renderizaAbrirTicket($app){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "listamensagem",
				   "verlistamensagem" => array(
				   "listamensagem" => ''
				   ));
						 
				$app->loadView("Mandarmensagem",$param);
	}

	function renderizaMeusTickets($app, $listamensagem){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "listamensagem",
				   "verlistamensagem" => array(
				   "listamensagem" => $listamensagem
				   ));
						 
				$app->loadView("Mensagemrecebida",$param);
	}

	function renderizaMeusTicketsEnviados($app, $listamensagem){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "listamensagem",
				   "verlistamensagem" => array(
				   "listamensagem" => $listamensagem
				   ));
						 
				$app->loadView("Mensagemenviada",$param);
	}

	function renderizaMeusTicketsnotificacao($app, $listamensagem){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "listamensagem",
				   "verlistamensagem" => array(
				   "listamensagem" => $listamensagem
				   ));
						 
				$app->loadView("MeusTicketsnotificacao",$param);
	}

	function renderizaVerMensagem($app, $vermensagem){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "vermensagem",
				   "ververmensagem" => array(
				   "vermensagem" => $vermensagem
				   ));
						 
				$app->loadView("Vermensagem",$param);
	}

	function renderizaAdmVerMensagem($app, $admvermensagem){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "admvermensagem",
				   "veradmvermensagem" => array(
				   "admvermensagem" => $admvermensagem
				   ));
						 
				$app->loadView("Admvermensagem",$param);
	}

	function renderizaAdmmandarmensagem($app, $admusuario){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "admvermensagem",
				   "veradmvermensagem" => array(
				   "usuarios" => $admusuario
				   ));
						 
				$app->loadView("Admmandarmensagem",$param);
	}

	function renderizaAdmmandaremail($app, $admusuario){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "admveremail",
				   "veradmveremail" => array(
				   "usuarios" => $admusuario
				   ));
						 
				$app->loadView("Admmandaremail",$param);
	}

	function renderizaSenha($app){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "editarsenha",
				   "versenha" => array(
				   "senha" => $senha
				   ));
						 
				$app->loadView("Editarsenha",$param);
	}

	function renderizaAdmSenha($app){
		
		$param = array("titulo"=>$app->site_titulo, 
		   "pagina" => "admeditarsenha",
		   "veradmsenha" => array(
		   "admsenha" => $senha
		   ));
				 
		$app->loadView("Admeditarsenha",$param);
}

	function renderizaSenhaFinanceira($app){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "editarsenhafinanceira",
				   "versenhafinanceira" => array(
				   "senhafinanceira" => $senhafinanceira
				   ));
						 
				$app->loadView("Editarsenhafinanceira",$param);
	}

	function renderizaAdicionarAnuncios($app){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "adicionaranuncios",
				   "veradicionaranuncios" => array(
				   "adicionaranuncios" => '1'
				   ));
						 
				$app->loadView("Adicionaranuncios",$param);
	}

	function renderizaAnunciosPendentes($app,$pegaanuncios){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "anunciospendentes",
				   "veranunciospendentes" => array(
				   "anunciospendentes" => $pegaanuncios
				   ));
						 
				$app->loadView("Anunciospendentes",$param);
	}

	function renderizaAnunciosAtivos($app,$pegaanuncios){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "anunciosativos",
				   "veranunciosativos" => array(
				   "anunciosativos" => $pegaanuncios
				   ));
						 
				$app->loadView("Anunciosativos",$param);
	}

	function renderizaAnunciosExpirados($app,$pegaanuncios){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "anunciosexpirados",
				   "veranunciosexpirados" => array(
				   "anunciosexpirados" => $pegaanuncios
				   ));
						 
				$app->loadView("Anunciosexpirados",$param);
	}

	function renderizaCuponsPendentes($app,$pegacupom){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "cuponspendentes",
				   "vercuponspendentes" => array(
				   "cuponspendentes" => $pegacupom
				   ));
						 
				$app->loadView("Cuponspendentes",$param);
	}

	function renderizaCuponsAtivos($app,$pegacupom){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "cuponsativos",
				   "vercuponsativos" => array(
				   "cuponsativos" => $pegacupom
				   ));
						 
				$app->loadView("Cuponsativos",$param);
	}

	function renderizaCuponsExpirados($app,$pegacupom){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "cuponsexpirados",
				   "vercuponsexpirados" => array(
				   "cuponsexpirados" => $pegacupom
				   ));
						 
				$app->loadView("Cuponsexpirados",$param);
	}

	function renderizaPedidosPendentes($app,$pegapedidos){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "pedidospendentes",
				   "verpedidospendentes" => array(
				   "pedidospendentes" => $pegapedidos
				   ));
						 
				$app->loadView("Pedidospendentes",$param);
	}

	function renderizaPedidosAtivos($app,$pegapedidos){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "pedidosativos",
				   "verpedidosativos" => array(
				   "pedidosativos" => $pegapedidos
				   ));
						 
				$app->loadView("Pedidosativos",$param);
	}

	function renderizaPedidosExpirados($app,$pegapedidos){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "pedidosexpirados",
				   "verpedidosexpirados" => array(
				   "pedidosexpirados" => $pegapedidos
				   ));
						 
				$app->loadView("Pedidosexpirados",$param);
	}

	function renderizaSaquesPendentes($app,$saquespendentes){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "saquespendentes",
				   "versaquespendentes" => array(
				   "saquespendentes" => $saquespendentes
				   ));
						 
				$app->loadView("Saquespendentes",$param);
	}

	function renderizaSaquesAtivos($app,$saquesativos){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "saquesativos",
				   "versaquesativos" => array(
				   "saquesativos" => $saquesativos
				   ));
						 
				$app->loadView("Saquespagos",$param);
	}

	function renderizaAdmCreditoDebito($app,$usuarios){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "creditodebito",
				   "vercreditodebito" => array(
				   "usuarios" => $usuarios
				   ));
						 
				$app->loadView("Admcreditodebito",$param);
	}

	function renderizaReinvestimento($app,$saldo){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "reinvestimento",
				   "verreinvestimento" => array(
				   "saldo" => $saldo
				   ));
						 
				$app->loadView("Reinvestimento",$param);
	}

	function renderizaInvestir($app){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "investimento",
				   "verinvestimento" => array(
				   "investir" => ''
				   ));
						 
				$app->loadView("Investir",$param);
	}

	function renderizaAdmReinvestimentos($app,$saldo){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "reinvestimento",
				   "verreinvestimento" => array(
				   "saldo" => $saldo
				   ));
						 
				$app->loadView("Admreinvestimento",$param);
	}

	function renderizaAdmCadastrarInvestimentos($app,$usuarios){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "investimento",
				   "verinvestimento" => array(
				   "usuario" => $usuarios
				   ));
						 
				$app->loadView("Admcadastrarinvestimento",$param);
	}

	function renderizaCadastrarUsuario($app){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "investimento",
				   "verinvestimento" => array(
				   "usuario" => $usuarios
				   ));
						 
				$app->loadView("Admcadastrarusuario",$param);
	}

	function renderizaAdmInvestimentos($app,$saldo){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "investimento",
				   "verinvestimento" => array(
				   "saldo" => $saldo
				   ));
						 
				$app->loadView("Adminvestimento",$param);
	}

	function renderizaAdmSaquesPendentes($app,$saquespendentes){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "saquespendentes",
				   "versaquespendentes" => array(
				   "saquespendentes" => $saquespendentes
				   ));
						 
				$app->loadView("Admsaquespendentes",$param);
	}

	function renderizaAdmSaquesAtivos($app,$saquesativos){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "saquesativos",
				   "versaquesativos" => array(
				   "saquesativos" => $saquesativos
				   ));
						 
				$app->loadView("Admsaquespagos",$param);
	}

	function renderizaAdmListaDocumentos($app,$listadocumentos){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "listadocumentos",
				   "verlistadocumentos" => array(
				   "listadocumentos" => $listadocumentos
				   ));
						 
				$app->loadView("Admlistadocumentos",$param);
	}

	function renderizaAdmListaMensagem($app,$listamensagem){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "listamensagem",
				   "verlistamensagem" => array(
				   "listamensagem" => $listamensagem
				   ));
						 
				$app->loadView("Admlistamensagem",$param);
	}

	function renderizaAdmVerDocumentos($app,$listadocumentos){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "verdocumentos",
				   "ververdocumentos" => array(
				   "verdocumentos" => $listadocumentos
				   ));
						 
				$app->loadView("Aprovardoc",$param);
	}

	function renderizaFotos($app,$fotos){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "fotos",
				   "verfotos" => array(
				   "fotos" => $fotos
				   ));
						 
				$app->loadView("Minhasfotos",$param);
	}

	function renderizaPedirSaque($app,$acao, $pedirsaque){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "pedirsaque",
				   "verpedirsaque" => array(
				   "acao" => $acao,
				   "pedirsaque" => $pedirsaque
				   ));
						 
				$app->loadView("Pedirsaque",$param);
	}

	function renderizaEditarAnuncios($app, $editaranuncios){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "editaranuncios",
				   "vereditaranuncios" => array(
				   "editaranuncios" => $editaranuncios
				   ));
						 
				$app->loadView("Editaranuncios",$param);
	}



	function renderizaListaCompartilhamentos($app, $listacompartilhamentos){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "listacompartilhamentos",
				   "verlistacompartilhamentos" => array(
				   "listacompartilhamentos" => $listacompartilhamentos
				   ));
						 
				$app->loadView("ListaCompartilhamentos",$param);
	}

	function renderizaListaComprovantes($app, $listacomprovantes){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "listacomprovantes",
				   "verlistacomprovantes" => array(
				   "listacomprovantes" => $listacomprovantes
				   ));
						 
				$app->loadView("Listacomprovantes",$param);
	}

	function renderizaListaComprovantesPendentes($app, $listacomprovantesp){
		
		$param = array("titulo"=>$app->site_titulo, 
		   "pagina" => "listacomprovantes",
		   "verlistacomprovantesp" => array(
		   "listacomprovantesp" => $listacomprovantesp
		   ));
				 
		$app->loadView("Comprovantespendentes",$param);
	}

	function renderizaListaComprovantesAprovados($app, $listacomprovantes){
		
		$param = array("titulo"=>$app->site_titulo, 
		   "pagina" => "listacomprovantes",
		   "verlistacomprovantes" => array(
		   "listacomprovantes" => $listacomprovantes
		   ));
				 
		$app->loadView("Comprovantesaprovados",$param);
	}

	function renderizaLoja($app, $loja){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "loja",
				   "verloja" => array(
				   "loja" => $loja
				   ));
						 
				$app->loadView("Loja",$param);
	}

	function renderizaAdicionarCompartilhamentos($app){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "adicionarcompartilhamentos",
				   "veradicionarcompartilhamentos" => array(
				   "adicionarcompartilhamentos" => ''
				   ));
						 
				$app->loadView("Adicionarcompartilhamentos",$param);
	}

	function renderizaCompartilhamentosAtivos($app,$compartilhamentosativos){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "compartilhamentosativos",
				   "vercompartilhamentosativos" => array(
				   "compartilhamentosativos" => $compartilhamentosativos
				   ));
						 
				$app->loadView("Compartilhamentosativos",$param);
	}

	function renderizaCompartilhamentosExpirados($app,$compartilhamentosexpirados){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "compartilhamentosexpirados",
				   "vercompartilhamentosexpirados" => array(
				   "compartilhamentosexpirados" => $compartilhamentosexpirados
				   ));
						 
				$app->loadView("Compartilhamentosexpirados",$param);
	}

	function renderizaCompartilhamentosPendentes($app,$compartilhamentospendentes){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "compartilhamentospendentes",
				   "vercompartilhamentospendentes" => array(
				   "compartilhamentospendentes" => $compartilhamentospendentes
				   ));
						 
				$app->loadView("Compartilhamentospendentes",$param);
	}

	function renderizaCompartilhamentosAnalise($app,$compartilhamentosanalise){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "compartilhamentosanalise",
				   "vercompartilhamentosanalise" => array(
				   "compartilhamentosanalise" => $compartilhamentosanalise
				   ));
						 
				$app->loadView("Compartilhamentosanalise",$param);
	}

	function renderizaCompartilhamentosIndicacao($app,$compartilhamentosindicacao){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "compartilhamentosindicacao",
				   "vercompartilhamentosindicacao" => array(
				   "compartilhamentosindicacao" => $compartilhamentosindicacao
				   ));
						 
				$app->loadView("Compartilhamentosindicacao",$param);
	}

	function renderizaAtivarCompartilhamentos($app,$ativarcompartilhamentos){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "ativarcompartilhamentos",
				   "verativarcompartilhamentos" => array(
				   "ativarcompartilhamentos" => $ativarcompartilhamentos
				   ));
						 
				$app->loadView("Ativarcompartilhamento",$param);
	}


	function renderizaLiberarSaldo($app,$usuarios){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "liberarsaldo",
				   "verliberarsaldo" => array(
				   "usuarios" => $usuarios
				   ));
						 
				$app->loadView("Admliberarsaldo",$param);
	}

	function renderizaAdmLiberaSaldoBloqueado($app,$saldobloqueado){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "liberarsaldo",
				   "verliberarsaldo" => array(
				   "saldobloqueado" => $saldobloqueado
				   ));
						 
				$app->loadView("Admliberasaldobloqueado",$param);
	}

	function renderizaTravas($app,$trava){
		
				$param = array("titulo"=>$app->site_titulo, 
				   "pagina" => "travas",
				   "vertravas" => array(
				   "travas" => $trava
				   ));
						 
				$app->loadView("Trava",$param);
	}

	function renderizaAdmCiclo1($app,$ciclos1){
		
		$param = array("titulo"=>$app->site_titulo, 
		   "pagina" => "ciclos1",
		   "verciclos1" => array(
		   "ciclos1" => $ciclos1
		   ));
				 
		$app->loadView("Admciclos1",$param);
	}

	function renderizaAdmCiclo2($app,$ciclos2){
		
		$param = array("titulo"=>$app->site_titulo, 
		   "pagina" => "ciclos2",
		   "verciclos2" => array(
		   "ciclos2" => $ciclos2
		   ));
				 
		$app->loadView("Admciclos2",$param);
	}

	function renderizaAdmCiclo3($app,$ciclos3){
		
		$param = array("titulo"=>$app->site_titulo, 
		   "pagina" => "ciclos3",
		   "verciclos3" => array(
		   "ciclos3" => $ciclos3
		   ));
				 
		$app->loadView("Admciclos3",$param);
	}
	
	function renderizaAdmCiclo4($app,$ciclos4){
		
		$param = array("titulo"=>$app->site_titulo, 
		   "pagina" => "ciclos4",
		   "verciclos4" => array(
		   "ciclos4" => $ciclos4
		   ));
				 
		$app->loadView("Admciclos4",$param);
	}
	
	function renderizaAdmCiclo5($app,$ciclos5){
		
		$param = array("titulo"=>$app->site_titulo, 
		   "pagina" => "ciclos5",
		   "verciclos5" => array(
		   "ciclos5" => $ciclos5
		   ));
				 
		$app->loadView("Admciclos5",$param);
	}
	
	function renderizaAdmCiclo6($app,$ciclos6){
		
		$param = array("titulo"=>$app->site_titulo, 
		   "pagina" => "ciclos6",
		   "verciclos6" => array(
		   "ciclos6" => $ciclos6
		   ));
				 
		$app->loadView("Admciclos6",$param);
	}
	
	function renderizaAdmCiclo7($app,$ciclos7){
		
		$param = array("titulo"=>$app->site_titulo, 
		   "pagina" => "ciclos7",
		   "verciclos7" => array(
		   "ciclos7" => $ciclos7
		   ));
				 
		$app->loadView("Admciclos7",$param);
	}
	
	function renderizaAdmCiclo8($app,$ciclos8){
		
		$param = array("titulo"=>$app->site_titulo, 
		   "pagina" => "ciclos8",
		   "verciclos8" => array(
		   "ciclos8" => $ciclos3
		   ));
				 
		$app->loadView("Admciclos8",$param);
	}
	
	function renderizaAdmCiclo9($app,$ciclos9){
		
		$param = array("titulo"=>$app->site_titulo, 
		   "pagina" => "ciclos9",
		   "verciclos9" => array(
		   "ciclos9" => $ciclos9
		   ));
				 
		$app->loadView("Admciclos9",$param);
	}
	
	function renderizaAdmCiclo10($app,$ciclos10){
		
		$param = array("titulo"=>$app->site_titulo, 
		   "pagina" => "ciclos10",
		   "verciclos10" => array(
		   "ciclos10" => $ciclos10
		   ));
				 
		$app->loadView("Admciclos10",$param);
	}

	function renderizaCiclo1($app,$ciclos1){
		
		$param = array("titulo"=>$app->site_titulo, 
		   "pagina" => "ciclos1",
		   "verciclos1" => array(
		   "ciclos1" => $ciclos1
		   ));
				 
		$app->loadView("ciclos1",$param);
	}

	function renderizaCiclo2($app,$ciclos2){
		
		$param = array("titulo"=>$app->site_titulo, 
		   "pagina" => "ciclos2",
		   "verciclos2" => array(
		   "ciclos2" => $ciclos2
		   ));
				 
		$app->loadView("ciclos2",$param);
	}

	function renderizaCiclo3($app,$ciclos3){
		
		$param = array("titulo"=>$app->site_titulo, 
		   "pagina" => "ciclos3",
		   "verciclos3" => array(
		   "ciclos3" => $ciclos3
		   ));
				 
		$app->loadView("ciclos3",$param);
	}

	function renderizaCiclo4($app,$ciclos4){
		
		$param = array("titulo"=>$app->site_titulo, 
		   "pagina" => "ciclos4",
		   "verciclos4" => array(
		   "ciclos4" => $ciclos4
		   ));
				 
		$app->loadView("ciclos4",$param);
	}

	function renderizaCiclo5($app,$ciclos5){
		
		$param = array("titulo"=>$app->site_titulo, 
		   "pagina" => "ciclos5",
		   "verciclos5" => array(
		   "ciclos5" => $ciclos5
		   ));
				 
		$app->loadView("ciclos5",$param);
	}

	function renderizaCiclo6($app,$ciclos6){
		
		$param = array("titulo"=>$app->site_titulo, 
		   "pagina" => "ciclos6",
		   "verciclos6" => array(
		   "ciclos6" => $ciclos6
		   ));
				 
		$app->loadView("ciclos6",$param);
	}

	function renderizaCiclo7($app,$ciclos7){
		
		$param = array("titulo"=>$app->site_titulo, 
		   "pagina" => "ciclos7",
		   "verciclos7" => array(
		   "ciclos7" => $ciclos7
		   ));
				 
		$app->loadView("ciclos7",$param);
	}

	function renderizaCiclo8($app,$ciclos8){
		
		$param = array("titulo"=>$app->site_titulo, 
		   "pagina" => "ciclos8",
		   "verciclos8" => array(
		   "ciclos8" => $ciclos8
		   ));
				 
		$app->loadView("ciclos8",$param);
	}
	
	function renderizaCiclo9($app,$ciclos9){
		
		$param = array("titulo"=>$app->site_titulo, 
		   "pagina" => "ciclos9",
		   "verciclos9" => array(
		   "ciclos9" => $ciclos9
		   ));
				 
		$app->loadView("ciclos9",$param);
	}
	
	function renderizaCiclo10($app,$ciclos10){
		
		$param = array("titulo"=>$app->site_titulo, 
		   "pagina" => "ciclos10",
		   "verciclos10" => array(
		   "ciclos10" => $ciclos10
		   ));
				 
		$app->loadView("ciclos10",$param);
	}

	function renderizaAdmComprovantesPendentes($app, $doacoespendentes){
		
		$param = array("titulo"=>$app->site_titulo, 
		   "pagina" => "admcomprovantespendentes",
		   "veradmcomprovantespendentes" => array(
		   "admcomprovantespendentes" => $doacoespendentes
		   ));
				 
		$app->loadView("Admcomprovantespendentes",$param);
	}

	function renderizaAdmComprovantesAprovados($app, $doacoesaprovados){
			
		$param = array("titulo"=>$app->site_titulo, 
		"pagina" => "admcomprovantesaprovados",
		"veradmcomprovantesaprovados" => array(
		"admcomprovantesaprovados" => $doacoesaprovados
		));
				
		$app->loadView("Admcomprovantesaprovados",$param);
	}

	function renderizaComprovantesPendentes($app, $doacoespendentes){
		
		$param = array("titulo"=>$app->site_titulo, 
		   "pagina" => "comprovantespendentes",
		   "vercomprovantespendentes" => array(
		   "comprovantespendentes" => $doacoespendentes
		   ));
				 
		$app->loadView("Comprovantespendentes",$param);
	}

	function renderizaComprovantesAprovados($app, $doacoesaprovados){
			
		$param = array("titulo"=>$app->site_titulo, 
		"pagina" => "comprovantesaprovados",
		"vercomprovantesaprovados" => array(
		"comprovantesaprovados" => $doacoesaprovados
		));
				
		$app->loadView("Comprovantesaprovados",$param);
	}


	function renderizaDoacoesAprovados($app, $doacoesaprovados){
			
		$param = array("titulo"=>$app->site_titulo, 
		"pagina" => "doacoesaprovados",
		"verdoacoesaprovados" => array(
		"doacoesaprovados" => $doacoesaprovados
		));
				
		$app->loadView("Doacoesrecebidas",$param);
	}

	function renderizaDoacoesFeitas($app, $doacoesaprovados){
			
		$param = array("titulo"=>$app->site_titulo, 
		"pagina" => "doacoesaprovados",
		"verdoacoesaprovados" => array(
		"doacoesaprovados" => $doacoesaprovados
		));
				
		$app->loadView("Doacoesfeitas",$param);
	}

	function renderizaMeusLogins($app, $meuslogins){
			
		$param = array("titulo"=>$app->site_titulo, 
		"pagina" => "meuslogins",
		"vermeuslogins" => array(
		"meuslogins" => $meuslogins
		));
				
		$app->loadView("Meuslogins",$param);
	}

	function renderizaMeusLoginsporCPF($app, $meuslogins){
			
		$param = array("titulo"=>$app->site_titulo, 
		"pagina" => "meuslogins",
		"vermeuslogins" => array(
		"meuslogins" => $meuslogins
		));
				
		$app->loadView("Meusloginsporcpf",$param);
	}

	function renderizaLogout($app){
			
		$param = array("titulo"=>$app->site_titulo, 
		"pagina" => "meuslogins",
		"vermeuslogins" => array(
		"meuslogins" => ''
		));
				
		$app->loadView("Logout",$param);
	}
	
	function renderizaComprarVoucher($app,$pegavoucher){
			
		$param = array("titulo"=>$app->site_titulo, 
		"pagina" => "meuslogins",
		"vermeuslogins" => array(
		"pegavoucher" => $pegavoucher
		));
				
		$app->loadView("Comprarvoucher",$param);
	}
	
	function renderizaComprarVoucherb($app,$pegavoucher){
			
		$param = array("titulo"=>$app->site_titulo, 
		"pagina" => "meuslogins",
		"vermeuslogins" => array(
		"pegavoucher" => $pegavoucher
		));
				
		$app->loadView("Comprarvoucherb",$param);
	}
	
	function renderizaAtivarVoucher($app, $voucher){
			
		$param = array("titulo"=>$app->site_titulo, 
		"pagina" => "meuslogins",
		"vervoucher" => array(
		"voucher" => $voucher
		));
				
		$app->loadView("Ativarvoucher",$param);
	}
	
	function renderizaAtivarVoucherb($app, $voucher){
			
		$param = array("titulo"=>$app->site_titulo, 
		"pagina" => "meuslogins",
		"vervoucher" => array(
		"voucher" => $voucher
		));
				
		$app->loadView("Ativarvoucherb",$param);
	}
	
	function renderizaTickets($app,$tickets,$total,$respondido,$resolvido,$fechado){
			
		$param = array("titulo"=>$app->site_titulo, 
		"pagina" => "listaticket",
		"verlistaticket" => array(
		"listaticket" => $tickets,
		"total" => $total,
		"respondido" => $respondido,
		"resolvido" => $resolvido,
		"pendente" => $fechado
		));
				
		$app->loadView("Listaticket",$param);
	}

	function renderizaVerTickets($app, $verticket){
			
		$param = array("titulo"=>$app->site_titulo, 
		"pagina" => "verticket",
		"ververticket" => array(
		"verticket" => $verticket
		));
				
		$app->loadView("Verticket",$param);
	}
	
	function renderizaAdmTickets($app,$tickets,$total,$respondido,$resolvido,$fechado){
			
		$param = array("titulo"=>$app->site_titulo, 
		"pagina" => "listaticket",
		"verlistaticket" => array(
		"listaticket" => $tickets,
		"total" => $total,
		"respondido" => $respondido,
		"resolvido" => $resolvido,
		"pendente" => $fechado
		));
				
		$app->loadView("Admlistaticket",$param);
	}

	function renderizaAdmVerTickets($app,$tickets){
			
		$param = array("titulo"=>$app->site_titulo, 
		"pagina" => "verticket",
		"ververticket" => array(
		"verticket" => $tickets
		));
				
		$app->loadView("Admverticket",$param);
	}
	
	function renderizaEcommerce($app,$listaprodutos){
			
		$param = array("titulo"=>$app->site_titulo, 
		"pagina" => "verlistaprodutos",
		"verlistaprodutos" => array(
		"listaprodutos" => $listaprodutos
		));
				
		$app->loadView("Ecommerce",$param);
	}
	
	function renderizaCarrinho($app,$listaprodutos){
			
		$param = array("titulo"=>$app->site_titulo, 
		"pagina" => "vercarrinho",
		"vercarrinho" => array(
		"carrinho" => $listaprodutos
		));
				
		$app->loadView("Carrinho",$param);
	}
	
	
	
	function renderizaPedidosPagos($app, $pedidosp){
		
	$param = array("titulo"=>$app->site_titulo, 
	   "pagina" => "pedidosp",
	   "verpedidosp" => array(
	   "pedidosp" => $pedidosp
	   ));
			 
	$app->loadView("Pedidospagos",$param);
	}


	function renderizaMinhaRede($app,$minharede){

		$param = array("titulo"=>$app->site_titulo, 
	   "pagina" => "minharede",
	   "verrede" => array(
	   "rede" => $minharede
	   ));
			 
	$app->loadView("Redematriz",$param);

	}

	function renderizaMinhaRedeb($app, $redeupline){

		$param = array("titulo"=>$app->site_titulo, 
	   "pagina" => "minharede",
	   "verrede" => array(
	   "redeupline" => $redeupline
	   ));
			 
	$app->loadView("Dadosrede",$param);

	}

	function renderizaVideo($app,$video){
			
		$param = array("titulo"=>$app->site_titulo, 
		"pagina" => "verticket",
		"vervideo" => array(
		"video" => $video
		));
				
		$app->loadView("Video",$param);
	}


	function renderizaPdf($app,$tickets){
			
		$param = array("titulo"=>$app->site_titulo, 
		"pagina" => "verticket",
		"verpdf" => array(
		"pdf" => $tickets
		));
				
		$app->loadView("Pdf",$param);
	}

	


	

