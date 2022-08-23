<?php

class Matriz{

    public function Rede($pdo, $userid, $usuario){

		$sqlb = "SELECT indicados.cupom,indicados.id,indicados.ativacao,indicados.fase,dadospessoais.nome,dadospessoais.whatsapp,dadospessoais.email FROM indicados,dadospessoais WHERE indicados.userid = :userid AND indicados.userid = dadospessoais.userid";
        $objb = $pdo->prepare($sqlb);
		if(!$objb){
			echo "\nPDO::errorInfo():\n";
    		print_r($pdo->errorInfo());
			exit;
		}
		$objb->bindParam(":userid",$userid);	
		$objb->execute();
		$linhab = $objb->fetch(PDO::FETCH_ASSOC);
		$cupom = $linhab['cupom'];$id = $linhab['id'];$nome = $linhab['nome'];$whatsapp = $linhab['whatsapp'];$email = $linhab['email'];
		$ativacao = $linhab['ativacao'];$fase = $linhab['fase'];

   
		$matriz = array($cupom);
		$comeca = array("id" => $id,"userid" => $userid,"fase" => $fase,"cupom" => $cupom,"ativacao" => $ativacao, "sponsorid" => '' ,"usuario"=> $usuario, "nome"=>$nome, "whatsapp"=>$whatsapp, "email"=>$email);
		$rede[] = $comeca;
		for($a=0;$a<=3;$a++){
        $sql = "SELECT indicados.id,indicados.userid,indicados.cupom,indicados.ativacao,indicados.fase,indicados.sponsorid,acesso.usuario,dadospessoais.nome,dadospessoais.whatsapp,dadospessoais.email FROM indicados,acesso,dadospessoais WHERE indicados.sponsorid = :cupom AND indicados.userid = acesso.userid AND dadospessoais.userid = acesso.userid AND dadospessoais.userid = indicados.userid ORDER BY indicados.dataativacao1 ASC";
        $obj = $pdo->prepare($sql);
		$obj->bindParam(":cupom",$matriz[$a]);
		$obj->execute();
      		while($linha = $obj->fetch(PDO::FETCH_ASSOC)){
				$fase = $linha['fase'];
					
           if($linha['userid'] == "0"){}else{
			   array_push($matriz,$linha['cupom']);
			   $monta = array("id"=>$linha['id'],"userid"=>$linha['userid'],"fase" => $fase,"ativacao" => $linha['ativacao'],"cupom"=>$linha['cupom'], "sponsorid"=>$linha['sponsorid'], "usuario"=>$linha['usuario'], "nome"=>$linha['nome'], "whatsapp"=>$linha['whatsapp'], "email"=>$linha['email']);
			   $rede[] = $monta;
		   }
			}

        }
		

        return $rede;

	}
	
	public function PegarRede($pdo, $id){

		
		$sqlb = "SELECT indicados.id,indicados.cupom,indicados.ativacao,indicados.userid,indicados.fase,indicados.sponsorid,acesso.usuario,dadospessoais.nome,dadospessoais.whatsapp,dadospessoais.email FROM indicados,acesso,dadospessoais WHERE indicados.id = :id AND indicados.userid = acesso.userid AND dadospessoais.userid = indicados.userid AND dadospessoais.userid = acesso.userid";
        $objb = $pdo->prepare($sqlb);
		$objb->bindParam(":id",$id);	
		$objb->execute();
		$linhab = $objb->fetch(PDO::FETCH_ASSOC);
		$userid = $linhab['userid'];$usuario = $linhab['usuario'];$id = $linhab['id'];$cupom = $linhab['cupom'];  $sponsorid = $linhab['sponsorid'];$nome = $linhab['nome'];$whatsapp = $linhab['whatsapp'];$email = $linhab['email'];  $ativacao = $linhab['ativacao'];$fase = $linhab['fase'];

	
		$matriz = array($cupom);
		$comeca = array("id" => $id,"userid" => $userid,"fase" => $fase,"cupom" => $cupom,"ativacao" => $ativacao, "sponsorid" => $sponsorid ,"usuario"=> $usuario, "nome"=>$nome, "whatsapp"=>$whatsapp, "email"=>$email);
		$rede[] = $comeca;
		for($a=0;$a<=3;$a++){
        $sql = "SELECT indicados.id,indicados.userid,indicados.ativacao,indicados.cupom,indicados.fase,indicados.sponsorid,acesso.usuario,dadospessoais.nome,dadospessoais.whatsapp,dadospessoais.email FROM indicados,acesso,dadospessoais WHERE indicados.sponsorid = :cupom AND indicados.userid = acesso.userid  AND dadospessoais.userid = indicados.userid AND dadospessoais.userid = acesso.userid ORDER BY indicados.dataativacao1 ASC";
        $obj = $pdo->prepare($sql);
		$obj->bindParam(":cupom",$matriz[$a]);
		$obj->execute();
      		while($linha = $obj->fetch(PDO::FETCH_ASSOC)){
				$fase = $linha['fase'];

					
           if($linha['userid'] == "0"){}else{
			   array_push($matriz,$linha['cupom']);
			   $monta = array("id"=>$linha['id'],"userid"=>$linha['userid'],"fase" => $fase,"ativacao" => $linha['ativacao'],"cupom"=>$linha['cupom'], "sponsorid"=>$linha['sponsorid'], "usuario"=>$linha['usuario'], "nome"=>$linha['nome'], "whatsapp"=>$linha['whatsapp'], "email"=>$linha['email']);
			   $rede[] = $monta;
		   }
			}

        }
		

        return $rede;

	}
	
	public function UpRede($pdo, $cupom){

		
		$sqlb = "SELECT indicados.id,indicados.cupom,indicados.ativacao,indicados.userid,indicados.fase,indicados.sponsorid,acesso.usuario,dadospessoais.nome,dadospessoais.whatsapp,dadospessoais.email FROM indicados,acesso,dadospessoais WHERE indicados.cupom = :cupom AND indicados.userid = acesso.userid  AND dadospessoais.userid = indicados.userid AND dadospessoais.userid = acesso.userid";
        $objb = $pdo->prepare($sqlb);
		$objb->bindParam(":cupom",$cupom);	
		$objb->execute();
		$linhab = $objb->fetch(PDO::FETCH_ASSOC);
		$userid = $linhab['userid'];$usuario = $linhab['usuario'];$id = $linhab['id'];$cupom = $linhab['cupom'];  $sponsorid = $linhab['sponsorid'];$nome = $linhab['nome'];$whatsapp = $linhab['whatsapp'];$email = $linhab['email'];$ativacao = $linhab['ativacao'];$fase = $linhab['fase'];

	
		$matriz = array($cupom);
		$comeca = array("id" => $id,"userid" => $userid,"cupom" => $cupom,"fase" => $fase,"ativacao" => $ativacao, "sponsorid" => $sponsorid ,"usuario"=> $usuario, "nome"=>$nome, "whatsapp"=>$whatsapp, "email"=>$email);
		$rede[] = $comeca;
		for($a=0;$a<=3;$a++){
        $sql = "SELECT indicados.id,indicados.userid,indicados.ativacao,indicados.cupom,indicados.fase,indicados.sponsorid,acesso.usuario,dadospessoais.nome,dadospessoais.whatsapp,dadospessoais.email  FROM indicados,acesso,dadospessoais WHERE indicados.sponsorid = :cupom AND indicados.userid = acesso.userid   AND dadospessoais.userid = indicados.userid AND dadospessoais.userid = acesso.userid ORDER BY indicados.dataativacao1 ASC";
        $obj = $pdo->prepare($sql);
		$obj->bindParam(":cupom",$matriz[$a]);
		$obj->execute();
      		while($linha = $obj->fetch(PDO::FETCH_ASSOC)){
					$fase = $linha['fase'];
					
           if($linha['userid'] == "0"){}else{
			   array_push($matriz,$linha['cupom']);
			   $monta = array("id"=>$linha['id'],"userid"=>$linha['userid'],"fase" => $fase,"ativacao" => $linha['ativacao'],"cupom"=>$linha['cupom'], "sponsorid"=>$linha['sponsorid'], "usuario"=>$linha['usuario'], "nome"=>$linha['nome'], "whatsapp"=>$linha['whatsapp'], "email"=>$linha['email']);
			   $rede[] = $monta;
		   }
			}

        }
		

        return $rede;

	}
	
	public function BuscaRede($pdo, $usuario, $idusuario){

		$buscou = '0';

		$sqld = "SELECT * FROM acesso ";
		$objd = $pdo->prepare($sqld);
		$objd->bindParam(":usuario",$usuario);
		$objd->execute();
		$containdicados = $objd->rowCount();

		$sqlc = "SELECT * FROM acesso WHERE usuario = :usuario ";
		$objc = $pdo->prepare($sqlc);
		$objc->bindParam(":usuario",$usuario);
		$objc->execute();
		$linhac = $objc->fetch(PDO::FETCH_ASSOC);
		$useridc = $linhac['userid'];

		$sqlf = "SELECT * FROM indicados WHERE userid = :idusuario ";
		$objf = $pdo->prepare($sqlf);
		$objf->bindParam(":idusuario",$idusuario);
		$objf->execute();
		$linhaf = $objf->fetch(PDO::FETCH_ASSOC);
		$cupoms = $linhaf['cupom'];

		$sqlfb = "SELECT * FROM indicados WHERE userid = :idusuario ";
		$objfb = $pdo->prepare($sqlfb);
		$objfb->bindParam(":idusuario",$useridc);
		$objfb->execute();
		$linhafb = $objfb->fetch(PDO::FETCH_ASSOC);
		$cupomsb = $linhafb['cupom'];

		$busca = array($cupomsb);

		for($a=0;$a<=$containdicados;$a++){

	
			$sqle = "SELECT * FROM indicados WHERE cupom = :idusuario ";
			$obje = $pdo->prepare($sqle);
			$obje->bindParam(":idusuario",$busca[$a]);
			$obje->execute();
			$linhae = $obje->fetch(PDO::FETCH_ASSOC);
			$sponsoride = $linhae['sponsorid'];

			array_push($busca,$sponsoride);

		

			if($sponsoride == $cupoms){

				$buscou = '1';
			break;

			}

		}

	
		if($buscou == '1'){

		
		$sqlb = "SELECT indicados.id,indicados.cupom,indicados.ativacao,indicados.userid,indicados.fase,indicados.sponsorid,acesso.usuario,dadospessoais.nome,dadospessoais.whatsapp,dadospessoais.email FROM indicados,acesso,dadospessoais WHERE acesso.usuario = :usuario AND indicados.userid = acesso.userid AND dadospessoais.userid = indicados.userid AND dadospessoais.userid = acesso.userid";
        $objb = $pdo->prepare($sqlb);
		$objb->bindParam(":usuario",$usuario);	
		$objb->execute();
		$linhab = $objb->fetch(PDO::FETCH_ASSOC);
		$userid = $linhab['userid'];$id = $linhab['id'];$cupom = $linhab['cupom'];  $sponsorid = $linhab['sponsorid'];$nome = $linhab['nome'];$whatsapp = $linhab['whatsapp'];$email = $linhab['email'];$ativacao = $linhab['ativacao'];$fase = $linhab['fase'];

	
		$matriz = array($cupom);
		$comeca = array("id" => $id,"userid" => $userid,"cupom" => $cupom,"fase" => $fase,"ativacao" => $ativacao, "sponsorid" => $sponsorid ,"usuario"=> $usuario, "nome"=>$nome, "whatsapp"=>$whatsapp, "email"=>$email);
		$rede[] = $comeca;
		for($ab=0;$ab<=3;$ab++){
        $sql = "SELECT indicados.id,indicados.userid,indicados.ativacao,indicados.cupom,indicados.fase,indicados.sponsorid,acesso.usuario,dadospessoais.nome,dadospessoais.whatsapp,dadospessoais.email FROM indicados,acesso,dadospessoais WHERE indicados.sponsorid = :cupom AND indicados.userid = acesso.userid  AND dadospessoais.userid = indicados.userid AND dadospessoais.userid = acesso.userid ORDER BY indicados.dataativacao1 ASC";
        $obj = $pdo->prepare($sql);
		$obj->bindParam(":cupom",$matriz[$ab]);
		$obj->execute();
      		while($linha = $obj->fetch(PDO::FETCH_ASSOC)){
				$fase = $linha['fase'];

					
           if($linha['userid'] == "0"){}else{
			   array_push($matriz,$linha['cupom']);
			   $monta = array("id"=>$linha['id'],"userid"=>$linha['userid'],"fase" => $fase,"ativacao" => $linha['ativacao'],"cupom"=>$linha['cupom'], "sponsorid"=>$linha['sponsorid'], "usuario"=>$linha['usuario'], "nome"=>$linha['nome'], "whatsapp"=>$linha['whatsapp'], "email"=>$linha['email']);
			   $rede[] = $monta;
		   }
			}

		}

		return $rede;

	}else{
		return '0';
	}
	


	}

	public function DadosUpline($pdo,$userid){

		$sqlb = "SELECT indicados.sponsorid,indicados.sponsorid2,indicados.ativacao,indicados.fase,indicados.sponsorid3,indicados.sponsorid4,indicados.cupom,indicados.id,dadospessoais.nome,dadospessoais.whatsapp,dadospessoais.email FROM indicados,dadospessoais WHERE indicados.userid = :userid AND indicados.userid = dadospessoais.userid";
        $objb = $pdo->prepare($sqlb);
		$objb->bindParam(":userid",$userid);	
		$objb->execute();
		$linhab = $objb->fetch(PDO::FETCH_ASSOC);
		$cupom = $linhab['cupom'];$id = $linhab['id'];$nome = $linhab['nome'];$whatsapp = $linhab['whatsapp'];$email = $linhab['email']; 
		$sponsorid1 = $linhab['sponsorid']; $sponsorid2 = $linhab['sponsorid2']; $sponsorid3 = $linhab['sponsorid3']; $sponsorid4 = $linhab['sponsorid4']; 
		$fase = $linhab['fase'];

		
	
		for($ab=1;$ab<=4;$ab++){

			if($ab == '1'){
				$spo = $sponsorid1;
			}else if($ab == '2'){
				$spo = $sponsorid2;
			}else if($ab == '3'){
				$spo = $sponsorid3;
			}else if($ab == '4'){
				$spo = $sponsorid4;
			}
			
		
        $sql = "SELECT indicados.id,indicados.userid,indicados.cupom,indicados.ativacao,indicados.fase,indicados.sponsorid,acesso.usuario,acesso.registro,dadospessoais.nome,dadospessoais.whatsapp,dadospessoais.email FROM indicados,acesso,dadospessoais WHERE indicados.cupom = :cupom AND indicados.userid = acesso.userid AND dadospessoais.userid = acesso.userid AND dadospessoais.userid = indicados.userid ORDER BY indicados.dataativacao1 ASC";
        $obj = $pdo->prepare($sql);
		$obj->bindParam(":cupom",$spo);
		$obj->execute();
		$linha = $obj->fetch(PDO::FETCH_ASSOC);
			$fase = $linha['fase'];
		  
		 
					
           if($linha['userid'] == "0" || $linha['userid'] == ''){break;}else{
			 
			   $monta = array("id"=>$linha['id'],"userid"=>$linha['userid'],"fase" => $fase,"ativacao" => $linha['ativacao'],"cupom"=>$linha['cupom'], "sponsorid"=>$linha['sponsorid'], "usuario"=>$linha['usuario'], "nome"=>$linha['nome'], "whatsapp"=>$linha['whatsapp'], "email"=>$linha['email'], "registro"=>$linha['registro']);
			   $rede[] = $monta;
		   
			}

		}

	

		return $rede;
		
	}
	



}
?>