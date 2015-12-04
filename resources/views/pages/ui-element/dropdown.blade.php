@extends('layouts.dashboard')

@section('section')
<div class="conter-wrapper">        
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Navbar</h3>
                </div>
                <div class="panel-body">
                    <h4>Default Style</h4>
                    <nav class="navbar navbar-default display-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="#"></a>
                            </div>
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav">
                                    <li class="active"><a href="#">Link</a></li>
                                    <li><a href="#">Link</a></li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#">Action</a></li>
                                            <li><a href="#">Another action</a></li>
                                            <li><a href="#">Something else here</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#">Separated link</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#">One more separated link</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <form class="navbar-form navbar-left" role="search">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Search">
                                    </div>
                                    <button type="submit" class="btn btn-default">Submit</button>
                                </form>
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="#">Link</a></li>
                                    <li class="dropdown" dropdown>
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#">Action</a></li>
                                            <li><a href="#">Another action</a></li>
                                            <li><a href="#">Something else here</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#">Separated link</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <h4>Inverted Style</h4>
                    <nav class="navbar navbar-inverse display-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="#"></a>
                            </div>
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav">
                                    <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
                                    <li><a href="#">Link</a></li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#">Action</a></li>
                                            <li><a href="#">Another action</a></li>
                                            <li><a href="#">Something else here</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#">Separated link</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#">One more separated link</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <form class="navbar-form navbar-left" role="search">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Search">
                                    </div>
                                    <button type="submit" class="btn btn-default">Submit</button>
                                </form>
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="#">Link</a></li>
                                    <li class="dropdown" dropdown>
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#">Action</a></li>
                                            <li><a href="#">Another action</a></li>
                                            <li><a href="#">Something else here</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#">Separated link</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div> 
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">Regular Dropdown</h3>
                </div>                
                <div class="panel-body">
                        @include('widgets.dropdown-button', array('value'=>'Button Dropdown', 'submenu'=> array( 'lists' => array('name' => 'Action', 'link' => '#'),array('name' => 'Another action', 'link' => '#'))))
                        @include('widgets.dropdown-button', array('class'=>'primary', 'value'=>'Button Dropdown', 'submenu'=> array( 'lists' => array('name' => 'Action', 'link' => '#'),array('name' => 'Another action', 'link' => '#'))))
                        @include('widgets.dropdown-button', array('class'=>'success', 'value'=>'Button Dropdown', 'submenu'=> array( 'lists' => array('name' => 'Action', 'link' => '#'),array('name' => 'Another action', 'link' => '#'))))
                        @include('widgets.dropdown-button', array('class'=>'warning', 'value'=>'Button Dropdown', 'submenu'=> array( 'lists' => array('name' => 'Action', 'link' => '#'),array('name' => 'Another action', 'link' => '#'))))
                        @include('widgets.dropdown-button', array('class'=>'danger', 'value'=>'Button Dropdown', 'submenu'=> array( 'lists' => array('name' => 'Action', 'link' => '#'),array('name' => 'Another action', 'link' => '#'))))
                    <hr>
                        @include('widgets.dropdown-button', array('value'=>'Button Dropdown', 'rounded'=>true, 'submenu'=> array( 'lists' => array('name' => 'Action', 'link' => '#'),array('name' => 'Another action', 'link' => '#'))))
                        @include('widgets.dropdown-button', array('class'=>'primary', 'value'=>'Button Dropdown', 'rounded'=>true, 'submenu'=> array( 'lists' => array('name' => 'Action', 'link' => '#'),array('name' => 'Another action', 'link' => '#'))))
                        @include('widgets.dropdown-button', array('class'=>'success', 'value'=>'Button Dropdown', 'rounded'=>true, 'submenu'=> array( 'lists' => array('name' => 'Action', 'link' => '#'),array('name' => 'Another action', 'link' => '#'))))
                        @include('widgets.dropdown-button', array('class'=>'warning', 'value'=>'Button Dropdown', 'rounded'=>true, 'submenu'=> array( 'lists' => array('name' => 'Action', 'link' => '#'),array('name' => 'Another action', 'link' => '#'))))
                        @include('widgets.dropdown-button', array('class'=>'danger', 'value'=>'Button Dropdown', 'rounded'=>true, 'submenu'=> array( 'lists' => array('name' => 'Action', 'link' => '#'),array('name' => 'Another action', 'link' => '#'))))

                    <hr>
                    @include('widgets.dropdown-button', array('value'=>'Button Dropdown', 'bordered'=>true, 'submenu'=> array( 'lists' => array('name' => 'Action', 'link' => '#'),array('name' => 'Another action', 'link' => '#'))))
                    @include('widgets.dropdown-button', array('class'=>'primary', 'value'=>'Button Dropdown', 'bordered'=>true, 'submenu'=> array( 'lists' => array('name' => 'Action', 'link' => '#'),array('name' => 'Another action', 'link' => '#'))))
                    @include('widgets.dropdown-button', array('class'=>'success', 'value'=>'Button Dropdown', 'bordered'=>true, 'submenu'=> array( 'lists' => array('name' => 'Action', 'link' => '#'),array('name' => 'Another action', 'link' => '#'))))
                    @include('widgets.dropdown-button', array('class'=>'warning', 'value'=>'Button Dropdown', 'bordered'=>true, 'submenu'=> array( 'lists' => array('name' => 'Action', 'link' => '#'),array('name' => 'Another action', 'link' => '#'))))
                    @include('widgets.dropdown-button', array('class'=>'danger', 'value'=>'Button Dropdown', 'bordered'=>true, 'submenu'=> array( 'lists' => array('name' => 'Action', 'link' => '#'),array('name' => 'Another action', 'link' => '#'))))
                </div>
            </div>
        </div> 
    </div>     
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-success">

                <div class="panel-heading">
                    <h3 class="panel-title">Split-Button Dropdown</h3>
                </div>
                <div class="panel-body">
                    @include('widgets.dropdown-button', array('split'=>true, 'size'=>'', 'value'=>'Action', 'submenu'=> array( 'lists' => array('name' => 'Action', 'link' => '#'),array('name' => 'Another action', 'link' => '#'))))
                    @include('widgets.dropdown-button', array('split'=>true, 'class'=>'primary', 'value'=>'Action', 'submenu'=> array( 'lists' => array('name' => 'Action', 'link' => '#'),array('name' => 'Another action', 'link' => '#'))))
                    @include('widgets.dropdown-button', array('split'=>true, 'class'=>'success', 'value'=>'Action', 'submenu'=> array( 'lists' => array('name' => 'Action', 'link' => '#'),array('name' => 'Another action', 'link' => '#'))))
                    @include('widgets.dropdown-button', array('split'=>true, 'class'=>'warning', 'value'=>'Action', 'submenu'=> array( 'lists' => array('name' => 'Action', 'link' => '#'),array('name' => 'Another action', 'link' => '#'))))
                    @include('widgets.dropdown-button', array('split'=>true, 'class'=>'danger', 'value'=>'Action', 'submenu'=> array( 'lists' => array('name' => 'Action', 'link' => '#'),array('name' => 'Another action', 'link' => '#'))))
                    <hr>
                    @include('widgets.dropdown-button', array('split'=>true, 'size'=>'', 'value'=>'Action', 'rounded'=>true, 'submenu'=> array( 'lists' => array('name' => 'Action', 'link' => '#'),array('name' => 'Another action', 'link' => '#'))))
                    @include('widgets.dropdown-button', array('split'=>true, 'class'=>'primary', 'value'=>'Action', 'rounded'=>true, 'submenu'=> array( 'lists' => array('name' => 'Action', 'link' => '#'),array('name' => 'Another action', 'link' => '#'))))
                    @include('widgets.dropdown-button', array('split'=>true, 'class'=>'success', 'value'=>'Action', 'rounded'=>true, 'submenu'=> array( 'lists' => array('name' => 'Action', 'link' => '#'),array('name' => 'Another action', 'link' => '#'))))
                    @include('widgets.dropdown-button', array('split'=>true, 'class'=>'warning', 'value'=>'Action', 'rounded'=>true, 'submenu'=> array( 'lists' => array('name' => 'Action', 'link' => '#'),array('name' => 'Another action', 'link' => '#'))))
                    @include('widgets.dropdown-button', array('split'=>true, 'class'=>'danger', 'value'=>'Action', 'rounded'=>true, 'submenu'=> array( 'lists' => array('name' => 'Action', 'link' => '#'),array('name' => 'Another action', 'link' => '#'))))
                    <hr>                    
                    @include('widgets.dropdown-button', array('split'=>true, 'size'=>'', 'value'=>'Action', 'bordered'=>true, 'submenu'=> array( 'lists' => array('name' => 'Action', 'link' => '#'),array('name' => 'Another action', 'link' => '#'))))
                    @include('widgets.dropdown-button', array('split'=>true, 'class'=>'primary', 'value'=>'Action', 'bordered'=>true, 'submenu'=> array( 'lists' => array('name' => 'Action', 'link' => '#'),array('name' => 'Another action', 'link' => '#'))))
                    @include('widgets.dropdown-button', array('split'=>true, 'class'=>'success', 'value'=>'Action', 'bordered'=>true, 'submenu'=> array( 'lists' => array('name' => 'Action', 'link' => '#'),array('name' => 'Another action', 'link' => '#'))))
                    @include('widgets.dropdown-button', array('split'=>true, 'class'=>'warning', 'value'=>'Action', 'bordered'=>true, 'submenu'=> array( 'lists' => array('name' => 'Action', 'link' => '#'),array('name' => 'Another action', 'link' => '#'))))
                    @include('widgets.dropdown-button', array('split'=>true, 'class'=>'danger', 'value'=>'Action', 'bordered'=>true, 'submenu'=> array( 'lists' => array('name' => 'Action', 'link' => '#'),array('name' => 'Another action', 'link' => '#'))))
                </div>
            </div>

        </div>
    </div>  
</div>
@stop