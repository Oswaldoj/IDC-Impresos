(function(){
'use strict';

angular.module('TestApp',[])
.controller('AppController',AppController)
.service('APIRetrieverService',APIRetrieverService);

AppController.$inject = ['APIRetrieverService'];
function AppController(APIRetrieverService){
	var ctrl = this;
	ctrl.areas = [];
	var promise = APIRetrieverService.getAreas();
	promise.then(function(response) {
		ctrl.areas = response;
	})
	.catch(function(error){
		console.log(error);
	});
}

APIRetrieverService.$inject = ['$http'];
function APIRetrieverService($http){
  var service = this;

  service.getAreas = function(){
	 var response = $http({
	 	method: "GET",
	 	url: 'services'
	 }).then(function(response) {
		return response.data.results;
	 });
	 return response;
  }
}

})();