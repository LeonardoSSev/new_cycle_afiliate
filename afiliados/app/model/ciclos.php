<?php

    Class Ciclos{

        

        public function pegaCiclo($pdo,$ciclo){

            $sql = "SELECT * FROM indicados WHERE fase = :ciclo";
            $obj = $pdo->prepare($sql);
            $obj->bindParam(":ciclo",$ciclo);
            $obj->execute();

            return $obj;

        }

        public function pegaCicloUsuario($pdo,$ciclo,$userid){

            $sql = "SELECT * FROM indicados WHERE fase = :ciclo AND userid = :userid";
            $obj = $pdo->prepare($sql);
            $obj->bindParam(":ciclo",$ciclo);
            $obj->bindParam(":userid",$userid);
            $obj->execute();

            return $obj;

        }

        public function GerarReentrada($pdo,$idusuario){

            $cupom = geraSenha(15, true, true);
            $datas = date("Y-m-d H:i:s");

            $sql = "SELECT * FROM configuracoes WHERE id = '1'";
            $obj = $pdo->prepare($sql);
            $obj->execute();
            $linha = $obj->fetch(PDO::FETCH_ASSOC);
            $valor = $linha['valor'];$lateralidade = $linha['lateralidade'];$valorup = $linha['upgrade'];$lucro = $linha['lucro'];
            $muda = $lateralidade - 1;$travar = $linha['trava'] - 1;

            $sqlt = "SELECT * FROM configuracoes WHERE id = '17'";
            $objt = $pdo->prepare($sqlt);
            $objt->execute();
            $linhat = $objt->fetch(PDO::FETCH_ASSOC);
            $hora = $linhat['hora'];$motivo = $linhat['motivo'];

            $datavencimento = date('Y-m-d H:i:s', strtotime("+$hora $motivo"));

            $sq = "SELECT * FROM acesso  ";
            $ob = $pdo->prepare($sq);
            $ob->execute();
            $con = $ob->rowCount();

            ####################################################################################################################################
            $sqlb9 = "SELECT * FROM acesso WHERE userid = :iduser  ";
            $objb9 = $pdo->prepare($sqlb9);
            $objb9->bindParam(":iduser",$idusuario);
            $objb9->execute();
            $linhab9 = $objb9->fetch(PDO::FETCH_ASSOC);
            $sponsorid1 = $linhab9['sponsorid'];

            if($idusuario == '1'){
                $sponsorid1 = '1';
             }

            $sqlb9b = "SELECT * FROM indicados WHERE userid = :sponsorid1  ";
            $objb9b = $pdo->prepare($sqlb9b);
            $objb9b->bindParam(":sponsorid1",$sponsorid1);
            $objb9b->execute();
            $linhab9b = $objb9b->fetch(PDO::FETCH_ASSOC);
            $cupons = $linhab9b['cupom'];

          
        
           $sponsoridfinal = $cupons;
          

            $matrizc = array($sponsoridfinal);

           for($a=0;$a<=$con;$a++){

           $sqlb = "SELECT * FROM indicados WHERE  cupom = :sponsorid ";
           $objb = $pdo->prepare($sqlb);
           $objb->bindParam(":sponsorid",$matrizc[$a]);
           $objb->execute();
           $linhab = $objb->fetch(PDO::FETCH_ASSOC);
           $useridb = $linhab['userid'];$cupomb = $linhab['cupom'];$trava = $linhab['trava'];

           $sqlbb = "SELECT * FROM indicados WHERE sponsorid = :sponsorid ORDER BY dataativacao1 ASC";
           $objbb = $pdo->prepare($sqlbb);
           $objbb->bindParam(":sponsorid",$cupomb);
           $objbb->execute();
           while($linhabb = $objbb->fetch(PDO::FETCH_ASSOC)){
           $cupomc = $linhabb['cupom'];

               array_push($matrizc,$cupomc);
           }

     

            $sqlc = "SELECT * FROM pagamentos WHERE cupomb = :cupomb AND fase = '1'";
            $objc = $pdo->prepare($sqlc);
            $objc->bindParam(":cupomb",$cupomb);
            $objc->execute();
            $contagemm = $objc->rowCount();

           
            if($contagemm == $muda){

             
    
                        $sqld = "UPDATE indicados SET fase1 = '1' WHERE cupom = :cupomc";
                        $objd = $pdo->prepare($sqld);
                        $objd->bindParam(":cupomc",$cupomb);
                        $objd->execute();

                        $sqle = "INSERT INTO pagamentos (userid,descricao,cupom,cupomb,useridb,valor,fase,posicao,ativacao,reentrada,datavencimento,registro) VALUES (:userid,'Doação Inicial',:cupom,:cupomb,:useridb,:valor,'1','0','0','1',:datavencimento,'".$datas."')";
                        $obje = $pdo->prepare($sqle);
                        $obje->bindParam(":userid",$idusuario);
                        $obje->bindParam(":cupom",$cupom);
                        $obje->bindParam(":cupomb",$cupomb);
                        $obje->bindParam(":useridb",$useridb);
                        $obje->bindParam(":valor",$valor);
                        $obje->bindParam(":datavencimento",$datavencimento);
                        $obje->execute();

                       
                        
            break;
            

            }else if($contagemm == $travar){

/*
                $sqld = "UPDATE indicados SET trava = '1' WHERE cupom = :cupomc";
                $objd = $pdo->prepare($sqld);
                $objd->bindParam(":cupomc",$cupomb);
                $objd->execute();
*/
               
                $sqle = "INSERT INTO pagamentos (userid,descricao,cupom,cupomb,useridb,valor,fase,posicao,ativacao,reentrada,datavencimento,registro) VALUES (:userid,'Doação Inicial',:cupom,:cupomb,:useridb,:valor,'1','0','0','1',:datavencimento,'".$datas."')";
                $obje = $pdo->prepare($sqle);
                $obje->bindParam(":userid",$idusuario);
                $obje->bindParam(":cupom",$cupom);
                $obje->bindParam(":cupomb",$cupomb);
                $obje->bindParam(":useridb",$useridb);
                $obje->bindParam(":valor",$valor);
                $obje->bindParam(":datavencimento",$datavencimento);
                $obje->execute();

               
                break;
					
			
            }else if($contagemm < $lateralidade){

               
                $sqle = "INSERT INTO pagamentos (userid,descricao,cupom,cupomb,useridb,valor,fase,posicao,ativacao,reentrada,datavencimento,registro) VALUES (:userid,'Doação Inicial',:cupom,:cupomb,:useridb,:valor,'1','0','0','1',:datavencimento,'".$datas."')";
                $obje = $pdo->prepare($sqle);
                $obje->bindParam(":userid",$idusuario);
                $obje->bindParam(":cupom",$cupom);
                $obje->bindParam(":cupomb",$cupomb);
                $obje->bindParam(":useridb",$useridb);
                $obje->bindParam(":valor",$valor);
                $obje->bindParam(":datavencimento",$datavencimento);
                $obje->execute();

               

            break;
					
			
            }

        }


			
			####################################################################################################################################

          return true;

        }

        public function CriarReentradas($pdo,$idusuario){

            $cupom = geraSenha(15, true, true);
            $datas = date("Y-m-d H:i:s");

            $sql = "SELECT * FROM configuracoes WHERE id = '1'";
            $obj = $pdo->prepare($sql);
            $obj->execute();
            $linha = $obj->fetch(PDO::FETCH_ASSOC);
            $valor = $linha['valor'];$lateralidade = $linha['lateralidade'];$valorup = $linha['upgrade'];$lucro = $linha['lucro'];
            $muda = $lateralidade - 1;$travar = $linha['trava'] - 1;

            $sqlt = "SELECT * FROM configuracoes WHERE id = '17'";
            $objt = $pdo->prepare($sqlt);
            $objt->execute();
            $linhat = $objt->fetch(PDO::FETCH_ASSOC);
            $hora = $linhat['hora'];$motivo = $linhat['motivo'];

            $datavencimento = date('Y-m-d H:i:s', strtotime("+$hora $motivo"));

            $sq = "SELECT * FROM acesso  ";
            $ob = $pdo->prepare($sq);
            $ob->execute();
            $con = $ob->rowCount();

       

            ####################################################################################################################################
            $sqlb9 = "SELECT * FROM acesso WHERE userid = :iduser  ";
            $objb9 = $pdo->prepare($sqlb9);
            $objb9->bindParam(":iduser",$idusuario);
            $objb9->execute();
            $linhab9 = $objb9->fetch(PDO::FETCH_ASSOC);
            $sponsorid1 = $linhab9['sponsorid'];$qtdereentradas = $linhab9['qtdereentradas'];

            if($sponsorid1 == '' || $sponsorid1 == '0'){
                $sponsorid1 = '1';
            }

          

            $sqlb9b = "SELECT * FROM indicados WHERE userid = :sponsorid1  ";
            $objb9b = $pdo->prepare($sqlb9b);
            $objb9b->bindParam(":sponsorid1",$sponsorid1);
            $objb9b->execute();
            $linhab9b = $objb9b->fetch(PDO::FETCH_ASSOC);
            $cupons = $linhab9b['cupom'];

           
        
           $sponsoridfinal = $cupons;

         
          

            $matrizc = array($sponsoridfinal);

           for($a=0;$a<=$con;$a++){

           $sqlb = "SELECT * FROM indicados WHERE  cupom = :sponsorid ";
           $objb = $pdo->prepare($sqlb);
           $objb->bindParam(":sponsorid",$matrizc[$a]);
           $objb->execute();
           $linhab = $objb->fetch(PDO::FETCH_ASSOC);
           $useridb = $linhab['userid'];$cupomb = $linhab['cupom'];$trava = $linhab['trava'] ;

           $sqlbb = "SELECT * FROM indicados WHERE sponsorid = :sponsorid ORDER BY dataativacao1 ASC";
           $objbb = $pdo->prepare($sqlbb);
           $objbb->bindParam(":sponsorid",$cupomb);
           $objbb->execute();
           while($linhabb = $objbb->fetch(PDO::FETCH_ASSOC)){
           $cupomc = $linhabb['cupom'];

               array_push($matrizc,$cupomc);
           }

          

            $sqll = "SELECT * FROM indicados WHERE userid = :userid";
            $objl = $pdo->prepare($sqll);
            $objl->bindParam(":userid",$useridb);
            $objl->execute();
            $contalogins = $objl->rowCount();

     

            $sqlc = "SELECT * FROM pagamentos where cupomb = :cupomb AND fase = '1'";
            $objc = $pdo->prepare($sqlc);
            $objc->bindParam(":cupomb",$cupomb);
            $objc->execute();
            $contagemm = $objc->rowCount();

          
           
            if($contagemm == $muda){

                $sqld = "UPDATE indicados SET fase1 = '1' WHERE cupom = :cupomc";
                $objd = $pdo->prepare($sqld);
                $objd->bindParam(":cupomc",$cupomb);
                $objd->execute();

               

                if($trava == '1'){
/*
                    $sqldh = "UPDATE acesso SET esperar = '1' WHERE userid = :idusuario";
                    $objdh = $pdo->prepare($sqldh);
                    $objdh->bindParam(":idusuario",$idusuario);
                    $objdh->execute();
*/
                    $sqle = "INSERT INTO pagamentos (userid,descricao,cupom,cupomb,useridb,valor,fase,posicao,esperar,ativacao,datavencimento,registro) VALUES (:userid,'Doação Inicial',:cupom,:cupomb,:useridb,:valor,'1','0','1','0',:datavencimento,'".$datas."')";
                    $obje = $pdo->prepare($sqle);
                    $obje->bindParam(":userid",$idusuario);
                    $obje->bindParam(":cupom",$cupom);
                    $obje->bindParam(":cupomb",$cupomb);
                    $obje->bindParam(":useridb",$useridb);
                    $obje->bindParam(":valor",$valor);
                    $obje->bindParam(":datavencimento",$datavencimento);
                    $obje->execute();

                }else if($trava == '0'){

                    $sqle = "INSERT INTO pagamentos (userid,descricao,cupom,cupomb,useridb,valor,fase,posicao,ativacao,datavencimento,registro) VALUES (:userid,'Doação Inicial',:cupom,:cupomb,:useridb,:valor,'1','0','0',:datavencimento,'".$datas."')";
                    $obje = $pdo->prepare($sqle);
                    $obje->bindParam(":userid",$idusuario);
                    $obje->bindParam(":cupom",$cupom);
                    $obje->bindParam(":cupomb",$cupomb);
                    $obje->bindParam(":useridb",$useridb);
                    $obje->bindParam(":valor",$valor);
                    $obje->bindParam(":datavencimento",$datavencimento);
                    $obje->execute();

                }
   
                        
                break;
            

            }else if($contagemm == $travar){

/*
                $sqld = "UPDATE indicados SET trava = '1' WHERE cupom = :cupomc";
                $objd = $pdo->prepare($sqld);
                $objd->bindParam(":cupomc",$cupomb);
                $objd->execute();
*/
               
                $sqle = "INSERT INTO pagamentos (userid,descricao,cupom,cupomb,useridb,valor,fase,posicao,ativacao,datavencimento,registro) VALUES (:userid,'Doação Inicial',:cupom,:cupomb,:useridb,:valor,'1','0','0',:datavencimento,'".$datas."')";
                $obje = $pdo->prepare($sqle);
                $obje->bindParam(":userid",$idusuario);
                $obje->bindParam(":cupom",$cupom);
                $obje->bindParam(":cupomb",$cupomb);
                $obje->bindParam(":useridb",$useridb);
                $obje->bindParam(":valor",$valor);
                $obje->bindParam(":datavencimento",$datavencimento);
                $obje->execute();

               
                break;
					
			
            }else if($contagemm < $lateralidade){

               
             
                $sqle = "INSERT INTO pagamentos (userid,descricao,cupom,cupomb,useridb,valor,fase,posicao,ativacao,datavencimento,registro) VALUES (:userid,'Doação Inicial',:cupom,:cupomb,:useridb,:valor,'1','0','0',:datavencimento,'".$datas."')";
                $obje = $pdo->prepare($sqle);
                $obje->bindParam(":userid",$idusuario);
                $obje->bindParam(":cupom",$cupom);
                $obje->bindParam(":cupomb",$cupomb);
                $obje->bindParam(":useridb",$useridb);
                $obje->bindParam(":valor",$valor);
                $obje->bindParam(":datavencimento",$datavencimento);
                $obje->execute();

               

            break;
					
			
            }
        }

        if($obje){

            $qtdereentradasf = $qtdereentradas - 1;

            $sqldhb = "UPDATE acesso SET qtdereentradas = '1', qtdereentradas = :qtdereentradasf WHERE userid = :idusuario";
            $objdhb = $pdo->prepare($sqldhb);
            $objdhb->bindParam(":idusuario",$idusuario);
            $objdhb->bindParam(":qtdereentradasf",$qtdereentradasf);
            $objdhb->execute();

        }

        

			####################################################################################################################################

          return true;

        }

        public function Alocarmatriz($pdo,$idusuario){

            $cupom = geraSenha(15, true, true);
            $datas = date("Y-m-d H:i:s");

            $sql = "SELECT * FROM configuracoes WHERE id = '1'";
            $obj = $pdo->prepare($sql);
            $obj->execute();
            $linha = $obj->fetch(PDO::FETCH_ASSOC);
            $valor = $linha['valor'];$lateralidade = $linha['lateralidade'];$valorup = $linha['upgrade'];$lucro = $linha['lucro'];
            $muda = $lateralidade - 1;$travar = $linha['trava'] - 1;

            $sqlt = "SELECT * FROM configuracoes WHERE id = '17'";
            $objt = $pdo->prepare($sqlt);
            $objt->execute();
            $linhat = $objt->fetch(PDO::FETCH_ASSOC);
            $hora = $linhat['hora'];$motivo = $linhat['motivo'];
			
			$sqltc = "SELECT * FROM configuracoes WHERE id = '19'";
            $objtc = $pdo->prepare($sqltc);
            $objtc->execute();
            $linhatc = $objtc->fetch(PDO::FETCH_ASSOC);
            $habilitar = $linhatc['habilitar'];

            $datavencimento = date('Y-m-d H:i:s', strtotime("+$hora $motivo"));

            $sq = "SELECT * FROM acesso  ";
            $ob = $pdo->prepare($sq);
            $ob->execute();
            $con = $ob->rowCount();

            $sqll = "SELECT * FROM indicados WHERE userid = :userid";
            $objl = $pdo->prepare($sqll);
            $objl->bindParam(":userid",$idusuario);
            $objl->execute();
            $semnada = $objl->rowCount();

          

            if($semnada == '0'){

             ####################################################################################################################################
             $sqlb9 = "SELECT * FROM acesso WHERE userid = :iduser  ";
             $objb9 = $pdo->prepare($sqlb9);
             $objb9->bindParam(":iduser",$idusuario);
             $objb9->execute();
             $linhab9 = $objb9->fetch(PDO::FETCH_ASSOC);
             $sponsorid1 = $linhab9['sponsorid'];

             $sqlb9b = "SELECT * FROM indicados WHERE userid = :sponsorid1  ";
             $objb9b = $pdo->prepare($sqlb9b);
             $objb9b->bindParam(":sponsorid1",$sponsorid1);
             $objb9b->execute();
             $linhab9b = $objb9b->fetch(PDO::FETCH_ASSOC);
             $cupons = $linhab9b['cupom'];

           
         
            $sponsoridfinal = $cupons;
           

             $matrizc = array($sponsoridfinal);

            for($a=0;$a<=$con;$a++){

            $sqlb = "SELECT * FROM indicados WHERE  cupom = :sponsorid ";
            $objb = $pdo->prepare($sqlb);
            $objb->bindParam(":sponsorid",$matrizc[$a]);
            $objb->execute();
            $linhab = $objb->fetch(PDO::FETCH_ASSOC);
            $useridb = $linhab['userid'];$cupomb = $linhab['cupom'];$trava = $linhab['trava'];

            if($habilitar == '0'){

				$sqlbb = "SELECT * FROM indicados WHERE sponsorid = :sponsorid ORDER BY dataativacao1 ASC";
			
			}else{
				
				$sqlbb = "SELECT * FROM indicados WHERE sponsorid = :sponsorid ORDER BY dataativacao1 DESC";	
				
			}
            $objbb = $pdo->prepare($sqlbb);
            $objbb->bindParam(":sponsorid",$cupomb);
            $objbb->execute();
            while($linhabb = $objbb->fetch(PDO::FETCH_ASSOC)){
            $cupomc = $linhabb['cupom'];

                array_push($matrizc,$cupomc);
            }

           

            $sqlc = "SELECT * FROM pagamentos where cupomb = :cupomb AND fase = '1'";
            $objc = $pdo->prepare($sqlc);
            $objc->bindParam(":cupomb",$cupomb);
            $objc->execute();
            $contagemm = $objc->rowCount();

           
            if($contagemm == $muda){

                $sqld = "UPDATE indicados SET fase1 = '1' WHERE cupom = :cupomc";
                $objd = $pdo->prepare($sqld);
                $objd->bindParam(":cupomc",$cupomb);
                $objd->execute();

                if($trava == '1'){
/*
                    $sqldh = "UPDATE acesso SET esperar = '1' WHERE userid = :idusuario";
                    $objdh = $pdo->prepare($sqldh);
                    $objdh->bindParam(":idusuario",$idusuario);
                    $objdh->execute();
*/
                    $sqle = "INSERT INTO pagamentos (userid,descricao,cupom,cupomb,useridb,valor,fase,posicao,ativacao,datavencimento,esperar,registro) VALUES (:userid,'Doação Inicial',:cupom,:cupomb,:useridb,:valor,'1','0','0',:datavencimento,'1','".$datas."')";
                    $obje = $pdo->prepare($sqle);
                    $obje->bindParam(":userid",$idusuario);
                    $obje->bindParam(":cupom",$cupom);
                    $obje->bindParam(":cupomb",$cupomb);
                    $obje->bindParam(":useridb",$useridb);
                    $obje->bindParam(":valor",$valor);
                    $obje->bindParam(":datavencimento",$datavencimento);
                    $obje->execute();

                }else if($trava == '0'){

                    $sqle = "INSERT INTO pagamentos (userid,descricao,cupom,cupomb,useridb,valor,fase,posicao,ativacao,datavencimento,registro) VALUES (:userid,'Doação Inicial',:cupom,:cupomb,:useridb,:valor,'1','0','0',:datavencimento,'".$datas."')";
                    $obje = $pdo->prepare($sqle);
                    $obje->bindParam(":userid",$idusuario);
                    $obje->bindParam(":cupom",$cupom);
                    $obje->bindParam(":cupomb",$cupomb);
                    $obje->bindParam(":useridb",$useridb);
                    $obje->bindParam(":valor",$valor);
                    $obje->bindParam(":datavencimento",$datavencimento);
                    $obje->execute();

                }
   
                        
                break;
            

            }else if($contagemm == $travar){

/*
                $sqld = "UPDATE indicados SET trava = '1' WHERE cupom = :cupomc";
                $objd = $pdo->prepare($sqld);
                $objd->bindParam(":cupomc",$cupomb);
                $objd->execute();
*/
               
                $sqle = "INSERT INTO pagamentos (userid,descricao,cupom,cupomb,useridb,valor,fase,posicao,ativacao,datavencimento,registro) VALUES (:userid,'Doação Inicial',:cupom,:cupomb,:useridb,:valor,'1','0','0',:datavencimento,'".$datas."')";
                $obje = $pdo->prepare($sqle);
                $obje->bindParam(":userid",$idusuario);
                $obje->bindParam(":cupom",$cupom);
                $obje->bindParam(":cupomb",$cupomb);
                $obje->bindParam(":useridb",$useridb);
                $obje->bindParam(":valor",$valor);
                $obje->bindParam(":datavencimento",$datavencimento);
                $obje->execute();

               
                break;
					
			
            }else if($contagemm < $lateralidade){

               
                $sqle = "INSERT INTO pagamentos (userid,descricao,cupom,cupomb,useridb,valor,fase,posicao,ativacao,datavencimento,registro) VALUES (:userid,'Doação Inicial',:cupom,:cupomb,:useridb,:valor,'1','0','0',:datavencimento,'".$datas."')";
                $obje = $pdo->prepare($sqle);
                $obje->bindParam(":userid",$idusuario);
                $obje->bindParam(":cupom",$cupom);
                $obje->bindParam(":cupomb",$cupomb);
                $obje->bindParam(":useridb",$useridb);
                $obje->bindParam(":valor",$valor);
                $obje->bindParam(":datavencimento",$datavencimento);
                $obje->execute();

               

            break;
					
			
            }
        }

        }else{


            $sqly = "SELECT * FROM indicados WHERE userid = :userid  ";
            $objy = $pdo->prepare($sqly);
            $objy->bindParam(":userid",$idusuario);
            $objy->execute();
            $linhay = $objy->fetch(PDO::FETCH_ASSOC);
            $contagem = $objy->rowCount();
            $ativa = $linhay['ativacao'];$cupom = $linhay['cupom'];$upline = $linhay['sponsorid'];$upline2 = $linhay['sponsorid2'];
            $upline3 = $linhay['sponsorid3'];$upline4 = $linhay['sponsorid4'];$fase = $linhay['fase'];

            $sqlu = "SELECT * FROM configuracoes WHERE id = :fase";
            $obju = $pdo->prepare($sqlu);
            $obju->bindParam(":fase",$fase);
            $obju->execute();
            $linhau = $obju->fetch(PDO::FETCH_ASSOC);
            $valor = $linhau['valor'];

            if($contagem > '0'){
				
				if($ativa == '0'){

                    $sqlub = "SELECT * FROM indicados WHERE cupom = :upline";
                    $objub = $pdo->prepare($sqlub);
                    $objub->bindParam(":upline",$upline);
                    $objub->execute();
                    $linhaub = $objub->fetch(PDO::FETCH_ASSOC);
                    $useridb = $linhaub['userid'];

                    $sqle = "INSERT INTO pagamentos (userid,descricao,cupom,cupomb,useridb,valor,fase,posicao,ativacao,datavencimento,registro) VALUES (:userid,'Doação Inicial',:cupom,:cupomb,:useridb,:valor,:fase,'0','0',:datavencimento,'".$datas."')";
                    $obje = $pdo->prepare($sqle);
                    $obje->bindParam(":userid",$idusuario);
                    $obje->bindParam(":cupom",$cupom);
                    $obje->bindParam(":cupomb",$upline);
                    $obje->bindParam(":useridb",$useridb);
                    $obje->bindParam(":fase",$fase);
                    $obje->bindParam(":valor",$valor);
                    $obje->bindParam(":datavencimento",$datavencimento);
                    $obje->execute();

                }else if($ativa == '2'){

                    $sqlub = "SELECT * FROM indicados WHERE cupom = :upline2";
                    $objub = $pdo->prepare($sqlub);
                    $objub->bindParam(":upline2",$upline2);
                    $objub->execute();
                    $linhaub = $objub->fetch(PDO::FETCH_ASSOC);
                    $useridb = $linhaub['userid'];

                    $sqle = "INSERT INTO pagamentos (userid,descricao,cupom,cupomb,useridb,valor,fase,posicao,ativacao,datavencimento,registro) VALUES (:userid,'Doação Inicial',:cupom,:cupomb,:useridb,:valor,:fase,'0','0',:datavencimento,'".$datas."')";
                    $obje = $pdo->prepare($sqle);
                    $obje->bindParam(":userid",$idusuario);
                    $obje->bindParam(":cupom",$cupom);
                    $obje->bindParam(":cupomb",$upline2);
                    $obje->bindParam(":useridb",$useridb);
                    $obje->bindParam(":fase",$fase);
                    $obje->bindParam(":valor",$valor);
                    $obje->bindParam(":datavencimento",$datavencimento);
                    $obje->execute();

                }else if($ativa == '3'){

                    $sqlub = "SELECT * FROM indicados WHERE cupom = :upline3";
                    $objub = $pdo->prepare($sqlub);
                    $objub->bindParam(":upline3",$upline3);
                    $objub->execute();
                    $linhaub = $objub->fetch(PDO::FETCH_ASSOC);
                    $useridb = $linhaub['userid'];

                    $sqle = "INSERT INTO pagamentos (userid,descricao,cupom,cupomb,useridb,valor,fase,posicao,ativacao,datavencimento,registro) VALUES (:userid,'Doação Inicial',:cupom,:cupomb,:useridb,:valor,:fase,'0','0',:datavencimento,'".$datas."')";
                    $obje = $pdo->prepare($sqle);
                    $obje->bindParam(":userid",$idusuario);
                    $obje->bindParam(":cupom",$cupom);
                    $obje->bindParam(":cupomb",$upline3);
                    $obje->bindParam(":useridb",$useridb);
                    $obje->bindParam(":fase",$fase);
                    $obje->bindParam(":valor",$valor);
                    $obje->bindParam(":datavencimento",$datavencimento);
                    $obje->execute();

                }else if($ativa == '4'){

                    $sqlub = "SELECT * FROM indicados WHERE cupom = :upline4";
                    $objub = $pdo->prepare($sqlub);
                    $objub->bindParam(":upline4",$upline4);
                    $objub->execute();
                    $linhaub = $objub->fetch(PDO::FETCH_ASSOC);
                    $useridb = $linhaub['userid'];

                    $sqle = "INSERT INTO pagamentos (userid,descricao,cupom,cupomb,useridb,valor,fase,posicao,ativacao,datavencimento,registro) VALUES (:userid,'Doação Inicial',:cupom,:cupomb,:useridb,:valor,:fase,'0','0',:datavencimento,'".$datas."')";
                    $obje = $pdo->prepare($sqle);
                    $obje->bindParam(":userid",$idusuario);
                    $obje->bindParam(":cupom",$cupom);
                    $obje->bindParam(":cupomb",$upline4);
                    $obje->bindParam(":useridb",$useridb);
                    $obje->bindParam(":fase",$fase);
                    $obje->bindParam(":valor",$valor);
                    $obje->bindParam(":datavencimento",$datavencimento);
                    $obje->execute();

                }


            }


        }

			####################################################################################################################################

          return true;

        }

        public function VerificarVinte($pdo,$fase,$cupom, $userid){

            $datas = date('Y-m-d H:i:s');
            $upgrade = new Ciclos();
            
          

            $sql01 = "SELECT * FROM fechamatriz WHERE cupomb = :cupom";
            $obj01 = $pdo->prepare($sql01);
            $obj01->bindParam(":cupom",$cupom);
            $obj01->execute();
            $qtdeusuarios = $obj01->rowCount();

           

            $sql02 = "SELECT * FROM indicados WHERE userid = :userid";
            $obj02 = $pdo->prepare($sql02);
            $obj02->bindParam(":userid",$userid);
            $obj02->execute();
            $qtdeindicados = $obj02->rowCount();


            if(($qtdeusuarios % 22) == '0' && $qtdeindicados < '10'){

               

                $alocar = $upgrade->GerarReentrada($pdo,$userid);

 
            }

        }

        public function VerificarDoadores($pdo,$fase,$cupomb, $useridb){

            $datas = date("Y-m-d H:i:s");

            

            $sqlt = "SELECT * FROM configuracoes WHERE id = '17'";
            $objt = $pdo->prepare($sqlt);
            $objt->execute();
            $linhat = $objt->fetch(PDO::FETCH_ASSOC);
            $hora = $linhat['hora'];$motivo = $linhat['motivo'];

            $datavencimento = date('Y-m-d H:i:s', strtotime("+$hora $motivo"));


                $sqlc = "SELECT * FROM indicados WHERE sponsorid$fase = :cupomb";
                $objc = $pdo->prepare($sqlc);
                $objc->bindParam(":cupomb",$cupomb);
                $objc->execute();
                while($linhac = $objc->fetch(PDO::FETCH_ASSOC)){
                    $habilitar = $linhac['habilitar'];$cupom = $linhac['cupom'];$userid = $linhac['userid'];
                    
                    $sql = "SELECT * FROM configuracoes WHERE id = :fase";
                    $obj = $pdo->prepare($sql);
                    $obj->bindParam(":fase",$fase);
                    $obj->execute();
                    $linha = $obj->fetch(PDO::FETCH_ASSOC);
                    $valor = $linha['valor'];

                

                    if($habilitar == '1'){
                        
                        if($fase == '1'){
                            $descricao = 'Doação Inicial';
                        }else{
                            $descricao = 'Upgrade para a fase '.$fase;
                        }

                    
                        $sqle = "INSERT INTO pagamentos (userid,descricao,cupom,cupomb,useridb,valor,fase,posicao,ativacao,datavencimento,registro) VALUES (:userid,:descricao,:cupom,:cupomb,:useridb,:valor,:fase,'0','0',:datavencimento,'".$datas."')";
                        $obje = $pdo->prepare($sqle);
                        $obje->bindParam(":userid",$userid);
                        $obje->bindParam(":cupom",$cupom);
                        $obje->bindParam(":cupomb",$cupomb);
                        $obje->bindParam(":useridb",$useridb);
                        $obje->bindParam(":fase",$fase);
                        $obje->bindParam(":descricao",$descricao);
                        $obje->bindParam(":valor",$valor);
                        $obje->bindParam(":datavencimento",$datavencimento);
                        $obje->execute();

                        $sqlb = "UPDATE indicados SET habilitar='0' WHERE cupom = :cupom";
                        $objb = $pdo->prepare($sqlb);
                        $objb->bindParam(":cupom",$cupom);
                        $objb->execute();

                    }

                }
                
                $faseanterior = $fase - 1;
                
                $sqlcb = "SELECT * FROM indicados WHERE sponsorid$faseanterior = :cupomb";
                $objcb = $pdo->prepare($sqlcb);
                $objcb->bindParam(":cupomb",$cupomb);
                $objcb->execute();
                while($linhacb = $objcb->fetch(PDO::FETCH_ASSOC)){
                    $habilitar = $linhacb['habilitar'];$cupom = $linhacb['cupom'];$userid = $linhacb['userid'];
                    
                    $sql = "SELECT * FROM configuracoes WHERE id = :fase";
                    $obj = $pdo->prepare($sql);
                    $obj->bindParam(":fase",$faseanterior);
                    $obj->execute();
                    $linha = $obj->fetch(PDO::FETCH_ASSOC);
                    $valor = $linha['valor'];

                

                    if($habilitar == '1'){
                        
                        if($faseanterior == '1'){
                            $descricao = 'Doação Inicial';
                        }else{
                            $descricao = 'Upgrade para a fase '.$fase;
                        }

                    
                        $sqle = "INSERT INTO pagamentos (userid,descricao,cupom,cupomb,useridb,valor,fase,posicao,ativacao,datavencimento,registro) VALUES (:userid,:descricao,:cupom,:cupomb,:useridb,:valor,:fase,'0','0',:datavencimento,'".$datas."')";
                        $obje = $pdo->prepare($sqle);
                        $obje->bindParam(":userid",$userid);
                        $obje->bindParam(":cupom",$cupom);
                        $obje->bindParam(":cupomb",$cupomb);
                        $obje->bindParam(":useridb",$useridb);
                        $obje->bindParam(":fase",$faseanterior);
                        $obje->bindParam(":descricao",$descricao);
                        $obje->bindParam(":valor",$valor);
                        $obje->bindParam(":datavencimento",$datavencimento);
                        $obje->execute();

                        $sqlb = "UPDATE indicados SET habilitar='0' WHERE cupom = :cupom";
                        $objb = $pdo->prepare($sqlb);
                        $objb->bindParam(":cupom",$cupom);
                        $objb->execute();

                    }

                }
          


        }


        public function VerificarDoadoresTrava($pdo,$fase,$cupomb, $useridb){

            $datas = date("Y-m-d H:i:s");

            $sql = "SELECT * FROM configuracoes WHERE id = :fase";
            $obj = $pdo->prepare($sql);
            $obj->bindParam(":fase",$fase);
            $obj->execute();
            $linha = $obj->fetch(PDO::FETCH_ASSOC);
            $valor = $linha['valor'];$travar = $linha['trava'];

            $sqlt = "SELECT * FROM configuracoes WHERE id = '17'";
            $objt = $pdo->prepare($sqlt);
            $objt->execute();
            $linhat = $objt->fetch(PDO::FETCH_ASSOC);
            $hora = $linhat['hora'];$motivo = $linhat['motivo'];

            $datavencimento = date('Y-m-d H:i:s', strtotime("+$hora $motivo"));

           
            $sqlc = "SELECT * FROM pagamentos WHERE cupomb = :cupomupline AND ativacao = '0' AND fase = :fase";
            $objc = $pdo->prepare($sqlc);
            $objc->bindParam(":cupomupline",$cupomb);
            $objc->bindParam(":fase",$fase);
            $objc->execute();
            while($linhac = $objc->fetch(PDO::FETCH_ASSOC)){
                $userid = $linhac['userid'];$idpag = $linhac['id'];

              //  print "<script>alert('$idpag');</script>";

            
                $sqlb = "UPDATE pagamentos SET esperar='0' WHERE id = :idpag";
                $objb = $pdo->prepare($sqlb);
                $objb->bindParam(":idpag",$idpag);
                $objb->execute();


            }


        }

        public function Retorno($pdo,$idpagamento){

            $datas = date('Y-m-d H:i:s');
            $upgrade = new Ciclos();
			
            $sqlb = "SELECT * FROM pagamentos where id = :idpagamento";
            $objb = $pdo->prepare($sqlb);
            $objb->bindParam(":idpagamento",$idpagamento);
            $objb->execute();
            $linhab = $objb->fetch(PDO::FETCH_ASSOC);
            $valor = $linhab['valor'];$cupom = $linhab['cupom'];$cupomb = $linhab['cupomb'];
            $fase = $linhab['fase'];$iduser = $linhab['userid'];$useridb = $linhab['useridb'];
            $fasef = $fase + 1;$reentrada = $linhab['reentrada'];$sustentabilidade = $linhab['sustentabilidade'];$posicao = $linhab['posicao'];
            $pa = $linhab['patrocinador'];
            $faseanterior = $fase - 1;

            $sql01 = "SELECT * FROM acesso";
            $obj01 = $pdo->prepare($sql01);
            $obj01->execute();
            $qtdeusuarios = $obj01->rowCount();

          

            $sqlt = "SELECT * FROM configuracoes WHERE id = '17'";
            $objt = $pdo->prepare($sqlt);
            $objt->execute();
            $linhat = $objt->fetch(PDO::FETCH_ASSOC);
            $hora = $linhat['hora'];$motivo = $linhat['motivo'];

            $datavencimento = date('Y-m-d H:i:s', strtotime("+$hora $motivo"));


            $sql = "SELECT * FROM configuracoes WHERE id = :fase";
            $obj = $pdo->prepare($sql);
            $obj->bindParam(":fase",$fase);
            $obj->execute();
            $linha = $obj->fetch(PDO::FETCH_ASSOC);
            $valor = $linha['valor'];$lateralidade = $linha['lateralidade'];$valorup = $linha['upgrade'];$lucro = $linha['lucro'];
            $muda = $lateralidade - 1;$travar = $linha['trava'] - 1;$travarf = $linha['trava'];$obrigatorio = $linha['reentrada'];$opcional = $linha['reentrada2'];$habilitar = $linha['habilitar'];$compras = $linha['compras'];

            $sqlz = "SELECT * FROM configuracoes WHERE id = :fase";
            $objz = $pdo->prepare($sqlz);
            $objz->bindParam(":fase",$faseanterior);
            $objz->execute();
            $linhaz = $objz->fetch(PDO::FETCH_ASSOC);
            $travarg = $linhaz['trava'];

            $sqlee = "UPDATE pagamentos SET ativacao='1', dataativacao = :dataativacao WHERE id = :idpagamento";
            $objee = $pdo->prepare($sqlee);
            $objee->bindParam(":idpagamento",$idpagamento);
            $objee->bindParam(":dataativacao",$datas);
            $objee->execute();	

            $sqlca = "SELECT * FROM pagamentos where cupomb = :cupom AND fase = :fase AND ativacao='1'";
            $objca = $pdo->prepare($sqlca);
            $objca->bindParam(":cupom",$cupom);
            $objca->bindParam(":fase",$faseanterior);
            $objca->execute();
            $contagemmm = $objca->rowCount();

            #############################################################################################################
           
            if($fase == '1'){

                $sqlcag = "SELECT * FROM pagamentos where cupomb = :cupomb AND fase = '1' AND ativacao = '1' ";
                $objcag = $pdo->prepare($sqlcag);
                $objcag->bindParam(":cupomb",$cupomb);
                $objcag->execute();
                $contagemmmg = $objcag->rowCount();

                if($contagemmmg == '3'){

                  
					/*
					$sqle2 = "UPDATE indicados SET ativacao='0' WHERE cupom = :cupoma";
					$obje2 = $pdo->prepare($sqle2);
					$obje2->bindParam(":cupoma",$cupomb);
					$obje2->execute();
					

                    $sqle = "INSERT INTO pagamentos (userid,cupom,descricao,useridb,valor,fase,posicao,ativacao,datavencimento,registro) VALUES (:userid,:cupom,'Taxa Sistema da Fase 1','1',:valor,'0','0','0',:datavencimento,'".$datas."')";
                    $obje = $pdo->prepare($sqle);
                    $obje->bindParam(":cupom",$cupomb);
					$obje->bindParam(":userid",$useridb);
                    $obje->bindParam(":valor",$compras);
                    $obje->bindParam(":datavencimento",$datavencimento);
                    $obje->execute();
                   */
                   // $cadastrarse = $upgrade->CadastrarBanco2($pdo,$useridb);

                }

            }if($fase == '2'){

                $sqlcag = "SELECT * FROM pagamentos where cupomb = :cupomb AND fase = '2' AND ativacao = '1' ";
                $objcag = $pdo->prepare($sqlcag);
                $objcag->bindParam(":cupomb",$cupomb);
                $objcag->execute();
                $contagemmmg = $objcag->rowCount();

                if($contagemmmg == '1'){

                  
					
					$sqle2 = "UPDATE indicados SET ativacao='0' WHERE cupom = :cupoma";
					$obje2 = $pdo->prepare($sqle2);
					$obje2->bindParam(":cupoma",$cupomb);
					$obje2->execute();
					

                    $sqle = "INSERT INTO pagamentos (userid,cupom,descricao,useridb,valor,fase,posicao,ativacao,datavencimento,registro) VALUES (:userid,:cupom,'Taxa Sistema da Fase 2','1',:valor,'0','0','0',:datavencimento,'".$datas."')";
                    $obje = $pdo->prepare($sqle);
                    $obje->bindParam(":cupom",$cupomb);
					$obje->bindParam(":userid",$useridb);
                    $obje->bindParam(":valor",$compras);
                    $obje->bindParam(":datavencimento",$datavencimento);
                    $obje->execute();
                   
                   // $cadastrarse = $upgrade->CadastrarBanco2($pdo,$useridb);

                }

            }else if($fase == '3'){

                $sqlcag = "SELECT * FROM pagamentos where cupomb = :cupomb AND fase = '3' AND ativacao = '1' ";
                $objcag = $pdo->prepare($sqlcag);
                $objcag->bindParam(":cupomb",$cupomb);
                $objcag->execute();
                $contagemmmg = $objcag->rowCount();

               

                if($contagemmmg == '1'){

                    $sqle2 = "UPDATE indicados SET ativacao='0' WHERE cupom = :cupoma";
					$obje2 = $pdo->prepare($sqle2);
					$obje2->bindParam(":cupoma",$cupomb);
					$obje2->execute();

                    $sqle = "INSERT INTO pagamentos (userid,cupom,descricao,useridb,valor,fase,posicao,ativacao,datavencimento,registro) VALUES (:userid,:cupom,'Taxa Sistema da Fase 3','1',:valor,'0','0','0',:datavencimento,'".$datas."')";
                    $obje = $pdo->prepare($sqle);
                    $obje->bindParam(":cupom",$cupomb);
					$obje->bindParam(":userid",$useridb);
                    $obje->bindParam(":valor",$compras);
                    $obje->bindParam(":datavencimento",$datavencimento);
                    $obje->execute();

                }

            }else if($fase == '4'){

                $sqlcag = "SELECT * FROM pagamentos where cupomb = :cupomb AND fase = '4' AND ativacao = '1' ";
                $objcag = $pdo->prepare($sqlcag);
                $objcag->bindParam(":cupomb",$cupomb);
                $objcag->execute();
                $contagemmmg = $objcag->rowCount();

               

                if($contagemmmg == '1'){

                    $sqle2 = "UPDATE indicados SET ativacao='0' WHERE cupom = :cupoma";
					$obje2 = $pdo->prepare($sqle2);
					$obje2->bindParam(":cupoma",$cupomb);
					$obje2->execute();

                   $sqle = "INSERT INTO pagamentos (userid,cupom,descricao,useridb,valor,fase,posicao,ativacao,datavencimento,registro) VALUES (:userid,:cupom,'Taxa Sistema da Fase 4','1',:valor,'0','0','0',:datavencimento,'".$datas."')";
                    $obje = $pdo->prepare($sqle);
                    $obje->bindParam(":cupom",$cupomb);
					$obje->bindParam(":userid",$useridb);
                    $obje->bindParam(":valor",$compras);
                    $obje->bindParam(":datavencimento",$datavencimento);
                    $obje->execute();

                }

            }

            

           ###################################################################################################################
			
			//$cupom = geraSenha(15, true, true);
			
			 $sql0 = "UPDATE acesso SET ativacao='1' WHERE userid = :userida";
            $obj0 = $pdo->prepare($sql0);
            $obj0->bindParam(":userida",$iduser);
            $obj0->execute();

            if($fase == '1'){

                $sqlui = "SELECT * FROM indicados WHERE userid = :iduser";
                $objui = $pdo->prepare($sqlui);
                $objui->bindParam(":iduser",$iduser);
                $objui->execute();
                $containvestimentos = $objui->rowCOunt();
    
            
        
    
                $sqle = "UPDATE indicados SET ativacao='1', dataativacao$fase = :dataativa WHERE cupom = :cupom";
                $obje = $pdo->prepare($sqle);
                $obje->bindParam(":cupom",$cupom);
                $obje->bindParam(":dataativa",$datas);
                $obje->execute();
    
            }else if($fase == '0'){
				
				 $sqlcah = "SELECT * FROM pagamentos WHERE cupomb = :cupom AND ativacao='0'";
				$objcah = $pdo->prepare($sqlcah);
				$objcah->bindParam(":cupom",$cupom);
				$objcah->bindParam(":fase",$faseanterior);
				$objcah->execute();
				$contagemmmh = $objcah->rowCount();
				
				if($contagemmmh == '0'){

              
					$sqle = "UPDATE indicados SET ativacao='1' WHERE cupom = :cupoma";
					$obje = $pdo->prepare($sqle);
					$obje->bindParam(":cupoma",$cupom);
					$obje->bindParam(":dataativa",$datas);
					$obje->execute();
					
				}

            }else{

              
                $sqle = "UPDATE indicados SET ativacao='1', dataativacao$fase = :dataativa WHERE cupom = :cupoma";
                $obje = $pdo->prepare($sqle);
                $obje->bindParam(":cupoma",$cupom);
                $obje->bindParam(":dataativa",$datas);
                $obje->execute();

            }

            #########################################################################################################################################
		
            $verificadoadores = $upgrade->VerificarDoadores($pdo,$fase,$cupom, $iduser);
           
          
            #########################################################################################################################################

            $sqlc = "SELECT * FROM pagamentos where cupomb = :cupomb AND fase = :fase AND ativacao='1'";
            $objc = $pdo->prepare($sqlc);
            $objc->bindParam(":cupomb",$cupomb);
            $objc->bindParam(":fase",$fase);
            $objc->execute();
            $contagemm = $objc->rowCount();


         

            if($contagemm == $lateralidade){

                $fasef = $fase + 1;

              

                if($cupomb == 'jre'){

                  

                    $sqleef = "UPDATE indicados SET ativacao='1', fase = :fasef WHERE cupom = :cupomb";
                    $objeef = $pdo->prepare($sqleef);
                    $objeef->bindParam(":fasef",$fasef);
                    $objeef->bindParam(":cupomb",$cupomb);
                    $objeef->execute();	

                }else{

                    if($fase > '1'){

						$sqleef = "UPDATE indicados SET  habilitar = :fasef WHERE cupom = :cupomb";
						$objeef = $pdo->prepare($sqleef);
						$objeef->bindParam(":fasef",$fasef);
						$objeef->bindParam(":cupomb",$cupomb);
						$objeef->execute();	
						
					}else if($fase == '1'){
						
						
						
						$sqleefn = "UPDATE indicados SET  ativacao='0',fase = :fasef WHERE cupom = :cupomb";
						$objeefn = $pdo->prepare($sqleefn);
						$objeefn->bindParam(":fasef",$fasef);
						$objeefn->bindParam(":cupomb",$cupomb);
						$objeefn->execute();

						$up = $upgrade->Upgrade($pdo,$fasef,$cupomb,$useridb);
						
					}

                }

            }
			
			if($fase == '2'){

				if($contagemm == '5'){



						$sqleefn = "UPDATE indicados SET  ativacao='0',fase = :fasef, habilitar = :fase WHERE cupom = :cupomb";
						$objeefn = $pdo->prepare($sqleefn);
						$objeefn->bindParam(":fasef",$fasef);
					    $objeefn->bindParam(":fase",$fase);
						$objeefn->bindParam(":cupomb",$cupomb);
						$objeefn->execute();



					$up = $upgrade->Upgrade($pdo,$fasef,$cupomb,$useridb);
				}	

            }else if($fase == '3'){

				if($contagemm == '9'){



						$sqleefn = "UPDATE indicados SET  ativacao='0',fase = :fasef, habilitar = :fase WHERE cupom = :cupomb";
						$objeefn = $pdo->prepare($sqleefn);
						$objeefn->bindParam(":fasef",$fasef);
					    $objeefn->bindParam(":fase",$fase);
						$objeefn->bindParam(":cupomb",$cupomb);
						$objeefn->execute();



					$up = $upgrade->Upgrade($pdo,$fasef,$cupomb,$useridb);
				}	

            }

            if($fase == '1'){

                $matriz = array($cupomb);

                for($b=0;$b<=$qtdeusuarios;$b++){

                    $sqlj = "SELECT * FROM indicados WHERE cupom = :cupom";
                    $objj = $pdo->prepare($sqlj);
                    $objj->bindParam(":cupom",$matriz[$b]);
                    $objj->execute();
                    $linhaj = $objj->fetch(PDO::FETCH_ASSOC);
                    $sponsoridb = $linhaj['sponsorid'];$userfecha = $linhaj['userid'];

                    array_push($matriz,$sponsoridb);

                    $bf = $b + 1;

                    $sqlju = "SELECT * FROM fechamatriz WHERE cupom = :cupom AND cupomb = :cupomb";
                    $objju = $pdo->prepare($sqlju);
                    $objju->bindParam(":cupom",$cupom);
                    $objju->bindParam(":cupomb",$matriz[$b]);
                    $objju->execute();
                    $contafecha = $objju->rowCount();

                    if($contafecha == '0'){

                        $sqlib = "INSERT INTO fechamatriz (cupom,cupomb,nivel, registro) VALUES (:cupom,:cupomb,:nivel,:datas)";
                        $objib = $pdo->prepare($sqlib);
                        $objib->bindParam(":cupom",$cupom);
                        $objib->bindParam(":cupomb",$matriz[$b]);
                        $objib->bindParam(":nivel",$bf);
                        $objib->bindParam(":datas",$datas);
                        $objib->execute();

                    }

                  //  $verificavinte = $upgrade->VerificarVinte($pdo,$fase,$matriz[$b], $userfecha);

                  

                    if($b == '0'){

                        $sqli = "UPDATE indicados SET sponsorid = :cupomb WHERE cupom = :cupom";
                        $obji = $pdo->prepare($sqli);
                        $obji->bindParam(":cupom",$cupom);
                        $obji->bindParam(":cupomb",$cupomb);
                        $obji->execute();

                    }else if($b == '1'){
                
                        $sqli = "UPDATE indicados SET  sponsorid2 = :sponsorid2 WHERE cupom = :cupom";
                        $obji = $pdo->prepare($sqli);
                        $obji->bindParam(":cupom",$cupom);
                        $obji->bindParam(":sponsorid2",$matriz[$b]);
                        $obji->execute();

                    }else if($b == '2'){
                
                        $sqli = "UPDATE indicados SET  sponsorid3 = :sponsorid3 WHERE cupom = :cupom";
                        $obji = $pdo->prepare($sqli);
                        $obji->bindParam(":cupom",$cupom);
                        $obji->bindParam(":sponsorid3",$matriz[$b]);
                        $obji->execute();

                    }else if($b == '3'){
                
                        $sqli = "UPDATE indicados SET  sponsorid4 = :sponsorid4 WHERE cupom = :cupom";
                        $obji = $pdo->prepare($sqli);
                        $obji->bindParam(":cupom",$cupom);
                        $obji->bindParam(":sponsorid4",$matriz[$b]);
                        $obji->execute();

                    }

                    if($matriz[$b] == 'jre'){
                     break;
                    }

                }
            
            }


              

          return true;

        }


        public function Upgrade($pdo, $fase, $cupomb,$idusuario){

            $datas = date('Y-m-d H:i:s');
            $upgrade = new Ciclos();
		
            $sql = "SELECT * FROM configuracoes WHERE id = :fase";
            $obj = $pdo->prepare($sql);
            $obj->bindParam(":fase",$fase);
            $obj->execute();
            $linha = $obj->fetch(PDO::FETCH_ASSOC);
            $valor = $linha['valor'];$lateralidade = $linha['lateralidade'];$valorup = $linha['upgrade'];$lucro = $linha['lucro'];
            $muda = $lateralidade - 1;$travar = $linha['trava'] - 1;

            $sqlt = "SELECT * FROM configuracoes WHERE id = '17'";
            $objt = $pdo->prepare($sqlt);
            $objt->execute();
            $linhat = $objt->fetch(PDO::FETCH_ASSOC);
            $hora = $linhat['hora'];$motivo = $linhat['motivo'];

            $datavencimento = date('Y-m-d H:i:s', strtotime("+$hora $motivo"));

            $sqlb = "SELECT * FROM indicados WHERE cupom = :cupomb";
            $objb = $pdo->prepare($sqlb);
            $objb->bindParam(":cupomb",$cupomb);
            $objb->execute();
            $linhab = $objb->fetch(PDO::FETCH_ASSOC);
            $upline2 = $linhab['sponsorid2'];$upline3 = $linhab['sponsorid3'];$upline4 = $linhab['sponsorid4'];

            if($fase == '2'){
                $upline2 = $upline2;
            }else if($fase == '3'){
                $upline2 = $upline3;
            }else if($fase == '4'){
                $upline2 = $upline4;
            }
            
            if($upline2 == ''){

                $faseanterior = $fase - 1;

                

                $sqldb = "UPDATE indicados SET ativacao = '1', dataativacao$fase = :dataativa WHERE cupom = :cupomc";
                $objdb = $pdo->prepare($sqldb);
                $objdb->bindParam(":cupomc",$cupomb);
                $objdb->bindParam(":dataativa",$datas);
                $objdb->execute();

                $verificadoadoresb = $upgrade->VerificarDoadoresTrava($pdo,$faseanterior,$cupomb, $idusuario);

            }else{
			
            $sqld = "SELECT * FROM indicados WHERE cupom = :upline2";
            $objd = $pdo->prepare($sqld);
            $objd->bindParam(":upline2",$upline2);
            $objd->execute();
            $linhad = $objd->fetch(PDO::FETCH_ASSOC);
            $faseatual = $linhad['fase'];$useridb = $linhad['userid'];$ativafase = $linhad['ativacao'];$trava = $linhad['trava'];


           

            if(($faseatual >= $fase)&&($ativafase == '1')){

                $sqlc = "SELECT * FROM pagamentos WHERE cupomb = :cupomb AND fase = :fase";
                $objc = $pdo->prepare($sqlc);
                $objc->bindParam(":cupomb",$upline2);
                $objc->bindParam(":fase",$fase);
                $objc->execute();
                $contagemm = $objc->rowCount();

               
                
    
              
                if($contagemm == $muda){
    
                  
        
                    $sqldb = "UPDATE indicados SET fase$fase = '1' WHERE cupom = :cupomc";
                    $objdb = $pdo->prepare($sqldb);
                    $objdb->bindParam(":cupomc",$upline2);
                    $objdb->execute();

                    if($trava == '1'){
/*
                        $sqldh = "UPDATE acesso SET esperar = '1' WHERE userid = :idusuario";
                        $objdh = $pdo->prepare($sqldh);
                        $objdh->bindParam(":idusuario",$idusuario);
                        $objdh->execute();
*/
                        $sqle = "INSERT INTO pagamentos (userid,descricao,cupom,cupomb,useridb,valor,fase,posicao,ativacao,datavencimento,esperar,registro) VALUES (:userid,'Upgrade para a Fase $fase',:cupom,:cupomb,:useridb,:valor,:fase,'0','0',:datavencimento,'1','".$datas."')";
                        $obje = $pdo->prepare($sqle);
                        $obje->bindParam(":userid",$idusuario);
                        $obje->bindParam(":cupom",$cupomb);
                        $obje->bindParam(":cupomb",$upline2);
                        $obje->bindParam(":useridb",$useridb);
                        $obje->bindParam(":fase",$fase);
                        $obje->bindParam(":valor",$valor);
                        $obje->bindParam(":datavencimento",$datavencimento);
                        $obje->execute();
    
                    }else if($trava == '0'){
        

                        $sqle = "INSERT INTO pagamentos (userid,descricao,cupom,cupomb,useridb,valor,fase,posicao,ativacao,datavencimento,registro) VALUES (:userid,'Upgrade para a Fase $fase',:cupom,:cupomb,:useridb,:valor,:fase,'0','0',:datavencimento,'".$datas."')";
                        $obje = $pdo->prepare($sqle);
                        $obje->bindParam(":userid",$idusuario);
                        $obje->bindParam(":cupom",$cupomb);
                        $obje->bindParam(":cupomb",$upline2);
                        $obje->bindParam(":useridb",$useridb);
                        $obje->bindParam(":fase",$fase);
                        $obje->bindParam(":valor",$valor);
                        $obje->bindParam(":datavencimento",$datavencimento);
                        $obje->execute();

                    }

                

                }else if($contagemm == $travar){
/*

                    $sqld = "UPDATE indicados SET trava = '1' WHERE cupom = :cupomc";
                    $objd = $pdo->prepare($sqld);
                    $objd->bindParam(":cupomc",$upline2);
                    $objd->execute();
  */
                   
                    $sqle = "INSERT INTO pagamentos (userid,descricao,cupom,cupomb,useridb,valor,fase,posicao,ativacao,datavencimento,registro) VALUES (:userid,'Upgrade para a Fase $fase',:cupom,:cupomb,:useridb,:valor,:fase,'0','0',:datavencimento,'".$datas."')";
                    $obje = $pdo->prepare($sqle);
                    $obje->bindParam(":userid",$idusuario);
                    $obje->bindParam(":cupom",$cupomb);
                    $obje->bindParam(":cupomb",$upline2);
                    $obje->bindParam(":useridb",$useridb);
                    $obje->bindParam(":fase",$fase);
                    $obje->bindParam(":valor",$valor);
                    $obje->bindParam(":datavencimento",$datavencimento);
                    $obje->execute();
    
                   
                        
                
                }else{


                  


                    if($trava == '1'){
/*
                        $sqldh = "UPDATE acesso SET esperar = '1' WHERE userid = :idusuario";
                        $objdh = $pdo->prepare($sqldh);
                        $objdh->bindParam(":idusuario",$idusuario);
                        $objdh->execute();
*/

                        $sqle = "INSERT INTO pagamentos (userid,descricao,cupom,cupomb,useridb,valor,fase,posicao,ativacao,datavencimento,esperar,registro) VALUES (:userid,'Upgrade para a Fase $fase',:cupom,:cupomb,:useridb,:valor,:fase,'0','0',:datavencimento,'1','".$datas."')";
                        $obje = $pdo->prepare($sqle);
                        $obje->bindParam(":userid",$idusuario);
                        $obje->bindParam(":cupom",$cupomb);
                        $obje->bindParam(":cupomb",$upline2);
                        $obje->bindParam(":useridb",$useridb);
                        $obje->bindParam(":fase",$fase);
                        $obje->bindParam(":valor",$valor);
                        $obje->bindParam(":datavencimento",$datavencimento);
                        $obje->execute();
    
                    }else if($trava == '0'){
        

                        $sqle = "INSERT INTO pagamentos (userid,descricao,cupom,cupomb,useridb,valor,fase,posicao,ativacao,datavencimento,registro) VALUES (:userid,'Upgrade para a Fase $fase',:cupom,:cupomb,:useridb,:valor,:fase,'0','0',:datavencimento,'".$datas."')";
                        $obje = $pdo->prepare($sqle);
                        $obje->bindParam(":userid",$idusuario);
                        $obje->bindParam(":cupom",$cupomb);
                        $obje->bindParam(":cupomb",$upline2);
                        $obje->bindParam(":useridb",$useridb);
                        $obje->bindParam(":fase",$fase);
                        $obje->bindParam(":valor",$valor);
                        $obje->bindParam(":datavencimento",$datavencimento);
                        $obje->execute();

                    }

               

                }



            }else{
                // aqui faz ele esperar o usuário para pagar
                    $sqldb = "UPDATE indicados SET habilitar = '1' WHERE cupom = :cupomc";
                    $objdb = $pdo->prepare($sqldb);
                    $objdb->bindParam(":cupomc",$cupomb);
                    $objdb->execute();
            }
        }
        

          return true;

        }


        public function CadastrarBanco2($pdo,$userid){

            include 'applicationb.php';
            $app = new Appb();
            $pdob = $app->conexao;

            $datas = date("Y-m-d H:i:s");
        
            $sqla = "SELECT dadospessoais.nome,dadospessoais.email,dadospessoais.whatsapp,dadospessoais.cpf,acesso.sponsorid,acesso.userid,acesso.senha,acesso.usuario FROM dadospessoais,acesso WHERE acesso.userid = :userid AND dadospessoais.userid = acesso.userid";
            $obja = $pdo->prepare($sqla);
            $obja->bindParam(":userid",$userid);
            $obja->execute();
            $linha = $obja->fetch(PDO::FETCH_ASSOC);
            $usuario = $linha['usuario'];$senha = $linha['senha'];$nome = $linha['nome'];$email = $linha['email'];$whatsapp = $linha['whatsapp'];$cpf = $linha['cpf'];

            $sql = "INSERT INTO acesso (usuario,senha,sponsorid,registro) VALUES (:usuario,:senha,:sponsorid,'".$datas."')";
            $obj = $pdob->prepare($sql);
            $obj->bindParam(":usuario",$usuario);
            $obj->bindParam(":senha",$senha);
            $obj->bindParam(":sponsorid",$linha['sponsorid']);
            $obj->execute();

            $sqlb = "SELECT * FROM acesso WHERE usuario = :usuariob AND senha = :senhab";
            $objb = $pdob->prepare($sqlb);
            $objb->bindParam(":usuariob",$usuario);
            $objb->bindParam(":senhab",$senha);
            $objb->execute();
            $linhab = $objb->fetch(PDO::FETCH_ASSOC);

       
            
            $sqlc = "INSERT INTO dadospessoais (userid,nome,whatsapp,cpf,email,registro) VALUES (:useridc,:nome,:whatsapp,:cpf,:email,'".$datas."')";
            $objc = $pdob->prepare($sqlc);
            $objc->bindParam(":useridc",$linhab['userid']);
            $objc->bindParam(":nome",$nome);
            $objc->bindParam(":email",$email);
            $objc->bindParam(":whatsapp",$whatsapp);
            $objc->bindParam(":cpf",$cpf);
            $objc->execute();
            
          
            
            $sqld = "INSERT INTO saldo (userid,saldo,registro) VALUES (:useridd,'0.00','".$datas."')";
            $objd = $pdob->prepare($sqld);
            $objd->bindParam(":useridd",$linhab['userid']);
            $objd->execute();

            $sqle = "INSERT INTO documentos (userid, doc1,doc2) VALUES (:useride,'0','0')";
            $obje = $pdob->prepare($sqle);
            $obje->bindParam(":useride",$linhab['userid']);
            $obje->execute();

            $sqlf = "INSERT INTO saldoinvestimento (userid,saldo,registro) VALUES (:useridf,'0.00','".$datas."')";
            $objf = $pdob->prepare($sqlf);
            $objf->bindParam(":useridf",$linhab['userid']);
            $objf->execute();

            $sqlf2 = "INSERT INTO saldobloqueado (userid,saldo,registro) VALUES (:useridf,'0.00','".$datas."')";
            $objf2 = $pdob->prepare($sqlf2);
            $objf2->bindParam(":useridf",$linhab['userid']);
            $objf2->execute();

          
	
	
	        return $linhab['userid'];

        }

        public function pegaAdmPosicao1($pdo){

            $sql = "SELECT indicados.userid,indicados.dataativacao1,indicados.fase,acesso.usuario,dadospessoais.nome FROM indicados,acesso,dadospessoais WHERE indicados.userid = acesso.userid AND acesso.userid = dadospessoais.userid AND indicados.fase1='0' AND indicados.ativacao='1' AND indicados.fase='1' ORDER BY indicados.dataativacao1 ASC";
            $obj = $pdo->prepare($sql);
            $obj->execute();

            return $obj;

        }

        public function pegaAdmPosicao2($pdo){

            $sql = "SELECT indicados.userid,indicados.dataativacao2,indicados.fase,acesso.usuario,dadospessoais.nome FROM indicados,acesso,dadospessoais WHERE indicados.userid = acesso.userid AND acesso.userid = dadospessoais.userid AND indicados.fase2='0' AND indicados.ativacao='1' AND indicados.fase='2' ORDER BY indicados.dataativacao2 ASC";
            $obj = $pdo->prepare($sql);
            $obj->execute();

            return $obj;

        }

        public function pegaAdmPosicao3($pdo){

            $sql = "SELECT indicados.userid,indicados.dataativacao3,indicados.fase,acesso.usuario,dadospessoais.nome FROM indicados,acesso,dadospessoais WHERE indicados.userid = acesso.userid AND acesso.userid = dadospessoais.userid AND indicados.fase3='0' AND indicados.ativacao='1' AND indicados.fase='3' ORDER BY indicados.dataativacao3 ASC";
            $obj = $pdo->prepare($sql);
            $obj->execute();

            return $obj;

        }
		
		 public function pegaAdmPosicao4($pdo){

            $sql = "SELECT indicados.userid,indicados.dataativacao4,indicados.fase,acesso.usuario,dadospessoais.nome FROM indicados,acesso,dadospessoais WHERE indicados.userid = acesso.userid AND acesso.userid = dadospessoais.userid AND indicados.fase4='0' AND indicados.ativacao='1' AND indicados.fase='4' ORDER BY indicados.dataativacao4 ASC";
            $obj = $pdo->prepare($sql);
            $obj->execute();

            return $obj;

        }
		
		public function pegaAdmPosicao5($pdo){

            $sql = "SELECT indicados.userid,indicados.dataativacao5,indicados.fase,acesso.usuario,dadospessoais.nome FROM indicados,acesso,dadospessoais WHERE indicados.userid = acesso.userid AND acesso.userid = dadospessoais.userid AND indicados.fase5='0' AND indicados.ativacao='1' AND indicados.fase='5' ORDER BY indicados.dataativacao5 ASC";
            $obj = $pdo->prepare($sql);
            $obj->execute();

            return $obj;

        }
		
		public function pegaAdmPosicao6($pdo){

            $sql = "SELECT indicados.userid,indicados.dataativacao6,indicados.fase,acesso.usuario,dadospessoais.nome FROM indicados,acesso,dadospessoais WHERE indicados.userid = acesso.userid AND acesso.userid = dadospessoais.userid AND indicados.fase6='0' AND indicados.ativacao='1' AND indicados.fase='6' ORDER BY indicados.dataativacao6 ASC";
            $obj = $pdo->prepare($sql);
            $obj->execute();

            return $obj;

        }
		
		public function pegaAdmPosicao7($pdo){

            $sql = "SELECT indicados.userid,indicados.dataativacao7,indicados.fase,acesso.usuario,dadospessoais.nome FROM indicados,acesso,dadospessoais WHERE indicados.userid = acesso.userid AND acesso.userid = dadospessoais.userid AND indicados.fase7='0' AND indicados.ativacao='1' AND indicados.fase='7' ORDER BY indicados.dataativacao7 ASC";
            $obj = $pdo->prepare($sql);
            $obj->execute();

            return $obj;

        }
		
		public function pegaAdmPosicao8($pdo){

            $sql = "SELECT indicados.userid,indicados.dataativacao8,indicados.fase,acesso.usuario,dadospessoais.nome FROM indicados,acesso,dadospessoais WHERE indicados.userid = acesso.userid AND acesso.userid = dadospessoais.userid AND indicados.fase8='0' AND indicados.ativacao='1' AND indicados.fase='8' ORDER BY indicados.dataativacao8 ASC";
            $obj = $pdo->prepare($sql);
            $obj->execute();

            return $obj;

        }
		
		public function pegaAdmPosicao9($pdo){

            $sql = "SELECT indicados.userid,indicados.dataativacao9,indicados.fase,acesso.usuario,dadospessoais.nome FROM indicados,acesso,dadospessoais WHERE indicados.userid = acesso.userid AND acesso.userid = dadospessoais.userid AND indicados.fase9='0' AND indicados.ativacao='1' AND indicados.fase='9' ORDER BY indicados.dataativacao9 ASC";
            $obj = $pdo->prepare($sql);
            $obj->execute();

            return $obj;

        }
		
		public function pegaAdmPosicao10($pdo){

            $sql = "SELECT indicados.userid,indicados.dataativacao10,indicados.fase,acesso.usuario,dadospessoais.nome FROM indicados,acesso,dadospessoais WHERE indicados.userid = acesso.userid AND acesso.userid = dadospessoais.userid AND indicados.fase10='0' AND indicados.ativacao='1' AND indicados.fase='10' ORDER BY indicados.dataativacao10 ASC";
            $obj = $pdo->prepare($sql);
            $obj->execute();

            return $obj;

        }

        public function pegaPosicao1($pdo){

            $sql = "SELECT indicados.userid,indicados.dataativacao1,indicados.fase,acesso.usuario,dadospessoais.nome FROM indicados,acesso,dadospessoais WHERE indicados.userid = acesso.userid AND acesso.userid = dadospessoais.userid AND indicados.fase1='0' AND indicados.ativacao='1' AND indicados.fase='1' ORDER BY indicados.dataativacao1 ASC";
            $obj = $pdo->prepare($sql);
            $obj->execute();

            return $obj;

        }

        public function pegaPosicao2($pdo){

            $sql = "SELECT indicados.userid,indicados.dataativacao2,indicados.fase,acesso.usuario,dadospessoais.nome FROM indicados,acesso,dadospessoais WHERE indicados.userid = acesso.userid AND acesso.userid = dadospessoais.userid AND indicados.fase2='0' AND indicados.ativacao='1' AND indicados.fase='2' ORDER BY indicados.dataativacao2 ASC";
            $obj = $pdo->prepare($sql);
            $obj->execute();

            return $obj;

        }

        public function pegaPosicao3($pdo){

            $sql = "SELECT indicados.userid,indicados.dataativacao3,indicados.fase,acesso.usuario,dadospessoais.nome FROM indicados,acesso,dadospessoais WHERE indicados.userid = acesso.userid AND acesso.userid = dadospessoais.userid AND indicados.fase3='0' AND indicados.ativacao='1' AND indicados.fase='3' ORDER BY indicados.dataativacao3 ASC";
            $obj = $pdo->prepare($sql);
            $obj->execute();

            return $obj;

        }

        public function pegaPosicao4($pdo){

            $sql = "SELECT indicados.userid,indicados.dataativacao4,indicados.fase,acesso.usuario,dadospessoais.nome FROM indicados,acesso,dadospessoais WHERE indicados.userid = acesso.userid AND acesso.userid = dadospessoais.userid AND indicados.fase4='0' AND indicados.ativacao='1' AND indicados.fase='4' ORDER BY indicados.dataativacao4 ASC";
            $obj = $pdo->prepare($sql);
            $obj->execute();

            return $obj;

        }

        public function pegaPosicao5($pdo){

            $sql = "SELECT indicados.userid,indicados.dataativacao5,indicados.fase,acesso.usuario,dadospessoais.nome FROM indicados,acesso,dadospessoais WHERE indicados.userid = acesso.userid AND acesso.userid = dadospessoais.userid AND indicados.fase5='0' AND indicados.ativacao='1' AND indicados.fase='5' ORDER BY indicados.dataativacao5 ASC";
            $obj = $pdo->prepare($sql);
            $obj->execute();

            return $obj;

        }

        public function pegaPosicao6($pdo){

            $sql = "SELECT indicados.userid,indicados.dataativacao6,indicados.fase,acesso.usuario,dadospessoais.nome FROM indicados,acesso,dadospessoais WHERE indicados.userid = acesso.userid AND acesso.userid = dadospessoais.userid AND indicados.fase6='0' AND indicados.ativacao='1' AND indicados.fase='6' ORDER BY indicados.dataativacao6 ASC";
            $obj = $pdo->prepare($sql);
            $obj->execute();

            return $obj;

        }

        public function pegaPosicao7($pdo){

            $sql = "SELECT indicados.userid,indicados.dataativacao7,indicados.fase,acesso.usuario,dadospessoais.nome FROM indicados,acesso,dadospessoais WHERE indicados.userid = acesso.userid AND acesso.userid = dadospessoais.userid AND indicados.fase7='0' AND indicados.ativacao='1' AND indicados.fase='7' ORDER BY indicados.dataativacao7 ASC";
            $obj = $pdo->prepare($sql);
            $obj->execute();

            return $obj;

        }

        public function pegaPosicao8($pdo){

            $sql = "SELECT indicados.userid,indicados.dataativacao8,indicados.fase,acesso.usuario,dadospessoais.nome FROM indicados,acesso,dadospessoais WHERE indicados.userid = acesso.userid AND acesso.userid = dadospessoais.userid AND indicados.fase8='0' AND indicados.ativacao='1' AND indicados.fase='8' ORDER BY indicados.dataativacao8 ASC";
            $obj = $pdo->prepare($sql);
            $obj->execute();

            return $obj;

        }
		
		 public function pegaPosicao9($pdo){

            $sql = "SELECT indicados.userid,indicados.dataativacao9,indicados.fase,acesso.usuario,dadospessoais.nome FROM indicados,acesso,dadospessoais WHERE indicados.userid = acesso.userid AND acesso.userid = dadospessoais.userid AND indicados.fase9='0' AND indicados.ativacao='1' AND indicados.fase='9' ORDER BY indicados.dataativacao9 ASC";
            $obj = $pdo->prepare($sql);
            $obj->execute();

            return $obj;

        }
		
		 public function pegaPosicao10($pdo){

            $sql = "SELECT indicados.userid,indicados.dataativacao10,indicados.fase,acesso.usuario,dadospessoais.nome FROM indicados,acesso,dadospessoais WHERE indicados.userid = acesso.userid AND acesso.userid = dadospessoais.userid AND indicados.fase10='0' AND indicados.ativacao='1' AND indicados.fase='10' ORDER BY indicados.dataativacao10 ASC";
            $obj = $pdo->prepare($sql);
            $obj->execute();

            return $obj;

        }

        public function meusLogins($pdo, $userid){

            $sql = "SELECT indicados.userid,indicados.fase,indicados.logins,indicados.id,acesso.usuario FROM indicados,acesso WHERE indicados.userid = acesso.userid AND indicados.userid = :userid  ";
            $obj = $pdo->prepare($sql);
            $obj->bindParam(":userid",$userid);
            $obj->execute();

            return $obj;

        }

        public function meusLoginsporCPF($pdo, $cpf){

            $sql = "SELECT acesso.usuario,acesso.userid,dadospessoais.cpf FROM acesso,dadospessoais WHERE dadospessoais.userid = acesso.userid AND dadospessoais.cpf = :cpf  ";
            $obj = $pdo->prepare($sql);
            $obj->bindParam(":cpf",$cpf);
            $obj->execute();

            return $obj;

        }

     

    }