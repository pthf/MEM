<div class="row" ng-controller="projectNavController">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">MEM SLIDER PROMOTIONS</h3>
			</div>


			<div class="panel panel-body" ng-controller="sliderPromotions">
				<ul class="nav nav-tabs">
				  <li style="cursor: pointer;" role="presentation" ng-class="{ active:item === 1 }"><a ng-click="selectItem(1)">Slide Promotions</a></li>
				</ul>
				<div ng-show="item === 1" class="cont-nav">
					<list-slider-promotions></list-slider-promotions>
				</div>
			</div>
		</div>
	</div>
</div>
<div ng-show="!show">
</div>
