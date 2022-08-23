<?php
    include 'application.php';
     
    $app = new App();
    $site = $app->loadModel("Financas");

    $pagarlucro = $site->PagarLucro($app->conexao);

   /* print "<script>alert('Pagamento efetuado com Sucesso !');</script>";
    print "<script>window.location='admusuarios';</script>";
*/
?>