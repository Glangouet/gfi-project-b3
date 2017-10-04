angular.module("gfiApp").controller("gfiCtrl", ['$scope', 'usersService',
    function ($scope, usersService) {

    $scope.user = {};

    $scope.validationLogIn = function (commercial) {
        commercialsService.save({mail: commercial.mail, pw: commercial.pw }).$promise.then(function () {





        });
    }





    var cli1 = { nom: 'aaa', titre: 'aa', date: 'a' }
    var cli2 = { nom: 'bbb', titre: 'bb', date: 'b' }
    var cli3 = { nom: 'ccc', titre: 'cc', date: 'c' }
    $scope.listeCli = [cli1, cli2, cli3];


        














}]);