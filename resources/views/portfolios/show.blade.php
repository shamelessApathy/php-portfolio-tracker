@include('layouts/app')
<?php 
$positions = $data['positions'];
$portfolio = $data['portfolio'];
?>
<div class='container'>
<h1><?php echo $portfolio->name;?></h1>

@include('portfolios/show_table')
</div>