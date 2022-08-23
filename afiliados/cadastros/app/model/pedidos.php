<?php
class Pedidos {
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

    

	public function pegaPedidos($pdo, $userid, $status){
		
		$sql = "SELECT pedidos.* FROM `pedidos` INNER JOIN produtos ON `produtos`.`idpedido` = `pedidos`.`id` AND pedidos.userid = :userid AND pedidos.ativacao = :status ORDER BY `pedidos`.`id` ASC ";
		
			
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$userid);
        $obj->bindParam(":status",$status);
		$obj->execute();
		return $obj;
	}

	

}