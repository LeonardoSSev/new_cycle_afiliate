<?php
class Tickets {
	

	public function pegaMeusTickets($pdo,$userid){
		
        $sql = "SELECT * FROM ticket WHERE userid = :userid group by cupom";
        $obj = $pdo->prepare($sql);
        $obj->bindParam(":userid",$userid);
        $obj->execute();
        
		return $obj;
		
    }
	
	public function pegaMeusTicketsAdmin($pdo){
		
        $sql = "SELECT * FROM ticket WHERE (useridb = '4' OR useridb = '0') group by cupom";
        $obj = $pdo->prepare($sql);
        $obj->execute();
        
		return $obj;
		
    }

    public function pegaListaTickets($pdo){
		
        $sql = "SELECT ticket.cupom,ticket.userid,ticket.registro,ticket.status,ticket.id,ticket.assunto,acesso.usuario FROM ticket,acesso GROUP BY ticket.cupom ORDER BY ticket.id DESC ";
        $obj = $pdo->prepare($sql);
        $obj->execute();
        
		return $obj;
    }

    public function pegaTicketsId($pdo,$cupom){
		
        $sql = "SELECT ticket.mensagem,ticket.status,ticket.cupom,ticket.assunto,ticket.registro,acesso.usuario,acesso.fotos,dadospessoais.nome FROM ticket,acesso,dadospessoais WHERE acesso.userid = dadospessoais.userid AND ticket.userid = acesso.userid AND ticket.userid = dadospessoais.userid AND ticket.cupom = :cupom  order by registro ASC";
        $obj = $pdo->prepare($sql);
        $obj->bindParam(":cupom",$cupom);
        $obj->execute();
        
		return $obj;
    }

    public function pegaTicketsTotal($pdo){
		
        $sql = "SELECT * FROM ticket  group by Cupom";
        $obj = $pdo->prepare($sql);
        $obj->execute();
        $contagem = $obj->rowCount();
        
		return $contagem;
    }

    public function pegaTicketsRespondido($pdo){
		
        $sql = "SELECT * FROM ticket WHERE  status = '2' group by Cupom";
        $obj = $pdo->prepare($sql);
        $obj->execute();
        $contagem = $obj->rowCount();
        
		return $contagem;
    }

    public function pegaTicketsResolvido($pdo){
		
        $sql = "SELECT * FROM ticket WHERE status = '1' group by Cupom";
        $obj = $pdo->prepare($sql);
        $obj->execute();
        $contagem = $obj->rowCount();
        
		return $contagem;
    }

    public function pegaTicketsFechado($pdo){
		
        $sql = "SELECT * FROM ticket WHERE  status = '2' group by Cupom";
        $obj = $pdo->prepare($sql);
        $obj->execute();
        $contagem = $obj->rowCount();
        
		return $contagem;
    }

    public function NovoTicket($pdo,$assunto,$mensagem,$userid){

        $registro = date("Y-m-d H:i:s");

        function geraSenhab($tamanho = 10, $maiusculas = true, $numeros = true, $simbolos = false)
			{
			$lmin = 'abcdefghijklmnopqrstuvwxyz';
			$lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$num = '1234567890';
			$simb = '!@#$%*-';
			$retorno = '';
			$caracteres = '';
	
			$caracteres .= $lmin;
			if ($maiusculas) $caracteres .= $lmai;
			if ($numeros) $caracteres .= $num;
			if ($simbolos) $caracteres .= $simb;
	
			$len = strlen($caracteres);
			for ($n = 1; $n <= $tamanho; $n++) {
			$rand = mt_rand(1, $len);
			$retorno .= $caracteres[$rand-1];
			}
			return $retorno;
            }
            
        $cupom = geraSenhab(15, true, true);

        
        $sql = "INSERT INTO ticket (userid,useridb,assunto,mensagem,status,cupom,registro) VALUES (:userid,'4',:assunto,:mensagem,'0',:cupom,:registro)";
        $obj = $pdo->prepare($sql);
        $obj->bindParam(":userid",$userid);
        $obj->bindParam(":assunto",$assunto);
        $obj->bindParam(":mensagem",$mensagem);
        $obj->bindParam(":cupom",$cupom);
        $obj->bindParam(":registro",$registro);
        $obj->execute();

        return true;
    }

    public function ResponderTicket($pdo,$mensagem,$userid,$cupom){

        $registro = date("Y-m-d H:i:s");

        $sql1 = "SELECT * FROM ticket WHERE cupom = :cupom";
        $obj1 = $pdo->prepare($sql1);
        $obj1->bindParam(":cupom",$cupom);
        $obj1->execute();
        $linha = $obj1->fetch(PDO::FETCH_ASSOC);
        $iduser = $linha['userid'];$assunto = $linha['assunto'];

      
        $sql = "INSERT INTO ticket (userid,useridb,assunto,mensagem,status,cupom,registro) VALUES (:userid,:useridb,:assunto,:mensagem,'0',:cupom,:registro)";
        $obj = $pdo->prepare($sql);
        $obj->bindParam(":userid",$iduser);
        $obj->bindParam(":useridb",$userid);
        $obj->bindParam(":assunto",$assunto);
        $obj->bindParam(":mensagem",$mensagem);
        $obj->bindParam(":cupom",$cupom);
        $obj->bindParam(":registro",$registro);
        $obj->execute();

        return true;
    }
	
	public function ResponderTicketAdmin($pdo,$mensagem,$userid,$cupom){

        $registro = date("Y-m-d H:i:s");

        $sql1 = "SELECT * FROM ticket WHERE cupom = :cupom";
        $obj1 = $pdo->prepare($sql1);
        $obj1->bindParam(":cupom",$cupom);
        $obj1->execute();
        $linha = $obj1->fetch(PDO::FETCH_ASSOC);
        $iduser = $linha['userid'];$assunto = $linha['assunto'];

      
        $sql = "INSERT INTO ticket (userid,useridb,assunto,mensagem,status,cupom,registro) VALUES (:userid,:useridb,:assunto,:mensagem,'2',:cupom,:registro)";
        $obj = $pdo->prepare($sql);
        $obj->bindParam(":userid",$iduser);
        $obj->bindParam(":useridb",$userid);
        $obj->bindParam(":assunto",$assunto);
        $obj->bindParam(":mensagem",$mensagem);
        $obj->bindParam(":cupom",$cupom);
        $obj->bindParam(":registro",$registro);
        $obj->execute();

        return true;
    }
	
	 public function FecharTicket($pdo,$userid,$cupom){

        $registro = date("Y-m-d H:i:s");

        $sql1 = "SELECT * FROM ticket WHERE cupom = :cupom";
        $obj1 = $pdo->prepare($sql1);
        $obj1->bindParam(":cupom",$cupom);
        $obj1->execute();
        $linha = $obj1->fetch(PDO::FETCH_ASSOC);
        $iduser = $linha['userid'];$assunto = $linha['assunto'];$mensagem = 'TICKET FECHADO PELO USUÁRIO';
	// 0 usuário falando
	// 2 administrador falando
	// 3 usuário fechando ticket
	// 4 usuário fechando ticket
	
	
      
        $sql = "INSERT INTO ticket (userid,useridb,assunto,mensagem,status,cupom,registro) VALUES (:userid,:useridb,:assunto,:mensagem,'3',:cupom,:registro)";
        $obj = $pdo->prepare($sql);
        $obj->bindParam(":userid",$iduser);
        $obj->bindParam(":useridb",$userid);
        $obj->bindParam(":assunto",$assunto);
        $obj->bindParam(":mensagem",$mensagem);
        $obj->bindParam(":cupom",$cupom);
        $obj->bindParam(":registro",$registro);
        $obj->execute();

        return true;
    }
	
	 public function FecharTicketAdmin($pdo,$userid,$cupom){

        $registro = date("Y-m-d H:i:s");

        $sql1 = "SELECT * FROM ticket WHERE cupom = :cupom";
        $obj1 = $pdo->prepare($sql1);
        $obj1->bindParam(":cupom",$cupom);
        $obj1->execute();
        $linha = $obj1->fetch(PDO::FETCH_ASSOC);
        $iduser = $linha['userid'];$assunto = $linha['assunto'];$mensagem = 'TICKET FECHADO PELO ADMINISTRADOR';
	// 1 usuário falando
	// 2 administrador falando
	// 3 usuário fechando ticket
	// 4 usuário fechando ticket
      
        $sql = "INSERT INTO ticket (userid,useridb,assunto,mensagem,status,cupom,registro) VALUES (:userid,:useridb,:assunto,:mensagem,'4',:cupom,:registro)";
        $obj = $pdo->prepare($sql);
        $obj->bindParam(":userid",$iduser);
        $obj->bindParam(":useridb",$userid);
        $obj->bindParam(":assunto",$assunto);
        $obj->bindParam(":mensagem",$mensagem);
        $obj->bindParam(":cupom",$cupom);
        $obj->bindParam(":registro",$registro);
        $obj->execute();

        return true;
    }
    
    

	

}