<?php
	$app = new App();
	$doacoes = $app->loadModel("Doacoes");
?>

				<!-- BEGIN .page-header -->
				<header class="page-header">
					<div class="container-fluid">
						<div class="row">
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="page-title">
									<h3>Meus Logins</h3>
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
							<div class="card">
								<div class="card-header">Meus Logins</div>
								<div class="card-body">
									<table id="basicExample" class="table table-bordered">
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
						</div>
					</div>
					<!-- Row ends -->

					
					
				</div>
				<!-- END: .main-content -->

			<?php include 'footer.php';?>