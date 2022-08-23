<?php
$app = new App();
$user = $app->loadModel("Bancarios");
?>
                							
				<div class="app-content">
					<div class="side-app">
												<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title">Dados Upline</h4>
								<ol class="breadcrumb pl-0">
									<li class="breadcrumb-item"><a href="./">Painel</a></li>
									<li class="breadcrumb-item active" aria-current="page">Dados Upline</li>
								</ol>
							</div>
							
						</div>
						<!--End Page header-->
												<div class="row">
							<div class="col-md-12 col-lg-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Dados Upline</div>
									<div class="card-options ">
										
									</div>
								</div>
								<div class="card-body">
                                	<div class="table-responsive">
									<table id="example" class="table table-striped table-bordered" >
										 <thead>
				                        <tr>
                                        <th>Nível Upline</th>
				                            <th>Usuário</th>
                                            <th>Nome</th>
				                            <th>Whatsapp</th>
                                            <th>Email</th>
                                         
				                        </tr>
				                    </thead>
				                    <tbody>
                            <?php 
                            $a = 1;
                            foreach($param['verrede']['redeupline'] as $redeupline){?>
							            <tr>
							
                                        <td>Upline <?=$a;?></td>
											<td><?= $redeupline['usuario'];?></td>
				                            <td> <?= $redeupline['nome'];?></td>
				                            <td> <?= $redeupline['whatsapp'];?></td>
                                            <td><?= $redeupline['email'];?></td>
											
							
				                        </tr>

							<?php $a++;} ?>
				                       
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