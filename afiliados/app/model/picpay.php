<?php

	Class Picpay{
		
		public function VerIdTransacao($pdo, $idtransacao){
			
		$sql = "SELECT transacao FROM transacao WHERE transacao = :idtransacao";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":idtransacao",$idtransacao);
		$obj->execute();
		$linha = $obj->rowCount();
		return $linha;
		}
		
		public function ConsultaTransacao($pdo,  $userid, $idfatura){

           

            $sql0 = "SELECT * FROM pagamentos WHERE id = :idfatura";
			$obj0 = $pdo->prepare($sql0);
			$obj0->bindParam(":idfatura",$idfatura);
			$obj0->execute();
			$linha0 = $obj0->fetch(PDO::FETCH_ASSOC);
            $valor = $linha0['valor'];$useridd = $linha0['userid'];$checkout = $linha0['checkout'];
            
            $sql = "SELECT * FROM dadospessoais WHERE userid = :idusuario";
			$obj = $pdo->prepare($sql);
			$obj->bindParam(":idusuario",$useridd);
			$obj->execute();
			$linha = $obj->fetch(PDO::FETCH_ASSOC);
            $nome = $linha['nome'];$cpf = $linha['cpf'];$email = $linha['email'];$whatsapp = $linha['whatsapp'];
            
            if($checkout != ''){

                return  $checkout;

            }else{
			
		
            $urlSite     = "https://moneybestt.com/afiliado/";

            $urlPicPay = "https://appws.picpay.com/ecommerce/public/payments";
            
            $XPicpayToken = "X-Picpay-Token: b731ff5c-7de5-451c-82d5-1d4ebc93f1f3";
            
            $headers  = array ( 
                  "Content-Type:application/json",
                  $XPicpayToken
            );

          
            
            $buyer = array (
                            "firstName" =>   $nome,
                            "lastName"  =>   ".",
                            "document"  =>   $cpf,
                            "email"     =>   $email,
                            "phone"     =>   $whatsapp //  +55 27 12345-6789
                       );
            
            $dados = array ( 
                       "referenceId"    =>   '999999'.$idfatura,
                       "callbackUrl"    =>   $urlSite . "/?i=1",
                       "returnUrl"      =>   $urlSite . "/?i=1",
                       "value"          =>   $valor,
                       "buyer"          =>   $buyer
            );
            
            $ch = curl_init();
            
            curl_setopt($ch, CURLOPT_URL, $urlPicPay);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode ( $dados ) );
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false );
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            
            $result = curl_exec($ch);
            $erro  = curl_error($ch);
            
            $resultPHP = json_decode($result, true);
            $link = $resultPHP["paymentUrl"];
            $troca = explode("https:\/\/app.picpay.com\/checkout\/",$link);

            
            
            $sql0b = "UPDATE pagamentos SET checkout = :troca WHERE id = :idfatura";
			$obj0b = $pdo->prepare($sql0b);
            $obj0b->bindParam(":idfatura",$idfatura);
            $obj0b->bindParam(":troca",$troca[0]);
			$obj0b->execute();
            

         //   print_r($result);
		
           return $resultPHP["paymentUrl"];

        }
			
        }

        public function ConsultaPicpay($pdo){

            include 'ciclos.php';
            $ciclos = new Ciclos();

            $sql0 = "SELECT * FROM pagamentos WHERE ativacao = '0' AND checkout != ''";
			$obj0 = $pdo->prepare($sql0);
			$obj0->execute();
			while($linha0 = $obj0->fetch(PDO::FETCH_ASSOC)){
                $valor = $linha0['valor'];$idpagamento = $linha0['id'];

                $idpagamentof = '999999'.$idpagamento;

                $curlb = curl_init();
                curl_setopt_array($curlb, array(
                CURLOPT_URL => "https://appws.picpay.com/ecommerce/public/payments/".$idpagamentof."/status",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => false,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                "Content-Type: application/x-www-form-urlencoded",
                "x-picpay-token: b731ff5c-7de5-451c-82d5-1d4ebc93f1f3"
                ),
                ));

                
                $response = curl_exec($curlb);
                $stringb = json_decode($response);
            
                $errb = curl_error($curlb);

                curl_close($curlb);

                $status = $stringb->status;

                if($status == 'paid'){

                    $retorno = $ciclos->Retorno($pdo,$idpagamento);

                }

                

            }

        }
        
       
	
	}