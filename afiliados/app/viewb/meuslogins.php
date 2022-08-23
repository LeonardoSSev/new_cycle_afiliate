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
				                            <th>Nível</th>
                                            <th>Doações Feitas</th>
                                            <th>Doações Recebidas</th>
				                        </tr>
				                    </thead>
				                    <tbody>
				                        <?php foreach($param['vermeuslogins']['meuslogins'] as $meuslogins){
											$doacoesfeitas = $doacoes->Doacoesfeitas($app->conexao,$meuslogins['userid']);
											$doacoesrecebidas = $doacoes->Doacoesrecebidas($app->conexao,$meuslogins['userid']);	
											?>
										<tr>
										
                                            <td><?= $meuslogins['id'];?></td>
                                            <td><?= $meuslogins['usuario'];?></td>
				                            <td><?= $meuslogins['fase'];?></td>
                                            <td><?= $doacoesfeitas;?></td>
											<td><?= $doacoesrecebidas;?></td>
				                        </tr>
				                       <?php } ?>
				                    </tbody>
                <tfoot>
               							<tr>
											<th>#</th>
				                            <th>Usuário</th>
				                            <th>Nível</th>
                                            <th>Doações Feitas</th>
                                            <th>Doações Recebidas</th>
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