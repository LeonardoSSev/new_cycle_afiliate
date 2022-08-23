
				<!-- BEGIN .page-header -->
				<header class="page-header">
					<div class="container-fluid">
						<div class="row">
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="page-title">
									<h3>Minha Rede</h3>
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

                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-content wrapper">
                                    <form action="" method="post">
                                        <input type='hidden' name='buscar' value='1' />
                                        <div class="form-group" style="margin-left:1%;margin-top:1%;">
                                            <h5>Buscar por usuario <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <div class="input-group">
                                                    <input type="text"
                                                            class="form-control"
                                                            name="username"
                                                            placeholder="Entre com o Usuário..."
                                                            required>

                                                    <button type="submit" class="btn btn-success btn-search" type="button">Buscar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                     
									
									<!--*************************
									*************************
									*************************
									 Contact Form Start
									*************************
									*************************
									*************************-->


                                    <div class="col-md-12" style="text-align:center;margin-left:1%;">
                           <?php if($_SESSION['userid'] !=  $param['verrede']['rede'][0]['userid']){ ?>
                            <form id="form-upbinario" action="" method="post">
                                <input type='hidden' name='up' value='1' />
                                <input name="idup" value="<?=$param['verrede']['rede'][0]['sponsorid'];?>" type="hidden">
                                <input name="upbinario" value="upbinario" type="hidden">
                                <a href="javascript:{}" onclick="document.getElementById('form-upbinario').submit(); return false;"  class="btn btn-danger" style="margin-left: -45px;">                                    
                                    <i class="fa fa-arrow-up"></i> NÍVEL ACIMA 
                                </a>
                            </form>
                                <?php } ?>
                        </div>

             
											
							<!-- Card end -->



                                    <script type='text/javascript' data-cfasync="false" src='https://www.google.com/jsapi'></script> 
            <script type='text/javascript' data-cfasync="false">

                google.load('visualization', '1', {packages: ['orgchart']});

                google.setOnLoadCallback(drawChart);

                function drawChart() {

                    var data = new google.visualization.DataTable();

                    data.addColumn('string', 'Name');

                    data.addColumn('string', 'Manager');

                    data.addColumn('string', 'ToolTip');

                    data.addRows([
						
						
						<?php 
						
						for($b=0;$b<=1000;$b++){
							
							if($b == '0'){
								if(empty($param['verrede']['rede'][$b]['cupom'])){break;}else{
						?>

                           [{v:'<?php print $param['verrede']['rede'][$b]['cupom']; ?>', f:'<div  class="node nivel-1" align="center" ><a  href="#" data-toggle="tooltip" data-html="true" title="Nome: <?=$param['verrede']['rede'][$b]['nome'];?>&#013;Email: <?=$param['verrede']['rede'][$b]['email'];?>&#013;Whatsapp: <?=$param['verrede']['rede'][$b]['whatsapp'];?>"    onclick="rede(<?php print $param['verrede']['rede'][$b]['id']; ?>)"   ><div class="avatar" align="center" ></div></a><p class="nome" align="center"><?php print $param['verrede']['rede'][$b]['usuario']; ?></p></div>'},'', ''],
						<?php }}else{
						if(empty($param['verrede']['rede'][$b]['cupom'])){break;}else{
						?>
						
          [{v:'<?php print $param['verrede']['rede'][$b]['cupom']; ?>', f:'<div  class="node nivel-1" align="center"><a  href="#"  data-ls-module="popover" data-trigger="hover" title="Nome: <?=$param['verrede']['rede'][$b]['nome'];?>&#013;Email: <?=$param['verrede']['rede'][$b]['email'];?>&#013;Whatsapp: <?=$param['verrede']['rede'][$b]['whatsapp'];?>" onclick="rede(<?php print $param['verrede']['rede'][$b]['id']; ?>)" data-content="<p>Conteúdo do popover 3</p>" data-placement="left" ><div class="avatar" align="center" ></div></a><p class="nome" align="center"><?php print $param['verrede']['rede'][$b]['usuario']; ?></p></div>'}, '<?php print $param['verrede']['rede'][$b]['sponsorid']; ?>', ''],
						
					
               
                  <?php }}}?>
					]);

                        var chart = new google.visualization.OrgChart(document.getElementById('rede'));

                chart.draw(data, {allowHtml: true, size: 'large'});

            }

</script>

            <div id="rede"></div>



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

                
     
<style>
#rede .google-visualization-orgchart-node {
    text-align: center;
    vertical-align: middle;
    font-family: inherit !important;
    cursor: default;
    border: none !important;
    -moz-border-radius: 0 !important;
    -webkit-border-radius: 0 !important;
    -webkit-box-shadow: none !important;
    -moz-box-shadow: none !important;
    background: none !important;    
}

#rede .google-visualization-orgchart-noderow-large {
    height: 70px !important;
}

#rede .node {
    margin: 0 auto !important;
    width: 100px !important;
    text-align: center;    
}

#rede .node a {
    margin: 0 auto !important;
    padding: 0 !important;
}

#rede .avatar:hover {
    opacity: 0.8;    
}

#rede .avatar {
    margin: 0 auto !important;
    cursor: pointer;
}

#rede .node.empty .name {
    font-weight: normal;
}

#rede .node.empty .avatar {
    width: 42px;
    height: 42px;
    background: url('images/vazio.png') center center;
	background-size: 40px;
}

#rede .nivel-1 .avatar {
    width: 42px;
    height: 42px;
    background: url('images/boneco.png') no-repeat center center;
	background-size: 40px;
}




#rede .nivel-1.pendente .avatar {
    width: 42px;
    height: 42px;
    background: url('images/boneco.png') no-repeat center center;
	background-size: 40px;	
}

#rede .nivel-2.liberado .avatar {
    width: 42px;
    height: 42px;
    background: url('images/boneco.png') no-repeat center center; 
	background-size: 40px;
}

#rede .nivel-1.lista-negra .avatar {
    width: 42px;
    height: 42px;
    background: url('images/boneco.png') no-repeat center center;
}

#rede .nivel-liberado .avatar {
    width: 42px;
    height: 42px;
    background: url('images/boneco.png') no-repeat center center;
    background-size: 48px;
}

.node.completo .avatar {
    width: 42px;
    height: 42px;
    background: url('img/bronze.jpg') no-repeat center center !important;
    background-size: 30px !important;
}

#rede .nome {
    font-weight: normal;
	font-size: 12px;
	text-align:center;
}

</style>


<form action="" method="post" id="redey">

<input type="hidden" name="rede" value="1" />

<input type="hidden" name="cupom" id="cupom" />

</form>

<script>



function rede(i){

 

    document.getElementById( 'cupom' ).value = i;

    document.getElementById( 'redey' ).submit();

}

</script>




				<?php include 'footer.php';?>