@extends('layouts.dashboard')

@section('section')
	<div class="conter-wrapper home-container">
		<div class="row home-row">
			<div class="col-md-4 col-lg-3">
				<div class="home-stats">
					@include('widgets.stats',array('icon'=>'cloud-upload','value'=>'88','bgclass'=>'info', 'link'=>'c3chart', 'progress-value'=>'88','text'=> Lang::get(\Session::get('lang').'.stat1')))
					@include('widgets.stats',array('icon'=>'heartbeat','value'=>'94','bgclass'=>'success', 'link'=>'c3chart', 'progress-value'=>'88','text'=>Lang::get(\Session::get('lang').'.stat2')))
					@include('widgets.stats',array('icon'=>'flag','value'=>'88','bgclass'=>'danger', 'link'=>'inbox', 'progress-value'=>'94','text'=>Lang::get(\Session::get('lang').'.stat3')))		
				</div>
			</div>
			<div class="col-md-4 col-lg-6">
				<div class="home-charts-middle">
					<div class="chart-container">
						<div class="chart-comment clearfix">
							<div class="text-primary pull-left">
								<span class="comment-header">55%</span><br />
								<span class="comment-comment">{{ Lang::get(\Session::get('lang').'.chart3') }}</span>
							</div>
							<div class="text-success pull-left m-l">
								<span class="comment-header">25%</span><br />
								<span class="comment-comment">{{ Lang::get(\Session::get('lang').'.chart2') }}</span>
							</div>
							<div class="text-warning pull-left m-l">
								<span class="comment-header">20%</span><br />
								<span class="comment-comment">{{ Lang::get(\Session::get('lang').'.chart1') }}</span>
							</div>
						</div>
						<div id="lineChart" style="height:250px"></div>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-lg-3">
				<div class="home-charts-right">
					<div class="top-right-chart">
						<div id="cbar" style="height:150px; padding-top:7px;"></div>
					</div>
					<div class="bottom-right-chart">
						<div class="top-left-chart clearfix">
							<div class="row">
								<div class="col-sm-6 text-left">
									<div class="padder">
										<span class="heading">{{ Lang::get(\Session::get('lang').'.views') }} : </span><br />
										<big class="text-primary">22068</big>
									</div>
								</div>
								<div class="col-sm-6">
									<div id="pie"  style="height:125px; padding-top:8px;"></div>
								</div>
							</div>
						</div>	
					</div>
				</div>
			</div>
		</div>
		<div class="row home-row">
			<div class="col-lg-8 col-md-6">
				<div class="map-container box padder">
					<div id="world-map" style="width: 100%; height: 320px"></div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6">
				<div class="todo-container panel panel-danger">
					<div class="panel-heading">
						<div class="todo-header text-center">
							<h4><i class="fa fa-tasks"></i>&nbsp;{{ Lang::get(\Session::get('lang').'.todo') }}</h4>
						</div>
					</div>
					<div class="panel-body bg-danger">
						<div class="todo-body">
							<div class="todo-list-wrap">
								<ul class="todo-list">
									<li class="">
										<label class="checkbox1" for="option1"> 
											<input id="option1" type="checkbox" class="">
											<span></span>
										</label>
										<span class="done-false">Meeting with Nabindar Singh.</span>
									</li>
									<li class="">
										<label class="checkbox1" for="option3"> 
											<input id="option3" type="checkbox" class="">
											<span></span>
										</label>
										<span class="done-false">Exercise at 6:pm with Nicholas.</span>
									</li>
									<li class="">
										<label class="checkbox1" for="option4"> 
											<input id="option4" type="checkbox" class="">
											<span></span>
										</label>
										<span class="done-false">Avengers Age of Ultron.</span>
									</li>
									<li class="">
										<label class="checkbox1" for="option5"> 
											<input id="option5" type="checkbox" class="">
											<span></span>
										</label>
										<span class="done-false">Henna birthday at Mezbaan.</span>
									</li>
									<li class="">
										<label class="checkbox1" for="option2"> 
											<input id="option2" type="checkbox" class="">
											<span></span>
										</label>
										<span class="done-false">Black Magic</span>
									</li>
								</ul>
							</div>
							<form class="form-horizontal todo-from-bottom">
								<div class="row">
									<div class="col-sm-12">
										<div class="input-group">
											<input type="text" class="form-control" placeholder="">
											<span class="input-group-btn">
												<button class="btn btn-default" type="submit">{{ Lang::get(\Session::get('lang').'.add') }}</button>
											</span>
								    	</div>	
								    </div>				
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop
@section('js')
	@parent
	<script>
	$(function(){
		setTimeout(function() {
			var chart = c3.generate({
			    bindto: '#lineChart',
			    data: {
			      columns: [
			        ['Newuser', 30, 200, 100, 400, 150, 250],
			        ['Returning user', 50, 120, 210, 140, 115, 425],
			        ['Referral user', 40, 150, 98, 300, 175, 100]
			      ]
			    },
			    color: {
	                pattern: ['#3CA2E0','#5CB85C','#F1B35B']
	            },
			    axis: {
					x: {
						show: false
					},
					y: {
						show: false
					},
			    }
			});			
		}, 275);
		setTimeout(function() {
			$('#world-map').vectorMap({
				backgroundColor: '#FFF',
				regionStyle: {
					initial: {
					  fill: 'black',
					  "fill-opacity": 1,
					  stroke: 'none',
					  "stroke-width": 0,
					  "stroke-opacity": 1
					},
					hover: {
					  "fill-opacity": 0.8,
					  cursor: 'pointer'
					},
					selected: {
					  fill: 'red'
					},
					selectedHover: {
					}
				}/*,	
				zoomOnScroll: false,
/*				regionStyle: {
					initial: {
						fill: '#000000',
						"fill-opacity": 1
					},
					hover: {
						fill: '#3CA2E0'
					}
				}
*/			});			
		}, 275);
		setTimeout(function() {
	       	var chart2 = c3.generate({
	       	    bindto: '#cbar',
	       	    data: {
	       	      columns: [
	       	        [10,40,20,90,35,70,10,50,20,80,60,10,20,40,70]
	       	      ],
	       	      type:'bar'
	       	    },
	       	    bar: {
	   	            width: {
	   	                ratio: 0.5 // this makes bar width 50% of length between ticks
	   	            }
	   	        },
	   	        color: {
	                pattern: ['#DB5B57']
	            },
	   	        labels: true,
	   	        legend: {
				  show: 0
				},
	       	    axis: {
	       			x: {
	       				show: false
	       			},
	       			y: {
	       				show: false
	       			},
	       	    }
	       	});
			
		}, 275);
		setTimeout(function() {
	       	var chart = c3.generate({
	       		bindto: '#pie',
	       	    data: {
	       	        // iris data from R
	       	        columns: [
	       	            ['data1', 11],
	       	            ['data2', 23],
	       	            ['data3', 66]
	       	        ],
	       	        type : 'pie',
	       	    },
	       	    color: {
	                pattern: ['#5CB85C','#F0AD4E','#3CA2E0']
	            },
	   	        legend: {
				  show: 0
				},
	       	});			
		}, 275);
	});   	
   	</script>
@stop