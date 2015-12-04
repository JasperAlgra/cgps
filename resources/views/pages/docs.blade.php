@extends('layouts.dashboard')

@section('section')
<div class="row">
	<div class="container">
		<div class="docs-content">
			<div id="installation">
				<h3>Installation</h3>
					<div class="subject-content">
						To use the Ani Laravel 5 theme, you need to make sure you have <code>bower</code>, <code>npm</code>, <code>gulp</code> and <code>composer</code> globally installed. Now navigate to your app directory (<code>$ cd myLaravelApp/</code>) and run the following terminal commands :
						<ul>
							<li>
								<code>$ composer install</code>
							</li>
							<li>
								<code>$ php artisan key:generate</code> and paste the generated key in<code>config/app.php</code>replacing <code>'key' => env('APP_KEY', 'SomeRandomString')</code> "SomeRandomString"
							</li>
							<li>
								<code>$ npm install</code>
							</li>
							<li>
								<code>$ bower install</code>
							</li>							
							<li>
								<code>$ gulp watch</code>
							</li>
						</ul>
						You have now succesfully set up Ani Laravel 5 theme!
					</div>
			</div>
			<div id="basics">
				<h3>Features</h3>
				<div class="subject-content">
					<div class="subject-content">
						Ani is a lightweight and feature rich admin template which is clean and easy to use. 
						Current release comes with the following features:
						<ul class="features-list">
							<li>
								4 Different theme colors
							</li>
							<li>
								Responsive design based on Bootstrap 3.3.2
							</li>
							<li>
								Custom elements and plugins including:
								<ul class="features-list-extended">
									<li>
										Pure CSS3 checkbox, radio and On/Off switch elements
									</li>
									<li>
										 Wysiwig editor
									</li>
									<li>
										User Profile
									</li>
									<li>
										Email-template
									</li>
									<li>
										Customizable widgets in different colors and styles
									</li>
								</ul>
							</li>
							<li>
								Boostrap, jQuery UI and third party plugins and elements including:
								<ul class="features-list-extended">
									<li>
										Dynamic Charts
									</li>
									<li>
										Tables
									</li>
									<li>
										Form validation
									</li>
									<li>
										Date Picker
									</li>
									<li>
										DateRange Picker
									</li>
									<li>
										Time Picker
									</li>
									<li>
										Carousel for Gallery
									</li>
									<li>
										Full Calendar
									</li>
									<li>
										Progress Bars
									</li>
									<li>
										Labels and Badges
									</li>
									<li>
										Collapse
									</li>
									<li>
										Todo List
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div id="widgets">
				<h3>Widgets</h3>
				<div class="subject-content">
					The following widgets have been used in Ani Laravel Theme :
					<div class="widget-docs">
						<div class="well">
							<h4>Panels</h4>
							<div class="widgets-docs-elements">
								<div class="panel panel-primary">
	  								<div class="panel-heading">
										<h3 class="panel-title">Primary Panel		  
										</h3>
									</div>
									<div class="panel-body">
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
										tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
										quis nostrud exercitation.
									</div>
								</div>
							</div>
							<div class="widget-docs-code">
									<pre>&lt;div class="panel panel-primary"&gt;
  &lt;div class="panel-heading"&gt;
	&lt;h3 class="panel-title"&gt;Primary Panel		  
	&lt;/h3&gt;
  &lt;/div&gt;
  &lt;div class="panel-body"&gt;
	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation.
  &lt;/div&gt;
&lt;/div&gt;</pre>
							</div>
						</div>
						<div class="well">
							<h4>Buttons</h4>
							<div class="widget-docs-elements">
								<button type="button" class="btn btn-success btn-rounded">Success Button</button>
							</div>
							<div class="widget-docs-code">
							<pre>&lt;button type="button" class="btn btn-success btn-rounded"&gt;Success Button&lt;/button&gt;</pre>
							</div>
						</div>
						<div class="well">
							<h4>Dropdowns</h4>
							<div class="widget-docs-elements">
								<div class="btn-group" >
			                        <div class="dropdown ">
				                        <button type="button" class="btn btn-danger btn-rounded " data-toggle="dropdown" role="button">
				                            Button dropdown <span class="caret"></span>
				                        </button>
				                        <ul class="dropdown-menu" role="menu">
				                            <li><a href="#">Action</a></li>
				                            <li><a href="#">Another action</a></li>
				                            <li><a href="#">Something else here</a></li>
				                            <li class="divider"></li>
				                            <li><a href="#">Separated link</a></li>
				                            <li class="divider"></li>
				                            <li><a href="#">One more separated link</a></li>
				                        </ul>
			                    	</div>
			                    </div>
							</div>
							<div class="widget-docs-code">
									HTML<pre>&lt;div class="dropdown "&gt;
    &lt;button type="button" class="btn btn-danger btn-rounded " data-toggle="dropdown" role="button"&gt;
        Button dropdown &lt;span class="caret"&gt;&lt;/span&gt;
    &lt;/button&gt;
    &lt;ul class="dropdown-menu" role="menu"&gt;
        &lt;li&gt;&lt;a href="#"&gt;Action&lt;/a&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href="#"&gt;Another action&lt;/a&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href="#"&gt;Something else here&lt;/a&gt;&lt;/li&gt;
        &lt;li class="divider"&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href="#"&gt;Separated link&lt;/a&gt;&lt;/li&gt;
        &lt;li class="divider"&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href="#"&gt;One more separated link&lt;/a&gt;&lt;/li&gt;
    &lt;/ul&gt;
&lt;/div&gt;</pre>
							
							</div>
						</div>
						<div class="well">
							<h4>Labels</h4>
							<div class="widget-docs-elements">
								<span class="label label-info">Label</span>
							</div>
							<div class="widget-docs-code">
								<pre>&lt;span class="label label-info"&gt;Label&lt;/span&gt;</pre>
							</div>
						</div>
						<div class="well">
							<h4>Progress Bars</h4>
							<div class="widgets-docs-elements">
								<div class="progress">
								  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 65%">
								    <span class="sr-only"></span>
								  </div>
								</div>
							</div>
							<div class="widget-docs-code">
								<pre>&lt;progressbar value="65" class="progress-striped active" type="primary"&gt;&lt;/progressbar&gt;</pre>
							</div>
						</div>
						<div class="well">
							<h4>Alerts</h4>
							<div class="widgets-docs-elements">
								<div class="alert alert-warning  alert-dismissable " role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  My alert message.
								</div>
							</div>
							<div class="widget-docs-code">
<pre>
&lt;div class="alert alert-warning  alert-dismissable " role="alert"&gt;
   &lt;button type="button" class="close" data-dismiss="alert" aria-label="Close"&gt;
   &lt;span aria-hidden="true"&gt;
   &lt;/span&gt;
   &lt;/button&gt; 
   My alert message.
&lt;/div&gt;</pre>
							</div>
						</div>
						<div class="well">
							<h4>Tolltip & Popover</h4>
							<div class="widgets-docs-elements">
								<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="left" title="Tooltip on left">Left Tooltip</button>
							</div>
							<div class="widget-docs-code">
							HTML<pre>
&lt;button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="left" title="Tooltip on left"&gt;Left Tooltip&lt;/button&gt;</pre>
							</div>
							<div class="widget-docs-code">
							Javascript<pre>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})</pre>
							</div>
							<div class="widgets-docs-elements">
								<button type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="left" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">Left Popover</button>
							</div>
							<div class="widget-docs-code">
							HTML<pre>
&lt;button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="left" title="Tooltip on left"&gt;Left Tooltip&lt;/button&gt;</pre>
							</div>
							<div class="widget-docs-code">
							Javascript<pre>
$(function () {
$('[data-toggle="popover"]').popover()
})</pre>
							</div>
							<code>For popovers and tooltips in different replace "Left" with "Top/Right/Bottom"</code>
						</div>
						<div class="well">
							<h4>Pagination</h4>
							<div class="widgets-docs-elements">
								<div class="clearfix">
									<ul class="pagination no-m-t">
										<li>
									    	<a href="#" aria-label="Previous">
									        	<span aria-hidden="true">«</span>
									      	</a>
									    </li>
									    <li><a href="#">1</a></li>
										<li><a href="#">2</a></li>
										<li><a href="#">3</a></li>
										<li><a href="#">4</a></li>
										<li><a href="#">5</a></li>
										<li>
									      <a href="#" aria-label="Next">
									        <span aria-hidden="true">»</span>
									      </a>
									    </li>
									</ul>
								</div>
							</div>
							<div class="widget-docs-code">
<pre>
&lt;div class="clearfix"&gt;
  &lt;ul class="pagination no-m-t"&gt;
  &lt;li&gt;
    &lt;a href="#" aria-label="Previous"&gt;
     	&lt;span aria-hidden="true"&gt;«&lt;/span&gt;
    &lt;/a&gt;
    &lt;/li&gt;
    &lt;li&gt;&lt;a href="#"&gt;1&lt;/a&gt;&lt;/li&gt;
	&lt;li&gt;&lt;a href="#"&gt;2&lt;/a&gt;&lt;/li&gt;
	&lt;li&gt;&lt;a href="#"&gt;3&lt;/a&gt;&lt;/li&gt;
	&lt;li&gt;&lt;a href="#"&gt;4&lt;/a&gt;&lt;/li&gt;
	&lt;li&gt;&lt;a href="#"&gt;5&lt;/a&gt;&lt;/li&gt;
	&lt;li&gt;
      &lt;a href="#" aria-label="Next"&gt;
        &lt;span aria-hidden="true"&gt;»&lt;/span&gt;
      &lt;/a&gt;
    &lt;/li&gt;
  &lt;/ul&gt;
&lt;/div&gt;
</pre>
							</div>	
						</div>
						<div class="well">
							<h4>Collapse</h4>
							<div class="widgets-docs-elements">
								<div class="panel-group" id="accordion">
									<div class="panel panel-primary">
										<div class="panel-heading">
											<h4 class="panel-title">
												<a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
													Click here for Collapse
												</a>
											</h4>
										</div>
										<div id="collapse4" class="panel-collapse collapse">
											<div class="panel-body">
												Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.
											</div>
										</div>
									</div>					
									<div class="panel panel-primary">
										<div class="panel-heading">
											<h4 class="panel-title">
												<a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
													Click here for Collapse
												</a>
											</h4>
										</div>
										<div id="collapse5" class="panel-collapse collapse ">
											<div class="panel-body">
												Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.
											</div>
										</div>
									</div>					
									<div class="panel panel-primary">
										<div class="panel-heading">
											<h4 class="panel-title">
												<a data-toggle="collapse" data-parent="#accordion" href="#collapse6">
													Click here for Collapse
												</a>
											</h4>
										</div>
										<div id="collapse6" class="panel-collapse collapse ">
											<div class="panel-body">
												Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.
											</div>
										</div>
									</div>				
								</div>
							</div>
							<div class="widget-docs-code">
<pre>
&lt;div class="widgets-docs-elements"&gt;
  &lt;div class="panel-group" id="accordion"&gt;
	&lt;div class="panel panel-primary"&gt;
	  &lt;div class="panel-heading"&gt;
		&lt;h4 class="panel-title"&gt;
		  &lt;a data-toggle="collapse" data-parent="#accordion" href="#collapse4"&gt;
			Click here for Collapse
		  &lt;/a&gt;
		&lt;/h4&gt;
	  &lt;/div&gt;
	  &lt;div id="collapse4" class="panel-collapse collapse"&gt;
		&lt;div class="panel-body"&gt;
		 Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. 
		 Ad vegan excepteur butcher vice lomo.
		&lt;/div&gt;
	  &lt;/div&gt;
	&lt;/div&gt;					
	&lt;div class="panel panel-primary"&gt;
	  &lt;div class="panel-heading"&gt;
		&lt;h4 class="panel-title"&gt;
	    	  &lt;a data-toggle="collapse" data-parent="#accordion" href="#collapse5"&gt;
			Click here for Collapse
		  &lt;/a&gt;
		&lt;/h4&gt;
	  &lt;/div&gt;
	  &lt;div id="collapse5" class="panel-collapse collapse "&gt;
		  &lt;div class="panel-body"&gt;
			Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. 
			Ad vegan excepteur butcher vice lomo.
		  &lt;/div&gt;
	  &lt;/div&gt;
	&lt;/div&gt;					
	&lt;div class="panel panel-primary"&gt;
	  &lt;div class="panel-heading"&gt;
		&lt;h4 class="panel-title"&gt;
	  	  &lt;a data-toggle="collapse" data-parent="#accordion" href="#collapse6"&gt;
			Click here for Collapse
		  &lt;/a&gt;
		&lt;/h4&gt;
	  &lt;/div&gt;
	  &lt;div id="collapse6" class="panel-collapse collapse "&gt;
		&lt;div class="panel-body"&gt;
	       Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. 
	       Ad vegan excepteur butcher vice lomo.
		&lt;/div&gt;
	  &lt;/div&gt;
	&lt;/div&gt;				
  &lt;/div&gt;
&lt;/div&gt;
</pre>
			</div>
			<code>The collapse group class can be changed by using panel-info/panel-warning/panel-danger instead of panel-primary</code>
						</div>
						<div class="well">
						<h4>Icons</h4>
							<div class="widgets-docs-elements">
								<i class="fa fa-glass"></i> &nbsp;&nbsp; <i class="fa fa-bar-chart-o"></i>
							</div>
							<div class="widget-docs-code">
								<pre>
&lt;i class="fa fa-glass">&lt;/i&gt;
&lt;i class="fa fa-bar-chart-o"&gt;&lt;/i&gt;</pre>
							</div>
						</div>
						<div class="well">
							<div class="widgets-docs-elements">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th>Name</th>
											<th>Email</th>
											<th>Address</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>John</td>
											<td>john@gmail.com</td>
											<td>London, UK</td>
										</tr>
										<tr>
											<td>Andy</td>
											<td>andygmail.com</td>
											<td>Merseyside, UK</td>
										</tr>
										<tr>
											<td>Frank</td>
											<td>frank@gmail.com</td>
											<td>Southampton, UK</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="widget-docs-code">
									<pre>
&lt;table class="table table-bordered"&gt;
  &lt;thead&gt;
    &lt;tr&gt;
      &lt;th&gt;Name&lt;/th&gt;
      &lt;th&gt;Email&lt;/th&gt;
      &lt;th&gt;Address&lt;/th&gt;
    &lt;/tr&gt;
  &lt;/thead&gt;
  &lt;tbody&gt;
    &lt;tr&gt;
      &lt;td&gt;John&lt;/td&gt;
      &lt;td&gt;john@gmail.com&lt;/td&gt;
      &lt;td&gt;London, UK&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;Andy&lt;/td&gt;
      &lt;td&gt;andygmail.com&lt;/td&gt;
      &lt;td&gt;Merseyside, UK&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;td&gt;Frank&lt;/td&gt;
      &lt;td&gt;frank@gmail.com&lt;/td&gt;
      &lt;td&gt;Southampton, UK&lt;/td&gt;
      &lt;/tr&gt;
  &lt;/tbody&gt;
&lt;/table&gt;</pre>
							</div>
							<code>The table classes can be changed using table-bordered/table-hover/table-condensed classes. </code>
						</div>
						<div class="well">
							<h4>Switch</h4>
							<div class="widgets-docs-elements">
								<div class="onoffswitch">
								  <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="switch3" checked="">
								  <label class="onoffswitch-label" for="switch3">
								    <span class="onoffswitch-inner"></span>
								    <span class="onoffswitch-switch"></span>
								  </label>
								</div>
							</div>
							<div class="widget-docs-code">
							<pre>
&lt;div class="onoffswitch"&gt;
  &lt;input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="switch3" checked=""&gt;
  &lt;label class="onoffswitch-label" for="switch3"&gt;
    &lt;span class="onoffswitch-inner"&gt;&lt;/span&gt;
    &lt;span class="onoffswitch-switch"&gt;&lt;/span&gt;
  &lt;/label&gt;
&lt;/div&gt;</pre>
							</div>
						</div>
						<div class="well">
							<h4>Form Elements</h4>
							<div class="widgets-docs-elements">
								<form>
									<div class="form-group">
										<label for="exampleInputEmail1">Email address</label>
										<input type="email" class="form-control underline" id="exampleInputEmail1" placeholder="Enter email">
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Password</label>
										<input type="password" class="form-control underline" id="exampleInputPassword1" placeholder="Password">
									</div>
									<div class="checkbox">
												<label>
													<input type="checkbox"> Remember me
												</label>
											</div>
									<button type="submit" class="btn btn-default">Submit</button>
								</form>
							</div>
							<div class="widget-docs-code">
<pre>
&lt;form&gt;
  &lt;div class="form-group"&gt;
    &lt;label for="exampleInputEmail1"&gt;Email address&lt;/label&gt;
    &lt;input type="email" class="form-control underline" id="exampleInputEmail1" placeholder="Enter email"&gt;
  &lt;/div&gt;
  &lt;div class="form-group"&gt;
    &lt;label for="exampleInputPassword1"&gt;Password&lt;/label&gt;
    &lt;input type="password" class="form-control underline" id="exampleInputPassword1" placeholder="Password"&gt;
  &lt;/div&gt;
  &lt;div class="checkbox"&gt;
    &lt;label&gt;
      &lt;input type="checkbox"&gt; Remember me
    &lt;/label&gt;
  &lt;/div&gt;
  &lt;button type="submit" class="btn btn-default"&gt;Submit&lt;/button&gt;
&lt;/form&gt;</pre>
							</div>
						</div>
						<div class="well">
							<h4>To do List</h4>
							<div class="todo-container panel panel-danger">
								<div class="panel-heading">
									<div class="todo-header text-center">
										<h4><i class="fa fa-tasks"></i>&nbsp;Todo Tasks</h4>
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
															<button class="btn btn-default" type="submit">Add</button>
														</span>
											    		</div>	
											    </div>				
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
						<div id="add-widgets">
							<h3>Plugins</h3>
							<div class="subject-content">
								<div class="well">
									<h4>Calendar</h4>
									<div class="widgets-docs-elements">
										<div id="calendar"></div>
									</div>	
									<div class="widget-docs-code">
<pre>
&lt;div id="calendar"&gt;&lt;/div&gt;
&lt;script&gt;
	$('#calendar2').fullCalendar({ 
	});
&lt;/script&gt;</pre>
									</div>
								</div>
								<div class="well">
									<h4>C3 Chart</h4>
									<div class="widgets-docs-elements">
										<div id="piechart" ></div>
									</div>
									<div class="widget-docs-code">
										<pre>
&lt;div id="piechart"&gt;&lt;/div&gt;
&lt;script&gt;var chart2 = c3.generate({
	   bindto: '#piechart',
	    data: {
	        columns: [
	            ['data1', 30],
	            ['data2', 120],
	        ],
	        type : 'pie',
	        onclick: function (d, i) { console.log("onclick", d, i); },
	        onmouseover: function (d, i) { console.log("onmouseover", d, i); },
	        onmouseout: function (d, i) { console.log("onmouseout", d, i); }
	    },
	    color: {
	        pattern: ['#06c5ac','#3faae3','#ee634c','#6bbd95','#f4cc0b','#9b59b6','#16a085','#c0392b']
	    }
	});
&lt;/script&gt;</pre>
									</div>
								</div>
								<div class="well">
									<h4>Chart.js Chart</h4>
									<div class="widgets-docs-elements">
										<div style="width:400px;height:300px;margin:0 auto;"><canvas id="cpie" width="400px" height="300px"></canvas></div>
									</div>
									<div class="widget-docs-code">
										<pre>
&lt;div&gt;&lt;canvas id="cpie"&gt;&lt;/canvas&gt;&lt;/div&gt;
var data = [
    {
        value: 220,
        color:"#A2D19E",
        highlight: "rgba(162, 209, 158, 0.9)",
        label: "Success"
    },
    {
        value: 70,
        color: "#D57D6D",
        highlight: "rgba(213, 125, 109, 0.9)",
        label: "Danger"
    },
    {
        value: 100,
        color: "#80B1CB",
        highlight: "rgba(128, 177, 203, 0.9)",
        label: "Info"
    }
]
var cpie = document.getElementById("cpie").getContext("2d");
new Chart(cpie).Pie(data, {
  responsive: true
});</pre>
									</div>
								</div>
							</div>
						</div>
						<div class="well">
							<h4>Growl</h4>
							<div class="widgets-docs-elements">
								<button type="button" class="warning-growl btn btn-warning" >Warning Growl</button>
							</div>
							<div class="widget-docs-code">
								HTML<pre>
&lt;button type="button" class="warning-growl btn btn-warning" &gt;Warning Growl&lt;/button&gt;</pre>
								JavaScript<pre>
$('.warning-growl').click(function(event) {
    return $.growl.warning({
    message: "The kitten is ugly!"
  });
});</pre>
							</div>
						</div>
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
		$(function () {
		  	$('[data-toggle="tooltip"]').tooltip();
			$('[data-toggle="popover"]').popover();
			$('#calendar').fullCalendar({ 
			});
			c3.generate({
			   bindto: '#piechart',
			    data: {			         
			        // iris data from R
			        columns: [
			            ['data1', 30],
			            ['data2', 120],
			        ],
			        type : 'pie',
			        onclick: function (d, i) { console.log("onclick", d, i); },
			        onmouseover: function (d, i) { console.log("onmouseover", d, i); },
			        onmouseout: function (d, i) { console.log("onmouseout", d, i); }
			    },
			    color: {
			        pattern: ['#06c5ac','#3faae3','#ee634c','#6bbd95','#f4cc0b','#9b59b6','#16a085','#c0392b']
			    }
			});
		        var data = [
				    {
				        value: 220,
				        color:"#A2D19E",
				        highlight: "rgba(162, 209, 158, 0.9)",
				        label: "Success"
				    },
				    {
				        value: 70,
				        color: "#D57D6D",
				        highlight: "rgba(213, 125, 109, 0.9)",
				        label: "Danger"
				    },
				    {
				        value: 100,
				        color: "#80B1CB",
				        highlight: "rgba(128, 177, 203, 0.9)",
				        label: "Info"
				    }
				]
				var cpie = document.getElementById("cpie").getContext("2d");
		        new Chart(cpie).Pie(data, {
		            responsive: true
		        });
		        $('.warning-growl').click(function(event) {
		            return $.growl.warning({
		            message: "The kitten is ugly!"
		          });
		        });
		})
	</script>
@stop