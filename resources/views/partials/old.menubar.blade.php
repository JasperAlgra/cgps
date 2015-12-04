<aside id="sidebar">
	<div class="sidenav-outer">
		<div class="side-menu">
			<div class="menu-body">
				<ul class="nav nav-pills nav-stacked sidenav">
					<li >
						<a href="/home">
						<span class="glyphicon glyphicon-home"></span>
						</a>
						<ul class="nested-dropdown animated fadeIn">
							<li><a href="/home">{{ Lang::get(\Session::get('lang').'.dashboard') }}</a></li>
						</ul>
					</li>
					<li >
						<a href="/typography">
						<span class="glyphicon glyphicon-text-size"></span>
						</a>
						<ul class="nested-dropdown animated fadeIn">
							<li><a  href="/typography">{{ Lang::get(\Session::get('lang').'.typography') }}</a></li>
						</ul>
					</li>
					<li >
						<a href="/grid">
						<span class="glyphicon glyphicon-th-large"></span>
						</a>
						<ul class="nested-dropdown animated fadeIn">
							<li><a href="/grid">{{ Lang::get(\Session::get('lang').'.grid') }}</a></li>
						</ul>
					</li>
					<li >
						<a href="/table">
						<span class="glyphicon glyphicon-list"></span>
						</a>
						<ul class="nested-dropdown animated fadeIn">
							<li><a  href="/table">{{ Lang::get(\Session::get('lang').'.table') }}</a></li>
						</ul>
					</li>
					<li >
						<a href="/form-elements">
							<span class="glyphicon glyphicon-equalizer"></span>
						</a>
						<ul class="nested-dropdown animated fadeIn">
							<li class="sidemenu-header">{{ Lang::get(\Session::get('lang').'.form') }}</li>
							<li><a href="/form-elements">{{ Lang::get(\Session::get('lang').'.elements') }}</a></li>
							<li><a href="/form-components">{{ Lang::get(\Session::get('lang').'.components') }}</a></li>
						</ul>
					</li>
					<li >
						<a href="button">
						<span class="glyphicon glyphicon-cloud-download"></span>
						</a>
						<ul class="nested-dropdown animated fadeIn">
							<li class="sidemenu-header">{{ Lang::get(\Session::get('lang').'.user_interface') }}</li>
							<li><a href="button">{{ Lang::get(\Session::get('lang').'.buttons') }}</a></li>
							<li><a href="dropdown">{{ Lang::get(\Session::get('lang').'.dropdown') }}</a></li>
							<li><a href="icons">{{ Lang::get(\Session::get('lang').'.icons') }}</a></li>
							<li><a href="panels">{{ Lang::get(\Session::get('lang').'.panels') }}</a></li>
							<li><a href="alerts">{{ Lang::get(\Session::get('lang').'.alerts') }}</a></li>
							<li><a href="progressbars">{{ Lang::get(\Session::get('lang').'.progressbars') }}</a></li>
							<li><a href="pagination">{{ Lang::get(\Session::get('lang').'.pagination') }}</a></li>
							<li><a href="other-elements">{{ Lang::get(\Session::get('lang').'.other_elements') }}</a></li>
						</ul>
					</li>
					<li >
						<a href="chartjs">
						<span class="glyphicon glyphicon-signal"></span>	
						</a>
						<ul class="nested-dropdown animated fadeIn">
							<li class="sidemenu-header">{{ Lang::get(\Session::get('lang').'.charts') }}</li>	
							<li><a href="chartjs">Chart</a></li>
							<li><a href="c3chart">C3Chart</a></li>
						</ul>
					</li>
					<li > 
						<a href="calendar">
						<span class="glyphicon glyphicon-calendar"></span>
						</a>
						<ul class="nested-dropdown animated fadeIn">
							<li><a href="calendar">{{ Lang::get(\Session::get('lang').'.calendar') }}</a></li>
						</ul>
					</li>
					<li >
						<a href="inbox">
						<span class="glyphicon glyphicon-envelope"></span>
						</a>
						<ul class="nested-dropdown animated fadeIn">
							<li class="sidemenu-header">{{ Lang::get(\Session::get('lang').'.mail') }}</li>
							<li><a href="inbox">{{ Lang::get(\Session::get('lang').'.inbox') }}</a></li>
							<li><a href="compose">{{ Lang::get(\Session::get('lang').'.compose') }}</a></li>
						</ul>
					</li>
					<li > 
						<a href="invoice">
						<span class="glyphicon glyphicon-list-alt"></span>
						</a>
						<ul class="nested-dropdown animated fadeIn">
							<li><a href="invoice">{{ Lang::get(\Session::get('lang').'.invoice') }}</a></li>
						</ul>
					</li>
					<li > 
						<a href="docs">
						<span class="glyphicon glyphicon-credit-card"></span>
						</a>
						<ul class="nested-dropdown animated fadeIn">
							<li><a href="docs">Docs</a></li>
						</ul>
					</li>
					<li >
						<a href="blank">
						<span class="glyphicon glyphicon-duplicate"></span>
						</a>
						<ul class="nested-dropdown animated fadeIn">
							<li class="sidemenu-header">{{ Lang::get(\Session::get('lang').'.pages') }}</li>
							<li><a href="blank">{{ Lang::get(\Session::get('lang').'.blankpage') }}</a></li>
							<li><a href="login">{{ Lang::get(\Session::get('lang').'.login') }}</a></li>
							<li><a href="signup">{{ Lang::get(\Session::get('lang').'.singup') }}</a></li>
							<li><a href="404-page">{{ Lang::get(\Session::get('lang').'.404page') }}</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
		@include('partials.sidebar-widgets.sidebar-widgets')
	</div>
</aside>