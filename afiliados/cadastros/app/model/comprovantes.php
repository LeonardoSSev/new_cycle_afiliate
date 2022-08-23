<?php
    Class Comprovantes {

        public function ComprovanteId($pdo,$id,$userid){

            $sql = "SELECT userid,idtransacao FROM comprovantes WHERE idfatura = :id AND userid = :userid";
            $obj = $pdo->prepare($sql);
            $obj->bindParam(":id",$id);
            $obj->bindParam(":userid",$userid);
            $obj->execute();

            return $obj;

        }

        public function MandarComprovante($pdo, $id,  $idtransacao, $userid){

            $datas = date("Y-m-d H:i:s");

            $sql = "INSERT INTO comprovantes (userid, idtransacao,idfatura,registro) VALUES (:userid, :idtransacao,:id,'".$datas."')";
			$obj = $pdo->prepare($sql);
			$obj->bindParam(":userid",$userid);
            $obj->bindParam(":id",$id);
            $obj->bindParam(":idtransacao",$idtransacao);
            $obj->execute();
            
            return $obj;

            
        }
    }