(function(){
'use strict';

angular.module('ImpresosApp',['ui.router','ngResource'])
.config(function($httpProvider) {
	/* Angular-Django CSRF Token compatibility*/
    $httpProvider.defaults.xsrfCookieName = 'csrftoken';
    $httpProvider.defaults.xsrfHeaderName = 'X-CSRFToken';
});

})();
