<?php

	Class Newpay{
		
		public function VerIdTransacao($pdo, $idtransacao){
			
		$sql = "SELECT transacao FROM transacao WHERE transacao = :idtransacao";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":idtransacao",$idtransacao);
		$obj->execute();
		$linha = $obj->rowCount();
		return $linha;
		}

		public function InserirTransacao($pdo, $idtransacao,$idfatura,$userid){
		
			$datas = date("Y-m-d H:i:s");

			$sql = "SELECT * FROM pagamentos WHERE id = :idfatura";
			$obj = $pdo->prepare($sql);
			$obj->bindParam(":idfatura",$idfatura);
			$obj->execute();
			$linha = $obj->fetch(PDO::FETCH_ASSOC);
			$userid = $linha['userid'];

				
			$sqlb = "INSERT INTO transacao (userid,transacao,idfatura,registro) VALUES (:userid,:idtransacao,:idfatura,:datas)";
			$objb = $pdo->prepare($sqlb);
			$objb->bindParam(":idtransacao",$idtransacao);
			$objb->bindParam(":userid",$userid);
			$objb->bindParam(":idfatura",$idfatura);
			$objb->bindParam(":datas",$datas);
			$objb->execute();
			
			return $obj;
		
		}
		
		public function ConsultaTransacao($pdo, $idtransacao, $idfatura, $userid){

			$data = date("Y-m-d");
			
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
			$stringb = json_decode($response);
		
			$errb = curl_error($curlb);

			curl_close($curlb);
			
			$sql0 = "SELECT * FROM pagamentos WHERE id = :idfatura";
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
			$idurpay = $linha3['newpay'];
			
			
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
				$mibank = $linha2['newpay'];
			

			if($contagem >= '1'){

				return false;

			}else{
				$valores = $stringb->valor;
			$explode = str_replace("@","",$mibank);
			$valor1 = str_replace(".",",",$valor);
			
			$explodeb = explode(" ",$stringb->Dados->data);

			
	
			if($valor1 != $valores || $userid != $useridd || $stringb->recebedor != $mibank || $data != $explodeb[0]){
				
				
				
				return false;

			}else{
			
				return true;
				
			}
		}
			
		}
	
	}