

				<!-- BEGIN .page-header -->
				<header class="page-header">
					<div class="container-fluid">
						<div class="row">
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="page-title">
									<h3>Dados Pessoais</h3>
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


							<!-- Card starts -->
							<div class="card">
								<div class="card-body">
									
									<!--*************************
									*************************
									*************************
									 Contact Form Start
									*************************
									*************************
									*************************-->



									<!-- Row start -->
									<div class="row justify-content-center gutters">
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <?php foreach($param['verdados']['dados'] as $dados){ ?>
											<form action="" method="post">
												<div class="form-block">
													<div class="form-block-header">
														<h5>Dados Pessoais</h5>
													
													</div>
													<div class="form-block-body">
														
														<div class="form-group">
															<input type="text" class="form-control" value="<?=$dados['nome'];?>" id="name" name="nome" placeholder="Nome" required>
														</div>
														<div class="form-group">
															<input type="email" class="form-control" value="<?=$dados['email'];?>" id="email" name="email" placeholder="Email" readonly required>
														</div>
														<div class="form-group">
															<input type="number" class="form-control" value="<?=$dados['whatsapp'];?>" id="mobile" name="whatsapp" placeholder="Whatsapp" required>
														</div>
														<div class="form-group">
															<input type="text" class="form-control" value="<?=$dados['cpf'];?>" id="subject" name="cpf" placeholder="Documento" readonly required>
														</div>
													
														<button type="submit" id="submit" name="submit" class="btn btn-primary pull-right">Atualizar Dados</button>
													</div>
												</div>
                                            </form>
                                            <?php }?>
										</div>
									</div>
									<!-- Row end -->



									<!--*************************
									*************************
									*************************
									 Contact Form End
									*************************
									*************************
									*************************-->

								</div>

							</div>
							<!-- Card ends -->
							
						</div>
					</div>
					<!-- Row end -->
					
				</div>
				<!-- END: .main-content -->

				<?php include 'footer.php';?>