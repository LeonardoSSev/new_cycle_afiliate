
<?php
$app = new App();
$user = $app->loadModel("Bancarios");
?>
				<!-- BEGIN .page-header -->
				<header class="page-header">
					<div class="container-fluid">
						<div class="row">
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="page-title">
									<h3>Editar Dados Bancários</h3>
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
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">


							<!-- Card starts -->
							<div class="card">
								<div class="card-body">
									
									<!--*************************
									*************************
									*************************
									 Contact Form Start
									*************************
									*************************
									*************************-->



									<!-- Row start -->
									<div class="row justify-content-center gutters">
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <?php foreach($param['vereditardadosbancarios']['editardadosbancarios'] as $dados){ ?>
											<form action="" method="post">
												<div class="form-block">
													<div class="form-block-header">
														<h5>Editar Dados Bancários</h5>
													
													</div>
													<div class="form-block-body">
														<div class="form-group">
                                                        <select name="banco"  onchange="abrir()" id="banco"  class="form-control">
                                                            <option value="">Selecione o Banco</option>
                                                            <option <?= ( $dados['banco'] == 'nubank')?'selected=""':'';?>  value="nubank">Nubank</option>
                                                        <!-- <option <?= ( $dados['banco'] == 'bankon')?'selected=""':'';?>  value="bankon">Bankon</option>-->
															<option <?= ( $dados['banco'] == 'bitcoin')?'selected=""':'';?>  value="bitcoin">Bitcoin</option>
															<option <?= ( $dados['banco'] == 'litecoin')?'selected=""':'';?>  value="litecoin">Litecoin</option>
															<option <?= ( $dados['banco'] == 'ethereum')?'selected=""':'';?>  value="ethereum">Ethereum</option>
                                                            <!-- <option <?= ( $dados['banco'] == 'picpay')?'selected=""':'';?>  value="picpay">Picpay</option> -->
                                                            <option <?= ( $dados['banco'] == 'itau')?'selected=""':'';?>  value="itau">Itaú Unibanco</option>
                                                            <option <?= ( $dados['banco'] == 'bancodobrasil')?'selected=""':'';?>  value="bancodobrasil">Banco do Brasil</option>
                                                            <option <?= ( $dados['banco'] == 'bradesco')?'selected=""':'';?>  value="bradesco">Bradesco</option>
                                                            <option <?= ( $dados['banco'] == 'santander')?'selected=""':'';?>  value="santander">Santander</option>
                                                            <option <?= ( $dados['banco'] == 'caixa')?'selected=""':'';?>  value="caixa">Caixa Econômica</option>
                                                            <option <?= ( $dados['banco'] == 'inter')?'selected=""':'';?>   value="inter">Inter</option>
                                                            <option <?= ( $dados['banco'] == 'original')?'selected=""':'';?>   value="original">Banco Original</option>
                                                        
                                                        </select>
														</div>
														<div class="form-group"  id="agencia">
                                                        <input type="text" class="form-control"  placeholder="Agência"  value="<?=$dados['agencia'];?>" name="agencia" id="pass" >
														</div>
                                                        
                                                        <div class="form-group"  id="nometitular">
                                                        <input type="text" class="form-control"  placeholder="Nome Títular" value="<?=$dados['nometitular'];?>" name="nometitular" id="pass" >
														
                                                        </div>
                                                        
                                                        <div class="form-group"  id="cpftitular">
                                                        <input type="text" class="form-control" placeholder="CPF Títular" value="<?=$dados['cpftitular'];?>" name="cpftitular" id="pass" >
														
														</div>
    
                                                        <div class="form-group"  id="tipoconta">
                                                        <select class="form-control" name="tipoconta" id="sexo" placeholder="Tipo Conta">
                                                            <option value="">Selecione o Tipo de Conta</option>
                                                            <option <?= ( $dados['tipoconta'] == 'CC')?'selected=""':''; ?> value="CC" >Conta Corrente</option>
					<option <?= ( $dados['tipoconta'] == 'CP')?'selected=""':''; ?> value="CP" >Conta Poupança</option>
                                                        </select>
														
                                                        </div>
                                                        
                                                        <div class="form-group"  id="conta">
                                                        <input type="text" class="form-control" placeholder="Conta" value="<?=$dados['conta'];?>" name="conta" id="pass" >
														
                                                        </div>
                                                        
                                                    
                                                        
                                                        <div class="form-group"  id="operacao">
                                                        <input type="text" class="form-control" value="<?=$dados['operacao'];?>" placeholder="Operação" name="operacao" >
														
                                                        </div>
                                                        
                                                        <div class="form-group" id="bitcoin"  >
                                                        <input type="text" class="form-control" placeholder="Bitcoin" value="<?=$dados['bitcoin'];?>"  name="bitcoin" id="pass">
														
														</div>
														
														<div class="form-group" id="litecoin"  >
                                                        <input type="text" class="form-control" placeholder="Litecoin" value="<?=$dados['litecoin'];?>" name="litecoin" id="pass">
														
														</div>
														
														<div class="form-group" id="ethereum" >
                                                        <input type="text" class="form-control" placeholder="Ethereum"  value="<?=$dados['ethereum'];?>" name="ethereum" id="pass">
														
                                                        </div>
                                                        
                                                      
													
														<button type="submit" id="submit" name="submit" class="btn btn-primary pull-right">Editar Dados de Pagamento</button>
													</div>
												</div>
                                            </form>
                                            <?php }?>
										</div>
									</div>
                                    <!-- Row end -->
                                    <script>  
									function abrir(){
				
				if( document.getElementById('banco').value != 'bitcoin' && document.getElementById('banco').value != 'litecoin' && document.getElementById('banco').value != 'ethereum'){
					
					
					document.getElementById('bitcoin').style.display = 'none';
					document.getElementById('litecoin').style.display = 'none';
					document.getElementById('ethereum').style.display = 'none';
					document.getElementById('agencia').style.display = 'block';
                    document.getElementById('conta').style.display = 'block';
					document.getElementById('nometitular').style.display = 'block';
					document.getElementById('cpftitular').style.display = 'block';
					document.getElementById('tipoconta').style.display = 'block';
					document.getElementById('operacao').style.display = 'block';

				}else if(document.getElementById('banco').value == 'bitcoin' ){
					
					
					document.getElementById('bitcoin').style.display = 'block';
					document.getElementById('litecoin').style.display = 'none';
					document.getElementById('ethereum').style.display = 'none';
					document.getElementById('agencia').style.display = 'none';
                    document.getElementById('conta').style.display = 'none';
					document.getElementById('nometitular').style.display = 'none';
					document.getElementById('cpftitular').style.display = 'none';
					document.getElementById('tipoconta').style.display = 'none';
					document.getElementById('operacao').style.display = 'none';

				}else if(document.getElementById('banco').value == 'litecoin' ){
					
					
					document.getElementById('bitcoin').style.display = 'none';
					document.getElementById('litecoin').style.display = 'block';
					document.getElementById('ethereum').style.display = 'none';
					document.getElementById('agencia').style.display = 'none';
                    document.getElementById('conta').style.display = 'none';
					document.getElementById('nometitular').style.display = 'none';
					document.getElementById('cpftitular').style.display = 'none';
					document.getElementById('tipoconta').style.display = 'none';
					document.getElementById('operacao').style.display = 'none';

				}else if(document.getElementById('banco').value == 'ethereum' ){
					
					
					document.getElementById('bitcoin').style.display = 'none';
					document.getElementById('litecoin').style.display = 'none';
					document.getElementById('ethereum').style.display = 'block';
					document.getElementById('agencia').style.display = 'none';
                    document.getElementById('conta').style.display = 'none';
					document.getElementById('nometitular').style.display = 'none';
					document.getElementById('cpftitular').style.display = 'none';
					document.getElementById('tipoconta').style.display = 'none';
					document.getElementById('operacao').style.display = 'none';

				}

			}
	
	
		</script>



									<!--*************************
									*************************
									*************************
									 Contact Form End
									*************************
									*************************
									*************************-->

								</div>

							</div>
							<!-- Card ends -->
							
						</div>
					</div>
					<!-- Row end -->
					
				</div>
				<!-- END: .main-content -->

				<?php include 'footer.php';?>