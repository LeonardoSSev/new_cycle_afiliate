<?php
    Class Faturas{

        public function excluirFaturas($pdo,$id){
		 $sql = "DELETE FROM faturas WHERE id = :id";
		
        $obj = $pdo->prepare($sql);
		$obj->bindParam(":id",$id);
		$obj->execute();
		return $obj;
	    }

		public function ativarFatura($pdo,$id){

			$datas = date("Y-m-d H:i:s");
			$datav = date('Y-m-d H:i:s', strtotime("+4 days"));
			
			$sql = "UPDATE faturas set ativacao='1' WHERE id = :id";
			
			$obj = $pdo->prepare($sql);
			$obj->bindParam(":id",$id);
			$obj->execute();


			$sqlb = "SELECT cupom FROM faturas WHERE id = :id";
			
			$objb = $pdo->prepare($sqlb);
			$objb->bindParam(":id",$id);
			$objb->execute();
			$linha = $objb->fetch(PDO::FETCH_ASSOC);


			$sqlc = "UPDATE investimentos set ativacao='1',datavencimento = '".$datav."' WHERE cupom = :cupom";
				
			$objc = $pdo->prepare($sqlc);
			$objc->bindParam(":cupom",$linha['cupom']);
			$objc->execute();

			$sqld = "INSERT INTO financas (userid, descricao, entrada,saida,registro) VALUES (:useridb, 'Investimento Inicial',:valorb,'0.00' ,'".$datas."')";
				
			$objd = $pdo->prepare($sqld);
			$objd->bindParam(":useridb",$linha['userid']);
			$objd->bindParam(":valorb",$linha['valor']);
			$objd->execute();

			return true;
	    }

		public function listaFaturaspendentes($pdo,$userid){
			
			$sql = "SELECT *,acesso.usuario,acesso.fotos,dadospessoais.nome,dadospessoais.celular FROM pagamentos,acesso,dadospessoais WHERE acesso.userid = dadospessoais.userid AND pagamentos.useridb = acesso.userid AND pagamentos.ativacao = '0' AND pagamentos.userid = :userid ";
			$obj = $pdo->prepare($sql);
			$obj->bindParam(":userid",$userid);
			$obj->execute();
			return $obj;
			
		}
		
		public function listaFaturasareceber($pdo,$userid){
			
			$sql = "SELECT *,acesso.usuario,acesso.fotos,dadospessoais.nome,dadospessoais.celular FROM pagamentos,acesso,dadospessoais WHERE acesso.userid = dadospessoais.userid AND pagamentos.userid = acesso.userid AND pagamentos.ativacao = '0' AND pagamentos.useridb = :userid ";
			$obj = $pdo->prepare($sql);
			$obj->bindParam(":userid",$userid);
			$obj->execute();
			return $obj;
			
	    }
		
		public function listaFaturaspendentesid($pdo,$userid){
			
			$sql = "SELECT * FROM faturas WHERE ativacao = '0' AND userid = :userid ";
			$obj = $pdo->prepare($sql);
			$obj->bindParam(":userid",$userid);
			$obj->execute();
			$linha = $obj->fetch(PDO::FETCH_ASSOC);
			$faturas = $linha['userid'];
			return $faturas;
			
	    }

		 public function listaAdmFaturaspendentes($pdo){
		 
			$sql = "SELECT pagamentos.id,pagamentos.valor,pagamentos.registro,pagamentos.userid,acesso.usuario,acesso.userid FROM pagamentos,acesso WHERE acesso.userid = pagamentos.userid AND pagamentos.ativacao = '0'";
			$obj = $pdo->prepare($sql);
			$obj->execute();
			return $obj;

	    }

        public function listaFaturaspagas($pdo,$userid){

		$sql = "SELECT * FROM pagamentos where userid = :userid AND  ativacao = '1'";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->execute();
		return $obj;
	    }

		 public function listaAdmFaturaspagas($pdo){

			$sql = "SELECT pagamentos.id,pagamentos.valor,pagamentos.registro,pagamentos.dataativacao,pagamentos.userid,acesso.usuario,acesso.userid FROM pagamentos,acesso WHERE acesso.userid = pagamentos.userid AND pagamentos.ativacao = '1'";
			$obj = $pdo->prepare($sql);
			$obj->execute();
			return $obj;

	    }

		public function cadastrarfatura($pdo,$userid, $valor){
		$datas = date("Y-m-d H:i:s");
		$datav = date('Y-m-d', strtotime("+10 days"));
		$sql = "INSERT INTO faturas (userid,descricao,valor,datavencimento,registro) VALUES (:userid,'Investimento', :valor,'".$datav."','".$datas."' ) ";
		
        $obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->bindParam(":valor",$valor);
		$obj->execute();
		return $obj;
	    }

}
?>