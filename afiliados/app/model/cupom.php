<?php
class Cupom {
	public function AdicionarAnuncios($pdo, $usuario, $senha){
		$obj = $pdo->prepare("SELECT 
								userid,
								usuario
							FROM 
								acesso
							WHERE 
								usuario = :usuario AND
								senha = :senha");
		
		$obj->bindParam(":usuario",$usuario);
		$obj->bindParam(":senha",$senha);
		
		return ($obj->execute()) ? $obj->fetch(PDO::FETCH_OBJ) : false;
	}

    

	public function pegaCupom($pdo, $userid, $status){
		
		$sql = "SELECT * FROM cupom WHERE userid = :userid AND status = :status ";
		
			
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$userid);
        $obj->bindParam(":status",$status);
		$obj->execute();
		return $obj;
	}

	

}