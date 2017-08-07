<table>
<col width="20%">
<col width="20%">
<col width="5%">
<col width="5%">
<col width="10%">
<col width="10%">
<col width="10%">
<col width="10%">
<thead>
	<tr>
		<td>User</td>
		<td>Portfolio</td>
		<td>Stock</td>
		<td>Quantity</td>
		<td>Price</td>
		<td>Total</td>
		<td>Action</td>
		<td>Date</td>
	</tr>
</thead>
<?php foreach ($transactions as $transaction):?>
<tr>
	<td>{{ $transaction->user->name }}</td>
	<td>{{ $transaction->portfolio->name }}</td>
	<td>{{ $transaction->stock->ticker }}</td>
	<td>{{ $transaction->quantity }}</td>
	<td>{{ $transaction->price }}</td>
	<td><?php echo ($transaction->price*$transaction->quantity);?></td>
	<td>{{ $transaction->action }}</td>
	<td>{{ $transaction->created_at }}</td>
</tr>
<?php endforeach;?>
</table>