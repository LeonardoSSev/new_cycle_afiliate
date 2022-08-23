<?php
class Pedidos {
	public function AdicionarAnuncios($pdo, $usuario, $senha){
		$obj = $pdo->prepare("SELECT 
								userid,
								usuario
							FROM 
								acesso
							WHERE 
								usuario = :usuario AND
								senha = :senha");
		
		$obj->bindParam(":usuario",$usuario);
		$obj->bindParam(":senha",$senha);
		
		return ($obj->execute()) ? $obj->fetch(PDO::FETCH_OBJ) : false;
	}

    

	public function pegaPedidos($pdo, $userid, $status){
		
		$sql = "SELECT pedidos.* FROM `pedidos` INNER JOIN produtos ON `produtos`.`idpedido` = `pedidos`.`id` AND pedidos.userid = :userid AND pedidos.ativacao = :status ORDER BY `pedidos`.`id` ASC ";
		
			
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$userid);
        $obj->bindParam(":status",$status);
		$obj->execute();
		return $obj;
	}
	
	public function excluirPedidos($pdo, $idpedido){
		
		$sql = "DELETE FROM pedido WHERE id = :idpedido ";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":idpedido",$idpedido);
		$obj->execute();
		return $obj;
	}
	
	 public function listaAdmPedidospendentes($pdo){
		 
			$sql = "SELECT pedido.id,pedido.valor,pedido.total,pedido.frete,pedido.dias,pedido.registro,pedido.comprovante,pedido.idcliente,acesso.userid,acesso.usuario FROM pedido,acesso WHERE acesso.userid = pedido.idcliente AND pedido.ativacao = '0'  ORDER BY pedido.comprovante DESC";
			$obj = $pdo->prepare($sql);
			$obj->execute();
			return $obj;

	   }
	   
	   public function listaAdmPedidospagos($pdo){
		 
			$sql = "SELECT pedido.id,pedido.valor,pedido.total,pedido.dataativacao,pedido.frete,pedido.dias,pedido.registro,pedido.comprovante,pedido.idcliente,acesso.userid,acesso.usuario FROM pedido,acesso WHERE acesso.userid = pedido.idcliente AND pedido.ativacao = '1'  ORDER BY pedido.comprovante DESC";
			$obj = $pdo->prepare($sql);
			$obj->execute();
			return $obj;

	   }
	   
	    public function listaAdmPedidos($pdo, $userid){
		 
			$sql = "SELECT pedido.id,pedido.total,pedido.frete,pedido.dias,pedido.ativacao,pedido.registro,pedido.comprovante,pedido.idcliente,cliente.email,cliente.userid FROM pedido,cliente WHERE cliente.userid = pedido.idcliente AND  pedido.idcliente = :userid  ORDER BY pedido.comprovante DESC";
			$obj = $pdo->prepare($sql);
			$obj->bindParam(":userid",$userid);
			$obj->execute();
			return $obj;

	   }
	   
	    public function listaPedidos($pdo, $userid){
		 
			$sql = "SELECT pedido.id,pedido.total,pedido.frete,pedido.dias,pedido.ativacao,pedido.registro,pedido.comprovante,pedido.idcliente,cliente.email,cliente.userid FROM pedido,cliente WHERE cliente.userid = pedido.idcliente AND  pedido.idcliente = :userid  ORDER BY pedido.comprovante DESC";
			$obj = $pdo->prepare($sql);
			$obj->bindParam(":userid",$userid);
			$obj->execute();
			return $obj;

	   }
	   
	   public function listaPedidosPendentes($pdo, $userid){
		 
			$sql = "SELECT pedido.id,pedido.total,pedido.frete,pedido.dias,pedido.ativacao,pedido.registro,pedido.comprovante,pedido.idcliente,acesso.userid FROM pedido,acesso WHERE acesso.userid = pedido.idcliente AND  pedido.idcliente = :userid AND pedido.ativacao='0'  ORDER BY pedido.comprovante DESC";
			$obj = $pdo->prepare($sql);
			$obj->bindParam(":userid",$userid);
			$obj->execute();
			return $obj;

	   }
	   
	   public function listaPedidosPagos($pdo, $userid){
		 
			$sql = "SELECT pedido.id,pedido.total,pedido.frete,pedido.dias,pedido.ativacao,pedido.registro,pedido.comprovante,pedido.idcliente,acesso.userid FROM pedido,acesso WHERE acesso.userid = pedido.idcliente AND  pedido.idcliente = :userid AND pedido.ativacao='1'  ORDER BY pedido.comprovante DESC";
			$obj = $pdo->prepare($sql);
			$obj->bindParam(":userid",$userid);
			$obj->execute();
			return $obj;

	   }
		
		public function AdmativarPedido($pdo,$id){

			$datas = date("Y-m-d H:i:s");
			$datav = date('Y-m-d H:i:s', strtotime("+4 days"));

			// ativa a fatura
			$sqla = "SELECT * FROM pedido WHERE id = :id AND ativacao='1'";
			$obja = $pdo->prepare($sqla);
			$obja->bindParam(":id",$id);
			$obja->execute();
			$conta = $obja->rowCount();

			if($conta == '0'){
				
			$sql = "UPDATE pedido set ativacao='1',dataativacao = :datas WHERE id = :id";
			$obj = $pdo->prepare($sql);
			$obj->bindParam(":id",$id);
			$obj->bindParam(":datas",$datas);
			$obj->execute();


			$sqlb = "SELECT idcliente,total,indicacao FROM pedido WHERE id = :id ";
			$objb = $pdo->prepare($sqlb);
			$objb->bindParam(":id",$id);
			$objb->execute();
			$linha = $objb->fetch(PDO::FETCH_ASSOC);
			$useridd = $linha['idcliente'];
			
			$login = $linha['usuario'];$idcliente = $linha['idcliente'];$valor = $linha['total'];
			
			$sqlf1b = "INSERT INTO financas (userid, descricao, entrada,saida,registro) VALUES (:useridb12, 'Pagamento do Pedido $id','0.00' ,:valorb12,'".$datas."')";
			$objf1b = $pdo->prepare($sqlf1b);
			$objf1b->bindParam(":useridb12",$idcliente);
			$objf1b->bindParam(":valorb12",$valor);
			$objf1b->execute();

			$sqlc = "UPDATE acesso set ativacao='1' WHERE userid = :userid";
			$objc = $pdo->prepare($sqlc);
			$objc->bindParam(":userid",$linha['indicacao']);
			$objc->execute();
			
			$sqlc1 = "SELECT * FROM acesso WHERE userid = :userid";
			$objc1 = $pdo->prepare($sqlc1);
			$objc1->bindParam(":userid",$useridd);
			$objc1->execute();
			$linhac1  = $objc1->fetch(PDO::FETCH_ASSOC);
			$sponsorid = $linhac1['sponsorid'];$loginn = $linhac1['usuario'];
			
			$sqlc2 = "SELECT * FROM acesso WHERE userid = :userid";
			$objc2 = $pdo->prepare($sqlc2);
			$objc2->bindParam(":userid",$useridd);
			$objc2->execute();
			$linhac2  = $objc2->fetch(PDO::FETCH_ASSOC);
			$idplano = $linhac2['idplano'];
			
			$sqlg = "SELECT * FROM planos WHERE id = :idplano";
			$objg = $pdo->prepare($sqlg);
			$objg->bindParam(":idplano",$idplano);
			$objg->execute();
			$linhag = $objg->fetch(PDO::FETCH_ASSOC);
			$desconto = $linhag['desconto'];
			
			
			
				$sqlc5 = "SELECT * FROM produto_pedido WHERE idpedido = :id";
				$objc5 = $pdo->prepare($sqlc5);
				$objc5->bindParam(":id",$id);
				$objc5->execute();
				WHILE($linhac5  = $objc5->fetch(PDO::FETCH_ASSOC)){
				$idproduto = $linhac5['produto'];$quantidade = $linhac5['quantidade'];
				
				$sqlc3 = "SELECT * FROM produtos WHERE id = :idproduto";
				$objc3 = $pdo->prepare($sqlc3);
				$objc3->bindParam(":idproduto",$idproduto);
				$objc3->execute();
				$linhac3  = $objc3->fetch(PDO::FETCH_ASSOC);
				$nivel1 = $linhac3['nivel1'];$nivel2 = $linhac3['nivel2'];$nivel3 = $linhac3['nivel3'];$nivel4 = $linhac3['nivel4'];$nivel5 = $linhac3['nivel5'];
				$nivel6 = $linhac3['nivel6'];$nivel7 = $linhac3['nivel7'];$nivel8 = $linhac3['nivel8'];$nivel9 = $linhac3['nivel9'];$nivel10 = $linhac3['nivel10'];
				$niveisvenda = $linhac3['niveisvenda'] - 1;$qtde = $linhac3['qtde'];$valorproduto = $linhac3['valor'] * $quantidade;
			
				
				$quantidadef = $qtde - $quantidade;
				
				if($quantidadef <= '0'){
					
					$sqlc4 = "UPDATE produtos SET ativacao='0',qtde = :qtde WHERE id = :idproduto";
					$objc4 = $pdo->prepare($sqlc4);
					$objc4->bindParam(":idproduto",$idproduto);
					$objc4->bindParam(":qtde",$quantidadef);
					$objc4->execute();
					
				}else{
					
					$sqlc4 = "UPDATE produtos SET qtde = :qtde WHERE id = :idproduto";
					$objc4 = $pdo->prepare($sqlc4);
					$objc4->bindParam(":qtde",$quantidadef);
					$objc4->bindParam(":idproduto",$idproduto);
					$objc4->execute();
					
				}
				
				///////////////////////////////////////////////////  PAGA INDICAÇÃO   /////////////////////////////////////////////////////////
					
				$matriz = array($useridd);
				
					for($a=0;$a<=$niveisvenda;$a++){
						
						$sqlc11 = "SELECT * FROM acesso WHERE userid = :userid11";
						$objc11 = $pdo->prepare($sqlc11);
						$objc11->bindParam(":userid11",$matriz[$a]);
						$objc11->execute();
						$linhac11 = $objc11->fetch(PDO::FETCH_ASSOC);
						$sponsorid1 = $linhac11['sponsorid'];
						
					
						if($matriz[$a] == '0'){break;}else{
						
						if($a == '0'){
							$porcentagem = $nivel1;
						}else if($a == '1'){
							$porcentagem = $nivel2;
						}else if($a == '2'){
							$porcentagem = $nivel3;
						}else if($a == '3'){
							$porcentagem = $nivel4;
						}else if($a == '4'){
							$porcentagem = $nivel5;
						}else if($a == '5'){
							$porcentagem = $nivel6;
						}else if($a == '6'){
							$porcentagem = $nivel7;
						}else if($a == '7'){
							$porcentagem = $nivel8;
						}else if($a == '8'){
							$porcentagem = $nivel9;
						}else if($a == '9'){
							$porcentagem = $nivel10;
						}
						
						$percentual = $desconto / 100.00; // 100%
						$valorfinal = $valorproduto - ($percentual * $valorproduto);
						$valordesconto = $valorproduto - $valorfinal;
						
						$percentualb = $porcentagem / 100.00; // 100%
						$valorfinalb = $valordesconto - ($percentualb * $valordesconto);
						$ganhosf = $valordesconto - $valorfinalb;
						
						array_push($matriz,$sponsorid1);
						
					
						$sqlc12 = "SELECT * FROM acesso WHERE userid = :userid12";
						$objc12 = $pdo->prepare($sqlc12);
						$objc12->bindParam(":userid12",$useridd);
						$objc12->execute();
						$linhac12 = $objc12->fetch(PDO::FETCH_ASSOC);
						$loginn  = $linhac12['usuario'];
						
						if($sponsorid1 != '0'){
					
							$sqld1 = "SELECT saldo, (saldo + :valor) as soma FROM saldo WHERE userid = :userida1 ORDER BY id DESC limit 0,1";
							$objd1 = $pdo->prepare($sqld1);
							$objd1->bindParam(":userida1",$sponsorid1);
							$objd1->bindParam(":valor",$ganhosf);
							$objd1->execute();
							$linha11 = $objd1->fetch(PDO::FETCH_ASSOC);
							
						
							
							$sqle1 = "INSERT INTO saldo (userid, saldo, saldo_antigo,ganhos,registro) VALUES (:useridb1, :soma1, :saldo1, :valorb1,'".$datas."')";
							$obje1 = $pdo->prepare($sqle1);
							$obje1->bindParam(":useridb1",$sponsorid1);
							$obje1->bindParam(":soma1",$linha11['soma']);
							$obje1->bindParam(":saldo1",$linha11['saldo']);
							$obje1->bindParam(":valorb1",$ganhosf);
							$obje1->execute();
		
		
							$sqlf1 = "INSERT INTO financas (userid, descricao, entrada,saida,registro) VALUES (:useridb1, 'Ganhos de Bônus de Venda Unilevel do Login $loginn',:valorb1,'0.00' ,'".$datas."')";
							$objf1 = $pdo->prepare($sqlf1);
							$objf1->bindParam(":useridb1",$sponsorid1);
							$objf1->bindParam(":valorb1",$ganhosf);
							$objf1->execute();
						
						}
						
						}
					
					}
				}
				
						$sqlf2 = "INSERT INTO financas (userid, descricao, entrada,saida,registro) VALUES (:useridb1, 'Pagamento do Pedido $id','0.00' ,:valorb1,'".$datas."')";
						$objf2 = $pdo->prepare($sqlf2);
						$objf2->bindParam(":useridb1",$sponsorid1);
						$objf2->bindParam(":valorb1",$ganhosf);
						$objf2->execute();
						
						
						/////////////////////////////////////// JOGAR PONTUAÇÃO ///////////////////////////////////////////////
					
				$sqlc5 = "SELECT * FROM produto_pedido WHERE idpedido = :id";
				$objc5 = $pdo->prepare($sqlc5);
				$objc5->bindParam(":id",$id);
				$objc5->execute();
				WHILE($linhac5  = $objc5->fetch(PDO::FETCH_ASSOC)){
				$idproduto = $linhac5['produto'];$qtdeb = $linhac5['quantidade'];
				
				$sqlc6 = "SELECT * FROM produtos WHERE id = :idproduto";
				$objc6 = $pdo->prepare($sqlc6);
				$objc6->bindParam(":idproduto",$idproduto);
				$objc6->execute();
				$linhac6  = $objc6->fetch(PDO::FETCH_ASSOC);
				$pontosb = $linhac6['pontos'] * $qtdeb;
				
				$qtdebf = $qtdeb - 1;
				$pontuacao = array();
				$pontuacao = array($useridd);
				
				
				
				for($a=0;$a<=$niveis;$a++){
					
					
					$sqld = "SELECT * FROM acesso WHERE userid = :idusuariob";
					$objd = $pdo->prepare($sqld);
					$objd->bindParam(":idusuariob",$pontuacao[$a]);
					$objd->execute();
					$linhad = $objd->fetch(PDO::FETCH_ASSOC);
					$pnode = $linhad['sponsorid'];
					
					
					$sqle = "SELECT * FROM pontos WHERE userid = :idusuariob";
					$obje = $pdo->prepare($sqle);
					$obje->bindParam(":idusuariob",$pnode);
					$obje->execute();
					$linhae = $obje->fetch(PDO::FETCH_ASSOC);
					$esquerda = $linhae['pontos'];
					
					$esquerdaf = $esquerda + $pontosb;
					
					
					array_push($pontuacao,$pnode);
				
				
						$sqlf = "UPDATE pontos SET pontos = :esquerda  WHERE userid = :useridc";
						$objf = $pdo->prepare($sqlf);
						$objf->bindParam(":esquerda",$esquerdaf);
						$objf->bindParam(":useridc",$pnode);
						$objf->execute();
					
					
				
				}
				
				}
		
			////////////////////////////////////////////////////////////////////////////////////////////////////////
					
				
				
		}

			return true;
	    }
	
	public function PagarcomSaldop($pdo,$userid,$id){

			$datas = date("Y-m-d H:i:s");
			$datav = date('Y-m-d H:i:s', strtotime("+4 days"));

			// ativa a fatura
			$sqla = "SELECT * FROM pedido WHERE id = :id AND ativacao='1'";
			$obja = $pdo->prepare($sqla);
			$obja->bindParam(":id",$id);
			$obja->execute();
			$conta = $obja->rowCount();
			
		

			if($conta == '0'){
			


			$sqlb = "SELECT idcliente,total,indicacao FROM pedido WHERE id = :id ";
			$objb = $pdo->prepare($sqlb);
			$objb->bindParam(":id",$id);
			$objb->execute();
			$linha = $objb->fetch(PDO::FETCH_ASSOC);
			$userid = $linha['idcliente'];
			
			$idcliente = $linha['idcliente'];$valor = $linha['total'];
			
			
			
			// diminuir o saldo
			############################################################################################
			
				$sqld11 = "SELECT saldo, (saldo - :valor) as soma FROM saldo WHERE userid = :userida1 ORDER BY id DESC limit 0,1";
				$objd11 = $pdo->prepare($sqld11);
				$objd11->bindParam(":userida1",$idcliente);
				$objd11->bindParam(":valor",$valor);
				$objd11->execute();
				$linha111 = $objd11->fetch(PDO::FETCH_ASSOC);
				$soma = $linha111['soma'];
				
			
				if($linha111['soma'] < 0){
					
				
					return false;
					
				}else{
					
					
					
				if($userid != '0'){
				
				$sqle12 = "INSERT INTO saldo (userid, saldo, saldo_antigo,ganhos,registro) VALUES (:useridb1, :soma1, :saldo1, :valorb1,'".$datas."')";
				$obje12 = $pdo->prepare($sqle12);
				$obje12->bindParam(":useridb1",$idcliente);
				$obje12->bindParam(":soma1",$linha111['soma']);
				$obje12->bindParam(":saldo1",$linha111['saldo']);
				$obje12->bindParam(":valorb1",$valor);
				$obje12->execute();
	
	
				}
			
				
			########################################################################################
				
			$sql = "UPDATE pedido set ativacao='1',dataativacao = :datas WHERE id = :id";
			$obj = $pdo->prepare($sql);
			$obj->bindParam(":id",$id);
			$obj->bindParam(":datas",$datas);
			$obj->execute();
			
			$sqlf1b = "INSERT INTO financas (userid, descricao, entrada,saida,registro) VALUES (:useridb12, 'Pagamento do Pedido $id','0.00' ,:valorb12,'".$datas."')";
			$objf1b = $pdo->prepare($sqlf1b);
			$objf1b->bindParam(":useridb12",$idcliente);
			$objf1b->bindParam(":valorb12",$valor);
			$objf1b->execute();

			$sqlc = "UPDATE acesso set ativacao='1' WHERE userid = :userid";
			$objc = $pdo->prepare($sqlc);
			$objc->bindParam(":userid",$linha['indicacao']);
			$objc->execute();
			
			$sqlc1 = "SELECT * FROM acesso WHERE userid = :userid";
			$objc1 = $pdo->prepare($sqlc1);
			$objc1->bindParam(":userid",$userid);
			$objc1->execute();
			$linhac1  = $objc1->fetch(PDO::FETCH_ASSOC);
			$sponsorid = $linhac1['sponsorid'];$loginn = $linhac1['usuario'];
			
			$sqlc2 = "SELECT * FROM acesso WHERE userid = :userid";
			$objc2 = $pdo->prepare($sqlc2);
			$objc2->bindParam(":userid",$userid);
			$objc2->execute();
			$linhac2  = $objc2->fetch(PDO::FETCH_ASSOC);
			$idplano = $linhac2['idplano'];
			
			$sqlg = "SELECT * FROM planos WHERE id = :idplano";
			$objg = $pdo->prepare($sqlg);
			$objg->bindParam(":idplano",$idplano);
			$objg->execute();
			$linhag = $objg->fetch(PDO::FETCH_ASSOC);
			$desconto = $linhag['desconto'];
			
			
				$sqlc5 = "SELECT * FROM produto_pedido WHERE idpedido = :id";
				$objc5 = $pdo->prepare($sqlc5);
				$objc5->bindParam(":id",$id);
				$objc5->execute();
				WHILE($linhac5  = $objc5->fetch(PDO::FETCH_ASSOC)){
				$idproduto = $linhac5['produto'];$quantidade = $linhac5['quantidade'];
				
				$sqlc3 = "SELECT * FROM produtos WHERE id = :idproduto";
				$objc3 = $pdo->prepare($sqlc3);
				$objc3->bindParam(":idproduto",$idproduto);
				$objc3->execute();
				$linhac3  = $objc3->fetch(PDO::FETCH_ASSOC);
				$nivel1 = $linhac3['nivel1'];$nivel2 = $linhac3['nivel2'];$nivel3 = $linhac3['nivel3'];$nivel4 = $linhac3['nivel4'];$nivel5 = $linhac3['nivel5'];
				$nivel6 = $linhac3['nivel6'];$nivel7 = $linhac3['nivel7'];$nivel8 = $linhac3['nivel8'];$nivel9 = $linhac3['nivel9'];$nivel10 = $linhac3['nivel10'];
				$niveisvenda = $linhac3['niveisvenda'] - 1;$qtde = $linhac3['qtde'];$valorproduto = $linhac3['valor'] * $quantidade;
			
				
				$quantidadef = $qtde - $quantidade;
				
				if($quantidadef <= '0'){
					
					$sqlc4 = "UPDATE produtos SET ativacao='0',qtde = :qtde WHERE id = :idproduto";
					$objc4 = $pdo->prepare($sqlc4);
					$objc4->bindParam(":idproduto",$idproduto);
					$objc4->bindParam(":qtde",$quantidadef);
					$objc4->execute();
					
				}else{
					
					$sqlc4 = "UPDATE produtos SET qtde = :qtde WHERE id = :idproduto";
					$objc4 = $pdo->prepare($sqlc4);
					$objc4->bindParam(":qtde",$quantidadef);
					$objc4->bindParam(":idproduto",$idproduto);
					$objc4->execute();
					
				}
				
				///////////////////////////////////////////////////  PAGA INDICAÇÃO   /////////////////////////////////////////////////////////
					
				$matriz = array($useridd);
				
					for($a=0;$a<=$niveisvenda;$a++){
						
						$sqlc11 = "SELECT * FROM acesso WHERE userid = :userid11";
						$objc11 = $pdo->prepare($sqlc11);
						$objc11->bindParam(":userid11",$matriz[$a]);
						$objc11->execute();
						$linhac11 = $objc11->fetch(PDO::FETCH_ASSOC);
						$sponsorid1 = $linhac11['sponsorid'];
						
					
						if($matriz[$a] == '0'){break;}else{
						
						if($a == '0'){
							$porcentagem = $nivel1;
						}else if($a == '1'){
							$porcentagem = $nivel2;
						}else if($a == '2'){
							$porcentagem = $nivel3;
						}else if($a == '3'){
							$porcentagem = $nivel4;
						}else if($a == '4'){
							$porcentagem = $nivel5;
						}else if($a == '5'){
							$porcentagem = $nivel6;
						}else if($a == '6'){
							$porcentagem = $nivel7;
						}else if($a == '7'){
							$porcentagem = $nivel8;
						}else if($a == '8'){
							$porcentagem = $nivel9;
						}else if($a == '9'){
							$porcentagem = $nivel10;
						}
						
						$percentual = $desconto / 100.00; // 100%
						$valorfinal = $valorproduto - ($percentual * $valorproduto);
						$valordesconto = $valorproduto - $valorfinal;
						
						$percentualb = $porcentagem / 100.00; // 100%
						$valorfinalb = $valordesconto - ($percentualb * $valordesconto);
						$ganhosf = $valordesconto - $valorfinalb;
						
						array_push($matriz,$sponsorid1);
						
					
						$sqlc12 = "SELECT * FROM acesso WHERE userid = :userid12";
						$objc12 = $pdo->prepare($sqlc12);
						$objc12->bindParam(":userid12",$userid);
						$objc12->execute();
						$linhac12 = $objc12->fetch(PDO::FETCH_ASSOC);
						$loginn  = $linhac12['usuario'];
						
						if($sponsorid1 != '0'){
					
							$sqld1 = "SELECT saldo, (saldo + :valor) as soma FROM saldo WHERE userid = :userida1 ORDER BY id DESC limit 0,1";
							$objd1 = $pdo->prepare($sqld1);
							$objd1->bindParam(":userida1",$sponsorid1);
							$objd1->bindParam(":valor",$ganhosf);
							$objd1->execute();
							$linha11 = $objd1->fetch(PDO::FETCH_ASSOC);
							
						
							
							$sqle1 = "INSERT INTO saldo (userid, saldo, saldo_antigo,ganhos,registro) VALUES (:useridb1, :soma1, :saldo1, :valorb1,'".$datas."')";
							$obje1 = $pdo->prepare($sqle1);
							$obje1->bindParam(":useridb1",$sponsorid1);
							$obje1->bindParam(":soma1",$linha11['soma']);
							$obje1->bindParam(":saldo1",$linha11['saldo']);
							$obje1->bindParam(":valorb1",$ganhosf);
							$obje1->execute();
		
		
							$sqlf1 = "INSERT INTO financas (userid, descricao, entrada,saida,registro) VALUES (:useridb1, 'Ganhos de Bônus de Venda Unilevel do Login $loginn',:valorb1,'0.00' ,'".$datas."')";
							$objf1 = $pdo->prepare($sqlf1);
							$objf1->bindParam(":useridb1",$sponsorid1);
							$objf1->bindParam(":valorb1",$ganhosf);
							$objf1->execute();
						
						}
						
						}
					
					}
				}
				
					
						
						
						/////////////////////////////////////// JOGAR PONTUAÇÃO ///////////////////////////////////////////////
					
				$sqlc5 = "SELECT * FROM produto_pedido WHERE idpedido = :id";
				$objc5 = $pdo->prepare($sqlc5);
				$objc5->bindParam(":id",$id);
				$objc5->execute();
				WHILE($linhac5  = $objc5->fetch(PDO::FETCH_ASSOC)){
				$idproduto = $linhac5['produto'];$qtdeb = $linhac5['quantidade'];
				
				$sqlc6 = "SELECT * FROM produtos WHERE id = :idproduto";
				$objc6 = $pdo->prepare($sqlc6);
				$objc6->bindParam(":idproduto",$idproduto);
				$objc6->execute();
				$linhac6  = $objc6->fetch(PDO::FETCH_ASSOC);
				$pontosb = $linhac6['pontos'] * $qtdeb;
				
				$qtdebf = $qtdeb - 1;
				$pontuacao = array();
				$pontuacao = array($useridd);
				
				
				
				for($a=0;$a<=$niveis;$a++){
					
					
					$sqld = "SELECT * FROM acesso WHERE userid = :idusuariob";
					$objd = $pdo->prepare($sqld);
					$objd->bindParam(":idusuariob",$pontuacao[$a]);
					$objd->execute();
					$linhad = $objd->fetch(PDO::FETCH_ASSOC);
					$pnode = $linhad['sponsorid'];
					
					
					$sqle = "SELECT * FROM pontos WHERE userid = :idusuariob";
					$obje = $pdo->prepare($sqle);
					$obje->bindParam(":idusuariob",$pnode);
					$obje->execute();
					$linhae = $obje->fetch(PDO::FETCH_ASSOC);
					$esquerda = $linhae['pontos'];
					
					$esquerdaf = $esquerda + $pontosb;
					
					
					array_push($pontuacao,$pnode);
				
				
						$sqlf = "UPDATE pontos SET pontos = :esquerda  WHERE userid = :useridc";
						$objf = $pdo->prepare($sqlf);
						$objf->bindParam(":esquerda",$esquerdaf);
						$objf->bindParam(":useridc",$pnode);
						$objf->execute();
					
					
				
				}
				}
				}
		
			////////////////////////////////////////////////////////////////////////////////////////////////////////
					
				
				
		}

			return true;
	    }
		
		
		public function pagarPedidos($pdo,$useridd,$id){

			$datas = date("Y-m-d H:i:s");
			$datav = date('Y-m-d H:i:s', strtotime("+4 days"));

			// ativa a fatura
			$sqla = "SELECT * FROM pedido WHERE id = :id AND ativacao='1'";
			$obja = $pdo->prepare($sqla);
			$obja->bindParam(":id",$id);
			$obja->execute();
			$conta = $obja->rowCount();

			if($conta == '0'){
			
			$sqlb = "SELECT idcliente,total,indicacao FROM pedido WHERE id = :id ";
			$objb = $pdo->prepare($sqlb);
			$objb->bindParam(":id",$id);
			$objb->execute();
			$linha = $objb->fetch(PDO::FETCH_ASSOC);
			$userid = $linha['idcliente'];
			
			$valor = $linha['total'];
			
			// diminuir o saldo
			############################################################################################
			
				$sqld11 = "SELECT saldo, (saldo - :valor) as soma FROM saldobloqueado WHERE userid = :userida1 ORDER BY id DESC limit 0,1";
				$objd11 = $pdo->prepare($sqld11);
				$objd11->bindParam(":userida1",$useridd);
				$objd11->bindParam(":valor",$valor);
				$objd11->execute();
				$linha111 = $objd11->fetch(PDO::FETCH_ASSOC);
				
				
				if($linha111['soma'] < 0){
					
				
					
					return false;
					
				}else{
					
				if($userid != '0'){
				
				$sqle12 = "INSERT INTO saldobloqueado (userid, saldo, saldo_antigo,ganhos,registro) VALUES (:useridb1, :soma1, :saldo1, :valorb1,'".$datas."')";
				$obje12 = $pdo->prepare($sqle12);
				$obje12->bindParam(":useridb1",$useridd);
				$obje12->bindParam(":soma1",$linha111['soma']);
				$obje12->bindParam(":saldo1",$linha111['saldo']);
				$obje12->bindParam(":valorb1",$valor);
				$obje12->execute();
	
	
				}
			
				
			########################################################################################
			
			$sql = "UPDATE pedido set ativacao='1',dataativacao = :datas WHERE id = :id";
			$obj = $pdo->prepare($sql);
			$obj->bindParam(":id",$id);
			$obj->bindParam(":datas",$datas);
			$obj->execute();
				
			
			$sqlf1b = "INSERT INTO financas (userid, descricao, entrada,saida,registro) VALUES (:useridb12, 'Pagamento do Pedido $id','0.00' ,:valorb12,'".$datas."')";
			$objf1b = $pdo->prepare($sqlf1b);
			$objf1b->bindParam(":useridb12",$idcliente);
			$objf1b->bindParam(":valorb12",$valor);
			$objf1b->execute();

			
				}
				
		}

			return $obja;
	    }

	

}