angular.module("gfiApp").controller("accueilCtrl",
    function ($scope, customersService) {

    $scope.listeClients = [];
    var cli1 = { status: '[p]', title: 'water', name: 'Gfi', date: '17-10-2017' }
    var cli2 = { status: '[d]', title: 'marketing', name: 'Epitech', date: '05-02-2015' }
    var cli3 = { status: '[n]', title: 'shovels', name: 'Microsoft', date: '01-08-2000' }
    $scope.listeClients = [cli1, cli2, cli3];






















});