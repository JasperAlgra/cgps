@extends('layouts.plain')
@section('body')
	@include('partials.topnav')
	@include('partials.menubar')
	<div id="body-container">
        <div class="animation">
		  @yield('section')
        </div>
	</div>
@stop

@section('js')
 	@parent
	<script>
	$(function(){
		$('#calendar2').fullCalendar({
		     eventClick: function(calEvent, jsEvent, view) {
		        alert('Event: ' + calEvent.title);
		        alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
		        alert('View: ' + view.name);  
		    }
		});

		           

		$('#rtlswitch').click(function() {
			console.log('hello');
	   		$('body').toggleClass('rtl');

	   		var hasClass = $('body').hasClass('rtl');
	       
	        $.get('/api/set-rtl?rtl='+ (hasClass ? 'rtl': ''));
	   		
    	});   
        $('.theme-picker').click(function() {
            changeTheme($(this).attr('data-theme'));
        }); 	
    	
	});
	function changeLanguage(lang){
		$.get('api/lang?lang='+lang);
        setTimeout(function() {
	       	window.location.reload(true);
            
        }, 550);
	}
	function changeTheme(theme) {

            $('<link>')
              .appendTo('head')
              .attr({type : 'text/css', rel : 'stylesheet'})
              .attr('href', '/css/app-'+theme+'.css');

                $.get('api/change-theme?theme='+theme);
        }
	</script>
@stop
