(function (){
'use strict';

angular.module('ImpresosApp')
.controller('ServicesController',ServicesController);

ServicesController.$inject = ['serviceItems'];
function ServicesController(serviceItems){
  var serviceList = this;
  serviceList.services = serviceItems;

}

})();