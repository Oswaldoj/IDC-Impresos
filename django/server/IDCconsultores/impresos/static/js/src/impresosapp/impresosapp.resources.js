(function(){
'use strict';

angular.module('ImpresosApp')
.factory('AreaResourceFactory',AreaResourceFactory)
.factory('ServiceResourceFactory',ServiceResourceFactory)

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

})();
