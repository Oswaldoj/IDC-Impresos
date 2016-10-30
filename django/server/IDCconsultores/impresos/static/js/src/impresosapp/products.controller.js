(function (){
'use strict';

angular.module('ImpresosApp')
.controller('ProductsController',ProductsController);

ProductsController.$inject = ['areaItems'];
function ProductsController(areaItems){
  var productList = this;
  productList.areas = areaItems;

}

})();