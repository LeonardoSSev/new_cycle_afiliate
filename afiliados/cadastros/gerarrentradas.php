<?php
    include 'application.php';
    date_default_timezone_set("America/Sao_Paulo");
    $app = new App();
    $ciclos = $app->loadModel("Ciclos");
    $conf = $app->loadModel("Configuracoes");
    $site = $app->loadModel("Usuario");

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

    $pegadia = date("d");
    $pegahora = date("H");

    $permissaoemail = $conf->permitirEmail($app->conexao,16);

    $pegaconf = $conf->config($app->conexao,11);
    while($c = $pegaconf->fetchAll(PDO::FETCH_ASSOC)){
        
        $reentradas = $c[0]['reentrada'];$sustentabilidade = $c[0]['sustentabilidade'];

    if(($c[0]['data'] == $pegadia)&&($c[0]['hora'] == $pegahora)){

        $listausuarios = $site->listaUsuariosAtivosb($app->conexao);
        $b = 0;
        while($l = $listausuarios->fetchAll(PDO::FETCH_ASSOC)){
            $userid =  $l[$b]['userid'];$email =  $l[$b]['email'];

            if($permissaoemail == '1'){

                $mandaremail = $site->MandarEmail($app->conexao,$email);

            }

          

            if($reentradas == '0'){}else{
                for($a=1;$a<=$reentradas;$a++){

                    $gerarreentrada = $ciclos->Reentrada($app->conexao,$userid);

                }
            }

            if($sustentabilidade == '0'){}else{

                for($a=1;$a<=$sustentabilidade;$a++){

                    $gerasustentabilidade = $ciclos->GerarSustentabilidade($app->conexao,$userid);

                }
            }
        
            $b++;
    
        }
    }
    }

?>