 <?php
 Class Bancarios{

    public function pegaDadosBancarios($pdo, $userid){
		
		$sql = "SELECT * FROM dadosbancarios WHERE userid = :userid   ";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->execute();
		return $obj;
		
	}

	public function pegaUsuario($pdo, $idfatura){

		$sql = "SELECT *,acesso.usuario FROM pagamentos,acesso WHERE pagamentos.useridb = acesso.userid AND pagamentos.id = :idfatura";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":idfatura",$idfatura);
		$obj->execute();
		$linha = $obj->fetch(PDO::FETCH_ASSOC);


		return $linha;
	}

	public function pegaUsuariob($pdo, $userid){

		$sql = "SELECT *,acesso.usuario FROM pagamentos,acesso WHERE pagamentos.useridb = acesso.userid AND pagamentos.useridb = :useridb";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":useridb",$userid);
		$obj->execute();
		$linha = $obj->fetch(PDO::FETCH_ASSOC);


		return $linha;
	}
	
	public function pegaStatus($pdo,$cupom){
		
		$sql = "SELECT * FROM ticket WHERE cupom = :cupom ORDER BY id DESC";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":cupom",$cupom);
		$obj->execute();
		$linha = $obj->fetch(PDO::FETCH_ASSOC);
		
		return $linha['status'];
		
	}
	
	public function PegaDoador($pdo,$userid){

		$sql = "SELECT * FROM acesso WHERE userid = :userid ";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->execute();
		$linha = $obj->fetch(PDO::FETCH_ASSOC);


		return $linha['usuario'];
		
	}

	public function verPagamento($pdo,$idusuario){

		$sql = "SELECT * FROM pagamentos WHERE userid = :userid";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$idusuario);
		$obj->execute();
		$contagem = $obj->rowCount();

		return $contagem;
	}

	public function pegaComprovante($pdo,$idusuario, $id){

		$sql = "SELECT * FROM comprovantes WHERE userid = :userid AND idfatura = :id";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$idusuario);
		$obj->bindParam(":id",$id);
		$obj->execute();
		$contagem = $obj->rowCount();

		return $contagem;
	}
	
	
	
	public function PegaDados($pdo,$userid){

		$sql = "SELECT * FROM dadospessoais WHERE userid = :userid ";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->execute();


		return $obj;
		
	}

	public function VerComprovante($pdo,$idusuario, $id){

		$sql = "SELECT * FROM comprovantes WHERE userid = :userid AND idfatura = :id";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$idusuario);
		$obj->bindParam(":id",$id);
		$obj->execute();
		$linha = $obj->fetch(PDO::FETCH_ASSOC);


		return $linha['ativacao'];
	}
	
	  public function pegaNivel($pdo,$userid){
		
		$sql = "SELECT * FROM acesso WHERE userid = :userid";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->execute();
		$linha = $obj->fetch(PDO::FETCH_ASSOC);
		
		return $linha['admin'];
		
	}
	
	 public function pegaGraduacao($pdo,$userid){
		
		$sql = "SELECT * FROM indicados WHERE userid = :userid";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->execute();
		$linha = $obj->fetch(PDO::FETCH_ASSOC);
		
		return $linha['fase'];
		
	}
	
	public function pegaDesconto($pdo,$userid){
		
		$sql = "SELECT * FROM acesso WHERE userid = :userid ";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->execute();
		$linha = $obj->fetch(PDO::FETCH_ASSOC);
		$idplano = $linha['idplano'];
		
		$sqlb = "SELECT * FROM planos WHERE id = :idplano ";
		$objb = $pdo->prepare($sqlb);
		$objb->bindParam(":idplano",$idplano);
		$objb->execute();
		$linhab = $objb->fetch(PDO::FETCH_ASSOC);
		$desconto = $linhab['desconto'];
		
		return $desconto;
		
	}
	
	public function pegaEndereco($pdo,$userid){
			
			
			
			$sql = "SELECT rua, numero,cidade,estado,bairro,cep,cpf,nome,whatsapp FROM dadospessoais WHERE userid = :userid ";
			$obj = $pdo->prepare($sql);
			$obj->bindParam(":userid",$userid);
			$obj->execute();
			$linha = $obj->fetch(PDO::FETCH_ASSOC);
			
			return $linha;

		}
		
	public function pegaTaxa($pdo){
			
		$sql = "SELECT * FROM configuracoes WHERE id = '6' ";
		$obj = $pdo->prepare($sql);
		$obj->execute();
		$linha = $obj->fetch(PDO::FETCH_ASSOC);
		
		return $linha['valor'];

	}
	
	public function pegaPlanos($pdo,$userid){

			$sql = "SELECT * FROM acesso WHERE userid = :userid ";
			$obj = $pdo->prepare($sql);
			$obj->bindParam(":userid",$userid);
			$obj->execute();
			$linha = $obj->fetch(PDO::FETCH_ASSOC);
			$idplano = $linha['idplano'];
			
			$sqlb = "SELECT * FROM planos WHERE id = :idplano ";
			$objb = $pdo->prepare($sqlb);
			$objb->bindParam(":idplano",$idplano);
			$objb->execute();
			$linhab = $objb->fetch(PDO::FETCH_ASSOC);
			
			return $linhab['desconto'];


		}
		
		public function pegaListaImagens($pdo,$idproduto){
			
		$sql = "SELECT * FROM imagens_produto WHERE idproduto = :idproduto";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":idproduto",$idproduto);
		$obj->execute();


		return $obj;
		
	}
	
		public function pegaBanco($pdo){

			$sql = "SELECT * FROM dadosbancarios WHERE userid = '4' ";
			$obj = $pdo->prepare($sql);
			$obj->execute();
			
			return $obj;


		}
		
			public function pegaImagem($pdo,$id){
		
		$sql = "SELECT * FROM imagens_produto WHERE idproduto = :id AND principal='1'";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":id",$id);
		$obj->execute();
		$linha  =$obj->fetch(PDO::FETCH_ASSOC);
		
		return $linha['imagem'];
		
	}
		
			public function pegaceporigem($pdo){
			
			$sql = "SELECT * FROM dadospessoais WHERE userid = '4' ";
			$obj = $pdo->prepare($sql);
			$obj->execute();
			$linha = $obj->fetch(PDO::FETCH_ASSOC);
			
			return $linha;
		}
		
		public function pegacepdestino($pdo,$userid){
			
			$sql = "SELECT * FROM dadospessoais WHERE userid = :userid ";
			$obj = $pdo->prepare($sql);
			$obj->bindParam(":userid",$userid);
			$obj->execute();
			$linha = $obj->fetch(PDO::FETCH_ASSOC);
			
			return $linha;

		}
		
		 public function pegaProdutosporIdCarrinho($pdo,$id){
		
		$sql = "SELECT * FROM produtos WHERE id = :id";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":id",$id);
		$obj->execute();
		$linha = $obj->fetch(PDO::FETCH_ASSOC);
		
		return $linha;
		
		
	}
	
	public function pegaProdutos($pdo,$idproduto){
			
		$sql = "SELECT produtos.id,produtos.produto,produtos.descricao,produtos.valor,imagens_produto.imagem FROM produtos,imagens_produto WHERE produtos.id = :idproduto AND produtos.id = imagens_produto.idproduto";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":idproduto",$idproduto);
		$obj->execute();
		$linha = $obj->fetch(PDO::FETCH_ASSOC);


		return $linha;
		
	}
	
	public function pegalistaProdutos($pdo,$idpedido){
			
		$sql = "SELECT * FROM produto_pedido WHERE idpedido = :idpedido ";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":idpedido",$idpedido);
		$obj->execute();
		
		return $obj;
		
	}
	
	public function pegaSaldo($pdo,$userid){
					
		$sql = "SELECT saldo FROM saldo WHERE userid = :userid ORDER BY id DESC";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->execute();
		$linha = $obj->fetch(PDO::FETCH_ASSOC);
		
		return $linha['saldo'];
		
	}

	public function pegaRecebedor($pdo,$cupom){
					
		$sql = "SELECT userid FROM indicados WHERE cupom = :cupom ";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":cupom",$cupom);
		$obj->execute();
		$linha = $obj->fetch(PDO::FETCH_ASSOC);
		$userid = $linha['userid'];

		$sqlb = "SELECT indicados.logins,acesso.usuario FROM indicados,acesso WHERE acesso.userid = :userid AND indicados.cupom = :cupom AND indicados.userid = acesso.userid";
		$objb = $pdo->prepare($sqlb);
		$objb->bindParam(":userid",$userid);
		$objb->bindParam(":cupom",$cupom);
		$objb->execute();
		$linhab = $objb->fetch(PDO::FETCH_ASSOC);
		
		return $linhab;
		
	}

	public function PegaDoadorb($pdo,$cupom, $userid){
					
		$sql = "SELECT indicados.logins,acesso.usuario FROM indicados,acesso WHERE indicados.cupom = :cupom AND indicados.userid =  acesso.userid";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":cupom",$cupom);
		$obj->execute();
		$linha = $obj->fetch(PDO::FETCH_ASSOC);

		if($linha['usuario'] == ''){

			$sql = "SELECT usuario FROM acesso WHERE userid =  :userid";
			$obj = $pdo->prepare($sql);
			$obj->bindParam(":userid",$userid);
			$obj->execute();
			$linha = $obj->fetch(PDO::FETCH_ASSOC);

		}
		
		return $linha;
		
	}

	public function pegaEsperar($pdo,$userid){
					
		$sql = "SELECT esperar FROM acesso WHERE userid =  :userid";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->execute();
		$linha = $obj->fetch(PDO::FETCH_ASSOC);
		$esperar = $linha['esperar'];
		
		return $esperar;
		
	}

	public function pegaEspera($pdo,$id){
					
		$sql = "SELECT esperar FROM pagamentos WHERE id =  :id";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":id",$id);
		$obj->execute();
		$linha = $obj->fetch(PDO::FETCH_ASSOC);
		$esperar = $linha['esperar'];
		
		return $esperar;
		
	}
	 
	 public function pegaLinkIndicacao($pdo){
					
		$sql = "SELECT habilitar FROM configuracoes WHERE id = '10'";
		$obj = $pdo->prepare($sql);
		$obj->execute();
		$linha = $obj->fetch(PDO::FETCH_ASSOC);
		$habilitar = $linha['habilitar'];
		
		return $habilitar;
		
	}
	 
	  public function pegaUp($pdo,$id){
					
		$sql = "SELECT cupomb FROM pagamentos WHERE id = :id";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":id",$id);
		$obj->execute();
		$linha = $obj->fetch(PDO::FETCH_ASSOC);
		$cupomb = $linha['cupomb'];
		  
		$sqlb = "SELECT ativacao FROM indicados WHERE cupom = :cupomb";
		$objb = $pdo->prepare($sqlb);
		$objb->bindParam(":cupomb",$cupomb);
		$objb->execute();
		$linhab = $objb->fetch(PDO::FETCH_ASSOC);
		$ativacao = $linhab['ativacao'];
		  
	    
		return $ativacao;
		
	}
	 
	  public function pegaUpline($pdo,$userid){
					
		$sql = "SELECT * FROM indicados WHERE userid = :userid";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->execute();
		$linha = $obj->fetch(PDO::FETCH_ASSOC);
		$fase = $linha['fase'];$sponsorid = $linha['sponsorid'];$sponsorid2 = $linha['sponsorid2'];
		$sponsorid3 = $linha['sponsorid3'];$sponsorid4 = $linha['sponsorid4'];
		  
		if($fase == '1'){
			
			$sqlb = "SELECT * FROM indicados WHERE cupom = :sponsorid";
			$objb = $pdo->prepare($sqlb);
			$objb->bindParam(":sponsorid",$sponsorid);
			$objb->execute();
			$linhab = $objb->fetch(PDO::FETCH_ASSOC);
			$idusuario1 = $linhab['userid'];
			
			$sqlc = "SELECT dadospessoais.nome,dadospessoais.whatsapp,dadospessoais.email,acesso.usuario,acesso.userid FROM dadospessoais,acesso WHERE dadospessoais.userid = :idusuario1 AND dadospessoais.userid = acesso.userid";
			$objc = $pdo->prepare($sqlc);
			$objc->bindParam(":idusuario1",$idusuario1);
			$objc->execute();
			$linhac = $objc->fetch(PDO::FETCH_ASSOC);
			
			
		}else if($fase == '2'){
			
			$sqlb = "SELECT * FROM indicados WHERE cupom = :sponsorid";
			$objb = $pdo->prepare($sqlb);
			$objb->bindParam(":sponsorid",$sponsorid2);
			$objb->execute();
			$linhab = $objb->fetch(PDO::FETCH_ASSOC);
			$idusuario1 = $linhab['userid'];
			
			$sqlc = "SELECT dadospessoais.nome,dadospessoais.whatsapp,dadospessoais.email,acesso.usuario,acesso.userid FROM dadospessoais,acesso WHERE dadospessoais.userid = :idusuario1 AND dadospessoais.userid = acesso.userid";
			$objc = $pdo->prepare($sqlc);
			$objc->bindParam(":idusuario1",$idusuario1);
			$objc->execute();
			$linhac = $objc->fetch(PDO::FETCH_ASSOC);
			
		}else if($fase == '3'){
			
			$sqlb = "SELECT * FROM indicados WHERE cupom = :sponsorid";
			$objb = $pdo->prepare($sqlb);
			$objb->bindParam(":sponsorid",$sponsorid3);
			$objb->execute();
			$linhab = $objb->fetch(PDO::FETCH_ASSOC);
			$idusuario1 = $linhab['userid'];
			
			$sqlc = "SELECT dadospessoais.nome,dadospessoais.whatsapp,dadospessoais.email,acesso.usuario,acesso.userid FROM dadospessoais,acesso WHERE dadospessoais.userid = :idusuario1 AND dadospessoais.userid = acesso.userid";
			$objc = $pdo->prepare($sqlc);
			$objc->bindParam(":idusuario1",$idusuario1);
			$objc->execute();
			$linhac = $objc->fetch(PDO::FETCH_ASSOC);
			
		}else if($fase == '4'){
			
			$sqlb = "SELECT * FROM indicados WHERE cupom = :sponsorid";
			$objb = $pdo->prepare($sqlb);
			$objb->bindParam(":sponsorid",$sponsorid4);
			$objb->execute();
			$linhab = $objb->fetch(PDO::FETCH_ASSOC);
			$idusuario1 = $linhab['userid'];
			
			$sqlc = "SELECT dadospessoais.nome,dadospessoais.whatsapp,dadospessoais.email,acesso.usuario,acesso.userid FROM dadospessoais,acesso WHERE dadospessoais.userid = :idusuario1 AND dadospessoais.userid = acesso.userid";
			$objc = $pdo->prepare($sqlc);
			$objc->bindParam(":idusuario1",$idusuario1);
			$objc->execute();
			$linhac = $objc->fetch(PDO::FETCH_ASSOC);
			
		}
		
		return $linhac;
		
	}


 }

 ?>