<?php session_start();
    include 'application.php';
    

    $app = new App();
    $site = $app->loadModel("Usuario");
   
    $senha = hash("md5",$_POST["senhaatual"]);
    $novasenha = hash("md5",$_POST["novasenha"]);

    
    $obj = $site->confereSenha($app->conexao,$senha, $_SESSION["userid"]);
    $sucesso = $obj->fetchColumn();

    if($sucesso > 0){
        $in = $site->alteraSenha($app->conexao, $novasenha, $_SESSION["userid"]);
    if($in){
       print "1";//alterado com sucesso
    }else{
        print "0";// não deu
    }
    }else{
        print "2";// senha atual incorreta
    }

?>