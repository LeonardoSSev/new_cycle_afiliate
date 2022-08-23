<?php
    Class Faturas{

        public function excluirFaturas($pdo,$id){

			$sql = "SELECT * FROM pagamentos WHERE id = :id";
			$obj = $pdo->prepare($sql);
			$obj->bindParam(":id",$id);
			$obj->execute();
			$linha = $obj->fetch(PDO::FETCH_ASSOC);
			$useridb = $linha['useridb'];$fase = $linha['fase'];$userid = $linha['userid'];$reentrada = $linha['reentrada'];
			$cupomb = $linha['cupomb'];$cupom = $linha['cupom'];

			$sqlf = "SELECT * FROM configuracoes WHERE id = :fase";
			$objf = $pdo->prepare($sqlf);
			$objf->bindParam(":fase",$fase);
			$objf->execute();
			$linhaf = $objf->fetch(PDO::FETCH_ASSOC);
			$travar = $linhaf['trava'];

			$sqlg = "SELECT * FROM pagamentos WHERE cupomb = :cupomb AND fase = :fase";
			$objg = $pdo->prepare($sqlg);
			$objg->bindParam(":cupomb",$cupomb);
			$objg->bindParam(":fase",$fase);
			$objg->execute();
			$contagem = $objg->rowCount();
			while($linhag = $objg->fetch(PDO::FETCH_ASSOC)){
				$useridg = $linhag['userid'];

				$sqlj = "SELECT * FROM acesso WHERE userid = :useridg";
				$objj = $pdo->prepare($sqlj);
				$objj->bindParam(":useridg",$useridg);
				$objj->execute();
				$linhaj = $objj->fetch(PDO::FETCH_ASSOC);
				$esperar = $linhaj['esperar'];

				if($esperar == '1'){

					$sqlk = "UPDATE acesso SET esperar='0' WHERE userid = :useridg";
					$objk = $pdo->prepare($sqlk);
					$objk->bindParam(":useridg",$useridg);
					$objk->execute();

					break;

				}

			}

			if($contagem == $travar){

				$sqlh = "UPDATE indicados SET fase$fase = '0',trava='1' WHERE cupomb = :cupomb";
				$objh = $pdo->prepare($sqlh);
				$objh->bindParam(":cupomb",$cupomb);
				$objh->execute();

			}


			$sqli = "UPDATE indicados SET ativacao = :fase WHERE cupom = :cupom";
			$obji = $pdo->prepare($sqli);
			$obji->bindParam(":cupom",$cupom);
			$obji->bindParam(":fase",$fase);
			$obji->execute();

			if($reentrada == '1'){

				$sqld = "UPDATE acesso SET reentrada = '1' WHERE userid = :useridd";
				$objd = $pdo->prepare($sqld);
				$objd->bindParam(":useridd",$userid);
				$objd->execute();

			}

		 	$sqle = "DELETE FROM pagamentos WHERE id = :id";
			$obje = $pdo->prepare($sqle);
			$obje->bindParam(":id",$id);
			$obje->execute();

			return $obj;
			
	    }
		
		public function excluirFaturasb($pdo,$id){
		
			$datas = date("Y-m-d H:i:s");

			$sqlb = "SELECT * from pagamentos WHERE id = :idb AND ativacao='0'";
			$objb = $pdo->prepare($sqlb);
			$objb->bindParam(":idb",$id);
			$objb->execute();
			$linhab = $objb->fetch(PDO::FETCH_ASSOC);
			$contagem = $objb->rowCount();
			$cupom = $linhab['cupom'];$valor = $linhab['valor'];$idfila = $linhab['idfila'];$moeda  =$linhab['moeda'];$reentrada = $linha['reentrada'];
			$userid = $linhab['userid'];
			
			if($reentrada == '1'){

				$sqld = "UPDATE acesso SET reentrada = '1' WHERE userid = :useridd";
				$objd = $pdo->prepare($sqld);
				$objd->bindParam(":useridd",$userid);
				$objd->execute();

			}

			$sqlb = "UPDATE indicados SET fase$fase = '0' WHERE userid = :useridb";
			$objb = $pdo->prepare($sqlb);
			$objb->bindParam(":useridb",$useridb);
			$objb->execute();

			$sqlc = "UPDATE indicados SET ativacao = :fase WHERE userid = :useridc";
			$objc = $pdo->prepare($sqlc);
			$objc->bindParam(":useridc",$userid);
			$objc->bindParam(":fase",$fase);
			$objc->execute();
			
			
				
				$sql = "DELETE FROM pagamentos WHERE id = :id AND ativacao='0'";
				$obj = $pdo->prepare($sql);
				$obj->bindParam(":id",$id);
				$obj->execute();
				
				
			
			return true;
			
			
		
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
			
			$sql = "SELECT * FROM pagamentos WHERE userid = :userid AND ativacao='0'";
			$obj = $pdo->prepare($sql);
			$obj->bindParam(":userid",$userid);
			$obj->execute();
			
			return $obj;
			
		}
		
		public function listaFaturasareceber($pdo,$userid){
			
			$sql = "SELECT pagamentos.id,pagamentos.cupom,pagamentos.datavencimento,pagamentos.valor,pagamentos.userid,pagamentos.ativacao,pagamentos.comprovantes,pagamentos.fase,pagamentos.datavencimento,pagamentos.useridb,acesso.usuario,acesso.fotos,dadospessoais.nome,dadospessoais.whatsapp FROM pagamentos,acesso,dadospessoais WHERE acesso.userid = dadospessoais.userid AND pagamentos.userid = acesso.userid AND pagamentos.ativacao = '0' AND pagamentos.useridb = :userid ";
			$obj = $pdo->prepare($sql);
			$obj->bindParam(":userid",$userid);
			$obj->execute();
			return $obj;
			
	    }
		
		public function listaFaturaspendentesid($pdo,$userid){
			
			$sql = "SELECT * FROM pagamentos WHERE ativacao = '0' AND userid = :userid ";
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
		
		public function MandarComprovante($pdo, $idfatura,  $img, $userid){

            $datas = date("Y-m-d H:i:s");

            $sql = "UPDATE pagamentos SET comprovantes = :img, posicao = '1' WHERE  userid = :userid AND id = :idfatura";
            $obj = $pdo->prepare($sql);
            $obj->bindParam(":idfatura",$idfatura);
			$obj->bindParam(":img",$img);
            $obj->bindParam(":userid",$userid);
            $obj->execute();

           
            
            return $obj;
            
		}
		
		public function ReprovarFatura($pdo, $idfatura,   $userid){

			$datas = date("Y-m-d H:i:s");
			
		

            $sql = "UPDATE pagamentos SET  posicao = '2' WHERE  useridb = :userid AND id = :idfatura";
            $obj = $pdo->prepare($sql);
            $obj->bindParam(":idfatura",$idfatura);
            $obj->bindParam(":userid",$userid);
            $obj->execute();

           
            
            return $obj;
            
        }

}
?>