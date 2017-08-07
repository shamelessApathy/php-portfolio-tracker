
<table>
<col width="20%">
<col width="20%">
<col width="10%">
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
		<td>Date</td>
	</tr>
</thead>
<?php foreach ($positions as $position):?>
<tr>
	<td>{{ $position->user->name }}</td>
	<td>{{ $position->portfolio->name }}</td>
	<td>{{ $position->stock->ticker }}</td>
	<td>{{ $position->quantity }}</td>
	<td>{{ $position->price }}</td>
	<td><?php echo ($position->price*$position->quantity);?></td>
	<td>{{ $position->created_at }}</td>
</tr>
<?php endforeach;?>
</table>