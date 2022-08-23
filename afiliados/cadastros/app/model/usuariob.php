<?php
class Usuariob {
	public function getUsuarioLoginSenha($pdo, $usuario, $senha){
		$obj = $pdo->prepare("SELECT 
								userid,
								usuario
							FROM 
								acesso
							WHERE 
								usuario = :usuario AND
								senha = :senha ");
		
		$obj->bindParam(":usuario",$usuario);
		$obj->bindParam(":senha",$senha);
		
		return ($obj->execute()) ? $obj->fetch(PDO::FETCH_OBJ) : false;
		
	}

	public function permissao($pdo, $usuario){
		$obj = $pdo->prepare("SELECT 
								userid,
								usuario,
								bloqueio
							FROM 
								acesso
							WHERE 
								usuario = :usuario ");
		
		$obj->bindParam(":usuario",$usuario);
		$obj->execute();
		$linha = $obj->fetch(PDO::FETCH_ASSOC);

		return $linha['bloqueio'];
		
	}
	
	public function getUsuarioLogin($pdo, $usuario){
		$obj = $pdo->prepare("SELECT 
								userid,
								usuario
							FROM 
								acesso
							WHERE 
								usuario = :usuario  ");
		
		$obj->bindParam(":usuario",$usuario);
		
		return ($obj->execute()) ? $obj->fetch(PDO::FETCH_OBJ) : false;
		
	}

	public function recuperaSenha($pdo, $emailb, $usuario){
		
		$sql = "SELECT acesso.userid,acesso.usuario,dadospessoais.email, dadospessoais.nome FROM acesso,dadospessoais WHERE acesso.usuario = :usuario AND dadospessoais.email = :emailb";	
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":email",$emailb);
		$obj->bindParam(":usuario",$usuario);
		$obj->execute();
		$linha = $obj->fetch(PDO::FETCH_ASSOC);
		$email = $linha['email'];$nome = $linha['nome'];

	

		$bash = hash("md5",$usuario);

		$sql1 = "UPDATE acesso SET bash = :bash WHERE usuario = :usuario";	
		$obj1 = $pdo->prepare($sql1);
		$obj1->bindParam(":bash",$bash);
		$obj1->bindParam(":usuario",$usuario);
		$obj1->execute();

		$total = $obj->rowCount();
		
		if($obj){

			$assunto = 'RECUPERAÇÃO DE SENHA';
			$mensagem = 'CLIQUE ABAIXO NO LINK GERADO';
			

		 $to = "$emailb";
        $subject = $assunto;

        $message = "
<html>
    <head>
        <title>SISTEMA FORCE RUSH</title>
    </head>
    <body style='background-color: #fafafa; color: black !important'>
        <div style='width:700px; background: #ffffff; border: 1px solid #dddddd; border-radius: 3px; padding: 20px;margin-left: auto; margin-right: auto; '>
            <div style='text-align: center; font-size:33px;'>Olá, <div style='font-weight: bolder;'>$nome</div></div>
            
            <div style='text-align: center; padding:20px;margin-top:15px;'>
              <!--  <img src='https://administerinvestments.com/afiliado/images/logo.png' width='150' height='60'>-->
            </div>
          
            <div style='padding:20px 0 25px;text-align:center;color:#ffffff'>
            <a href='#' style='color:#ffffff;text-decoration:none;display:inline-block;text-align:center;background:#4183c4;background-color:#4183c4;border-radius:5px;padding:12px 44px;font-weight:bold;letter-spacing:normal;font-size:17px; margin:0 auto;width:auto!important' target='_blank'>RECUPERAR SENHA</a>
            </div>
           
        </div>
    </body>
</html>
";

        $message = utf8_decode($message);

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: <noreply@forcerush.com>' . "\r\n";

        mail($to, $subject, $message, $headers);
			
			return true;

		}else{
			return false;
		}



		
	}

	public function pegaBash($pdo,$bash){

		$sql = "SELECT bash FROM acesso WHERE bash = :bash";	
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":bash",$bash);
		$obj->execute();

		$total = $obj->rowCount();

		return $total;

	}

	public function recuperaalteraSenha($pdo, $bash, $senha){

		$sql = "UPDATE acesso SET senha = :senha WHERE bash = :bash";	
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":senha",$senha);
		$obj->bindParam(":bash",$bash);
		$obj->execute();

		return $obj;

	}

	public function excluirUsuarios($pdo, $userid){
		
		
		$sql = "DELETE FROM acesso  WHERE userid = :userid";
		
			
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->execute();

		$sqlb = "DELETE FROM dadospessoais  WHERE userid = :useridb";
		
			
		$objb = $pdo->prepare($sqlb);
		$objb->bindParam(":useridb",$userid);
		$objb->execute();
		return $obj;
	}

	
	public function pegaNivel($pdo, $userid){

		 $sql = "SELECT admin FROM acesso WHERE userid = :userid";
		
        $obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->execute();
		$linha = $obj->fetch(PDO::FETCH_ASSOC);

		return $linha['admin'];

	}

	public function listaUsuarios($pdo){

		$sql = "SELECT acesso.userid,acesso.ativacao,acesso.usuario,dadospessoais.nome,dadospessoais.email,dadospessoais.whatsapp FROM acesso,dadospessoais WHERE acesso.userid = dadospessoais.userid";
		$obj = $pdo->prepare($sql);
		$obj->execute();

		return $obj;

	}
	
	public function listaUsuariosAtivos($pdo){

		 $sql = "SELECT acesso.userid,acesso.usuario,dadospessoais.nome,dadospessoais.email,dadospessoais.whatsapp FROM acesso,dadospessoais WHERE acesso.userid = dadospessoais.userid AND acesso.ativacao='1'";
		
        $obj = $pdo->prepare($sql);
		$obj->execute();
		return $obj;

	}
	
	public function listaUsuariosPendentes($pdo){

		 $sql = "SELECT acesso.userid,acesso.usuario,dadospessoais.nome,dadospessoais.email,dadospessoais.whatsapp FROM acesso,dadospessoais WHERE acesso.userid = dadospessoais.userid  AND acesso.ativacao='0'";
		
        $obj = $pdo->prepare($sql);
		$obj->execute();
		return $obj;

	}

	public function pegaUsuarios($pdo,$login,$email){
		
		

		 $sql = "SELECT acesso.userid,acesso.usuario,dadospessoais.email FROM acesso,dadospessoais WHERE acesso.usuario = :login AND dadospessoais.email=:email AND dadospessoais.userid = acesso.userid";
		
        $obj = $pdo->prepare($sql);
		$obj->bindParam(":login",$login);
		$obj->bindParam(":email",$email);
		$obj->execute();
		$linha = $obj->fetch(PDO::FETCH_ASSOC);
		return $linha['userid'];

	}

	public function listaDiretospendentes($pdo,$userid){

		 $sql = "SELECT acesso.userid,acesso.usuario,dadospessoais.nome,dadospessoais.email,dadospessoais.whatsapp FROM acesso,dadospessoais WHERE acesso.sponsorid = :userid AND acesso.userid = dadospessoais.userid AND acesso.ativacao='0'";
		
        $obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->execute();
		return $obj;

	}

    public function listaDiretosativos($pdo, $userid){

	 $sql = "SELECT acesso.userid,acesso.usuario,dadospessoais.nome,dadospessoais.email,dadospessoais.whatsapp FROM acesso,dadospessoais WHERE acesso.sponsorid = :userid AND acesso.userid = dadospessoais.userid AND acesso.ativacao='1'";
		
        $obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->execute();
		return $obj;

	}

	public function listaDados($pdo, $userid){
		
		$sql = "SELECT * FROM dadospessoais WHERE userid = :userid  ";
		
			
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->execute();
		return $obj;
	}

	public function pegaDados($pdo, $userid){
		
		$sql = "SELECT * FROM dadospessoais WHERE userid = :userid  ";
		
			
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->execute();
		$linha = $obj->fetch(PDO::FETCH_ASSOC);

		return $linha;
	}

	public function pegaDadosheader($pdo, $userid){
		
		$sql = "SELECT * FROM dadospessoais WHERE userid = :userid  ";
		
			
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->execute();

		return $obj;
	}

	public function listaAdmDados($pdo, $userid){
		
		$sql = "SELECT *,acesso.usuario,acesso.senha,acesso.senhafinanceira FROM dadospessoais,acesso WHERE acesso.userid = dadospessoais.userid AND dadospessoais.userid = :userid  ";
		
			
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->execute();
		return $obj;
	}

	public function pegaDadosBancarios($pdo, $userid){
		
		$sql = "SELECT * FROM dadosbancarios WHERE userid = :userid   ";
		
			
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->execute();
		return $obj;
	}

	public function confereSenha($pdo,$senha, $userid){
		
		$sql = "SELECT * FROM acesso WHERE userid = :userid AND senha = :senha  ";
		
			
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->bindParam(":senha",$senha);
		$obj->execute();
		return $obj;
	}

	public function AdmalteraSenha($pdo,$senha, $userid){
		
		$sql = "UPDATE acesso SET senha = :senha WHERE userid = :userid ";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->bindParam(":senha",$senha);
		$obj->execute();

		return $obj;
	}

	public function alteraSenha($pdo,$senha, $userid){
		
		$sql = "UPDATE acesso SET senha = :senha WHERE userid = :userid ";
		
			
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->bindParam(":senha",$senha);
		$obj->execute();
		return $obj;
	}

	public function confereSenhaFinanceira($pdo,$senha, $userid){
		
		$sql = "SELECT * FROM acesso WHERE userid = :userid AND senhafinanceira = :senha  ";
		
			
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->bindParam(":senha",$senha);
		$obj->execute();
		return $obj;
	}

	public function alteraSenhaFinanceira($pdo,$senha, $userid){
		
		$sql = "UPDATE acesso SET senhafinanceira = :senha WHERE userid = :userid ";
		
			
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->bindParam(":senha",$senha);
		$obj->execute();
		return $obj;
	}

	public function pegaVerDadosBancarios($pdo, $userid, $id){
		
		$sql = "SELECT * FROM dadosbancarios WHERE userid = :userid AND id = :id ";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->bindParam(":id",$id);
		$obj->execute();

		return $obj;
	}

	public function pegaAdmVerDadosBancarios($pdo, $id){
		
		$sql = "SELECT * FROM dadosbancarios WHERE  id = :id ";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":id",$id);
		$obj->execute();

		return $obj;
	}
	

	public function pegaSenhaFinanceira($pdo, $userid, $senhafinanceira){
		
		$sql = "SELECT senhafinanceira FROM acesso WHERE userid = :userid AND senhafinanceira = :senhafinanceira";
		
			
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->bindParam(":senhafinanceira",$senhafinanceira);
		$obj->execute();
		return $obj;
	}

	public function adicionarDadosBancarios($pdo, $banco,$agencia, $conta, $tipoconta,  $cpftitular,$nometitular, $operacao,  $userid){
		$datas = date("Y-m-d H:i:s");
		
		$sql = "INSERT into dadosbancarios (banco,agencia,conta,tipoconta, registro,cpftitular,nometitular,operacao, userid) values (?,?,?,?,'".$datas."',?,?,?,?)";
		$obj = $pdo->prepare($sql);
		$obj->execute(array($banco,$agencia,$conta,$tipoconta, $cpftitular,$nometitular,$operacao,$userid));
		
		return ($obj) ? $obj : false;
	}

	public function excluirDadosBancarios($pdo,  $id){
		
		$sql = "DELETE FROM dadosbancarios WHERE id = :id";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":id",$id);
		$obj->execute();
		
		return ($obj) ? $obj : false;
	}

	public function editarDadosBancarios($pdo, $banco, $agencia, $conta, $tipoconta, $operacao, $nometitular, $cpftitular, $i, $userid){
		
		$sql = "UPDATE dadosbancarios SET banco = :banco, agencia = :agencia, conta =:conta, tipoconta = :tipoconta, operacao = :operacao, nometitular = :nometitular, cpftitular = :cpftitular  WHERE id= :id AND userid = :userid";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":id",$i);
		$obj->bindParam(":userid",$userid);
		$obj->bindParam(":banco",$banco);
		$obj->bindParam(":agencia",$agencia);
		$obj->bindParam(":conta",$conta);
		$obj->bindParam(":tipoconta",$tipoconta);
		$obj->bindParam(":operacao",$operacao);
		$obj->bindParam(":nometitular",$nometitular);
		$obj->bindParam(":cpftitular",$cpftitular);
		$obj->execute();
		
		return ($obj) ? $obj : false;
	}

	public function AdmeditarDadosBancarios($pdo, $banco, $agencia, $conta, $tipoconta, $operacao, $nometitular, $cpftitular, $i){
		
		$sql = "UPDATE dadosbancarios SET banco = :banco, agencia = :agencia, conta =:conta, tipoconta = :tipoconta, operacao = :operacao, nometitular = :nometitular, cpftitular = :cpftitular  WHERE id = :id";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":id",$i);
		$obj->bindParam(":banco",$banco);
		$obj->bindParam(":agencia",$agencia);
		$obj->bindParam(":conta",$conta);
		$obj->bindParam(":tipoconta",$tipoconta);
		$obj->bindParam(":operacao",$operacao);
		$obj->bindParam(":nometitular",$nometitular);
		$obj->bindParam(":cpftitular",$cpftitular);
		$obj->execute();
		
		return ($obj) ? $obj : false;
	}

	public function cadastrarUsuario($pdo,  $nome, $email, $celular,$cpf,$rua,$numero,$complemento,$bairro,$cidade,$datanasc, $whatsapp,$cep, $usuario, $senha, $senhaf){
		
		$datas = date("Y-m-d H:i:s");

		$sql = "INSERT INTO acesso (usuario,senha,senhafinanceira,registro) VALUES (:usuario,:senha,:senhaf,'".$datas."')";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":usuario",$usuario);
		$obj->bindParam(":senha",$senha);
		$obj->bindParam(":senhaf",$senhaf);
		$obj->execute();

		$sqlb = "SELECT * FROM acesso WHERE usuario = :usuariob AND senha = :senhab";
		$objb = $pdo->prepare($sqlb);
		$objb->bindParam(":usuariob",$usuario);
		$objb->bindParam(":senhab",$senha);
		$objb->execute();
		$linha = $objb->fetch(PDO::FETCH_ASSOC);

		
		$sqlc = "INSERT INTO dadospessoais (userid,nome,nascimento,whatsapp,email,celular,cpf,cep,complemento,numero,rua,bairro,cidade,registro) VALUES (:useridc,:nome,:datanasc,:whatsapp,:email,:celular,:cpf,:cep,:complemento,:numero,:rua,:bairro,:cidade,'".$datas."')";
		$objc = $pdo->prepare($sqlc);
		$objc->bindParam(":useridc",$linha['userid']);
		$objc->bindParam(":nome",$nome);
		$objc->bindParam(":email",$email);
		$objc->bindParam(":datanasc",$datanasc);
		$objc->bindParam(":whatsapp",$whatsapp);
		$objc->bindParam(":complemento",$complemento);
		$objc->bindParam(":numero",$numero);
		$objc->bindParam(":celular",$celular);
		$objc->bindParam(":cpf",$cpf);
		$objc->bindParam(":cep",$cep);
		$objc->bindParam(":rua",$rua);
		$objc->bindParam(":bairro",$bairro);
		$objc->bindParam(":cidade",$cidade);
		$objc->execute();

		$sqld = "INSERT INTO saldo (userid,registro) VALUES (:useridd,'".$datas."')";
		$objd = $pdo->prepare($sqld);
		$objd->bindParam(":useridd",$linha['userid']);
		$objd->execute();

		$sqle = "INSERT INTO documentos (userid) VALUES (:useride)";
		$obje = $pdo->prepare($sqle);
		$obje->bindParam(":useride",$linha['userid']);
		$obje->execute();

		$sqlf = "INSERT INTO saldobloqueado (userid,registro) VALUES (:useridf,'".$datas."')";
		$objf = $pdo->prepare($sqlf);
		$objf->bindParam(":useridf",$linha['userid']);
		$objf->execute();
		
		return $linha['userid'];
		
	}

	public function cadastrarUsuarioAdmin($pdo,  $nome,  $email,$celular, $cpf, $mibank, $usuario, $senha, $i){
		
		$datas = date("Y-m-d H:i:s");

		$sql = "INSERT INTO acesso (usuario,senha,registro) VALUES (:usuario,:senha,'".$datas."')";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":usuario",$usuario);
		$obj->bindParam(":senha",$senha);
		$obj->execute();

		$sqlb = "SELECT * FROM acesso WHERE usuario = :usuariob AND senha = :senhab";
		$objb = $pdo->prepare($sqlb);
		$objb->bindParam(":usuariob",$usuario);
		$objb->bindParam(":senhab",$senha);
		$objb->execute();
		$linha = $objb->fetch(PDO::FETCH_ASSOC);

		
		$sqlc = "INSERT INTO dadospessoais (userid,nome,registro) VALUES (:useridc,:nome,'".$datas."')";
		$objc = $pdo->prepare($sqlc);
		$objc->bindParam(":useridc",$linha['userid']);
		$objc->bindParam(":nome",$nome);
		$objc->execute();

		$sqld = "INSERT INTO saldo (userid,registro) VALUES (:useridd,'".$datas."')";
		$objd = $pdo->prepare($sqld);
		$objd->bindParam(":useridd",$linha['userid']);
		$objd->execute();

		$sqle = "INSERT INTO documentos (userid) VALUES (:useride)";
		$obje = $pdo->prepare($sqle);
		$obje->bindParam(":useride",$linha['userid']);
		$obje->execute();

		$sqlf = "INSERT INTO saldobloqueado (userid,registro) VALUES (:useridf,'".$datas."')";
		$objf = $pdo->prepare($sqlf);
		$objf->bindParam(":useridf",$linha['userid']);
		$objf->execute();
		
		$sqlg = "INSERT INTO dadosbancarios (userid,banco,mibank,registro) VALUES (:useridc,'mibank',:mibank,'".$datas."')";
		$objg = $pdo->prepare($sqlg);
		$objg->bindParam(":useridc",$linha['userid']);
		$objg->bindParam(":mibank",$mibank);
		$objg->execute();
		
		return $linha['userid'];
		
	}

	public function alteraDadosUsuario($pdo, $nome, $email, $whatsapp, $cpf, $userid){
		$sql = "UPDATE dadospessoais SET nome=?, email=?, whatsapp=?, cpf=? WHERE userid=?";
		$obj = $pdo->prepare($sql);
		$obj->execute(array($nome,$email,$whatsapp,$cpf,$userid));
		
		return ($obj) ? $obj : false;
		
	}

	public function alteraAdmDadosUsuario($pdo, $nome, $email, $celular,$cpf,$usuario,$senha,$userid){
		
		$sql = "UPDATE dadospessoais SET nome=?, email=?, whatsapp=?,cpf=? WHERE userid=?";
		$obj = $pdo->prepare($sql);
		$obj->execute(array($nome,$email,$celular,$cpf,$userid));

		
		if($senha != "d41d8cd98f00b204e9800998ecf8427e"){
		$sqlb = "UPDATE acesso SET  senha = :senha WHERE userid=:userid";
		$objb = $pdo->prepare($sqlb);
		$objb->bindParam(":userid",$userid);
		$objb->bindParam(":senha",$senha);
		$objb->execute();
		}

	
		$sqld = "UPDATE acesso SET usuario=:usuario WHERE userid=:useridc";
		$objd = $pdo->prepare($sqld);
		$objd->bindParam(":usuario",$usuario);
		$objd->bindParam(":useridc",$userid);
		$objd->execute();
		
		
		return ($objd) ? $objd : false;
		
	}
	
	public function VerTrava($pdo, $userid){
		
		$sql = "UPDATE dadospessoais SET nome=?, email=?, whatsapp=?,cpf=? WHERE userid=?";
		$obj = $pdo->prepare($sql);
		$obj->execute(array($nome,$email,$celular,$cpf,$userid));

		
		if($senha != "d41d8cd98f00b204e9800998ecf8427e"){
		$sqlb = "UPDATE acesso SET  senha = :senha WHERE userid=:userid";
		$objb = $pdo->prepare($sqlb);
		$objb->bindParam(":userid",$userid);
		$objb->bindParam(":senha",$senha);
		$objb->execute();
		}

	
		$sqld = "UPDATE acesso SET usuario=:usuario WHERE userid=:useridc";
		$objd = $pdo->prepare($sqld);
		$objd->bindParam(":usuario",$usuario);
		$objd->bindParam(":useridc",$userid);
		$objd->execute();
		
		
		return ($objd) ? $objd : false;
		
	}

	public function ativarUsuario($pdo, $userid){
		
		$sql = "UPDATE acesso set ativacao='1' WHERE userid = :userid  ";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->execute();
		return $obj;
	}
	
	public function desativarUsuario($pdo, $userid){
		
		$sql = "UPDATE acesso set ativacao='0' WHERE userid = :userid  ";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->execute();
		return $obj;
	}

	public function pegaAtivacao($pdo,$userid){
		
		$sql = "SELECT * FROM acesso WHERE userid = :userid  ";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->execute();
		$linha = $obj->fetch(PDO::FETCH_ASSOC);

		return $linha['ativacao'];
	}

	public function listaUsuariosAtivosb($pdo){

		$sql = "SELECT *,dadospessoais.email FROM acesso,dadospessoais WHERE acesso.ativacao='1' AND acesso.bloqueio='0' AND acesso.userid = dadospessoais.userid";
		$obj = $pdo->prepare($sql);
		$obj->execute();
		
		return $obj;

	}

	public function MandarEmail($pdo, $emailb){
		
		$sql = "SELECT dadospessoais.email, dadospessoais.nome FROM dadospessoais WHERE  dadospessoais.email = :email";	
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":email",$emailb);
		$obj->execute();
		$linha = $obj->fetch(PDO::FETCH_ASSOC);
		$email = $linha['email'];$nome = $linha['nome'];


			$assunto = 'GERACAO DE REENTRADA';
			$mensagem = 'Uma Reentrada fora gerado no sistema AJUDA MUTUA MANUAL';
			

		 $to = "$emailb";
        $subject = $assunto;

        $message = "
<html>
    <head>
        <title>AJUDA MUTUA MANUAL</title>
    </head>
    <body style='background-color: #fafafa; color: black !important'>
        <div style='width:700px; background: #ffffff; border: 1px solid #dddddd; border-radius: 3px; padding: 20px;margin-left: auto; margin-right: auto; '>
            <div style='text-align: center; font-size:33px;'>Olá, <div style='font-weight: bolder;'>$nome</div></div>
            
            <div style='text-align: center; padding:20px;margin-top:15px;'>
              <!--  <img src='https://administerinvestments.com/afiliado/images/logo.png' width='150' height='60'>-->
            </div>
          
            <div style='padding:20px 0 25px;text-align:center;color:#ffffff'>
            <a href='http://ajudamutuamanual.com' style='color:#ffffff;text-decoration:none;display:inline-block;text-align:center;background:#4183c4;background-color:#4183c4;border-radius:5px;padding:12px 44px;font-weight:bold;letter-spacing:normal;font-size:17px; margin:0 auto;width:auto!important' target='_blank'>FAZER LOGIN</a>
            </div>
           
        </div>
    </body>
</html>
";

        $message = utf8_decode($message);

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: <noreply@ajudamutuamanual.com>' . "\r\n";

        mail($to, $subject, $message, $headers);
			
			return true;
	
	}

	public function pegaCPF($pdo,$userid){

		$sql = "SELECT * FROM dadospessoais WHERE userid = :userid";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->execute();
		$linha = $obj->fetch(PDO::FETCH_ASSOC);

		return $linha['cpf'];
	}

	

}