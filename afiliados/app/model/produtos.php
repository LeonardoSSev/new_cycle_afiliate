<?php
class Produtos {
	
	public function excluirProdutos($pdo, $id){
		
		$sql = "DELETE FROM produtos WHERE id = :id";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":id",$id);
		$obj->execute();
		
		return $obj;
	}
	
	public function pegaProdutos($pdo){
		
		$sql = "SELECT * FROM produtos";
		$obj = $pdo->prepare($sql);
		$obj->execute();
		
		return $obj;
	}
	
	public function listaProdutos($pdo){
		
		$sql = "SELECT * FROM produtos WHERE ativacao='1'";
		$obj = $pdo->prepare($sql);
		$obj->execute();
		
		return $obj;
	}
	
	public function pegaProdutosId($pdo, $id){
		
		$sql = "SELECT * FROM produtos WHERE id = :id";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":id",$id);
		$obj->execute();
		
		return $obj;
	}
	
	public function mandarImagensProdutos($pdo,$userid,$foto1,$foto2,$foto3,$foto4,$foto5,$idproduto){
		
		$datas = date("Y-m-d H:i:s");
		
		if($foto1 != ''){
		
			$sql1 = "INSERT INTO imagens_produto (idproduto,imagem,principal,idfoto,registro) VALUES (:idproduto,:imagem,'1','1',:registro)";
			$obj1 = $pdo->prepare($sql1);
			$obj1->bindParam(":idproduto",$idproduto);
			$obj1->bindParam(":imagem",$foto1);
			$obj1->bindParam(":registro",$datas);
			$obj1->execute();
		
		}
		
		if($foto2 != ''){
		
			$sql2 = "INSERT INTO imagens_produto (idproduto,imagem,idfoto,registro) VALUES (:idproduto,:imagem,'2',:registro)";
			$obj2 = $pdo->prepare($sql2);
			$obj2->bindParam(":idproduto",$idproduto);
			$obj2->bindParam(":imagem",$foto2);
			$obj2->bindParam(":registro",$datas);
			$obj2->execute();
		
		}
		
		if($foto3 != ''){
		
			$sql3 = "INSERT INTO imagens_produto (idproduto,imagem,idfoto,registro) VALUES (:idproduto,:imagem,'3',:registro)";
			$obj3 = $pdo->prepare($sql3);
			$obj3->bindParam(":idproduto",$idproduto);
			$obj3->bindParam(":imagem",$foto3);
			$obj3->bindParam(":registro",$datas);
			$obj3->execute();
		
		}
		
		if($foto4 != ''){
		
			$sql4 = "INSERT INTO imagens_produto (idproduto,imagem,idfoto,registro) VALUES (:idproduto,:imagem,'4',:registro)";
			$obj4 = $pdo->prepare($sql4);
			$obj4->bindParam(":idproduto",$idproduto);
			$obj4->bindParam(":imagem",$foto4);
			$obj4->bindParam(":registro",$datas);
			$obj4->execute();
		
		}
		
		if($foto5 != ''){
		
			$sql5 = "INSERT INTO imagens_produto (idproduto,imagem,idfoto,registro) VALUES (:idproduto,:imagem,'5',:registro)";
			$obj5 = $pdo->prepare($sql5);
			$obj5->bindParam(":idproduto",$idproduto);
			$obj5->bindParam(":imagem",$foto5);
			$obj5->bindParam(":registro",$datas);
			$obj5->execute();
		
		}
		
		return $obj;
	}
	
	public function editarImagensProdutos($pdo,$userid,$foto1,$foto2,$foto3,$foto4,$foto5,$idproduto){
		
		$datas = date("Y-m-d H:i:s");
		
		
		
		if($foto1 != ''){
		
			$sql1 = "UPDATE imagens_produto SET imagem = :imagem WHERE idfoto = '1' AND idproduto = :idproduto";
			$obj1 = $pdo->prepare($sql1);
			$obj1->bindParam(":idproduto",$idproduto);
			$obj1->bindParam(":imagem",$foto1);
			$obj1->execute();
		
		}
		
		if($foto2 != ''){
		
			$sql2 = "UPDATE imagens_produto SET imagem = :imagem WHERE idfoto = '2' AND idproduto = :idproduto";
			$obj2 = $pdo->prepare($sql2);
			$obj2->bindParam(":idproduto",$idproduto);
			$obj2->bindParam(":imagem",$foto2);
			$obj2->execute();
		
		}
		
		if($foto3 != ''){
		
			$sql3 = "UPDATE imagens_produto SET imagem = :imagem WHERE idfoto = '3' AND idproduto = :idproduto";
			$obj3 = $pdo->prepare($sql3);
			$obj3->bindParam(":idproduto",$idproduto);
			$obj3->bindParam(":imagem",$foto3);
			$obj3->execute();
		
		}
		
		if($foto4 != ''){
		
			$sql4 = "UPDATE imagens_produto SET imagem = :imagem WHERE idfoto = '4' AND idproduto = :idproduto";
			$obj4 = $pdo->prepare($sql4);
			$obj4->bindParam(":idproduto",$idproduto);
			$obj4->bindParam(":imagem",$foto4);
			$obj4->execute();
		
		}
		
		if($foto5 != ''){
		
			$sql5 = "UPDATE imagens_produto SET imagem = :imagem WHERE idfoto = '5' AND idproduto = :idproduto";
			$obj5 = $pdo->prepare($sql5);
			$obj5->bindParam(":idproduto",$idproduto);
			$obj5->bindParam(":imagem",$foto5);
			$obj5->execute();
		
		}
		
		return true;
	}
	
	public function CadastrarProduto($pdo,$produtos,$valor,$pontos,$quantidade,$descricao,$altura,$largura,$comprimento,$peso,$categoria,$subcategoria,$niveisvenda,$nivel1,$nivel2,$nivel3,$nivel4,$nivel5,$nivel6,$nivel7,$nivel8,$nivel9,$nivel10){
		
		$datas = date("Y-m-d H:i:s");
		
		$sql = "INSERT INTO produtos (produto,descricao,valor,qtde,pontos,altura,largura,comprimento,peso,categoria,subcategoria,niveisvenda,nivel1,nivel2,nivel3,nivel4,nivel5,nivel6,nivel7,nivel8,nivel9,nivel10,registro) VALUES (:produto,:descricao,:valor,:qtde,:pontos,:altura,:largura,:comprimento,:peso,:categoria,:subcategoria,:niveisvenda,:nivel1,:nivel2,:nivel3,:nivel4,:nivel5,:nivel6,:nivel7,:nivel8,:nivel9,:nivel10,:datas)";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":produto",$produtos);
		$obj->bindParam(":descricao",$descricao);
		$obj->bindParam(":valor",$valor);
		$obj->bindParam(":qtde",$quantidade);
		$obj->bindParam(":pontos",$pontos);
		$obj->bindParam(":altura",$altura);
		$obj->bindParam(":largura",$largura);
		$obj->bindParam(":comprimento",$comprimento);
		$obj->bindParam(":peso",$peso);
		$obj->bindParam(":categoria",$categoria);
		$obj->bindParam(":subcategoria",$subcategoria);
		$obj->bindParam(":niveisvenda",$niveisvenda);
		$obj->bindParam(":nivel1",$nivel1);
		$obj->bindParam(":nivel2",$nivel2);
		$obj->bindParam(":nivel3",$nivel3);
		$obj->bindParam(":nivel4",$nivel4);
		$obj->bindParam(":nivel5",$nivel5);
		$obj->bindParam(":nivel6",$nivel6);
		$obj->bindParam(":nivel7",$nivel7);
		$obj->bindParam(":nivel8",$nivel8);
		$obj->bindParam(":nivel9",$nivel9);
		$obj->bindParam(":nivel10",$nivel10);
		$obj->bindParam(":datas",$datas);
		$obj->execute();
		
		$lastid = $pdo->lastInsertId();
		
		return $lastid;
	}
	
	public function EditarProduto($pdo,$produtos,$valor,$pontos,$quantidade,$descricao,$altura,$largura,$comprimento,$peso,$categoria,$subcategoria,$niveisvenda,$nivel1,$nivel2,$nivel3,$nivel4,$nivel5,$nivel6,$nivel7,$nivel8,$nivel9,$nivel10, $i){
		
		$datas = date("Y-m-d H:i:s");
		
		$sql = "UPDATE produtos SET produto = :produto, descricao = :descricao, valor = :valor, qtde = :qtde, pontos = :pontos,altura = :altura, largura = :largura,comprimento = :comprimento, peso = :peso,categoria = :categoria, subcategoria = :subcategoria, niveisvenda = :niveisvenda, nivel1 = :nivel1, nivel2 = :nivel2, nivel3 = :nivel3, nivel4 = :nivel4, nivel5 = :nivel5, nivel6 = :nivel6, nivel7 = :nivel7, nivel8 = :nivel8, nivel9 = :nivel9, nivel10 = :nivel10 WHERE id = :idproduto";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":produto",$produtos);
		$obj->bindParam(":descricao",$descricao);
		$obj->bindParam(":valor",$valor);
		$obj->bindParam(":qtde",$quantidade);
		$obj->bindParam(":pontos",$pontos);
		$obj->bindParam(":altura",$altura);
		$obj->bindParam(":largura",$largura);
		$obj->bindParam(":comprimento",$comprimento);
		$obj->bindParam(":peso",$peso);
		$obj->bindParam(":categoria",$categoria);
		$obj->bindParam(":subcategoria",$subcategoria);
		$obj->bindParam(":niveisvenda",$niveisvenda);
		$obj->bindParam(":nivel1",$nivel1);
		$obj->bindParam(":nivel2",$nivel2);
		$obj->bindParam(":nivel3",$nivel3);
		$obj->bindParam(":nivel4",$nivel4);
		$obj->bindParam(":nivel5",$nivel5);
		$obj->bindParam(":nivel6",$nivel6);
		$obj->bindParam(":nivel7",$nivel7);
		$obj->bindParam(":nivel8",$nivel8);
		$obj->bindParam(":nivel9",$nivel9);
		$obj->bindParam(":nivel10",$nivel10);
		$obj->bindParam(":idproduto",$i);
		$obj->execute();
		
		return $i;
	}
	
	public function ativarProduto($pdo,$idproduto){
		
		$sql = "UPDATE produtos SET ativacao='1' WHERE id = :idproduto";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":idproduto",$idproduto);
		$obj->execute();
		
		return $obj;
	}
	
	public function desativarProduto($pdo,$idproduto){
		
		$sql = "UPDATE produtos SET ativacao='0' WHERE id = :idproduto";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":idproduto",$idproduto);
		$obj->execute();
		
		return $obj;
	}
	
	public function fazerCheckout($pdo,$valorfrete,$tempoentrega,$userid){
		
		$datas = date("Y-m-d H:i:s");
		
		 $total = 0;
		 $totalproduto = 0;
		 
		  	$sqlf = "SELECT * FROM acesso WHERE userid = :userid ";
			$objf = $pdo->prepare($sqlf);
			$objf->bindParam(":userid",$userid);
			$objf->execute();
			$linhaf = $objf->fetch(PDO::FETCH_ASSOC);
			$idplano = $linhaf['idplano'];
			
			$sqlg = "SELECT * FROM planos WHERE id = :idplano ";
			$objg = $pdo->prepare($sqlg);
			$objg->bindParam(":idplano",$idplano);
			$objg->execute();
			$linhag = $objg->fetch(PDO::FETCH_ASSOC);
			$desconto = $linhag['desconto'];
		
		
			$sqlb = "INSERT INTO pedido (idcliente,frete,dias,registro) VALUES (:idcliente,:frete,:tempo,:datas)";
			$objb = $pdo->prepare($sqlb);
			$objb->bindParam(":idcliente",$userid);
			$objb->bindParam(":frete",$valorfrete);
			$objb->bindParam(":tempo",$tempoentrega);
			$objb->bindParam(":datas",$datas);
			$objb->execute();
			
			$sqld = "SELECT * FROM pedido WHERE idcliente = :idcliente AND registro = :datas ";
			$objd = $pdo->prepare($sqld);
			$objd->bindParam(":idcliente",$userid);
			$objd->bindParam(":datas",$datas);
			$objd->execute();
			$linhad = $objd->fetch(PDO::FETCH_ASSOC);
			$idpedido = $linhad['id'];
			
			
			
		foreach($_SESSION['carrinhointerno'][$_SESSION['userid']] as $id => $qtd){
			
			$sql = "SELECT * FROM produtos WHERE  id = :id";
			$obj = $pdo->prepare($sql);
			$obj->bindParam(":id",$id);
			$obj->execute();
			$objt = $obj->fetch(PDO::FETCH_ASSOC);
			
			
			$preco = number_format($objt['valor'], 2, ',', '.');
			$sub   = number_format($objt['valor'] * $qtd, 2, ',', '.');
			$total = $objt['valor'] * $qtd;
			$totalproduto += $total;
			
			$sqlc = "INSERT INTO produto_pedido (userid,produto,idpedido,valor,quantidade,registro) VALUES (:userid,:produto,:idpedido,:valor,:quantidade,:datas)";
			$objc = $pdo->prepare($sqlc);
			$objc->bindParam(":userid",$userid);
			$objc->bindParam(":produto",$objt['id']);
			$objc->bindParam(":valor",$objt['valor']);
			$objc->bindParam(":idpedido",$idpedido);
			$objc->bindParam(":quantidade",$qtd);
			$objc->bindParam(":datas",$datas);
			$objc->execute();
			
		}
		
		
		
		$percentual = $desconto / 100.00; // 100%
		$valorfinal = $totalproduto - ($percentual * $totalproduto);
		$descontar = $totalproduto - $valorfinal;
		
		$totalprodutof = $totalproduto + $valorfrete - $descontar;
		
		$sqle = "UPDATE pedido SET total = :total, valor =:valor WHERE idcliente = :idcliente AND registro = :datas ";
		$obje = $pdo->prepare($sqle);
		$obje->bindParam(":total",$totalprodutof);
		$obje->bindParam(":valor",$totalproduto);
		$obje->bindParam(":idcliente",$userid);
		$obje->bindParam(":datas",$datas);
		$obje->execute();
			
			
		
		return $objb;
		
	}

	

}