<?php

	Class Bankon{
		
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
			
			$sql = "SELECT motivo FROM configuracoes WHERE id = '16'";
			$obj = $pdo->prepare($sql);
			$obj->execute();
			$linha = $obj->fetch(PDO::FETCH_ASSOC);
			$chavebankon = $linha['motivo'];
			
		
			                            // Get cURL resource
				 $curl = curl_init();
  
				  curl_setopt_array($curl, array(
				  CURLOPT_URL => "https://api.bankon.com.br/v1/consultas/transferencias/".$idtransacao,
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => "",
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 0,
				  CURLOPT_FOLLOWLOCATION => false,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => "GET",
				  CURLOPT_HTTPHEADER => array(
				  "Content-Type: application/json",
				  "Authentication: ".$chavebankon
				  ),
				  ));   
				  
				  $response = curl_exec($curl);
				$stringb = json_decode($response);
			
				$errb = curl_error($curl);
		
				curl_close($curl);

			
		
			$sql0 = "SELECT * FROM pagamentos WHERE id = :idfatura";
			$obj0 = $pdo->prepare($sql0);
			$obj0->bindParam(":idfatura",$idfatura);
			$obj0->execute();
			$linha = $obj0->fetch(PDO::FETCH_ASSOC);
			$valor = $linha['valor'];$useridd = $linha['userid'];
			
			$iduser = '4';
			
			$sql3 = "SELECT * FROM dadosbancarios WHERE userid = :idusuario";
			$obj3 = $pdo->prepare($sql3);
			$obj3->bindParam(":idusuario",$useridd);
			$obj3->execute();
			$linha3 = $obj3->fetch(PDO::FETCH_ASSOC);
			$idurpay = $linha3['bankon'];
			
			
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
				$bankon = $linha2['bankon'];
			

			if($contagem >= '1'){

				return false;

			}else{
			$valores = $stringb->Dados->valor;
			$explode = str_replace("@","",$bankon);
			$valor1 = str_replace(".","",$valor);

			$explodeb = explode(" ",$stringb->Dados->data);

				
			if($valor != $valores ||  $stringb->Dados->destino->usuario != $explode || $data != $explodeb[0]){
				
				
				return false;

			}else{
				
				
			
				return true;
				
			}
		}
			
		}
	
	}