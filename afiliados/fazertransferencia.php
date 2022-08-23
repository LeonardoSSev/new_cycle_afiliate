<?php
    include 'application.php';
    date_default_timezone_set("America/Sao_Paulo");
    $app = new App();
    $unitybank = $app->loadModel("Unitybank");
	error_reporting(0);
   

  

                    $gerasustentabilidade = $unitybank->Transferencia($app->conexao, $idtransacao, $idfatura, $userid);

            

?>