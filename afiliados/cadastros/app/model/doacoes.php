<?php
    Class Doacoes{

        public function Doacoesfeitas($pdo,$userid){
        
            $sql = "SELECT * FROM pagamentos WHERE userid = :userid AND ativacao='1'";
            $obj = $pdo->prepare($sql);
            $obj->bindParam(":userid",$userid);
            $obj->execute();
            $contagem = $obj->rowCount();

            return $contagem;

        }
        
        public function Doacoesrecebidas($pdo,$userid){
        
            $sql = "SELECT * FROM pagamentos WHERE useridb = :userid AND ativacao='1'";
            $obj = $pdo->prepare($sql);
            $obj->bindParam(":userid",$userid);
            $obj->execute();
            $contagem = $obj->rowCount();

            return $contagem;

        }
        
        public function Doacoespendentes($pdo,$userid){
        
            $sql = "SELECT * FROM pagamentos WHERE userid = :userid AND ativacao='0'";
            $obj = $pdo->prepare($sql);
            $obj->bindParam(":userid",$userid);
            $obj->execute();
            $contagem = $obj->rowCount();

            return $contagem;

        }
        
        public function Doacoesaliberar($pdo,$userid){
        
            $sql = "SELECT * FROM pagamentos WHERE useridb = :userid AND ativacao='0'";
            $obj = $pdo->prepare($sql);
            $obj->bindParam(":userid",$userid);
            $obj->execute();
            $contagem = $obj->rowCount();

            return $contagem;

	    }

}
?>