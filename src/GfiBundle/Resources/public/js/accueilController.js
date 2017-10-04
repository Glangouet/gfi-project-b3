angular.module("gfiApp").controller("accueilCtrl",
    function ($scope, customersService) {

    $scope.listeClients = [];
    var cli1 = { nom: '[Pending]', titre: 'Gfi', date: '17-10-2017' }
    var cli2 = { nom: '[Done]', titre: 'Epitech', date: '05-02-2015' }
    var cli3 = { nom: '[New]', titre: 'Microsoft', date: '01-08-2000' }
    $scope.listeClients = [cli1, cli2, cli3];






















});