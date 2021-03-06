@extends('layouts.dashboard')
@section('section')
	<div class="conter-wrapper">				
		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">Default Form		  
							<div class="panel-control pull-right">
								<a class="panelButton"><i class="fa fa-refresh"></i></a>
								<a class="panelButton"><i class="fa fa-minus"></i></a>
								<a class="panelButton"><i class="fa fa-remove"></i></a>
							</div>
						</h3>
					</div>
					<div class="panel-body">
						<form>
							<div class="form-group">
								<label for="exampleInputEmail1">Email address</label>
								<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Password</label>
								<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox"> Remember me
								</label>
							</div>
							<button type="submit" class="btn btn-default">Submit</button>
						</form>
					</div>
				</div>

				<div class="panel panel-success">

					<div class="panel-heading">
						<h3 class="panel-title">Horizontal Form		  
							<div class="panel-control pull-right">
								<a class="panelButton"><i class="fa fa-refresh"></i></a>
								<a class="panelButton"><i class="fa fa-minus"></i></a>
								<a class="panelButton"><i class="fa fa-remove"></i></a>
							</div>
						</h3>
					</div>
					<div class="panel-body">
						<form class="form-horizontal">
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
								<div class="col-sm-10">
									<input type="email" class="form-control" id="inputEmail3" placeholder="Email">
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword3" class="col-sm-2 control-label">Password</label>
								<div class="col-sm-10">
									<input type="password" class="form-control" id="inputPassword3" placeholder="Password">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<div class="checkbox">
										<label>
											<input type="checkbox"> Remember me
										</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button type="submit" class="btn btn-default">Sign in</button> &nbsp; 
								</div>
							</div>
						</form>
					</div>
				</div>

				<div class="panel panel-primary">

					<div class="panel-heading">
						<h3 class="panel-title">Inline Form		  
							<div class="panel-control pull-right">
								<a class="panelButton"><i class="fa fa-refresh"></i></a>
								<a class="panelButton"><i class="fa fa-minus"></i></a>
								<a class="panelButton"><i class="fa fa-remove"></i></a>
							</div>
						</h3>

					</div>
					<div class="panel-body">
						<form class="form-inline">
							<div class="form-group">
								<label for="exampleInputName2">Name</label>
								<input type="text" class="form-control" id="exampleInputName2" placeholder="Jane Doe">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail2">Email</label>
								<input type="email" class="form-control" id="exampleInputEmail2" placeholder="jane.doe@example.com">
							</div>
							<button type="submit" class="btn btn-default">Send invitation</button>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="panel panel-danger">

					<div class="panel-heading">
						<h3 class="panel-title">Inline Underline Form		  
							<div class="panel-control pull-right">
								<a class="panelButton"><i class="fa fa-refresh"></i></a>
								<a class="panelButton"><i class="fa fa-minus"></i></a>
								<a class="panelButton"><i class="fa fa-remove"></i></a>
							</div>
						</h3>

					</div>
					<div class="panel-body">
						<form class="form-inline">
							<div class="form-group">
								<label for="exampleInputName2">Name</label>
								<input type="text" class="form-control underline" id="exampleInputName2" placeholder="Jane Doe">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail2">Email</label>
								<input type="email" class="form-control underline" id="exampleInputEmail2" placeholder="jane.doe@example.com">
							</div>
							<button type="submit" class="btn btn-default">Send invitation</button>
						</form>
					</div>
				</div>
			</div>

			<div class="col-md-6">
				<div class="panel panel-warning">

					<div class="panel-heading">
						<h3 class="panel-title">Underline Default Form		  
							<div class="panel-control pull-right">
								<a class="panelButton"><i class="fa fa-refresh"></i></a>
								<a class="panelButton"><i class="fa fa-minus"></i></a>
								<a class="panelButton"><i class="fa fa-remove"></i></a>
							</div>
						</h3>
					</div>
					<div class="panel-body">
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
				</div>

				<div class="panel panel-info">

					<div class="panel-heading">
						<h3 class="panel-title">Horizontal Underline Form		  
							<div class="panel-control pull-right">
								<a class="panelButton"><i class="fa fa-refresh"></i></a>
								<a class="panelButton"><i class="fa fa-minus"></i></a>
								<a class="panelButton"><i class="fa fa-remove"></i></a>
							</div>
						</h3>
					</div>
					<div class="panel-body">
						<form>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
								<div class="col-sm-10">
									<input type="email" class="form-control underline" id="inputEmail3" placeholder="Email">
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword3" class="col-sm-2 control-label">Password</label>
								<div class="col-sm-10">
									<input type="password" class="form-control underline" id="inputPassword3" placeholder="Password">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<div class="checkbox">
										<label>
											<input type="checkbox"> Remember me
										</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button type="submit" class="btn btn-default">Sign in</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop