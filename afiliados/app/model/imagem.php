<?php
class Imagem {
	

    public function listaDocumentos($app, $userid){
		$sql = "SELECT doc1, doc2, situacao_doc1, situacao_doc2,motivo1,motivo2 FROM documentos where userid = :userid order by userid DESC";
		
        $obj = $app->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->execute();
		return $obj;
	}

	public function listarDocumentos($app){
		$sql = "SELECT documentos.id,documentos.registro,documentos.registro2,documentos.doc1, documentos.doc2, documentos.situacao_doc1, documentos.situacao_doc2,acesso.usuario,dadospessoais.nome FROM documentos,acesso,dadospessoais WHERE documentos.userid = acesso.userid AND acesso.userid = dadospessoais.userid  order by documentos.userid DESC";
		
        $obj = $app->prepare($sql);
		$obj->execute();
		return $obj;
	}

	public function listaComprovantes($app){
		$sql = "SELECT *,acesso.usuario,dadospessoais.nome FROM comprovantes,acesso,dadospessoais WHERE comprovantes.userid = acesso.userid AND acesso.userid = dadospessoais.userid  order by comprovantes.id DESC";
		
        $obj = $app->prepare($sql);
		$obj->execute();
		return $obj;
	}

	public function pegalistaAdmComprovantesPendentes($app){
		
		$sql = "SELECT *,acesso.usuario,dadospessoais.nome FROM comprovantes,acesso,dadospessoais WHERE comprovantes.userid = acesso.userid AND acesso.userid = dadospessoais.userid AND comprovantes.ativacao='0'  order by comprovantes.id DESC";
		$obj = $app->prepare($sql);
		$obj->execute();
		return $obj;
	}

	public function pegalistaAdmComprovantesAprovados($app){
		
		$sql = "SELECT *,acesso.usuario,dadospessoais.nome FROM comprovantes,acesso,dadospessoais WHERE comprovantes.userid = acesso.userid AND acesso.userid = dadospessoais.userid AND comprovantes.ativacao='1'  order by comprovantes.id DESC";
		$obj = $app->prepare($sql);
		$obj->execute();
		return $obj;
	}

	public function pegaComprovantesPendentes($app,$userid){
		
		$sql = "SELECT *,acesso.usuario,dadospessoais.nome FROM comprovantes,acesso,dadospessoais WHERE comprovantes.userid = acesso.userid AND acesso.userid = dadospessoais.userid AND comprovantes.ativacao='0' AND comprovantes.useridb = :userid  order by comprovantes.id DESC";
		$obj = $app->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->execute();
		return $obj;
	}

	public function pegaComprovantesAprovados($app,$userid){
		
		$sql = "SELECT *,acesso.usuario,dadospessoais.nome FROM comprovantes,acesso,dadospessoais WHERE comprovantes.userid = acesso.userid AND acesso.userid = dadospessoais.userid AND comprovantes.ativacao='1' AND comprovantes.useridb = :userid  order by comprovantes.id DESC";
		$obj = $app->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->execute();
		return $obj;
	}


	public function pegaDoacoesRecebidas($app,$userid){
		
		$sql = "SELECT pagamentos.id,pagamentos.useridb,pagamentos.valor,acesso.usuario,dadospessoais.nome FROM pagamentos,acesso,dadospessoais WHERE pagamentos.userid = acesso.userid AND acesso.userid = dadospessoais.userid AND pagamentos.ativacao='1' AND pagamentos.useridb = :userid  order by pagamentos.id DESC";
		$obj = $app->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->execute();
		return $obj;
	}

	public function pegaDoacoesFeitas($app,$userid){
		
		$sql = "SELECT pagamentos.id,pagamentos.useridb,pagamentos.valor,acesso.usuario,dadospessoais.nome FROM pagamentos,acesso,dadospessoais WHERE pagamentos.userid = acesso.userid AND acesso.userid = dadospessoais.userid AND pagamentos.ativacao='1' AND pagamentos.userid = :userid  order by pagamentos.id DESC";
		$obj = $app->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->execute();
		return $obj;
	}

	public function aprovarDocumentos1($app, $id){

		$datas = date("Y-m-d H:i:s");
        	
		$sql = "UPDATE documentos set situacao_doc1 = '1', dataativacao = :data WHERE id = :id";
		
        $obj = $app->prepare($sql);
		$obj->bindParam(":id",$id);
		$obj->bindParam(":data",$datas);
		$obj->execute();
		return $obj;
	}

	public function aprovarDocumentos2($app, $id){
		
		$datas = date("Y-m-d H:i:s");
		
		$sql = "UPDATE documentos set situacao_doc2 = '1', dataativacao2 = '".$datas."' WHERE id = :id";
		
        $obj = $app->prepare($sql);
		$obj->bindParam(":id",$id);
		$obj->execute();
		return $obj;
	}

	public function reprovarDocumentos1($app, $id, $motivo){
		$sql = "UPDATE documentos set situacao_doc1 = '3', motivo1 = :motivo WHERE id = :id";
		
        $obj = $app->prepare($sql);
		$obj->bindParam(":id",$id);
		$obj->bindParam(":motivo",$motivo);
		$obj->execute();
		return $obj;
	}

	public function reprovarDocumentos2($app, $id, $motivo){
		
		$sql = "UPDATE documentos set situacao_doc2 = '3', motivo2 = :motivo WHERE id = :id";
		
        $obj = $app->prepare($sql);
		$obj->bindParam(":id",$id);
		$obj->bindParam(":motivo",$motivo);
		$obj->execute();
		return $obj;

	}

	 public function VerDocumentos($app, $id){
		$sql = "SELECT id,doc1, doc2, situacao_doc1, situacao_doc2 FROM documentos where id = :id order by id DESC";
		
        $obj = $app->prepare($sql);
		$obj->bindParam(":id",$id);
		$obj->execute();
		return $obj;
	}

	public function pegaFotos($app, $userid){
		$sql = "SELECT fotos FROM acesso where userid = :userid";
		
        $obj = $app->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->execute();
		return $obj;
	}

	public function pegaComprovantes($app, $userid, $id){

		$sql = "SELECT * FROM pagamentos where userid = :userid AND id = :id ";
        $obj = $app->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->bindParam(":id",$id);
		$obj->execute();
		return $obj;
	}

	public function pegaAdmComprovantes($app,  $id){

		$sql = "SELECT * FROM pagamentos where  id = :id ";
        $obj = $app->prepare($sql);
		$obj->bindParam(":id",$id);
		$obj->execute();
		return $obj;
	}

	public function pegaListaComprovantes($app, $userid){

		$sql = "SELECT * FROM comprovantes where userid = :userid";
		
        $obj = $app->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->execute();
		return $obj;
	}

	
    public function mandarDocumentos($app, $userid, $doc1, $doc2){
		
		$datas = date("Y-m-d H:i:s");
		
		$sql = "insert into documentos (userid,doc1,doc2,situacao_doc1,situacao_doc2,registro) VALUES (:userid,:doc1,:doc2,'0','0','".$datas."')";
		
        $obj = $app->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->bindParam(":doc1",$doc1);
		$obj->bindParam(":doc2",$doc2);
		$obj->execute();
		return $obj;
	}

	public function mandarComprovante($app,$userid, $img, $id){
		
		$datas = date("Y-m-d H:i:s");

		$sql = "SELECT * FROM pagamentos WHERE id = :id";
		$obj = $app->prepare($sql);
		$obj->bindParam(":id",$id);
		$obj->execute();
		$linha = $obj->fetch(PDO::FETCH_ASSOC);
		$useridb = $linha['useridb'];

		$sql1 = "SELECT * FROM comprovantes WHERE idfatura = :id";
		$obj1 = $app->prepare($sql1);
		$obj1->bindParam(":id",$id);
		$obj1->execute();
		$contagem = $obj1->rowCount();	

		if($contagem == '0'){
		
			$sqlb = "insert into comprovantes(userid,useridb,imagem,idfatura,registro) VALUES (:userid, :useridb, :img, :idb,'".$datas."')";
			$objb = $app->prepare($sqlb);
			$objb->bindParam(":userid",$userid);
			$objb->bindParam(":useridb",$useridb);
			$objb->bindParam(":img",$img);
			$objb->bindParam(":idb",$id);
			$objb->execute();

		return $objb;

		}else{

			$sqlb = "UPDATE comprovantes SET userid = :userid1, useridb = :useridb1, imagem = :img1, registro = :datas";
			$objb = $app->prepare($sqlb);
			$objb->bindParam(":userid1",$userid);
			$objb->bindParam(":useridb1",$useridb);
			$objb->bindParam(":img1",$img);
			$objb->bindParam(":datas",$datas);
			$objb->execute();

			return $objb;

		}
	}

	public function editarDocumentos($app, $userid, $doc1){
		
		
		$sql = "update documentos set doc1 = :doc1, situacao_doc1 = '2' where userid = :userid ";
		
		
        $obj = $app->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->bindParam(":doc1",$doc1);
		$obj->execute();
		return $obj;
	}

	public function editarDocumentos2($app, $userid, $doc2){
		
		
		$sql = "update documentos set doc2 = :doc2, situacao_doc2 = '2' where userid = :userid ";
		
		
        $obj = $app->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->bindParam(":doc2",$doc2);
		$obj->execute();
		return $obj;
	}

	
	public function excluirComprovante($app, $id){

		$sql = "DELETE FROM comprovantes WHERE id = :id ";
		
        $obj = $app->prepare($sql);
		$obj->bindParam(":id",$userid);
		$obj->execute();
		return $obj;
	}

	public function ativarComprovante($app, $id){

		$sql = "UPDATE comprovantes SET ativacao = '1' WHERE id = :id ";
		$obj = $app->prepare($sql);
		$obj->bindParam(":id",$id);
		$obj->execute();

		$sqlb = "SELECT * FROM comprovantes WHERE id = :idb ";
		
        $objb = $app->prepare($sqlb);
		$objb->bindParam(":idb",$id);
		$objb->execute();
		$linha = $objb->fetch(PDO::FETCH_ASSOC);

		return $linha['idfatura'];
	}

	public function reprovarComprovante($app, $id){

		$sql = "UPDATE comprovantes SET ativacao = '3' WHERE id = :id ";
		$obj = $app->prepare($sql);
		$obj->bindParam(":id",$id);
		$obj->execute();

		return $obj;
	}

	

	public function editarFotos($app, $userid, $fotos){
		$sql = "update acesso set fotos = :fotos where userid = :userid ";
		
        $obj = $app->prepare($sql);
		$obj->bindParam(":userid",$userid);
		$obj->bindParam(":fotos",$fotos);
		$obj->execute();
		
		return $obj;
	}
	
	public function FazerDownload($pdo,$userid,$idcomprovante){
		
		print "<script>alert('$userid - $idcomprovante');</script>";
		
		$sqlb = "SELECT * FROM pagamentos WHERE id = :idb AND useridb = :userid";
        $objb = $pdo->prepare($sqlb);
		$objb->bindParam(":idb",$idcomprovante);
		$objb->bindParam(":userid",$userid);
		$objb->execute();
		$linha = $objb->fetch(PDO::FETCH_ASSOC);
		$comprovante = $linha['comprovantes'];
		
		$url = 'http://localhost/btvnova/afiliado/comprovantes/'.$comprovante;
		
		$imagename= basename($url);
		
		$headers[] = 'Accept: image/gif, image/x-bitmap, image/jpeg, image/pjpeg';              
		$headers[] = 'Connection: Keep-Alive';         
		$headers[] = 'Content-type: application/x-www-form-urlencoded;charset=UTF-8';         
		$user_agent = 'php';         
		$process = curl_init($url);         
		curl_setopt($process, CURLOPT_HTTPHEADER, $headers);         
		curl_setopt($process, CURLOPT_HEADER, 0);         
		curl_setopt($process, CURLOPT_USERAGENT, $useragent);         
		curl_setopt($process, CURLOPT_TIMEOUT, 30);         
		curl_setopt($process, CURLOPT_RETURNTRANSFER, 1);         
		curl_setopt($process, CURLOPT_FOLLOWLOCATION, 1);         
		$return = curl_exec($process);         
		curl_close($process);  
		
		file_put_contents('./'.$imagename,$return); 
		
		//return $return;     
		
	}

	

}