<?php
class Notificacao {
	

	public function pegaNotificacao($pdo){
		
        $sql = "SELECT * FROM notificacoes ORDER BY id DESC ";
        $obj = $pdo->prepare($sql);
        $obj->execute();
        
		return $obj;
		
    }
	
	public function NovaNot($pdo, $titulo, $descricao, $img){
		
		$datas = date("Y-m-d H:i:s");
		
		$sql = "INSERT INTO notificacoes (titulo,descricao,imagem,registro) VALUES (:titulo,:descricao,:imagem,:datas)";
        $obj = $pdo->prepare($sql);
		$obj->bindParam(":titulo",$titulo);
		$obj->bindParam(":descricao",$descricao);
		$obj->bindParam(":imagem",$img);
		$obj->bindParam(":datas",$datas);
        $obj->execute();
		
		$sqlb = "UPDATE acesso SET notificacao = '1'";
		$objb = $pdo->prepare($sqlb);
		$objb->execute();
        
		return $obj;
		
	}
	
	public function pegaNotificacaoUsuario($pdo, $userid){
		
		$sql = "SELECT * FROM acesso WHERE userid = :userid  ";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->execute();
		$linha = $obj->fetch(PDO::FETCH_ASSOC);
		$not = $linha['notificacao'];

		return $not;
	}

 
   

	

}