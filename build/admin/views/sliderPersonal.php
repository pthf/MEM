<div class="row" ng-controller="projectNavController">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">MEM SLIDER PERSONAL</h3>
			</div>


			<div class="panel panel-body" ng-controller="sliderPersonal">
				<ul class="nav nav-tabs">
				  <li style="cursor: pointer;" role="presentation" ng-class="{ active:item === 1 }"><a ng-click="selectItem(1)">Slide Personal</a></li>
				</ul>
				<div ng-show="item === 1" class="cont-nav">
					<list-slider-personal></list-slider-personal>
				</div>
			</div>
		</div>
	</div>
</div>
<div ng-show="!show">
</div>
