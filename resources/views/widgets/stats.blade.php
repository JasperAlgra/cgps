<a href="{{$link}}" class="stat hvr-wobble-horizontal">
	<div class=" stat-icon">
		<i class="fa fa-{{ $icon }} fa-4x text-{{ $bgclass }} "></i>
	</div>
	<div class=" stat-label">
		<div class="label-header">
			{{ $value }}%
		</div>
		<div class="progress-sm progress ng-isolate-scope" value="progressValue" type="info">
		  	<div class="progress-bar progress-bar-{{ $bgclass }}" role="progressbar"
		   		aria-valuenow="{{ $value }}" aria-valuemin="0" aria-valuemax="100"  style="width: {{ $value }}%;">
		   	</div>
		</div>  
		<div class="clearfix stat-detail">	
			<div class="label-body">
				<i class="fa fa-arrow-circle-o-right pull-right text-muted"></i>{{ $text }}
			</div>
		</div>
	</div>
</a>