<?php session_start();
    include 'application.php';
     
    $app = new App();
    $site = $app->loadModel("Configuracoes");

  
    $ok = $site->ok($app->conexao,$_SESSION['userid']);

?>