<?php session_start();
    include 'application.php';
    

    $app = new App();
    $siteg = $app->loadModel("Saques");
    $faturas = $app->loadModel("Faturas");
    $conf = $app->loadModel("Configuracoes");
    $site = $app->loadModel("Usuario");	
   
    $valor = $_POST['valor'];
    $tiposaque = 0;
    $pin = md5($_POST["pin"]);

    $travasaque = $site->TravaSaque($app->conexao);

    if($travasaque == '1'){

        print "5";

    }else{

        $pegasaque = $siteg->pegaSaques($app->conexao,$_SESSION["userid"]);
        $pegafaturas = $faturas->pegaFaturas($app->conexao,$_SESSION["userid"]);
        $minimo = $conf->minimo($app->conexao);
        $pegapin = $site->Pegapin($app->conexao, $pin,$_SESSION["userid"]);

    if($pegafaturas > '0'){
        print "0";
        $emailmandado = $alertas->AlertaStatus($app->conexao,'Você tem faturas pendentes','2','./');
    }else{

        if($pegapin > 0){

            if($minimo <= $valor){

                if($pegasaque >= $valor){

               
                //if($senhaf == $senhafinanceira){

                $conferesaque = $siteg->pedirSaques($app->conexao,$_SESSION["userid"], $valor, $tiposaque);
                //$sucesso = $conferesaque->fetchColumn();


                if($conferesaque){

                    $saldo = $pegasaque - $valor;

                    print  number_format($saldo, 2, '.', '');
                    //$pedidosaque = $conferesaque->fetchAll(PDO::FETCH_ASSOC);
                   // print "<script>alert('Pedido efetuado com Sucesso');</script>";	

                }
                //}else{
                //	print "<script>alert('Senha Financeira incorreta');</script>";
                //}
                }else{
                    print "2";
                    print "<script>alert('Saldo Abaixo do valor pedido');</script>";
                }
            }else{
                print "3";
                print "<script>alert('Valor Mínimo de R$ $minimo');</script>";

            }
        }else{
            print "4";
            print "<script>alert('Pin digitado inválido');</script>";

        }

    }

}



?>