<?php session_start();
    include 'application.php';
    

    $app = new App();
    $tickets = $app->loadModel("Tickets");
   
    $assunto = $_POST['assunto'];$mensagem = $_POST['mensagem'];
    $fechar = $_POST['fechar'];$cupom = $_POST['cupom'];
    
    if($fechar == '1'){
        $fecharticket = $tickets->FecharTicket($app->conexao, $_SESSION['userid'],$cupom);
        
        if($fecharticket){
            print "<script>alert('Ticket Fechado com Sucesso');</script>";
        print "<script>window.location='tickets';</script>";
            $mandaralerta = $alertas->AlertaStatus($app->conexao,'Ticket Fechado com Sucesso','1','tickets');
        }else{
            print "<script>alert('Houve Problemas, tente novamente');</script>";
        print "<script>window.location='tickets';</script>";
            $mandaralerta = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente','0','tickets');
        }
    
    }else{

    $novoticket = $tickets->NovoTicket($app->conexao,$assunto,$mensagem, $_SESSION['userid']);

    if($novoticket){
        print "1";
       // print "<script>alert('Ticket Aberto com Sucesso');</script>";
       // print "<script>window.location='tickets';</script>";
        //$mandaralerta = $alertas->AlertaStatus($app->conexao,'Ticket Aberto com Sucesso','1','tickets');
    }else{
        print "0";
       // print "<script>alert('Houve Problemas, tente novamente');</script>";
       // print "<script>window.location='tickets';</script>";
        //$mandaralerta = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente','0','tickets');
    }
    }



?>