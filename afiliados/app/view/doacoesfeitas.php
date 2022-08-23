<?php
$app = new App();
$user = $app->loadModel("Bancarios");
?>
                							
				<div class="app-content">
					<div class="side-app">
												<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title">Doações Feitas</h4>
								<ol class="breadcrumb pl-0">
									<li class="breadcrumb-item"><a href="./">Painel</a></li>
									<li class="breadcrumb-item active" aria-current="page">Doações Feitas</li>
								</ol>
							</div>
							
						</div>
						<!--End Page header-->
												<div class="row">
							<div class="col-md-12 col-lg-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Doações Feitas</div>
									<div class="card-options ">
										
									</div>
								</div>
								<div class="card-body">
                                	<div class="table-responsive">
									<table id="example" class="table table-striped table-bordered" >
										<thead>
				                        <tr>
				                            <th>#</th>
				                            <th>Doador</th>
											<th>Recebedor</th>
											<th>Comprovante</th>
				                            <th>Valor</th>
                                            <th>Ações</th>
				                        </tr>
				                    </thead>
				                    <tbody>
				                        <?php foreach($param['verdoacoesaprovados']['doacoesaprovados'] as $listacomprovantes){ 
											  $mostra = $user->pegaUsuariob($app->conexao,$listacomprovantes['useridb']);	
										?>
										<tr>
										|
                                            <td><?= $listacomprovantes['id'];?></td>
											<td><?= $listacomprovantes['usuario'];?></td>
											<td><?= $mostra['usuario'];?></td>
											<td><a href="vercomprovante?i=<?=$listacomprovantes['id'];?>" class="btn btn-primary">VER COMPROVANTE</a></td>
				                            <td>R$ <?= $listacomprovantes['valor'];?></td>
                                            <td><a href="#"  class="btn btn-primary">APROVADO</a> </td>
										
				                        </tr>
				                       <?php } ?>
				                    </tbody>
                <tfoot>
                						<tr>
											<th>#</th>
				                            <th>Doador</th>
											<th>Recebedor</th>
											<th>Comprovante</th>
				                            <th>Valor</th>
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