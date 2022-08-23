<?php
class Usuario {



	public function pegaPatrocinador($pdo,$usuario){
		
		$sql = "SELECT acesso.userid,acesso.usuario,dadospessoais.nome FROM acesso,dadospessoais WHERE acesso.usuario = :usuario AND  dadospessoais.userid = acesso.userid";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":usuario",$usuario);
		$obj->execute();

		return $obj;

	}

	public function verificaindicacao($pdo, $indicacao){

		$sql = "SELECT * FROM acesso WHERE usuario = :indicacao";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":indicacao", $indicacao);
		$obj->execute();
		$linha = $obj->fetch(PDO::FETCH_ASSOC);
		return $linha['usuario'];

	}

	public function pegaLogin($pdo,$login){

		$sql = "SELECT userid FROM acesso WHERE usuario = :login";
	   
	   $obj = $pdo->prepare($sql);
	   $obj->bindParam(":login",$login);
	   $obj->execute();
	   $linha = $obj->fetch(PDO::FETCH_ASSOC);
	   if($linha['userid'] == ""){
		   
		   return true;
	   }else{
		   
		   return false;
	   }
   

   }

   public function cadastrarUsuario($pdo,  $nome, $email, $whatsapp, $cpf, $mibank, $usuario, $senha, $indicacao){
		
	$datas = date("Y-m-d H:i:s");
	
	$sqla = "SELECT userid FROM acesso WHERE usuario = :indicacao";
	$obja = $pdo->prepare($sqla);
	$obja->bindParam(":indicacao",$indicacao);
	$obja->execute();
	$linha = $obja->fetch(PDO::FETCH_ASSOC);

	$sql = "INSERT INTO acesso (usuario,senha,sponsorid,registro) VALUES (:usuario,:senha,:sponsorid,'".$datas."')";
	$obj = $pdo->prepare($sql);
	$obj->bindParam(":usuario",$usuario);
	$obj->bindParam(":senha",$senha);
	$obj->bindParam(":sponsorid",$linha['userid']);
	$obj->execute();

	$sqlb = "SELECT * FROM acesso WHERE usuario = :usuariob AND senha = :senhab";
	$objb = $pdo->prepare($sqlb);
	$objb->bindParam(":usuariob",$usuario);
	$objb->bindParam(":senhab",$senha);
	$objb->execute();
	$linha = $objb->fetch(PDO::FETCH_ASSOC);

	
	$sqlc = "INSERT INTO dadospessoais (userid,nome,whatsapp,cpf,email,registro) VALUES (:useridc,:nome,:whatsapp,:cpf,:email,'".$datas."')";
	$objc = $pdo->prepare($sqlc);
	$objc->bindParam(":useridc",$linha['userid']);
	$objc->bindParam(":nome",$nome);
	$objc->bindParam(":email",$email);
	$objc->bindParam(":whatsapp",$whatsapp);
	$objc->bindParam(":cpf",$cpf);
	$objc->execute();
	
	$sqld = "INSERT INTO dadosbancarios (userid,banco,mibank,registro) VALUES (:useridd,'mibank',:mibank,'".$datas."')";
	$objd = $pdo->prepare($sqld);
	$objd->bindParam(":useridd",$linha['userid']);
	$objd->bindParam(":mibank",$mibank);
	$objd->execute();
	
	$sqld = "INSERT INTO saldo (userid,saldo,registro) VALUES (:useridd,'0.00','".$datas."')";
	$objd = $pdo->prepare($sqld);
	$objd->bindParam(":useridd",$linha['userid']);
	$objd->execute();

	$sqle = "INSERT INTO documentos (userid, doc1,doc2) VALUES (:useride,'0','0')";
	$obje = $pdo->prepare($sqle);
	$obje->bindParam(":useride",$linha['userid']);
	$obje->execute();

	$sqlf = "INSERT INTO saldoinvestimento (userid,saldo,registro) VALUES (:useridf,'0.00','".$datas."')";
	$objf = $pdo->prepare($sqlf);
	$objf->bindParam(":useridf",$linha['userid']);
	$objf->execute();
	
	
	return $linha['userid'];
	
}


}