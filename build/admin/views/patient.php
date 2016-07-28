<div class="row" ng-controller="projectNavController">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">MEM PROJECTS</h3>
			</div>
			<div class="panel panel-body" ng-controller="patientDescription">
				<ul class="nav nav-tabs">
				  <li style="cursor: pointer;" role="presentation" ng-class="{ active:item === 1 }"><a ng-click="selectItem(1)">Edit</a></li>
					<li style="cursor: pointer;" role="presentation" ><a href="#/patients">Back</a></li>
				</ul>
				<div ng-show="item === 1" class="cont-nav">
					<form-patient-edit></form-patient-edit>
				</div>
			</div>
		</div>
	</div>
</div>
<div ng-show="!show">
</div>
