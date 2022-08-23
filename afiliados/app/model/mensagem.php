<?php
    Class Mensagem{

    public function pegaMensagem($pdo, $userid){
		
		$sql = "SELECT * FROM msg WHERE para = :userid AND notificacao = '0'  ";
		
			
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->execute();
       
		return $obj;
	}

	public function pegaMensagemEnviadas($pdo, $userid){
		
		$sql = "SELECT * FROM msg WHERE de = :userid AND notificacao = '0' ";
		
			
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->execute();
       
		return $obj;
	}

	public function pegaNotificacao($pdo, $userid){
		
		$sql = "SELECT * FROM msg WHERE para = :userid AND notificacao = '1' ";
		
			
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->execute();
       
		return $obj;
	}

	public function pegaMensagemHeader($pdo, $userid){
		
		$sql = "SELECT * FROM msg WHERE userid = :userid AND para = :userid AND notificacao = '0' AND status = 'unread' order by id DESC limit 0,5 ";
		
			
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->execute();
       
		return $obj;
	}

	public function pegaNotificacaoHeader($pdo, $userid){
		
		$sql = "SELECT * FROM msg WHERE userid = :userid AND para = :userid AND notificacao = '1' AND status = 'unread' order by id DESC limit 0,5 ";
		
			
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->execute();
       
		return $obj;
	}

	public function pegaContagemMensagemHeader($pdo, $userid){
		
		$sql = "SELECT * FROM msg WHERE userid = :userid AND para = :userid AND notificacao = '0' AND status = 'unread'  ";
		
			
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->execute();
        $totalmensagem = $obj->rowCount();


		return $totalmensagem;
	}

	public function pegaContagemNotificacaoHeader($pdo, $userid){
		
		$sql = "SELECT * FROM msg WHERE userid = :userid AND para = :userid AND notificacao = '1' AND status = 'unread'  ";
		
			
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->execute();
        $totalnot = $obj->rowCount();

		return $totalnot;
	}

	

    public function pegaVerMensagem($pdo,$userid, $id){
		
		$sql1 = "UPDATE msg SET status = 'read' WHERE id = :id  ";	
		$obj1 = $pdo->prepare($sql1);
		$obj1->bindParam(":id",$id);
		$obj1->execute();
		
		$sql = "SELECT * FROM msg WHERE userid = :userid AND id = :id  ";	
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->bindParam(":id",$id);
		$obj->execute();
        
		return $obj;
	}

	public function pegaAdmVerMensagem($pdo, $id){
		
		$sql = "SELECT *,acesso.usuario FROM msg,acesso WHERE id = :id AND acesso.userid = msg.userid  ";
		
			
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":id",$id);
		$obj->execute();
        
		return $obj;
	}

	public function excluirMensagem($pdo, $id){
		
		$sql = "DELETE FROM msg WHERE id = :id  ";
		
			
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":id",$id);
		$obj->execute();
        
		return $obj;
	}

	public function listaMensagem($pdo){
		
		$sql = "SELECT *,acesso.usuario FROM msg,acesso WHERE msg.userid = acesso.userid  ";
		
			
		$obj = $pdo->prepare($sql);
		$obj->execute();
       
		return $obj;
	}

	public function mandarMensagemParaAdmin($pdo, $userid, $assunto, $mensagem){
		
		$datas = date("Y-m-d H:i:s");
		
		$sql = "INSERT INTO msg (userid,de,assunto,texto,status,notificacao,data) VALUES (:userid,:userid,:assunto,:mensagem,'unread','0','".$datas."')";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->bindParam(":assunto",$assunto);
		$obj->bindParam(":mensagem",$mensagem);
		$obj->execute();

		return $obj;
	}

	public function mandarAdmMensagemParaTodos($pdo, $assunto, $mensagem){
		
		$datas = date("Y-m-d H:i:s");
		
		$sql1 = "SELECT * FROM acesso";
		$obj1 = $pdo->prepare($sql1);
		$obj1->execute();
		while($linha = $obj1->fetch(PDO::FETCH_ASSOC)){

			$useridd = $linha['userid'];
		
		$sql = "INSERT INTO msg (userid,para,assunto,texto,status,notificacao,data) VALUES (:userid,:userid,:assunto,:mensagem,'unread','1','".$datas."')";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$useridd);
		$obj->bindParam(":assunto",$assunto);
		$obj->bindParam(":mensagem",$mensagem);
		$obj->execute();

		}
       
		return $obj1;
	}

	public function mandarAdmMensagemParaUsuario($pdo, $usuario,$assunto, $mensagem){
		
		$datas = date("Y-m-d H:i:s");
		
		
		$sql = "INSERT INTO msg (userid,para,assunto,texto,status,notificacao,data) VALUES (:userid,:userid,:assunto,:mensagem,'unread','0','".$datas."')";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$usuario);
		$obj->bindParam(":assunto",$assunto);
		$obj->bindParam(":mensagem",$mensagem);
		$obj->execute();

       
		return $obj1;
	}

	public function mandarAdmEmailParaTodos($pdo, $assunto, $mensagem){
		
		$datas = date("Y-m-d H:i:s");
		
		$sql1 = "SELECT * FROM acesso,dadospessoais WHERE acesso.userid = dadospessoais.userid";
		$obj1 = $pdo->prepare($sql1);
		$obj1->execute();
		while($linha = $obj1->fetch(PDO::FETCH_ASSOC)){

			$usuario = $linha['usuario'];$email = $linha['email'];
			$nome = $linha['nome'];

							 $to = "$email";
        $subject = $assunto;
        $message = "
<html>
    <head>
        <title>SISTEMA ADMINISTER</title>
    </head>
    <body style='background-color: #fafafa; color: black !important'>
        <div style='width:700px; background: #ffffff; border: 1px solid #dddddd; border-radius: 3px; padding: 20px;margin-left: auto; margin-right: auto; '>
            <div style='text-align: center; font-size:33px;'>Olá, <div style='font-weight: bolder;'>$nome</div></div>
            
            <div style='text-align: center; padding:20px;margin-top:15px;'>
                <img src='http://administerinvestments.com/afiliado/images/logo.png' width='150' height='60'>
            </div>
            <p>$mensagem.</p>
            
            
            <div style='padding:20px 0 25px;text-align:center;color:#ffffff'>
            <a href='http://administerinvestments.com/afiliado' style='color:#ffffff;text-decoration:none;display:inline-block;text-align:center;background:#4183c4;background-color:#4183c4;border-radius:5px;padding:12px 44px;font-weight:bold;letter-spacing:normal;font-size:17px; margin:0 auto;width:auto!important' target='_blank'>Escritorio ADMINISTER</a>
            </div>
            Obrigado,<br/>
        </div>
    </body>
</html>
";

        $message = utf8_decode($message);

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: <noreply@administerinvestments.com>' . "\r\n";

        mail($to, $subject, $message, $headers);
		

		}
       
		return $obj1;
	}

	public function mandarAdmEmailParaUsuario($pdo, $usuario,$assunto, $mensagem){
		
		$datas = date("Y-m-d H:i:s");
		
		$sql1 = "SELECT * FROM acesso,dadospessoais WHERE acesso.userid = dadospessoais.userid AND acesso.userid = :userid";
		$obj1 = $pdo->prepare($sql1);
		$obj1->bindParam(":userid",$usuario);
		$obj1->execute();
		$linha = $obj1->fetch(PDO::FETCH_ASSOC);

			$usuario = $linha['usuario'];$email = $linha['email'];
			$nome = $linha['nome'];
			 $to = "$email";
        $subject = $assunto;
        $message = "
<html>
    <head>
        <title>SISTEMA ADMINISTER</title>
    </head>
    <body style='background-color: #fafafa; color: black !important'>
        <div style='width:700px; background: #ffffff; border: 1px solid #dddddd; border-radius: 3px; padding: 20px;margin-left: auto; margin-right: auto; '>
            <div style='text-align: center; font-size:33px;'>Olá, <div style='font-weight: bolder;'>$nome</div></div>
            
            <div style='text-align: center; padding:20px;margin-top:15px;'>
                <img src='http://administerinvestments.com/afiliado/images/logo.png' width='150' height='60'>
            </div>
            <p>$mensagem.</p>
            
            
            <div style='padding:20px 0 25px;text-align:center;color:#ffffff'>
            <a href='http://administerinvestments.com/afiliado' style='color:#ffffff;text-decoration:none;display:inline-block;text-align:center;background:#4183c4;background-color:#4183c4;border-radius:5px;padding:12px 44px;font-weight:bold;letter-spacing:normal;font-size:17px; margin:0 auto;width:auto!important' target='_blank'>Escritorio ADMINISTER</a>
            </div>
            Obrigado,<br/>
        </div>
    </body>
</html>
";

        $message = utf8_decode($message);

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: <noreply@administerinvestments.com>' . "\r\n";

        mail($to, $subject, $message, $headers);
		
       
		return $obj1;
	}

       

}
?>