 <?php
 Class Header{


	
	 public function pegaProdutosporIdCarrinho($pdo,$id){
		
		$sql = "SELECT * FROM produtos WHERE id = :id";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":id",$id);
		$obj->execute();
		$linha = $obj->fetch(PDO::FETCH_ASSOC);
		
		return $linha;
		
    }
    
    public function pegaImagem($pdo,$id){
		
		$sql = "SELECT * FROM imagens_produto WHERE idproduto = :id AND principal='1'";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":id",$id);
		$obj->execute();
		$linha  =$obj->fetch(PDO::FETCH_ASSOC);
		
		return $linha['imagem'];
		
	}
	

 }

 ?>