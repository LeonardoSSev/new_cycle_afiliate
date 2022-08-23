<?php

	Class Urpay{
		
		public function VerIdTransacao($pdo, $idtransacao){
			
		$sql = "SELECT transacao FROM transacao WHERE transacao = :idtransacao";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":idtransacao",$idtransacao);
		$obj->execute();
		$linha = $obj->rowCount();
		return $linha;
		}
		
		public function ConsultaTransacao($pdo, $idtransacao, $idfatura, $userid){
			
		
			                            // Get cURL resource
							$curlb = curl_init();
		curl_setopt_array($curlb, array(
		  CURLOPT_URL => "https://api.urpay.com.br/v1/user-api/internal-transfer/".$idtransacao,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		 // CURLOPT_POSTFIELDS => "{\n  \"to_user_id\": \"5bc78ba0825cc700bb1bb551\",\n  \"value\": \"1000\"}",
		  CURLOPT_HTTPHEADER => array(
			"content: application/json",
			"content-type: application/json",
			"Authorization: eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IjVjZWM5OThlNDc4YWZlMGY5Y2M5OGYzMiIsInR5cGVMb2dpbiI6InVzZXJfdG9rZW4iLCJ0eXBlVG9rZW4iOiJnZW5lcmFsIiwiaWF0IjoxNTU5MDExOTk0fQ.Ibrh2KW475ya488blUu9RitxRK5SHxuDvp3VWBNk5mU"
		  ),
		));
		
		$response = curl_exec($curlb);
		$stringb = json_decode($response);
	
		$errb = curl_error($curlb);

		curl_close($curlb);
		
		
		
		
			
			
			$sql0 = "SELECT * FROM faturas WHERE id = :idfatura";
			$obj0 = $pdo->prepare($sql0);
			$obj0->bindParam(":idfatura",$idfatura);
			$obj0->execute();
			$linha = $obj0->fetch(PDO::FETCH_ASSOC);
			$valor = $linha['valor'];$useridd = $linha['userid'];$p = $linha['patrocinador'];
			
			$iduser = '4';
			
			$sql3 = "SELECT * FROM dadosbancarios WHERE userid = :idusuario";
			$obj3 = $pdo->prepare($sql3);
			$obj3->bindParam(":idusuario",$useridd);
			$obj3->execute();
			$linha3 = $obj3->fetch(PDO::FETCH_ASSOC);
			$idurpay = $linha3['urpay'];
			
			
			$sql1 = "SELECT * FROM transacao WHERE transacao = :idtransacao";
			$obj1 = $pdo->prepare($sql1);
			$obj1->bindParam(":idtransacao",$idtransacao);
			$obj1->execute();
			$contagem = $obj1->rowCount();
			
			
				
				$sql2 = "SELECT * FROM dadosbancarios WHERE userid = :idusuario";
				$obj2 = $pdo->prepare($sql2);
				$obj2->bindParam(":idusuario",$iduser);
				$obj2->execute();
				$linha2 = $obj2->fetch(PDO::FETCH_ASSOC);
				$mibank = $linha2['urpay'];
			

			if($contagem >= '1'){

				return false;

			}else{
				$valores = $stringb->transfer->value;
			$explode = str_replace("@","",$mibank);
			$valor1 = str_replace(".","",$valor);
			
	
			if($valor1 != $valores || $userid != $useridd || $stringb->transfer->send_to->user != $explode){
				
				return false;

			}else{
			
				return true;
				
			}
		}
			
		}
	
	}