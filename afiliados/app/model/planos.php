<?php
class Planos {

	public function pegaPlanos($pdo){
		
		$sql = "SELECT id, nomeplano, valor FROM planos";
		$obj = $pdo->prepare($sql);
		$obj->execute();

		return $obj;
	}

	public function pegaPlanosporId($pdo, $id){
		
		$sql = "SELECT id, nomeplano, descricao, valor, registro FROM planos WHERE id = :id";
		
			
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":id",$id);
		$obj->execute();


		return $obj;
	}

	public function pegaPlanosporUsuario($pdo, $userid){
		
		$sql = "SELECT planos.id, planos.nomeplano, planos.valor FROM planos,planos_usuario WHERE planos.id = planos_usuario.idplano AND planos_usuario.userid = :id GROUP BY planos_usuario.cupom";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":id",$userid);
		$obj->execute();


		return $obj;
	}

	public function excluirPlanos($pdo, $id){
		
		$sql = "DELETE FROM planos  WHERE id = :id";
		
			
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":id",$id);
		$obj->execute();

		return $obj;
	}

	public function cadastrarPlanos($pdo, $nomeplano, $valor){
		$datas = date("Y-m-d H:i:s");
		$sql = "INSERT INTO planos (nomeplano, valor, registro) VALUES (:nomeplano, :valor, '".$datas."')";
		
			
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":nomeplano",$nomeplano);
		$obj->bindParam(":valor",$valor);
		$obj->execute();

		return $obj;
	}

	public function atualizarPlanos($pdo, $nomeplano, $valor, $id){
		
		$sql = "UPDATE planos SET nomeplano = :nomeplano, valor = :valor WHERE id = :id";
		
			
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":nomeplano",$nomeplano);
		$obj->bindParam(":valor",$valor);
		$obj->bindParam(":id",$id);
		$obj->execute();

		return $obj;
	}

	

}