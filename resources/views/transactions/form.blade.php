	<form action="/transactions" method="POST">
	<label>Transaction Type</label><br>
	<select name='transaction-type'>
		<option value='BUY'>BUY</option>
		<option value='SELL'>SELL</option>
	</select>
	<label>Choose Stock</label><br>
		<select name='stock'>
		<?php foreach ($stocks as $stock):?>
			<option value="<?php echo $stock->id;?>"><?php echo "Name: ".$stock->name . " Ticker: " . $stock->ticker;?>
		<?php endforeach;?>
		</select><br>
		<label>Temporary Price (until API is up)</label><br>
		<input type='number'/><br>
		<button type='submit'>Submit</button>
		{{ csrf_field() }}
	</form>