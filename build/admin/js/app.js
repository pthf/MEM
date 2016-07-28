(function(){
  var app = angular.module('baudeoPanel', [
		'ngRoute',
		'baudeoPanel.controllers',
		'baudeoPanel.services',
		'baudeoPanel.directives'
	]);
  app.config(['$routeProvider', function($routeProvider){
    $routeProvider
      .when('/projects', {
        templateUrl: './../views/projects.php',
        controller: 'menuNavController'
      })
      .when('/services', {
        templateUrl: './../views/services.php',
        controller: 'menuNavController'
      })
      .when('/project/:id', {
        templateUrl: './../views/project.php',
        controller: 'menuNavController'
      })
      .when('/service/:id', {
        templateUrl: './../views/service.php',
        controller: 'menuNavController'
      })
      .when('/slider-home', {
        templateUrl: './../views/sliderHome.php',
        controller: 'menuNavController'
      })
      .when('/slider-promotions', {
        templateUrl: './../views/sliderPromotions.php',
        controller: 'menuNavController'
      })
      .when('/slider-equipment', {
        templateUrl: './../views/sliderEquipment.php',
        controller: 'menuNavController'
      })
      .when('/slider-instalations', {
        templateUrl: './../views/sliderInstalations.php',
        controller: 'menuNavController'
      })
      .when('/slider-material', {
        templateUrl: './../views/sliderMaterial.php',
        controller: 'menuNavController'
      })
      .when('/slider-personal', {
        templateUrl: './../views/sliderPersonal.php',
        controller: 'menuNavController'
      })
      .when('/patients', {
        templateUrl: './../views/patients.php',
        controller: 'menuNavController'
      })
      .when('/patient/:id', {
        templateUrl: './../views/patient.php',
        controller: 'menuNavController'
      })
      .otherwise({
        redirectTo: '/projects'
      });
  }]);
})();
