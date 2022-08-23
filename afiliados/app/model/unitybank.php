<?php

	Class Unitybank{
		
		public function VerIdTransacao($pdo, $idtransacao){
			
		$sql = "SELECT idtransacao FROM pagamentos WHERE idtransacao = :idtransacao";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":idtransacao",$idtransacao);
		$obj->execute();
		$linha = $obj->rowCount();
		return $linha;
		}
		
		public function GerarBoleto($pdo, $idtransacao, $idfatura, $userid){
		
			                 
				$curl = curl_init();
				
				curl_setopt_array($curl, array(
				  CURLOPT_URL => "https://services.maisbank.online/api/integracao/boleto",
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => "",
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 0,
				  CURLOPT_FOLLOWLOCATION => false,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_2_0,
				  CURLOPT_CUSTOMREQUEST => "POST",
				  CURLOPT_POSTFIELDS =>"{\n\t\"payer_name\":\"MARCOS AURÉLIO FRANCO DOS SANTOS\",\n\t\"payer_tax_id\":\"037.500.639-74\",\n\t\"payer_email\": \"modernidadeweb@bol.com.br\",\n\t\"payer_zip_code\":\"23937120\",\n\t\"payer_number\":\"6\",\n\t\"itens\": [\n\t\t{\n\t\t\t\"description\": \"teste\",\n\"quantity\": 1,\n\"price_cents\": 3000\n\t\t}\n\t],\n\t\"webhook\":\"https://multipliqueturbo10.com/afiliado/retorno\",\n\t\"custom_data\":{\n\t\t\"id\": \"12000\"\n\t}\n}",
				  CURLOPT_HTTPHEADER => array(
					"Authorization: 465bf375-f4dd-4cda-a3ba-d1d4bb48cb4d",
					"Content-Type: application/json"
				  ),
				));
				
				$data = "{\n\t\"payer_name\":\"MARCOS AURÉLIO FRANCO DOS SANTOS\",\n\t\"payer_tax_id\":\"037.500.639-74\",\n\t\"payer_email\": \"modernidadeweb@bol.com.br\",\n\t\"payer_zip_code\":\"23937120\",\n\t\"payer_number\":\"6\",\n\t\"itens\": [\n\t\t{\n\t\t\t\"description\": \"teste\",\n\"quantity\": 1,\n\"price_cents\": 3000\n\t\t}\n\t],\n\t\"webhook\":\"https://multipliqueturbo10.com/afiliado/retorno\",\n\t\"custom_data\":{\n\t\t\"id\": \"12000\"\n\t}\n}";
				

				$response = curl_exec($curl);
				$err = curl_error($curl);
				
				curl_close($curl);
				
				if ($err) {
				  echo "cURL Error #:" . $err;
				} else {
				//  echo $response;
				} 
				
				
		
		
			print_r($data);
			print '<br/>';
			print_r($response);
		
			
		}
		
		public function Transferencia($pdo, $valor,  $userid){
			
			$sql0 = "SELECT * FROM dadosbancarios WHERE userid = :userid";
			$obj0 = $pdo->prepare($sql0);
			$obj0->bindParam(":userid",$userid);
			$obj0->execute();
			$linha = $obj0->fetch(PDO::FETCH_ASSOC);
			$conta = $linha['urpay'];
			
			$conta1 = str_replace("-","",$conta);
			
		
		
			                 
				$curl = curl_init();

				curl_setopt_array($curl, array(
				  CURLOPT_URL => "https://services.maisbank.online/api/integracao/fila/transferencia",
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => "",
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 0,
				  CURLOPT_FOLLOWLOCATION => false,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => "POST",
				   CURLOPT_POSTFIELDS => "value=$valor&number=$conta1",
				  CURLOPT_HTTPHEADER => array(
					"Authorization: 465bf375-f4dd-4cda-a3ba-d1d4bb48cb4d",
					"Content-Type: application/x-www-form-urlencoded"
				  ),
				));
				
				$response = curl_exec($curl);
				$err = curl_error($curl);
				
				curl_close($curl);
				
				if ($err) {
				  echo "cURL Error #:" . $err;
				} else {
				  echo $response;
				} 
				
				return true;
		
			
		}
		
		public function ConsultaTransacao($pdo, $idtransacao, $idfatura, $userid){
	
			                            // Get cURL resource
							$curlb = curl_init();
		curl_setopt_array($curlb, array(
		  CURLOPT_URL => "https://services.maisbank.online/api/publica/consulta/transacao/".$idtransacao,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		 // CURLOPT_POSTFIELDS => "{\n  \"to_user_id\": \"5bc78ba0825cc700bb1bb551\",\n  \"value\": \"1000\"}",
		
		));
		
		$response = curl_exec($curlb);
		$stringb = json_decode($response);
	
		$errb = curl_error($curlb);

		curl_close($curlb);
		
		
			$sql0 = "SELECT * FROM pagamentos WHERE id = :idfatura";
			$obj0 = $pdo->prepare($sql0);
			$obj0->bindParam(":idfatura",$idfatura);
			$obj0->execute();
			$linha = $obj0->fetch(PDO::FETCH_ASSOC);
			$valor = $linha['valor'];$useridd = $linha['userid'];$p = $linha['patrocinador'];$useridb = $linha['useridb'];
			
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
			
			
				
				$sql2 = "SELECT * FROM dadosbancarios WHERE userid = :idusuario  ";
				$obj2 = $pdo->prepare($sql2);
				$obj2->bindParam(":idusuario",$iduser);
				$obj2->execute();
				$linha2 = $obj2->fetch(PDO::FETCH_ASSOC);
				$mibank = $linha2['urpay'];
			

			if($contagem >= '1'){

				return false;

			}else{

			$mibankb = strlen($mibank);
			if($mibankb == "8"){
				
		
			$mibankc = str_replace('-','',$mibank);
		
			
			}else{
				$mibankc = $mibank;
			}
				
			$valores = abs($stringb->value);
			$explode = str_replace("@","",$mibankc);
			$valor1 = explode(".",$valor);
			
		
			
			if($valor1[0] != $valores || $userid != $useridd || $stringb->counter_part->user->numero_conta_maisbank != $explode){
				
				return false;

			}else{
			
				return true;
				
			}
		}
			
		}
	
	}