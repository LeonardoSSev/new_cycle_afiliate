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

    // Cria o novo cookie para durar duas horas
    setcookie('google_auth',$secret, (time() + (60 * 60)));

    $atualizaautenticacao = $site->autentica($app->conexao,$_SESSION["userid"]);

    print "1";
  
    
} 
    else 
    {
        print "0";
      
    
    }

?>