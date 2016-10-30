(function(){
'use strict';

angular.module('ImpresosApp')
.controller('ImpresosAppController',ImpresosAppController)

ImpresosAppController.$inject = ['Area','Service'];
function ImpresosAppController(Area,Service){
	var ctrl = this;
	ctrl.areas = [];
	ctrl.services = [];
	ctrl.areas = Area.query();
	ctrl.services = Service.query();
}

})();
