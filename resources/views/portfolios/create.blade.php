@include('layouts/app')
<div class='container'>
	<form action="/portfolios" method="POST">
		<input type='text' name='test'/>
		<button type='submit'>Submit</button>
		{{ csrf_field() }}
	</form>
</div>