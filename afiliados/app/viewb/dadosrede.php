

				<!-- BEGIN .page-header -->
				<header class="page-header">
					<div class="container-fluid">
						<div class="row">
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="page-title">
									<h3>Dados Upline</h3>
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
								<div class="card-header">Dados Upline</div>
								<div class="card-body">
									<table id="basicExample" class="table table-bordered">
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
						</div>
					</div>
					<!-- Row ends -->

					
					
				</div>
				<!-- END: .main-content -->

				<?php include 'footer.php';?>