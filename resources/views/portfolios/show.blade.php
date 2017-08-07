@include('layouts/app')
<div class='container'>
<h1><?php echo $portfolio->name;?></h1>

@include('portfolios/show_table')
</div>