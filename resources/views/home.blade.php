@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <img style='width:100%;' src="{{ URL::to('/') }}/images/chart.png"/>
                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
@include('crypto.dashboard')
</div>
<?php 
echo "<pre>";
print_r($minerinfo);
echo "</pre>";
?>
@endsection
