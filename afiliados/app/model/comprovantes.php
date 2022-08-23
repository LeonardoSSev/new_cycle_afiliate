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

        public function MandarComprovanteMibank($pdo, $id,  $idtransacao, $userid){

            $datas = date("Y-m-d H:i:s");

            $sql = "SELECT * FROM comprovantes WHERE idfatura = :id AND userid = :userid";
            $obj = $pdo->prepare($sql);
            $obj->bindParam(":id",$id);
            $obj->bindParam(":userid",$userid);
            $obj->execute();
            $contagem = $obj->rowCount();

            if($contagem == '1'){
        
                $sqlb = "UPDATE comprovantes SET idtransacao = :idtransacao AND userid = :userid";
                $objb = $pdo->prepare($sqlb);
                $objb->bindParam(":userid",$userid);
                $objb->bindParam(":id",$id);
                $objb->bindParam(":idtransacao",$idtransacao);
                $objb->execute();

            }else{

                $sqlb = "INSERT INTO comprovantes (userid, idtransacao,idfatura,registro) VALUES (:userid, :idtransacao,:id,'".$datas."')";
                $objb = $pdo->prepare($sqlb);
                $objb->bindParam(":userid",$userid);
                $objb->bindParam(":id",$id);
                $objb->bindParam(":idtransacao",$idtransacao);
                $objb->execute();

            }
            
            return $obj;
            
        }

        public function MandarComprovante($pdo, $idfatura,  $idtransacao, $userid){

            $datas = date("Y-m-d H:i:s");

            $sql = "SELECT * FROM fatura WHERE idtransacao = :idtransacao AND userid = :userid AND id = :idfatura";
            $obj = $pdo->prepare($sql);
            $obj->bindParam(":idfatura",$idfatura);
			$obj->bindParam(":idtransacao",$idtransacao);
            $obj->bindParam(":userid",$userid);
            $obj->execute();
            $contagem = $obj->rowCount();

           
            
            return $obj;
            
        }
    }