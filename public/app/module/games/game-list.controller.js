(function () {
    'use strict';

    angular
        .module('app')
        .controller('GameListController', GameListController);

    GameListController.$inject =
        [
            'Game',
            'Group',
            'EntitySearchHelper',
            '$window'
        ];

    function GameListController(Game,
                                Group,
                                EntitySearchHelper,
                                $window) {
        let vm = this;
        vm.exportGame = exportGame;

        Group.query(function(groupCollection){
            vm.groups = groupCollection.data;
        });

        vm.gameSearch = EntitySearchHelper.getDefaultSearch(Game);
        vm.gameSearch.params.group = "T";
        vm.gameSearch.config.emptyResultMessages = true;
        vm.gameSearch.filterParams = function(params) {
            let allGroupsSelected = params.group && params.group === "T";
            if(allGroupsSelected){
                delete params.group;
            }
            return params;
        };
        vm.gameSearch.search();

        function exportGame(game){
            $window.location = '/api/games/' + game.id + '/export';
        }
    }
})();