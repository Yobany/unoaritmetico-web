(function () {
    'use strict';

    angular
        .module('app')
        .controller('StudentDetailsController', StudentDetailsController);

    StudentDetailsController.$inject =
        [
            '$stateParams',
            'API',
            '$mdDialog'
        ];

    function StudentDetailsController($stateParams,
                                      API,
                                      $mdDialog) {

        let vm = this;

        vm.$stateParams = $stateParams;
        vm.API = API;
        vm.$mdDialog = $mdDialog;
        vm.API.one("students", vm.$stateParams.id).get().then((result) => {
            vm.student = result;
            let operationData = vm.student.stadistics.operation;
            vm.operationsGraph = {
                data: [
                    operationData.additionCount,
                    operationData.multiplicationCount,
                    operationData.divisionCount,
                    operationData.substractionCount],
                labels: ["Suma", "Multiplicacion", "División", "Resta"],
                options: {
                    legend: {
                        display: true,
                    }
                }
            };
            let gameData = vm.student.stadistics.game;
            vm.gamesGraph = {
                data: [gameData.winnedCount, gameData.lostCount],
                labels: ["Ganadas", "Perdidas"],
                options: {
                    legend: {
                        display: true,
                    }
                }
            };
        });


        vm.show = function (game) {
            vm.$mdDialog.show({
                template: "<md-dialog flex='80' aria-label='juegos'><game-details gameid='" + game.id + "'></game-details></md-dialog>",
                clickOutsideToClose: true
            }).then(() => {
            }, () => {
            });
        }

    }
})();