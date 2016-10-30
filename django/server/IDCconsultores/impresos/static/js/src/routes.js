(function(){
'use strict';

angular.module('ImpresosApp')
.config(RoutesConfig);

RoutesConfig.$inject = ['$stateProvider', '$urlRouterProvider'];
function RoutesConfig($stateProvider, $urlRouterProvider) {

  // Redirect to home page if no other URL matches
  $urlRouterProvider.otherwise('/');

  // *** Set up UI states ***
  $stateProvider
  // Home page
  .state('home', {
    url: '/',
    templateUrl: '/static/js/src/impresosapp/apptemplates/home.template.html'
  })
  // categories page
  .state('impresos-products', {
    url: '/impresos-products',
    templateUrl: '/static/js/src/impresosapp/apptemplates/productlist.template.html',
    controller: 'ProductsController as productList',
    resolve : {
 		//products are initially clasiffied by area
      areaItems: ['AreaResourceFactory',function(AreaResourceFactory){
        return AreaResourceFactory.query();
      }]
    }

  })

  // categories page
  .state('impresos-services', {
    url: '/impresos-services',
    templateUrl: '/static/js/src/impresosapp/apptemplates/servicelist.template.html',
    controller: 'ServicesController as serviceList',
    resolve : {
      serviceItems: ['ServiceResourceFactory',function(ServiceResourceFactory){
        return ServiceResourceFactory.query();
      }]
    }

  });
}


})();