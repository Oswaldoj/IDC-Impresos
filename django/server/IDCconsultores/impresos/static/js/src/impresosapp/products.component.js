(function(){
'use strict';

angular.module('ImpresosApp')
.component('products',{
	templateUrl: '/static/js/src/impresosapp/apptemplates/products.template.html',
	bindings : {
		areas: '<'
	}
});

})();
