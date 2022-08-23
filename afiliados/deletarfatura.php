<?php
    include 'application.php';
    

    $app = new App();
    $site = $app->loadModel("Faturas");
	$idfatura = (int)($_POST['invoice']);

// 1 - investidor
// 2 - sócio

    $pagarbonus1 = $site->excluirFaturas($app->conexao,$idfatura);
	//$pagarbonus2 = $siteb->bonusdiario2($app->conexao,$config2['0']['valor1'], $cupom);
	
	if($pagarbonus1){

    	print 'Excluido com Sucesso!!';
	
	}else{
		
		print 'Houve Problemas ao exclui a fatura!!';
		
	}

?>