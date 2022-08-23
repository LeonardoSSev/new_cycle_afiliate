<?php
class Configuracoes{
	
    public function config($pdo, $id){
		
		$sql = "SELECT * FROM configuracoes WHERE id = :id ";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":id",$id);
		$obj->execute();
		
		return $obj;
	}

	public function pegarCriarreentrada($pdo, $id){
		
		$sql = "SELECT * FROM configuracoes WHERE id = :id ";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":id",$id);
		$obj->execute();
		$linha = $obj->fetch(PDO::FETCH_ASSOC);

		
		
		return $linha['habilitar'];
	}

	public function config1($pdo,$valor1){
		
		$sql = "UPDATE configuracoes SET valor1 = :valor1 ";
		
			
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":valor1",$valor1);
		$obj->execute();
		return $obj;
	}

    public function porcentagem($pdo, $valor, $porcentagem){
        
        $percentual = $porcentagem / 100.00; // 100%
        $valor_final = $valor - ($percentual * $valor);
        $ganhos = $valor - $valor_final;
		
		return $ganhos;
	}

	public function editarconfig1($pdo,$valor1,$upgrade1,$lateralidade1,$sustentabilidade1,$reentrada1,$id){

		$sql = "UPDATE configuracoes SET valor = :valor, upgrade = :upgrade, lateralidade = :lateralidade, sustentabilidade = :sustentabilidade,reentrada = :reentrada WHERE id = :id";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":reentrada",$reentradas1);
		$obj->bindParam(":valor",$valor1);
		$obj->bindParam(":upgrade",$upgrade1);
		$obj->bindParam(":lateralidade",$lateralidade1);
		$obj->bindParam(":sustentabilidade",$sustentabilidade1);
		$obj->bindParam(":reentrada",$reentrada1);
		$obj->bindParam(":id",$id);
		$obj->execute();

		return $obj;

	}

	public function editarconfig2($pdo,$valor1,$upgrade1,$lateralidade1,$sustentabilidade1,$reentrada1,$id){

		$sql = "UPDATE configuracoes SET valor = :valor, upgrade = :upgrade, lateralidade = :lateralidade, sustentabilidade = :sustentabilidade,reentrada = :reentrada WHERE id = :id";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":reentrada",$reentradas1);
		$obj->bindParam(":valor",$valor1);
		$obj->bindParam(":upgrade",$upgrade1);
		$obj->bindParam(":lateralidade",$lateralidade1);
		$obj->bindParam(":sustentabilidade",$sustentabilidade1);
		$obj->bindParam(":reentrada",$reentrada1);
		$obj->bindParam(":id",$id);
		$obj->execute();

		return $obj;

	}

	public function editarconfig3($pdo,$valor1,$upgrade1,$lateralidade1,$sustentabilidade1,$reentrada1,$id){

		$sql = "UPDATE configuracoes SET valor = :valor, upgrade = :upgrade, lateralidade = :lateralidade, sustentabilidade = :sustentabilidade,reentrada = :reentrada WHERE id = :id";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":reentrada",$reentradas1);
		$obj->bindParam(":valor",$valor1);
		$obj->bindParam(":upgrade",$upgrade1);
		$obj->bindParam(":lateralidade",$lateralidade1);
		$obj->bindParam(":sustentabilidade",$sustentabilidade1);
		$obj->bindParam(":reentrada",$reentrada1);
		$obj->bindParam(":id",$id);
		$obj->execute();

		return $obj;

	}

	public function editarconfig4($pdo,$valor1,$upgrade1,$lateralidade1,$sustentabilidade1,$reentrada1,$id){

		$sql = "UPDATE configuracoes SET valor = :valor, upgrade = :upgrade, lateralidade = :lateralidade, sustentabilidade = :sustentabilidade,reentrada = :reentrada WHERE id = :id";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":reentrada",$reentradas1);
		$obj->bindParam(":valor",$valor1);
		$obj->bindParam(":upgrade",$upgrade1);
		$obj->bindParam(":lateralidade",$lateralidade1);
		$obj->bindParam(":sustentabilidade",$sustentabilidade1);
		$obj->bindParam(":reentrada",$reentrada1);
		$obj->bindParam(":id",$id);
		$obj->execute();

		return $obj;

	}

	public function editarconfig5($pdo,$valor1,$upgrade1,$lateralidade1,$sustentabilidade1,$reentrada1,$id){

		$sql = "UPDATE configuracoes SET valor = :valor, upgrade = :upgrade, lateralidade = :lateralidade, sustentabilidade = :sustentabilidade,reentrada = :reentrada WHERE id = :id";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":reentrada",$reentradas1);
		$obj->bindParam(":valor",$valor1);
		$obj->bindParam(":upgrade",$upgrade1);
		$obj->bindParam(":lateralidade",$lateralidade1);
		$obj->bindParam(":sustentabilidade",$sustentabilidade1);
		$obj->bindParam(":reentrada",$reentrada1);
		$obj->bindParam(":id",$id);
		$obj->execute();

		return $obj;

	}

	public function editarconfig6($pdo,$valor1,$upgrade1,$lateralidade1,$sustentabilidade1,$reentrada1,$id){

		$sql = "UPDATE configuracoes SET valor = :valor, upgrade = :upgrade, lateralidade = :lateralidade, sustentabilidade = :sustentabilidade,reentrada = :reentrada WHERE id = :id";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":reentrada",$reentradas1);
		$obj->bindParam(":valor",$valor1);
		$obj->bindParam(":upgrade",$upgrade1);
		$obj->bindParam(":lateralidade",$lateralidade1);
		$obj->bindParam(":sustentabilidade",$sustentabilidade1);
		$obj->bindParam(":reentrada",$reentrada1);
		$obj->bindParam(":id",$id);
		$obj->execute();

		return $obj;

	}

	public function editarconfig7($pdo,$valor1,$upgrade1,$lateralidade1,$sustentabilidade1,$reentrada1,$id){

		$sql = "UPDATE configuracoes SET valor = :valor, upgrade = :upgrade, lateralidade = :lateralidade, sustentabilidade = :sustentabilidade,reentrada = :reentrada WHERE id = :id";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":reentrada",$reentradas1);
		$obj->bindParam(":valor",$valor1);
		$obj->bindParam(":upgrade",$upgrade1);
		$obj->bindParam(":lateralidade",$lateralidade1);
		$obj->bindParam(":sustentabilidade",$sustentabilidade1);
		$obj->bindParam(":reentrada",$reentrada1);
		$obj->bindParam(":id",$id);
		$obj->execute();

		return $obj;

	}

	public function editarconfig8($pdo,$valor1,$upgrade1,$lateralidade1,$sustentabilidade1,$reentrada1,$id){

		$sql = "UPDATE configuracoes SET valor = :valor, upgrade = :upgrade, lateralidade = :lateralidade, sustentabilidade = :sustentabilidade,reentrada = :reentrada WHERE id = :id";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":reentrada",$reentradas1);
		$obj->bindParam(":valor",$valor1);
		$obj->bindParam(":upgrade",$upgrade1);
		$obj->bindParam(":lateralidade",$lateralidade1);
		$obj->bindParam(":sustentabilidade",$sustentabilidade1);
		$obj->bindParam(":reentrada",$reentrada1);
		$obj->bindParam(":id",$id);
		$obj->execute();

		return $obj;

	}

	public function editarconfig9($pdo,$valor1,$habilitar1,$id){

		$sql = "UPDATE configuracoes SET valor = :valor,habilitar = :habilitar WHERE id = :id";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":valor",$valor1);
		$obj->bindParam(":habilitar",$habilitar1);
		$obj->bindParam(":id",$id);
		$obj->execute();

		return $obj;

	}

	public function editarconfig10($pdo,$habilitar10,$id){

		$sql = "UPDATE configuracoes SET habilitar = :habilitar WHERE id = :id";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":habilitar",$habilitar10);
		$obj->bindParam(":id",$id);
		$obj->execute();

		return $obj;

	}

	public function editarconfig11($pdo,$reentradas11,$data11,$hora11,$sustentabilidade11,$id){

		$sql = "UPDATE configuracoes SET reentrada = :reentrada, data = :data, hora = :hora, sustentabilidade = :sustentabilidade WHERE id = :id";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":reentrada",$reentradas11);
		$obj->bindParam(":data",$data11);
		$obj->bindParam(":hora",$hora11);
		$obj->bindParam(":sustentabilidade",$sustentabilidade11);
		$obj->bindParam(":id",$id);
		$obj->execute();

		return $obj;

	}

	public function editarconfig12($pdo,$habilitar12,$reentrada12,$id){

		$sql = "UPDATE configuracoes SET habilitar = :habilitar,reentrada = :reentrada WHERE id = :id";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":reentrada",$reentrada12);
		$obj->bindParam(":habilitar",$habilitar12);
		$obj->bindParam(":id",$id);
		$obj->execute();

		return $obj;

	}

	public function editarconfig13($pdo,$habilitar13,$motivo13,$id){

		$sql = "UPDATE configuracoes SET habilitar = :habilitar, motivo = :motivo WHERE id = :id";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":habilitar",$habilitar13);
		$obj->bindParam(":motivo",$motivo13);
		$obj->bindParam(":id",$id);
		$obj->execute();

		return $obj;

	}

	public function editarconfig14($pdo,$habilitar14,$id){

		$sql = "UPDATE configuracoes SET habilitar = :habilitar WHERE id = :id";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":habilitar",$habilitar14);
		$obj->bindParam(":id",$id);
		$obj->execute();

		return $obj;

	}

	public function editarconfig16($pdo,$habilitar16,$id){

		$sql = "UPDATE configuracoes SET habilitar = :habilitar WHERE id = :id";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":habilitar",$habilitar14);
		$obj->bindParam(":id",$id);
		$obj->execute();

		return $obj;

	}

	public function editarconfig17($pdo,$habilitar17,$id){

		$sql = "UPDATE configuracoes SET habilitar = :habilitar WHERE id = :id";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":habilitar",$habilitar17);
		$obj->bindParam(":id",$id);
		$obj->execute();

		return $obj;

	}

	public function permitirEmail($pdo,$id){

		$sql = "SELECT * FROM configuracoes WHERE id = :id";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":id",$id);
		$obj->execute();
		$linha = $obj->fetch(PDO::FETCH_ASSOC);

		return $linha['habilitar'];

	}

	public function configManutencao($pdo,$id){

		$sql = "SELECT * FROM configuracoes WHERE id = :id";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":id",$id);
		$obj->execute();
		$linha = $obj->fetch(PDO::FETCH_ASSOC);

		return $linha['habilitar'];

	}

	public function bloqueio($pdo,$id){

		$sql = "SELECT * FROM configuracoes WHERE id = :id";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":id",$id);
		$obj->execute();
		$linha = $obj->fetch(PDO::FETCH_ASSOC);

		return $linha['habilitar'];

	}

	public function senhamestra($pdo,$id){

		$sql = "SELECT * FROM configuracoes WHERE id = :id";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":id",$id);
		$obj->execute();
		$linha = $obj->fetch(PDO::FETCH_ASSOC);

		return $linha['motivo'];

	}

	public function PegaMibank($pdo,$id){

		$sql = "SELECT * FROM configuracoes WHERE id = :id";
		$obj = $pdo->prepare($sql);
		$obj->bindParam(":id",$id);
		$obj->execute();
		$linha = $obj->fetch(PDO::FETCH_ASSOC);

		return $linha['habilitar'];

	}

	

	

}