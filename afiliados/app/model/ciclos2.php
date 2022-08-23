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

        public function Alocarmatriz($pdo,$idusuario){

            $datavencimento = date('Y-m-d H:i:s', strtotime("+4 days"));
            $datas = date('Y-m-d H:i:s');

            $sql = "SELECT * FROM configuracoes WHERE id = '1'";
            $obj = $pdo->prepare($sql);
            $obj->execute();
            $linha = $obj->fetch(PDO::FETCH_ASSOC);
            $valor = $linha['valor'];$lateralidade = $linha['lateralidade'];
            $muda = $lateralidade - 1;

            $sql1 = "SELECT * FROM configuracoes WHERE id = '9'";
            $obj1 = $pdo->prepare($sql1);
            $obj1->execute();
            $linha = $obj1->fetch(PDO::FETCH_ASSOC);
            $patrocinador = $linha['habilitar'];$ganhos = $linha['valor'];

           

            $sqlb = "SELECT * FROM indicados WHERE ativacao='1' AND (fase = '1' OR habilitar = '1') AND fase1 = '0' ORDER BY dataativacao1 ASC";
            $objb = $pdo->prepare($sqlb);
            $objb->execute();
            $linhab = $objb->fetch(PDO::FETCH_ASSOC);
            $useridb = $linhab['userid'];$cupomb = $linhab['cupom'];

            $sqlc = "SELECT * FROM pagamentos where cupomb = :cupomb AND fase = '1'";
            $objc = $pdo->prepare($sqlc);
            $objc->bindParam(":cupomb",$cupomb);
            $objc->execute();
            $contagem = $objc->rowCount();

            if($contagem < $lateralidade){

              

                if($contagem == $muda){

                    $sqld = "UPDATE indicados SET fase1 = '1' WHERE cupom = :cupomc";
                    $objd = $pdo->prepare($sqld);
                    $objd->bindParam(":cupomc",$cupomb);
                    $objd->execute();

                }
                
                $cupom = geraSenha(15, true, true);

                if($patrocinador == '1'){

                    $sqlb1 = "SELECT * FROM acesso WHERE id = :idusuario";
                    $objb1 = $pdo->prepare($sqlb1);
                    $objb1->bindParam(":idusuario",$idusuario);
                    $objb1->execute();
                    $linhab1 = $objb1->fetch(PDO::FETCH_ASSOC);
                    $sponsorid = $linhab['sponsorid'];

                    $sqle = "INSERT INTO pagamentos (userid,cupom,cupomb,useridb,valor,fase,posicao,ativacao,datavencimento,registro) VALUES (:userid,:cupom,:cupomb,:useridb,:valor,'1','0','4',:datavencimento,'".$datas."')";
                    $obje = $pdo->prepare($sqle);
                    $obje->bindParam(":userid",$idusuario);
                    $obje->bindParam(":cupom",$cupom);
                    $obje->bindParam(":cupomb",$cupomb);
                    $obje->bindParam(":useridb",$sponsorid);
                    $obje->bindParam(":valor",$valor);
                    $obje->bindParam(":datavencimento",$datavencimento);
                    $obje->execute();
               
                    $sqlf = "INSERT INTO pagamentos (userid,cupom,useridb,valor,fase,posicao,ativacao,datavencimento,patrocinador,registro) VALUES (:userid,:cupom,:useridb,:valor,'1','0','0',:datavencimento,'1','".$datas."')";
                    $objf = $pdo->prepare($sqlf);
                    $objf->bindParam(":userid",$idusuario);
                    $objf->bindParam(":cupom",$cupom);
                    $objf->bindParam(":useridb",$useridb);
                    $objf->bindParam(":valor",$ganhos);
                    $objf->bindParam(":datavencimento",$datavencimento);
                    $objf->execute();
               

                }else{
    


                    $sqle = "INSERT INTO pagamentos (userid,cupom,cupomb,useridb,valor,fase,posicao,ativacao,datavencimento,registro) VALUES (:userid,:cupom,:cupomb,:useridb,:valor,'1','0','0',:datavencimento,'".$datas."')";
                    $obje = $pdo->prepare($sqle);
                    $obje->bindParam(":userid",$idusuario);
                    $obje->bindParam(":cupom",$cupom);
                    $obje->bindParam(":cupomb",$cupomb);
                    $obje->bindParam(":useridb",$useridb);
                    $obje->bindParam(":valor",$valor);
                    $obje->bindParam(":datavencimento",$datavencimento);
                    $obje->execute();

                }
              

            }

            return $obj;


        }

        public function CriarReentrada($pdo,$idusuario){

            $datavencimento = date('Y-m-d H:i:s', strtotime("+4 days"));
            $datas = date('Y-m-d H:i:s');

            $sql = "SELECT * FROM configuracoes WHERE id = '1'";
            $obj = $pdo->prepare($sql);
            $obj->execute();
            $linha = $obj->fetch(PDO::FETCH_ASSOC);
            $valor = $linha['valor'];$lateralidade = $linha['lateralidade'];
            $muda = $lateralidade - 1;

            $sql0 = "SELECT * FROM configuracoes WHERE id = '12'";
            $obj0 = $pdo->prepare($sql0);
            $obj0->execute();
            $linha0 = $obj0->fetch(PDO::FETCH_ASSOC);
            $reentrada = $linha0['reentrada'];

            $sqlc1 = "SELECT * FROM pagamentos where userid = :useridc AND ativacao='0'";
            $objc1 = $pdo->prepare($sqlc1);
            $objc1->bindParam(":useridc",$idusuario);
            $objc1->execute();
            $contagem1 = $objc1->rowCount();

         

            if($contagem1 >= $reentrada){

                return 'estourado';

            }else{

      

            $sqlb = "SELECT * FROM indicados WHERE ativacao='1' AND (fase = '1' OR habilitar = '1') AND fase1 = '0' ORDER BY dataativacao1 ASC";
            $objb = $pdo->prepare($sqlb);
            $objb->execute();
            $linhab = $objb->fetch(PDO::FETCH_ASSOC);
            $useridb = $linhab['userid'];$cupomb = $linhab['cupom'];

            $sqlc = "SELECT * FROM pagamentos where cupomb = :cupomb AND fase = '1'";
            $objc = $pdo->prepare($sqlc);
            $objc->bindParam(":cupomb",$cupomb);
            $objc->execute();
            $contagem = $objc->rowCount();

            if($contagem < $lateralidade){

               

                if($contagem == $muda){

                    $sqld = "UPDATE indicados SET fase1 = '1' WHERE cupom = :cupomc";
                    $objd = $pdo->prepare($sqld);
                    $objd->bindParam(":cupomc",$cupomb);
                    $objd->execute();

                }
                
                $cupom = geraSenha(15, true, true);

                $sqlc2 = "SELECT * FROM indicados where userid = :useridd ";
                $objc2 = $pdo->prepare($sqlc2);
                $objc2->bindParam(":useridd",$idusuario);
                $objc2->execute();
                $contagem2 = $objc2->rowCount();


                    $sqle = "INSERT INTO pagamentos (userid,cupom,cupomb,useridb,valor,fase,posicao,ativacao,reentrada,datavencimento,registro) VALUES (:userid,:cupom,:cupomb,:useridb,:valor,'1','0','0','1',:datavencimento,'".$datas."')";
                    $obje = $pdo->prepare($sqle);
                    $obje->bindParam(":userid",$idusuario);
                    $obje->bindParam(":cupom",$cupom);
                    $obje->bindParam(":cupomb",$cupomb);
                    $obje->bindParam(":useridb",$useridb);
                    $obje->bindParam(":valor",$valor);
                    $obje->bindParam(":datavencimento",$datavencimento);
                    $obje->execute();

                
              
            }
            return 'deu';
            }
           


        }

        public function Sustentabilidade($pdo,$ciclo, $idpagamento){

            $datavencimento = date('Y-m-d H:i:s', strtotime("+4 days"));
            $datas = date('Y-m-d H:i:s');

            $ciclof = $ciclo - 1;

            $sql0 = "SELECT * FROM configuracoes WHERE id = :idciclo";
            $obj0 = $pdo->prepare($sql0);
            $obj0->bindParam(":idciclo",$ciclof);
            $obj0->execute();
            $linha0 = $obj0->fetch(PDO::FETCH_ASSOC);
            $sustentabilidade = $linha0['sustentabilidade'];

            

            $sql = "SELECT * FROM configuracoes WHERE id = '1'";
            $obj = $pdo->prepare($sql);
            $obj->execute();
            $linha = $obj->fetch(PDO::FETCH_ASSOC);
            $valor = $linha['valor'];$lateralidade = $linha['lateralidade'];
            $muda = $lateralidade - 1;

            $sqlc0 = "SELECT * FROM pagamentos where id = :idpagamento";
            $objc0 = $pdo->prepare($sqlc0);
            $objc0->bindParam(":idpagamento",$idpagamento);
            $objc0->execute();
            $linhac = $objc0->fetch(PDO::FETCH_ASSOC);
            $cupom = $linhac['cupom'];$cupom2 = $linhac['cupomb'];$idusuario = $linhac['useridb'];


            for($a=1;$a<=$sustentabilidade;$a++){

              


            $sqlb = "SELECT * FROM indicados WHERE ativacao='1' AND (fase = '1' OR habilitar = '1') AND fase1 = '0' ORDER BY dataativacao1 ASC";
            $objb = $pdo->prepare($sqlb);
            $objb->execute();
            $linhab = $objb->fetch(PDO::FETCH_ASSOC);
            $useridb = $linhab['userid'];$cupomb = $linhab['cupom'];

            $sqlc = "SELECT * FROM pagamentos where cupomb = :cupomb AND fase = '1'";
            $objc = $pdo->prepare($sqlc);
            $objc->bindParam(":cupomb",$cupomb);
            $objc->execute();
            $contagem = $objc->rowCount();

            if($contagem < $lateralidade){

              
                if($contagem == $muda){

                    $sqld = "UPDATE indicados SET fase1 = '1' WHERE cupom = :cupomc";
                    $objd = $pdo->prepare($sqld);
                    $objd->bindParam(":cupomc",$cupomb);
                    $objd->execute();

                }
                
                

                $sqle = "INSERT INTO pagamentos (userid,cupom,cupomb,useridb,valor,fase,posicao,ativacao,datavencimento,sustentabilidade,registro) VALUES (:userid,:cupom,:cupomb,:useridb,:valor,'1','0','0',:datavencimento,'1','".$datas."')";
                $obje = $pdo->prepare($sqle);
                $obje->bindParam(":userid",$idusuario);
                $obje->bindParam(":cupom",$cupom2);
                $obje->bindParam(":cupomb",$cupomb);
                $obje->bindParam(":useridb",$useridb);
                $obje->bindParam(":valor",$valor);
                $obje->bindParam(":datavencimento",$datavencimento);
                $obje->execute();

            }
              

            }

        }

        public function Upgrade($pdo, $ciclo, $idpagamento){

           

            $datavencimento = date('Y-m-d H:i:s', strtotime("+4 days"));
            $datas = date('Y-m-d H:i:s');

            $sql = "SELECT * FROM configuracoes WHERE id = :id";
            $obj = $pdo->prepare($sql);
            $obj->bindParam(":id",$ciclo);// o id de configurações terá que ser o id do ciclo
            $obj->execute();
            $linha = $obj->fetch(PDO::FETCH_ASSOC);
            $valor = $linha['valor'];$lateralidade = $linha['lateralidade'];
            $muda = $lateralidade - 1;

            $sqlb = "SELECT * FROM indicados WHERE ativacao = '1' AND (fase = :ciclo OR habilitar = :ciclo) AND fase$ciclo = '0' ORDER BY dataativacao$ciclo ASC";
            $objb = $pdo->prepare($sqlb);
            $objb->bindParam(":ciclo",$ciclo);
            $objb->execute();
            $linhab = $objb->fetch(PDO::FETCH_ASSOC);
            $useridb = $linhab['userid'];$cupomb = $linhab['cupom'];

            $sqlc0 = "SELECT * FROM pagamentos where id = :idpagamento";
            $objc0 = $pdo->prepare($sqlc0);
            $objc0->bindParam(":idpagamento",$idpagamento);
            $objc0->execute();
            $linhac = $objc0->fetch(PDO::FETCH_ASSOC);
            $cupom = $linhac['cupom'];$cupom2 = $linhac['cupomb'];$idusuario = $linhac['useridb'];

           if($cupom2 == 'jre'){

            $sql0 = "UPDATE indicados SET fase = :idb,ativacao='1' WHERE cupom = :cupom0";
            $obj0 = $pdo->prepare($sql0);
            $obj0->bindParam(":idb",$ciclo);
            $obj0->bindParam(":cupom0",$cupom2);
            $obj0->execute();

           }else{

            $sql0 = "UPDATE indicados SET fase = :idb,ativacao='0' WHERE cupom = :cupom0";
            $obj0 = $pdo->prepare($sql0);
            $obj0->bindParam(":idb",$ciclo);
            $obj0->bindParam(":cupom0",$cupom2);
            $obj0->execute();

           }

            $sqlc = "SELECT * FROM pagamentos where cupomb = :cupomb AND fase = :ciclob";
            $objc = $pdo->prepare($sqlc);
            $objc->bindParam(":cupomb",$cupomb);
            $objc->bindParam(":ciclob",$ciclo);
            $objc->execute();
            $contagem = $objc->rowCount();

            if($contagem < $lateralidade){

                if($contagem == $muda){

                    $sqld = "UPDATE indicados SET fase$ciclo = '1' WHERE cupom = :cupomc";
                    $objd = $pdo->prepare($sqld);
                    $objd->bindParam(":cupomc",$cupomb);
                    $objd->execute();
					
					$sqle = "INSERT INTO pagamentos (userid,cupom,cupomb,useridb,valor,fase,posicao,ativacao,dataativacao,datavencimento,registro) VALUES (:userid,:cupom,:cupomb,:useridb,:valor,:fase,'0','1',:dataativacao,:datavencimento,'".$datas."')";
					$obje = $pdo->prepare($sqle);
					$obje->bindParam(":userid",$idusuario);
					$obje->bindParam(":cupom",$cupom2);
					$obje->bindParam(":cupomb",$cupomb);
					$obje->bindParam(":useridb",$useridb);
					$obje->bindParam(":valor",$valor);
					$obje->bindParam(":fase",$ciclo);
					$obje->bindParam(":datavencimento",$datavencimento);
					$obje->bindParam(":dataativacao",$datas);
					$obje->execute();
              

                }else{
					
					$sqle = "INSERT INTO pagamentos (userid,cupom,cupomb,useridb,valor,fase,posicao,ativacao,datavencimento,registro) VALUES (:userid,:cupom,:cupomb,:useridb,:valor,:fase,'0','1',:datavencimento,'".$datas."')";
					$obje = $pdo->prepare($sqle);
					$obje->bindParam(":userid",$idusuario);
					$obje->bindParam(":cupom",$cupom2);
					$obje->bindParam(":cupomb",$cupomb);
					$obje->bindParam(":useridb",$useridb);
					$obje->bindParam(":valor",$valor);
					$obje->bindParam(":fase",$ciclo);
					$obje->bindParam(":datavencimento",$datavencimento);
					$obje->execute();
              	
					
				}
         
           
                

            }



        }

        public function Reentrada($pdo,$idusuario){

            $datavencimento = date('Y-m-d H:i:s', strtotime("+4 days"));
            $datas = date('Y-m-d H:i:s');

            $sql = "SELECT * FROM configuracoes WHERE id = '1'";
            $obj = $pdo->prepare($sql);
            $obj->execute();
            $linha = $obj->fetch(PDO::FETCH_ASSOC);
            $valor = $linha['valor'];$lateralidade = $linha['lateralidade'];
            $muda = $lateralidade - 1;


            $sqlb = "SELECT * FROM indicados WHERE ativacao='1' AND (fase = '1' OR habilitar = '1') AND fase1 = '0' ORDER BY dataativacao1 ASC";
            $objb = $pdo->prepare($sqlb);
            $objb->execute();
            $linhab = $objb->fetch(PDO::FETCH_ASSOC);
            $useridb = $linhab['userid'];$cupomb = $linhab['cupom'];

            $sqlc = "SELECT * FROM pagamentos where cupomb = :cupomb AND fase = '1'";
            $objc = $pdo->prepare($sqlc);
            $objc->bindParam(":cupomb",$cupomb);
            $objc->execute();
            $contagem = $objc->rowCount();

            if($contagem < $lateralidade){

                if($contagem == $muda){

                    $sqld = "UPDATE indicados SET fase1 = '2' WHERE cupom = :cupomc";
                    $objd = $pdo->prepare($sqld);
                    $objd->bindParam(":cupomc",$cupomb);
                    $objd->execute();

                }
                
                $cupom = geraSenha(15, true, true);


                $sqle = "INSERT INTO pagamentos (userid,cupom,cupomb,useridb,valor,fase,posicao,ativacao,datavencimento,reentrada,registro) VALUES (:userid,:cupom,:cupomb,:useridb,:valor,'1','0','0',:datavencimento,'1','".$datas."')";
                $obje = $pdo->prepare($sqle);
                $obje->bindParam(":userid",$idusuario);
                $obje->bindParam(":cupom",$cupom);
                $obje->bindParam(":cupomb",$cupomb);
                $obje->bindParam(":useridb",$useridb);
                $obje->bindParam(":valor",$valor);
                $obje->bindParam(":datavencimento",$datavencimento);
                $obje->execute();

            
            }

        }

        public function Retorno($pdo,$idpagamento){

            $datas = date('Y-m-d H:i:s');

           

            $sqlb = "SELECT * FROM pagamentos where id = :idpagamento";
            $objb = $pdo->prepare($sqlb);
            $objb->bindParam(":idpagamento",$idpagamento);
            $objb->execute();
            $linhab = $objb->fetch(PDO::FETCH_ASSOC);
            $valor = $linhab['valor'];$cupom = $linhab['cupom'];$cupomb = $linhab['cupomb'];
            $fase = $linhab['fase'];$iduser = $linhab['userid'];
            $fasef = $fase + 1;$reentrada = $linhab['reentrada'];$sustentabilidade = $linhab['sustentabilidade'];
            $pa = $linhab['patrocinador'];



            $sql0 = "UPDATE acesso SET ativacao='1' WHERE userid = :userida";
            $obj0 = $pdo->prepare($sql0);
            $obj0->bindParam(":userida",$iduser);
            $obj0->execute();

            
            $sql = "UPDATE pagamentos SET ativacao='1', dataativacao = :dataativacao WHERE id = :idpagamento";
            $obj = $pdo->prepare($sql);
            $obj->bindParam(":idpagamento",$idpagamento);
            $obj->bindParam(":dataativacao",$datas);
            $obj->execute();

            $sqlc = "SELECT * FROM configuracoes WHERE id = :fase";
            $objc = $pdo->prepare($sqlc);
            $objc->bindParam(":fase",$fase);
            $objc->execute();
            $linhac = $objc->fetch(PDO::FETCH_ASSOC);
            $valor = $linhac['valor'];$lateralidade = $linhac['lateralidade'];

            if($fase > '1'){
                    // valor de ugprade
                 
                $sqld1 = "UPDATE indicados SET ativacao='1',fase = :fasec,dataativacao$fase = :dataativab WHERE cupom = :cupomc ";
                $objd1 = $pdo->prepare($sqld1);
                $objd1->bindParam(":fasec",$fase);
                $objd1->bindParam(":cupomc",$cupom);
                $objd1->bindParam(":dataativab",$datas);
                $objd1->execute();

            }else{
              
                // caso não seja upgrade
                $sqld1 = "UPDATE indicados SET ativacao='1' WHERE cupom = :cupomc ";
                $objd1 = $pdo->prepare($sqld1);
                $objd1->bindParam(":cupomc",$cupom);
                $objd1->execute();

            }

            $sqld = "SELECT * FROM indicados WHERE fase = :faseb AND ativacao='1' AND cupomb = :cupomb";
            $objd = $pdo->prepare($sqld);
            $objd->bindParam(":faseb",$fase);
            $objd->bindParam(":cupomb",$cupomb);
            $objd->execute();
            $contagem = $objd->rowCount();


            $sqld2 = "SELECT * FROM indicados WHERE userid = :useridb AND ativacao='0' ";
            $objd2 = $pdo->prepare($sqld2);
            $objd2->bindParam(":useridb",$iduser);
            $objd2->execute();
            $contagem2 = $objd2->rowCount();

            if(($fase == '1')&&($sustentabilidade == '0')){
                // se for de nova entrada no sistema

            $cupoma = geraSenha(15, true, true);

            // pega nova reentrada e contabiliza

            $sqle = "INSERT INTO indicados (userid,cupom,fase,ativacao,dataativacao1,logins,registro) VALUES (:userid,:cupoma,'1','1',:dataativa,:logins,'".$datas."')";
            $obje = $pdo->prepare($sqle);
            $obje->bindParam(":userid",$iduser);
            $obje->bindParam(":cupoma",$cupoma);
            $obje->bindParam(":logins",$contagem2);
            $obje->bindParam(":dataativa",$datas);
            $obje->execute();

            if($contagem == $lateralidade){
             
                return 'upgrade-'.$fasef;
            }else{
                return true;
            }

            }else if($sustentabilidade == '1'){

                if($contagem == $lateralidade){
                  
                    return 'upgrade-'.$fasef;
                }else{
                    return true;
                }
                
            }

            if($contagem == $lateralidade){
                  
                return 'upgrade-'.$fasef;
            }else{
                return true;
            }


        }

        public function GerarSustentabilidade($pdo,$idusuario){

            $datavencimento = date('Y-m-d H:i:s', strtotime("+4 days"));
            $datas = date('Y-m-d H:i:s');

            $sql = "SELECT * FROM configuracoes WHERE id = '1'";
            $obj = $pdo->prepare($sql);
            $obj->execute();
            $linha = $obj->fetch(PDO::FETCH_ASSOC);
            $valor = $linha['valor'];$lateralidade = $linha['lateralidade'];
            $muda = $lateralidade - 1;


            $sqlb = "SELECT * FROM indicados WHERE ativacao='1' AND (fase = '1' OR habilitar = '1') AND fase1 = '0' ORDER BY dataativacao1 ASC";
            $objb = $pdo->prepare($sqlb);
            $objb->execute();
            $linhab = $objb->fetch(PDO::FETCH_ASSOC);
            $useridb = $linhab['userid'];$cupomb = $linhab['cupom'];

            $sqlc = "SELECT * FROM pagamentos where cupomb = :cupomb AND fase = '1'";
            $objc = $pdo->prepare($sqlc);
            $objc->bindParam(":cupomb",$cupomb);
            $objc->execute();
            $contagem = $objc->rowCount();

            if($contagem < $lateralidade){

                if($contagem == $muda){

                    $sqld = "UPDATE indicados SET fase1 = '2' WHERE cupom = :cupomc";
                    $objd = $pdo->prepare($sqld);
                    $objd->bindParam(":cupomc",$cupomb);
                    $objd->execute();

                }
                
                $cupom = geraSenha(15, true, true);


                $sqle = "INSERT INTO pagamentos (userid,cupom,cupomb,useridb,valor,fase,posicao,ativacao,datavencimento,sustentabilidade,registro) VALUES (:userid,:cupom,:cupomb,:useridb,:valor,'1','0','0',:datavencimento,'1','".$datas."')";
                $obje = $pdo->prepare($sqle);
                $obje->bindParam(":userid",$idusuario);
                $obje->bindParam(":cupom",$cupom);
                $obje->bindParam(":cupomb",$cupomb);
                $obje->bindParam(":useridb",$useridb);
                $obje->bindParam(":valor",$valor);
                $obje->bindParam(":datavencimento",$datavencimento);
                $obje->execute();

            
            }

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

        public function pegaPosicao1($pdo){

            $sql = "SELECT indicados.userid,indicados.dataativacao1,indicados.fase,acesso.usuario,dadospessoais.nome FROM indicados,acesso,dadospessoais WHERE indicados.userid = acesso.userid AND acesso.userid = dadospessoais.userid AND indicados.fase1='0' AND indicados.ativacao='1' AND indicados.fase='1' ORDER BY indicados.dataativacao1 ASC";
            $obj = $pdo->prepare($sql);
            $obj->execute();

            return $obj;

        }

        public function pegaPosicao2($pdo){

            $sql = "SELECT indicados.userid,indicados.dataativacao1,indicados.fase,acesso.usuario,dadospessoais.nome FROM indicados,acesso,dadospessoais WHERE indicados.userid = acesso.userid AND acesso.userid = dadospessoais.userid AND indicados.fase2='0' AND indicados.ativacao='1' AND indicados.fase='2' ORDER BY indicados.dataativacao2 ASC";
            $obj = $pdo->prepare($sql);
            $obj->execute();

            return $obj;

        }

        public function pegaPosicao3($pdo){

            $sql = "SELECT indicados.userid,indicados.dataativacao1,indicados.fase,acesso.usuario,dadospessoais.nome FROM indicados,acesso,dadospessoais WHERE indicados.userid = acesso.userid AND acesso.userid = dadospessoais.userid AND indicados.fase3='0' AND indicados.ativacao='1' AND indicados.fase='3' ORDER BY indicados.dataativacao3 ASC";
            $obj = $pdo->prepare($sql);
            $obj->execute();

            return $obj;

        }

        public function pegaPosicao4($pdo){

            $sql = "SELECT indicados.userid,indicados.dataativacao1,indicados.fase,acesso.usuario,dadospessoais.nome FROM indicados,acesso,dadospessoais WHERE indicados.userid = acesso.userid AND acesso.userid = dadospessoais.userid AND indicados.fase4='0' AND indicados.ativacao='1' AND indicados.fase='4' ORDER BY indicados.dataativacao4 ASC";
            $obj = $pdo->prepare($sql);
            $obj->execute();

            return $obj;

        }

        public function pegaPosicao5($pdo){

            $sql = "SELECT indicados.userid,indicados.dataativacao1,indicados.fase,acesso.usuario,dadospessoais.nome FROM indicados,acesso,dadospessoais WHERE indicados.userid = acesso.userid AND acesso.userid = dadospessoais.userid AND indicados.fase5='0' AND indicados.ativacao='1' AND indicados.fase='5' ORDER BY indicados.dataativacao5 ASC";
            $obj = $pdo->prepare($sql);
            $obj->execute();

            return $obj;

        }

        public function pegaPosicao6($pdo){

            $sql = "SELECT indicados.userid,indicados.dataativacao1,indicados.fase,acesso.usuario,dadospessoais.nome FROM indicados,acesso,dadospessoais WHERE indicados.userid = acesso.userid AND acesso.userid = dadospessoais.userid AND indicados.fase6='0' AND indicados.ativacao='1' AND indicados.fase='6' ORDER BY indicados.dataativacao6 ASC";
            $obj = $pdo->prepare($sql);
            $obj->execute();

            return $obj;

        }

        public function pegaPosicao7($pdo){

            $sql = "SELECT indicados.userid,indicados.dataativacao1,indicados.fase,acesso.usuario,dadospessoais.nome FROM indicados,acesso,dadospessoais WHERE indicados.userid = acesso.userid AND acesso.userid = dadospessoais.userid AND indicados.fase7='0' AND indicados.ativacao='1' AND indicados.fase='7' ORDER BY indicados.dataativacao7 ASC";
            $obj = $pdo->prepare($sql);
            $obj->execute();

            return $obj;

        }

        public function pegaPosicao8($pdo){

            $sql = "SELECT indicados.userid,indicados.dataativacao1,indicados.fase,acesso.usuario,dadospessoais.nome FROM indicados,acesso,dadospessoais WHERE indicados.userid = acesso.userid AND acesso.userid = dadospessoais.userid AND indicados.fase8='0' AND indicados.ativacao='1' AND indicados.fase='8' ORDER BY indicados.dataativacao8 ASC";
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

            $sql = "SELECT acesso.usuario,acesso.userid,dadospessoais.cpf FROM acesso,dadospessoais WHERE dadospessoais.userid = acesso.userid AND   dadospessoais.cpf = :cpf  ";
            $obj = $pdo->prepare($sql);
            $obj->bindParam(":cpf",$cpf);
            $obj->execute();

            return $obj;

        }

     

    }