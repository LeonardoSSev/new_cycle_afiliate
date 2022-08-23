<?php
class Saques {

    public function pegaSaques($pdo, $userid){
		
		$sql = "SELECT saldo FROM saldo WHERE userid = :userid   order by id DESC limit 0,1 ";
			
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
		
		$sqle = "SELECT mibank FROM dadosbancarios WHERE userid = :userid AND banco = 'mibank'";	
		$obje = $pdo->prepare($sqle);
		$obje->bindParam(":userid",$userid);
		$obje->execute();
		$linhae = $obje->fetch(PDO::FETCH_ASSOC);
		$mibank = $linhae['mibank'];
		
		
		$curlb = curl_init();
		curl_setopt_array($curlb, array(
		  CURLOPT_URL => "https://api.mibank.solutions/api/transferencia/transferir-por-chave",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "{\n  \"chave_transferencia\": \"{4F8CF5EC-069E-4A40-8A3E-2CBCBCEA8242}\",\n  \"conta_beneficiario\": \"$mibank\",\n  \"valor\": \"$valor\",\n  \"numero_controle\": \"$idsaldo\"}",
		  CURLOPT_HTTPHEADER => array(
			"content: application/json",
			"content-type: application/json"
		  ),
		));


		$responseb = curl_exec($curlb);
		$errb = curl_error($curlb);

		curl_close($curlb);

		if ($errb) {
		  echo "cURL Error #:" . $errb;
		} else {
		 // echo $responseb;
		}
		$stringb = json_decode($responseb);

		//$insert = mysql_query("insert into pagamento_mibank (mibank,saldo,registro) VALUES ('".$mibank."','".$valor."','".$datas."')");

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

	public function excluirSaque($pdo, $id){
		
		$sql = "DELETE FROM saques  WHERE id = :id";
			
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":id",$id);
		$obj->execute();

		return $obj;
	}

	

}