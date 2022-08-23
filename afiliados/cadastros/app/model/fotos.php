<?php
    class Fotos {

        public function pegaFotos($pdo,$userid){

            $sql = "SELECT fotos FROM acesso WHERE userid = :userid";
            $obj = $pdo->prepare($sql);
            $obj->bindParam(":userid",$userid);
            $obj->execute();

            return $obj;

        }
        
    }
?>