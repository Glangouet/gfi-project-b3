var app = angular.module('gfiApp', ['ui.router', 'ngResource']);

app.factory('customersService',  ["$resource", function ($resource) {
    return $resource('/api/customers/:action/:id', {
        action: '@action',
        cache: true
    })
}]);

app.factory('usersService', ["$resource", function ($resource) {
	return $resource('/api/users/:action/:id', {
		action: '@action',
		cache: true
	})
}]);