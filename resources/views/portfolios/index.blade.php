@include('layouts/app')
<div class='container'>
	<a href='/portfolios/create'>Create New Portfolio</a><br>

	<?php foreach ($portfolios as $portfolio):?>
		<a href="/portfolios/<?php echo $portfolio->id;?>"><?php echo $portfolio->name;?></a>
		<p>Balance:<?php echo $portfolio->balance;?></p>
	<?php endforeach;?>
</div>