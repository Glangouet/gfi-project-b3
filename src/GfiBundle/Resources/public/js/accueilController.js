angular.module("gfiApp").controller("accueilCtrl",
    function ($scope, customersService) {

    $scope.listeClients = [];

    //$scope.listeClients = customersService.query({ id: $scope.user.userId }).$promise.then(function (result) {
    //    $scope.listeClients = result;
        
    //    });
    
    
    var cli1 = { nom: 'aaa', titre: 'aa', date: 'a' }
    var cli2 = { nom: 'bbb', titre: 'bb', date: 'b' }
    var cli3 = { nom: 'ccc', titre: 'cc', date: 'c' }
    $scope.listeClients = [cli1, cli2, cli3];






















});