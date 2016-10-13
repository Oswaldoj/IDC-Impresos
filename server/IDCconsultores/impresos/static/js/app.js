(function(){
'use strict';

angular.module('TestApp',['ngResource'])
.controller('AppController',AppController)
.factory('Area',AreaResourceFactory)
.factory('Service',ServiceResourceFactory);

AreaResourceFactory.$inject = ['$resource'];
function AreaResourceFactory($resource){
    return $resource('/areas/:id', {id: '@id'},
    {
	    query: {
	      method: 'GET',
	      isArray: true,
	      transformResponse: function(data) {
	      	//django data is under results field
	        return angular.fromJson(data).results; 
	      }
	    }
	});
}

ServiceResourceFactory.$inject = ['$resource'];
function ServiceResourceFactory($resource){
    return $resource('/services/:id', {id: '@id'},
    {
	    query: {
	      method: 'GET',
	      isArray: true,
	      transformResponse: function(data) {
	      	//django data is under results field
	        return angular.fromJson(data).results; 
	      }
	    }
	});
}

AppController.$inject = ['Area','Service'];
function AppController(Area,Service){
	var ctrl = this;
	ctrl.areas = [];
	ctrl.services = [];
	ctrl.areas = Area.query();
	ctrl.services = Service.query();
}

})();
