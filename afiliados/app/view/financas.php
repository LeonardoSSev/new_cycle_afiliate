
                							
				<div class="app-content">
					<div class="side-app">
												<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title">Finanças</h4>
								<ol class="breadcrumb pl-0">
									<li class="breadcrumb-item"><a href="./">Painel</a></li>
									<li class="breadcrumb-item active" aria-current="page">Finanças</li>
								</ol>
							</div>
							
						</div>
						<!--End Page header-->
												<div class="row">
							<div class="col-md-12 col-lg-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Finanças</div>
									<div class="card-options ">
										
									</div>
								</div>
								<div class="card-body">
                                	<div class="table-responsive">
									<table id="example" class="table table-striped table-bordered" >
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