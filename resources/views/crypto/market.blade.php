<?php $prices = $minerinfo['current_prices'];?>
<div class='crypto-market-prices'>
<?php foreach($prices as $coin=>$value):?>
	<div class='crypto-currency-entry'>
		<img style='max-width:70%;margin:0 auto; display:block;' src="{{ URL::to('/')}}/images/<?php echo strtolower($coin);?>-logo.png"/>
		<p>USD : <?php echo $value['USD'];?></p>
	</div>
<?php endforeach;?>
</div>