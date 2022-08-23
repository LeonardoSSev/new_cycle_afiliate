<?php
    include 'application.php';
     
    $app = new App();
    $picpay = $app->loadModel("Picpay");

    $pagarlucro = $picpay->ConsultaPicpay($app->conexao);

?>