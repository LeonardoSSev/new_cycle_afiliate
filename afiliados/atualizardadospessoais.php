<?php session_start();
    include 'application.php';
    

    $app = new App();
    $site = $app->loadModel("Usuario");
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $celular = $_POST["whatsapp"];
    $cpf = $_POST["cpf"];


    $in = $site->alteraDadosUsuario($app->conexao,$nome, $email, $celular,$cpf,$_SESSION["userid"]);

?>