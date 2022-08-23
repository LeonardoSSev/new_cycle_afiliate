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
									<h3>Doações Pendentes</h3>
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
								<div class="card-header">Doações Pendentes</div>
								<div class="card-body">
									<table id="basicExample" class="table table-bordered">
                                    <thead>
				                        <tr>
				                            <th>#</th>
				                            <th>Doador</th>
											<th>Recebedor</th>
				                            <th>Valor</th>
                                            <th>Ações</th>
				                        </tr>
				                    </thead>
				                    <tbody>
				                        <?php foreach($param['verdoacoesaprovados']['doacoesaprovados'] as $listacomprovantes){ 
											  $mostra = $user->pegaUsuariob($app->conexao,$listacomprovantes['useridb']);	
										?>
										<tr>
										
                                            <td><?= $listacomprovantes['id'];?></td>
											<td><?= $listacomprovantes['usuario'];?></td>
											<td><?= $mostra['usuario'];?></td>
				                            <td>R$ <?= $listacomprovantes['valor'];?></td>
                                            <td> </td>
										
				                        </tr>
				                       <?php } ?>
				                    </tbody>
                <tfoot>
                						<tr>
											<th>#</th>
				                            <th>Doador</th>
											<th>Recebedor</th>
				                            <th>Valor</th>
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