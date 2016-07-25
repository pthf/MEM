(function(){
  angular.module('baudeoPanel.services', [])
  .factory('baudeoService', ['$http', '$q', function($http, $q){
    function getProjectList(){
      var deferred = $q.defer();
			$http.get('./../php/services.php?namefunction=getProjectList')
				.success(function (data) {
		        deferred.resolve(data);
		    });
		    return deferred.promise;
    }
    function getProjectById(id){
      var deferred = $q.defer();
      $http.get('./../php/services.php?namefunction=getProjectById&id='+id)
				.success(function (data) {
		        deferred.resolve(data);
		    });
		    return deferred.promise;
    }
    function getCategory(id){
      var deferred = $q.defer();
      $http.get('./../php/services.php?namefunction=getCategory&id='+id)
				.success(function (data) {
		        deferred.resolve(data);
		    });
		    return deferred.promise;
    }
    function getSliderHome(){
      var deferred = $q.defer();
      $http.get('./../php/services.php?namefunction=getSliderHome')
				.success(function (data) {
		        deferred.resolve(data);
		    });
		    return deferred.promise;
    }
    function getSliderPromotions(){
      var deferred = $q.defer();
      $http.get('./../php/services.php?namefunction=getSliderPromotions')
        .success(function (data) {
            deferred.resolve(data);
        });
        return deferred.promise;
    }
    function sliderEquipment(){
      var deferred = $q.defer();
      $http.get('./../php/services.php?namefunction=sliderEquipment')
        .success(function (data) {
            deferred.resolve(data);
        });
        return deferred.promise;
    }
    function sliderInstalations(){
      var deferred = $q.defer();
      $http.get('./../php/services.php?namefunction=sliderInstalations')
        .success(function (data) {
            deferred.resolve(data);
        });
        return deferred.promise;
    }
    function sliderMaterial(){
      var deferred = $q.defer();
      $http.get('./../php/services.php?namefunction=sliderMaterial')
        .success(function (data) {
            deferred.resolve(data);
        });
        return deferred.promise;
    }
    function sliderPersonal(){
      var deferred = $q.defer();
      $http.get('./../php/services.php?namefunction=sliderPersonal')
        .success(function (data) {
            deferred.resolve(data);
        });
        return deferred.promise;
    }
    function getServicesList(){
      var deferred = $q.defer();
      $http.get('./../php/services.php?namefunction=getServicesList')
        .success(function(data){
          deferred.resolve(data);
        });
        return deferred.promise;
    }
    function getServiceById(id){
      var deferred = $q.defer();
      $http.get('./../php/services.php?namefunction=getServiceById&id='+id)
				.success(function (data) {
		        deferred.resolve(data);
		    });
		    return deferred.promise;
    }
    return {
      getProjectList : getProjectList,
      getProjectById: getProjectById,
      getCategory: getCategory,
      getSliderHome: getSliderHome,
      getSliderPromotions: getSliderPromotions,
      sliderEquipment: sliderEquipment,
      sliderInstalations: sliderInstalations,
      sliderMaterial: sliderMaterial,
      sliderPersonal: sliderPersonal,
      getServicesList: getServicesList,
      getServiceById: getServiceById
    }
  }]);
})();
