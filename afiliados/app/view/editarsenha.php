<?php
$app = new App();
$user = $app->loadModel("Bancarios");
?> 
                							
				<div class="app-content">
					<div class="side-app">
												<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title">Segurança</h4>
								<ol class="breadcrumb pl-0">
									<li class="breadcrumb-item"><a href="./">Painel</a></li>
									<li class="breadcrumb-item active" aria-current="page">Editar Senha</li>
								</ol>
							</div>
							
						</div>
						<!--End Page header-->
												<div class="row">
							<div class="col-md-12 col-lg-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Editar Senha</div>
									<div class="card-options ">
										
									</div>
								</div>
								<div class="card-body">
                                	  <form action="" method="post" id="editar">

<div class="row">

<div class="col-12 col-md-4">
    <div class="form-group">
        <label for="textinput">Senha Atual</label>
        <input type="password" class="form-control" required name="senhaatual" id="senhaatual">
    </div>


</div>

</div>

<div class="row">

    <div class="col-12 col-md-4">
        <div class="form-group">
            <label for="textinput">Nova Senha</label>
            <input type="password" class="form-control" required  name="novasenha" id="novasenha">
        </div>
    
    
    </div>
    <div class="col-12 col-md-4">
    
        <div class="form-group">
            <label for="pass">Confirme Nova Senha</label>
            <input type="password" class="form-control" required  name="cnovasenha" id="cnovasenha">
        </div>
    
    </div>
    </div>


    <div class="row">
    <div class="col-12 col-md-4">
        
        <div class="form-group">
        <div id="altera">
            <input type="submit" name="ok" onclick="atualizarsenha()" class="btn btn-primary" value="ATUALIZAR SENHA">
        </div> </div>

    </div>
    </div>

</div>
</form>
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