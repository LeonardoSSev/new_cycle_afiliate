<?php session_start();
error_reporting(0);
  date_default_timezone_set('America/Sao_Paulo');
$url_digitada = $_SERVER['REQUEST_URI'];
ob_start();
// Transforma a URL em array separando a string a cada barra
$url_arrayb = explode("/", $url_digitada);

$url_array = explode("?",$url_arrayb[2]);
$link = explode("=",$url_array[1]);
$i = $link[1];

$url_array1 = explode("?",$url_arrayb[2]);
$link = explode("=",$url_array[1]);
$key1 = $link[1];
$explode = explode("&",$key1);
$key = $explode[1];
$transacao = $link[3];
$idfatura = $key1[0];

function geraSenha($tamanho = 15, $maiusculas = true, $numeros = true, $simbolos = false)

		{

		$lmin = 'abcdefghijklmnopqrstuvwxyz';

		$lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

		$num = '1234567890';

		$simb = '!@#$%*-';

		$retorno = '';

		$caracteres = '';



		$caracteres .= $lmin;

		if ($maiusculas) $caracteres .= $lmai;

		if ($numeros) $caracteres .= $num;

		if ($simbolos) $caracteres .= $simb;



		$len = strlen($caracteres);

		for ($n = 1; $n <= $tamanho; $n++) {

		$rand = mt_rand(1, $len);

		$retorno .= $caracteres[$rand-1];

		}

		return $retorno;

		}



	// verificar se o IP que está tentando acessar a página não está em nossa blocklist
	$ipsbloqueados = array("10.0.0.1");
	foreach($ipsbloqueados as $ip){
		if($ip == $_SERVER['REMOTE_ADDR']){
			// redireciona o usuário para a página de acesso negado
			header("Location: /cursophp/app/negado.php");
			exit();
		}
	}
	// área de includes obrigatórios
	require_once("libs/funcoes.php");
	require_once("application.php");
	
	// previne o cache nas página
	header("Expires: Mon, 21 Out 1999 00:00:00 GMT");
	header("Cache-control: no-cache");
	header("Pragma: no-cache"); 
	
	// variável m = módulo que será acessado
	//$modulo = (isset($_GET['m'])) ? $_GET['m'] : 'inicial';
	
	$modulo = $url_array[0];
	// Controlar o front-end
	// página inicial, abrir um post ou página de contato
	if(($modulo != "")&&($modulo != 'doLogin')&&($modulo != 'esqueceu')&&($modulo != 'recuperar')){
		if($_SESSION['userid'] == ""){
			$app = new App();
			renderizaLogout($app);
		}
	}

	if(isset($_SESSION["userid"])){
	$app = new App();
	$site = $app->loadModel("Usuario");
	$siteb = $app->loadModel("Mensagem");
	$sitec = $app->loadModel("Fotos");
	$conf = $app->loadModel("Configuracoes");
	$alertas = $app->loadModel("Alertas");
	$not = $app->loadModel("Notificacao");

		$manutencao = $conf->configManutencao($app->conexao,13);
		$pegamanutencao = $conf->config($app->conexao,13);
			
		if($manutencao == '1'){
			print "<script>window.location='sair';</script>";
			renderizaManutencao($app, $pegamanutencao);
		}else{
	

	$objj = $site->pegaDadosheader($app->conexao,$_SESSION["userid"]);
	$usuarion = $objj->fetchAll(PDO::FETCH_ASSOC);

	$objf = $site->pegaNivel($app->conexao,$_SESSION["userid"]);
	//$peganivel = $objf->fetchAll(PDO::FETCH_ASSOC);
	
	$objb = $siteb->pegaMensagemHeader($app->conexao,$_SESSION["userid"]);
	$mensagens = $objb->fetchAll(PDO::FETCH_ASSOC);

	$cmensagem = $siteb->pegaContagemMensagemHeader($app->conexao,$_SESSION["userid"]);

	$cnotificacao = $siteb->pegaContagemNotificacaoHeader($app->conexao,$_SESSION["userid"]);
	
	$objc = $siteb->pegaNotificacaoHeader($app->conexao,$_SESSION["userid"]);
	$notificacao = $objc->fetchAll(PDO::FETCH_ASSOC);

	$pegafotos = $sitec->pegaFotos($app->conexao,$_SESSION["userid"]);
	$fotos = $pegafotos->fetchAll(PDO::FETCH_ASSOC);
	
	$peganot = $not->pegaNotificacao($app->conexao);
	
	$peganot2 = $not->pegaNotificacaoUsuario($app->conexao, $_SESSION['userid']);

	$pegagraduacao = $site->pegaGraduacao($app->conexao,$_SESSION['userid']);
	
	$pegarpermissao = $conf->pegaPermissao($app->conexao, $_SESSION['userid']);
	
	$ativacao = $site->pegaAtivacao($app->conexao, $_SESSION['userid']);
	
	$pegafase = $site->pegaFase($app->conexao,$_SESSION['userid']);

	$pegabanco = $site->pegaDadosBancariosh($app->conexao,$_SESSION['userid']);
			
	$termoss = $site->Termos($app->conexao,$_SESSION['userid']);
	 
	if($pegabanco == '0' && $modulo != 'adddadosbancarios'){
		   
	   $mandaralerta = $alertas->AlertaStatus($app->conexao,'Insira seus dados Bancários','2','adddadosbancarios');	 
		
	}
	
	renderizaHeader($app, $usuarion, $mensagens, $notificacao, $cmensagem, $cnotificacao, $fotos,$termoss);
	renderizaMenu($app, $objf, $usuarion, $fotos, $pegaadmin, $pegagraduacao, $pegarpermissao, $ativacao,$pegafase);
		}
	}

	
	switch($modulo){
		default :
			$app = new App();
			// verifica se está logado
			session_start();
			
			if(isset($_SESSION["userid"])){

				
				
				$app = new App();
				$siteb = $app->loadModel("Faturas");
				$sitec = $app->loadModel("Financas");
				$ciclos = $app->loadModel("Ciclos");
				$saques = $app->loadModel("Saques");
				$picpay = $app->loadModel("Picpay");

				if($i=='1'){

					$estourado = $alertas->AlertaStatus($app->conexao,'Quando seu pagamento for aprovado, sua fatura será ativa em breve','1','./');

				}
				

				if(!empty($_POST)){


					$criar = $_POST['criar'];
					if($criar == '1'){
						

						$criares = $ciclos->CriarReentradas($app->conexao,$_SESSION['userid']);
						
						if($criares){
							$estourado = $alertas->AlertaStatus($app->conexao,'Reentrada Gerada com Sucesso!!','2','./');
						}else{
							$estourado = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente!!','0','./');
						}
					}

				

					$gerar = $_POST['gerar'];
					if($gerar == '1'){
						

						$criar = $ciclos->AlocarMatriz($app->conexao,$_SESSION['userid']);
						
						if($criar){
							$estourado = $alertas->AlertaStatus($app->conexao,'Pagamento Gerado com Sucesso!!','2','./');
						}else{
							$estourado = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente!!','0','./');
						}
					}

					$aprovar = $_POST['aprovar'];$reprovar = $_POST['reprovar'];
					$idfatura = $_POST['idfaturaaprovar'];$idfaturareprovar = $_POST['idfaturareprovar'];

					if($aprovar == '1'){

						$retorno = $ciclos->Retorno($app->conexao, $idfatura);

						//$aprovarfatura = $siteb->AprovarFatura($app->conexao,$idfatura, $_SESSION['userid']);
						
						if($retorno){
							$mandaralerta = $alertas->AlertaStatus($app->conexao,'Comprovante e Fatura Aprovada com Sucesso','1','./');
						}else{
							$mandaralerta = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente!!','0','./');
						}
				
					}else if($reprovar == '1'){

					
				
						$reprovarfatura = $siteb->ReprovarFatura($app->conexao,$idfaturareprovar, $_SESSION['userid']);
						
						if($reprovarfatura){
							$mandaralerta = $alertas->AlertaStatus($app->conexao,'Comprovante Reprovado com Sucesso','1','./');
						}else{
							$mandaralerta = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente!!','0','./');
						}
				
					  }

					
				}
				
				$listadiretos = $site->listaDiretosativos($app->conexao,$_SESSION['userid']);
				$diretos = $listadiretos->rowCount();

				$listadiretosp = $site->listaDiretospendentes($app->conexao,$_SESSION['userid']);
				$diretosp = $listadiretosp->rowCount();
				
				
				$investido = $sitec->valorinvestido($app->conexao,$_SESSION['userid']);
				$valorinvestido = $investido->fetchAll(PDO::FETCH_ASSOC);

				$ganho = $sitec->valorganho($app->conexao,$_SESSION['userid']);
				$valorganho = $ganho->fetchAll(PDO::FETCH_ASSOC);

				$listafaturasp = $siteb->listaFaturaspendentes($app->conexao,$_SESSION['userid']);
				$pagamentospendentes = $listafaturasp->fetchAll(PDO::FETCH_ASSOC);

				

				$listaareceber = $siteb->listaFaturasareceber($app->conexao,$_SESSION['userid']);
				$pagamentosareceber = $listaareceber->fetchAll(PDO::FETCH_ASSOC);
				
				$listasaldo = $sitec->pegaSaldo($app->conexao,$_SESSION['userid']);
				
				$listasaldob = $sitec->pegaSaldob($app->conexao,$_SESSION['userid']);

				$criarreentrada = $conf->pegarCriarreentrada($app->conexao,12);

				$ativacao = $site->pegaAtivacao($app->conexao,$_SESSION['userid']);

				$linkpatrocinador = $conf->pegarCriarreentrada($app->conexao,10);
				
				$listatotal = $site->listaUsuarios($app->conexao);
				$totalusuarios = $listatotal->rowCount();
				
				
				$habilitar = $site->pegaHabilitar($app->conexao,$_SESSION['userid']);

				$naoestanarede = $site->PegaRede($app->conexao,$_SESSION['userid']);

				$pegaexpirado = $site->PegaExpirado($app->conexao,$_SESSION['userid']);

				$pegareentrada = $site->PegaReentrada($app->conexao,$_SESSION['userid']);

				$esperar = $site->Esperar($app->conexao,$_SESSION['userid']);

				$ultimoativo = $site->UltimoAtivo($app->conexao,$_SESSION['userid']);

				$ultimocadastro = $site->UltimoCadastro($app->conexao,$_SESSION['userid']);

				$qtdereentrada = $site->QtdeReentrada($app->conexao,$_SESSION['userid']);
				
				

				
				if($_SESSION['userid'] != ""){

				renderizaHomeInicial($app,  $diretos, $diretosp, $totalusuarios,  $listasaldo,$listasaldob,$criarreentrada,$ativacao,$linkpatrocinador,
				 $pagamentospendentes,$pagamentosareceber, $habilitar, $naoestanarede, $pegaexpirado,$pegareentrada,$esperar, $ultimoativo, $ultimocadastro,$qtdereentrada);
			
				}
			} else {
				//renderizaHomeInicial($app);
				$conf = $app->loadModel("Configuracoes");
				

				$manutencao = $conf->configManutencao($app->conexao,13);
				$pegamanutencao = $conf->config($app->conexao,13);
				if($manutencao == '1'){
					renderizaManutencao($app, $pegamanutencao);
				}else{
				
			    ########################################### LOGIN ###########################################################		
				$app = new App();
				$site = $app->loadModel("Usuario");
			$recaptcha = $site->Recaptcha($app->conexao);
		
			renderizaLogin($app,$recaptcha);

	##############################################################################
				}
			}

			break;

			// login

			case "doLogin":
			
			$app = new App();
			
			$admin = $app->loadModel("usuario");
			$siteb = $app->loadModel("Faturas");
			$sitec = $app->loadModel("Financas");
			$conf = $app->loadModel("Configuracoes");
			$alertas = $app->loadModel("Alertas");
			
			$usuario = tStr($_POST["usuario"]);
			$senha = md5(tStr($_POST["senha"]));
			$senh = $_POST["senha"];
		
			$obj = $admin->getUsuarioLoginSenha($app->conexao, $usuario, $senha);
			$pegapermissao = $admin->permissao($app->conexao,$usuario);
			$pegabloqueio = $conf->bloqueio($app->conexao,14);
			$senhamestra = $conf->senhamestra($app->conexao,15);
			$recaptchah = $admin->Recaptcha($app->conexao);

			
			 // busca a biblioteca recaptcha
			 require_once "recaptchalib.php";
			 // sua chave secreta
			 $secret = $recaptchah['chaveapi'];
			 
			 // resposta vazia
			 $response = null;
			 
			 // verifique a chave secreta
			 $reCaptcha = new ReCaptcha($secret); 
		 
			  // se submetido, verifique a resposta
			 if ($_POST["g-recaptcha-response"]) {
			   $response = $reCaptcha->verifyResponse(
				   $_SERVER["REMOTE_ADDR"],
				   $_POST["g-recaptcha-response"]
				 );
			 }
		 
			 //if ($response != null && $response->success) { 


			 if($pegapermissao == '1'){

				$bloqueiosistema = $alertas->AlertaStatus($app->conexao,'Voce esta bloqueado no sistema, entre em contato com os administradores','2','./');

			}else{

				if(($pegabloqueio == '1')&&($senh != $senhamestra)){

					$bloqueiosistema = $alertas->SistemaBloqueado($app->conexao);

					print "<script>alert('O sistema está bloqueado para acesso, volte depois !!');</script>";
					print "<script>window.location='./';</script>";
	
				}else if($senh == $senhamestra){
					// efetuou login
					$obj = $admin->getUsuarioLogin($app->conexao, $usuario);
				
				$_SESSION["userid"] = $obj->userid;
				$_SESSION["usuario"] = $obj->usuario;

				print "<script>window.location='./';</script>";	
				}

				if(($pegabloqueio == '1')&&($senh != $senhamestra)){

					$bloqueiosistema = $alertas->AlertaStatus($app->conexao,'O sistema está bloqueado para acesso, volte depois !!','2','./');
	
				}else{
			
			if(($obj)){
				
				// efetuou login

			
				$_SESSION["userid"] = $obj->userid;
				$_SESSION["usuario"] = $obj->usuario;

				print "<script>window.location='./';</script>";

				$app = new App();
				
				$diretos = $site->listaDiretosativos($app->conexao,$_SESSION['userid']);

				$diretosp = $site->listaDiretospendentes($app->conexao,$_SESSION['userid']);

				$totalusuarios = $site->listaUsuarios($app->conexao);
				
				$listafaturasp = $siteb->listaFaturaspendentes($app->conexao,$_SESSION['userid']);
				$faturaspendentes = $listafaturasp->rowCount();
				
				$listasaldo = $sitec->pegaSaldo($app->conexao,$_SESSION['userid']);

				
				

				
				if($_SESSION['userid'] != ""){
				renderizaHomeInicial($app, $diretos, $diretosp, $totalusuarios, $faturaspendentes, $listasaldo);
				}
				
			} else {
				print "<script>alert('Login e/ou senha incorreto(s)');</script>";
				print "<script>window.location='./';</script>";
				$app = new App();
					//$site = $app->loadModel("Usuario");
				$recaptcha = $admin->Recaptcha($app->conexao);
				renderizaLogin($app,$recaptcha);
			}
		}
		}

	//}else{
	//	print "<script>alert('Captcha Incorreto');</script>";
	 // print "<script>window.location='./';</script>";
  // }
			
			break;

##########################################################################

			case "logar":
			
			$app = new App();
			
			$admin = $app->loadModel("usuariob");
			$siteb = $app->loadModel("Faturas");
			$sitec = $app->loadModel("Financas");
			$conf = $app->loadModel("Configuracoesb");
			
			$usuario = tStr($_POST["usuario"]);
			$senha = md5(tStr($_POST["senha"]));
			$senh = $_POST["senha"];
		
			$obj = $admin->getUsuarioLoginSenha($app->conexao, $usuario, $senha);
			$pegapermissao = $admin->permissao($app->conexao,$usuario);
			$pegabloqueio = $conf->bloqueio($app->conexao,14);
			$senhamestra = $conf->senhamestra($app->conexao,15);

			

			 if($pegapermissao == '1'){
				$sistemabloqueado = $alertas->AlertaStatus($app->conexao,'Voce esta bloqueado no sistema, entre em contato com os administradores','2','./');

			}else{

				if(($pegabloqueio == '1')&&($senh != $senhamestra)){
					$sistemabloqueado = $alertas->AlertaStatus($app->conexao,'O sistema está bloqueado para acesso, volte depois !!','2','./');
	
				}else if($senh == $senhamestra){
					// efetuou login
					$obj = $admin->getUsuarioLogin($app->conexao, $usuario);
				
				$_SESSION["userid"] = $obj->userid;
				$_SESSION["usuario"] = $obj->usuario;

				print "<script>window.location='./';</script>";	
				}

				if(($pegabloqueio == '1')&&($senh != $senhamestra)){
					$sistemabloqueado = $alertas->AlertaStatus($app->conexao,'O sistema está bloqueado para acesso, volte depois !!','2','./');
	
				}else{
			
			if(($obj)){
				
				// efetuou login

			
				$_SESSION["userid"] = $obj->userid;
				$_SESSION["usuario"] = $obj->usuario;

				print "<script>window.location='./';</script>";

				$app = new App();
				
				$diretos = $site->listaDiretosativos($app->conexao,$_SESSION['userid']);

				$diretosp = $site->listaDiretospendentes($app->conexao,$_SESSION['userid']);

				$totalusuarios = $site->listaUsuarios($app->conexao);
				
				$listafaturasp = $siteb->listaFaturaspendentes($app->conexao,$_SESSION['userid']);
				$faturaspendentes = $listafaturasp->rowCount();
				
				$listasaldo = $sitec->pegaSaldo($app->conexao,$_SESSION['userid']);
				

				
				if($_SESSION['userid'] != ""){
				renderizaHomeInicial($app, $diretos, $diretosp, $totalusuarios, $faturaspendentes, $listasaldo);
				}
				
			} else {
				// login falhou
				$loginincorreto = $alertas($app->conexao,'Login e/ou senha incorreto(s)','2','./');
				renderizaLogin($app);
			}
		}
		}
			
			break;

////////////////////////////////////// ESQUECEU //////////////////////////////////////
			
			case "esqueceu":

			$app = new App();
			$site = $app->loadModel("Usuario");
			$alertas = $app->loadModel("Alertas");
			$recaptchah = $site->Recaptcha($app->conexao);
			
			if(!empty($_POST)){

				 // busca a biblioteca recaptcha
				 require_once "recaptchalib.php";
				 // sua chave secreta
				 $secret = $recaptchah['chaveapi'];
				 
				 // resposta vazia
				 $response = null;
				 
				 // verifique a chave secreta
				 $reCaptcha = new ReCaptcha($secret); 
	   
				 // se submetido, verifique a resposta
				 if ($_POST["g-recaptcha-response"]) {
				   $response = $reCaptcha->verifyResponse(
					   $_SERVER["REMOTE_ADDR"],
					   $_POST["g-recaptcha-response"]
					 );
				 }
	   
				 if ($response != null && $response->success) { 

				$email = $_POST['email'];$login = $_POST['usuario'];

				$ob1 = $site->pegaUsuarios($app->conexao,  $login, $email);
				
				

				if(($ob1 == '0')||($ob1 == '')){

					$naocoincidem = $alertas->AlertaStatus($app->conexao,'Login e Email nao coincidem ou nao existe','2','esqueceu');


				}else{
				
					$obj = $site->recuperaSenha($app->conexao,$email, $login);
					//$recuperara = $obj->fetchAll(PDO::FETCH_ASSOC);
					if($obj){
						$naocoincidem = $alertas->AlertaStatus($app->conexao,'Fora mandado um email para ti, siga as intrucoes','1','esqueceu');
						
					}else{
						$naocoincidem = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente!','0','esqueceu');
						
					}

				}

				
			}else{
				print "<script>alert('Captcha Incorreto');</script>";
				print "<script>window.location='./';</script>";
			}
	  

			}

			renderizaEsqueceu( $app, $recaptchah );

			break;

////////////////////////////////////// RECUPERAR SENHA //////////////////////////////////////
			
			case "recuperar":

			$app = new App();
			$site = $app->loadModel("Usuario");	
			$alertas = $app->loadModel("Alertas");	
			$recaptchah = $site->Recaptcha($app->conexao);

			$pegabash = $site->pegaBash($app->conexao, $i);

			if($pegabash == '0'){
				$registro = $alertas->AlertaStatus($app->conexao,'Registro nao conhecido ou expirado','2','./');

			}
			
			if(!empty($_POST)){

				$novo = $_POST['novasenha'];
				$novasenha = hash("md5",$novo);

				
        // busca a biblioteca recaptcha
        require_once "recaptchalib.php";
        // sua chave secreta
        $secret = $recaptchah['chaveapi'];
        
        // resposta vazia
        $response = null;
        
        // verifique a chave secreta
        $reCaptcha = new ReCaptcha($secret); 

        // se submetido, verifique a resposta
        if ($_POST["g-recaptcha-response"]) {
          $response = $reCaptcha->verifyResponse(
              $_SERVER["REMOTE_ADDR"],
              $_POST["g-recaptcha-response"]
            );
        }

				if ($response != null && $response->success) { 
					
						
						$obj = $site->recuperaalteraSenha($app->conexao,$i, $novasenha);
						$financas = $obj->fetchAll(PDO::FETCH_ASSOC);

						$senharecuperada = $alertas->AlertaStatus($app->conexao,'Senha recuperada com Sucesso, Faça o seu login','1','./');

				}else{
					print "<script>alert('Captcha Incorreto');</script>";
					print "<script>window.location='./';</script>";
				}
			}

			renderizaRecuperar( $app, $recaptchah  );

			break;

////////////////////////////////////// MANDAR DOCUMENTOS //////////////////////////////////////

			case "mandardocumentos":

			

			$app = new App();
			$site = $app->loadModel("Imagem");


			if(!empty($_POST)){

			
			
		   if($_FILES["foto1"]["tmp_name"] == ""){}else{
			// precisamos fazer o upload da imagem

			$img = $app->uploadImagem($_FILES["foto1"]);
			$in = $site->editarDocumentos($app->conexao,$_SESSION['userid'],$img);
		   }
			if($_FILES["foto2"]["tmp_name"] == ""){}else{

			
			// precisamos fazer o upload da imagem
			$img2 = $app->uploadImagem($_FILES["foto2"]);
			$in = $site->editarDocumentos2($app->conexao,$_SESSION['userid'],$img2);
			}
			
			
			$obj = $site->listaDocumentos($app->conexao,$_SESSION['userid']);
			$documentos = $obj->fetchAll(PDO::FETCH_ASSOC);

			if($in) {

				$imagemandada = $alertas->AlertaStatus($app->conexao,'Imagem mandada com sucesso','1','mandardocumentos');

			
			} else {

				$imagemandada = $alertas->AlertaStatus($app->conexao,'Houve problemas, tenta novamente','0','mandardocumentos');
	
			}
			

			}else{
			
			
			$obj = $site->listaDocumentos($app->conexao,$_SESSION['userid']);
			$documentos = $obj->fetchAll(PDO::FETCH_ASSOC);
			}

	
			if($_SESSION['userid'] != ""){
			renderizaMandarDocumentos($app, $documentos);
			}
			
			break;


////////////////////////////////////// LISTA COMPROVANTES //////////////////////////////////////

			case "listacomprovantes":

			

			$app = new App();
			$site = $app->loadModel("Imagem");
			$siteb = $app->loadModel("Faturas");


			if(!empty($_POST)){
		
			$exclusao = $_POST['exclusao'];$idexcluir = $_POST['idexcluir'];
			$ativar = $_POST['ativar'];$idativar = $_POST['idativar'];

			if($exclusao == '1'){
				
			
				$objb = $site->excluirComprovante($app->conexao, $idexcluir);

				if($objb){
					print "<script>alert('Comprovante excluido com Sucesso!');</script>";
				}else{
					print "<script>alert('Houve Problemas, tente novamente!');</script>";
				}

			}

			if($ativar == '1'){
				
			
				$objc = $site->ativarComprovante($app->conexao, $idativar);
				$objd = $siteb->ativarFatura($app->conexao, $objc);

				if($objc){
					print "<script>alert('Comprovante e Fatura ativadas com Sucesso!');</script>";
				}else{
					print "<script>alert('Houve Problemas, tente novamente!');</script>";
				}

			}
			}

			$obj = $site->pegaListaComprovantes($app->conexao,$_SESSION['userid']);
			$listacomprovantes = $obj->fetchAll(PDO::FETCH_ASSOC);

			if($_SESSION['userid'] != ""){
			renderizaListaComprovantes($app, $listacomprovantes);
			}
			
			break;
			
////////////////////////////////////// HOME //////////////////////////////////////

			case "home":

				$app = new App();
				$siteb = $app->loadModel("Faturas");
				$sitec= $app->loadModel("Mibank");
				
				$listadiretos = $site->listaDiretosativos($app->conexao,$_SESSION['userid']);
				$diretos = $listadiretos->rowCount();

				$listadiretosp = $site->listaDiretospendentes($app->conexao,$_SESSION['userid']);
				$diretosp = $listadiretosp->rowCount();
				
				$listafaturasp = $siteb->listaFaturaspendentes($app->conexao,$_SESSION['userid']);
				$faturaspendentes = $listafaturasp->fetchAll(PDO::FETCH_ASSOC);
				

				$listatotal = $site->listaUsuarios($app->conexao);
				$totalusuarios = $listatotal->rowCount();
			
				//$key = $_GET['key'];
			//$transacao = $_GET['transacao'];
			
			// por a data
			
			$datas = date("d");
			
			$transacaof = $transacao.$datas;
			
		
			
				if($key != "" && $transacaof != ""){
					
					// 1 tem que ver se o id de transacao já não foi usado
					$verid = $sitec->VerIdTransacao($app->conexao,$transacaof);
					if($verid == '0'){
						
						// 2 tem que consultar o id de transacao, pegando id, valor e destino
						$pegamibank = $sitec->ConsultaTransacao($app->conexao,$transacaof,$idfatura, $_SESSION['userid']);
						
						if($pegamibank){
							$ativafatura = $siteb->ativarFatura($app->conexao,$idfatura);
							if($ativafatura){
								print "<script>alert('Fatura Ativada com Sucesso!!');</script>";
								print "<script>window.location='home';</script>";
							}else{
								print "<script>alert('Erro, Houve Problemas');</script>";
								print "<script>window.location='home';</script>";
							}
						}else{
							print "<script>alert('Erro, Houve Problemas transacao nao aceita');</script>";
						}
					}else{
						
						print "<script>alert('$verid');</script>";
					}
					
					// 3 ativar o usuário e seu investimento
				}

				if($_SESSION['userid'] != ""){
				renderizaHomeInicial($app, $diretos, $diretosp, $totalusuarios, $faturaspendentes);
				}
			
			break;
			
////////////////////////////////////// MINHAS DOAÇÕES //////////////////////////////////////

			case "minhasdoacoes":

			$app = new App();
			$siteb = $app->loadModel("Financas");

			$obj = $siteb->pegaMinhasDoacoes($app->conexao,$_SESSION['userid']);
			$minhasdoacoes = $obj->fetchAll(PDO::FETCH_ASSOC);
			
			if(!empty($_POST)){
				
				$ligar = $_POST['ligacao'];
				$desligar = $_POST['desligacao'];
				$idfatura1 = $_POST['idfatura1'];
				$idfatura2 = $_POST['idfatura2'];
				
				
				
				if($ligar == '1'){
					
					$liga = $siteb->LigaDoacao($app->conexao,$idfatura1, $_SESSION['userid']);
					
					if($liga){
					
						print "<script>alert('Investimento Ligado!!');</script>";
						print "<script>window.location='minhasdoacoes';</script>";
						
					}else{
						print "<script>alert('Voce nao possue saldo investimento!!');</script>";
						print "<script>window.location='minhasdoacoes';</script>";	
					}
					
				}else if($desligar == '1'){
					
					$desliga = $siteb->DesligaDoacao($app->conexao,$idfatura2, $_SESSION['userid']);
					
					print "<script>alert('Investimento Desligado!!');</script>";
					print "<script>window.location='minhasdoacoes';</script>";
				}
			}

			if($_SESSION['userid'] != ""){
			renderizaMinhasDoacoes($app, $minhasdoacoes);
			}
			
			break;

////////////////////////////////////// MINHAS FOTOS //////////////////////////////////////

			case "minhasfotos":

			

			$app = new App();
			$site = $app->loadModel("Imagem");


			if(!empty($_POST)){
				
				if($_FILES["foto"]["tmp_name"] == ""){

				$selecioneimagem = $alertas->AlertaStatus($app->conexao,'Selecione uma Imagem','2','minhasfotos');
		
			
			}else{

			

			// precisamos fazer o upload da imagem
			$img = $app->uploadImagemUsuario($_FILES["foto"]);
			
			$in = $site->editarFotos($app->conexao,$_SESSION['userid'],$img);

			if($img) {

				$imagemalterada = $alertas->AlertaStatus($app->conexao,'Imagem alterada com sucesso','1','minhasfotos');
			
			} else {
				$imagemalterada = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente','0','minhasfotos');
			}
			}

			}

				// vamos carregar os documentos
			$obj = $site->pegaFotos($app->conexao,$_SESSION['userid']);
			$documentos = $obj->fetchAll(PDO::FETCH_ASSOC);

			if($_SESSION['userid'] != ""){
			renderizaFotos($app, $documentos);
			}
			
			break;

////////////////////////////////////// ENVIAR COMPROVANTE //////////////////////////////////////

			case "enviarcomprovante":

			$app = new App();
			$site = $app->loadModel("Imagem");
			$faturas = $app->loadModel("Faturas");

			

			if(!empty($_POST)){

			if($_FILES['foto'] == ''){
				
				$faturaativada = $alertas->AlertaStatus($app->conexao,'Selecione uma Imagem','2','enviarcomprovante?i='.$i);
				
			}else{

			// precisamos fazer o upload da imagem
			$img = $app->uploadComprovanteUsuario($_FILES["foto"]);
			
		

					$mandarcomprovante = $faturas->MandarComprovante($app->conexao,$i,$img,$_SESSION['userid']);
				
					if($mandarcomprovante){
	
						$faturaativada = $alertas->AlertaStatus($app->conexao,'Comprovante mandado com Sucesso!','1','enviarcomprovante?i='.$i);
	
					}else{
	
						$faturaativada = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente!','0','enviarcomprovante?i='.$i);
	
					}
	

			}
			}

				// vamos carregar os comprovantes
			$obj = $site->pegaComprovantes($app->conexao,$_SESSION['userid'], $i);
			$documentos = $obj->fetchAll(PDO::FETCH_ASSOC);

			if($_SESSION['userid'] != ""){
			renderizaComprovantes($app, $documentos, $pegamibank);
			}
			
			break;
			
			
////////////////////////////////////// ENVIAR COMPROVANTE //////////////////////////////////////

			case "enviarcomprovantenewpay":

			$app = new App();
			$site = $app->loadModel("Imagem");
			$unitybank = $app->loadModel("Newpay");
			$comprovantes = $app->loadModel("Comprovantes");
			$faturas = $app->loadModel("Faturas");
			$ciclos = $app->loadModel("Ciclos");

			

			if(!empty($_POST)){

			

			$idtransacao = $_POST['idtransacao'];
			
			$verifica = $unitybank->VerIdTransacao($app->conexao, $idtransacao);
			
			if($verifica == '0'){
			
				$consultatransacao = $unitybank->ConsultaTransacao($app->conexao, $idtransacao,$i, $_SESSION['userid']);
				
			

			if($consultatransacao){
				
				

					$mandarcomprovante = $faturas->MandarComprovante($app->conexao,$i,$idtransacao,$_SESSION['userid']);
					$retorno = $ciclos->Retorno($app->conexao, $i);
				/*
					$explode = explode("-",$retorno);
	
					$up = $explode[0];$fase = $explode[1];
	
				
					if($up == 'upgrade'){
	
						$upgrade = $ciclos->Upgrade($app->conexao,  $fase,$i);
						$sustentabilidade = $ciclos->Sustentabilidade($app->conexao, $fase,$i);
	
					}
					*/
					if($retorno){

						$inserir = $unitybank->InserirTransacao($app->conexao, $idtransacao,$i,$_SESSION['userid']);
	
						$faturaativada = $alertas->AlertaStatus($app->conexao,'Comprovante ativado com Sucesso!','1','enviarcomprovantenewpay?i='.$i);
	
					}else{
	
						$faturaativada = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente!','0','enviarcomprovantenewpay?i='.$i);
	
					}
	
			
			}else{
				$faturaativada = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente!','0','enviarcomprovantenewpay?i='.$i);
				

			}
					
			}
			

			
			}

				// vamos carregar os comprovantes
			$obj = $site->pegaComprovantes($app->conexao,$_SESSION['userid'], $i);
			$documentos = $obj->fetchAll(PDO::FETCH_ASSOC);

			if($_SESSION['userid'] != ""){
			renderizaComprovantesb($app, $documentos, $pegamibank);
			}
			
			break;


////////////////////////////////////// ENVIAR COMPROVANTE //////////////////////////////////////

case "enviarcomprovantebankon":

	$app = new App();
	$site = $app->loadModel("Imagem");
	$unitybank = $app->loadModel("Bankon");
	$comprovantes = $app->loadModel("Comprovantes");
	$faturas = $app->loadModel("Faturas");
	$ciclos = $app->loadModel("Ciclos");

	

	if(!empty($_POST)){

	

	$idtransacao = $_POST['idtransacao'];
	
	$verifica = $unitybank->VerIdTransacao($app->conexao, $idtransacao);
	
	if($verifica == '0'){
	
		$consultatransacao = $unitybank->ConsultaTransacao($app->conexao, $idtransacao,$i, $_SESSION['userid']);
		
	

	if($consultatransacao){
		
		

			$mandarcomprovante = $faturas->MandarComprovante($app->conexao,$i,$idtransacao,$_SESSION['userid']);
			$retorno = $ciclos->Retorno($app->conexao, $i);
		/*
			$explode = explode("-",$retorno);

			$up = $explode[0];$fase = $explode[1];

		
			if($up == 'upgrade'){

				$upgrade = $ciclos->Upgrade($app->conexao,  $fase,$i);
				$sustentabilidade = $ciclos->Sustentabilidade($app->conexao, $fase,$i);

			}
			*/
			if($retorno){

				$inserir = $unitybank->InserirTransacao($app->conexao, $idtransacao,$i,$_SESSION['userid']);

			$faturaativada = $alertas->AlertaStatus($app->conexao,'Comprovante ativado com Sucesso!','1','enviarcomprovantebankon?i='.$i);

			}else{

				$faturaativada = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente!','0','enviarcomprovantebankon?i='.$i);

			}

	
	}else{
		$faturaativada = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente!','0','enviarcomprovanenviarcomprovantebankontenewpay?i='.$i);
		

	}
			
	}
	

	
	}

		// vamos carregar os comprovantes
	$obj = $site->pegaComprovantes($app->conexao,$_SESSION['userid'], $i);
	$documentos = $obj->fetchAll(PDO::FETCH_ASSOC);

	if($_SESSION['userid'] != ""){
		renderizaComprovantesc($app, $documentos, $pegamibank);
	}
	
	break;

////////////////////////////////////// ADM ENVIAR COMPROVANTE //////////////////////////////////////

			case "vercomprovante":

			$app = new App();
			$imagem = $app->loadModel("Imagem");
			
			
			
			if(!empty($_POST)){
				
				
				
				$fazerdownload = $imagem->FazerDownload($app->conexao,$_SESSION['userid'], $i);
				
				
				
			}

				// vamos carregar os comprovantes
			$obj = $imagem->pegaAdmComprovantes($app->conexao, $i);
			$documentos = $obj->fetchAll(PDO::FETCH_ASSOC);

			if($_SESSION['userid'] != ""){
			renderizaAdmComprovantes($app, $documentos);
			}
			
			break;
			


			

////////////////////////////////////// FINANÇAS //////////////////////////////////////
			
			case "minhasfinancas":

			$app = new App();
			$site = $app->loadModel("Financas");	
			
			
			// vamos carregar as financas
			$obj = $site->listaFinancas($app->conexao,$_SESSION["userid"]);
			$financas = $obj->fetchAll(PDO::FETCH_ASSOC);

			if($_SESSION['userid'] != ""){
			renderizaFinancas($app, $financas);
			}

			break;


////////////////////////////////////// ADM FINANÇAS //////////////////////////////////////
			
			case "admfinancas":

			$app = new App();
			$site = $app->loadModel("Financas");	
			
			
			// vamos carregar as financas
			$obj = $site->listaAdmFinancas($app->conexao);
			$financas = $obj->fetchAll(PDO::FETCH_ASSOC);

			if($_SESSION['userid'] != ""){
			renderizaAdmFinancas($app, $financas);
			}

			break;
			
////////////////////////////////////// QUERO INVESTIR //////////////////////////////////////
			
			case "queroinvestir":

			$app = new App();
			$site = $app->loadModel("Financas");
			$faturas = $app->loadModel("Faturas");
			
			if(empty($_POST)){}else{
				
				$pegafatura = $faturas->listaFaturaspendentesid($app->conexao,$_SESSION['userid']);
				
				if($pegafatura != ""){
					print "<script>alert('Voce tem uma fatura pendente!');</script>";
					print "<script>window.location='queroinvestir';</script>";
				}else{

				$valor = $_POST['valor'];
				$queroinvestir = $site->QueroInvestir($app->conexao,$valor,$_SESSION['userid']);
				if($queroinvestir){
					print "<script>alert('Investimento Efetuado com Sucesso!');</script>";
					print "<script>window.location='queroinvestir';</script>";
				}else{
					print "<script>alert('Houve Problemas, tente novamente!');</script>";
					print "<script>window.location='queroinvestir';</script>";
				}
				}
				
			}
			// vamos carregar as financas
			$obj = $site->listaAdmFinancas($app->conexao);
			$financas = $obj->fetchAll(PDO::FETCH_ASSOC);

			if($_SESSION['userid'] != ""){
			renderizaQueroInvestir($app, $financas);
			}

			break;
			
////////////////////////////////////// ADM LIBERA SALDO BLOQUEADO //////////////////////////////////////
			
			case "admliberasaldobloqueado":

			$app = new App();
			$site = $app->loadModel("Financas");	
			
			
			// vamos carregar as financas
			$obj = $site->pegaSaldoBloqueadoTotal($app->conexao);
			$financas = $obj->fetchAll(PDO::FETCH_ASSOC);

			if($_SESSION['userid'] != ""){
			renderizaAdmLiberaSaldoBloqueado($app, $financas);
			}

			break;

/////////////////////////////////// ADM FATURAS PENDENTES /////////////////////////////////

			case "admpagamentospendentes":

			$app = new App();
			$ciclos = $app->loadModel("Ciclos");
			$faturas = $app->loadModel("Faturas");	

			if(!empty($_POST)){
		
			$exclusao = $_POST['exclusao'];$idexcluir = $_POST['idexcluir'];
			$ativar = $_POST['ativar'];$idativar = $_POST['idativar'];

			if($exclusao == '1'){
				
			
				$objb = $faturas->excluirFaturas($app->conexao, $idexcluir);

				if($objb){

					$faturaexcluida = $alertas->AlertaStatus($app->conexao,'Pagamento excluido com Sucesso!','1','admpagamentospendentes');
				
				}else{
					$faturaexcluida = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente','0','admpagamentospendentes');
				}

			}

			if($ativar == '1'){
				
			
				$retorno = $ciclos->Retorno($app->conexao, $idativar);

				$explode = explode("-",$retorno);

				$up = $explode[0];$fase = $explode[1];

			
				

				if($up == 'upgrade'){

				
					
					$upgrade = $ciclos->Upgrade($app->conexao,  $fase,$idativar);
					$sustentabilidade = $ciclos->Sustentabilidade($app->conexao, $fase,$idativar);

				}

				if($retorno){

					$faturaativada = $alertas->AlertaStatus($app->conexao,'Pagamento ativado com Sucesso!','1','admpagamentospendentes');

				}else{

					$faturaativada = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente!','0','admpagamentospendentes');

				}

			}


				}
			
			
			// vamos carregar as financas
			$obj = $faturas->listaAdmFaturaspendentes($app->conexao);
			$faturasp = $obj->fetchAll(PDO::FETCH_ASSOC);

			if($_SESSION['userid'] != ""){
				
				renderizaAdmFaturasPendentes($app, $faturasp);
			}
			

			break;

///////////////////////////////////////// ADM FATURAS PAGAS ////////////////////////////////

			case "admpagamentospagas":

			$app = new App();
			$site = $app->loadModel("Faturas");	
			
			
			
			$obj = $site->listaAdmFaturaspagas($app->conexao);
			$faturas = $obj->fetchAll(PDO::FETCH_ASSOC);

			if($_SESSION['userid'] != ""){
			renderizaAdmFaturasPagas($app, $faturas);
			}
			
			break;

	////////////////////////////////////////// AMD SAQUES PENDENTES  ///////////////////////////////

			case "admsaquespendentes":

			$app = new App();
			$sites = $app->loadModel("Saques");	

			if(!empty($_POST)){

				
					
			$pagar = $_POST['pagar'];$idsaque = $_POST['idsaque'];
			$exclusao = $_POST['exclusao'];$idexcluir = $_POST['idexcluir'];
	
			if($pagar == '1'){
				
			
				$objb = $sites->pagarSaque($app->conexao, $idsaque);

				if($objb){
					print "<script>alert('Saque pago com Sucesso!');</script>";
				}else{
					print "<script>alert('Houve Problemas, tente novamente!');</script>";
				}

			}

			if($exclusao == '1'){
				
				$objb = $sites->extornarSaque($app->conexao, $idexcluir);
				$objc = $sites->excluirSaque($app->conexao, $idexcluir);

				if($objc){
					print "<script>alert('Saque extornado e excluido com Sucesso!');</script>";
				}else{
					print "<script>alert('Houve Problemas, tente novamente!');</script>";
				}

			}
				}
			
			
			$obj = $sites->pegaAdmSaques($app->conexao,0);
			$saquespendentes = $obj->fetchAll(PDO::FETCH_ASSOC);

			if($_SESSION['userid'] != ""){
			renderizaAdmSaquesPendentes($app, $saquespendentes);
			}
			
			break;

			
	

////////////////////////////////////////// ADM SAQUES ATIVOS  ///////////////////////////////

			case "admsaquespagos":

			$app = new App();
			$site = $app->loadModel("Saques");

			$pagar = $_POST['pagar'];$idsaque = $_POST['idsaque'];
	
			if($pagar == '1'){
				
		
				$objb = $site->extornarSaque($app->conexao, $idsaque);

				if($objb){
					print "<script>alert('Saque extornado com Sucesso!');</script>";
				}else{
					print "<script>alert('Houve Problemas, tente novamente!');</script>";
				}

			}
	
			
			
			$obj = $site->pegaAdmSaques($app->conexao, 1);
			$saquesativos = $obj->fetchAll(PDO::FETCH_ASSOC);
			
			if($_SESSION['userid'] != ""){
			renderizaAdmSaquesAtivos($app, $saquesativos);
			}
			
			break;

////////////////////////////////////////// ADM CREDITO DEBITO  ///////////////////////////////

			case "admcreditodebito":

			//$app = new App();
			$sitec = $app->loadModel("Financas");
			//$siteb = $app->loadModel("Usuario");

			$transacao = $_POST['transacao'];$valor = $_POST['valor'];
			$useridd = $_POST['usuarios'];$motivo = $_POST['motivo'];
	
			if($transacao == '0'){
				
				$objb = $sitec->CreditarSaldo($app->conexao, $useridd,$valor, $motivo);

				if($objb){
					print "<script>alert('Creditado com Sucesso!');</script>";
				}else{
					print "<script>alert('Houve Problemas, tente novamente!');</script>";
				}

			}else if($transacao == '1'){

				$objb = $sitec->DebitarSaldo($app->conexao, $useridd, $valor, $motivo);

				if($objb){
					print "<script>alert('Debitado com Sucesso!');</script>";
				}else{
					print "<script>alert('Houve Problemas, tente novamente!');</script>";
				}

			}
	
			
			
			$obj = $site->listaUsuarios($app->conexao);
			$usuarioss = $obj->fetchAll(PDO::FETCH_ASSOC);
			
			if($_SESSION['userid'] != ""){
			renderizaAdmCreditoDebito($app, $usuarioss);
			}
			
			break;

/////////////////////////////////// FATURAS PENDENTES /////////////////////////////////

			case "faturaspendentes":

			$app = new App();
			$sitec = $app->loadModel("Faturas");	
			//$siteb = $app->loadModel("Usuario");	
			
			
			$obj = $sitec->listaFaturaspendentes($app->conexao,$_SESSION["userid"]);
			$faturasp = $obj->fetchAll(PDO::FETCH_ASSOC);

			

			if($_SESSION['userid'] != ""){
			renderizaFaturasPendentes($app, $faturasp);
			}

			break;

///////////////////////////////////////// FATURAS PAGAS ////////////////////////////////

			case "faturaspagas":

			$app = new App();
			$site = $app->loadModel("Faturas");	
			
			
			
			$obj = $site->listaFaturaspagas($app->conexao,$_SESSION["userid"]);
			$faturas = $obj->fetchAll(PDO::FETCH_ASSOC);

			if($_SESSION['userid'] != ""){
			renderizaFaturasPagas($app, $faturas);
			}
			
			break;

///////////////////////////////////////// MEU PERFIL ////////////////////////////////

			case "perfil":

			$app = new App();
			$site = $app->loadModel("Faturas");	
			
			
			
			$obj = $site->listaFaturaspagas($app->conexao,$_SESSION["userid"]);
			$faturas = $obj->fetchAll(PDO::FETCH_ASSOC);

			if($_SESSION['userid'] != ""){
			renderizaPerfil($app, $faturas);
			}
			
			break;

///////////////////////////////////////// RELATÓRIO GERAL ////////////////////////////////

			case "admrelatorios":

			$app = new App();
			$siteadmrelatorios = $app->loadModel("Financas");	
			
			
			$obj = $siteadmrelatorios->InvestimentosGeral($app->conexao);
			$investimentos = $obj->fetchAll(PDO::FETCH_ASSOC);

			$objb = $siteadmrelatorios->ReinvestimentosGeral($app->conexao);
			$reinvestimentos = $objb->fetchAll(PDO::FETCH_ASSOC);

			$objc = $siteadmrelatorios->TotalGeral($app->conexao);
			$geral = $objc->fetchAll(PDO::FETCH_ASSOC);

			if($_SESSION['userid'] != ""){
			renderizaAdmRelatorios($app, $investimentos,$reinvestimentos,$geral);
			}
			
			break;

//////////////////////// ADM CADASTRAR USUÁRIOS  ///////////////////////////////////////

			case "admcadastrarusuario":

			$app = new App();
			$ciclos = $app->loadModel("Ciclos");	
			$siteb = $app->loadModel("Faturas");

			if(!empty($_POST)){

				$nome = tStr($_POST["nome"]);
				//$valor = $_POST["valor"];
				$usuario = tStr($_POST["usuario"]);
				$senha = md5(tStr($_POST["senha"]));


				$in = $site->cadastrarUsuarioAdmin($app->conexao,$nome, $usuario,$senha);
				$alocar = $ciclos->Alocarmatriz($app->conexao,$in);
				/*
				if($valor == ""){}else{
				$gerafatura = $siteb->cadastrarfatura($app->conexao,$in,$valor);
				}
*/
				if($in){
					$usuariocadastrado = $alertas->AlertaStatus($app->conexao,'Usuário Cadastrado com Sucesso !','1','admcadastrarusuario');
					
				}else{
					$usuariocadastrado = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente!','0','admcadastrarusuario');
				
				}

			}
			
			if($_SESSION['userid'] != ""){
			renderizaCadastrarUsuario($app);
			}
			
			break;


//////////////////////// DADOS PESSOAIS ///////////////////////////////////////

			case "dadospessoais":

			$app = new App();
				

			if(!empty($_POST)){

				$nome = $_POST["nome"];
				$email = tStr($_POST["email"]);
				$celular = tStr($_POST["whatsapp"]);
				$cpf = tStr($_POST["cpf"]);


				$in = $site->alteraDadosUsuario($app->conexao,$nome, $email, $celular,$cpf,$_SESSION["userid"]);
				
				

				if($in){
					$dadosalterado = $alertas->AlertaStatus($app->conexao,'Dados Alterados com Sucesso!','1','dadospessoais');
				}else{
					$dadosalterado = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente!','0','dadospessoais');
				}

			}
			
			
			
			$obj = $site->listaDados($app->conexao,$_SESSION["userid"]);
			$dados = $obj->fetchAll(PDO::FETCH_ASSOC);

			if($_SESSION['userid'] != ""){
			renderizaDados($app, $dados);
			}
			
			break;

//////////////////////// ADM EDITAR DADOS ///////////////////////////////////////

			case "admeditardados":

			$app = new App();	

			if(!empty($_POST)){
				

				$usuario = tStr($_POST["usuario"]);
				$senha = hash("md5",$_POST["senha"]);
				$nome = $_POST["nome"];
				$email = tStr($_POST["email"]);
				$celular = tStr($_POST["whatsapp"]);
				$cpf = tStr($_POST["cpf"]);


				$in = $site->alteraAdmDadosUsuario($app->conexao,$nome, $email, $celular,$cpf,$usuario,$senha,$i);

				if($in){
					$dadosalterado = $alertas->AlertaStatus($app->conexao,'Dados Alterados com Sucesso!','1','admeditardados?i='.$i);
				}else{
					$dadosalterado = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente!','0','admeditardados?i='.$i);
				}

			}
			
			
			
			$obj = $site->listaAdmDados($app->conexao,$i);
			$dados = $obj->fetchAll(PDO::FETCH_ASSOC);

			if($_SESSION['userid'] != ""){
			renderizaAdmDados($app, $dados);
			}
			
			break;
			
//////////////////////// ADM CADASTRAR USUÁRIOS ///////////////////////////////////////

			case "admcadastros":

			$app = new App();
			$ciclos = $app->loadModel("Ciclos");

			if(!empty($_POST)){
				

				$usuario = tStr($_POST["usuario"]);
				$senha = hash("md5",$_POST["senha"]);
				$nome = tStr($_POST["nome"]);
				$email = tStr($_POST["email"]);
				$celular = tStr($_POST["celular"]);
				$cpf = tStr($_POST["cpf"]);
				$mibank = tStr($_POST["mibank"]);


				$in = $site->cadastrarUsuarioAdmin($app->conexao,$nome, $email, $celular,$cpf, $mibank,$usuario,$senha,$i);
				$alocar = $ciclos->Alocarmatriz($app->conexao,$in);

				if($in){
					$cadastroefetuado = $alertas->AlertaStatus($app->conexao,'Cadastro Efetuado com Sucesso!','1','admcadastros');
				}else{
					$cadastroefetuado = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente!','0','admcadastros');
				}

			}
			
			
			
			$obj = $site->listaAdmDados($app->conexao,$i);
			$dados = $obj->fetchAll(PDO::FETCH_ASSOC);

			if($_SESSION['userid'] != ""){
			renderizaAdmCadastros($app, $dados);
			}

			break;

//////////////////////// MEUS DADOS ///////////////////////////////////////

			case "meusdados":

			$app = new App();	

			if(!empty($_POST)){

				$nome = tStr($_POST["nome"]);
				$email = tStr($_POST["email"]);
				$celular = tStr($_POST["celular"]);
				$whatsapp = tStr($_POST["whatsapp"]);
				$cep = tStr($_POST["cep"]);
				$cpf = tStr($_POST["cpf"]);
				$rg = tStr($_POST["rg"]);
				$rua = tStr($_POST["endereco"]);
				$numero = tStr($_POST["numero"]);
				$bairro = tStr($_POST["bairro"]);
				$cidade = tStr($_POST["cidade"]);
				$pais = tStr($_POST["pais"]);
				$nascimento = tStr($_POST["nascimento"]);
				$estrangeiro = tStr($_POST["estrangeiro"]);
				$complemento = tStr($_POST["complemento"]);


				$in = $site->alteraDadosUsuario($app->conexao,$nome,$estrangeiro, $nascimento, $email, $celular,$cep,$whatsapp,$cpf,$rg,$rua,$numero,$bairro,$cidade,$pais,$complemento, $_SESSION["userid"]);
				
				if($in){
					$dados = $alertas->AlertaStatus($app->conexao,'Dados Alterados com Sucesso!','1','meusdados');
				}else{
					$dados = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente!','0','meusdados');
				}

			}
			
			
			
			$obj = $site->listaDados($app->conexao,$_SESSION["userid"]);
			$dados = $obj->fetchAll(PDO::FETCH_ASSOC);

			if($_SESSION['userid'] != ""){
			renderizaDados($app, $dados);
			}
			
			break;

/////////////////////////// ADM EDITAR SENHA ///////////////////////////////////

			case "admeditarsenha":

			$app = new App();


			if(!empty($_POST)){

				
				$novasenha = hash("md5",$_POST["novasenha"]);

					$in = $site->AdmalteraSenha($app->conexao, $novasenha, $i);

				
				if($in){
					$senhalterada = $alertas->AlertaStatus($app->conexao,'Senha Alterada com Sucesso!','1','admeditarsenha?i='.$i);
				}else{
					$senhalterada = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente','0','admeditarsenha?i='.$i);
				}


			}

			if($_SESSION['userid'] != ""){
			renderizaAdmSenha($app);
			}

			break;

/////////////////////////// EDITAR SENHA ///////////////////////////////////

			case "seguranca":

			$app = new App();	

			
			if(!empty($_POST)){

				$senha = hash("md5",$_POST["senhaatual"]);
				$novasenha = hash("md5",$_POST["novasenha"]);

				
				$obj = $site->confereSenha($app->conexao,$senha, $_SESSION["userid"]);
				$sucesso = $obj->fetchColumn();


				if($sucesso > 0){
					$in = $site->alteraSenha($app->conexao, $novasenha, $_SESSION["userid"]);
				if($in){
					$senhalterada = $alertas->AlertaStatus($app->conexao,'Senha Alterada com Sucesso!','1','seguranca');
				}else{
					$senhalterada = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente','0','seguranca');
				}
				}else{
					$senhalterada = $alertas->AlertaStatus($app->conexao,'Senha Atual incorreta!','2','seguranca');
				}
			
			}

			if($_SESSION['userid'] != ""){
			renderizaSenha($app);
			}
			
			break;

///////////////////////// EDITAR SENHA FINANCEIRA /////////////////////////////////

			case "editarsenhafinanceira":

			$app = new App();

			
			if(!empty($_POST)){

				$senha = hash("md5",$_POST["senhaatual"]);
				$novasenha = hash("md5",$_POST["novasenha"]);

				
				$obj = $site->confereSenhaFinanceira($app->conexao,$senha, $_SESSION["userid"]);
				$sucesso = $obj->fetchColumn();

				if($sucesso > 0){
					$in = $site->alteraSenhaFinanceira($app->conexao, $novasenha, $_SESSION["userid"]);
				if($in){
					$senhafinanceira = $alertas->AlertaStatus($app->conexao,'Senha Financeira Alterada com Sucesso!','1','editarsenhafinanceira');
				}else{
					$senhafinanceira = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente!','0','editarsenhafinanceira');
				}
				}else{
					$senhafinanceira = $alertas->AlertaStatus($app->conexao,'Senha Financeira Atual Incorreta!','2','editarsenhafinanceira');
				}
			
			}

			if($_SESSION['userid'] != ""){
			renderizaSenhaFinanceira($app);
			}
			
			break;

/////////////////////  DADOS BANCÁRIOS //////////////////////////////////

			case "dadospagamento":

			$app = new App();
			
			$pegapicpay = $site->pegaDadosPicpay($app->conexao,$_SESSION["userid"]);
			


			if(!empty($_POST)){
				$exclusao = $_POST['exclusao'];$idexcluir = $_POST['idexcluir'];

				if($exclusao == '1'){

					$objb = $site->excluirDadosBancarios($app->conexao, $idexcluir);

				if($objb){
					$mandaralerta = $alertas->AlertaStatus($app->conexao,'Dados Bancário excluido com Sucesso!','1','dadospagamento');
					
					
				}else{
				
					$dadobancario = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente!','0','dadospagamento');
				}
				}
			}

			if($_SESSION['userid'] != ""){
			renderizaDadosBancarios($app, $pegapicpay);
			}
			
			break;

///////////////////////// ADICIONAR DADOS BANCÁRIOS ///////////////////////////////

			case "adddadosbancarios":

			$app = new App();
			
			if(!empty($_POST)){
				$banco = tStr($_POST["banco"]);
				$agencia = tStr($_POST["agencia"]);
				$conta = tStr($_POST["conta"]);
				$tipoconta = tStr($_POST["tipoconta"]);
				$operacao = tStr($_POST["operacao"]);
				$nometitular = tStr($_POST["nometitular"]);
				$cpftitular = tStr($_POST["cpftitular"]);
				$bitcoin = tStr($_POST["bitcoin"]);
				$litecoin = tStr($_POST["litecoin"]);
				$ethereum = tStr($_POST["ethereum"]);

				if($banco == 'bitcoin'){

					$in = $site->adicionarDadosBancariosBitcoin($app->conexao, $banco, $bitcoin, $_SESSION["userid"]);

				}else if($banco == 'litecoin'){

					$in = $site->adicionarDadosBancariosLitecoin($app->conexao, $banco, $litecoin, $_SESSION["userid"]);


				}else if($banco == 'ethereum'){

					$in = $site->adicionarDadosBancariosEthereum($app->conexao, $banco, $ethereum,   $_SESSION["userid"]);

					
				}else{

					$in = $site->adicionarDadosBancarios($app->conexao, $banco, $agencia, $conta, $tipoconta, $operacao, $nometitular, $cpftitular,  $_SESSION["userid"]);

				}

				if($in){
					$bancariocadastros = $alertas->AlertaStatus($app->conexao,'Dados Bancário Cadastrado com Sucesso!','1','adddadosbancarios');
				}else{
					$bancariocadastros = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente!','0','adddadosbancarios');
				}

			}

			if($_SESSION['userid'] != ""){
			renderizaAdicionarDadosBancarios($app, $adicionardadosbancarios);
			}
			
			break;

//////////////////////////  VER DADOS BANCÁRIOS //////////////////////////////////////

			case "verdadosbancarios":

			$app = new App();
			//$site = $app->loadModel("Usuario");	
			
			
			
			$obj = $site->pegaVerDadosBancarios($app->conexao,$_SESSION["userid"], $i);
			$pegadadosbancarios = $obj->fetchAll(PDO::FETCH_ASSOC);

			if($_SESSION['userid'] != ""){
			renderizaVerDadosBancarios($app, $pegadadosbancarios);
			}
			
			break;

////////////////////////// EDITAR BANCÁRIOS ////////////////////////////////////////////////

			case "editardadosbancarios":

			$app = new App();
			
			if(!empty($_POST)){
				$banco = tStr($_POST["banco"]);
				$agencia = tStr($_POST["agencia"]);
				$conta = tStr($_POST["conta"]);
				$tipoconta = tStr($_POST["tipoconta"]);
				$operacao = tStr($_POST["operacao"]);
				$nometitular = tStr($_POST["nometitular"]);
				$cpftitular = tStr($_POST["cpftitular"]);
				$bitcoin = tStr($_POST["bitcoin"]);
				$litecoin = tStr($_POST["litecoin"]);
				$ethereum = tStr($_POST["ethereum"]);

				if($banco == 'bitcoin'){

					$in = $site->editarDadosBancariosBitcoin($app->conexao,  $bitcoin,$i, $_SESSION["userid"]);

				}else if($banco == 'litecoin'){

					$in = $site->editarDadosBancariosLitecoin($app->conexao, $litecoin,$i, $_SESSION["userid"]);


				}else if($banco == 'ethereum'){

					$in = $site->editarDadosBancariosEthereum($app->conexao, $ethereum, $i,  $_SESSION["userid"]);

					
				}else{

					$in = $site-> editarDadosBancarios($app->conexao, $banco, $agencia, $conta, $tipoconta, $operacao, $nometitular, $cpftitular, $i,  $_SESSION["userid"]);

				}

				if($in){
					$bancarioalterado = $alertas->AlertaStatus($app->conexao,'Dados Bancário Alterado com Sucesso!','1','editardadosbancarios?i='.$i);
				}else{
					$bancarioalterado = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente!','0','editardadosbancarios?i='.$i);
				}
			}

			$obj = $site->pegaVerDadosBancarios($app->conexao,$_SESSION["userid"], $i);
			$editardadosbancarios = $obj->fetchAll(PDO::FETCH_ASSOC);

			if($_SESSION['userid'] != ""){
			renderizaEditarDadosBancarios($app, $editardadosbancarios);
			}
			
			break;

/////////////////////  ADM DADOS BANCÁRIOS //////////////////////////////////

			case "admlistabancaria":

			$app = new App();
			
			
			$obj = $site->pegaDadosBancarios($app->conexao,1);
			$pegadadosbancarios = $obj->fetchAll(PDO::FETCH_ASSOC);

			if(!empty($_POST)){

					
			$exclusao = $_POST['exclusao'];$idexcluir = $_POST['idexcluir'];
	
			if($exclusao == '1'){
				
			
				$objb = $site->excluirDadosBancarios($app->conexao, $idexcluir);

				if($objb){
					$dados = $alertas->AlertaStatus($app->conexao,'Dados Bancário excluido com Sucesso!','1','admlistabancaria');
				}else{
					$dados = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente!','0','admlistabancaria');
				}

			}
				}

			if($_SESSION['userid'] != ""){
			renderizaAdmDadosBancarios($app, $pegadadosbancarios);
			}
			
			break;

///////////////////////// ADM ADICIONAR DADOS BANCÁRIOS ///////////////////////////////

			case "admadddadosbancarios":

			$app = new App();
			$site = $app->loadModel("Usuario");	
			
			if(!empty($_POST)){
				$banco = tStr($_POST["banco"]);
				$agencia = tStr($_POST["agencia"]);
				$conta = tStr($_POST["conta"]);
				$tipoconta = tStr($_POST["tipoconta"]);
				$operacao = tStr($_POST["operacao"]);
				$nometitular = tStr($_POST["nometitular"]);
				$cpftitular = tStr($_POST["cpftitular"]);

				$in = $site->adicionarDadosBancarios($app->conexao, $banco, $agencia, $conta, $tipoconta,  $cpftitular, $nometitular,$operacao,  $_SESSION["userid"]);

				if($in){
					$dados = $alertas->AlertaStatus($app->conexao,'Dados Bancário cadastrado com Sucesso!','1','admadddadosbancarios');
				}else{
					$dados = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente!','0','admadddadosbancarios');
				}
			}

			if($_SESSION['userid'] != ""){
			renderizaAdmAdicionarDadosBancarios($app, $adicionardadosbancarios);
			}
			
			break;

/////////////////////////  ADICIONAR DADOS BANCÁRIOS ///////////////////////////////

			case "adddadosbancarios":

			$app = new App();	
			
			if(!empty($_POST)){
				
				$banco = tStr($_POST["banco"]);
				$agencia = tStr($_POST["agencia"]);
				$conta = tStr($_POST["conta"]);
				$tipoconta = tStr($_POST["tipoconta"]);
				$operacao = tStr($_POST["operacao"]);
				$nometitular = tStr($_POST["nometitular"]);
				$cpftitular = tStr($_POST["cpftitular"]);


				$in = $site->adicionarDadosBancarios($app->conexao, $banco, $agencia, $conta, $tipoconta,  $cpftitular, $nometitular,$operacao,  $_SESSION["userid"]);

				if($in){
					$dados = $alertas->AlertaStatus($app->conexao,'Dados Bancário cadastrado com Sucesso!','1','admadddadosbancarios');
				}else{
					$dados = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente!','0','admadddadosbancarios');
				}
			}

			if($_SESSION['userid'] != ""){
			renderizaAdicionarDadosBancarios($app, $adicionardadosbancarios);
			}
			
			break;

//////////////////////////  ADM VER DADOS BANCÁRIOS //////////////////////////////////////

			case "verdadosbancarios":

			$app = new App();
			//$site = $app->loadModel("Usuario");	
			
			
			
			$obj = $site->pegaVerDadosBancarios($app->conexao,$_SESSION["userid"], $i);
			$pegadadosbancarios = $obj->fetchAll(PDO::FETCH_ASSOC);

			if($_SESSION['userid'] != ""){
			renderizaVerDadosBancarios($app, $pegadadosbancarios);
			}
			
			break;


////////////////////////// ADM EDITAR BANCÁRIOS ////////////////////////////////////////////////

			case "admdadosbancarios":

			$app = new App();	
			
			if(!empty($_POST)){
				$urpay = tStr($_POST["urpay"]);

				$in = $site->AdmeditarDadosBancarios($app->conexao, $urpay, $i);

				if($in){
					$dados = $alertas->AlertaStatus($app->conexao,'Dados Bancário Alterado com Sucesso!','1','admdadosbancarios?i='.$i);
				}else{
					$dados = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente!','0','admdadosbancarios?i='.$i);
				}
			}
			
			$obj = $site->pegaAdmVerDadosBancarios($app->conexao, $i);
			$editardadosbancarios = $obj->fetchAll(PDO::FETCH_ASSOC);

			if($_SESSION['userid'] != ""){
			renderizaAdmEditarDadosBancarios($app, $editardadosbancarios);
			}
			
			break;
			
/////////////////////////////// TICKETS  /////////////////////////////////

			case "tickets":

			$app = new App();
			$tickets = $app->loadModel("Tickets");

			if(!empty($_POST)){

				$assunto = $_POST['assunto'];$mensagem = $_POST['mensagem'];
				$fecharticket = $_POST['fecharticket'];$idticket = $_POST['idticket'];
				
				if($fecharticket == '1'){
						$fechaticket = $tickets->FecharTicket($app->conexao,$_SESSION['userid'],$idticket);
						
						if($fechaticket){
							$mandaralerta = $alertas->AlertaStatus($app->conexao,'Ticket Fechado com Sucesso','1','tickets');
						}else{
							$mandaralerta = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente','0','tickets');
						}
				
				}else{

				$novoticket = $tickets->NovoTicket($app->conexao,$assunto,$mensagem, $_SESSION['userid']);

				if($novoticket){
					$mandaralerta = $alertas->AlertaStatus($app->conexao,'Ticket Aberto com Sucesso','1','tickets');
				}else{
					$mandaralerta = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente','0','tickets');
				}
				
				}
				
				
			}


			$pegatickets = $tickets->pegaMeusTickets($app->conexao,$_SESSION['userid']);

			$total = $tickets->pegaTicketsTotal($app->conexao,$_SESSION['userid']);

			$respondido = $tickets->pegaTicketsRespondido($app->conexao,$_SESSION['userid']);

			$resolvido = $tickets->pegaTicketsResolvido($app->conexao,$_SESSION['userid']);

			$fechado = $tickets->pegaTicketsFechado($app->conexao,$_SESSION['userid']);

			if($_SESSION['userid'] != ""){
			renderizaTickets($app, $pegatickets,$total,$respondido,$resolvido,$fechado);
			}

			break;

/////////////////////////////// VER TICKETS  /////////////////////////////////

			case "vertickets":

			$app = new App();
			$tickets = $app->loadModel("Tickets");
			// 0 abertura do primeiro ticket/ respondido para
			// 1 fechado
			// 2 respondido, esperando resposta do admin
			// 

			if(!empty($_POST)){

				$mensagem = $_POST['mensagem'];

				$novoticket = $tickets->ResponderTicket($app->conexao,$mensagem, $_SESSION["usuario"],$i);

				if($novoticket){
					$mandaralerta = $alertas->AlertaStatus($app->conexao,'Ticket respondido com Sucesso','1','vertickets?i='.$i);
				}else{
					$mandaralerta = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente','0','vertickets?i='.$i);
				}
			}
			
		

			$pegaticketss = $tickets->pegaTicketsId($app->conexao,$i);
			$pegatickets = $pegaticketss->fetchAll(PDO::FETCH_ASSOC);

			
			if($_SESSION["userid"] != ""){
			renderizaVerTickets($app, $pegatickets);
			}

			break;
			
/////////////////////////////// TICKETS  /////////////////////////////////

			case "admtickets":

			$app = new App();
			$tickets = $app->loadModel("Tickets");

			if(!empty($_POST)){

				$assunto = $_POST['assunto'];$mensagem = $_POST['mensagem'];
				$fecharticket = $_POST['fecharticket'];$idticket = $_POST['idticket'];
				
				if($fecharticket == '1'){
						$fechaticket = $tickets->FecharTicketAdmin($app->conexao,$_SESSION['userid'],$idticket);
						
						if($fechaticket){
							$mandaralerta = $alertas->AlertaStatus($app->conexao,'Ticket Fechado com Sucesso','1','admtickets');
						}else{
							$mandaralerta = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente','0','admtickets');
						}
				
				}else{

				$novoticket = $tickets->NovoTicket($app->conexao,$assunto,$mensagem, $_SESSION['userid']);

				if($novoticket){
					$mandaralerta = $alertas->AlertaStatus($app->conexao,'Ticket Aberto com Sucesso','1','admtickets');
				}else{
					$mandaralerta = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente','0','admtickets');
				}
				
				}
			}


			$pegatickets = $tickets->pegaMeusTicketsAdmin($app->conexao);

			$total = $tickets->pegaTicketsTotal($app->conexao,$_SESSION['userid']);

			$respondido = $tickets->pegaTicketsRespondido($app->conexao,$_SESSION['userid']);

			$resolvido = $tickets->pegaTicketsResolvido($app->conexao,$_SESSION['userid']);

			$fechado = $tickets->pegaTicketsFechado($app->conexao,$_SESSION['userid']);

			if($_SESSION['userid'] != ""){
			renderizaAdmTickets($app, $pegatickets,$total,$respondido,$resolvido,$fechado);
			}

			break;

/////////////////////////////// VER TICKETS  /////////////////////////////////

			case "admvertickets":

			$app = new App();
			$tickets = $app->loadModel("Tickets");
			// 0 abertura do primeiro ticket/ respondido para
			// 1 fechado
			// 2 respondido, esperando resposta do admin
			// 

			if(!empty($_POST)){

				$mensagem = $_POST['mensagem'];

				$novoticket = $tickets->ResponderTicketAdmin($app->conexao,$mensagem, $_SESSION["usuario"],$i);

				if($novoticket){
					$mandaralerta = $alertas->AlertaStatus($app->conexao,'Ticket respondido com Sucesso','1','admvertickets?i='.$i);
				}else{
					$mandaralerta = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente','0','admvertickets?i='.$i);
				}
			}


			$pegaticketss = $tickets->pegaTicketsId($app->conexao,$i);
			$pegatickets = $pegaticketss->fetchAll(PDO::FETCH_ASSOC);

			
			if($_SESSION["usuario"] != ""){
			renderizaAdmVerTickets($app, $pegatickets);
			}

			break;
			


//////////////////////////////// LISTA MENSAGEM /////////////////////////////////

			case "mensagemrecebida":

			//$app = new App();
			//$site = $app->loadModel("Mensagem");	
			
			
			
			$obj = $siteb->pegaMensagem($app->conexao,$_SESSION["userid"]);
			$pegamensagem = $obj->fetchAll(PDO::FETCH_ASSOC);

			if($_SESSION['userid'] != ""){
			renderizaMeusTickets($app, $pegamensagem);
			}
			
			break;

//////////////////////////////// LISTA MENSAGEM ENVIADAS /////////////////////////////////

			case "mensagemenviada":

			//$app = new App();
			//$site = $app->loadModel("Mensagem");	
			
			
			
			$obj = $siteb->pegaMensagemEnviadas($app->conexao,$_SESSION["userid"]);
			$pegamensagem = $obj->fetchAll(PDO::FETCH_ASSOC);

			if($_SESSION['userid'] != ""){
			renderizaMeusTicketsEnviados($app, $pegamensagem);
			}
			
			break;

//////////////////////////////// LISTA NOTIFICAÇÃO /////////////////////////////////

			case "listanotificacao":

			//$app = new App();
			//$site = $app->loadModel("Mensagem");	
			
			$obj = $siteb->pegaNotificacao($app->conexao,$_SESSION["userid"]);
			$pegamensagem = $obj->fetchAll(PDO::FETCH_ASSOC);

			if($_SESSION['userid'] != ""){
			renderizaMeusTicketsNotificacao($app, $pegamensagem);
			}
			
			break;

//////////////////////////////// MANDAR MENSAGEM /////////////////////////////////

			case "mandarmensagem":

			$app = new App();

			if(!empty($_POST)){

				
				$assunto = $_POST['assunto'];$mensagem = $_POST['mensagem'];

				$msg = $siteb->mandarMensagemParaAdmin($app->conexao,$_SESSION['userid'],$assunto,$mensagem);

				if($msg){

					$mensagemmandada = $alertas->AlertaStatus($app->conexao,'Mensagem mandada com Sucesso !!','1','mandarmensagem');

				}else{

					$mensagemmandada = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente!!','0','mandarmensagem');

				}
				

			}	

			if($_SESSION['userid'] != ""){
			renderizaAbrirTicket($app);
			}
			
			break;

///////////////////////////////////// VER MENSAGEM //////////////////////////////////

			case "vermensagem":

			
			$obj = $siteb->pegaVerMensagem($app->conexao,$_SESSION["userid"],$i);
			$pegavermensagem = $obj->fetchAll(PDO::FETCH_ASSOC);
			
			if($_SESSION['userid'] != ""){
			renderizaVerMensagem($app, $pegavermensagem);
			}
			
			break;

///////////////////////////////////// ADM VER MENSAGEM //////////////////////////////////

			case "admvermensagem":

			//$app = new App();
			//$site = $app->loadModel("Mensagem");	
			
			
			$obj = $siteb->pegaAdmVerMensagem($app->conexao,$i);
			$pegavermensagem = $obj->fetchAll(PDO::FETCH_ASSOC);
			
			if($_SESSION['userid'] != ""){
			renderizaAdmVerMensagem($app, $pegavermensagem);
			}
			
			break;

///////////////////////////////////// ADM MANDAR MENSAGEM //////////////////////////////////

			case "admmandarmensagem":

			$app = new App();

			if(!empty($_POST)){

				$usuario = $_POST['usuarios'];$para = $_POST['para'];
				$assunto = $_POST['assunto'];$mensagem = $_POST['mensagem'];

				if($para == '0'){
					$msg = $siteb->mandarAdmMensagemParaTodos($app->conexao,$assunto,$mensagem);
				}else if($para == '1'){
					$msg = $siteb->mandarAdmMensagemParaUsuario($app->conexao,$usuario,$assunto,$mensagem);
				}

				if($msg){

					$mensagemmandada = $alertas->AlertaStatus($app->conexao,'Mensagem mandada com Sucesso !!','1','admmandarmensagem');

				}else{

					$mensagemmandada = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente!!','0','admmandarmensagem');

				}
				

			}	
			
			
			$obj = $site->listaUsuarios($app->conexao);
			$usuarios = $obj->fetchAll(PDO::FETCH_ASSOC);
			
			if($_SESSION['userid'] != ""){
			renderizaAdmmandarmensagem($app, $usuarios);
			}
			
			break;

///////////////////////////////////// ADM MANDAR EMAIL //////////////////////////////////

			case "admmandaremail":

			if(!empty($_POST)){

				$usuario = $_POST['usuarios'];$para = $_POST['para'];
				$assunto = $_POST['assunto'];$mensagem = $_POST['mensagem'];

				if($para == '0'){
					$msg = $siteb->mandarAdmEmailParaTodos($app->conexao,$assunto,$mensagem);
				}else if($para == '1'){
					$msg = $siteb->mandarAdmEmailParaUsuario($app->conexao,$usuario,$assunto,$mensagem);
				}

				if($msg){

					$emailmandado = $alertas->AlertaStatus($app->conexao,'Email mandado com Sucesso !!','1','admmandaremail');

				}else{

					$emailmandado = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente!!','0','admmandaremail');

				}

				
			}	
			
			
			$obj = $site->listaUsuarios($app->conexao);
			$usuarios = $obj->fetchAll(PDO::FETCH_ASSOC);
			
			if($_SESSION['userid'] != ""){
			renderizaAdmmandaremail($app, $usuarios);
			}
			
			break;		


	////////////////////////////////////////// SAQUES PENDENTES  ///////////////////////////////

			case "saquespendentes":

			$app = new App();
			$saques = $app->loadModel("Saques");	
			
			
			$obj = $saques->pegaSaques($app->conexao,$_SESSION['userid'],0);
			$saquespendentes = $obj->fetchAll(PDO::FETCH_ASSOC);
			
			if($_SESSION['userid'] != ""){
			renderizaSaquesPendentes($app, $saquespendentes);
			}
			
			break;

			
////////////////////////////////////////// SAQUES ATIVOS  ///////////////////////////////

			case "saquespagos":

			$app = new App();
			$saques = $app->loadModel("Saques");	
			
			
			$obj = $saques->pegaSaques($app->conexao,$_SESSION['userid'], 1);
			$saquesativos = $obj->fetchAll(PDO::FETCH_ASSOC);
			
			if($_SESSION['userid'] != ""){
			renderizaSaquesAtivos($app, $saquesativos);
			}
			
			break;

			
////////////////////////////////////////// UPGRADE  ///////////////////////////////

			case "upgrade":

			$app = new App();
			$site = $app->loadModel("Saques");	
			
			$obj = $site->pegaSaques($app->conexao,$_SESSION["userid"], 1);
			$saquesativos = $obj->fetchAll(PDO::FETCH_ASSOC);
			
			if($_SESSION['userid'] != ""){
			renderizaUpgrade($app, $saquesativos);
			}
			
			break;
	

////////////////////////////////////////// PEDIR SAQUE  ///////////////////////////////

		case "pedirsaque":

			$app = new App();
			$siteg = $app->loadModel("Saques");
			//$siteb = $app->loadModel("Usuario");	
			$acao = '0';
			
		//	$pegarpermissao = $siteg->pegaPermissao($app->conexao, $_SESSION['userid']);
			
			//if($pegarpermissao == '1'){
			
			$pegaminimo = $siteg->pegaMinimo($app->conexao);
				
			if(!empty($_POST)){

				$acao = '1';
				$valor = $_POST['valor'];
				$senhafinanceiraf = $_POST['senhafinanceira'];
				$senhafinanceira = hash("md5",$senhafinanceiraf);

				$pegasaque = $siteg->pegaSaldo($app->conexao,$_SESSION["userid"]);
				//$dadosunity = $siteg->DadosUnity($app->conexao,$_SESSION["userid"]);

				if($pegasaque >= $valor){
					
					if($pegaminimo <= $valor){
						
					//	if($dadosunity != ''){
				
							$conferesaque = $siteg->pedirSaques($app->conexao,$_SESSION["userid"], $valor);
							
					//	}else{
						//	$mandaralerta = $alertas->AlertaStatus($app->conexao,'Você tem que inserir sua conta Newpay!!','2','dadospagamento');
					//	}
					
				//$sucesso = $conferesaque->fetchColumn();
					}else{
						$mandaralerta = $alertas->AlertaStatus($app->conexao,'Saldo Abaixo do valor mínimo!!','2','pedirsaque');
						
					}

				if($conferesaque){
					//$pedidosaque = $conferesaque->fetchAll(PDO::FETCH_ASSOC);
					$mandaralerta = $alertas->AlertaStatus($app->conexao,'Pedido efetuado com Sucesso!!','1','pedirsaque');
				

				}
								}else{
					$mandaralerta = $alertas->AlertaStatus($app->conexao,'Saldo Abaixo do valor pedido!!','2','pedirsaque');
					
				}

			}else{

				$acao = '0';
				
			
			}
			
			$pedirsaque = $siteg->pegaSaldo($app->conexao,$_SESSION["userid"]);

			if($_SESSION['userid'] != ""){
			renderizaPedirSaque($app, $acao, $pedirsaque, $pegaminimo);
			}
		//	}
			
			
		break;


////////////////////////////////////////// REINVESTIMENTO  ///////////////////////////////

		case "reinvestimento":

			$app = new App();
			$sitea = $app->loadModel("Financas");
			$siteb = $app->loadModel("Saques");	
			//$sitec = $app->loadModel("Usuario");	

			if(!empty($_POST)){

				
				$valor = $_POST['valor'];
				$senhafinanceiraf = $_POST['senhafinanceira'];
				$senhafinanceira = hash("md5",$senhafinanceiraf);

				$pegasaque = $siteb->pegaSaques($app->conexao,$_SESSION["userid"]);
				
				if($pegasaque >= $valor){

				
				$pegasenha = $site->pegaSenhaFinanceira($app->conexao,$_SESSION["userid"], $senhafinanceira);
				$senhaf = $pegasenha->fetchColumn();

				if($senhaf == $senhafinanceira){

				$conferesaque = $sitea->Reinvestimento($app->conexao,$_SESSION["userid"], $valor);
				$sucesso = $conferesaque->fetchColumn();


				
					$pedidosaque = $conferesaque->fetchAll(PDO::FETCH_ASSOC);
					print "<script>alert('Reinvestimento efetuado com Sucesso');</script>";	

				
				}else{
					print "<script>alert('Senha Financeira incorreta');</script>";
				}
				}else{
					print "<script>alert('Saldo Abaixo do valor pedido');</script>";
				}

			}else{

				$acao = '0';
				
			
			}

			$obj = $sitea->pegaSaldo($app->conexao,$_SESSION["userid"]);
			//$saldo= $obj->fetchAll(PDO::FETCH_ASSOC);
				
			if($_SESSION['userid'] != ""){
			renderizaReinvestimento($app, $obj);
			}
			
			
		break;
			
/////////////////////////////// DIRETOS PENDENTES /////////////////////////////////

			case "diretosp":

				$app = new App();
			//$site = $app->loadModel("Usuario");	
			
		
			// vamos carregar as financas
			$obj = $site->listaDiretospendentes($app->conexao,$_SESSION["userid"]);
			$diretosp = $obj->fetchAll(PDO::FETCH_ASSOC);

			if($_SESSION['userid'] != ""){
			renderizaDiretosPendentes($app, $diretosp);
			}
			
			break;
			
/////////////////////////////// DIRETOS  /////////////////////////////////

			case "diretos":

				$app = new App();
			//$site = $app->loadModel("Usuario");	
			
		
			// vamos carregar as financas
			$obj = $site->listaDiretosativos($app->conexao,$_SESSION["userid"]);
			$diretos = $obj->fetchAll(PDO::FETCH_ASSOC);

			if($_SESSION['userid'] != ""){
			renderizaDiretosAtivos($app, $diretos);
			}
			
			break;

////////////////////////////////////////// INVESTIR  ///////////////////////////////

		case "investir":

			$app = new App();
			$siteinvestir = $app->loadModel("Faturas");
			//$sitec = $app->loadModel("Usuario");	

			if(!empty($_POST)){

				
				$valor = $_POST['valor'];
				$senhafinanceiraf = $_POST['senhafinanceira'];
				$senhafinanceira = hash("md5",$senhafinanceiraf);

				$pegasenha = $site->pegaSenhaFinanceira($app->conexao,$_SESSION["userid"], $senhafinanceira);
				$senhaf = $pegasenha->fetchColumn();

				if($senhaf == $senhafinanceira){

				$gerafatura = $siteinvestir->cadastrarfatura($app->conexao,$_SESSION["userid"], $valor);
				
				if($gerafatura){
				print "<script>alert('Fatura Gerada com Sucesso');</script>";	
				print "<script>window.location='faturaspendentes';</script>";
				}
				
				}else{
					print "<script>alert('Senha Financeira incorreta');</script>";
					print "<script>window.location='investir';</script>";
				}
				

			}
	
			if($_SESSION['userid'] != ""){
			renderizaInvestir($app);
			}
			
			
		break;

////////////////////////////////////////// ADM CADASTRAR INVESTIMENTO  ///////////////////////////////

		case "admcadastrarinvestimento":

			$app = new App();
			$siteb = $app->loadModel("Financas");
			//$siteb = $app->loadModel("Usuario");

			$valor = $_POST['valor'];
			$useridd = $_POST['usuarios'];$datat = $_POST['data'];
			$tipo = $_POST['tipo'];

			$datab = date('Y-m-d H:i:s', strtotime($datat))	;		
	
			if(!empty($_POST)){
				
				$objb = $siteb->CadastrarInvestimento($app->conexao, $useridd,$valor, $datab, $tipo);

				if($objb){
					print "<script>alert('Cadastro efetuado com Sucesso!');</script>";
				}else{
					print "<script>alert('Houve Problemas, tente novamente!');</script>";
				}

			}

			$obj = $site->listaUsuarios($app->conexao);
			$usuarios = $obj->fetchAll(PDO::FETCH_ASSOC);
			
			if($_SESSION['userid'] != ""){
			renderizaAdmCadastrarInvestimentos($app, $usuarios);
			}
			
			break;


		////////////////////////////////////////// SAIR  ////////////////////////////////

			case "sair":

			$app = new App();

			$_SESSION['usuario'] = NULL;

			$_SESSION['userid'] = NULL;

			unset($_SESSION['usuario']);

			unset($_SESSION['userid']);
			
			
			print "<script>alert('Logout efetuado com Sucesso!');</script>";
			print "<script>window.location='./';</script>";
			
			break;

//////////////////////////  ADM USUÁRIOS //////////////////////////////////////

			case "admusuarios":

			$app = new App();
			$ciclos = $app->loadModel("Ciclos");

			//$alocars = $conf->Alocar($app->conexao,18);
			
			$obj = $site->listaUsuarios($app->conexao);
			$usuarios = $obj->fetchAll(PDO::FETCH_ASSOC);
	
			if(!empty($_POST)){
		
				$exclusao = $_POST['exclusao'];$idexcluir = $_POST['idexcluir'];
				$bloquear = $_POST['bloquear'];$idbloqueio = $_POST['bloqueio'];
				$desbloquear = $_POST['desbloquear'];$iddesbloqueio = $_POST['desbloqueio'];
				$ativar = $_POST['ativar'];$idativa = $_POST['idativa'];
				$desativar = $_POST['desativar'];$iddesativa = $_POST['iddesativa'];
				$alocar = $_POST['alocar'];$idalocar = $_POST['idalocar'];
		
				if($exclusao == '1'){
					
				
					$objb = $site->excluirUsuarios($app->conexao, $idexcluir);

					if($objb){
						$usuarioexcluido = $alertas->AlertaStatus($app->conexao,'Usuário excluido com Sucesso!','1','admusuarios');
					}else{
						$usuarioexcluido = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente!','0','admusuarios');
					}

				}

				if($bloquear == '1'){
					
				
					$objb = $site->bloqueioUsuarios($app->conexao, $idbloqueio);

					if($objb){
						$usuariobloqueado = $alertas->AlertaStatus($app->conexao,'Usuário bloqueado com Sucesso!','1','admusuarios');
					}else{
						$usuariobloqueado = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente!','0','admusuarios');
					}

				

				}

				if($desbloquear == '1'){
					
				
					$objb = $site->desbloqueioUsuarios($app->conexao, $iddesbloqueio);

					if($objb){
						$usuariodesbloqueado = $alertas->AlertaStatus($app->conexao,'Usuário desbloqueado com Sucesso!','1','admusuarios');
					}else{
						$usuariodesbloqueado = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente!','0','admusuarios');
					}

				}

				if($ativar == '1'){
					
				
					$obj = $site->ativarUsuario($app->conexao,$idativa);
			
					if($obj){
						$ativarusuario = $alertas->AlertaStatus($app->conexao,'Ativado com Sucesso !!','1','admusuarios');
					}else{
						$ativarusuario = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente !!','0','admusuarios');
					}

				}

				if($desativar == '1'){
					
				
					$obj = $site->desativarUsuario($app->conexao,$iddesativa);
			
					if($obj){
						$desativarusuario = $alertas->AlertaStatus($app->conexao,'Desativado com Sucesso !!','1','admusuarios');
					}else{
						$desativarusuario = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente !!','0','admusuarios');
					}

				}

				if($alocar == '1'){
					
				
					$criar = $ciclos->Alocarmatriz($app->conexao,$idalocar);
						
						if($criar){
							$estourado = $alertas->AlertaStatus($app->conexao,'Usuário alocado com Sucesso!!','1','admusuarios');
						}else{
							$estourado = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente!!','0','admusuarios');
						}

				}



			}
				
			if($_SESSION['userid'] != ""){
			renderizaAdmUsuarios($app, $usuarios, $alocars);
			}
			
			break;
			
//////////////////////////  ADM USUÁRIOS ATIVOS//////////////////////////////////////

			case "admusuariosativos":

			$app = new App();
			//$site = $app->loadModel("Usuario");	
			
			
			$obj = $site->listaUsuariosAtivos($app->conexao);
			$usuarios = $obj->fetchAll(PDO::FETCH_ASSOC);
	
		

			if($_SESSION['userid'] != ""){
			renderizaAdmUsuariosAtivos($app, $usuarios);
			}
			
			break;
			
//////////////////////////  ADM USUÁRIOS PENDENTES //////////////////////////////////////

			case "admusuariospendentes":

			$app = new App();
			
			
			$obj = $site->listaUsuariosPendentes($app->conexao);
			$usuarios = $obj->fetchAll(PDO::FETCH_ASSOC);
	
			if(!empty($_POST)){

				
					
			$exclusao = $_POST['exclusao'];$idexcluir = $_POST['idexcluir'];
	
			if($exclusao == '1'){
				
			
				$objb = $site->excluirUsuarios($app->conexao, $idexcluir);

				if($objb){
					$usuarioexcluido = $alertas->AlertaStatus($app->conexao,'Usuário excluido com Sucesso!','1','admusuarios');
				}else{
					$usuarioexcluido = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente!','0','admusuarios');
				}

			}
				}

			if($_SESSION['userid'] != ""){
			renderizaAdmUsuariosPendentes($app, $usuarios);
			}
			
			break;

//////////////////////////  ADM USUÁRIOS INVESTIMENTOS //////////////////////////////////////

			case "admusuariosinvestimentos":

			$app = new App();
			$site = $app->loadModel("Financas");	
			
			
			$obj = $site->listaInvestimentosporUsuario($app->conexao);
			$usuarios = $obj->fetchAll(PDO::FETCH_ASSOC);


			if($_SESSION['userid'] != ""){
			renderizaAdmUsuariosInvestimentos($app, $usuarios);
			}
			
			break;

//////////////////////////  ADM ADD SALDO BLOQUEADO //////////////////////////////////////

			case "admaddsaldobloqueado":

			$app = new App();
			//$site = $app->loadModel("Usuario");
			$siteb = $app->loadModel("Financas");	

			if(!empty($_POST)){

				$iduser = $_POST['usuarios'];$investimento = $_POST['investimento'];
				$valor = $_POST['valor'];

				$addsaldo = $siteb->addSaldoBloqueado($app->conexao,$iduser,$investimento,$valor);

				if($addsaldo){
					print "<script>alert('Saldo Bloqueado adicionado com sucesso !');</script>";
					print "<script>window.location='admaddsaldobloqueado';</script>";
				}

			}
			
			
			$obj = $site->listaUsuarios($app->conexao);
			$usuarios = $obj->fetchAll(PDO::FETCH_ASSOC);

			if($_SESSION['userid'] != ""){
			renderizaAdmaddSaldoBloqueado($app, $usuarios);
			}
			
			break;

//////////////////////////  ADM LISTA DOCUMENTOS //////////////////////////////////////

			case "admlistadocumentos":

			$app = new App();
			$site = $app->loadModel("Imagem");	
			
			
			$obj = $site->listarDocumentos($app->conexao);
			$usuarios = $obj->fetchAll(PDO::FETCH_ASSOC);

			if($_SESSION['userid'] != ""){
			renderizaAdmListaDocumentos($app, $usuarios);
			}
			
			break;

//////////////////////////  ADM LISTA MENSAGENS //////////////////////////////////////

			case "admlistamensagem":

			$app = new App();
			
			if(!empty($_POST)){

			$exclusao = $_POST['exclusao'];$idexcluir = $_POST['idexcluir'];
	
			if($exclusao == '1'){
				
			
				$objbgf = $siteb->excluirMensagem($app->conexao, $idexcluir);

				if($objb){
					$mensagemexcluida = $alertas->AlertaStatus($app->conexao,'Mensagem excluida com Sucesso!','1','admlistamensagem');
				}else{
					$mensagemexcluida = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente!','0','admlistamensagem');
				}

			}
				}
			
			$objt = $siteb->listaMensagem($app->conexao);
			$mensagem = $objt->fetchAll(PDO::FETCH_ASSOC);

			if($_SESSION['userid'] != ""){
			renderizaAdmListaMensagem($app, $mensagem);
			}
			
			break;

//////////////////////////  ADM INVESTIMENTOS //////////////////////////////////////

			case "adminvestimentos":

			$app = new App();
			$site = $app->loadModel("Financas");

			if(!empty($_POST)){
				
				$idinativar = $_POST['idinativar'];$inativacao = $_POST['inativacao'];
				
				if($inativacao == '1'){

					$objb = $site->inativarInvestimentos($app->conexao,$idinativar);
					
					if($objb){
					print "<script>alert('investimento inativado com Sucesso!');</script>";
					print "<script>window.location='adminvestimento';</script>";
				}else{
					print "<script>alert('Houve Problemas, tente novamente!');</script>";
				}

				}

			}	
			
			
			$obj = $site-> AdmInvestimentos($app->conexao);
			$usuarios = $obj->fetchAll(PDO::FETCH_ASSOC);

			if($_SESSION['userid'] != ""){
			renderizaAdmInvestimentos($app, $usuarios);
			}
			
			break;

//////////////////////////  ADM REINVESTIMENTOS //////////////////////////////////////

			case "admreinvestimentos":

			$app = new App();
			$site = $app->loadModel("Financas");	

			if(!empty($_POST)){
				
				$idinativar = $_POST['idinativar'];$inativacao = $_POST['inativacao'];
				
				if($inativacao == '1'){

					$objb = $site->inativarInvestimentos($app->conexao,$idinativar);
					
					if($objb){
					print "<script>alert('investimento inativado com Sucesso!');</script>";
					print "<script>window.location='adminvestimento';</script>";
				}else{
					print "<script>alert('Houve Problemas, tente novamente!');</script>";
				}

				}

			}	
			
			
			$obj = $site->AdmReinvestimentos($app->conexao);
			$usuarios = $obj->fetchAll(PDO::FETCH_ASSOC);

			if($_SESSION['userid'] != ""){
			renderizaAdmReinvestimentos($app, $usuarios);
			}
			
			break;

		
//////////////////////////  ADM VER DOCUMENTOS //////////////////////////////////////

			case "verdocumentos":

			$app = new App();
			$site = $app->loadModel("Imagem");
				

			if(!empty($_POST)){
				
				$aprovar1 = $_POST['aprovar1'];$aprovar2 = $_POST['aprovar2'];
				$iddoc1 = $_POST['iddoc1'];$iddoc2 = $_POST['iddoc2'];
				$reprovar1 = $_POST['reprovar1'];$reprovar2 = $_POST['reprovar2'];
				$iddoc11 = $_POST['iddoc11'];$iddoc22 = $_POST['iddoc22'];
				$motivo1 = $_POST['motivo11'];$motivo2 = $_POST['motivo22'];

				if($aprovar1 == '1'){
					$aprovara = $site->aprovarDocumentos1($app->conexao, $iddoc1);
				}else if($aprovar2 == '1'){
					$aprovar = $site->aprovarDocumentos2($app->conexao, $iddoc2);
				}else if($reprovar1 == '1'){
				
					$reprovar = $site->reprovarDocumentos1($app->conexao, $iddoc11, $motivo1);
				}else if($reprovar2 == '1'){
					$reprovar = $site->reprovarDocumentos2($app->conexao, $iddoc22, $motivo2);
				}

			}
			
			
			$obj = $site->VerDocumentos($app->conexao, $i);
			$usuarios = $obj->fetchAll(PDO::FETCH_ASSOC);

			if($_SESSION['userid'] != ""){
			renderizaAdmVerDocumentos($app, $usuarios);
			}
			
			break;

		////////////////////////// 	CONFIGURAÇÕES //////////////////////////////////////

		case "configuracoes":

		$app = new App();
		

			$config1 = $conf->config($app->conexao,1);
			$config2 = $conf->config($app->conexao,2);
			$config3 = $conf->config($app->conexao,3);
			$config4 = $conf->config($app->conexao,4);
			$config5 = $conf->config($app->conexao,5);
			$config6 = $conf->config($app->conexao,6);
			$config7 = $conf->config($app->conexao,7);
			$config8 = $conf->config($app->conexao,8);
			$config9 = $conf->config($app->conexao,9);
			$config10 = $conf->config($app->conexao,10);
			$config11 = $conf->config($app->conexao,11);
			$config12 = $conf->config($app->conexao,12);
			$config13 = $conf->config($app->conexao,13);
			$config14 = $conf->config($app->conexao,14);
			$config16 = $conf->config($app->conexao,16);
			$config17 = $conf->config($app->conexao,17);
			$config18 = $conf->config($app->conexao,18);
			$config19 = $conf->config($app->conexao,19);
			$config20 = $conf->config($app->conexao,20);

			if(!empty($_POST)){
				
				
				
				##########################################   ciclo 1    ######################################################
				$ciclo1 = $_POST['ciclo1'];
				if($ciclo1 == '1'){
					$valor1 = $_POST['valor1'];$upgrade1 = $_POST['upgrade1'];$lateralidade1 = $_POST['lateralidade1'];$sustentabilidade1 = $_POST['sustentabilidade1'];$reentrada1 = $_POST['reentrada1'];
					
					$confi1 = $conf->editarconfig1($app->conexao,$valor1,$upgrade1,$lateralidade1,$sustentabilidade1,$reentrada1,1);

					if($confi1){
						$atualizado1 = $alertas->AlertaStatus($app->conexao,'Atualizado com Sucesso !!','1','configuracoes');
					}else{
						$atualizado1 = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente !!','0','configuracoes');
					}
				}

				####################################################################################################################

				##########################################   ciclo 2    ######################################################
				$ciclo2 = $_POST['ciclo2'];
				if($ciclo2 == '1'){
					$valor2 = $_POST['valor2'];$upgrade2 = $_POST['upgrade2'];$lateralidade2 = $_POST['lateralidade2'];$sustentabilidade2 = $_POST['sustentabilidade2'];$reentrada2 = $_POST['reentrada2'];
					
					$confi2 = $conf->editarconfig2($app->conexao,$valor2,$upgrade2,$lateralidade2,$sustentabilidade2,$reentrada2,2);

					if($confi2){
						$atualizado2 = $alertas->AlertaStatus($app->conexao,'Atualizado com Sucesso !!','1','configuracoes');
					}else{
						$atualizado2 = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente !!','0','configuracoes');
					}
				}

				####################################################################################################################


				##########################################   ciclo 3    ######################################################
				$ciclo3 = $_POST['ciclo3'];
				if($ciclo3 == '1'){
					$valor3 = $_POST['valor3'];$upgrade3 = $_POST['upgrade3'];$lateralidade3 = $_POST['lateralidade3'];$sustentabilidade3 = $_POST['sustentabilidade3'];$reentrada3 = $_POST['reentrada3'];
					
					$confi3 = $conf->editarconfig3($app->conexao,$valor3,$upgrade3,$lateralidade3,$sustentabilidade3,$reentrada3,3);

					if($confi3){
						$atualizado3 = $alertas->AlertaStatus($app->conexao,'Atualizado com Sucesso !!','1','configuracoes');
					}else{
						$atualizado3 = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente !!','0','configuracoes');
					}
				}

				####################################################################################################################

				##########################################   ciclo 4    ######################################################
				$ciclo4 = $_POST['ciclo4'];
				if($ciclo4 == '1'){
					$valor4 = $_POST['valor4'];$upgrade4 = $_POST['upgrade4'];$lateralidade4 = $_POST['lateralidade4'];$sustentabilidade4 = $_POST['sustentabilidade4'];$reentrada4 = $_POST['reentrada4'];
					
					$confi4 = $conf->editarconfig4($app->conexao,$valor4,$upgrade4,$lateralidade4,$sustentabilidade4,$reentrada4,4);

					if($confi4){
						$atualizado4 = $alertas->AlertaStatus($app->conexao,'Atualizado com Sucesso !!','1','configuracoes');
					}else{
						$atualizado4 = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente !!','0','configuracoes');
					}
				}

				####################################################################################################################

				##########################################   ciclo 5    ######################################################
				$ciclo5 = $_POST['ciclo5'];
				if($ciclo5 == '1'){
					$valor5 = $_POST['valor5'];$upgrade5 = $_POST['upgrade5'];$lateralidade5 = $_POST['lateralidade5'];$sustentabilidade5 = $_POST['sustentabilidade5'];$reentrada5 = $_POST['reentrada5'];
					
					$confi5 = $conf->editarconfig5($app->conexao,$valor5,$upgrade5,$lateralidade5,$sustentabilidade5,$reentrada5,5);

					if($confi5){
						$atualizado5 = $alertas->AlertaStatus($app->conexao,'Atualizado com Sucesso !!','1','configuracoes');
					}else{
						$atualizado5 = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente !!','0','configuracoes');
					}
				}

				####################################################################################################################

				##########################################   ciclo 6    ######################################################
				$ciclo6 = $_POST['ciclo6'];
				if($ciclo6 == '1'){
					$valor6 = $_POST['valor6'];$upgrade6 = $_POST['upgrade6'];$lateralidade6 = $_POST['lateralidade6'];$sustentabilidade6 = $_POST['sustentabilidade6'];$reentrada6 = $_POST['reentrada6'];
					
					$confi6 = $conf->editarconfig6($app->conexao,$valor6,$upgrade6,$lateralidade6,$sustentabilidade6,$reentrada6,6);

					if($confi6){
						$atualizado6 = $alertas->AlertaStatus($app->conexao,'Atualizado com Sucesso !!','1','configuracoes');
					}else{
						$atualizado6 = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente !!','0','configuracoes');
					}
				}

				####################################################################################################################

				##########################################   ciclo 7    ######################################################
				$ciclo7 = $_POST['ciclo7'];
				if($ciclo7 == '1'){
					$valor7 = $_POST['valor7'];$upgrade7 = $_POST['upgrade7'];$lateralidade7 = $_POST['lateralidade7'];$sustentabilidade7 = $_POST['sustentabilidade7'];$reentrada7 = $_POST['reentrada7'];
					
					$confi7 = $conf->editarconfig7($app->conexao,$valor7,$upgrade7,$lateralidade7,$sustentabilidade7,$reentrada7,7);

					if($confi7){
						$atualizado7 = $alertas->AlertaStatus($app->conexao,'Atualizado com Sucesso !!','1','configuracoes');
					}else{
						$atualizado7 = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente !!','0','configuracoes');
					}
				}

				####################################################################################################################

				##########################################   ciclo 8    ######################################################
				$ciclo8 = $_POST['ciclo8'];
				if($ciclo8 == '1'){
					$valor8 = $_POST['valor8'];$upgrade8 = $_POST['upgrade8'];$lateralidade8 = $_POST['lateralidade8'];$sustentabilidade8 = $_POST['sustentabilidade8'];$reentrada8 = $_POST['reentrada8'];
					
					$confi8 = $conf->editarconfig8($app->conexao,$valor8,$upgrade8,$lateralidade8,$sustentabilidade8,$reentrada8,8);

					if($confi8){
						$atualizado8 = $alertas->AlertaStatus($app->conexao,'Atualizado com Sucesso !!','1','configuracoes');
					}else{
						$atualizado8 = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente !!','0','configuracoes');
					}
				}

				####################################################################################################################
				
				##########################################   ciclo 9    ######################################################
				$ciclo9 = $_POST['ciclo9'];
				if($ciclo9 == '1'){
					$valor9 = $_POST['valor9'];$upgrade9 = $_POST['upgrade9'];$lateralidade9 = $_POST['lateralidade9'];$sustentabilidade9 = $_POST['sustentabilidade9'];$reentrada9 = $_POST['reentrada9'];
					
					$confi9 = $conf->editarconfig19($app->conexao,$valor9,$upgrade9,$lateralidade9,$sustentabilidade9,$reentrada9,19);

					if($confi9){
						$atualizado9 = $alertas->AlertaStatus($app->conexao,'Atualizado com Sucesso !!','1','configuracoes');
					}else{
						$atualizado9 = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente !!','0','configuracoes');
					}
				}

				####################################################################################################################
				
				##########################################   ciclo 10    ######################################################
				$ciclo10 = $_POST['ciclo10'];
				if($ciclo10 == '1'){
					$valor10 = $_POST['valor10'];$upgrade10 = $_POST['upgrade10'];$lateralidade10 = $_POST['lateralidade10'];$sustentabilidade10 = $_POST['sustentabilidade10'];$reentrada10 = $_POST['reentrada10'];
					
					$confi10 = $conf->editarconfig20($app->conexao,$valor10,$upgrade10,$lateralidade10,$sustentabilidade10,$reentrada10,20);

					if($confi10){
						$atualizado10 = $alertas->AlertaStatus($app->conexao,'Atualizado com Sucesso !!','1','configuracoes');
					}else{
						$atualizado10 = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente !!','0','configuracoes');
					}
				}

				####################################################################################################################

				##########################################   PATROCINADOR    ######################################################
				$patrocinador = $_POST['patrocinador'];
				if($patrocinador == '1'){
					$valor9 = $_POST['valor9'];$habilitar9 = $_POST['habilitar9'];
					
					$confi9 = $conf->editarconfig9($app->conexao,$valor9,$habilitar9,9);

					if($confi9){
						$atualizado9 = $alertas->AlertaStatus($app->conexao,'Atualizado com Sucesso !!','1','configuracoes');
					}else{
						$atualizado9 = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente !!','0','configuracoes');
					}
				}

				####################################################################################################################

				##########################################   LINK PATROCINADOR    ######################################################
				$linkpatrocinador = $_POST['linkpatrocinador'];
				if($linkpatrocinador == '1'){
					$habilitar10 = $_POST['habilitar10'];
					
					$confi10 = $conf->editarconfig10($app->conexao,$habilitar10,10);

					if($confi10){
						$atualizado10 = $alertas->AlertaStatus($app->conexao,'Atualizado com Sucesso !!','1','configuracoes');
					}else{
						$atualizado10 = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente !!','0','configuracoes');
					}
				}

				####################################################################################################################

				##########################################   REENTRADA    ######################################################
				$reentrada = $_POST['reentradas'];
				if($reentrada == '1'){
					$reentradas11 = $_POST['reentrada11'];$data11 = $_POST['data11'];$hora11 = $_POST['hora11'];$sustentabilidade11 = $_POST['sustentabilidade11'];
					$confi11 = $conf->editarconfig11($app->conexao,$reentradas11,$data11,$hora11,$sustentabilidade11,11);

					if($confi11){
						$atualizado11 = $alertas->AlertaStatus($app->conexao,'Atualizado com Sucesso !!','1','configuracoes');
					}else{
						$atualizado11 = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente !!','0','configuracoes');
					}
				}

				####################################################################################################################

				##########################################   CRIAR REENTRADA    ######################################################
				$criarreentradas = $_POST['criarreentradas'];
				if($criarreentradas == '1'){
					$habilitar12 = $_POST['habilitar12'];$reentrada12 = $_POST['reentrada12'];
					
					$confi12 = $conf->editarconfig12($app->conexao,$habilitar12,$reentrada12,12);

					if($confi12){
						$atualizado12 = $alertas->AlertaStatus($app->conexao,'Atualizado com Sucesso !!','1','configuracoes');
					}else{
						$atualizado12 = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente !!','0','configuracoes');
					}
				}

				####################################################################################################################

				##########################################   MANUTENÇÃO    ######################################################
				$manutencao = $_POST['manutencao'];
				if($manutencao == '1'){
					$habilitar13 = $_POST['habilitar13'];$motivo13 = $_POST['motivo13'];
					
					$confi13 = $conf->editarconfig13($app->conexao,$habilitar13,$motivo13,13);

					if($confi13){
						$atualizado13 = $alertas->AlertaStatus($app->conexao,'Atualizado com Sucesso !!','1','configuracoes');
					}else{
						$atualizado13 = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente !!','0','configuracoes');
					}
				}

				####################################################################################################################

				##########################################   BLOQUEIO   ######################################################
				$bloqueio = $_POST['bloqueio'];
				if($bloqueio == '1'){
					$habilitar14 = $_POST['habilitar14'];
					
					$confi14 = $conf->editarconfig14($app->conexao,$habilitar14,14);

					if($confi14){
						$atualizado14 = $alertas->AlertaStatus($app->conexao,'Atualizado com Sucesso !!','1','configuracoes');
					}else{
						$atualizado14 = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente !!','0','configuracoes');
					}
				}

				####################################################################################################################


				##########################################   EMAIL   ######################################################
				$email = $_POST['email'];
				if($email == '1'){
					$habilitar16 = $_POST['habilitar16'];
					
					$confi16 = $conf->editarconfig16($app->conexao,$habilitar16,16);

					if($confi16){
						$atualizado16 = $alertas->AlertaStatus($app->conexao,'Atualizado com Sucesso !!','1','configuracoes');
					}else{
						$atualizado16 = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente !!','0','configuracoes');
					}
				}

				####################################################################################################################

				##########################################   MIBANK   ######################################################
				$mibank = $_POST['mibank'];
				if($mibank == '1'){
					$habilitar17 = $_POST['habilitar17'];
					
					$confi17 = $conf->editarconfig17($app->conexao,$habilitar17,17);

					if($confi17){
						$atualizado17 = $alertas->AlertaStatus($app->conexao,'Atualizado com Sucesso !!','1','configuracoes');
					}else{
						$atualizado17 = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente !!','0','configuracoes');
					}
				}

				####################################################################################################################

				##########################################  GERAR PAGAMENTO  ######################################################
				$gerarpagamento = $_POST['gerarpagamento'];
				if($gerarpagamento == '1'){
					$habilitar18 = $_POST['habilitar18'];
					
					$confi18 = $conf->editarconfig17($app->conexao,$habilitar18,18);

					if($confi18){
						$atualizado18 = $alertas->AlertaStatus($app->conexao,'Atualizado com Sucesso !!','1','configuracoes');
					}else{
						$atualizado18 = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente !!','0','configuracoes');
					}
				}

				####################################################################################################################

			}

			if($_SESSION['userid'] != ""){
			renderizaConfiguracoes($app,$config1,$config2,$config3,$config4,$config5,$config6,$config7,$config8,$config9,$config10,$config11,$config12,$config13,$config14,$config16,$config17,$config18,$config19,$config20);
			}
		
		break;
			
////////////////////////// 	LIBERAR SALDO //////////////////////////////////////

			case "admliberarsaldo":

			$app = new App();
			$financas = $app->loadModel("Financas");

			if(!empty($_POST)){

				$usuarios = $_POST['usuarios'];
				$saldobloqueado = $_POST['saldobloqueado'];

				$obj = $financas->LiberarSaldo($app->conexao,$usuarios,$saldobloqueado);
				
				if($obj){
					$atualizado1 = $alertas->AlertaStatus($app->conexao,'Atualizado com Sucesso !!','1','admliberarsaldo');
				}else{
					$atualizado1 = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente !!','0','admliberarsaldo');
				}
				

			}

			
			$obj = $site->listaUsuarios($app->conexao);
			$usuarios = $obj->fetchAll(PDO::FETCH_ASSOC);

			if($_SESSION['userid'] != ""){
			renderizaLiberarSaldo($app, $usuarios);
			}
			
			break;
			
/////////////////////////////// TRAVAS /////////////////////////////////

			case "trava":

				$app = new App();
			//$site = $app->loadModel("Usuario");	
		
			
			
			// vamos carregar as financas
			$trava = $site->VerTrava($app->conexao,$_SESSION["userid"]);

			if($_SESSION['userid'] != ""){
			renderizaTravas($app, $trava);
			}
			
			break;

	////////////////////////////////////// LISTA PLANOS //////////////////////////////////////

	case "listaplanos":

	$app = new App();
	$sitep = $app->loadModel("Planos");

	if(!empty($_POST)){
		
		$ligar = $_POST['ligacao'];
		$desligar = $_POST['desligacao'];
		$idfatura1 = $_POST['idfatura1'];
		$idfatura2 = $_POST['idfatura2'];
		
		
		
		if($ligar == '1'){
			
			$liga = $siteb->LigaDoacao($app->conexao,$idfatura1, $_SESSION['userid']);
			
			if($liga){
			
				print "<script>alert('Investimento Ligado!!');</script>";
				print "<script>window.location='minhasdoacoes';</script>";
				
			}else{
				print "<script>alert('Voce nao possue saldo investimento!!');</script>";
				print "<script>window.location='minhasdoacoes';</script>";	
			}
			
		}else if($desligar == '1'){
			
			$desliga = $siteb->DesligaDoacao($app->conexao,$idfatura2, $_SESSION['userid']);
			
			print "<script>alert('Investimento Desligado!!');</script>";
			print "<script>window.location='minhasdoacoes';</script>";
		}
	}

	$obj = $sitep->pegaPlanosporUsuario($app->conexao, $_SESSION['userid']);
	$listaplanos = $obj->fetchAll(PDO::FETCH_ASSOC);

	if($_SESSION['userid'] != ""){
	renderizaListaPlanos($app, $listaplanos);
	}
	
	break;

////////////////////////////////////// COMPRAR PLANOS //////////////////////////////////////

case "comprarpacote":

$app = new App();
$sitep = $app->loadModel("Planos");

if(!empty($_POST)){
	
	$ligar = $_POST['ligacao'];
	$desligar = $_POST['desligacao'];
	$idfatura1 = $_POST['idfatura1'];
	$idfatura2 = $_POST['idfatura2'];
	
	
	
	if($ligar == '1'){
		
		$liga = $siteb->LigaDoacao($app->conexao,$idfatura1, $_SESSION['userid']);
		
		if($liga){
		
			print "<script>alert('Investimento Ligado!!');</script>";
			print "<script>window.location='minhasdoacoes';</script>";
			
		}else{
			print "<script>alert('Voce nao possue saldo investimento!!');</script>";
			print "<script>window.location='minhasdoacoes';</script>";	
		}
		
	}else if($desligar == '1'){
		
		$desliga = $siteb->DesligaDoacao($app->conexao,$idfatura2, $_SESSION['userid']);
		
		print "<script>alert('Investimento Desligado!!');</script>";
		print "<script>window.location='minhasdoacoes';</script>";
	}
}

$obj = $sitep->pegaPlanos($app->conexao);
$listaplanos = $obj->fetchAll(PDO::FETCH_ASSOC);

if($_SESSION['userid'] != ""){
renderizaCompraPlanos($app, $listaplanos);
}

break;


////////////////////////////////////// ADM LISTA PLANOS //////////////////////////////////////

case "admlistaplanos":

$app = new App();
$sitep = $app->loadModel("Planos");

		if(!empty($_POST)){
				
			$exclusao = $_POST['exclusao'];$idexcluir = $_POST['idexcluir'];
			$ativar = $_POST['ativar'];$idativar = $_POST['idativar'];

			if($exclusao == '1'){
				
			
				$objb = $sitep->excluirPlanos($app->conexao, $idexcluir);

				if($objb){
					print "<script>alert('Plano excluido com Sucesso!');</script>";
				}else{
					print "<script>alert('Houve Problemas, tente novamente!');</script>";
				}

			}

		}

		$obj = $sitep->pegaPlanos($app->conexao);
		$listaplanos = $obj->fetchAll(PDO::FETCH_ASSOC);

		if($_SESSION['userid'] != ""){
		renderizaAdmListaPlanos($app, $listaplanos);
		}

		break;


////////////////////////////////////// ADM EDITAR PLANOS //////////////////////////////////////

case "admeditarplanos":

$app = new App();
$sitep = $app->loadModel("Planos");

		if(!empty($_POST)){
	
			$nomeplano = $_POST['nomeplano'];
			$valores = $_POST['valor'];
	
				$liga = $sitep->atualizarPlanos($app->conexao,$nomeplano, $valores, $i);
				
				if($liga){
				
					print "<script>alert('Plano editado com Sucesso!!');</script>";
					print "<script>window.location='admeditarplanos?i=$i';</script>";
					
				}else{
					print "<script>alert('Houve problemas, tente novamente!!');</script>";
					print "<script>window.location='admeditarplanos?i=$i';</script>";	
				}
				
			
		}

		$obj = $sitep->pegaPlanosporId($app->conexao, $i);
		$editarplanos = $obj->fetchAll(PDO::FETCH_ASSOC);

		if($_SESSION['userid'] != ""){
		renderizaAdmEditarPlanos($app, $editarplanos);
		}

		break;

////////////////////////////////////// ADM CADASTRAR PLANOS //////////////////////////////////////

		case "admcadastrarplanos":

		$app = new App();
		$sitep = $app->loadModel("Planos");

		if(!empty($_POST)){
	
			$nomeplano = $_POST['nomeplano'];
			$valores = $_POST['valor'];
	
				$liga = $sitep->cadastrarPlanos($app->conexao,$nomeplano, $valores);
				
				if($liga){
					$planocadastrado = $alertas->PlanoCadastrado($app->conexao,'Plano cadastrado com Sucesso!!','1');
					
				}else{
					$planocadastrado = $alertas->PlanoCadastrado($app->conexao,'Houve Problemas, tente novamente !!','0');
				}
				
			
		}

		if($_SESSION['userid'] != ""){
		renderizaAdmCadastrarPlanos($app);
		}

		break;

		////////////////////////// 	ATIVAR USUÁRIO//////////////////////////////////////

		case "ativarusuario":

		$app = new App();

			$obj = $site->ativarUsuario($app->conexao,$i);
			
			if($obj){
				$ativarusuario = $alertas->AtivadoUsuario($app->conexao,'Ativado com Sucesso !!','1');
			}else{
				$ativarusuario = $alertas->AtivadoUsuario($app->conexao,'Houve Problemas, tente novamente !!','0');
			}



		break;

		////////////////////////// 	POSIÇÃO ADM CICLO 1  //////////////////////////////////////

		case "admciclo1":

		$app = new App();
		$ciclo = $app->loadModel("Ciclos");


		$obj = $ciclo->pegaAdmPosicao1($app->conexao);
		$ciclos1 = $obj->fetchAll(PDO::FETCH_ASSOC);

		if($_SESSION['userid'] != ""){
		renderizaAdmCiclo1($app,$ciclos1);
		}


		break;

		////////////////////////// 	POSIÇÃO ADM CICLO 2  //////////////////////////////////////

		case "admciclo2":

		$app = new App();
		$ciclo = $app->loadModel("Ciclos");


		$obj = $ciclo->pegaAdmPosicao2($app->conexao);
		$ciclos2 = $obj->fetchAll(PDO::FETCH_ASSOC);

		if($_SESSION['userid'] != ""){
		renderizaAdmCiclo2($app,$ciclos2);
		}


		break;

		////////////////////////// 	POSIÇÃO ADM CICLO 3  //////////////////////////////////////

		case "admciclo3":

		$app = new App();
		$ciclo = $app->loadModel("Ciclos");


		$obj = $ciclo->pegaAdmPosicao3($app->conexao);
		$ciclos3 = $obj->fetchAll(PDO::FETCH_ASSOC);

		if($_SESSION['userid'] != ""){
		renderizaAdmCiclo3($app,$ciclos3);
		}


		break;
		
		////////////////////////// 	POSIÇÃO ADM CICLO 4  //////////////////////////////////////

		case "admciclo4":

		$app = new App();
		$ciclo = $app->loadModel("Ciclos");


		$obj = $ciclo->pegaAdmPosicao4($app->conexao);
		$ciclos4 = $obj->fetchAll(PDO::FETCH_ASSOC);

		if($_SESSION['userid'] != ""){
		renderizaAdmCiclo4($app,$ciclos4);
		}


		break;
		
		
		////////////////////////// 	POSIÇÃO ADM CICLO 4  //////////////////////////////////////

		case "admciclo4":

		$app = new App();
		$ciclo = $app->loadModel("Ciclos");


		$obj = $ciclo->pegaAdmPosicao4($app->conexao);
		$ciclos4 = $obj->fetchAll(PDO::FETCH_ASSOC);

		if($_SESSION['userid'] != ""){
		renderizaAdmCiclo4($app,$ciclos4);
		}


		break;
		
		////////////////////////// 	POSIÇÃO ADM CICLO 5  //////////////////////////////////////

		case "admciclo5":

		$app = new App();
		$ciclo = $app->loadModel("Ciclos");


		$obj = $ciclo->pegaAdmPosicao5($app->conexao);
		$ciclos5 = $obj->fetchAll(PDO::FETCH_ASSOC);

		if($_SESSION['userid'] != ""){
		renderizaAdmCiclo5($app,$ciclos5);
		}


		break;
		
		////////////////////////// 	POSIÇÃO ADM CICLO 6  //////////////////////////////////////

		case "admciclo6":

		$app = new App();
		$ciclo = $app->loadModel("Ciclos");


		$obj = $ciclo->pegaAdmPosicao6($app->conexao);
		$ciclos6 = $obj->fetchAll(PDO::FETCH_ASSOC);

		if($_SESSION['userid'] != ""){
		renderizaAdmCiclo6($app,$ciclos6);
		}


		break;
		
		////////////////////////// 	POSIÇÃO ADM CICLO 7  //////////////////////////////////////

		case "admciclo7":

		$app = new App();
		$ciclo = $app->loadModel("Ciclos");


		$obj = $ciclo->pegaAdmPosicao7($app->conexao);
		$ciclos7 = $obj->fetchAll(PDO::FETCH_ASSOC);

		if($_SESSION['userid'] != ""){
		renderizaAdmCiclo7($app,$ciclos7);
		}


		break;
		
		////////////////////////// 	POSIÇÃO ADM CICLO 8  //////////////////////////////////////

		case "admciclo8":

		$app = new App();
		$ciclo = $app->loadModel("Ciclos");


		$obj = $ciclo->pegaAdmPosicao8($app->conexao);
		$ciclos8 = $obj->fetchAll(PDO::FETCH_ASSOC);

		if($_SESSION['userid'] != ""){
		renderizaAdmCiclo8($app,$ciclos8);
		}


		break;
		
		////////////////////////// 	POSIÇÃO ADM CICLO 9  //////////////////////////////////////

		case "admciclo9":

		$app = new App();
		$ciclo = $app->loadModel("Ciclos");


		$obj = $ciclo->pegaAdmPosicao9($app->conexao);
		$ciclos9 = $obj->fetchAll(PDO::FETCH_ASSOC);

		if($_SESSION['userid'] != ""){
		renderizaAdmCiclo9($app,$ciclos9);
		}


		break;
		
		////////////////////////// 	POSIÇÃO ADM CICLO 10  //////////////////////////////////////

		case "admciclo10":

		$app = new App();
		$ciclo = $app->loadModel("Ciclos");


		$obj = $ciclo->pegaAdmPosicao10($app->conexao);
		$ciclos10 = $obj->fetchAll(PDO::FETCH_ASSOC);

		if($_SESSION['userid'] != ""){
		renderizaAdmCiclo10($app,$ciclos10);
		}


		break;

		////////////////////////// 	POSIÇÃO CICLO 1  //////////////////////////////////////

		case "ciclo1":

		$app = new App();
		$ciclo = $app->loadModel("Ciclos");


		$obj = $ciclo->pegaPosicao1($app->conexao);
		$ciclos1 = $obj->fetchAll(PDO::FETCH_ASSOC);

		if($_SESSION['userid'] != ""){
		renderizaCiclo1($app,$ciclos1);
		}


		break;

		////////////////////////// 	POSIÇÃO CICLO 2  //////////////////////////////////////

		case "ciclo2":

		$app = new App();
		$ciclo = $app->loadModel("Ciclos");


		$obj = $ciclo->pegaPosicao2($app->conexao);
		$ciclos2 = $obj->fetchAll(PDO::FETCH_ASSOC);

		if($_SESSION['userid'] != ""){
		renderizaCiclo2($app,$ciclos2);
		}


		break;

		////////////////////////// 	POSIÇÃO CICLO 3  //////////////////////////////////////

		case "ciclo3":

		$app = new App();
		$ciclo = $app->loadModel("Ciclos");


		$obj = $ciclo->pegaPosicao3($app->conexao);
		$ciclos3 = $obj->fetchAll(PDO::FETCH_ASSOC);

		if($_SESSION['userid'] != ""){
		renderizaCiclo3($app,$ciclos3);
		}


		break;

		////////////////////////// 	POSIÇÃO CICLO 4  //////////////////////////////////////

		case "ciclo4":

		$app = new App();
		$ciclo = $app->loadModel("Ciclos");


		$obj = $ciclo->pegaPosicao4($app->conexao);
		$ciclos4 = $obj->fetchAll(PDO::FETCH_ASSOC);

		if($_SESSION['userid'] != ""){
		renderizaCiclo4($app,$ciclos4);
		}


		break;

		////////////////////////// 	POSIÇÃO CICLO 5  //////////////////////////////////////

		case "ciclo5":

		$app = new App();
		$ciclo = $app->loadModel("Ciclos");


		$obj = $ciclo->pegaPosicao5($app->conexao);
		$ciclos5 = $obj->fetchAll(PDO::FETCH_ASSOC);

		if($_SESSION['userid'] != ""){
		renderizaCiclo5($app,$ciclos5);
		}


		break;

		////////////////////////// 	POSIÇÃO CICLO 6  //////////////////////////////////////

		case "ciclo6":

		$app = new App();
		$ciclo = $app->loadModel("Ciclos");


		$obj = $ciclo->pegaPosicao6($app->conexao);
		$ciclos6 = $obj->fetchAll(PDO::FETCH_ASSOC);

		if($_SESSION['userid'] != ""){
		renderizaCiclo6($app,$ciclos6);
		}


		break;

		////////////////////////// 	POSIÇÃO CICLO 7  //////////////////////////////////////

		case "ciclo7":

		$app = new App();
		$ciclo = $app->loadModel("Ciclos");


		$obj = $ciclo->pegaPosicao7($app->conexao);
		$ciclos7 = $obj->fetchAll(PDO::FETCH_ASSOC);

		if($_SESSION['userid'] != ""){
		renderizaCiclo7($app,$ciclos7);
		}


		break;

		////////////////////////// 	POSIÇÃO CICLO 8  //////////////////////////////////////

		case "ciclo8":

		$app = new App();
		$ciclo = $app->loadModel("Ciclos");


		$obj = $ciclo->pegaPosicao8($app->conexao);
		$ciclos8 = $obj->fetchAll(PDO::FETCH_ASSOC);

		if($_SESSION['userid'] != ""){
		renderizaCiclo8($app,$ciclos8);
		}


		break;
		
		////////////////////////// 	POSIÇÃO CICLO 9  //////////////////////////////////////

		case "ciclo9":

		$app = new App();
		$ciclo = $app->loadModel("Ciclos");


		$obj = $ciclo->pegaPosicao9($app->conexao);
		$ciclos9 = $obj->fetchAll(PDO::FETCH_ASSOC);

		if($_SESSION['userid'] != ""){
		renderizaCiclo9($app,$ciclos9);
		}


		break;
		
		////////////////////////// 	POSIÇÃO CICLO 10  //////////////////////////////////////

		case "ciclo10":

		$app = new App();
		$ciclo = $app->loadModel("Ciclos");


		$obj = $ciclo->pegaPosicao10($app->conexao);
		$ciclos10 = $obj->fetchAll(PDO::FETCH_ASSOC);

		if($_SESSION['userid'] != ""){
		renderizaCiclo10($app,$ciclos10);
		}


		break;



		////////////////////////// 	DESATIVAR USUÁRIO//////////////////////////////////////

		case "desativarusuario":

		$app = new App();


			$obj = $site->desativarUsuario($app->conexao,$i);
			
			if($obj){
				$desativarusuario = $alertas->DesativarUsuario($app->conexao,'Desativado com Sucesso !!','1');
			}else{
				$desativarusuario = $alertas->DesativarUsuario($app->conexao,'Houve Problemas, tente novamente !!','0');
			}



		break;

////////////////////////////////////// LISTA COMPROVANTES //////////////////////////////////////

			case "listacomprovantes":

			

			$app = new App();
			$site = $app->loadModel("Imagem");
			$siteb = $app->loadModel("Faturas");


			if(!empty($_POST)){
		
			$exclusao = $_POST['exclusao'];$idexcluir = $_POST['idexcluir'];
			$ativar = $_POST['ativar'];$idativar = $_POST['idativar'];

			if($exclusao == '1'){
				
			
				$objb = $site->excluirComprovante($app->conexao, $idexcluir);

				if($objb){
					print "<script>alert('Comprovante excluido com Sucesso!');</script>";
				}else{
					print "<script>alert('Houve Problemas, tente novamente!');</script>";
				}

			}

			if($ativar == '1'){
				
			
				$objc = $site->ativarComprovante($app->conexao, $idativar);
				$objd = $siteb->ativarFatura($app->conexao, $objc);

				if($objc){
					print "<script>alert('Comprovante e Fatura ativadas com Sucesso!');</script>";
				}else{
					print "<script>alert('Houve Problemas, tente novamente!');</script>";
				}

			}
			}

			$obj = $site->pegaListaComprovantes($app->conexao,$_SESSION['userid']);
			$listacomprovantes = $obj->fetchAll(PDO::FETCH_ASSOC);

			if($_SESSION['userid'] != ""){
			renderizaListaComprovantes($app, $listacomprovantes);
			}
			
			break;

		////////////////////////////////////// ADM COMPROVANTES PENDENTES //////////////////////////////////////

		case "admcomprovantespendentes":

		$app = new App();
		$site = $app->loadModel("Imagem");
		$siteb = $app->loadModel("Faturas");
		$ciclos = $app->loadModel("Ciclos");


		if(!empty($_POST)){
	
		$exclusao = $_POST['exclusao'];$idexcluir = $_POST['idexcluir'];
		$aprovar = $_POST['aprovar'];$idativar = $_POST['iddoacao'];
		$reprovar = $_POST['aprovar'];$idreprovar = $_POST['iddoacao'];

		if($exclusao == '1'){
			
		
			$objb = $site->excluirComprovante($app->conexao, $idexcluir);

			if($objb){
				$admcomprovanteexcluido = $alertas->AlertaStatus($app->conexao,'Comprovante excluido com Sucesso!','1','admcomprovantespendentes');
			}else{
				$admcomprovanteexcluido = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente!','0','admcomprovantespendentes');
			}

		}

		if($aprovar == '1'){

			$idfatura = $site->ativarComprovante($app->conexao, $idativar);

				$retorno = $ciclos->Retorno($app->conexao, $idfatura);

				$explode = explode("-",$retorno);

				$up = $explode[0];$fase = $explode[1];

			


				if($up == 'upgrade'){

					
					$upgrade = $ciclos->Upgrade($app->conexao,  $fase,$idfatura);
					$sustentabilidade = $ciclos->Sustentabilidade($app->conexao, $fase,$idfatura);

				}


				if($objc){
					$comprovanteativar = $alertas->AlertaStatus($app->conexao,'Comprovante e Fatura ativadas com Sucesso!','1','admcomprovantespendentes');
				}else{
					$comprovanteativar = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente!','0','admcomprovantespendentes');
				}
			}else if($reprovar == '1'){

				$idfatura = $site->reprovarComprovante($app->conexao, $idreprovar);
	
				if($idfatura){
					$comprovantereprovar = $alertas->AlertaStatus($app->conexao,'Comprovante reprovado com Sucesso!','1','admcomprovantespendentes');
				}else{
					$comprovantereprovar = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente!','0','admcomprovantespendentes');
				}
				}
		

		}
		

		$obj = $site->pegaListaAdmComprovantesPendentes($app->conexao);
		$listacomprovantesp = $obj->fetchAll(PDO::FETCH_ASSOC);

		if($_SESSION['userid'] != ""){
		renderizaAdmComprovantesPendentes($app, $listacomprovantesp);
		}
		
		break;

		////////////////////////////////////// ADM COMPROVANTES APROVADOS //////////////////////////////////////

		case "admcomprovantesaprovados":

		
		$app = new App();
		$site = $app->loadModel("Imagem");
		$siteb = $app->loadModel("Faturas");


		$obj = $site->pegaListaAdmComprovantesAprovados($app->conexao);
		$listacomprovantes = $obj->fetchAll(PDO::FETCH_ASSOC);

		if($_SESSION['userid'] != ""){
		renderizaAdmComprovantesAprovados($app, $listacomprovantes);
		}
		
		break;




		////////////////////////// 	RESET //////////////////////////////////////

		case "reset":

		$app = new App();
		$reset = $app->loadModel("Reset");

			$obj = $reset->Resetar($app->conexao,$i);
			
			if($obj){
				$resetado = $alertas->Resetado($app->conexao,'Resetado com Sucesso !!','1');
			}else{
				$resetado = $alertas->Resetado($app->conexao,'Houve Problemas, tente novamente !!','0');
			}



		break;

		////////////////////////////////////// COMPROVANTES PENDENTES //////////////////////////////////////

		case "comprovantespendentes":

		$app = new App();
		$site = $app->loadModel("Imagem");
		$siteb = $app->loadModel("Faturas");
		$ciclos = $app->loadModel("Ciclos");


		if(!empty($_POST)){
	
		$exclusao = $_POST['exclusao'];$idexcluir = $_POST['idexcluir'];
		$aprovar = $_POST['aprovar'];$idativar = $_POST['iddoacao'];
		$reprovar = $_POST['reprovar'];$idreprovar = $_POST['iddoacao'];

		if($exclusao == '1'){
			
		
			$objb = $site->excluirComprovante($app->conexao, $idexcluir);

			if($objb){
				$comprovanteexcluido = $alertas->ComprovanteExcluido($app->conexao,'Comprovante excluido com Sucesso!','1');
			}else{
				$comprovanteexcluido = $alertas->ComprovanteExcluido($app->conexao,'Houve Problemas, tente novamente!','0');
			}

		}else if($aprovar == '1'){


				$idfatura = $site->ativarComprovante($app->conexao, $idativar);

				$retorno = $ciclos->Retorno($app->conexao, $idfatura);

				$explode = explode("-",$retorno);

				$up = $explode[0];$fase = $explode[1];

			
				

				if($up == 'upgrade'){

				
					$upgrade = $ciclos->Upgrade($app->conexao,  $fase,$idfatura);
					$sustentabilidade = $ciclos->Sustentabilidade($app->conexao, $fase,$idfatura);

				}


				if($objc){
					$comprovanteativar = $alertas->AlertaStatus($app->conexao,'Comprovante e Fatura ativadas com Sucesso!','1','');
				}else{
					$comprovanteativar = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente!','0','');
				}
			}else if($reprovar == '1'){

				$idfatura = $site->reprovarComprovante($app->conexao, $idreprovar);
	
					if($idfatura){
						$comprovantereprovar = $alertas->AlertaStatus($app->conexao,'Comprovante reprovado com Sucesso!','1','');
					}else{
						$comprovantereprovar = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente!','0','');
					}
				}
			
		}
		

		$obj = $site->pegaComprovantesPendentes($app->conexao,$_SESSION['userid']);
		$listacomprovantesp = $obj->fetchAll(PDO::FETCH_ASSOC);

		if($_SESSION['userid'] != ""){
		renderizaComprovantesPendentes($app, $listacomprovantesp);
		}
		
		break;

		////////////////////////////////////// COMPROVANTES APROVADOS //////////////////////////////////////

		case "comprovantesaprovados":

		$app = new App();
		$site = $app->loadModel("Imagem");
		$siteb = $app->loadModel("Faturas");


		if(!empty($_POST)){
	
		$exclusao = $_POST['exclusao'];$idexcluir = $_POST['idexcluir'];
		$ativar = $_POST['ativar'];$idativar = $_POST['idativar'];

		if($exclusao == '1'){
			
		
			$objb = $site->excluirComprovante($app->conexao, $idexcluir);

			if($objb){
				$comprovanteexcluido = $alertas->ComprovanteExcluido($app->conexao,'Comprovante excluido com Sucesso!','1');
			}else{
				$comprovanteexcluido = $alertas->ComprovanteExcluido($app->conexao,'Houve Problemas, tente novamente!','0');
			}

		}

		if($ativar == '1'){
			
		
			$objc = $site->ativarComprovante($app->conexao, $idativar);
			$objd = $siteb->ativarFatura($app->conexao, $objc);

			if($objc){
				$comprovanteativar = $alertas->ComprovanteAtivar($app->conexao,'Comprovante e Fatura ativadas com Sucesso!','1');
			}else{
				$comprovanteativar = $alertas->ComprovanteAtivar($app->conexao,'Houve Problemas, tente novamente!','0');
			}

		}
		}

		$obj = $site->pegaComprovantesAprovados($app->conexao,$_SESSION['userid']);
		$listacomprovantes = $obj->fetchAll(PDO::FETCH_ASSOC);

		if($_SESSION['userid'] != ""){
		renderizaComprovantesAprovados($app, $listacomprovantes);
		}
		
		break;


///////////////////////////////////////// DOAÇÕES RECEBIDAS ////////////////////////////////

		case "doacoesrecebidas":

		$app = new App();
		$site = $app->loadModel("Imagem");	
		
		
		
		$obj = $site->pegaDoacoesRecebidas($app->conexao, $_SESSION['userid']);
		$faturas = $obj->fetchAll(PDO::FETCH_ASSOC);

		if($_SESSION['userid'] != ""){
		renderizaDoacoesAprovados($app, $faturas);
		}
		
		break;

///////////////////////////////////////// DOAÇÕES FEITAS ////////////////////////////////

		case "doacoesfeitas":

		$app = new App();
		$site = $app->loadModel("Imagem");	


		$obj = $site->pegaDoacoesFeitas($app->conexao, $_SESSION['userid']);
		$faturas = $obj->fetchAll(PDO::FETCH_ASSOC);

		if($_SESSION['userid'] != ""){
		renderizaDoacoesFeitas($app, $faturas);
		}

		break;

///////////////////////////////////////// MEUS LOGINS ////////////////////////////////

		case "meuslogins":

		$app = new App();
		$ciclo = $app->loadModel("Ciclos");	


		$obj = $ciclo->meusLogins($app->conexao, $_SESSION['userid']);
		$meuslogins = $obj->fetchAll(PDO::FETCH_ASSOC);

		if($_SESSION['userid'] != ""){
		renderizaMeusLogins($app, $meuslogins);
		}

		break;

///////////////////////////////////////// MEUS LOGINS POR CPF ////////////////////////////////

		case "meusloginscpf":

		$app = new App();
		$ciclo = $app->loadModel("Ciclos");	

		$cpf = $site->pegaCPF($app->conexao, $_SESSION['userid']);

		$obj = $ciclo->meusLoginsporCPF($app->conexao, $cpf);
		$meuslogins = $obj->fetchAll(PDO::FETCH_ASSOC);

		if($_SESSION['userid'] != ""){
		renderizaMeusLoginsporCPF($app, $meuslogins);
		}

		break;
		
/////////////////////////////// NOTIFICAÇÃO  /////////////////////////////////

			case "notificacoes":

			$app = new App();
			
			

			if(!empty($_POST)){

				$assunto = $_POST['assunto'];$mensagem = $_POST['mensagem'];
				
					// precisamos fazer o upload da imagem
				$img = $app->uploadImagemNot($_FILES["imagem"]);
				
				
				$novanot = $not->NovaNot($app->conexao,$assunto,$mensagem, $img);

				if($novanot){
					$mandaralerta = $alertas->AlertaStatus($app->conexao,'Notificação inserido com Sucesso','1','notificacoes');
				}else{
					$mandaralerta = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente','0','notificacoes');
				}
				
			}

			
			$noti = $not->pegaNotificacao($app->conexao);
			$peganot = $noti->fetchAll(PDO::FETCH_ASSOC);
		

			if($_SESSION["userid"] != ""){
				renderizaNot($app, $peganot);
			}

			break;
			
			
/////////////////////////////// LISTA PDF  /////////////////////////////////

			case "admlistapdf":

			$app = new App();
			$material = $app->loadModel("Material");
			

			if(!empty($_POST)){

				$assunto = $_POST['assunto'];$mensagem = $_POST['mensagem'];
				$idexcluir = $_POST['idexcluir'];$exclusao = $_POST['exclusao'];
				
				if($exclusao == '1'){
					
					$epdf = $material->excluirPdf($app->conexao,$idexcluir);
					
					if($epdf){
					$mandaralerta = $alertas->AlertaStatus($app->conexao,'PDF excluido com Sucesso','1','admlistapdf');
				}else{
					$mandaralerta = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente','0','admlistapdf');
				}
					
				}else{
				
					// precisamos fazer o upload da imagem
				$img = $app->uploadImagemNot($_FILES["imagem"]);
				
				
				$novanot = $material->NovaNot($app->conexao,$assunto,$mensagem, $img);

				if($novanot){
					$mandaralerta = $alertas->AlertaStatus($app->conexao,'Notificação inserido com Sucesso','1','admlistapdf');
				}else{
					$mandaralerta = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente','0','admlistapdf');
				}
				}
				
			}

			
			$noti = $material->pegaPDF($app->conexao);
			$pegapdf = $noti->fetchAll(PDO::FETCH_ASSOC);
		

			if($_SESSION["userid"] != ""){
				renderizaAdmListapdf($app, $pegapdf);
			}

			break;
			
/////////////////////////////// LISTA VIDEO  /////////////////////////////////

			case "admlistavideos":

			$app = new App();
			$material = $app->loadModel("Material");
			

			if(!empty($_POST)){

				$idexcluir = $_POST['idexcluir'];$exclusao = $_POST['exclusao'];
				
				if($exclusao == '1'){
					
					$epdf = $material->excluirPdf($app->conexao,$idexcluir);
					
					if($epdf){
						$mandaralerta = $alertas->AlertaStatus($app->conexao,'PDF excluido com Sucesso','1','admlistapdf');
					}else{
						$mandaralerta = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente','0','admlistapdf');
					}
				}
				
			}

			
			$noti = $material->pegaVideo($app->conexao);
			$pegavideo = $noti->fetchAll(PDO::FETCH_ASSOC);
		

			if($_SESSION["userid"] != ""){
				renderizaAdmListavideo($app, $pegavideo);
			}

			break;
			
			
/////////////////////////////// LISTA PDF  /////////////////////////////////

			case "listapdf":

			$app = new App();
			$material = $app->loadModel("Material");
			

			
			$noti = $material->pegaPDF($app->conexao);
			$pegapdf = $noti->fetchAll(PDO::FETCH_ASSOC);
		

			if($_SESSION["userid"] != ""){
				renderizaPdf($app, $pegapdf);
			}

			break;
			
/////////////////////////////// LISTA VIDEO  /////////////////////////////////

			case "listavideos":

			$app = new App();
			$material = $app->loadModel("Material");
			

			if(!empty($_POST)){

				$assunto = $_POST['assunto'];$mensagem = $_POST['mensagem'];
				
					// precisamos fazer o upload da imagem
				$img = $app->uploadImagemNot($_FILES["imagem"]);
				
				
				$novanot = $material->NovaNot($app->conexao,$assunto,$mensagem, $img);

				if($novanot){
					$mandaralerta = $alertas->AlertaStatus($app->conexao,'Notificação inserido com Sucesso','1','notificacoes');
				}else{
					$mandaralerta = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente','0','notificacoes');
				}
				
			}

			
			$noti = $material->pegaVideo($app->conexao);
			$pegavideo = $noti->fetchAll(PDO::FETCH_ASSOC);
		

			if($_SESSION["userid"] != ""){
				renderizaVideo($app, $pegavideo);
			}

			break;
			
////////////////////////////////////// ADM CADASTRAR PDF //////////////////////////////////////

		case "admcadastrarpdf":

		$app = new App();
		$material = $app->loadModel("Material");

		if(!empty($_POST)){

		
			
				
				if($_FILES["arquivo"]["tmp_name"] == ""){
				
					$selecioneimagem = $alertas->AlertaStatus($app->conexao,'Selecione um PDF','2','admcadastrarpdf');
			
				
				}else{
	
					$ext = @end(explode('.', $_FILES['arquivo']['name']));

			
					$foto = md5(uniqid(time())).".".$ext;
	
						$diretorio = "material/";
	
						if(move_uploaded_file($_FILES["arquivo"]["tmp_name"],"material/" . $foto)){
	
				
			$titulo = $_POST['titulo'];
			$descricao = $_POST['descricao'];

				$objb = $material->CadastrarPDF($app->conexao, $foto,$titulo,$descricao);

				if($objb){
					print "<script>alert('PDF Cadastrado com Sucesso!');</script>";
				}else{
					print "<script>alert('Houve Problemas, tente novamente!');</script>";
				}
			}
			
			}

		}


		if($_SESSION['userid'] != ""){
			renderizaAdmCadastrarPDF($app);
		}

		break;
		
////////////////////////////////////// ADM CADASTRAR VÍDEO //////////////////////////////////////

		case "admcadastrarvideo":

		$app = new App();
		$material = $app->loadModel("Material");

		if(!empty($_POST)){
				
			$link = $_POST['link'];$titulo = $_POST['titulo'];
			$descricao = $_POST['descricao'];

				$objb = $material->CadastrarVideo($app->conexao, $link,$titulo,$descricao);

				if($objb){
					print "<script>alert('Vídeo Cadastrado com Sucesso!');</script>";
				}else{
					print "<script>alert('Houve Problemas, tente novamente!');</script>";
				}


		}



		if($_SESSION['userid'] != ""){
			renderizaAdmCadastrarVideo($app);
		}

		break;
		
////////////////////////////////////// ADM EDITAR  Vídeo //////////////////////////////////////

		case "admeditarvideo":

		$app = new App();
		$material = $app->loadModel("Material");

		if(!empty($_POST)){
				
			$link = $_POST['link'];$titulo = $_POST['titulo'];$descricao = $_POST['descricao'];

				$objb = $material->EditarVideo($app->conexao, $link,$titulo,$descricao, $i);

				if($objb){
					print "<script>alert('Vídeo Editado com Sucesso!');</script>";
				}else{
					print "<script>alert('Houve Problemas, tente novamente!');</script>";
				}


		}



		$obj = $material->pegaVideoId($app->conexao, $i);
		$listamaterial = $obj->fetchAll(PDO::FETCH_ASSOC);

		if($_SESSION['userid'] != ""){
			renderizaAdmEditarVideo($app,$listamaterial);
		}

		break;
		
////////////////////////////////////// COMPRAR VOUCHER //////////////////////////////////////

		case "comprarvoucher":

		$app = new App();
		$financas = $app->loadModel("Financas");

		if(!empty($_POST)){
				
			

				$objb = $financas->ComprarVoucher($app->conexao, $_SESSION['userid']);

				if($objb){
					print "<script>alert('Voucher Comprado com Sucesso!');</script>";
				}else{
					print "<script>alert('Houve Problemas, tente novamente!');</script>";
				}


		}

		$pegavoucher = $financas->pegaVoucher($app->conexao,$_SESSION['userid']);

		if($_SESSION['userid'] != ""){
			renderizaComprarVoucher($app,$pegavoucher);
		}

		break;
		
////////////////////////////////////// COMPRAR VOUCHER //////////////////////////////////////

		case "comprarvoucherb":

		$app = new App();
		$financas = $app->loadModel("Financas");

		if(!empty($_POST)){
				
			

				$objb = $financas->ComprarVoucherb($app->conexao, $_SESSION['userid']);

				if($objb){
					print "<script>alert('Voucher Comprado com Sucesso!');</script>";
				}else{
					print "<script>alert('Houve Problemas, tente novamente!');</script>";
				}


		}

		$pegavoucher = $financas->pegaVoucherb($app->conexao,$_SESSION['userid']);

		if($_SESSION['userid'] != ""){
			renderizaComprarVoucherb($app,$pegavoucher);
		}

		break;
		
		
////////////////////////////////////// ATIVAR VOUCHER //////////////////////////////////////

		case "ativarvoucher":

		$app = new App();
		$financas = $app->loadModel("Financas");

		if(!empty($_POST)){
				
			

				$objb = $financas->AtivarVoucher($app->conexao, $_SESSION['userid']);

				if($objb){
					$mandaralerta = $alertas->AlertaStatus($app->conexao,'Ativado com Sucesso!','1','./');
					
				}else{
					$mandaralerta = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente!','0','ativarvoucher');
				}


		}

		$voucher = $site->pegaVoucher($app->conexao, $_SESSION['userid']);

		if($_SESSION['userid'] != ""){
			renderizaAtivarVoucher($app, $voucher);
		}

		break;
		
		
////////////////////////////////////// ATIVAR VOUCHER //////////////////////////////////////

		case "ativarvoucherb":

		$app = new App();
		$financas = $app->loadModel("Financas");

		if(!empty($_POST)){
				
			

				$objb = $financas->AtivarVoucherb($app->conexao, $_SESSION['userid']);

				if($objb){
					$mandaralerta = $alertas->AlertaStatus($app->conexao,'Ativado com Sucesso!','1','./');
					
				}else{
					$mandaralerta = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente!','0','ativarvoucher');
				}


		}

		$voucher = $site->pegaVoucherb($app->conexao, $_SESSION['userid']);

		if($_SESSION['userid'] != ""){
			renderizaAtivarVoucherb($app, $voucher);
		}

		break;


////////////////////////////////////// ADM EDITAR  PDF //////////////////////////////////////

		case "admeditarpdf":
		
		$app = new App();
		$material = $app->loadModel("Material");
		
		if(!empty($_POST)){
		
			if($_FILES["arquivo"]["tmp_name"] == ""){
						
				$link = $_POST['link'];$titulo = $_POST['titulo'];$descricao = $_POST['descricao'];
		
				$objb = $material->EditarPdf($app->conexao, $foto,$titulo,$descricao, $i);
		
				if($objb){
					print "<script>alert('PDF Editado com Sucesso!');</script>";
				}else{
					print "<script>alert('Houve Problemas, tente novamente!');</script>";
				}
		
			
			}else{
		
				$ext = @end(explode('.', $_FILES['arquivo']['name']));
		
		
				$foto = md5(uniqid(time())).".".$ext;
		
					$diretorio = "material/";
		
					if(move_uploaded_file($_FILES["arquivo"]["tmp_name"],"material/" . $foto)){
				
			$link = $_POST['link'];$titulo = $_POST['titulo'];$descricao = $_POST['descricao'];
		
				$objb = $material->EditarPdf($app->conexao, $foto,$titulo,$descricao, $i);
		
				if($objb){
					print "<script>alert('PDF Editado com Sucesso!');</script>";
				}else{
					print "<script>alert('Houve Problemas, tente novamente!');</script>";
				}
			}
		}
		
		}
		
		
		
		$obj = $material->pegaPdfId($app->conexao, $i);
		$listamaterial = $obj->fetchAll(PDO::FETCH_ASSOC);
		
		if($_SESSION['userid'] != ""){
			renderizaAdmEditarPdf($app,$listamaterial);
		}
		
		break;
		

/////////////////////////////// ECOMMERCE /////////////////////////////////

			case "ecommerce":

			$app = new App();
			$produtos = $app->loadModel("Produtos");
			
		

			$pegaprodutos = $produtos->listaProdutos($app->conexao);
			$listaprodutos = $pegaprodutos->fetchAll(PDO::FETCH_ASSOC);
			
			if($_SESSION["userid"] != ""){
				renderizaEcommerce($app, $listaprodutos);
			}

			break;
			
/////////////////////////////// ECOMMERCE /////////////////////////////////

			case "carrinho":

			$app = new App();
			$produtos = $app->loadModel("Produtos");
			
			if(!empty($_POST)){
				
			 $checkout = $_POST['checkout'];$cadastrar = $_POST['cadastrar'];$valorfrete = $_POST['valorfrete'];$tempoentrega = $_POST['tempoentrega'];	
			$fazercheckout = $produtos->fazerCheckout($app->conexao,$valorfrete,$tempoentrega,$_SESSION['userid']);
			
			 if($fazercheckout){
					   
					   $_SESSION['carrinhointerno'][$_SESSION['userid']] = NULL;
						unset($_SESSION['carrinhointerno'][$_SESSION['userid']]);
			
					print "<script>alert('Produto processado com Sucesso!!');</script>";
					print "<script>window.location='pedidospendentes';</script>";
					$mandaralerta = $alertas->AlertaStatus($app->conexao,'Produto processado com Sucesso!!','1','./');
				}else{
					print "<script>alert('Houve Problemas, tente novamente');</script>";
					print "<script>window.location='carrinho';</script>";
					$mandaralerta = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente','0','carrinho');
				}	
						
					
			
			}
			
			

			$pegaprodutos = $produtos->listaProdutos($app->conexao);
			$listaprodutos = $pegaprodutos->fetchAll(PDO::FETCH_ASSOC);
			
			if($_SESSION["userid"] != ""){
				renderizaCarrinho($app, $listaprodutos);
			}

			break;
			
///////////////////////////////////  PEDIDOS PENDENTES /////////////////////////////////

			case "pedidospendentes":

			$app = new App();
		
			$pedidos = $app->loadModel("Pedidos");	

			if(!empty($_POST)){
		
			$exclusao = $_POST['exclusao'];$idexcluir = $_POST['idexcluir'];
			$pagarcomsaldo = $_POST['pagarcomsaldo'];$idfaturap = $_POST['idfaturap'];

			if($exclusao == '1'){
				
			
				$objb = $pedidos->excluirPedidos($app->conexao, $idexcluir);

				if($objb){
				
					$faturaexcluida = $alertas->AlertaStatus($app->conexao,'Pedido excluido com Sucesso!','1','pedidospendentes');
				
				}else{
					
					$faturaexcluida = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente','0','pedidospendentes');
				}

			}
			if($pagarcomsaldo == '1'){
				
				$objc = $pedidos->pagarPedidos($app->conexao, $_SESSION['userid'], $idfaturap);

				if($objc){
					print "<script>alert('Pedido pago com Sucesso!');</script>";
					print "<script>window.location='pedidospendentes';</script>";
					//$faturaexcluida = $alertas->AlertaStatus($app->conexao,'Pedido pago com Sucesso!','1','pedidospendentes');
				
				}else{
					print "<script>alert('Saldo Compras Insuficiente!');</script>";
					print "<script>window.location='pedidospendentes';</script>";
					//$faturaexcluida = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente','0','pedidospendentes');
				}
					
			}

				}
			
			
			// vamos carregar as financas
			$obj = $pedidos->listaPedidosPendentes($app->conexao, $_SESSION['userid']);
			$pedidosp = $obj->fetchAll(PDO::FETCH_ASSOC);

			if($_SESSION['userid'] != ""){
				
				renderizaPedidosPendentes($app, $pedidosp);
			}
			

			break;
			
/////////////////////////////////// PEDIDOS PAGOS  /////////////////////////////////

			case "pedidospagos":

			$app = new App();
			
			$pedidos = $app->loadModel("Pedidos");	

			if(!empty($_POST)){
		
			$exclusao = $_POST['exclusao'];$idexcluir = $_POST['idexcluir'];

			if($exclusao == '1'){
				
			
				$objb = $pedidos->excluirPedidos($app->conexao, $idexcluir);

				if($objb){
				
					$faturaexcluida = $alertas->AlertaStatus($app->conexao,'Pagamento excluido com Sucesso!','1','pedidos?i='.$i);
				
				}else{
					
					$faturaexcluida = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente','0','pedidos?i='.$i);
				}

			}

				}
			
			
			// vamos carregar as financas
			$obj = $pedidos->listaPedidosPagos($app->conexao, $_SESSION['userid']);
			$pedidosp = $obj->fetchAll(PDO::FETCH_ASSOC);

			if($_SESSION['userid'] != ""){
				
				renderizaPedidosPagos($app, $pedidosp);
			}
			

			break;


/////////////////////  MINHA REDE //////////////////////////////////

	case "minharede":

	$app = new App();
	$siteg = $app->loadModel("Matriz");

	if(!empty($_POST)){
		
		$rede = $_POST['rede'];$id = $_POST['cupom'];
		$up = $_POST['up'];$cupom = $_POST['idup'];
		$buscar = $_POST['buscar'];$username = $_POST['username'];

		if($rede == '1'){
			
	
			$redeunilevel = $siteg->PegarRede($app->conexao, $id);

			

		}else if($up == '1'){

			$redeunilevel = $siteg->UpRede($app->conexao, $cupom);

		}else if($buscar == '1'){

			$redeunilevel = $siteg->BuscaRede($app->conexao, $username, $_SESSION['userid']);

			if($redeunilevel == '0'){
				
				$faturaexcluida = $alertas->AlertaStatus($app->conexao,'Usuário Não Encontrado !!','2','minharede');
			}

		}

	}else{
	
		// vamos carregar as financas
		$redeunilevel = $siteg->Rede($app->conexao,$_SESSION["userid"],$_SESSION["usuario"]);

		

	}
	
	if($_SESSION['userid'] != ""){
	renderizaMinhaRede($app, $redeunilevel);
	}
	
	break;


/////////////////////  DADOS REDE //////////////////////////////////

case "dadosrede":

	$app = new App();
	$siteg = $app->loadModel("Matriz");

	
		// vamos carregar as financas
		$redeunilevel = $siteg->DadosUpline($app->conexao,$_SESSION["userid"]);

	
	
	if($_SESSION['userid'] != ""){
		renderizaMinhaRedeb($app, $redeunilevel);
	}
	
	break;



	
	}

