

<?php
$app = new App();
$user = $app->loadModel("Bancarios");
$cotacao = $app->loadModel("Cotacao");
$data1 = date("Y-m-d");
$datas = date("H");
$dolar = $cotacao->pegaCotacaoBRL();

?>
<form action="" method="post" id="criar">
<input type="hidden" name="criarreentradas" value="1">
<input type="hidden" name="ciclos" id="ciclos" >
</form>

<form action="" method="post" id="aprovar">

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

	
function gerarpagamento( i ) {


if ( confirm( 'Você deseja gerar novamente seu pagamento pendente ?' ) ) {


document.getElementById( 'gerar' ).submit();

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






function aprovar( i ) {


  if ( confirm( 'Você deseja aprovar esta Doação ?' ) ) {


    document.getElementById( 'idfaturaaprovar' ).value = i;

    document.getElementById( 'aprovar' ).submit();

  }


}

function reprovar( i ) {


  if ( confirm( 'Você deseja reprovar esta fatura ?' ) ) {


    document.getElementById( 'idfaturareprovar' ).value = i;

    document.getElementById( 'reprovar' ).submit();

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
			

				<!-- BEGIN .page-header -->
				<header class="page-header">
					<div class="container-fluid">
						<div class="row">
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="page-title">
					<a -href="https://boataxa.com.br/dolar-comercial-importacao" moeda="220" type="Comercial" name="boataxa_hoje"><strong> Dólar Comercial </strong></a>
    <script async src="https://boataxa.com.br/Api/Scripts/boataxa_hoje.js"></script>
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="right-stats">
									<?php if((($param['dados']['naoestanarede'] == '0' && count($param['dados']['pagamentospendentes']) == '0') || $param['dados']['pegaexpirado'] > '0' || $param['dados']['pegareentrada'] > '0') && $param['dados']['esperar'] != '1'){ ?>
										<a href="#" onclick="gerarpagamento()" class="btn btn-warning"><span></span>Gerar Pagamento Pendente</a>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</header>
				<!-- END: .page-header -->

				<!-- BEGIN .main-content -->
				<div class="main-content">

					<!-- Row start -->
					<div class="row gutters">
						<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
							<div class="mini-widget">
								<div class="mini-widget-heading clearfix">
									<div class="float-left">Indicados Ativos</div>
									
								</div>
								<div class="mini-widget-body clearfix">
									<div class="float-left">
										<i class="icon-chart-pie"></i>
									</div>
									<div class="float-right number"><?php print $param['dados']['diretos'];?></div>
								</div>
							</div>
						</div>
						
						<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
							<div class="mini-widget grey">
								<div class="mini-widget-heading clearfix">
									<div class="float-left">Cotação Ethereum</div>
									
								</div>
								<div class="mini-widget-body clearfix">
									<div class="float-left">
										<i class="icon-cloud-storage"></i>
									</div>
									<div class="float-right number">R$ <?php  $eth = $cotacao->pegaCotacaoETH() * $dolar;print number_format($eth, 2, '.', '');?> </div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
							<div class="mini-widget grey">
								<div class="mini-widget-heading clearfix">
									<div class="float-left">Cotação Bitcoin</div>
									
								</div>
								<div class="mini-widget-body clearfix">
									<div class="float-left">
										<i class="icon-cloud-storage"></i>
									</div>
									<div class="float-right number">R$ <?php print $btc = $cotacao->pegaCotacaoBTC();?></div>
								</div>
							</div>
						</div>

						<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
							<div class="mini-widget grey">
								<div class="mini-widget-heading clearfix">
									<div class="float-left">Cotação Litecoin</div>
									
								</div>
								<div class="mini-widget-body clearfix">
									<div class="float-left">
										<i class="icon-cloud-storage"></i>
									</div>
									<div class="float-right number">R$ <?php  $ltc = $cotacao->pegaCotacaoLTC() * $dolar;print number_format($ltc, 2, '.', '');?></div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
							<div class="mini-widget red">
								<div class="mini-widget-heading clearfix">
									<div class="float-left">Indicados Pendentes</div>
								
								</div>
								<div class="mini-widget-body clearfix">
									<div class="float-left">
										<i class="icon-social-twitter"></i>
									</div>
									<div class="float-right number"> <?php print $param['dados']['diretosp'];?></div>
								</div>
							</div>
						</div>
					    	<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
							<div class="mini-widget grey">
								<div class="mini-widget-heading clearfix">
								</div>
								<div class="mini-widget-body clearfix">
									<div class="float-left">
									</div>
									<div class="float-left number">
									    <!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div class="tradingview-widget-container__widget"></div>
  <div class="tradingview-widget-copyright"></div>
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-single-quote.js" async>
  {
  "symbol": "FX:ETHUSD",
  "width": "280",
  "colorTheme": "light",
  "isTransparent": false,
  "locale": "br"
}
  </script>
</div>
<!-- TradingView Widget END --> </div>
								</div>
							</div>
						</div>
						
												<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
							<div class="mini-widget grey">
								<div class="mini-widget-heading clearfix">
								</div>
								<div class="mini-widget-body clearfix">
									<div class="float-left">
									</div>
									<div class="float-left number">
<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div class="tradingview-widget-container__widget"></div>
  <div class="tradingview-widget-copyright"></div>
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-single-quote.js" async>
  {
  "symbol": "FX:BTCUSD",
  "width": "280",
  "colorTheme": "light",
  "isTransparent": false,
  "locale": "br"
}
  </script>
</div>
<!-- TradingView Widget END --> </div>
								</div>
							</div>
						</div>
						
												<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
							<div class="mini-widget grey">
								<div class="mini-widget-heading clearfix">
								</div>
								<div class="mini-widget-body clearfix">
									<div class="float-left">
									</div>
									<div class="float-left number">
									    <!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div class="tradingview-widget-container__widget"></div>
  <div class="tradingview-widget-copyright"></div>
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-single-quote.js" async>
  {
  "symbol": "BITSTAMP:LTCUSD",
  "width": "280",
  "colorTheme": "light",
  "isTransparent": false,
  "locale": "br"
}
  </script>
</div>
<!-- TradingView Widget END --> 


</div>
								</div>
							</div>
						</div>


					</div>
					<a -href="https://boataxa.com.br/dolar-comercial-importacao" moeda="220" type="Comercial" name="boataxa_hoje">Dólar Comercial</a>
    <script async src="https://boataxa.com.br/Api/Scripts/boataxa_hoje.js"></script>
<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div class="tradingview-widget-container__widget"></div>
  <div class="tradingview-widget-copyright"></div>
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
  {
  "symbols": [
    {
      "description": "",
      "proName": "BITSTAMP:BTCUSD"
    },
    {
      "description": "",
      "proName": "COINBASE:ETHUSD"
    },
    {
      "description": "",
      "proName": "BITPANDAPRO:BTCEUR"
    },
    {
      "description": "",
      "proName": "BITBAY:LTCBTC"
    },
    {
      "description": "",
      "proName": "COINBASE:ETHUSD"
    },
    {
      "description": "LIbra BTC",
      "proName": "HUOBI:LBABTC"
    },
    {
      "description": "",
      "proName": "HUOBI:YEEBTC"
    }
  ],
  "colorTheme": "light",
  "isTransparent": false,
  "displayMode": "regular",
  "locale": "br"
}
  </script>
</div>
<!-- TradingView Widget END -->
<!--
					<div class="cols 12 alert bg-warning" role="alert" align="center" >
					Quando receber a (18ª doação no 3ºnivel ), já estará qualificado para se cadastrar no 2º CICLO, com valor de DOAÇÃO de R$ 1.000,00
                    	</div>
-->

					<!-- Row end -->
					<?php if($param['dados']['esperar'] == '1'){ ?>
					<div class="cols 12 alert bg-warning" role="alert" align="center" >
								Seu Upline está travado no nível, aguardando destravamento.
					</div>
					<?php } ?>


                    <!-- Row end -->
  					<?php if($param['dados']['habilitar'] >= '1'){ ?>
						<div class="cols 12 alert bg-warning" role="alert" align="center" >
									Seu Upline não está ativo em sua fase no momento, aguardando ativação.
                    	</div>
					  <?php } ?>

					<?php if($_SESSION['userid'] <= '9840'){ ?>
                    
                    <div class="cols 12 alert bg-primary" role="alert" align="center" >
									<b style="color:#FFF;">Seu Link de Indicação Universal é https://ajudamutua.app/cadastros/ajudamutua</b>
                    </div>

					<?php }else{ ?>

						<div class="cols 12 alert bg-primary" role="alert" align="center" >
									<b style="color:#FFF;">Seu Link de Indicação Pessoal é https://ajudamutua.app/cadastros/<?php print $_SESSION['usuario'];?></b>
                    </div>

					<?php } ?>

					

					<!-- Row starts -->
					<div class="row gutters">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="card">
								<div class="card-header">Doações à Fazer</div>
								<div class="card-body">
								<div class="table-responsive">
                                    <table id="basicExample" class="table table-bordered">
                                    <thead>
						<tr>
							<th>#</th>
							<th>Recebedor</th>
              <th>Descrição</th>
							<th>Valor Reais</th>
							<th>Valor Bitcoin</th>
							<th>Valor Litecoin</th>
							<th>Valor Ethereum</th>
              <th>Ciclo</th>
			  <th>Prazo</th>
              <th>Pagamento</th>
							<th>Ações</th>
						</tr>
					</thead>
					<tbody>
					  <?php 
					  if($param['dados']['esperar'] == '0'){ 
					  foreach($param['dados']['pagamentospendentes'] as $pagamentos){ 
							$vercomprovante = $user->VerComprovante($app->conexao,$pagamentos['userid'],$pagamentos['id']);
							$recebedor = $user->pegaRecebedor($app->conexao,$pagamentos['cupomb']);   
						?>

						
					<tr>

       
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
								$bitcoin = $bancos['bitcoin'];$litecoin = $bancos['litecoin'];$ethereum = $bancos['ethereum'];
							?>

            <?php if($banco == 'bitcoin'){ ?>

                <strong>Carteira Bitcoin: <?php print $bitcoin;?></strong><br><br>
				<hr></hr>

			<?php } else if($banco == 'litecoin'){ ?>

				<strong>Carteira Litecoin: <?php print $litecoin;?></strong><br><br>
				<hr></hr>
			<?php } else if($banco == 'ethereum'){ ?>

				<strong>Carteira Ethereum: <?php print $ethereum;?></strong><br><br>
				<hr></hr>
              <?php }else{ ?>
						

								<strong>Banco: <?php print $banco;?></strong><br>
								
								<strong>Agência: <?php print $agencia;?></strong><br />
								
								<strong>Conta: <?php print $conta;?></strong><br />

								<strong>Tipo Conta: <?php print $tipoconta;?></strong><br />

								<strong>Operação: <?php print $operacao;?></strong><br />
										
								<strong>CPf Títular: <?php print $cpftitular;?></strong><br />
										
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


							<td><?=$pagamentos['id'];?></td>
							<?php if($recebedor['logins'] == '0'){ ?>
								<td><?=$recebedor['usuario'];?></td>
							<?php }else{ ?>
								<td><?=$recebedor['usuario'].'-'.$recebedor['logins'];?></td>
							<?php } ?>
                            <td><?=$pagamentos['descricao'];?></td>
                          
							<td>R$ <?=$valor = number_format($pagamentos['valor'], 2, '.', '');?></td>
							<td><?php $valorbtc = $pagamentos['valor'] / $btc; print $valorb = number_format($valorbtc, 8, '.', '');?> BTC</td>
							<td><?php $valorltc = $pagamentos['valor'] / $ltc; print $valorl = number_format($valorltc, 8, '.', '');?> LTC</td>
							<td><?php $valoreth = $pagamentos['valor'] / $eth; print $valore = number_format($valoreth, 8, '.', '');?> ETH</td>
                         
                <td><?=$pagamentos['fase'];?></td>

				<td><span class="btn btn-success" id="deu<?=$pagamentos['id'];?>"><time data-end="<?=$pagamentos['datavencimento']; ?>" id="counter<?=$pagamentos['id'];?>" class="counter"></time></span></td>



  <script>
	var $counters = [].slice.call( document.querySelectorAll( '.counter' ) );

	timeCounter( $counters );

	var roda<?=$pagamentos['id'];?> = setInterval( function () {


	  timeCounter( $counters );

	}, 1000 );


	tempo<?=$pagamentos['id'];?> = document.getElementById( 'counter<?=$pagamentos['id'];?>' ).innerHTML;

	if ( tempo<?=$pagamentos['id'];?> == 'Tempo esgotado!!!!' ) {

	  
	  <?php if($pagamentos['comprovantes'] == ''){?>
	   
	   
		  deletarfaturab( <?= $pagamentos['id'];?> );
	  
	  <?php } ?>


	}
  </script>


                <td> <button type="button" class="btn btn-success btn-sm mt-3 d-sm-block" data-toggle="modal" data-target="#exampleModal<?=$pagamentos['id'];?>"><i class="fa fa-money"></i> Dados de Pagamento</button></td>
                 <td>  
				<?php if($pagamentos['posicao'] == '0'){ ?>					
				 <a class="btn btn-info " href="enviarcomprovante?i=<?=$pagamentos['id'];?>" ><i class="fa fa-comments"></i> Enviar Comprovante</a>
				<?php }else if($pagamentos['posicao'] == '1'){ ?>
					<a class="btn btn-warning " href="enviarcomprovante?i=<?=$pagamentos['id'];?>" ><i class="fa fa-comments"></i> Esperando Ativação</a>
				<?php }else if($pagamentos['posicao'] == '2'){ ?>
					<a class="btn btn-danger " href="enviarcomprovante?i=<?=$pagamentos['id'];?>" ><i class="fa fa-comments"></i> Reprovado, mande novamente o comprovante</a>
				<?php } ?>
								
                                  </td>
							
						</tr>
								 <?php }} ?>
					</tbody>
					<tfoot>
					<tr>
							<th>#</th>
							<th>Recebedor</th>
                            <th>Descrição</th>
							<th>Valor Reais</th>
							<th>Valor Bitcoin</th>
							<th>Valor Litecoin</th>
							<th>Valor Ethereum</th>
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
					<!-- Row ends -->



					<!-- Row starts -->
					<div class="row gutters">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="card">
								<div class="card-header">Doações à Receber</div>
								<div class="card-body">
								<div class="table-responsive">
                                    <table id="basicExample" class="table table-bordered">
									<thead>

<tr>

  <th>#</th>

  <th>Doador</th>

  <th>Valor Reais</th>
<th>Valor Bitcoin</th>
<th>Valor Litecoin</th>
<th>Valor Ethereum</th>

  <th>Conta</th>

  <th>Prazo</th>

  <th>Ciclo</th>

  <th>Status</th>

  <th>Aprovar Somente com Comprovante</th>

  <th>Ações</th>

</tr>

</thead>

<tbody>

<?php foreach($param['dados']['pagamentosareceber'] as $doacoesareceber){ 

	$pegadoador = $user->PegaDoadorb($app->conexao,$doacoesareceber['cupom'],$doacoesareceber['userid']);
	
	$pegaesperar = $user->pegaEsperar($app->conexao,$doacoesareceber['userid']);

			 if($doacoesareceber['useridb'] != '0'){

				  $datavenc = date('d-m-Y H:i:s', strtotime($doacoesareceber['datavencimento']));

			  $vercomprovante = $user->VerComprovante($app->conexao,$doacoesareceber['id'],$doacoesareceber['userid']);	

		  if($pegaesperar == '0'){

	 ?>

<tr>



  <td><?=$doacoesareceber['id'];?></td>

  <?php if($pegadoador['logins'] == '0'){ ?>
	  <td><?=$pegadoador['usuario'];?></td>
  <?php }else{ ?>
		<td><?=$pegadoador['usuario'].'-'.$pegadoador['logins'];?></td>
  <?php } ?>


  <td>R$ <?=$valor = number_format($doacoesareceber['valor'], 2, '.', '');?></td>
<td><?php $valorbtc = $doacoesareceber['valor'] / $btc; print $valorb = number_format($valorbtc, 8, '.', '');?> BTC</td>
<td><?php $valorltc = $doacoesareceber['valor'] / $ltc; print $valorl = number_format($valorltc, 8, '.', '');?> LTC</td>
<td><?php $valoreth = $doacoesareceber['valor'] / $eth; print $valore = number_format($valoreth, 8, '.', '');?> ETH</td>




  <td><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalb<?=$doacoesareceber['id'];?>">DADOS DO USUÁRIO</a></td>



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
	   
	   
		  deletarfaturab( <?= $doacoesareceber['id'];?> );
	  
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

  <?php if ($doacoesareceber['posicao'] != '2'){ ?>

  <td>
	  <a href="#" onclick="aprovar(<?=$doacoesareceber['id'];?>, this)" class="btn btn-success">APROVAR</a>
	  <a href="#" onclick="reprovar(<?=$doacoesareceber['id'];?>, this)" class="btn btn-danger">REPROVAR</a></td>

  <?php }else{ ?>
	<a href="#" class="btn btn-primary">ESPERANDO MANDAR COMPROVANTE NOVAMENTE</a>
  <?php } ?>

</tr>

<?php }}} ?>

<tr>

<th>#</th>

<th>Doador</th>


<th>Valor Reais</th>
<th>Valor Bitcoin</th>
<th>Valor Litecoin</th>
<th>Valor Ethereum</th>

<th>Conta</th>

<th>Prazo</th>

<th>Ciclo</th>

<th>Status</th>

<th>Aprovar Somente com Comprovante</th>

<th>Ações</th>

</tr>

</tbody>

</table>
</div>			
								</div>
							</div>
						</div>
						
					</div>
					<!-- Row ends -->


					
				</div>
				<!-- END: .main-content -->

	<?php include 'footer.php';?>		