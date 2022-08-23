<?php session_start();
    include 'application.php';
    

    $app = new App();
    $site = $app->loadModel("Usuario");
    $bitcoin = $_POST["bitcoin"];


    $objb = $site->editarDadosBancariosBankon($app->conexao,  $bitcoin, $_SESSION['userid']);

?>