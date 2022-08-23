<?php
    include 'application.php';
     
    $app = new App();
    $picpay = $app->loadModel("Ciclos");

    $pagarlucro = $picpay->CadastrarBanco2($app->conexao,'1');

?>