(function () {
    'use strict';

    angular
        .module('app')
        .controller('GameDetailsController', GameDetailsController);

    GameDetailsController.$inject =
        [
            'entity',
            'Game'
        ];

    function GameDetailsController(entity,
                                   Game) {

        let vm = this;

        vm.game = entity;

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

        vm.exportGame = function () {
            vm.API.one('games', vm.gameid).one('export').get();
        };

    }
})();