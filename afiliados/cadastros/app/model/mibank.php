<?php

	Class Mibank{
		
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
			$curl = curl_init();
			// Set some options - we are passing in a useragent too here
			curl_setopt_array($curl, array(
				CURLOPT_RETURNTRANSFER => 1,
				CURLOPT_URL => 'https://api.mibank.solutions/api/conta/transacao?chave_api={953B5522-6277-4206-9707-EC23BADEB007}&transacao='.$idtransacao,
				CURLOPT_USERAGENT => 'Codular Sample cURL Request'
			));
			// Send the request & save response to $resp
			$resp = curl_exec($curl);

			$response = json_decode($resp);
			/*
			foreach($response as $t){
				print $t->data;print "<br/>";
			}
			*/
			
			$sql0 = "SELECT id,userid, valor FROM faturas WHERE id = :idfatura";
			$obj0 = $pdo->prepare($sql0);
			$obj0->bindParam(":idfatura",$idfatura);
			$obj0->execute();
			$linha = $obj0->fetch(PDO::FETCH_ASSOC);
			$valor = $linha['valor'];$useridd = $linha['userid'];
			
			$explode = explode("|",$response->descricao);
			$p1 = $explode[1];
			$p2 = explode(" Pagamento de Fatura ID:",$p1);
			$fatura = trim($p2[1]);
			
			
			if($valor != $response->valor || $userid != $useridd || $response->destino != '356941-07' || $fatura != $idfatura){
				return false;
			}else{
			
			return true;
				
			}
			
		}
	
	}