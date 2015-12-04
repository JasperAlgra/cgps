@extends('layouts.dashboard')
@section('section')
<div class="conter-wrapper">				
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Dismissable Alerts</h3>
		</div>
		<div class="panel-body">
			<div>
				@include('widgets.alert', array('class'=>'success', 'dismissable'=>true, 'message'=> 'My message', 'icon'=> 'check'))
				@include('widgets.alert', array('class'=>'info', 'dismissable'=>true, 'message'=> 'My message'))
				@include('widgets.alert', array('class'=>'warning', 'dismissable'=>true, 'message'=> 'My message'))
				@include('widgets.alert', array('class'=>'danger', 'dismissable'=>true, 'message'=> 'My message', 'icon'=> 'remove'))	
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Growl Alerts</h3>
				</div>
				<div class="panel-body">
					<p>						
						<button type="button" class="primary-growl btn btn-primary" >Primary Growl</button>
						<button type="button" class="info-growl btn btn-info" >Info Growl</button> 
						<button type="button" class="warning-growl btn btn-warning" >Warning Growl</button> 
						<button type="button" class="danger-growl btn btn-danger" >Danger Growl</button> 
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
@section('js')
	@parent
		<script type="text/javascript">

  			$('.primary-growl').click(function(event) {
		        return $.growl({
		      	title: 'Hello!',
		        message: "The kitten is attacking!"
		      });
		    });
		    $('.danger-growl').click(function(event) {
		        return $.growl.error({
		        message: "The kitten is attacking!"
		      });
		    });
		    $('.info-growl').click(function(event) {
		        return $.growl.notice({
		        message: "The kitten is cute!"
		      });
		    });
		    $('.warning-growl').click(function(event) {
		        return $.growl.warning({
		        message: "The kitten is ugly!"
		      });
		    });
		</script>
@stop