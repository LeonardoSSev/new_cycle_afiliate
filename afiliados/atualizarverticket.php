<?php session_start();
    include 'application.php';
    

    $app = new App();
    $tickets = $app->loadModel("Tickets");
    $i = $_POST['idticket'];
    $mensagem = $_POST['mensagem'];

				$novoticket = $tickets->ResponderTicket($app->conexao,$mensagem, $_SESSION["userid"],$i);

				if($novoticket){
                    print "1";
					//print "<script>alert('Ticket respondido com Sucesso');</script>";
					//print "<script>window.location='vertickets?i=$i';</script>";
					//$mandaralerta = $alertas->AlertaStatus($app->conexao,'Ticket respondido com Sucesso','1','vertickets?i='.$j);
				}else{
                    print "0";
					//print "<script>alert('Houve Problemas, tente novamente');</script>";
					//print "<script>window.location='vertickets?i=$i';</script>";
					//$mandaralerta = $alertas->AlertaStatus($app->conexao,'Houve Problemas, tente novamente','0','vertickets?i='.$i);
				}



?>