<?php
    Class Cotacao{

		public function pegaCotacaoBTC(){
			
			$url = "https://blockchain.info/ticker";
			$json = file_get_contents( $url );
			$data = json_decode( $json, TRUE );
			
			$rate = $data[ "BRL" ][ "last" ];
			$bitcoinPrice = round( $rate, 8 );
			
			return $bitcoinPrice;
				
	}
	
	public function pegaCotacaoBRL(){
			
			$url = "https://blockchain.info/ticker";
			$json = file_get_contents( $url );
			$data = json_decode( $json, TRUE );
			
			$rate = $data[ "USD" ][ "last" ];
			$bitcoinPrice = round( $rate, 8 );
			
			$urlb = "https://blockchain.info/ticker";
			$jsonb = file_get_contents( $urlb );
			$datab = json_decode( $jsonb, TRUE );
			
			$rateb = $datab[ "BRL" ][ "last" ];
			$bitcoinPriceb = round( $rateb, 8 );
			
			$real = $bitcoinPriceb / $bitcoinPrice;
			
			return round( $real, 2 );
				
	}

		public function pegaCotacaoUSD(){
			
			$url = "https://blockchain.info/ticker";
			$json = file_get_contents( $url );
			$data = json_decode( $json, TRUE );
			
			$rate = $data[ "USD" ][ "last" ];
			$bitcoinPrice = round( $rate, 8 );
			
			return $bitcoinPrice;
				
	}
		
		public function pegaCotacaoETH(){
			
			$url = "https://api.bittrex.com/api/v1.1/public/getticker?market=USDT-ETH";
			$json = file_get_contents( $url );
			$data = json_decode( $json, TRUE );
			
			//$rate = $data[ "BRL" ][ "last" ];
			//$bitcoinPrice = round( $rate, 8 );
			
			return  round($data['result']['Last'],2);
				
		}
		
		public function pegaCotacaoXRP(){
			
			$url = "https://api.bittrex.com/api/v1.1/public/getticker?market=USDT-XRP";
			$json = file_get_contents( $url );
			$data = json_decode( $json, TRUE );
			
			//$rate = $data[ "BRL" ][ "last" ];
			//$bitcoinPrice = round( $rate, 8 );
			
			return $data['result']['Last'];
				
		}
		
		public function pegaCotacaoLTC(){
			
			$url = "https://api.bittrex.com/api/v1.1/public/getticker?market=USDT-LTC";
			$json = file_get_contents( $url );
			$data = json_decode( $json, TRUE );
			
			//$rate = $data[ "BRL" ][ "last" ];
			//$bitcoinPrice = round( $rate, 8 );
			
			return round($data['result']['Last'],2);
				
		}
		
		public function pegaCotacaoXMR(){
			
			$url = "https://api.bittrex.com/api/v1.1/public/getticker?market=USDT-XMR";
			$json = file_get_contents( $url );
			$data = json_decode( $json, TRUE );
			
			//$rate = $data[ "BRL" ][ "last" ];
			//$bitcoinPrice = round( $rate, 8 );
			
			return $data['result']['Last'];
				
		}
		
		public function pegaCotacaoDASH(){
			
			$url = "https://api.bittrex.com/api/v1.1/public/getticker?market=USDT-DASH";
			$json = file_get_contents( $url );
			$data = json_decode( $json, TRUE );
			
			//$rate = $data[ "BRL" ][ "last" ];
			//$bitcoinPrice = round( $rate, 8 );
			
			return $data['result']['Last'];
				
		}
		
		public function pegaCotacaoXEM(){
			
			$url = "https://api.bittrex.com/api/v1.1/public/getticker?market=USDT-XEM";
			$json = file_get_contents( $url );
			$data = json_decode( $json, TRUE );
			
			//$rate = $data[ "BRL" ][ "last" ];
			//$bitcoinPrice = round( $rate, 8 );
			
			return $data['result']['Last'];
				
		}

    }
?>