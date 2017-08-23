<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CryptoController extends Controller
{
	
    // Gets Mining Info for each currency
    public function getMinerInfo()
    {
    	$ether = $this->getEthereumInfo();
    	$zcash = $this->getZcashInfo();
    	$monero = $this->getMoneroInfo();
    	$current_prices = $this->getCurrentPrices();
    	$minerinfo = array('ethereum'=>$ether,'zcash'=>$zcash,'monero'=>$monero,'current_prices'=>$current_prices);
    	return $minerinfo;
    }
    public function getEthereumInfo()
    {
    	$ethereumWallet = "F4A77798d0723a405188A43D413A19128e63be59";
    	$url = "http://dwarfpool.com/eth/api?wallet=".$ethereumWallet."&email=bcm811@gmail.com";
    	// Make request (seems rather simple)
    	$response = file_get_contents($url);
    	$decoded = json_decode($response,2);
    	return $decoded;
    }
    public function getZcashInfo()
    {
    	$zcashWallet = "t1X7qhXgWLnhE29nYXT5FPsUyMy7QKzqF9o";
    	$url = "http://dwarfpool.com/zec/api?wallet=".$zcashWallet."&email=bcm811@gmail.com";
    	// Make request
    	$response = file_get_contents($url);
    	// Decode JSON
    	$decoded = json_decode($response,2);
    	return $decoded;
    }
    public function getMoneroInfo()
    {
    	$moneroWallet = "46ThMeiYtpyStR2wM642A52U5xy6VPUiqEWPZyGwEiuTXshbcbWLU9aJxXf7gTJLkGgAxZfG9efkGcmbHmo3dUG9G2mKLxV";
    	$url = "http://dwarfpool.com/xmr/api?wallet=".$moneroWallet."&email=bcm811@gmail.com";

    	// Make request
    	$response = file_get_contents($url);
    	// json_decode($data, FLAG) 1 = StdClass Object    2 = Array
    	$decoded = json_decode($response, 2);
    	return $decoded;
    }
    public function getCurrentPrices()
    {
    	$ethereum_price = file_get_contents("https://min-api.cryptocompare.com/data/price?fsym=ETH&tsyms=BTC,USD,EUR");
    	$zcash_price = file_get_contents("https://min-api.cryptocompare.com/data/price?fsym=ZEC&tsyms=BTC,USD,EUR");
    	$monero_price = file_get_contents("https://min-api.cryptocompare.com/data/price?fsym=XMR&tsyms=BTC,USD,EUR");
    	$price_data = array('ethereum_price'=>$ethereum_price,'zcash_price'=>$zcash_price,'monero_price'=>$monero_price);
    	return $price_data;
    }
}
