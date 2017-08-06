@include('layouts/app')
<div class='container'>
	<form action="/portfolios" method="POST">
	<label>Portfolio Name</label><br>
	<input name='name' type='text'/><br>
	<label>Balance</label><br>
	<input name='balance' type='number'/><br>
		<button type='submit'>Submit</button>
		{{ csrf_field() }}
	</form>
</div>