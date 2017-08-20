(function () {
    'use strict';

    angular
        .module('app')
        .controller('GameDetailsController', GameDetailsController);

    GameDetailsController.$inject =
        [
            'API',
            '$mdDialog'
        ];

    function GameDetailsController(API,
                                   $mdDialog) {

        let vm = this;

        vm.API = API;
        vm.$mdDialog = $mdDialog;
        vm.API.one("games", vm.gameid).get().then((result) => {
            vm.game = result;
        });

        vm.getDescription = function (card) {
            let description = "";
            if (card.operation) {
                description += "Operacion :" + card.operation + " = " + card.result;
            } else if (card.power) {
                description += "Poder :" + card.power.data.name;
            }
            if (card.color) {
                description += (description.length ? " -" : "") + " Color :" + card.color.data.name;
            }
            return description;
        };

        vm.cancel = function () {
            vm.$mdDialog.cancel();
        };

        vm.exportGame = function () {
            vm.API.one('games', vm.gameid).one('export').get();
        };

    }
})();