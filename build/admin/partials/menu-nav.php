<?php
  session_start();
  include('../php/connect_bd.php');
  connect_base_de_datos();
  $query = "SELECT * FROM adminuser WHERE idAdminUser = ".$_SESSION['idAdmin'];
  $result = mysql_query($query) or die(mysql_error());
  $line = mysql_fetch_array($result);
?>
<div class="logoNav">
	<a href="#/projects"><img src="../../img/logo-mem.svg"></a>
</div>
<div class="msgWelcome" style="width: 90%; height: auto; text-align: center; color: #FFF;" >
	<h5 style="display: inline-block; ">Welcome <strong style="color: #FFF;"><?= $line['adminName'] ?></strong>
</div>
<div class="menuNav" ng-controller="menuNavController">
	<div class="row">
		<div class="col-md-12">
      <ul class="nav nav-pills nav-stacked">
  			<li style="background: #23275f; color: #FFF;" role="presentation" ng-class="{active:selected===1}" ng-click="changeNav(1)"><a href="#/projects" style="color: #FFF;"><span class="glyphicon glyphicon-duplicate" aria-hidden="true"></span>Notes</a></li>
  			<li style="background: #23275f; color: #FFF;" role="presentation" ng-class="{active:selected===2}" ng-click="changeNav(2)"><a href="#/services" style="color: #FFF;"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span>Services</a></li>
        <li style="background: #23275f; color: #FFF;" role="presentation" ng-class="{active:selected===3}" ng-click="changeNav(3)"><a href="#/slider-home" style="color: #FFF;"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span>Slider Home</a></li>
        <li style="background: #23275f; color: #FFF;" role="presentation" ng-class="{active:selected===4}" ng-click="changeNav(4)"><a href="#/slider-promotions" style="color: #FFF;"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span>Slider Promotions</a></li>
        <li style="background: #23275f; color: #FFF;" role="presentation" ng-class="{active:selected===5}" ng-click="changeNav(5)"><a href="#/slider-equipment" style="color: #FFF;"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span>Slider Equipment</a></li>
        <li style="background: #23275f; color: #FFF;" role="presentation" ng-class="{active:selected===6}" ng-click="changeNav(6)"><a href="#/slider-instalations" style="color: #FFF;"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span>Slider Instalations</a></li>
        <li style="background: #23275f; color: #FFF;" role="presentation" ng-class="{active:selected===7}" ng-click="changeNav(7)"><a href="#/slider-material" style="color: #FFF;"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span>Slider Material</a></li>
        <li style="background: #23275f; color: #FFF;" role="presentation" ng-class="{active:selected===8}" ng-click="changeNav(8)"><a href="#/slider-personal" style="color: #FFF;"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span>Slider Personal</a></li>
        <li style="background: #23275f; color: #FFF;" role="presentation" ng-class="{active:selected===9}" ng-click="changeNav(9)"><a href="#/patients" style="color: #FFF;"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span>Patients</a></li>
  		</ul>
		</div>
	</div>
</div>
