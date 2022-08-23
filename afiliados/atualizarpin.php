<?php session_start();
    include 'application.php';
    

    $app = new App();
    $usuario = $app->loadModel("Usuario");
    $pin = hash("md5",$_POST["novopin"]);
 
    $obj = $usuario->AtualizarPIN($app->conexao, $pin, $_SESSION["userid"]);
  

    if($obj){
       
       print "1";//alterado com sucesso
    }else{
        print "0";// não deu
    
    }

?>