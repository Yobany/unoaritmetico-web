(function() {
    'use strict';

    angular
        .module('app')
        .config(RoutesConfig);

    RoutesConfig.$inject = ['$stateProvider','$urlRouterProvider'];

    function RoutesConfig($stateProvider, $urlRouterProvider) {

        $urlRouterProvider.otherwise('/');

        /*
         data: {auth: true} would require JWT auth
         However you can't apply it to the abstract state
         or landing state because you'll enter a redirect loop
         */

        $stateProvider
            .state('app', {
                abstract: true,
                data: {},
                views: {
                    header: {
                        templateUrl: 'app/module/core/header.page.html',
                        controller: 'AppHeaderController',
                        controllerAs: 'vm'
                    },
                    footer: {
                        templateUrl: 'app/module/core/footer.page.html'
                    },
                    main: {}
                }
            })
            .state('app.landing', {
                url: '/',
                views: {
                    'main@': {
                        templateUrl: 'app/module/core/core.page.html'
                    }
                }
            });
    }
})();