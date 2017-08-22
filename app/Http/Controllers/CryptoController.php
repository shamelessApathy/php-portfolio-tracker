<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CryptoController extends Controller
{
	private $moneroWallet = "46ThMeiYtpyStR2wM642A52U5xy6VPUiqEWPZyGwEiuTXshbcbWLU9aJxXf7gTJLkGgAxZfG9efkGcmbHmo3dUG9G2mKLxV";
    // Gets Mining Info for each currency
    public function getMinerInfo()
    {
    	$ether = $this->getEthereumInfo();
    	$zcash = $this->getZcashInfo();

    	$minerinfo = array('ethereum'=>$ether,'zcash'=>$zcash);
    	return $minerinfo;
    }
    public function getEthereumInfo()
    {
    	$ethereumWallet = "F4A77798d0723a405188A43D413A19128e63be59";
    	$url = "http://dwarfpool.com/eth/api?wallet=".$ethereumWallet."&email=bcm811@gmail.com";
    	// Make request (seems rather simple)
    	$response = file_get_contents($url);
    	$decoded = json_decode($response);
    	return $decoded;
    }
    public function getZcashInfo()
    {
    	$zcashWallet = "t1X7qhXgWLnhE29nYXT5FPsUyMy7QKzqF9o";
    	$url = "http://dwarfpool.com/zec/api?wallet=".$zcashWallet."&email=bcm811@gmail.com";
    	// Make request
    	$response = file_get_contents($url);
    	// Decode JSON
    	$decoded = json_decode($response);
    	return $decoded;
    }
}
