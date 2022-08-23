

				<!-- BEGIN .page-header -->
				<header class="page-header">
					<div class="container-fluid">
						<div class="row">
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="page-title">
									<h3>Saques Pagos</h3>
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
								<div class="card-header">Saques Pagos</div>
								<div class="card-body">
									<table id="basicExample" class="table table-bordered">
                                    <thead>
                         <tr>

				                            <th>#</th>
				                            <th>Usuário</th>
				                            <th>Valor</th>
											<th>Data Pago</th>
                                            <th>Registro</th>
                                            
				                        </tr>
				                    </thead>
				                    <tbody>
				                    <?php foreach($param['versaquesativos']['saquesativos'] as $saques){
										$valores = str_replace(".","",$saques['valor']);
									?>
									    <tr>
									
                                            <td><?= $saques['id'];?></td>
                                            <td><?= $_SESSION['usuario'];?></td>
                                            <td><?= $saques['valor'];?></td>
				                            <td><?=$saques['datapago'];?></td>
                                            
											<td><?= $saques['datasaque'];?></td>
											
				                        </tr>
				                       <?php } ?>
				                    </tbody>
               
                  </table>
								</div>
							</div>
						</div>
					</div>
					<!-- Row ends -->

					
					
				</div>
				<!-- END: .main-content -->

				<?php include 'footer.php';?>