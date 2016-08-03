(function(){
  angular.module('baudeoPanel.controllers', [])
  .controller('menuNavController', ['$scope', '$routeParams', '$location', function($scope, $routeParams, $location){
		$scope.routeParams = $location.path();
		switch ($scope.routeParams) {
			// case '/projects': $scope.selected = 1;  break;
   //    case '/project': $scope.selected = 1;  break;
      case '/interest-blog': $scope.selected = 1;  break;
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
    $scope.tinymceModel = 'Initial content';
    $scope.getContent = function() {
      console.log('Editor content:', $scope.tinymceModel);
    };
    $scope.setContent = function() {
      $scope.tinymceModel = 'Time: ' + (new Date());
    };
    $scope.tinymceOptions = {
      onChange: function(e) {
      },
      inline: false,
      plugins : 'advlist autolink link image lists charmap print preview table',
      skin: 'lightgray',
      theme : 'modern',
      height : 600,
      convert_urls:true,
      relative_urls:false,
      remove_script_host:false,
    };
  }])
  .controller('viewNavController', ['$scope', function($scope){
    $scope.item = 1;
    $scope.selectItem = function(item){
      $scope.item = item;
    };
  }])
  .controller('getListInterestBlogController', ['$scope', 'baudeoService', function($scope, baudeoService){
    $scope.listInterestBlog = [];
    $scope.loadList = function(){
      baudeoService.getListInterestBlog().then(function(data){
        $scope.listInterestBlog = data;
      });
    }
    $scope.loadList();
  }])
  .controller('getImagesLibraryController', ['$scope', 'baudeoService', function($scope, baudeoService){
    $scope.listImages = [];
    $scope.loadList = function(){
      baudeoService.getImagesLibrary().then(function(data){
        $scope.listImages = data;
      });
    }
    $scope.loadList();
  }])
  .controller('getInterestPostByIdController', ['$scope', '$routeParams', 'baudeoService', '$sce', function($scope, $routeParams, baudeoService, $sce){
    $scope.id = parseInt($routeParams.id);
    $scope.informationPost = [];
    $scope.loadInformation = function(){
      baudeoService.getInformationPost($scope.id).then(function(data){
        $scope.informationPost = data;
      });
    }
    $scope.loadInformation();
    $scope.trustAsHtml = function(html) {
      return $sce.trustAsHtml(html);
    };
  }])
  // .controller('getEventPostByIdController', ['$scope', '$routeParams', 'baudeoService', '$sce', function($scope, $routeParams, baudeoService, $sce){
  //   $scope.id = parseInt($routeParams.id);
  //   $scope.informationPost = [];
  //   $scope.loadInformation = function(){
  //     baudeoService.getInformationEventPost($scope.id).then(function(data){
  //       $scope.informationPost = data;
  //     });
  //   }
  //   $scope.loadInformation();
  //   $scope.trustAsHtml = function(html) {
  //     return $sce.trustAsHtml(html);
  //   };
  // }])
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
