<?php

	Class Categorias{
		
		public function pegaCategoria($pdo){
			
		$sql = "SELECT * FROM categorias ";
		$obj = $pdo->prepare($sql);
		$obj->execute();
		
		return $obj;
		}
		
		public function pegaCategoriaid($pdo, $id){
			
		$sql = "SELECT * FROM categorias WHERE id = :id";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":id",$id);
		$obj->execute();
		
		return $obj;
		}
		
		public function CadastrarCategoria($pdo,$nomecategoria){
			
			$datas = date("Y-m-d H:i:s");
			
			$sql = "INSERT INTO categorias (categoria,registro) VALUES (:categoria,:datas)";
			$obj = $pdo->prepare($sql);
			$obj->bindParam(":categoria",$nomecategoria);
			$obj->bindParam(":datas",$datas);
			$obj->execute();
			
			return $obj;
			
		}
		
		public function EditarCategoria($pdo,$nomecategoria,$id){
			
			$sql = "UPDATE categorias SET categoria = :categoria WHERE id = :id";
			$obj = $pdo->prepare($sql);
			$obj->bindParam(":categoria",$nomecategoria);
			$obj->bindParam(":id",$id);
			$obj->execute();
			
			return $obj;
			
			
		}
		
		public function ExcluirCategoria($pdo,$id){
			
			$sql = "DELETE FROM categorias WHERE id = :id";
			$obj = $pdo->prepare($sql);
			$obj->bindParam(":id",$id);
			$obj->execute();
			
			return $obj;
			
			
		}
		
		
	}