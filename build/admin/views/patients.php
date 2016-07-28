<div class="row" ng-controller="projectNavController">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">MEM PATIENTS</h3>
			</div>
			<div class="panel panel-body">
				<ul class="nav nav-tabs">
				  <li style="cursor: pointer;" role="presentation" ng-class="{ active:item === 1 }"><a ng-click="selectItem(1)">List Patients</a></li>
				  <li style="cursor: pointer;" role="presentation" ng-class="{ active:item === 2 }"><a ng-click="selectItem(2)">Add Patient</a></li>
				</ul>
				<div ng-show="item === 1" class="cont-nav">
          		<list-patient ng-controller="patientListController"></list-patient>
				</div>
				<div ng-show="item === 2" class="cont-nav">
					<form-patient></form-patient>
				</div>
			</div>
		</div>
	</div>
</div>
<div ng-show="!show">
</div>