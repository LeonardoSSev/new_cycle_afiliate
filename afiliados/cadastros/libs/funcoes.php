<?php function tStr($string){
	return addslashes(htmlentities(utf8_decode(trim($string))));
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//////////////////// FUNÇÕES ///////////////////////////


	function renderizaManutencao($app, $descricao){
		
		$param = array("titulo"=>$app->site_titulo, 
					   "pagina" => "manutencao",
					   "manutencao" => array(
						"descricao" => $descricao
					   ));
						 
		$app->loadView("Manutencao",$param);
	}



	function renderizaHomeInicial($app,  $indicacao,$mibank){
		
		$param = array("titulo"=>$app->site_titulo, 
					   "pagina" => "home",
					   "dados" => array(
						"indicacao" => $indicacao,
						"mibank" => $mibank
					   )
					   );
						 
		$app->loadView("Home",$param);
	}



	function renderizaLogout($app){
			
		$param = array("titulo"=>$app->site_titulo, 
		"pagina" => "meuslogins",
		"vermeuslogins" => array(
		"meuslogins" => ''
		));
				
		$app->loadView("Logout",$param);
	}

	


	

