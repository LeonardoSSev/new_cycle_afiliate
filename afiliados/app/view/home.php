<?php
$app = new App();
$user = $app->loadModel("Bancarios");
$cotacao = $app->loadModel("Cotacao");
$data1 = date("Y-m-d");
$datas = date("H");
$dolar = $cotacao->pegaCotacaoBRL();
$qtdereentradas = $param['dados']['qtdereentrada'];
$habilitar = $user->pegaLinkIndicacao($app->conexao);
$pegaupline = $user->pegaUpline($app->conexao, $_SESSION['userid']);
$pegaup = $user->pegaUp($app->conexao, $_SESSION['userid']);
$ativacao = $param['dados']['ativacao'];
	
?>
<form action="" method="post" id="criar">
<input type="hidden" name="criar" value="1">
<input type="hidden" name="ciclos" id="ciclos" >
</form>

<form action="" method="post" id="aprovar" onsubmit="">

  <input type="hidden" name="aprovar" value="1" />

  <input type="hidden" name="idfaturaaprovar" id="idfaturaaprovar" />

</form>

<form action="" method="post" id="reprovar">

  <input type="hidden" name="reprovar" value="1" />

  <input type="hidden" name="idfaturareprovar" id="idfaturareprovar" />

</form>

<form action="enviarcomprovantebankon" method="post" id="bankon">
    <input type="hidden" name="idfaturabankon" id="idfaturabankon">
    <input type="hidden" name="bankon" value="1">
</form>

<form action="" method="post" id="aprovarsaldo">

  <input type="hidden" name="aprovarsaldo" value="1" />

  <input type="hidden" name="idfaturasaldo" id="idfaturasaldo" />

</form>

<form action="" method="post" id="aprovarsaldopicpay">

  <input type="hidden" name="aprovarsaldopicpay" value="1" />

  <input type="hidden" name="idfaturapicpay" id="idfaturapicpay" />

</form>

<form action="" method="post" id="gerar">

  <input type="hidden" name="gerar" value="1" />

  <input type="hidden" name="idgerar" id="idgerar" />

</form>

<script>

  function gerarreentrada( ele ) {


    if ( confirm( 'Você deseja gerar uma reentrada ?' ) ) {


    document.getElementById( 'criar' ).submit();
	ele.setAttribute("disabled");

    }


  }

	
function gerarpagamento( ele ) {


if ( confirm( 'Você deseja gerar novamente seu pagamento pendente ?' ) ) {


document.getElementById( 'gerar' ).submit();
ele.setAttribute("disabled");

}


}

function pagarcompicpay( i ) {


if ( confirm( 'Você deseja pagar com Pic Pay ?' ) ) {


document.getElementById( 'idfaturapicpay' ).value = i;

document.getElementById( 'aprovarsaldopicpay' ).submit();


}


}

function pagarcomsaldo( i ) {


if ( confirm( 'Você deseja aprovar com Saldo ?' ) ) {


document.getElementById( 'idfaturasaldo' ).value = i;

document.getElementById( 'aprovarsaldo' ).submit();


}


}


	function criarreentrada(i){
		
	
      if ( confirm( 'Deseja criar uma reentrada ?' ) ) {

        document.getElementById( 'ciclos' ).value = i;
            
		
			   document.getElementById('criar').submit();
			   
			}
		
		
	}
	
</script>

<script>






function aprovar( i, ele ) {


  if ( confirm( 'Você deseja aprovar esta Doação ?' ) ) {


    document.getElementById( 'idfaturaaprovar' ).value = i;

    document.getElementById( 'aprovar' ).submit();
	ele.setAttribute("disabled");

  }


}

function reprovar( i, ele ) {


  if ( confirm( 'Você deseja reprovar esta fatura ?' ) ) {


    document.getElementById( 'idfaturareprovar' ).value = i;

    document.getElementById( 'reprovar' ).submit();
	ele.setAttribute("disabled");

  }



}

function ativarbankon(i){

if(confirm('Deseja efetuar o pagamento com Bankon ?')){
  
   
  document.getElementById('idfaturabankon').value = i;
  document.getElementById('bankon').submit();
  
  
}

 }

function resetarciclo() {


var http = new XMLHttpRequest();

var url = 'resetarciclo.php';

var params = 'invoice=1';

http.open( 'POST', url, true );


//Send the proper header information along with the request

http.setRequestHeader( 'Content-type', 'application/x-www-form-urlencoded' );


http.onreadystatechange = function () { //Call a function when the state changes.

  if ( http.readyState == 4 && http.status == 200 ) {

    // alert(http.responseText);

    alert( 'Sistema Resetado' );

    window.location = './';

  }

}

http.send( params );


}



function excluir( n ) {


var http = new XMLHttpRequest();

var url = 'deletarfatura.php';

var params = 'invoice=' + n;

http.open( 'POST', url, true );


//Send the proper header information along with the request

http.setRequestHeader( 'Content-type', 'application/x-www-form-urlencoded' );


http.onreadystatechange = function () { //Call a function when the state changes.

  if ( http.readyState == 4 && http.status == 200 ) {

    // alert(http.responseText);

    alert( 'Fatura excluida!!' );

    window.location = './';

  }

}

http.send( params );


}



  function deletarfatura( n ) {


    var http = new XMLHttpRequest();

    var url = 'deletarfatura.php';

    var params = 'invoice=' + n;

    http.open( 'POST', url, true );


    //Send the proper header information along with the request

    http.setRequestHeader( 'Content-type', 'application/x-www-form-urlencoded' );


    http.onreadystatechange = function () { //Call a function when the state changes.

      if ( http.readyState == 4 && http.status == 200 ) {

        // alert(http.responseText);

        alert( 'Fatura expirada e excluida, voce esta bloqueado!' );

        window.location = './';

      }

    }

    http.send( params );


  }


  function deletarfaturab( n ) {


    var http = new XMLHttpRequest();

    var url = 'deletarfatura.php';

    var params = 'invoice=' + n;

    http.open( 'POST', url, true );


    //Send the proper header information along with the request

    http.setRequestHeader( 'Content-type', 'application/x-www-form-urlencoded' );


    http.onreadystatechange = function () { //Call a function when the state changes.

      if ( http.readyState == 4 && http.status == 200 ) {

        // alert(http.responseText);

        alert( 'Fatura expirada e excluida, usuario bloqueado, voce estará disponivel para recebimento novamente!' );

        window.location = './';

      }

    }

    http.send( params );


  }
</script>
			
                							
				<div class="app-content">
					<div class="side-app">
												<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title">Painel</h4>
								<ol class="breadcrumb pl-0">
									<li class="breadcrumb-item"><a href="./">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Painel</li>
								</ol>
							</div>
							
							<div class="page-rightheader ml-auto d-lg-flex d-none">
								
								<div class="ml-3">
									
									<span class="float-left border-">
											<?php if($qtdereentradas > 0 ){ ?>
										<a href="#" onclick="gerarreentrada(this)" class="btn btn-primary"><span></span>Gerar Reentrada ( <?=$qtdereentradas;?> )</a>
									<?php } ?>
									</span>
								
									<span class="float-left">
										<?php if((($param['dados']['naoestanarede'] == '0' && count($param['dados']['pagamentospendentes']) == '0') || $param['dados']['pegaexpirado'] > '0' || $param['dados']['pegareentrada'] > '0') && $param['dados']['esperar'] == '0'){ ?>
										<a href="#" onclick="gerarpagamento(this)" class="btn btn-warning"><span></span>Gerar Pagamento Pendente</a>
									<?php } ?>
									</span>
								</div>
							</div>
							
							
							
						</div>
						<!--End Page header-->
						
						
												<!--Row-->
						<div class="row">
							<div class="col-xl-3 col-lg-6 col-md-12">
								<div class="card">
									<div class="card-body pb-0">
										<div class="text-left mb-4">
											<p class=" mb-1 ">
											  <i class="fa fa-user mr-1"></i>
											 Indicados Ativos
											</p>
											<h2 class="mb-0"> <?php print $param['dados']['diretos'];?><span class="fs-12 text-muted"><span class="text-success mr-1">
										</div>
									</div>
									<div id="spark1"></div>
								</div>
							</div>
							<div class="col-xl-3 col-lg-6 col-md-12">
								<div class="card ">
									<div class="card-body pb-0">
										<div class="text-left mb-4">
											<p class=" mb-1 ">
											  <i class="fa fa-user mr-1"></i>
											 Indicados Pendentes
											</p>
											<h2 class="mb-0"> <?php print $param['dados']['diretosp'];?><span class="fs-12 text-muted"><span class="text-danger mr-1">
										</div>
									</div>
									<div id="spark2"></div>
								</div>
							</div>
							<!--
										<div class="col-xl-3 col-lg-6 col-md-12">
								<div class="card ">
									<div class="card-body pb-0">
										<div class="text-left mb-4">
											<p class=" mb-1 ">
											  <i class="fa fa-eth mr-1"></i>
											  Cotação Ethereum
											</p>
											<h2 class="mb-0">R$ <?php  $eth = $cotacao->pegaCotacaoETH() * $dolar;print number_format($eth, 2, '.', '');?><span class="fs-12 text-muted"><span class="text-success mr-1"></h2>
												
										</div>
									</div>
									<div id="spark3"></div>
								</div>
							</div>
							<div class="col-xl-3 col-lg-6 col-md-12">
								<div class="card ">
									<div class="card-body pb-0">
										<div class="text-left mb-4">
											<p class=" mb-1">
											  <i class="fa fa-btc mr-1"></i>
											  Cotação Bitcoin
											</p>
											<h2 class="mb-0">R$ <?php print $btc = $cotacao->pegaCotacaoBTC();?><span class="fs-12 text-muted"><span class="text-danger mr-1"></h2>
										</div>
									</div>
									<div id="spark4"></div>
								</div>
							</div>
-->
						</div>
						<!--End row-->
								
						<!-- Row end -->
					<?php if($param['dados']['esperar'] >= '1'){ ?>
					<div class="cols 12 alert bg-warning" role="alert" align="center" >
								Seu Upline <?=$pegaupline['usuario'];?> (Nome: <?=$pegaupline['nome'];?>, Email: <?=$pegaupline['email'];?>, Whatsapp: <?=$pegaupline['whatsapp'];?>) está travado no nível, aguardando destravamento.
					</div>
					<?php } ?>


                    <!-- Row end -->
  					<?php if($param['dados']['habilitar'] >= '1' || $pegaup == '0'){ ?>
						<div class="cols 12 alert bg-warning" role="alert" align="center" >
									Seu Upline <?=$pegaupline['usuario'];?> (Nome: <?=$pegaupline['nome'];?>, Email: <?=$pegaupline['email'];?>, Whatsapp: <?=$pegaupline['whatsapp'];?>) não está ativo em sua fase no momento, aguardando ativação.
                    	</div>
					  <?php } ?>

				<?php if($habilitar == '0'){ ?>
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-4">LINK DE INDICAÇÃO ÚNICO</h5>

                            <div class="row">
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <input type="text" class="form-control typeahead" name="query" id="query"
                                            value="https://cdeanewcycle.com.br/cadastros/cdeanewcycle" data-provide="typeahead"
                                            autocomplete="off">
                                        <div class="input-group-append ">
                                            <button type="button" onclick="copyLink()" class="btn btn-primary default">
                                                COPIAR LINK
                                            </button>
                                            <script>
                                    function copyLink() {
										var copyText = document.getElementById("query");
										copyText.select();
										document.execCommand("copy");
										}
                                </script> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<?php }else if($habilitar == '1'){ ?>
				  <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-4">LINK DE INDICAÇÃO INDIVIDUAL</h5>

                            <div class="row">
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <input type="text" class="form-control typeahead" name="query" id="query"
                                            value="https://cdeanewcycle.com.br/cadastros/<?=$_SESSION['usuario'];?>" data-provide="typeahead"
                                            autocomplete="off">
                                        <div class="input-group-append ">
                                            <button type="button" onclick="copyLink()" class="btn btn-primary default">
                                                COPIAR LINK
                                            </button>
                                            <script>
                                    function copyLink() {
										var copyText = document.getElementById("query");
										copyText.select();
										document.execCommand("copy");
										}
                                </script> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				
					<?php } ?>			
								

						
						
						<!--Row-->
						<div class="row">
							<div class="col-12 col-sm-12">
								<div class="card ">
									<div class="card-header">
										<div class="card-title">Doações à Efetuar</div>
										<div class="card-options ">
											
										</div>
									</div>
									<div>
										<div class="table-responsive">
											<table class="table  table-vcenter  text-nowrap mb-0">
											 <thead>
						<tr>
							<th>#</th>
							<th>Recebedor</th>
              <th>Descrição</th>
							<th>Valor Reais</th>
              <th>Ciclo</th>
			      <th>Prazo</th>
              <th>Pagamento</th>
							<th>Ações</th>
						</tr>
					</thead>
					<tbody>
					  <?php 
				
					  foreach($param['dados']['pagamentospendentes'] as $pagamentos){ 
						  $vercomprovante = $user->VerComprovante($app->conexao,$pagamentos['userid'],$pagamentos['id']);
						  $recebedor = $user->pegaRecebedor($app->conexao,$pagamentos['cupomb']);
						  $pegaespera = $user->pegaEspera($app->conexao,$pagamentos['id']);  
						  $pegaup = $user->pegaUp($app->conexao, $pagamentos['id']);
            //  if($pegaespera == '0'){
						?>

						
					<tr>

       <?php  if(($pegaespera == '0'  && $pegaup == '1') || $pagamentos['cupomb'] == ''){ ?>
                                    <!-- Modal -->
				<div class="modal fade" id="exampleModal<?=$pagamentos['id'];?>" style="margin-top:5%;"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Dados Bancários</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">


              <?php 

			  

$pegadadoss = $user->pegaDados($app->conexao,$pagamentos['useridb']);



foreach($pegadadoss as $dados){



$nome = $dados['nome'];$whatsapp = $dados['whatsapp'];$email = $dados['email'];

?>



<strong>Nome: <?php print $nome;?></strong><br>



<strong>Whatsapp: <?php print $whatsapp;?></strong><br>



<strong>Email: <?php print $email;?></strong><br>



<?php } ?>
<hr></hr>

							<?php 
                $bancoss = $user->pegaDadosBancarios($app->conexao,$pagamentos['useridb']);
              
								foreach($bancoss as $bancos){
									
									$banco = $bancos['banco'];$agencia = $bancos['agencia'];$conta = $bancos['conta'];$operacao = $bancos['operacao'];
									$tipoconta = $bancos['tipoconta'];$cpftitular = $bancos['cpftitular'];$nometitular = $bancos['nometitular'];
								$bitcoin = $bancos['bitcoin'];$litecoin = $bancos['litecoin'];$picpay = $bancos['picpay'];
							?>

           					<?php if($banco == 'picpay'){ ?>
							
								<strong>Picpay: <?php print $picpay;?></strong><br>
							
							<?php }else{ ?>
						

								<strong>Banco: <?php print $banco;?></strong><br>
								
								<strong>Agência: <?php print $agencia;?></strong><br />
								
								<strong>Conta: <?php print $conta;?></strong><br />

								<strong>Tipo Conta: <?php print $tipoconta;?></strong><br />

								<strong>Operação: <?php print $operacao;?></strong><br />
										
								<strong>CPF Títular: <?php print $cpftitular;?></strong><br />
										
								<strong>Nome Títular: <?php print $nometitular;?></strong><br />
								<br><br>
								<hr></hr>
							<?php }} ?>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
							</div>
						</div>
					</div>
				</div>
              <?php } ?>

							<td><?=$pagamentos['id'];?></td>
							<?php if($recebedor['logins'] == '0'){ ?>
								<td><?=$recebedor['usuario'];?></td>
							<?php }else{ ?>
								<td><?=$recebedor['usuario'].'-'.$recebedor['logins'];?></td>
							<?php } ?>
                            <td><?=$pagamentos['descricao'];?></td>
                          
							<td>R$ <?=$valor = number_format($pagamentos['valor'], 2, '.', '');?></td>
							
                         
                <td><?=$pagamentos['fase'];?></td>

				<td>
        <?php  if(($pegaespera == '0'  && $pegaup == '1') || $pagamentos['cupomb'] == ''){ ?>
        <span class="btn btn-success" id="deu<?=$pagamentos['id'];?>"><time data-end="<?=$pagamentos['datavencimento']; ?>" id="counter<?=$pagamentos['id'];?>" class="counter"></time></span></td>



  <script>
	var $counters = [].slice.call( document.querySelectorAll( '.counter' ) );

	timeCounter( $counters );

	var roda<?=$pagamentos['id'];?> = setInterval( function () {


	  timeCounter( $counters );

	}, 1000 );


	tempo<?=$pagamentos['id'];?> = document.getElementById( 'counter<?=$pagamentos['id'];?>' ).innerHTML;

	if ( tempo<?=$pagamentos['id'];?> == 'Tempo esgotado!!!!' ) {

	  
	  <?php if($pagamentos['comprovantes'] == ''){?>
	   
	   
		//  deletarfaturab( <?= $pagamentos['id'];?> );
	  
	  <?php } ?>


	}
  </script>

<?php } ?>
				<?php if(($pegaespera == '0' && $pegaup == '1') || $pagamentos['cupomb'] == ''){ ?>
                	<td> <button type="button" class="btn btn-success btn-sm mt-3 d-sm-block" data-toggle="modal" data-target="#exampleModal<?=$pagamentos['id'];?>"><i class="fa fa-money"></i> Dados de Pagamento</button></td>
				<?php }else if($pegaespera == '1'  || $pegaup == '0'){ ?>
					<td> <button type="button" class="btn btn-success btn-sm mt-3 d-sm-block" ><i class="fa fa-money"></i> Esperando Destravamento</button></td>
				<?php } ?>
                 <td>  
				<?php 
						  
						  if(($pagamentos['posicao'] == '0')){ ?>					
				 <a class="btn btn-info " href="enviarcomprovante?i=<?=$pagamentos['id'];?>" ><i class="fa fa-comments"></i> Enviar Comprovante</a>
				<?php }else if($pagamentos['posicao'] == '1'){ ?>
					<a class="btn btn-warning " href="enviarcomprovante?i=<?=$pagamentos['id'];?>" ><i class="fa fa-comments"></i> Esperando Ativação</a>
				<?php }else if($pagamentos['posicao'] == '2'){ ?>
					<a class="btn btn-danger " href="enviarcomprovante?i=<?=$pagamentos['id'];?>" ><i class="fa fa-comments"></i> Reprovado, mande novamente o comprovante</a>
				<?php } ?>
								
                                  </td>
							
						</tr>
								 <?php }//} ?>
					</tbody>
					<tfoot>
					<tr>
							<th>#</th>
							<th>Recebedor</th>
                            <th>Descrição</th>
							<th>Valor Reais</th>
              <th>Ciclo</th>
			  <th>Prazo</th>
              <th>Pagamento</th>
              	<th>Ações</th>
						</tr>
					</tfoot>
				  </table>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--End row-->
										
										
				<!--Row-->
						<div class="row">
							<div class="col-12 col-sm-12">
								<div class="card ">
									<div class="card-header">
										<div class="card-title">Doações à Receber</div>
										<div class="card-options ">
											
										</div>
									</div>
									<div>
										<div class="table-responsive">
											<table class="table  table-vcenter  text-nowrap mb-0">
												 <thead>

<tr>

  <th>#</th>

  <th>Doador</th>

  <th>Valor Reais</th>

  <th>Dados Usuário</th>

  <th>Prazo</th>

  <th>Ciclo</th>

  <th>Status</th>

  <th>Comprovante</th>

  <th>Ações</th>

</tr>

</thead>

<tbody>

<?php foreach($param['dados']['pagamentosareceber'] as $doacoesareceber){ 

	$pegadoador = $user->PegaDoadorb($app->conexao,$doacoesareceber['cupom'],$doacoesareceber['userid']);
	
  //$pegaesperar = $user->pegaEsperar($app->conexao,$doacoesareceber['userid']);
  
  $pegaespera = $user->pegaEspera($app->conexao,$doacoesareceber['id']);   

			 if($doacoesareceber['useridb'] != '0'){

				  $datavenc = date('d-m-Y H:i:s', strtotime($doacoesareceber['datavencimento']));

			  $vercomprovante = $user->VerComprovante($app->conexao,$doacoesareceber['id'],$doacoesareceber['userid']);	

		 // if($pegaesperar == '0'){

      //  if($pegaespera == '0'){

	 ?>

<tr>



  <td><?=$doacoesareceber['id'];?></td>

  <?php if($pegadoador['logins'] == '0'){ ?>
	  <td><?=$pegadoador['usuario'];?></td>
  <?php }else{ ?>
		<td><?=$pegadoador['usuario'].'-'.$pegadoador['logins'];?></td>
  <?php } ?>


  <td>R$ <?=$valor = number_format($doacoesareceber['valor'], 2, '.', '');?></td>




	<?php if($pegaespera == '0'  && $ativacao == '1'){ ?>
  		<td><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalb<?=$doacoesareceber['id'];?>">DADOS DO USUÁRIO</a></td>
	<?php }else if($pegaespera == '1'  || $ativacao == '0'){ ?>
		<td><a href="#" class="btn btn-primary" >TRAVADO</a></td>
	<?php } ?>


  <!-- COMEÇO DADOS PAGAMENTO  -->

  <div class="modal center-modal  fade" id="exampleModalb<?=$doacoesareceber['id'];?>" style="margin-top:5%;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelb" aria-hidden="true">

	<div class="modal-dialog" role="document">

	  <div class="modal-content">

		<div class="modal-header">

		  <h5 class="modal-title" id="exampleModalLabelb">Dados do Usuário</h5>

		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">

			<span aria-hidden="true">&times;</span>

		  </button>

		</div>

		<div class="modal-body">

		  <?php 

			  

				  $pegadadoss = $user->pegaDados($app->conexao,$doacoesareceber['userid']);

			  

			  foreach($pegadadoss as $dados){

				  

				  $nome = $dados['nome'];$whatsapp = $dados['whatsapp'];$email = $dados['email'];

		  ?>



		  <strong>Nome: <?php print $nome;?></strong><br>



		  <strong>Whatsapp: <?php print $whatsapp;?></strong><br>



		  <strong>Email: <?php print $email;?></strong><br>



		  <?php } ?>

		</div>

		<div class="modal-footer">

		  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>

		</div>

	  </div>

	</div>

  </div>



  <!--  FIM DADOS PAGAMENTO -->



  <td><span class="btn btn-success" id="deu<?=$doacoesareceber['id'];?>"><time data-end="<?=$doacoesareceber['datavencimento']; ?>" id="counter<?=$doacoesareceber['id'];?>" class="counter"></time></span></td>



  <script>
	var $counters = [].slice.call( document.querySelectorAll( '.counter' ) );

	timeCounter( $counters );

	var roda<?=$doacoesareceber['id'];?> = setInterval( function () {


	  timeCounter( $counters );

	}, 1000 );


	tempo<?=$doacoesareceber['id'];?> = document.getElementById( 'counter<?=$doacoesareceber['id'];?>' ).innerHTML;

	if ( tempo<?=$doacoesareceber['id'];?> == 'Tempo esgotado!!!!' ) {

	  
	  <?php if($doacoesareceber['comprovantes'] == ''){?>
	   
	   
		//  deletarfaturab( <?= $doacoesareceber['id'];?> );
	  
	  <?php } ?>


	}
  </script>

<th><?=$doacoesareceber['fase'];?></th>

  <td><?php if($doacoesareceber['ativacao'] == '0'){print "<div class='btn btn-danger'>PENDENTE</div>";}else{print "<div class='btn btn-success' role='alert'>ATIVO</div>";};?></td>

  
  <td>

	<?php if($doacoesareceber['comprovantes'] != ''){ ?>

	<a href="vercomprovante?i=<?=$doacoesareceber['id'];?>" class="btn btn-primary">VER COMPROVANTE</a>

	<?php } ?>

  </td>

  <?php if($doacoesareceber['comprovantes'] != ''){ 
	if($pegaespera == '0' && $ativacao == '1'){
	?>

  <td>
	  <a href="#" onclick="aprovar(<?=$doacoesareceber['id'];?>)" class="btn btn-success">APROVAR</a>
	  <a href="#" onclick="reprovar(<?=$doacoesareceber['id'];?>)" class="btn btn-danger">REPROVAR</a></td>
   
	<?php }else if($pegaespera == '1'  || $ativacao == '0'){ ?>	
	
	<td><a href="#" class="btn btn-primary">ESPERANDO DESTRAVAMENTO</a></td>

  <?php }}else{ ?>
	<td><a href="#" class="btn btn-primary">ESPERANDO MANDAR COMPROVANTE</a></td>
  <?php } ?>

</tr>

<?php }}//} ?>

<tr>

<th>#</th>

<th>Doador</th>


<th>Valor Reais</th>

 <th>Dados Usuário</th>

<th>Prazo</th>

<th>Ciclo</th>

<th>Status</th>

<th>Comprovante</th>

<th>Ações</th>

</tr>

</tbody>

</table>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--End row-->




					</div>
				</div><!-- end app-content-->
			</div>
            			<!--Footer-->
	<?php include 'footer.php';?>