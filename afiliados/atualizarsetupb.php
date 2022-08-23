<?php session_start();
    include 'application.php';
    

    $app = new App();
    $site = $app->loadModel("Usuario");
    require_once 'googleLib/GoogleAuthenticator.php';
	$ga = new PHPGangsta_GoogleAuthenticator();
 
    $code=$_POST['code'];
    $secret=$_POST['secret'];

    $checkResult = $ga->verifyCode($secret, $code, 300000);    // 2 = 2*30sec clock tolerance

    if ($checkResult) 
    {

    $_SESSION['googleCode']=$code;

    $atualizaautenticacao = $site->autenticab($app->conexao,$_SESSION["userid"]);

    print "1";
    
} 
    else 
    {
        print "0";
    
    
    }

?>