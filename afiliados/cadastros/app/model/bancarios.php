 <?php
 Class Bancarios{

    public function pegaDadosBancarios($pdo, $userid){
		
		$sql = "SELECT * FROM dadosbancarios WHERE userid = :userid   ";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->execute();
		return $obj;
	}

	public function pegaUsuario($pdo, $idfatura){

		$sql = "SELECT *,acesso.usuario FROM pagamentos,acesso WHERE pagamentos.useridb = acesso.userid AND pagamentos.id = :idfatura";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":idfatura",$idfatura);
		$obj->execute();
		$linha = $obj->fetch(PDO::FETCH_ASSOC);


		return $linha;
	}

	public function pegaUsuariob($pdo, $userid){

		$sql = "SELECT *,acesso.usuario FROM pagamentos,acesso WHERE pagamentos.useridb = acesso.userid AND pagamentos.useridb = :useridb";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":useridb",$userid);
		$obj->execute();
		$linha = $obj->fetch(PDO::FETCH_ASSOC);


		return $linha;
	}

 }

 ?>