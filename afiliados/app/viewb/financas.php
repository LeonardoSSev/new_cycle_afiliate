

				<!-- BEGIN .page-header -->
				<header class="page-header">
					<div class="container-fluid">
						<div class="row">
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="page-title">
									<h3>Finanças</h3>
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
								<div class="card-header">Finanças</div>
								<div class="card-body">
									<table id="basicExample" class="table table-bordered">
                                    <thead>
                          <tr>
				                            <th>#</th>
				                            <th>Descrição</th>
				                            <th>Entrada</th>
                                            <th>Saída</th>
                                            <th>Registro</th>
				                        </tr>
				                    </thead>
				                    <tbody>
				            <?php foreach($param['verfinancas']['financas'] as $financas){?>
							            <tr>
							
											<td><?= $financas['id'];?></td>
											<td><?= $financas['descricao'];?></td>
				                            <td>R$ <?= $financas['entrada'];?></td>
				                            <td>R$ <?= $financas['saida'];?></td>
											<td><?=$new2 = date('d-m-Y H:i:s', strtotime($financas['registro']));?></td>
							
				                        </tr>

							<?php } ?>
				                       
				                    </tbody>
                <tfoot>
              <tr>
				                            <th>#</th>
				                            <th>Descrição</th>
				                            <th>Entrada</th>
                                            <th>Saída</th>
                                            <th>Registro</th>
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