/**
 * Created by pixco on 31/08/2017.
 */
(function() {
    'use strict';

    angular
        .module('app')
        .config(RoutesConfig);

    RoutesConfig.$inject = ['$stateProvider'];

    function RoutesConfig($stateProvider) {
        $stateProvider
            .state('app.games', {
                url: '/games',
                views: {
                    'main@': {
                        templateUrl: 'app/module/games/game-list.page.html',
                        controller: 'GameListController',
                        controllerAs: 'vm'
                    }
                }
            })
            .state('app.games.detail', {
                url: '/{gameid}/detail',
                views: {
                    'main@': {
                        templateUrl: 'app/module/games/game-details.page.html',
                        controller: 'GameDetailsController',
                        controllerAs: 'vm'
                    }
                },
                resolve: {
                    entity: ['Game', '$stateParams', function(Game, $stateParams) {
                        return Game.get({id : $stateParams.gameid}).$promise;
                    }]
                }
            });
    }
})();