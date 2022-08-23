<?php
class Dadosbancarios {


	public function pegaDadosBancarios($pdo, $userid){
		
		$sql = "SELECT * FROM dadosbancarios WHERE userid = :userid  ";
		
			
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->execute();
		return $obj;
	}



	

}