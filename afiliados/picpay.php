<?php

$urlSite     = "http://www.urlsite.com.br";

$urlPicPay = "https://appws.picpay.com/ecommerce/public/payments";

$XPicpayToken = "X-Picpay-Token: b731ff5c-7de5-451c-82d5-1d4ebc93f1f3";

$headers  = array ( 
      "Content-Type:application/json",
      $XPicpayToken
);

$buyer = array (
                "firstName" =>   "Nome",
                "lastName"  =>   "Sobrenome",
                "document"  =>   "12345678900",
                "email"     =>   "gmail@gmail.com",
                "phone"     =>   "+55 33 3333 3333" //  +55 27 12345-6789
           );

$dados = array ( 
           "referenceId"    =>   1245,
           "callbackUrl"    =>   $urlSite . "/picpay.php",
           "returnUrl"      =>   $urlSite . "/picpayReturn.php",
           "value"          =>   222.22,
           "buyer"          =>   $buyer
);

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $urlPicPay);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode ( $dados ) );
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false );
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
$erro  = curl_error($ch);

$resultPHP = json_decode($result, true);

print_r($resultPHP);


if ( isset ( $resultPHP["paymentUrl"] ) ){

   // header ("Location: " . $resultPHP["paymentUrl"]);

} else {

    print_r( $erro );

}

curl_close ($ch);

?>