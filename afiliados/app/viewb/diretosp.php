

				<!-- BEGIN .page-header -->
				<header class="page-header">
					<div class="container-fluid">
						<div class="row">
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="page-title">
									<h3>Diretos Pendentes</h3>
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
								<div class="card-header">Diretos Pendentes</div>
								<div class="card-body">
									<table id="basicExample" class="table table-bordered">
                                    <thead>
                          <tr>
                                                    <th>ID Usuário</th>
                                                    <th>Usuário</th>
                                                    <th>Nome</th>
                                                    <th>Whatsapp</th>
                                                    <th>Email</th>
                                                </tr>
				                    </thead>
				                    <tbody>
                                               <?php foreach($param["verdiretos"]["diretosp"] as $diretop) { ?>
                                                <tr>
                                                    <td><?=$diretop["userid"]?></span></td>
                                                    <td><?=$diretop["usuario"]?></td>
                                                    <td><?=$diretop["nome"]?></td>
                                                    <td><?=$diretop["whatsapp"]?></td>
                                                    <td><?=$diretop["email"]?></td>
                                                   </tr>
                                                <?php } ?>
                                            </tbody>
                <tfoot>
                 <tr>
                                                    <th>ID Usuário</th>
                                                    <th>Usuário</th>
                                                    <th>Nome</th>
                                                    <th>Whatsapp</th>
                                                    <th>Email</th>
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