<?php
    Class Financas{

        public function listaFinancas($pdo,$userid){
		
            $sql = "SELECT id, descricao,registro, entrada, saida FROM financas where userid = :userid";
            
            $obj = $pdo->prepare($sql);
            $obj->bindParam(":userid",$userid);
            $obj->execute();
            return $obj;

		}
		
		public function QueroInvestir($pdo,$valor,$userid){
			
			$datas = date('Y-m-d H:i:s');

			function geraSenha($tamanho = 10, $maiusculas = true, $numeros = true, $simbolos = false)
			{
			$lmin = 'abcdefghijklmnopqrstuvwxyz';
			$lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$num = '1234567890';
			$simb = '!@#$%*-';
			$retorno = '';
			$caracteres = '';
	
			$caracteres .= $lmin;
			if ($maiusculas) $caracteres .= $lmai;
			if ($numeros) $caracteres .= $num;
			if ($simbolos) $caracteres .= $simb;
	
			$len = strlen($caracteres);
			for ($n = 1; $n <= $tamanho; $n++) {
			$rand = mt_rand(1, $len);
			$retorno .= $caracteres[$rand-1];
			}
			return $retorno;
			}

			$datavencimento = date('Y-m-d H:i:s', strtotime("+4 days"));

			$cupom = geraSenha(15, true, true);
			
			// pega o patrocinador
			$sql = "SELECT * FROM acesso where sponsorid = :userid AND ativacao='1'";
            $obj = $pdo->prepare($sql);
            $obj->bindParam(":userid",$userid);
			$obj->execute();
			$indicados = $obj->rowCount();

			if($indicados >= '10'){

				$amais = '5';

			}else if($indicados >= '3' && $indicados <= '10'){
				
				$amais = '2';

			}else{

				$amais = '0';

			}
			$porcentagem = 30 + $amais;

			$percentual = $porcentagem / 100.00; // 100%
            $valorfinal = $valor - ($percentual * $valor);
			$ganhosf = $valor - $valorfinal;

			$percentual1 = 5 / 100.00; // 100%
            $valorfinal1 = $ganhosf - ($percentual1 * $ganhosf);
			$ganhos = $ganhosf - $valorfinal1;
			
			$lucro = $ganhosf - $ganhos;
			
			$sqlb = "INSERT INTO faturas (userid,descricao,valor,cupom,registro) VALUES (:userid,'Doacao de R$ $valor.00',:valor,:cupom,'".$datas."')";
			$objb = $pdo->prepare($sqlb);
			$objb->bindParam(":userid", $userid);
			$objb->bindParam(":valor", $valor);
			$objb->bindParam(":cupom", $cupom);
			$objb->execute();
			
			// inserir valor, data recebimento, valor a receber
			$sqlc = "INSERT INTO investimentos (userid,valor,receber,porcentagem,ativacao,trava,datavencimento,cupom,registro) VALUES (:userid,:valor,:ganhos,:porcentagem,'0','1',:datavencimento,:cupom,'".$datas."')";
			$objc = $pdo->prepare($sqlc);
			$objc->bindParam(":userid", $userid);
			$objc->bindParam(":valor", $valor);
			$objc->bindParam(":ganhos", $lucro);
			$objc->bindParam(":porcentagem", $porcentagem);
			$objc->bindParam(":datavencimento", $datavencimento);
			$objc->bindParam(":cupom", $cupom);
			$objc->execute();	

           return $objc;

	    }
		
		public function PagarLucro($pdo){
			
			$datas = date("Y-m-d H:i:s");
		
            $sql = "SELECT * FROM investimentos where datavencimento >= :datavencimento AND ativacao = '1'";
            $obj = $pdo->prepare($sql);
			$obj->bindParam(":datavencimento", $datas);
			$obj->execute();
			while($linha = $obj->fetch(PDO::FETCH_ASSOC)){

				$userid = $linha['userid'];$valor = $linha['valor'];$receber = $linha['receber'];$cupom = $linha['cupom'];
				$idinvestimento = $linha['id'];
				
				$sql0 = "SELECT * FROM saldo where userid = :userid order by id DESC";
				$obj0 = $pdo->prepare($sql0);
				$obj0->bindParam(":userid", $userid);
				$obj0->execute();
				$linha0 = $obj0->fetch(PDO::FETCH_ASSOC);
				$saldo = $linha0['saldo'];

				$sqlb = "INSERT INTO financas (userid,descricao,entrada,saldo,cupom,idinvestimento,registro) VALUES (:userid,'Lucro',:receber,:saldo,:cupom,:idinvestimento,'".$datas."')";
				$objb = $pdo->prepare($sqlb);
				$objb->bindParam(":userid", $userid);
				$objb->bindParam(":receber", $receber);
				$objb->bindParam(":saldo", $saldo);
				$objb->bindParam(":cupom", $cupom);
				$objb->bindParam(":idinvestimento", $idinvestimento);
				$objb->execute();

				$saldof = $saldo + $receber;

				$sqlc = "INSERT INTO saldo (userid,saldo,cupom,ganhos,registro) VALUES (:userid,:saldof,:cupom,:receber,'".$datas."')";
				$objc = $pdo->prepare($sqlc);
				$objc->bindParam(":userid", $userid);
				$objc->bindParam(":receber", $receber);
				$objc->bindParam(":saldof", $saldof);
				$objc->bindParam(":cupom", $cupom);
				$objc->execute();
				
				$sqld = "UPDATE investimentos SET ativacao='2' WHERE cupom = :cupom";
				$objd = $pdo->prepare($sqld);
				$objd->bindParam(":cupom", $cupom);
				$objd->execute();
				
			}

            return $obj;

	    }

		public function listaInvestimentos($pdo){
		
            $sql = "SELECT investimentos.id,investimentos.valor,acesso.usuario,acesso.nome FROM investimentos,acesso where investimento.userid = acesso.userid AND ativacao = '1'";
            
            $obj = $pdo->prepare($sql);
            $obj->execute();
            return $obj;

	    }
		
		public function pegaMinhasDoacoes($pdo, $idusuario){
		
            $sql = "SELECT * FROM investimentos where userid = :idusuario";
            
            $obj = $pdo->prepare($sql);
			$obj->bindParam(":idusuario",$idusuario);
            $obj->execute();
            return $obj;

	    }

		public function listaInvestimentosporUsuario($pdo){
		
            $sql = "SELECT SUM(investimentos.valor) as soma,investimentos.userid,investimentos.valor,acesso.usuario,acesso.userid,dadospessoais.nome FROM investimentos,acesso,dadospessoais WHERE investimentos.userid = acesso.userid AND dadospessoais.userid = acesso.userid AND investimentos.ativacao = '1' GROUP BY acesso.userid";
            
            $obj = $pdo->prepare($sql);
            $obj->execute();
            return $obj;

	    }

		public function InvestimentosGeral($pdo){
		
            $sql = "SELECT SUM(valor) as soma FROM investimentos WHERE reinvestimentos ='0' AND ativacao='1'";
            
            $obj = $pdo->prepare($sql);
            $obj->execute();
            return $obj;

	    }

		public function ReinvestimentosGeral($pdo){
		
            $sql = "SELECT SUM(valor) as soma FROM investimentos WHERE reinvestimentos ='1' AND ativacao='1'";
            
            $obj = $pdo->prepare($sql);
            $obj->execute();
            return $obj;

	    }

		public function acertaSaldo($pdo){
			$datas = date("Y-m-d H:I:s");
		
            $sql = "SELECT * FROM acesso";
            $obj = $pdo->prepare($sql);
            $obj->execute();

			while($linha = $obj->fetch(PDO::FETCH_ASSOC)){
				$useridd = $linha['userid'];
				$sqlb = "SELECT * FROM saldo WHERE userid = :userid";
				$objb = $pdo->prepare($sqlb);
				$objb->bindParam(":userid",$useridd);
				$objb->execute();
				$linhab = $objb->fetch(PDO::FETCH_ASSOC);
					$useridb = $linhab['userid'];
					if($useridb == ""){
						$sqlc = "INSERT INTO saldo (userid,saldo,registro) VALUES (:useridb,'0.00','".$datas."')";
						$objc = $pdo->prepare($sqlc);
						$objc->bindParam(":useridb", $useridd);
						$objc->execute();
						print $useridd;
						print "<br/>";
					}

			}

            return $obj;

	    }

		public function TotalGeral($pdo){
		
            $sql = "SELECT SUM(valor) as soma FROM investimentos WHERE ativacao='1'";
            
            $obj = $pdo->prepare($sql);
            $obj->execute();
            return $obj;

	    }

		public function totalGanho($pdo,$userid){
		
            $sql = "SELECT SUM(entrada) as ganhos FROM financas where userid = :userid";
            
            $obj = $pdo->prepare($sql);
            $obj->bindParam(":userid",$userid);
            $obj->execute();
			$linha = $obj->fetch(PDO::FETCH_ASSOC);
            return $linha['ganhos'];

	    }

		public function totalRetirada($pdo,$userid){
		
            $sql = "SELECT SUM(valor) as retirada FROM saques where userid = :userid AND ativacao='1'";
            
            $obj = $pdo->prepare($sql);
            $obj->bindParam(":userid",$userid);
            $obj->execute();
            $linha = $obj->fetch(PDO::FETCH_ASSOC);
            return $linha['retirada'];

	    }

		public function totalInvestido($pdo,$userid){
		
            $sql = "SELECT SUM(valor) as investido FROM investimentos where userid = :userid AND ativacao='1'";
            
            $obj = $pdo->prepare($sql);
            $obj->bindParam(":userid",$userid);
            $obj->execute();
            $linha = $obj->fetch(PDO::FETCH_ASSOC);
            return $linha['investido'];

	    }

		public function pegarFinancas($pdo,$userid){
		
            $sql = "SELECT id,descricao,entrada,saida,registro FROM financas where userid = :userid order by id DESC limit 0,10";
            
            $obj = $pdo->prepare($sql);
            $obj->bindParam(":userid",$userid);
            $obj->execute();
            return $obj;

	    }
		
		public function LiberarSaldo($pdo,$userid,$saldobloqueado){
			
			$datas = date('Y-m-d H:i:s');
			
			$sql = "SELECT saldo,idinvestimento FROM saldobloqueado where id = :saldobloqueado ";
            $obj = $pdo->prepare($sql);
            $obj->bindParam(":saldobloqueado",$saldobloqueado);
            $obj->execute();
			$linha = $obj->fetch(PDO::FETCH_ASSOC);
		
            $sql1 = "INSERT INTO historico_saldobloqueado(userid,valor,investimento,registro) VALUES (:userid,:valor,:investimento,'".$datas."')";
            $obj1 = $pdo->prepare($sql1);
            $obj1->bindParam(":userid",$userid);
			$obj1->bindParam(":valor",$linha['saldo']);
			$obj1->bindParam(":investimento",$linha['idinvestimento']);
            $obj1->execute();
			
			$sqlb = "SELECT saldo FROM saldo where userid = :userid order by id DESC";
            $objb = $pdo->prepare($sqlb);
            $objb->bindParam(":userid",$userid);
            $objb->execute();
			$linhab = $objb->fetch(PDO::FETCH_ASSOC);
			
			$valorf = $linhab['saldo'] + $linha['saldo'];
			
			$sql2 = "INSERT INTO saldo(userid,saldo,saldo_antigo,registro) VALUES (:userid,:valor,:saldoantigo,'".$datas."')";
            $obj2 = $pdo->prepare($sql2);
            $obj2->bindParam(":userid",$userid);
			$obj2->bindParam(":valor",$valorf);
			$obj2->bindParam(":saldoantigo",$linha['saldo']);
            $obj2->execute();
			
			$sql3 = "DELETE FROM saldobloqueado WHERE id = :saldobloqueado";
            $obj3 = $pdo->prepare($sql3);
			$obj3->bindParam(":saldobloqueado",$saldobloqueado);
            $obj3->execute();
		
            return $obj3;

	    }

		public function liberaSaldoBloqueado($pdo){

			$datas = date("Y-m-d H:i:s");

		
		
            $sql = "SELECT * FROM investimentos WHERE ativacao='1' AND datavencimento < :data";
            $obj = $pdo->prepare($sql);
			$obj->bindParam(":data",$datas);
            $obj->execute();
			while($linha = $obj->fetch(PDO::FETCH_ASSOC)){

			
				$sql0 = "SELECT * FROM financas WHERE idinvestimento = :idinvestimento AND userid = :userid";
				$obj0 = $pdo->prepare($sql0);
				$obj0->bindParam(":userid",$linha['userid']);
				$obj0->bindParam(":idinvestimento",$linha['id']);
				$obj0->execute();
				while($linha0 = $obj0->fetch(PDO::FETCH_ASSOC)){

				

				$sql1 = "select saldo, (saldo + :valor) as soma from saldo where userid = :userida order by id DESC limit 0,1";
					
				$obj1 = $pdo->prepare($sql1);
				$obj1->bindParam(":userida",$linha['userid']);
				$obj1->bindParam(":valor",$linha0['entrada']);
				$obj1->execute();
				$linha1 = $obj1->fetch(PDO::FETCH_ASSOC);

				$sqlb = "INSERT INTO saldo (userid, saldo, saldo_antigo,ganhos,registro) VALUES (:useridb, :soma, :saldo, :valorb,'".$datas."')";
					
				$objb = $pdo->prepare($sqlb);
				$objb->bindParam(":useridb",$linha['userid']);
				$objb->bindParam(":soma",$linha1['soma']);
				$objb->bindParam(":saldo",$linha1['saldo']);
				$objb->bindParam(":valorb",$linha0['entrada']);
				$objb->execute();

				$sqlc = "INSERT INTO financas (userid, descricao, entrada,saida,registro) VALUES (:useridc,'Transferencia Saldo Bloqueado para Saldo', '0' , :valorc,'".$datas."')";
					
				$objc = $pdo->prepare($sqlc);
				$objc->bindParam(":useridc",$linha['userid']);
				$objc->bindParam(":valorc",$linha0['entrada']);
				$objc->execute();
				
				}

				  $datasb = explode(" ",$linha['datavencimento']);
           		 $datasc = explode("-",$datasb[0]);
				if($datasc[1] == 12){
					$datasd = 1;
				}else{
					$datasd = $datasc[1] + 1;
				}
				$array = array($datasc[0],$datasd,$datasc[2]);
				$novadatab = implode("-",$array);
                $array2 = array($novadatab,$datasb[1]);
                $novadata = implode(" ",$array2);

				
				$sqld = "UPDATE investimentos SET datavencimento = '".$novadata."' WHERE id = :idb";
					
				$objd = $pdo->prepare($sqld);
				$objd->bindParam(":idb",$linha['id']);
				$objd->execute();
			}

            return $obj;

	    }

		public function liberaInvestimentoTotal($pdo){

			$datas = date("Y-m-d H:i:s");
		
            $sql = "SELECT * FROM investimentos WHERE ativacao='1' AND dataanual < :data";
            $obj = $pdo->prepare($sql);
            $obj->bindParam(":userid",$userid);
			$obj->bindParam(":data",$datas);
            $obj->execute();
			while($linha = $obj->fetch(PDO::FETCH_ASSOC)){

				$sql1 = "select saldo, (saldo + :valor) as soma from saldo where userid = :userida order by id DESC limit 0,1";
					
				$obj1 = $pdo->prepare($sql1);
				$obj1->bindParam(":userida",$linha['userid']);
				$obj1->bindParam(":valor",$linha['valor']);
				$obj1->execute();
				$linha1 = $obj1->fetch(PDO::FETCH_ASSOC);

				$sqlb = "INSERT INTO saldo (userid, saldo, saldo_antigo,ganhos,registro) VALUES (:useridb, :soma, :saldo, :valorb,'".$datas."')";
					
				$objb = $pdo->prepare($sqlb);
				$objb->bindParam(":useridb",$linha['userid']);
				$objb->bindParam(":soma",$linha1['soma']);
				$objb->bindParam(":saldo",$linha1['saldo']);
				$objb->bindParam(":valorb",$linha['valor']);
				$objb->execute();

				$sqlc = "INSERT INTO financas (userid, descricao, entrada,saida,data_entrada) VALUES (:useridc,'Devolução de Plano Anual', '0' , :valorc,'".$datas."')";
					
				$objc = $pdo->prepare($sqlc);
				$objc->bindParam(":useridc",$linha['userid']);
				$objc->bindParam(":valorc",$linha0['valor']);
				$objc->execute();

				$sqld = "UPDATE investimentos SET ativacao = '0' WHERE id = :idb";
					
				$objd = $pdo->prepare($sqld);
				$objd->bindParam(":idb",$linha['id']);
				$objd->execute();
				
				

			}

            return $obj;

	    }

		public function pegaSaldo($pdo,$userid){
		
            $sql = "SELECT saldo FROM saldo where userid = :userid order by id DESC";
            
            $obj = $pdo->prepare($sql);
            $obj->bindParam(":userid",$userid);
            $obj->execute();
			$linha = $obj->fetch(PDO::FETCH_ASSOC);
            return $linha['saldo'];

	    }

		public function pegarSaldo($pdo,$userid){
		
            $sql = "SELECT saldo FROM saldo where userid = :userid order by id DESC LIMIT 0,1";
            
            $obj = $pdo->prepare($sql);
            $obj->bindParam(":userid",$userid);
            $obj->execute();
            return $obj;

	    }

		public function pegarSaldoBloqueado($pdo,$userid){
		
            $sql = "SELECT SUM(saldo) as saldo FROM saldobloqueado where userid = :userid order by id DESC LIMIT 0,1";
            
            $obj = $pdo->prepare($sql);
            $obj->bindParam(":userid",$userid);
            $obj->execute();
            return $obj;

	    }
		
		public function pegaSaldoBloqueadoTotal($pdo){
		
            $sql = "SELECT *,acesso.userid,acesso.usuario FROM saldobloqueado,acesso WHERE saldobloqueado.saldo > 0 AND saldobloqueado.userid = acesso.userid AND saldobloqueado.userid != '1' ";
            
            $obj = $pdo->prepare($sql);
            $obj->execute();
            return $obj;

	    }
		
		public function pegaSaldoBloqueado($pdo,$userid){
		
            $sql = "SELECT * FROM saldobloqueado where userid = :userid AND saldo > '0.00'";
            
            $obj = $pdo->prepare($sql);
            $obj->bindParam(":userid",$userid);
            $obj->execute();
            return $obj;

	    }

		public function acertarSaldoBloqueado($pdo){
		
            $sql = "SELECT userid FROM acesso ";
            
            $obj = $pdo->prepare($sql);
            $obj->execute();
			while($linha = $obj->fetch(PDO::FETCH_ASSOC)){
			$iduser = $linha['userid'];
				
            $sqlb = "SELECT userid FROM saldobloqueado WHERE userid = :userid";
            $objb = $pdo->prepare($sqlb);
            $objb->bindParam(":userid",$iduser);
            $objb->execute();
			$contagem = $objb->rowCount();

			if($contagem == '0'){
				
				$sqlc = "INSERT INTO saldobloqueado (userid, saldo, saldo_antigo,ganhos,registro) VALUES (:useridb,'0.00', '0.00', '0.00','".$datas."')";
				$objc = $pdo->prepare($sqlc);
				$objc->bindParam(":useridb",$iduser);
				$objc->execute();
			}

			}
            //return $linha['saldo'];

	    }

		public function acertaSaldoBloqueado($pdo){

			$datas = date("Y-m-d H:i:s");
		
            $sql = "SELECT * FROM financas WHERE descricao = 'Entrada de Saldo Bloqueado' OR descricao LIKE '%Ganhos Diários%' ";
            
            $obj = $pdo->prepare($sql);
            $obj->execute();
			while($linha = $obj->fetch(PDO::FETCH_ASSOC)){
			$iduser = $linha['userid'];
			$valor = $linha['entrada'];
			$idinvestimento = $linha['idinvestimento'];
        
				
				$sqlc = "INSERT INTO saldobloqueado (userid, saldo, saldo_antigo,ganhos,idinvestimento,registro) VALUES (:useridb,:valor, '0.00', '0.00',:idinvestimento,'".$datas."')";
				$objc = $pdo->prepare($sqlc);
				$objc->bindParam(":useridb",$iduser);
				$objc->bindParam(":valor",$valor);
				$objc->bindParam(":idinvestimento",$idinvestimento);
				$objc->execute();
			

			}
            return $obj;

	    }

		public function pegarPercentual($pdo,$userid){
		
            $sql = "SELECT SUM(percentual) as soma FROM percentual where userid = :userid ";
            
            $obj = $pdo->prepare($sql);
            $obj->bindParam(":userid",$userid);
            $obj->execute();
            return $obj;

	    }

		public function listaAdmFinancas($pdo){
		
            $sql = "SELECT id, descricao,registro, entrada, saida FROM financas ";
            
            $obj = $pdo->prepare($sql);
            $obj->execute();
            return $obj;

	    }

		public function AdmInvestimentos($pdo){
		
            $sql = "SELECT acesso.usuario, investimentos.valor, investimentos.id, investimentos.registro FROM investimentos, acesso WHERE investimentos.reinvestimentos = '0' AND acesso.userid = investimentos.userid";
            
            $obj = $pdo->prepare($sql);
            $obj->execute();
            return $obj;

	    }

		public function AdmReinvestimentos($pdo){
		
            $sql = "SELECT acesso.usuario, investimentos.valor, investimentos.id, investimentos.registro FROM investimentos, acesso WHERE investimentos.reinvestimentos = '1' AND acesso.userid = investimentos.userid";
            
            $obj = $pdo->prepare($sql);
            $obj->execute();
            return $obj;

	    }

		public function Investimentos($pdo, $userid){
		
            $sql = "SELECT acesso.usuario, investimentos.valor, investimentos.id, saldo.saldo FROM investimentos, acesso, saldo WHERE investimentos.reinvestimentos = '0' AND acesso.userid = :userid AND investimentos.userid = :userid AND saldo.userid = :userid";
            
            $obj = $pdo->prepare($sql);
            $obj->execute();
			$obj->bindParam(":userid",$userid);
            return $obj;

	    }

		public function Reinvestimentos($pdo, $userid){
		
            $sql = "SELECT * FROM investimentos WHERE reinvestimentos = '1' AND userid = :userid";
            
            $obj = $pdo->prepare($sql);
            $obj->execute();
			$obj->bindParam(":userid",$userid);
            return $obj;

	    }

		public function inativarInvestimentos($pdo, $id){

			$datas = date("Y-m-d H:i:s");

            $sql = "UPDATE investimentos set ativacao = '0', datainativacao = '".$datas."' WHERE id = :id";
            
            $obj = $pdo->prepare($sql);
            $obj->execute();
			$obj->bindParam(":id",$id);
            return $obj;

	    }

        public function Bonuscompartilhamento($pdo,$userid, $valor){
		
          
		$datas = date("Y-m-d H:i:s");
		
		$sql = "select saldo, (saldo + :valor) as soma from saldo where userid = :userid order by id DESC limit 0,1";
			
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->bindParam(":valor",$valor);
		$obj->execute();
        $linha = $obj->fetch(PDO::FETCH_ASSOC);

		$sqlb = "INSERT INTO saldo (userid, saldo, saldo_antigo,ganhos,registro) VALUES (:userid, :soma, :saldo, :valor,'".$datas."')";
			
		$objb = $pdo->prepare($sqlb);
		$objb->bindParam(":userid",$userid);
		$objb->bindParam(":soma",$linha['soma']);
		$objb->bindParam(":saldo",$linha['saldo']);
        $objb->bindParam(":valor",$valor);
		$objb->execute();

        $sqlc = "INSERT INTO financas (userid, descricao, entrada,saida,data_entrada) VALUES (:userid,'Bonus de Compartilhamento', '0' , :valor,'".$datas."')";
			
		$objc = $pdo->prepare($sqlc);
		$objc->bindParam(":userid",$userid);
        $objc->bindParam(":valor",$valor);
		$objc->execute();

		return $objc;
		}

		public function CadastrarInvestimento($pdo, $userid, $valor, $data, $tipo){

		$datas = date('Y-m-d H:i:s', strtotime($data));
		$datass = date("Y-m-d H:i:s");

		
		$sqlc = "INSERT INTO investimentos (userid, valor, ativacao, reinvestimentos,registro) VALUES (:useridd, :valorc,'1',:tipo,'".$datas."')";
			
		$objc = $pdo->prepare($sqlc);
		$objc->bindParam(":useridd",$userid);
		$objc->bindParam(":valorc",$valor);
		$objc->bindParam(":tipo",$tipo);
		$objc->execute();

		$sqld = "INSERT INTO financas (userid, descricao, entrada,saida,registro) VALUES (:useride, 'Investimento',:valord,'0.00' ,'".$datass."')";
			
		$objd = $pdo->prepare($sqld);
		$objd->bindParam(":useride",$userid);
		$objd->bindParam(":valord",$valor);
		$objd->execute();

		return $objd;
			
		}

		public function Reinvestimento($pdo, $userid, $valor){

		$datas = date("Y-m-d H:i:s");
		$datav = date('Y-m-d H:i:s', strtotime("+30 days"));
		
		$sql = "select saldo, (saldo - :valor) as soma from saldo where userid = :userid order by id DESC limit 0,1";
			
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->bindParam(":valor",$valor);
		$obj->execute();
		$linha = $obj->fetch(PDO::FETCH_ASSOC);

		$sqlb = "INSERT INTO saldo (userid, saldo, saldo_antigo,ganhos,registro) VALUES (:userid, :valorb, :antigo, '0','".$datas."')";
			
		$objb = $pdo->prepare($sqlb);
		$objb->bindParam(":userid",$userid);
		$objb->bindParam(":valorb",$linha['soma']);
		$objb->bindParam(":antigo",$linha['saldo']);
		$objb->execute();

		$sqlc = "INSERT INTO investimentos (userid, valor, ativacao, datavencimento,reinvestimentos,registro) VALUES (:useridd, :valorc,'1','".$datav."' ,'1','".$datas."')";
			
		$objc = $pdo->prepare($sqlc);
		$objc->bindParam(":useridd",$userid);
		$objc->bindParam(":valorc",$valor);
		$objc->execute();

		$sqld = "INSERT INTO financas (userid, descricao, entrada,saida,registro) VALUES (:useride, 'Reinvestimento',:valord,'0.00' ,'".$datas."')";
			
		$objd = $pdo->prepare($sqld);
		$objd->bindParam(":useride",$userid);
		$objd->bindParam(":valord",$valor);
		$objd->execute();

		return $objd;
			
		}

		public function CreditarSaldo($pdo, $userid, $valor, $motivo){

		$datas = date("Y-m-d H:i:s");
		
		$sql = "select saldo, (saldo + :valor) as soma from saldo where userid = :userid order by id DESC ";
			
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->bindParam(":valor",$valor);
		$obj->execute();
		$linha = $obj->fetch(PDO::FETCH_ASSOC);

		$sqlb = "INSERT INTO saldo (userid, saldo, saldo_antigo,ganhos,registro) VALUES (:useridb, :valorb, :antigo, '0.00','".$datas."')";
		
		$objb = $pdo->prepare($sqlb);
		$objb->bindParam(":useridb",$userid);
		$objb->bindParam(":valorb",$linha['soma']);
		$objb->bindParam(":antigo",$linha['saldo']);
		$objb->execute();

		$sqlc = "INSERT INTO financas (userid, descricao, entrada,saida,registro) VALUES (:useridc, :motivo, :valorc, '0.00','".$datas."')";
			
		$objc = $pdo->prepare($sqlc);
		$objc->bindParam(":useridc",$userid);
		$objc->bindParam(":valorc",$valor);
		$objc->bindParam(":motivo",$motivo);
		$objc->execute();

		return $objb;
			
		}

		public function DebitarSaldo($pdo, $userid, $valor, $motivo){

		$datas = date("Y-m-d H:i:s");
		
		$sql = "select saldo, (saldo - :valor) as soma from saldo where userid = :userid order by id DESC";
			
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->bindParam(":valor",$valor);
		$obj->execute();
		$linha = $obj->fetch(PDO::FETCH_ASSOC);

		$sqlb = "INSERT INTO saldo (userid, saldo, saldo_antigo,ganhos,registro) VALUES (:userid, :valorb, :antigo, '0.00','".$datas."')";
		$objb = $pdo->prepare($sqlb);
		$objb->bindParam(":userid",$userid);
		$objb->bindParam(":valorb",$linha['soma']);
		$objb->bindParam(":antigo",$linha['saldo']);
		$objb->execute();

		$sqlc = "INSERT INTO financas (userid, descricao, entrada,saida,registro) VALUES (:useridc, :motivo,'0.00', :valorc, '".$datas."')";
			
		$objc = $pdo->prepare($sqlc);
		$objc->bindParam(":useridc",$userid);
		$objc->bindParam(":valorc",$valor);
		$objc->bindParam(":motivo",$motivo);
		$objc->execute();

		return $objb;
			
		}

		public function pegaInvestimentos($pdo,$userid){

		$sql = "SELECT * FROM investimentos WHERE userid = :userid";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->execute();
		//$linha = $obj->fetch(PDO::FETCH_ASSOC);

		return $obj;


		}
		
		public function DesligaDoacao($pdo,$id, $userid){
			
			
			
		$datas = date("Y-m-d H:i:s");

		$sql = "UPDATE investimentos set ativacao='3', trava='0' WHERE id = :id";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":id",$id);
		$obj->execute();
		$linha = $obj->fetch(PDO::FETCH_ASSOC);
		$valor = $linha['valor'];
		
			
		$sqlb = "INSERT INTO saldo (userid, saldo, registro) VALUES (:userid, '0.00', '".$datas."')";
		$objb = $pdo->prepare($sqlb);
		$objb->bindParam(":userid",$userid);
		$objb->execute();

		$sqlc = "INSERT INTO financas (userid, descricao, entrada,saida,registro) VALUES (:useridc, 'Extorno de Investimento','0.00', :valorc, '".$datas."')";
			
		$objc = $pdo->prepare($sqlc);
		$objc->bindParam(":useridc",$userid);
		$objc->bindParam(":valorc",$valor);
		$objc->execute();
			
		$sqld = "select saldo, (saldo - :valor) as soma from saldoinvestimento where userid = :userid order by id DESC";
		$objd = $pdo->prepare($sqld);
		$objd->bindParam(":userid",$userid);
		$objd->bindParam(":valor",$valor);
		$objd->execute();
		$linhab = $objd->fetch(PDO::FETCH_ASSOC);

		$sqle = "INSERT INTO saldoinvestimento (userid, saldo, registro) VALUES (:userid, :valorb, '".$datas."')";
		$obje = $pdo->prepare($sqle);
		$obje->bindParam(":userid",$userid);
		$obje->bindParam(":valorb",$linhab['soma']);
		$obje->execute();
		

		return true;


		}
		
		public function LigaDoacao($pdo,$id, $userid){
			
		$datas = date("Y-m-d H:i:s");
		$datav = date('Y-m-d H:i:s', strtotime("+4 days"));

			
		$sqld = "SELECT * FROM investimentos WHERE id = :id";
        $objd = $pdo->prepare($sqld);
		$objd->bindParam(":id",$id);
        $objd->execute();
		$linha = $objd->fetch(PDO::FETCH_ASSOC);
		$valor = $linha['valor'];
			
		$sqle = "select saldo, (saldo - :valor) as soma from saldoinvestimento where userid = :userid order by id DESC";
		$obje = $pdo->prepare($sqle);
		$obje->bindParam(":userid",$userid);
		$obje->bindParam(":valor",$valor);
		$obje->execute();
		$linhab = $objde->fetch(PDO::FETCH_ASSOC);
		$soma = $linhab['soma'];$saldos = $linhab['saldo'];
			
		if($valor >= $saldos){
			
		$sqlf = "INSERT INTO saldoinvestimento (userid, saldo, registro) VALUES (:userid, :soma, '".$datas."')";
		$objf = $pdo->prepare($sqlf);
		$objf->bindParam(":userid",$userid);
		$objf->bindParam(":soma",$soma);
		$objf->execute();
			
		$sql = "UPDATE investimentos set ativacao='1', trava='1', datavencimento =:vencimento WHERE id = :id";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":id",$id);
		$obj->bindParam(":vencimento",$datav);
		$obj->execute();
		
			
		$sqlb = "INSERT INTO saldo (userid, saldo, registro) VALUES (:userid, '0.00', '".$datas."')";
		$objb = $pdo->prepare($sqlb);
		$objb->bindParam(":userid",$userid);
		$objb->execute();
			

		$sqlc = "INSERT INTO financas (userid, descricao, entrada,saida,registro) VALUES (:useridc, 'Retorno de Investimento','0.00', :valorc, '".$datas."')";
			
		$objc = $pdo->prepare($sqlc);
		$objc->bindParam(":useridc",$userid);
		$objc->bindParam(":valorc",$valor);
		$objc->execute();
		

		return true;
			
		}else{
			
			return false;
		
		}


		}

		public function addSaldoBloqueado($pdo,$iduser,$investimento,$valor){

		$datas = date('Y-m-d H:i:s');

		$sql = "SELECT saldo,userid FROM saldobloqueado WHERE userid = :userid order by id DESC";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$iduser);
		$obj->execute();
		$linha = $obj->fetch(PDO::FETCH_ASSOC);

		$sqlb = "INSERT INTO saldobloqueado (userid,saldo,registro) VALUES (:useridb,:saldo,'".$datas."')";
		$objb = $pdo->prepare($sqlb);
		$objb->bindParam(":useridb",$iduser);
		$objb->bindParam(":saldo",$valor);
		$objb->execute();

		$sqlc = "INSERT INTO financas (userid,descricao,entrada,saida,idinvestimento,registro) VALUES (:useridc,'Entrada de Saldo Bloqueado',:entrada,'0.00',:investimento,'".$datas."')";
		$objc = $pdo->prepare($sqlc);
		$objc->bindParam(":useridc",$iduser);
		$objc->bindParam(":entrada",$valor);
		$objc->bindParam(":investimento",$investimento);
		$objc->execute();

		return $obj;


		}

		public function valorinvestido($pdo,$userid){

			$datas = date('Y-m-d H:i:s');
	
			$sql = "SELECT SUM(valor) as soma FROM faturas WHERE userid = :userid ";
			$obj = $pdo->prepare($sql);
			$obj->bindParam(":userid",$userid);
			$obj->execute();

	
			return $obj;
	
	
		}

		public function valorganho($pdo,$userid){

			$datas = date('Y-m-d H:i:s');
	
			$sql = "SELECT SUM(entrada) as soma FROM financas WHERE userid = :userid ";
			$obj = $pdo->prepare($sql);
			$obj->bindParam(":userid",$userid);
			$obj->execute();

			return $obj;
	
		}

    }
?>