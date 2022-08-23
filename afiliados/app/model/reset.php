<?php
class Reset{

    

	public function Resetar($pdo){
		
		$sql = "DELETE FROM pagamentos";
		$obj = $pdo->prepare($sql);
        $obj->execute();
        
        $sqlb = "DELETE FROM indicados WHERE id > 1";
		$objb = $pdo->prepare($sqlb);
        $objb->execute();
        
        $sqlc = "UPDATE indicados SET fase1='0',fase2='0',fase3='0',fase4='0',fase5='0',fase6='0',fase7='0',fase8='0',fase='1',ativacao='1' WHERE id = 1";
		$objc = $pdo->prepare($sqlc);
        $objc->execute();
        
        $sqld = "DELETE FROM acesso WHERE userid != '4'";
		$objd = $pdo->prepare($sqld);
        $objd->execute();

        $sqle = "DELETE FROM dadospessoais WHERE userid != '4'";
		$obje = $pdo->prepare($sqle);
        $obje->execute();

        $sqlf = "DELETE FROM dadosbancarios WHERE userid != '4'";
		$objf = $pdo->prepare($sqlf);
        $objf->execute();

        $sqlg = "DELETE FROM financas ";
		$objg = $pdo->prepare($sqlg);
        $objg->execute();

		return $obj;
	}

	

}