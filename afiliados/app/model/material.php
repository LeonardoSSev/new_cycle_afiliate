<?php
class Material {

	public function pegaVideo($pdo){
		
		$sql = "SELECT * FROM videomaterial";
		$obj = $pdo->prepare($sql);
		$obj->execute();

		return $obj;
    }
	
	public function excluirVideo($pdo, $id){
		
		$sql = "DELETE FROM videomaterial  WHERE id = :id";
		
			
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":id",$id);
		$obj->execute();

		return $obj;
	}

    public function pegaVideoId($pdo,$id){
		
		$sql = "SELECT * FROM videomaterial WHERE id = :id";
        $obj = $pdo->prepare($sql);
        $obj->bindParam(":id",$id);
		$obj->execute();

		return $obj;
    }
    
    public function pegaPdf($pdo){
		
		$sql = "SELECT * FROM pdf";
		$obj = $pdo->prepare($sql);
		$obj->execute();

		return $obj;
    }

    public function pegaPdfId($pdo,$id){
		
		$sql = "SELECT * FROM pdf WHERE id = :id";
        $obj = $pdo->prepare($sql);
        $obj->bindParam(":id",$id);
		$obj->execute();

		return $obj;
    }

    public function pegaCategoria($pdo){
		
		$sql = "SELECT * FROM categoriafaq";
		$obj = $pdo->prepare($sql);
		$obj->execute();

		return $obj;
    }

    public function pegaCategoriaId($pdo,$id){
		
		$sql = "SELECT * FROM categoriafaq WHERE id = :id";
        $obj = $pdo->prepare($sql);
        $obj->bindParam(":id",$id);
		$obj->execute();

		return $obj;
    }

    public function EditarVideo($pdo,$link,$titulo,$descricao,$id){

        $datas = date("Y-m-d H:i:s");
		
		$sql = "UPDATE videomaterial SET link = :link, titulo = :titulo, descricao = :descricao WHERE id = :id";
        $obj = $pdo->prepare($sql);
        $obj->bindParam(":link",$link);
        $obj->bindParam(":titulo",$titulo);
        $obj->bindParam(":descricao",$descricao);
        $obj->bindParam(":id",$id);
		$obj->execute();

		return $obj;
    }
    
    public function CadastrarVideo($pdo,$link,$titulo,$descricao){

        $datas = date("Y-m-d H:i:s");
		
		$sql = "INSERT INTO videomaterial (link,titulo,descricao,registro) VALUES (:link,:titulo,:descricao,:datas)";
        $obj = $pdo->prepare($sql);
        $obj->bindParam(":link",$link);
        $obj->bindParam(":titulo",$titulo);
        $obj->bindParam(":descricao",$descricao);
        $obj->bindParam(":datas",$datas);
		$obj->execute();

		return $obj;
    }
	
	public function excluirPdf($pdo, $id){
		
		$sql = "DELETE FROM pdf  WHERE id = :id";
		
			
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":id",$id);
		$obj->execute();

		return $obj;
	}
    
    public function CadastrarPDF($pdo,$pdf,$titulo,$descricao){

        $datas = date("Y-m-d H:i:s");
		
		$sql = "INSERT INTO pdf (pdf,titulo,descricao,registro) VALUES (:pdf,:titulo,:descricao,:datas)";
        $obj = $pdo->prepare($sql);
        $obj->bindParam(":pdf",$pdf);
        $obj->bindParam(":titulo",$titulo);
        $obj->bindParam(":descricao",$descricao);
        $obj->bindParam(":datas",$datas);
		$obj->execute();

		return $obj;
    }

    public function EditarPdf($pdo,$pdf,$titulo,$descricao,$id){

        $datas = date("Y-m-d H:i:s");
		
		if($pdf == ''){
			
			$sql = "UPDATE pdf SET  titulo = :titulo, descricao = :descricao WHERE id = :id";
			$obj = $pdo->prepare($sql);
			$obj->bindParam(":titulo",$titulo);
			$obj->bindParam(":descricao",$descricao);
			$obj->bindParam(":id",$id);
			$obj->execute();

			
		}else{
			
			$sql = "UPDATE pdf SET pdf = :pdf, titulo = :titulo, descricao = :descricao WHERE id = :id";
			$obj = $pdo->prepare($sql);
			$obj->bindParam(":pdf",$pdf);
			$obj->bindParam(":titulo",$titulo);
			$obj->bindParam(":descricao",$descricao);
			$obj->bindParam(":id",$id);
			$obj->execute();
		
		}

		return $obj;
    }
    
    

	public function pegaPlanosporId($pdo, $id){
		
		$sql = "SELECT * FROM planos WHERE id = :id";
		
			
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":id",$id);
		$obj->execute();


		return $obj;
	}

	public function pegaPlanosporUsuario($pdo, $userid){
		
		$sql = "SELECT idplano FROM acesso WHERE userid = :userid";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->execute();
		$linha = $obj->fetch(PDO::FETCH_ASSOC);
		$idplano = $linha['idplano'];
		
		$sqlb = "SELECT nomeplano FROM planos WHERE id = :idplano";
		$objb = $pdo->prepare($sqlb);
		$objb->bindParam(":idplano",$idplano);
		$objb->execute();
		$linha = $objb->fetch(PDO::FETCH_ASSOC);

		return $linha['nomeplano'];
	}

	public function excluirPlanos($pdo, $id){
		
		$sql = "DELETE FROM planos  WHERE id = :id";
		
			
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":id",$id);
		$obj->execute();

		return $obj;
	}

	public function cadastrarPlanos($pdo, $nomeplano,$descricao, $valor,$pontos,$binario,$desconto){
		$datas = date("Y-m-d H:i:s");
		$sql = "INSERT INTO planos (nomeplano, valor, pontos,descricao,binario,desconto, registro) VALUES (:nomeplano, :valor, :pontos, :descricao, :binario, :desconto, '".$datas."')";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":nomeplano",$nomeplano);
		$obj->bindParam(":descricao",$descricao);
		$obj->bindParam(":valor",$valor);
		$obj->bindParam(":pontos",$pontos);
		$obj->bindParam(":binario",$binario);
		$obj->bindParam(":desconto",$desconto);
		$obj->execute();

		return $obj;
	}

	public function atualizarPlanos($pdo, $nomeplano, $valor, $pontos, $binario, $desconto, $descricao, $id){
		
		$sql = "UPDATE planos SET nomeplano = :nomeplano, valor = :valor,pontos = :pontos,binario = :binario,desconto = :desconto,descricao = :descricao WHERE id = :id";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":nomeplano",$nomeplano);
		$obj->bindParam(":valor",$valor);
		$obj->bindParam(":pontos",$pontos);
		$obj->bindParam(":binario",$binario);
		$obj->bindParam(":desconto",$desconto);
		$obj->bindParam(":descricao",$descricao);
		$obj->bindParam(":id",$id);
		$obj->execute();

		return $obj;
	}
	
	public function ComprarPlanos($pdo,$idplano,$geraendereco, $userid){
		
		$datas = date("Y-m-d H:i:s");
		
		$sql = "SELECT * FROM planos WHERE id = :idplano";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":idplano",$idplano);
		$obj->execute();
		$linha = $obj->fetch(PDO::FETCH_ASSOC);
		$valores = $linha['valor'];$pontosa = $linha['pontos'];$descricao = $linha['descricao'];
		
		$sqlc = "SELECT * FROM acesso WHERE userid = :userid";
		$objc = $pdo->prepare($sqlc);
		$objc->bindParam(":userid",$userid);
		$objc->execute();
		$linhac = $objc->fetch(PDO::FETCH_ASSOC);
		$plano = $linhac['idplano'];
		
		$sqld = "SELECT * FROM planos WHERE id = :plano";
		$objd = $pdo->prepare($sqld);
		$objd->bindParam(":plano",$plano);
		$objd->execute();
		$linhad = $objd->fetch(PDO::FETCH_ASSOC);
		$valores2 = $linhad['valor'];$pontosb = $linhad['pontos'];
		
		$valoresf = $valores - $valores2;
		$pontosf = $pontosa - $pontosb;
		
		
		
		if($plano == '0'){
		
			$sqlb = "INSERT INTO faturas (userid,descricao,valor,upgrade,idplano,pontos,carteira,registro) VALUES (:userid,:descricao,:valor,'0',:idplano,:pontos,:carteira,:datas)";
			$objb = $pdo->prepare($sqlb);
			$objb->bindParam(":userid",$userid);
			$objb->bindParam(":descricao",$descricao);
			$objb->bindParam(":valor",$valoresf);
			$objb->bindParam(":carteira",$geraendereco);
			$objb->bindParam(":idplano",$idplano);
			$objb->bindParam(":pontos",$pontosf);
			$objb->bindParam(":datas",$datas);
			$objb->execute();
		
		}else{
			
			$sqlb = "INSERT INTO faturas (userid,descricao,valor,upgrade,idplano,pontos,carteira,registro) VALUES (:userid,:descricao,:valor,'1',:idplano,:pontos,:carteira,:datas)";
			$objb = $pdo->prepare($sqlb);
			$objb->bindParam(":userid",$userid);
			$objb->bindParam(":descricao",$descricao);
			$objb->bindParam(":valor",$valoresf);
			$objb->bindParam(":carteira",$geraendereco);
			$objb->bindParam(":idplano",$idplano);
			$objb->bindParam(":pontos",$pontosf);
			$objb->bindParam(":datas",$datas);
			$objb->execute();

			
		}
		

		return $obj;
		
	}

	

}