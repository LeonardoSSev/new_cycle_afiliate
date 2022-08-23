<?php
$app = new App();
$user = $app->loadModel("Bancarios");
?>
                							
				<div class="app-content">
					<div class="side-app">
												<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title">Adicionar Dados Bancários</h4>
								<ol class="breadcrumb pl-0">
									<li class="breadcrumb-item"><a href="./">Painel</a></li>
									<li class="breadcrumb-item active" aria-current="page">Adicionar Dados Bancários</li>
								</ol>
							</div>
							
						</div>
						<!--End Page header-->
												<div class="row">
							<div class="col-md-12 col-lg-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Adicionar Dados Bancários</div>
									<div class="card-options ">
										
									</div>
								</div>
								<div class="card-body">
                                
									
									 <form action="" method="post">
												<div class="form-block">
													<div class="form-block-header">
														<h5></h5>
													
													</div>
													<div class="form-block-body">
														<div class="form-group">
                                                        <select name="banco" onchange="abrir()" id="banco" class="form-control" placeholder="Nome do Banco">
                                <option value="">Selecione o Banco</option>
                                <option value="nubank">Nubank</option>
                                 <option value="picpay">Picpay</option>
                                <option value="bancoc6">Banco C6</option>
								<option value="pix">PIX</option>
								<option value="itau">Itaú Unibanco</option>
                                <option value="bancodobrasil">Banco do Brasil</option>
                                <option value="bradesco">Bradesco</option>
                                <option value="santander">Santander</option>
                                <option value="caixa">Caixa Econômica</option>
                                <option  value="inter">Inter</option>
                                 <option  value="original">Banco Original</option>
                            </select>
														</div>
														<div class="form-group"  id="agencia">
                                                        <input type="text" class="form-control"  placeholder="Agência" name="agencia" id="pass" >
														</div>
                                                        
                                                        <div class="form-group"  id="nometitular">
                                                        <input type="text" class="form-control"  placeholder="Nome Títular" name="nometitular" id="pass" >
														
                                                        </div>
                                                        
                                                        <div class="form-group"  id="cpftitular">
                                                        <input type="text" class="form-control" placeholder="CPF Títular" name="cpftitular" id="pass" >
														
														</div>
    
                                                        <div class="form-group"  id="tipoconta">
                                                        <select class="form-control" name="tipoconta" id="sexo" placeholder="Tipo Conta">
                                                            <option value="">Selecione o Tipo de Conta</option>
                                                            <option  value="CC" >Conta Corrente</option>
                                                            <option  value="CP" >Conta Poupança</option>
                                                        </select>
														
                                                        </div>
                                                        
                                                        <div class="form-group"  id="conta">
                                                        <input type="text" class="form-control" placeholder="Conta" name="conta" id="pass" >
														
                                                        </div>
                                                        
                                                    
                                                        
                                                        <div class="form-group"  id="operacao">
                                                        <input type="text" class="form-control" placeholder="Operação" name="operacao" >
														
                                                        </div>
                                                        
                                                        <div class="form-group" id="picpay"  style="display:none;">
                                                        <input type="text" class="form-control" placeholder="Picpay"  name="picpay" id="pass">
														
														</div>
													
													
													
														<button type="submit" id="submit" name="submit" class="btn btn-primary pull-right">Adicionar Dados de Pagamento</button>
													</div>
												</div>
                                            </form>
                 

                 
                </div>
            </div>
        </div>
    </main>


    <script>
			function abrir(){
				
				if( document.getElementById('banco').value != 'picpay' ){
					
					
					document.getElementById('picpay').style.display = 'none';
					document.getElementById('agencia').style.display = 'block';
                    document.getElementById('conta').style.display = 'block';
					document.getElementById('nometitular').style.display = 'block';
					document.getElementById('cpftitular').style.display = 'block';
					document.getElementById('tipoconta').style.display = 'block';
					document.getElementById('operacao').style.display = 'block';

				}else if(document.getElementById('banco').value == 'picpay' ){
					
					
					document.getElementById('picpay').style.display = 'block';
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