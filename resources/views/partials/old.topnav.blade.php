<nav class="navbar topnav-navbar navbar-fixed-top" role="navigation">
	<div class="navbar-header text-center">
		<button type="button" class="navbar-toggle" onClick="showMenu();" >
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	    </button>

		<a class="navbar-brand" href="home"> Ani Laravel Theme </a>
	</div>
	<div class="collapse navbar-collapse">
		<form class="navbar-form navbar-left" role="search">
			<span class="glyphicon glyphicon-search"></span>
			<div class="form-group">
				<input type="text" class="form-control" placeholder="">
			</div>			
		</form>
		<ul class="nav navbar-nav">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"><span class="glyphicon glyphicon-envelope"></span><span class="badge badge-green">5</span></a>
				<ul class="dropdown-menu animated fadeIn">
					<li class="messages-top text-center">
						{{ Lang::get(\Session::get('lang').'.topnav1') }}
					</li>
					<li class="dropdown-messages">
						<a href="#">
							<div class="message-sender">
								{{ Lang::get(\Session::get('lang').'.lucy') }}
							</div>
							<div class="message-header">
								{{ Lang::get(\Session::get('lang').'.topnavheader1') }}
							</div>
						</a>
					</li>
					<li class="dropdown-messages">
						<a href="#">
							<div class="message-sender">
								{{ Lang::get(\Session::get('lang').'.diptesh') }}
							</div>
							<div class="message-header">
								{{ Lang::get(\Session::get('lang').'.topnavheader2') }}
							</div>
						</a>
					</li>
					<li class="dropdown-messages">
						<a href="#">
							<div class="message-sender">
								{{ Lang::get(\Session::get('lang').'.weng') }}
							</div>
							<div class="message-header">
								{{ Lang::get(\Session::get('lang').'.topnavheader3') }}			
							</div>
						</a>
					</li>
					<li class="dropdown-messages">
						<a href="#">
							<div class="message-sender">
								{{ Lang::get(\Session::get('lang').'.jade') }}
							</div>
							<div class="message-header">
								{{ Lang::get(\Session::get('lang').'.topnavheader4') }}			
							</div>
						</a>
					</li>
				</ul>
			</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
					<span class="glyphicon glyphicon-bell"></span><span class="badge badge-red">13</span>
				</a>
				<ul class="dropdown-menu animated fadeIn">
					<li class="messages-top text-center">
						{{ Lang::get(\Session::get('lang').'.threenotifications') }}	
					</li>
					<li class="dropdown-notifications">
						<a href="#">
							<div class="notification">
								<i class="fa fa-thumbs-up"></i>
								{{ Lang::get(\Session::get('lang').'.runuma') }}	
							</div>
						</a>
					</li>
					<li class="dropdown-notifications">
						<a href="#">
							<div class="notification">
								<i class="fa fa-thumbs-up"></i>
								{{ Lang::get(\Session::get('lang').'.harshita') }}
							</div>
						</a>
					</li>
					<li class="dropdown-notifications">
						<a href="#">
							<div class="notification">
								<i class="fa fa-user-plus"></i>
								{{ Lang::get(\Session::get('lang').'.archana') }}
							</div>
						</a>
					</li>
					<li class="dropdown-notifications">
						<a href="#">
							<div class="notification">
								<i class="fa fa-user-times"></i>
								{{ Lang::get(\Session::get('lang').'.animesh') }}
							</div>
						</a>
					</li>
				</ul>
			</li>
		</ul>
		<ul class="nav navbar-nav pull-right navbar-right">	
			<li class="dropdown color-picker">
	            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
	            	<span><i class="fa fa-circle"></i></span>
	            </a>
	            <ul class="dropdown-menu pull-right animated fadeIn" role="menu">
	                <li class="padder-h-xs">
	                    <table class="table color-swatches-table text-center no-m-b">
	                        <tr>
	                            <td class="text-center colorr">
	                                <a href="#" data-theme="blue" class="theme-picker">
	                                    <i class="fa fa-circle blue-base"></i>
	                                </a>
	                            </td>
	                            <td class="text-center colorr">
	                                <a href="#" data-theme="green" class="theme-picker">
	                                    <i class="fa fa-circle green-base"></i>
	                                </a>
	                            </td>
	                            <td class="text-center colorr">
	                                <a href="#" data-theme="red" class="theme-picker">
	                                    <i class="fa fa-circle red-base"></i>
	                                </a>
	                            </td>
	                        </tr>
	                        <tr>
	                         	<td class="text-center colorr">
	                                <a href="#" data-theme="purple" class="theme-picker">
	                                    <i class="fa fa-circle purple-base"></i>
	                                </a>
	                            </td>
	                            <td class="text-center color">
	                                <a href="#" data-theme="midnight-blue" class="theme-picker">
	                                    <i class="fa fa-circle midnight-blue-base"></i>
	                                </a>
	                            </td>
	                            <td class="text-center colorr">
	                                <a href="#" data-theme="lynch" class="theme-picker">
	                                    <i class="fa fa-circle lynch-base"></i>
	                                </a>
	                            </td>
	                        </tr>
	                    </table>
	                </li>
	            </ul>
	        </li>
	         <li>
	       		<a href="#" id="rtlswitch">
	                <span> LTR/RTL </span>
	            </a>
	        </li> 
            <li class="dropdown">
            	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
	            	<span>{{ Lang::get(\Session::get('lang').'.lang') }}</span>
	            </a>
            	<ul class="dropdown-menu lang pull-right fadeIn">
    				<li><a href="#" onclick="changeLanguage('en')" class="lang">English</a></li>
    				<li><a href="#" onclick="changeLanguage('de')" class="lang">Dutch</a></li>
    				<li><a href="#" onclick="changeLanguage('ur')" class="lang">اردو</a></li>
    				<li><a href="#" onclick="changeLanguage('hn')" class="lang">हिन्दी</a></li>
    			</ul>
            </li>

	        <li class="dropdown admin-dropdown">
	            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
	            	<img src="images/flat-avatar.png" class="topnav-img" alt=""><span class="hidden-sm">Ani Pascal</span>
	            </a>
	            <ul class="dropdown-menu" role="menu">
	                <li><a href="profile">{{ Lang::get(\Session::get('lang').'.profilee') }}</a></li>
	                <li><a href="login">{{ Lang::get(\Session::get('lang').'.logout') }}</a></li>
	            </ul>
	        </li>
		</ul>
		<a class="btn btn-primary btn-rounded pull-right btn-bordered visible-lg" href="http://www.strapui.com/themes/ani-laravel-theme/" style="margin: 8px 10px 0 0;">Buy Now</a>

	</div>
	<ul class="nav navbar-nav pull-right hidd">	
		<li class="dropdown admin-dropdown" dropdown on-toggle="toggled(open)">
			<a href class="dropdown-toggle animated fadeIn" dropdown-toggle><img src="images/flat-avatar.png" class="topnav-img" alt=""></a>
			<ul class="dropdown-menu pull-right">
				<li><a href="profile">profile</a></li>
				<li><a href="login">logout</a></li>
			</ul>
		</li>	
	</ul>
</nav>