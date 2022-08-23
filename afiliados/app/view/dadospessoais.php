<?php
$app = new App();
$user = $app->loadModel("Bancarios");
?>
                							
				<div class="app-content">
					<div class="side-app">
												<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title">Dados Pessoais</h4>
								<ol class="breadcrumb pl-0">
									<li class="breadcrumb-item"><a href="./">Painel</a></li>
									<li class="breadcrumb-item active" aria-current="page">Dados Pessoais</li>
								</ol>
							</div>
							
						</div>
						<!--End Page header-->
												<div class="row">
							<div class="col-md-12 col-lg-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Dados Pessoais</div>
									<div class="card-options ">
										
									</div>
								</div>
								<div class="card-body">
                                	
									 <?php foreach($param['verdados']['dados'] as $dados){ ?>
				<form action="" method="post" id="dadospessoais">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Nome</label>
                                        <input type="text" id="nome" value="<?=$dados['nome'];?>" class="form-control"  placeholder="Nome">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Email</label>
                                        <input type="email" id="email" value="<?=$dados['email'];?>" class="form-control" 
                                            placeholder="Email">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">CPF</label>
                                        <input type="text" id="cpf" value="<?=$dados['cpf'];?>" class="form-control"  placeholder="CPF">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Whatsapp</label>
                                        <input type="text" id="whatsapp" value="<?=$dados['whatsapp'];?>" class="form-control" 
                                            placeholder="Whatsapp">
                                    </div>
                                </div>
                               <div id="altera">
                                <button type="button" onclick="atualizardadospessoais()" class="btn btn-primary d-block mt-3">Alterar Dados</button>
                                </div>
                            </form>
                            <?php }?>
									
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