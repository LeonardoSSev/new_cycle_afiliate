<?php
class Saques {

    public function pegaSaques($pdo, $userid, $id){

		
		$sql = "SELECT * FROM saques WHERE userid = :userid  AND ativacao= :ativacao  ";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->bindParam(":ativacao",$id);
		$obj->execute();
		//$linha = $obj->fetch(PDO::FETCH_ASSOC);
	
		return $obj;
	}
	
	 public function pegaSaldo($pdo, $userid){
		
		$sql = "SELECT saldo FROM saldo WHERE userid = :userid  order by id DESC limit 0,1 ";
			
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->execute();
		$linha = $obj->fetch(PDO::FETCH_ASSOC);
		return $linha['saldo'];
	}

	  public function pegaAdmSaques($pdo,  $ativacao){
		
		$sql = "SELECT saques.id,saques.userid,saques.valor,saques.datasaque,saques.datapago,acesso.usuario,dadospessoais.nome FROM saques,acesso,dadospessoais WHERE acesso.userid = saques.userid AND dadospessoais.userid = saques.userid AND saques.ativacao = :ativacao ";
			
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":ativacao",$ativacao);
		$obj->execute();
		return $obj;
	}
	

	public function pedirSaques($pdo, $userid, $valor){
		
		date_default_timezone_set('America/Sao_Paulo');
		$datas = date("Y-m-d H:i:s");
		
		$sql = "select saldo,id, (saldo - :valor) as soma from saldo where userid = :userid order by id DESC limit 0,1";
			
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->bindParam(":valor",$valor);
		$obj->execute();
		$linha = $obj->fetch(PDO::FETCH_ASSOC);
		$idsaldo = $linha['id'];

		$sqlb = "INSERT INTO saldo (userid, saldo, saldo_antigo,ganhos,registro) VALUES (:userid, :valorb, :antigo, '0','".$datas."')";		
		$objb = $pdo->prepare($sqlb);
		$objb->bindParam(":userid",$userid);
		$objb->bindParam(":valorb",$linha['soma']);
		$objb->bindParam(":antigo",$linha['saldo']);
		$objb->execute();

		$sqlc = "INSERT INTO financas (userid, entrada,saida,descricao,registro) VALUES (:useridc, '0', :valorc,'Pedido de Saque','".$datas."')";	
		$objc = $pdo->prepare($sqlc);
		$objc->bindParam(":useridc",$userid);
		$objc->bindParam(":valorc",$valor);
		$objc->execute();

		$sqld = "INSERT INTO saques (userid, valor,datasaque,ativacao) VALUES (:useridd, :valord, '".$datas."','0')";
		$objd = $pdo->prepare($sqld);
		$objd->bindParam(":useridd",$userid);
		$objd->bindParam(":valord",$valor);
		$objd->execute();
		
		$sql0 = "SELECT * FROM dadosbancarios WHERE userid = :userid";
			$obj0 = $pdo->prepare($sql0);
			$obj0->bindParam(":userid",$userid);
			$obj0->execute();
			$linha = $obj0->fetch(PDO::FETCH_ASSOC);
			$conta = $linha['urpay'];
			
			$conta1 = str_replace("-","",$conta);
			
			/*
			                 
				$sql = "SELECT * FROM configuracoes WHERE id = '17'";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":idtransacao",$idtransacao);
		$obj->execute();
		$linha = $obj->fetch(PDO::FETCH_ASSOC);
		$token = $linha['motivo'];
		
			                            // Get cURL resource
		$curlb = curl_init();
		curl_setopt_array($curlb, array(
		CURLOPT_URL => "https://api.newpay.digital/api/consultar/transacao/".$idtransacao,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => false,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => array(
		"Content-Type: application/x-www-form-urlencoded",
		"Authorization: ".$token
		),
		));
				
				$response = curl_exec($curlb);
				$err = curl_error($curlb);
				
				curl_close($curlb);
				
				if ($err) {
				  echo "cURL Error #:" . $err;
				} else {
				  echo $response;
				} 
				*/
			

				return $objb;
			
	}

	public function extornarSaque($pdo, $id){

		$datas = date("Y-m-d H:i:s");
		
		$sqla = "select valor,userid from saques where id = :id order by id DESC limit 0,1";
			
		$obja = $pdo->prepare($sqla);
		$obja->bindParam(":id",$id);
		$obja->execute();
		$linhaa = $obja->fetch(PDO::FETCH_ASSOC);

		$sql = "select saldo, (saldo + :valor) as soma from saldo where userid = :userid order by id DESC limit 0,1";
			
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$linhaa['userid']);
		$obj->bindParam(":valor",$linhaa['valor']);
		$obj->execute();
		$linha = $obj->fetch(PDO::FETCH_ASSOC);

		$sqlb = "INSERT INTO saldo (userid, saldo, saldo_antigo,ganhos,registro) VALUES (:useridb, :valorb, :antigo, '0.00','".$datas."')";
				
		$objb = $pdo->prepare($sqlb);
		$objb->bindParam(":useridb",$linhaa['userid']);
		$objb->bindParam(":valorb",$linha['soma']);
		$objb->bindParam(":antigo",$linha['saldo']);
		$objb->execute();

		$sqlc = "INSERT INTO financas (userid, descricao,entrada,saida,registro) VALUES (:useridc,'Extorno de Saque', :valorc, '0.00','".$datas."')";
				
		$objc = $pdo->prepare($sqlc);
		$objc->bindParam(":useridc",$linhaa['userid']);
		$objc->bindParam(":valorc",$linhaa['valor']);
		$objc->execute();

		$sqld = "UPDATE saques set ativacao='2' WHERE id = :idb";
			
		$objd = $pdo->prepare($sqld);
		$objd->bindParam(":idb",$id);
		$objd->execute();


		return $objc;
			
		}


	public function atualizaSaques($pdo, $userid, $valor){
		
		$sql = "select saldo, (saldo - :valor) as soma from saldo where userid = :userid order by id DESC limit 0,1";
			
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->bindParam(":valor",$valor);
		$obj->execute();

		foreach($obj as $calculo){
		
		}

		return $obj;
	}

	public function pagarSaque($pdo, $id){
		
		$datas = date("Y-m-d H:i:s");

		$sql = "UPDATE saques set ativacao='1', datapago = '".$datas."' WHERE id = :id";
			
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":id",$id);
		$obj->execute();

		return $obj;
	}
	
	public function DadosUnity($pdo, $userid){
		
		$sql = "SELECT * FROM dadosbancarios WHERE userid = :userid";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->execute();
		$linha = $obj->fetch(PDO::FETCH_ASSOC);
		$unity = $linha['newpay'];
		
		return $unity;
	}

	public function excluirSaque($pdo, $id){
		
		$sql = "DELETE FROM saques  WHERE id = :id";
			
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":id",$id);
		$obj->execute();

		return $obj;
	}
	
	public function pegaMinimo($pdo){
		
		$sql = "SELECT * FROM  configuracoes  WHERE id = '9'";
		$obj = $pdo->prepare($sql);
		$obj->execute();
		$linha = $obj->fetch(PDO::FETCH_ASSOC);

		return $linha['valor'];
	}
	
	public function pegaPermissao($pdo,$userid){
		
		$sql = "SELECT saque FROM  acesso  WHERE userid = :userid";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->execute();
		$linha = $obj->fetch(PDO::FETCH_ASSOC);

		return $linha['saque'];
	}

	

}