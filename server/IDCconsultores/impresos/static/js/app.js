(function(){
'use strict';

angular.module('TestApp',['ngResource'])
.controller('AppController',AppController)
.factory('Area',AreaResourceFactory);

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

AppController.$inject = ['Area'];
function AppController(Area){
	var ctrl = this;
	ctrl.areas = [];
	ctrl.areas = Area.query();
}

})();