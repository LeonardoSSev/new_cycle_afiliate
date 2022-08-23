<?php session_start();
error_reporting(0);
  date_default_timezone_set('America/Sao_Paulo');
$url_digitada = $_SERVER['REQUEST_URI'];
ob_start();
// Transforma a URL em array separando a string a cada barra
$url_arrayb = explode("/", $url_digitada);

$url_array = explode("?",$url_arrayb[3]);
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
	header("Cacho-control: no-cache");
	header("Pragma: no-cache");
	
	// variável m = módulo que será acessado
	//$modulo = (isset($_GET['m'])) ? $_GET['m'] : 'inicial';
	
	$modulo = $url_array[0];
	// Controlar o front-end
	// página inicial, abrir um post ou página de contato
	if(($modulo != "")&&($modulo != 'doLogin')){
		if($_SESSION['userid'] == ""){
			$app = new App();
			renderizaLogout($app);
		}
	}



	
	switch($modulo){
		default :
			
			$app = new App();
			$site = $app->loadModel("Usuario");
			$conf = $app->loadModel("Configuracoes");
			$ciclos = $app->loadModel("Ciclos");
			session_start();	
			
			$verificar = $site->verificaindicacao($app->conexao,$modulo);
			$pegamibank = $conf->PegaMibank($app->conexao,17);
			$gerarpagamento = $conf->PegaMibank($app->conexao,18);

			
			if($verificar){
					$_SESSION['indicacao'] = $verificar;
				}
				
			if($_POST){
					
				$nome = $_POST["nome"];
				$email = tStr($_POST["email"]);
				$whatsapp = tStr($_POST["whatsapp"]);
				$cpf = tStr($_POST["cpf"]);
				$mibankb = tStr($_POST["mibank"]);
				$usuario = tStr($_POST["usuario"]);
				$indicacao = tStr($_POST["indicacao"]);
				$senha = md5(tStr($_POST["senha"]));

				if($usuario == ''){}else{

				if($indicacao == ""){
					$indicacao = 'admin';
				}

				$mibankbb = strlen($mibankb);
				
				if($mibankbb == "8"){
					

				$str = chunk_split($mibankb, 6, '-');

				$mibank = substr($str, 0, 9);
				}else{
					$mibank = $mibankb;
				}

				if($pegamibank == '1'){
				
				$duplicacao = $site->pegaLogin($app->conexao,$usuario);
				
				$URL = 'https://api.mibank.solutions/api/mibank/conferir-conta-documento?numero_conta='.$mibank.'&documento='.$cpf.'';
				
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_URL, $URL);
				$data = curl_exec($ch);
				curl_close($ch);
				
				$json_output = json_decode($data); 

    			if($json_output->codigo == '0'){
					// erro de cpf
					print "<script>alert('DOCUMENTO NAO CORRESPONDE AO TITULAR DA CONTA MIBANK !!');</script>";
					print "<script>window.location='http://localhost/ajudamutua/cadastros/$_SESSION[indicacao]';</script>";
				}else if($json_output->codigo == '2'){
					// erro de mibank
					print "<script>alert('CONTA MIBANK INEXISTENTE !!');</script>";
					print "<script>window.location='http://localhost/ajudamutua/cadastros/$_SESSION[indicacao]';</script>";
				}else if($json_output->codigo == '1'){
					
				if($duplicacao){	
				$in = $site->cadastrarUsuario($app->conexao,$nome,$email,$whatsapp, $cpf, $mibank, $usuario,$senha, $indicacao);
				if($gerarpagamento == '1'){
				$alocar = $ciclos->Alocarmatriz($app->conexao,$in);
				}
				if($in){
					print "<script>alert('Usuário Cadastrado com Sucesso!');</script>";
					print "<script>window.location='http://localhost/ajudamutua/';</script>";
				}else{
					print "<script>alert('Houve Problemas, tente novamente!');</script>";
					print "<script>window.location='http://localhost/ajudamutua/cadastros/$_SESSION[indicacao]';</script>";
				}
					
				}else{
					print "<script>alert('Usuário já existente!');</script>";
					print "<script>window.location='http://localhost/ajudamutua/cadastros/$_SESSION[indicacao]';</script>";
				}
				}
			}else if($pegamibank == '0'){

				$duplicacao = $site->pegaLogin($app->conexao,$usuario);
				
				if($duplicacao){	
					$in = $site->cadastrarUsuario($app->conexao,$nome,$email,$whatsapp, $cpf, $mibank, $usuario,$senha, $indicacao);
					if($gerarpagamento == '1'){
						$alocar = $ciclos->Alocarmatriz($app->conexao,$in);
						}
					if($in){
						print "<script>alert('Usuário Cadastrado com Sucesso!');</script>";
						print "<script>window.location='http://localhost/ajudamutua/';</script>";
					}else{
						print "<script>alert('Houve Problemas, tente novamente!');</script>";
						print "<script>window.location='http://localhost/ajudamutua/cadastros/$_SESSION[indicacao]';</script>";
					}
						
					}else{
						print "<script>alert('Usuário já existente!');</script>";
						print "<script>window.location='http://localhost/ajudamutua/cadastros/$_SESSION[indicacao]';</script>";
					}


			}
				
		}

			}

		
			
		
			renderizaHomeInicial($app, $_SESSION['indicacao'],$pegamibank);
			break;
			
	
	}

