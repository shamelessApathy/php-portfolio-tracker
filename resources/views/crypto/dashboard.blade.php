<?php 
$ethereum = $minerinfo['ethereum'];
$zcash = $minerinfo['zcash'];
$monero = $minerinfo['monero'];
$current_prices = $minerinfo['current_prices'];
?>
<div class='crypto-dash-container'>
<details>
	<summary>Ethereum <?php echo $ethereum['total_hashrate'];?> MH/s</summary>
	<details>
	<summary>Workers <?php echo count($ethereum['workers']);?></summary>
	<?php foreach($ethereum['workers'] as $worker):?>
		<ul>
		<?php echo (empty($worker['worker'])  ? "SimpleMiner" : $worker['worker']) ?>
		<li><?php echo $worker['hashrate'];?>  --actual</li>
		<li><?php echo $worker['hashrate_calculated'];?>   --calculated</li>
		<li>Seconds since last share: <?php echo $worker['second_since_submit'];?></li>
		</ul>
	<?php endforeach;?>
	</details>
	<details>
	<summary>More Info</summary>
	<ul>
		<li>Autopayout: <?php echo $ethereum['autopayout_from'];?></li>
		<li>Last Payment: <?php echo $ethereum['last_payment_amount'];?></li>
		<li>Payment Date: <?php echo $ethereum['last_payment_date'];?></li>
		<li>Wallet: <?php echo $ethereum['wallet'];?></li>
		<li>Pool Balance: <?php echo $ethereum['wallet_balance'];?></li>
	</ul>
	</details>
</details>
<details>
	<summary>Zcash <?php echo $zcash['total_hashrate'];?> sols</summary>
	<details>
	<summary>Workers <?php echo count($zcash['workers']);?></summary>
	<?php foreach($zcash['workers'] as $worker):?>
		<ul>
		<?php echo (empty($worker['worker'])  ? "SimpleMiner" : $worker['worker']) ?>
		<li><?php echo $worker['hashrate'];?>  --actual</li>
		<li><?php echo $worker['hashrate_calculated'];?>   --calculated</li>
		<li>Seconds since last share: <?php echo $worker['second_since_submit'];?></li>
		</ul>
	<?php endforeach;?>
	</details>
	<details>
	<summary>More Info</summary>
	<ul>
		<li>Autopayout: <?php echo $zcash['autopayout_from'];?></li>
		<li>Last Payment: <?php echo $zcash['last_payment_amount'];?></li>
		<li>Payment Date: <?php echo $zcash['last_payment_date'];?></li>
		<li>Wallet: <?php echo $zcash['wallet'];?></li>
		<li>Pool Balance: <?php echo $zcash['wallet_balance'];?></li>
	</ul>
	</details>
</details>
<details>
	<summary>Monero <?php echo $monero['total_hashrate_calculated'];?> kH/s</summary>
	<details>
	<summary>Workers <?php echo count($monero['workers']);?></summary>
	<?php foreach($monero['workers'] as $worker):?>
		<ul>
		<?php echo (empty($worker['worker'])  ? "SimpleMiner" : $worker['worker']) ?>
		<li><?php echo $worker['hashrate'];?>  --actual</li>
		<li><?php echo $worker['hashrate_calculated'];?>   --calculated</li>
		<li>Seconds since last share: <?php echo $worker['second_since_submit'];?></li>
		</ul>
	<?php endforeach;?>
	</details>
	<details>
	<summary>More Info</summary>
	<ul>
		<li>Autopayout: <?php echo $monero['autopayout_from'];?></li>
		<li>Last Payment: <?php echo $monero['last_payment_amount'];?></li>
		<li>Payment Date: <?php echo $monero['last_payment_date'];?></li>
		<li>Wallet: <?php echo $monero['wallet'];?></li>
		<li>Pool Balance: <?php echo $monero['wallet_balance'];?></li>
	</ul>
	</details>
</details>
</div>
	<?php 
		echo "<pre>";
		print_r($current_prices);
		echo "</pre>";

		/*$count = 0;
		foreach ($minerinfo['ethereum']->workers as $worker)
		{
			$count++;
		}
		var_dump($count);*/
		//$array = get_object_vars($minerinfo['ethereum']->workers);
		//$count = count($array);
		//var_dump($count);

	?>