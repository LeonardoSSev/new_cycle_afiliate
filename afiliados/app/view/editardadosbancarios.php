<?php
$app = new App();
$user = $app->loadModel("Bancarios");
?>
                							
				<div class="app-content">
					<div class="side-app">
												<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title">Editar Dados Bancários</h4>
								<ol class="breadcrumb pl-0">
									<li class="breadcrumb-item"><a href="./">Painel</a></li>
									<li class="breadcrumb-item active" aria-current="page">Editar Dados Bancários</li>
								</ol>
							</div>
							
						</div>
						<!--End Page header-->
												<div class="row">
							<div class="col-md-12 col-lg-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Editar Dados Bancários</div>
									<div class="card-options ">
										
									</div>
								</div>
								<div class="card-body">
                                	<?php foreach($param['vereditardadosbancarios']['editardadosbancarios'] as $dados){ ?>
											<form action="" method="post">
												<div class="form-block">
													<div class="form-block-header">
														<h5></h5>
													
													</div>
													<div class="form-block-body">
														<div class="form-group">
                                                        <select name="banco"  onchange="abrir()" id="banco"  class="form-control">
                                                            <option value="">Selecione o Banco</option>
                                                            <option <?= ( $dados['banco'] == 'nubank')?'selected=""':'';?>  value="nubank">Nubank</option>
                                                       		<option <?= ( $dados['banco'] == 'picpay')?'selected=""':'';?>  value="picpay">Picpay</option> 
                                                            <option <?= ( $dados['banco'] == 'bancoc6')?'selected=""':'';?>  value="bancoc6">Banco C6</option>
															<option <?= ( $dados['banco'] == 'pix')?'selected=""':'';?>  value="pix">PIX</option>
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
                                                        
                                                        <div class="form-group" id="picpay"  >
                                                        <input type="text" class="form-control" placeholder="Picpay" value="<?=$dados['picpay'];?>"  name="picpay" id="pass">
														
														</div>
														
													
													
                                                      
													
														<button type="submit" id="submit" name="submit" class="btn btn-primary pull-right">Editar Dados de Pagamento</button>
													</div>
												</div>
                                            </form>
                                            <?php }?>

                 
                </div>
            </div>
        </div>
    </main>


    <script>  
									function abrir(){
				
				if( document.getElementById('banco').value != 'bitcoin' &&  document.getElementById('banco').value != 'ethereum'){
					
					
					document.getElementById('bitcoin').style.display = 'none';
					document.getElementById('ethereum').style.display = 'none';
					document.getElementById('agencia').style.display = 'block';
                    document.getElementById('conta').style.display = 'block';
					document.getElementById('nometitular').style.display = 'block';
					document.getElementById('cpftitular').style.display = 'block';
					document.getElementById('tipoconta').style.display = 'block';
					document.getElementById('operacao').style.display = 'block';

				}else if(document.getElementById('banco').value == 'bitcoin' ){
					
					
					document.getElementById('bitcoin').style.display = 'block';
					document.getElementById('ethereum').style.display = 'none';
					document.getElementById('agencia').style.display = 'none';
                    document.getElementById('conta').style.display = 'none';
					document.getElementById('nometitular').style.display = 'none';
					document.getElementById('cpftitular').style.display = 'none';
					document.getElementById('tipoconta').style.display = 'none';
					document.getElementById('operacao').style.display = 'none';

				}else if(document.getElementById('banco').value == 'ethereum' ){
					
					
					document.getElementById('bitcoin').style.display = 'none';
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
                                </div>
								<!-- table-wrapper -->
							</div>
							<!-- section-wrapper -->

							</div>
						</div>

					</div>
				</div><!-- end app-content-->
			</div>

     <?php include 'footer.php';?>