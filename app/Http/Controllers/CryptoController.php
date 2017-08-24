<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CryptoController extends Controller
{
	
    // Gets Mining Info for each currency
    public function getMinerInfo()
    {
    	$ether = $this->getEthereumInfo();
    	$this->ether_hashrate = $ether['total_hashrate'];
    	$zcash = $this->getZcashInfo();
    	$monero = $this->getMoneroInfo();
    	$current_prices = $this->getCurrentPrices();
    	$ethereum_profit = $this->getProfitCalculator('ETH') * $current_prices['ETH']['USD'];
    	$ether['profit'] = $ethereum_profit;
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
    	$all_prices = file_get_contents("https://min-api.cryptocompare.com/data/pricemulti?fsyms=BTC,ETH,ZEC,XMR,DCR&tsyms=USD");
    	$all_prices = json_decode($all_prices,2);
    	return $all_prices;
    }
    /**
    *
	* Calculates Ethereum Mining Profit (without electric costs) based on formula, makes GET request for blocktime, 
	* difficulty and network hashrate
	*
	*/
    public function calculateEthereum()
    {
    	// Found this particular API specifically for ETH
    	$info =file_get_contents('https://etherchain.org/api/miningEstimator');
    	$info = json_decode($info,2);
    	$difficulty = $info['data'][0]['difficulty'];
    	$blocktime = $info['data'][0]['blockTime'];
    	$yourHashRateGH =$this->ether_hashrate;
    	// Get Entire Network's hashing power
    	//$networkHashGH = $info['data'][0]['hashRate']+0;
    	$networkHashGH = ($difficulty / $blocktime) / 1e9;
    	// Get Your Ratio
    	$probability = $yourHashRateGH * 1e6 / ($networkHashGH * 1e9);
    	// Based on a 30 day month
    	$seconds_in_month = 2592000;
    	$blocks_per_minute = 60.0 / $blocktime;
    	// Based on current block reward
    	$block_reward = 5.0;
    	$eth_per_min = $blocks_per_minute * $block_reward;
    	$earnings_per_min = $probability * $eth_per_min;
    	$earnings_per_hour = $earnings_per_min * 60;
    	$earnings_per_day = $earnings_per_hour * 24;
    	return $earnings_per_day;
    }
    public function getProfitCalculator($currency)
    {
    	switch ($currency)
    	{
    		# Fucking make sure you RETURN something if you want it's value
    		case "ETH": return $this->calculateEthereum();
    		break;
    		default : null;
    		break;
    	}
    }
    public function test()
    {
    	$this->ether_hashrate = 100;
    	var_dump($this->getProfitCalculator('ETH'));
    }
}
