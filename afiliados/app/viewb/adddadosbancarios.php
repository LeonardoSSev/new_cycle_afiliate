

				<!-- BEGIN .page-header -->
				<header class="page-header">
					<div class="container-fluid">
						<div class="row">
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="page-title">
									<h3>Adicionar Dados Bancários</h3>
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
                                       
											<form action="" method="post">
												<div class="form-block">
													<div class="form-block-header">
														<h5>Adicionar Dados Bancários</h5>
													
													</div>
													<div class="form-block-body">
														<div class="form-group">
                                                        <select name="banco" onchange="abrir()" id="banco" class="form-control" placeholder="Nome do Banco">
                                <option value="">Selecione o Banco</option>
                                <option value="nubank">Nubank</option>
                                 <option value="bitcoin">Bitcoin</option>
								 <option value="litecoin">Litecoin</option> 
								 <option value="ethereum">Ethereum</option> 
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
                                                        
                                                        <div class="form-group" id="bitcoin"  style="display:none;">
                                                        <input type="text" class="form-control" placeholder="Bitcoin"  name="bitcoin" id="pass">
														
														</div>
														
														  
                                                        <div class="form-group" id="litecoin"  style="display:none;">
                                                        <input type="text" class="form-control" placeholder="Litecoin"  name="litecoin" id="pass">
														
														</div>
														
														  
                                                        <div class="form-group" id="ethereum"  style="display:none;">
                                                        <input type="text" class="form-control" placeholder="Ethereum"  name="ethereum" id="pass">
														
                                                        </div>
                                                        
                                                      
													
														<button type="submit" id="submit" name="submit" class="btn btn-primary pull-right">Adicionar Dados de Pagamento</button>
													</div>
												</div>
                                            </form>
                                            
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