<?php
	$app = new App();
	$doacoes = $app->loadModel("Doacoes");
?>
                							
				<div class="app-content">
					<div class="side-app">
												<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title">Meus Logins por CPF</h4>
								<ol class="breadcrumb pl-0">
									<li class="breadcrumb-item"><a href="./">Painel</a></li>
									<li class="breadcrumb-item active" aria-current="page">Meus Logins por CPF</li>
								</ol>
							</div>
							
						</div>
						<!--End Page header-->
												<div class="row">
							<div class="col-md-12 col-lg-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Meus Logins por CPF</div>
									<div class="card-options ">
										
									</div>
								</div>
								<div class="card-body">
                                	<div class="table-responsive">
									<table id="example" class="table table-striped table-bordered" >
										 <thead>
				                        <tr>
				                            <th>#</th>
				                            <th>Usuário</th>
                                            <th>Doações Pendentes</th>
                                            <th>Doações à Liberar</th>
                                            <th>Ações</th>
				                        </tr>
				                    </thead>
				                    <tbody>
				                        <?php foreach($param['vermeuslogins']['meuslogins'] as $meuslogins){
                                            $doacoespendentes = $doacoes->Doacoespendentes($app->conexao,$meuslogins['userid']);
											$doacoesaliberar = $doacoes->Doacoesaliberar($app->conexao,$meuslogins['userid']);
                                        ?>
										<tr>
										
                                            <td><?= $meuslogins['userid'];?></td>
                                            <td><?= $meuslogins['usuario'];?></td>
                                            <td><?= $doacoespendentes;?></td>
                                            <td><?= $doacoesaliberar;?></td>
                                            <td> <a data-toggle="modal" data-target="#exampleModal<?=$meuslogins['userid'];?>" class="btn btn-primary text-white">Logar no Usuário</a></td>
					<!-- Modal -->
                    <div class="modal fade" id="exampleModal<?=$meuslogins['userid'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Dados Bancários</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
                                            <!-- Form inside modal -->
						<form action="logar" role="form" method="post">
                        <input type="hidden" value="1" name="logar" />

							<div class="modal-body with-padding">
								<div class="block-inner text-danger">
									<h6 class="heading-hr">Entre SOMENTE com sua Senha para o Usuário <?php print $meuslogins['usuario'];?></small></h6>
								</div>


								<div class="form-group">
									<div class="row">
									<div class="col-sm-6">
										<label>Login</label>
										<input type="text" name="usuario" value="<?php print $meuslogins['usuario'];?>" readonly="readonly" placeholder="Digite seu Login" class="form-control">
									</div>

									<div class="col-sm-6">
										<label class="control-label">Senha</label>
										<input type="password" name="senha" placeholder="Digite sua Senha" required="required" class="form-control">
									</div>
                                   
									</div>
								</div>

								
							</div>
                           
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-primary">Entrar</button>
							</div>
                            </form>
						</div>
					</div>
				</div>
			<!-- /form modal -->
                                        
                                        </tr>
				                       <?php } ?>
				                    </tbody>
                <tfoot>
                                        <tr>
				                            <th>#</th>
				                            <th>Usuário</th>
                                            <th>Doações Feitas</th>
                                            <th>Doações Recebidas</th>
                                            <th>Ações</th>
				                        </tr>
                </tfoot>
                  </table>
								</div>
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