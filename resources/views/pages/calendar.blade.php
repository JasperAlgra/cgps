@extends('layouts.dashboard')
@section('section')
	<div class="conter-wrapper">
		<div class="panel panel-default">
			<div class="panel-body">
				<div id="calendar1"></div>
			</div>
		</div>
	</div>
@stop

@section('js')	
	@parent
	<script type="text/javascript">
	    // page is now ready, initialize the calendar...
	    $('#calendar1').fullCalendar({
	     eventClick: function(calEvent, jsEvent, view) {
	        alert('Event: ' + calEvent.title);
	        alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
	        alert('View: ' + view.name);  
	    }
	    });
	</script>
@stop