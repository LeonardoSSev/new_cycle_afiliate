<?php

	Class Subcategorias{
		
		public function pegaSubCategoria($pdo,$categoria){
			
		$sql = "SELECT * FROM subcategorias  WHERE categoria = :categoria";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":categoria",$categoria);
		$obj->execute();
		
		return $obj;
		}
		
		public function pegaSubCategoriab($pdo){
			
		$sql = "SELECT * FROM subcategorias ";
		$obj = $pdo->prepare($sql);
		$obj->execute();
		$linha = $obj->fetch(PDO::FETCH_ASSOC);
		
		
		return $linha;
		}
		
		public function pegaListaSubCategoria($pdo){
			
		$sql = "SELECT * FROM subcategorias ";
		$obj = $pdo->prepare($sql);
		$obj->execute();
		
		
		return $obj;
		}
		
		
		
		public function pegaSubCategoriaid($pdo, $id){
			
		$sql = "SELECT * FROM subcategorias WHERE id = :id";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":id",$id);
		$obj->execute();
		
		return $obj;
		}
		
		public function CadastrarSubCategoria($pdo,$nomesubcategoria,$categoria){
			
			$datas = date("Y-m-d H:i:s");
			
			$sql = "INSERT INTO subcategorias (subcategoria,categoria,registro) VALUES (:subcategoria,:categoria,:datas)";
			$obj = $pdo->prepare($sql);
			$obj->bindParam(":subcategoria",$nomesubcategoria);
			$obj->bindParam(":categoria",$categoria);
			$obj->bindParam(":datas",$datas);
			$obj->execute();
			
			return $obj;
			
		}
		
		public function EditarSubCategoria($pdo,$nomesubcategoria, $nomecategoria,$id){
			
			$sql = "UPDATE subcategorias SET subcategoria = :subcategoria, categoria = :categoria WHERE id = :id";
			$obj = $pdo->prepare($sql);
			$obj->bindParam(":subcategoria",$nomesubcategoria);
			$obj->bindParam(":categoria",$nomecategoria);
			$obj->bindParam(":id",$id);
			$obj->execute();
			
			return $obj;
			
			
		}
		
		public function ExcluirSubCategoria($pdo,$id){
			
			$sql = "DELETE FROM subcategorias WHERE id = :id";
			$obj = $pdo->prepare($sql);
			$obj->bindParam(":id",$id);
			$obj->execute();
			
			return $obj;
			
			
		}
		
		
	}