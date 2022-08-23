<?php
    include 'application.php';
     
    $app = new App();
    $site = $app->loadModel("Subcategorias");
	$categoria = $_POST['categoria'];
  
    $pegasub = $site->pegaSubCategoria($app->conexao,$categoria);
	$sub = $pegasub->fetchAll(PDO::FETCH_ASSOC);
	print '<select class="form-control form-control-rounded" name="subcategoria">
              <option value="">Selecione a Sub-Categoria </option>';
	foreach($sub as $s){
		
		print "<option value=$s[subcategoria]>$s[subcategoria]</option>";
		
	
		
	}
	
	print '</select>';

	
	
?>