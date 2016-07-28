(function(){
  angular.module('baudeoPanel.controllers', [])
  .controller('menuNavController', ['$scope', '$routeParams', '$location', function($scope, $routeParams, $location){
		$scope.routeParams = $location.path();
		switch ($scope.routeParams) {
			case '/projects': $scope.selected = 1;  break;
      case '/project': $scope.selected = 1;  break;
      case '/services': $scope.selected = 2;  break;
      case '/service': $scope.selected = 2;  break;
      case '/slider-home': $scope.selected = 3;  break;
      case '/slider-promotions': $scope.selected = 4;  break;
      case '/slider-equipment': $scope.selected = 5;  break;
      case '/slider-instalations': $scope.selected = 6;  break;
      case '/slider-material': $scope.selected = 7;  break;
      case '/slider-personal': $scope.selected = 8;  break;
      case '/patients': $scope.selected = 9;  break;
      case '/patient': $scope.selected = 9;  break;
		}
		$scope.changeNav = function(item){
			$scope.selected = item;
		};
	}])
  .controller('tinyController', ['$scope', function($scope){
    $scope.tinymceOptions = {
      onChange: function(e) {
        // put logic here for keypress and cut/paste changes
      },
      inline: false,
      plugins : 'advlist autolink link image lists charmap print preview table',
      skin: 'lightgray',
      theme : 'modern',
      height : 600
    };
  }])
  .controller('projectNavController', ['$scope', function($scope){
		$scope.item = 1;
		$scope.selectItem = function(item){
			$scope.item = item;
		};
  }])
  .controller('projectListController', ['$scope', 'baudeoService', function($scope, baudeoService){
    $scope.projectList = [];
    baudeoService.getProjectList().then(function(data){
      $scope.projectList = data;
    });
  }])
  .controller('projectDescription', ['$scope', '$routeParams', 'baudeoService', function($scope, $routeParams, baudeoService){
    $scope.projectElement = [];
    $scope.id = parseInt($routeParams.id);
    baudeoService.getProjectById($scope.id).then(function(data){
      $scope.projectElement = data;
    });
  }])
  .controller('sliderHome', ['$scope', '$routeParams', 'baudeoService', function($scope, $routeParams, baudeoService){
    $scope.sliderElements = [];
    baudeoService.getSliderHome().then(function(data){
      $scope.sliderElements = data;
    });
  }])
  .controller('serviceListController', ['$scope', 'baudeoService', function($scope, baudeoService){
    $scope.serviceList = [];
    baudeoService.getServicesList().then(function(data){
      $scope.serviceList = data;
    });
  }])
  .controller('serviceDescription', ['$scope', '$routeParams', 'baudeoService', function($scope, $routeParams, baudeoService){
    $scope.serviceElement = [];
    $scope.id = parseInt($routeParams.id);
    baudeoService.getServiceById($scope.id).then(function(data){
      $scope.serviceElement = data;
    });
  }])
  .controller('sliderPromotions', ['$scope', '$routeParams', 'baudeoService', function($scope, $routeParams, baudeoService){
    $scope.sliderElements = [];
    baudeoService.getSliderPromotions().then(function(data){
      $scope.sliderElements = data;
    });
  }])
  .controller('sliderEquipment', ['$scope', '$routeParams', 'baudeoService', function($scope, $routeParams, baudeoService){
    $scope.sliderElements = [];
    baudeoService.sliderEquipment().then(function(data){
      $scope.sliderElements = data;
    });
  }])
  .controller('sliderInstalations', ['$scope', '$routeParams', 'baudeoService', function($scope, $routeParams, baudeoService){
    $scope.sliderElements = [];
    baudeoService.sliderInstalations().then(function(data){
      $scope.sliderElements = data;
    });
  }])
  .controller('sliderMaterial', ['$scope', '$routeParams', 'baudeoService', function($scope, $routeParams, baudeoService){
    $scope.sliderElements = [];
    baudeoService.sliderMaterial().then(function(data){
      $scope.sliderElements = data;
    });
  }])
  .controller('sliderPersonal', ['$scope', '$routeParams', 'baudeoService', function($scope, $routeParams, baudeoService){
    $scope.sliderElements = [];
    baudeoService.sliderPersonal().then(function(data){
      $scope.sliderElements = data;
    });
  }])
  .controller('patientListController', ['$scope', 'baudeoService', function($scope, baudeoService){
    $scope.patientList = [];
    baudeoService.getPatientList().then(function(data){
      $scope.patientList = data;
    });
  }])
  .controller('patientDescription', ['$scope', '$routeParams', 'baudeoService', function($scope, $routeParams, baudeoService){
    $scope.patientElement = [];
    $scope.id = parseInt($routeParams.id);
    baudeoService.getPatientById($scope.id).then(function(data){
      $scope.patientElement = data;
    });
  }])
})();
