@extends('layouts.dashboard')

@section('section')
<div class="conter-wrapper">                
    <div class="row">
        @include('widgets.progress-bar.progress')
        @include('widgets.progress-bar.contextual-progress')
   </div>

    <div class="row">
        @include('widgets.progress-bar.striped-progress')     
        <div class="col-md-6">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title">Animated Progresbars</h3>
                </div>
                <div class="panel-body">
                    @include('widgets.progress-bar.animated-progress',array('value'=>'65','class'=>'progress-striped active','type'=>'primary'))
                    @include('widgets.progress-bar.animated-progress',array('value'=>'92','class'=>'progress-striped active','type'=>'success'))
                    @include('widgets.progress-bar.animated-progress',array('value'=>'77','class'=>'progress-striped active','type'=>'info'))
                    @include('widgets.progress-bar.animated-progress',array('value'=>'34','class'=>'progress-striped active','type'=>'warning'))
                    @include('widgets.progress-bar.animated-progress',array('value'=>'22','class'=>'progress-striped active','type'=>'danger'))
                </div>
            </div>
        </div>
    </div>
</div>
@stop